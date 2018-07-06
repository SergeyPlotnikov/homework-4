<?php
/**
 * Created by PhpStorm.
 * User: Serhii
 * Date: 06.07.2018
 * Time: 1:47
 */

namespace BinaryStudioAcademy\Game\Details;


class Wires extends ControlUnit
{
    public function __construct()
    {
        $this->necessaryResources = ['Cooper', 'Fire'];
        $this->title = 'wires';
    }

}