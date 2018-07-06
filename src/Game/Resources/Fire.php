<?php
/**
 * Created by PhpStorm.
 * User: Serhii
 * Date: 05.07.2018
 * Time: 22:58
 */

namespace BinaryStudioAcademy\Game\Resources;


class Fire extends Metal
{
    public function __construct()
    {
        parent::__construct();
        $this->title = 'fire';
        $this->description = "Fire is the rapid oxidation of a material in the exothermic chemical process of 
        combustion, releasing heat, light, and various reaction products.[1] Slower oxidative processes like rusting 
        or digestion are not included by this definition";
    }
}