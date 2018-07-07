<?php
namespace BinaryStudioAcademy\Game\Details;

class ControlUnit extends Detail
{
    private $setOfDetails = ['IC', 'wires'];

    public function __construct()
    {
        $this->combineDetail = true;
        $this->title = "control_unit";
    }

    /**
     * @return array
     */
    public function getSetOfDetails(): array
    {
        return $this->setOfDetails;
    }
}