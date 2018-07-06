<?php
/**
 * Created by PhpStorm.
 * User: Serhii
 * Date: 05.07.2018
 * Time: 22:59
 */

namespace BinaryStudioAcademy\Game\Resources;


class Water extends Material
{
    public function __construct()
    {
        $this->title = 'water';
        $this->type = 'water, oxidane';
        $this->description = "Water (H2O) is a polar inorganic compound that is at room temperature a tasteless and
         odorless liquid, which is nearly colorless apart from an inherent hint of blue";
    }
}