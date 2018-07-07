<?php
namespace BinaryStudioAcademy\Game\Details;

class Tank extends Detail
{
    public function __construct()
    {
        $this->necessaryResources = ['metal', 'fuel'];
        $this->title = 'tank';
    }

}