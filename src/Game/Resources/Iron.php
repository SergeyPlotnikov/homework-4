<?php
namespace BinaryStudioAcademy\Game\Resources;

class Iron extends Material
{
    public function __construct()
    {
        $this->title = 'iron';
        $this->timeForMining = 3;
        $this->description = "Iron is a chemical element with symbol Fe (from Latin: ferrum) and atomic number 26. It 
        is a metal in the first transition series.";
    }
}