<?php
namespace BinaryStudioAcademy\Game\Details;

class Porthole extends Detail
{
    public function __construct()
    {
        $this->necessaryResources = ['sand', 'fire'];
        $this->title = 'porthole';
    }

}