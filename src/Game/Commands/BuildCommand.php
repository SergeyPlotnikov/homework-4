<?php

namespace BinaryStudioAcademy\Game\Commands;

use BinaryStudioAcademy\Game\Contracts\Io\Writer;
use BinaryStudioAcademy\Game\Details\Detail;
use BinaryStudioAcademy\Game\GameWorld;

class BuildCommand extends AbstractCommand
{
    private $moduleTitle;
    /**
     * @var Detail $moduleObj
     */
    private $moduleObj;
    private $gameWorld;


    public function __construct(GameWorld $gameWorld, Writer $writer, string $moduleTitle)
    {
        parent::__construct($writer);
        $this->moduleTitle = $moduleTitle;
        $this->gameWorld = $gameWorld;
    }

    /**
     * Check existing this module and is ready or not
     * @throws \Exception
     */
    private function checkModule():void
    {
        if (!in_array($this->moduleTitle, $this->gameWorld->getDetails())) {
            throw new \Exception("There is no such spaceship module.\n");
        }
        if ($this->gameWorld->getSpaceshipDetails()[$this->moduleTitle]->isStatus()) {
            throw new \Exception("Attention! " . ucfirst($this->moduleTitle) . " is ready.\n");
        }
        return;
    }

    /**
     * Check, if enough resources to build this module
     * @param array $necessaryResources
     * @throws \Exception
     */
    private function isEnoughResources(array $necessaryResources):void
    {
        $isEnough = true;
        $needResources = [];

        $availableResourcesObjects = $this->gameWorld->getAvailableResources();
        $availableResourcesTitle = array_keys($availableResourcesObjects);
        $countNecessaryResources = count($necessaryResources);
        foreach ($necessaryResources as $index => $resource) {
            if (in_array($resource, $availableResourcesTitle)) {
                if ($availableResourcesObjects[$resource]['count'] < 1) {
                    $isEnough = false;
                } else {
                    unset($necessaryResources[$index]);
                    $countNecessaryResources--;
                }
            }
        }
        $necessaryResources = array_values($necessaryResources);
        if ($countNecessaryResources != 0) {
            $isEnough = false;
            $needResources = array_merge($needResources, $necessaryResources);
        }
        if (!$isEnough) {
            throw new \Exception("Inventory should have: " . implode(",", $needResources) . ".");
        }
        return;

    }

    /**
     * build control_unit module
     */
    private function buildControlUnit():void
    {
        /**
         * @var Detail $spaceshipDetails
         */
        $spaceshipDetails = $this->gameWorld->getSpaceshipDetails();
        [$ic, $wires] = $spaceshipDetails[$this->moduleTitle]->getSetOfDetails();
        if (!$spaceshipDetails[$ic]->isStatus() && !$spaceshipDetails[$wires]->isStatus()) {
            throw new \Exception("Inventory should have: ${ic},${wires}.");
        } elseif (!$spaceshipDetails[$ic]->isStatus()) {
            throw new \Exception("Inventory should have: ${ic}.");
        } elseif (!$spaceshipDetails[$wires]->isStatus()) {
            throw new \Exception("Inventory should have: ${wires}");
        } else {
            $spaceshipDetails[$this->moduleTitle]->setStatus(true);
            $spaceshipDetails[$ic]->setStatus(false);
            $spaceshipDetails[$wires]->setStatus(false);
        }
        return;
    }

    private function buildModule():void
    {
        $this->moduleObj = $this->gameWorld->getSpaceshipDetails()[$this->moduleTitle];
        if (!$this->moduleObj->isCombineDetail()) {
            $necessaryResources = $this->moduleObj->getNecessaryResources();
            $this->isEnoughResources($necessaryResources);
            //if enough resources, then build the module
            foreach ($necessaryResources as $resource) {
                $this->gameWorld->getAvailableResources()[$resource]['count']--;
            }
            $this->moduleObj->setStatus(true);
        } else {
            //if it's combine module
            $this->buildControlUnit();
        }
        return;
    }

    public function process():void
    {
        try {
            $this->checkModule();
            $this->buildModule();


            if ($this->moduleTitle != 'ic' && $this->moduleTitle != 'wires') {
                $this->gameWorld->setCountOfMainModules($this->gameWorld->getCountOfMainModules() - 1);
            }
            if ($this->gameWorld->getCountOfMainModules() == 0) {
                $this->writer->write(ucfirst($this->moduleTitle) . " is ready! => You won!\n");
                //if we ended out game => remove game's world
                $this->gameWorld->removeGameWorld();
            } else {
                $this->writer->write(ucfirst($this->moduleTitle) . " is ready!\n");
            }
        } catch (\Exception $exception) {
            $this->writer->write($exception->getMessage());
        }
        return;
    }
}