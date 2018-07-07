<?php
namespace BinaryStudioAcademy\Game\Details;

class Shell extends Detail
{
    public function __construct()
    {
        $this->necessaryResources = ['metal', 'fire'];
        $this->title = 'shell';
    }

}