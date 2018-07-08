<?php
namespace BinaryStudioAcademy\Game\Resources;

class Fuel extends Material
{
    public function __construct()
    {
        $this->title = 'fuel';
        $this->description = "A fuel is any material that can be made to react with other substances so that it releases
         energy as heat energy or to be used for work.";
    }
}