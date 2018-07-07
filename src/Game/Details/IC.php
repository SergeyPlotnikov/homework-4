<?php
namespace BinaryStudioAcademy\Game\Details;

class IC extends Detail
{
    public function __construct()
    {
        $this->necessaryResources = ['metal', 'silicon'];
        $this->title = 'IC';
    }

}