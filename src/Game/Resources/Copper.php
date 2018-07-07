<?php
namespace BinaryStudioAcademy\Game\Resources;

class Copper extends Material
{
    public function __construct()
    {
        $this->title = 'copper';
        $this->timeForMining = 2;
        $this->description = "Copper is a chemical element with symbol Cu (from Latin: cuprum) and atomic number 29. 
        It is a soft, malleable, and ductile metal with very high thermal and electrical conductivity.";
    }
}