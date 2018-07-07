<?php
/**
 * Created by PhpStorm.
 * User: Serhii
 * Date: 06.07.2018
 * Time: 1:37
 */

namespace BinaryStudioAcademy\Game;

/*
 * TODO: do it as Singleton
 */
class GameWorld
{
    private $availableResources = [];
    private $spaceshipDetails = [];

    function __construct()
    {
        //generate initial resources
        $this->generateResources();
        $this->feelSpaceshipDetails();
    }

    private function generateResources():void
    {
        //generate 20 random resources
        $resources = ['metal', 'iron', 'fire', 'sand', 'iron', 'silicon', 'copper', 'carbon', 'water', 'fuel'];
        $minValue = 0;
        $maxValue = count($resources) - 1;
        $count = 20;
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
//        var_dump($this->availableResources);
        return;
    }

    private function feelSpaceshipDetails():void
    {
        $details = ['shell', 'porthole', 'IC', 'wires', 'engine', 'launcher', 'tank'];
        foreach ($details as $detail) {
            $detailName = '\BinaryStudioAcademy\Game\Details\\' . ucfirst($detail);
            $objDetail = new $detailName;
           // array_push($this->spaceshipDetails, $objDetail);
            $this->spaceshipDetails[$detail] = $objDetail;
        }
        return;
    }

    /**
     * @return array
     */
    public function getAvailableResources(): array
    {
        return $this->availableResources;
    }

    /**
     * @return array
     */
    public function getSpaceshipDetails(): array
    {
        return $this->spaceshipDetails;
    }
}