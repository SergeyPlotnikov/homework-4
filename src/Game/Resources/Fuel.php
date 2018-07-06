<?php
/**
 * Created by PhpStorm.
 * User: Serhii
 * Date: 05.07.2018
 * Time: 22:59
 */

namespace BinaryStudioAcademy\Game\Resources;


class Fuel extends Material
{
    public function __construct()
    {
        $this->title = 'fuel';
        $this->type = 'solid fuel, liquid fuel, gaseous fuel';
        $this->description = "A fuel is any material that can be made to react with other substances so that it releases
         energy as heat energy or to be used for work.";
    }
}