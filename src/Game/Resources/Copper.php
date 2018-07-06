<?php
/**
 * Created by PhpStorm.
 * User: Serhii
 * Date: 05.07.2018
 * Time: 22:59
 */

namespace BinaryStudioAcademy\Game\Resources;


class Copper extends Material
{
    public function __construct()
    {
        $this->title = 'cooper';
        $this->type = 'group 11';
        $this->description = "Copper is a chemical element with symbol Cu (from Latin: cuprum) and atomic number 29. 
        It is a soft, malleable, and ductile metal with very high thermal and electrical conductivity.";
    }
}