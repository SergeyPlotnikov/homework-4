<?php
namespace BinaryStudioAcademy\Game\Details;

class Porthole extends Detail
{
    public function __construct()
    {
        $this->necessaryResources = ['fire', 'sand'];
        $this->title = 'porthole';
    }

}