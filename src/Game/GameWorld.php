<?php

namespace BinaryStudioAcademy\Game;


class GameWorld
{
    private static $instance;
    private $availableResources = [];
    private $spaceshipDetails = [];
    private $details = ['shell', 'porthole', 'control_unit', 'engine', 'launcher', 'tank', 'ic', 'wires'];

    private $countOfMainModules = 6;

    private function __construct()
    {
        //generate initial resources
        $this->generateResources();
        $this->feelSpaceshipDetails();
    }

    private function __clone()
    {
    }

    private function __wakeup()
    {
    }

    public static function getInstance():GameWorld
    {
        if (self::$instance === null) {
            self::$instance = new static();
        }
        return self::$instance;
    }

    private function generateResources():void
    {
        $resources = ['iron', 'fire', 'sand', 'silicon', 'copper', 'carbon', 'water', 'fuel'];
        foreach ($resources as $resource) {
            $resourceName = '\BinaryStudioAcademy\Game\Resources\\' . ucfirst($resource);
            $resourceObj = new $resourceName;
            $this->availableResources[$resource]['resource'] = $resourceObj;
            $this->availableResources[$resource]['count'] = 0;
        }
        return;
    }

    private function feelSpaceshipDetails():void
    {

        foreach ($this->details as $detail) {
            if ($detail == 'control_unit') {
                //replace control_unit to ControlUnit
                $detailParts = array_map(function (string $value) {
                    return ucfirst($value);
                }, preg_split('#_#', $detail));
                $detailName = implode("", $detailParts);
                $detailName = '\BinaryStudioAcademy\Game\Details\\' . ucfirst($detailName);
            } elseif ($detail == 'ic') {
                $detailName = '\BinaryStudioAcademy\Game\Details\\' . strtoupper($detail);
            } else {
                $detailName = '\BinaryStudioAcademy\Game\Details\\' . ucfirst($detail);
            }
            $objDetail = new $detailName;
            // array_push($this->spaceshipDetails, $objDetail);
            $this->spaceshipDetails[$detail] = $objDetail;
        }
        return;
    }

    public function removeGameWorld():void
    {
        self::$instance = null;
    }

    /**
     * @return array
     */
    public function &getAvailableResources(): array
    {
        return $this->availableResources;
    }

    /**
     * @return array
     */
    public function &getSpaceshipDetails(): array
    {
        return $this->spaceshipDetails;
    }

    /**
     * @return array
     */
    public function getDetails(): array
    {
        return $this->details;
    }

    /**
     * @return int
     */
    public function getCountOfMainModules(): int
    {
        return $this->countOfMainModules;
    }

    /**
     * @param int $countOfMainModules
     */
    public function setCountOfMainModules(int $countOfMainModules)
    {
        $this->countOfMainModules = $countOfMainModules;
    }
}