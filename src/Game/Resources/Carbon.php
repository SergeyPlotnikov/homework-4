<?php
/**
 * Created by PhpStorm.
 * User: Serhii
 * Date: 05.07.2018
 * Time: 22:59
 */

namespace BinaryStudioAcademy\Game\Resources;


class Carbon extends Material
{
    public function __construct()
    {
        $this->title = 'carbon';
        $this->type = 'group 14 (carbon group)';
        $this->description = "Carbon (from Latin: carbo \"coal\") is a chemical element with symbol C and atomic number
         6. It is nonmetallic and tetravalent—making four electrons available to form covalent chemical bonds.";
    }
}