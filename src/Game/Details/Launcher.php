<?php
/**
 * Created by PhpStorm.
 * User: Serhii
 * Date: 06.07.2018
 * Time: 1:48
 */

namespace BinaryStudioAcademy\Game\Details;


class Launcher extends Detail
{
    public function __construct()
    {
        $this->necessaryResources = ['Water','Fire','Fuel'];
        $this->title = 'launcher';
    }
}