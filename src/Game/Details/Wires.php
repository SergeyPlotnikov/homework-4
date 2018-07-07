<?php
namespace BinaryStudioAcademy\Game\Details;

class Wires extends Detail
{
    public function __construct()
    {
        $this->necessaryResources = ['copper', 'fire'];
        $this->title = 'wires';
    }
}