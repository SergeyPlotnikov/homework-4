<?php
/**
 * Created by PhpStorm.
 * User: Serhii
 * Date: 06.07.2018
 * Time: 1:47
 */

namespace BinaryStudioAcademy\Game\Details;


class Porthole extends Detail
{
    public function __construct()
    {
        $this->necessaryResources = ['Fire','Sand'];
        $this->title = 'porthole';
    }

}