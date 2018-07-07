<?php
namespace BinaryStudioAcademy\Game\Resources;

class Metal extends Material
{
    public function __construct()
    {
        $this->title = 'metal';
        $this->timeForMining = 3;
        $this->isCombine = true;
        $this->description = "A metal (from Greek μέταλλον métallon, \"mine, quarry, metal\") is a material 
        (an element, compound, or alloy) that is typically hard when in solid state, opaque, shiny, and has good electrical and thermal conductivity.";
    }
}