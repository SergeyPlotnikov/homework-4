<?php
namespace BinaryStudioAcademy\Game\Details;

class Launcher extends Detail
{
    public function __construct()
    {
        $this->necessaryResources = ['water', 'fire', 'fuel'];
        $this->title = 'launcher';
    }
}