<?php
namespace BinaryStudioAcademy\Game\Resources;

class Carbon extends Material
{
    public function __construct()
    {
        $this->title = 'carbon';
        $this->timeForMining = 1;
        $this->description = "Carbon (from Latin: carbo \"coal\") is a chemical element with symbol C and atomic number
         6. It is nonmetallic and tetravalent—making four electrons available to form covalent chemical bonds.";
    }
}