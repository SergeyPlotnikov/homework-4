<?php
namespace BinaryStudioAcademy\Game\Details;

class Engine extends Detail
{
    public function __construct()
    {
        $this->necessaryResources = ['metal', 'carbon', 'fire'];
        $this->title = 'engine';
    }
}