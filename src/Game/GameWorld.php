<?php

namespace BinaryStudioAcademy\Game;


class GameWorld
{
    private static $instance;
    private $availableResources = [];
    private $spaceshipDetails = [];
    private $details = ['shell', 'porthole', 'control_unit', 'engine', 'launcher', 'tank', 'IC', 'wires'];

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
        //generate 20 random resources
        $resources = ['iron', 'fire', 'sand', 'silicon', 'copper', 'carbon', 'water', 'fuel'];
        $minValue = 0;
        $maxValue = count($resources) - 1;
        $count = 200;
        $num = 0;
        while ($num < $count) {
            $value = random_int($minValue, $maxValue);
            $resource = '\BinaryStudioAcademy\Game\Resources\\' . ucfirst($resources[$value]);
            $resourceObj = new $resource;
            if (!array_key_exists($resources[$value], $this->availableResources)) {
                $this->availableResources[$resources[$value]]['resource'] = $resourceObj;
                $this->availableResources[$resources[$value]]['count'] = 0;
            }
            $this->availableResources[$resources[$value]]['count']++;
            $num++;
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
            } else {
                $detailName = '\BinaryStudioAcademy\Game\Details\\' . ucfirst($detail);
            }
            $objDetail = new $detailName;
            // array_push($this->spaceshipDetails, $objDetail);
            $this->spaceshipDetails[$detail] = $objDetail;
        }
        return;
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