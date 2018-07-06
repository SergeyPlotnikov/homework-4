<?php
/**
 * Created by PhpStorm.
 * User: Serhii
 * Date: 05.07.2018
 * Time: 22:58
 */

namespace BinaryStudioAcademy\Game\Resources;


class Iron extends Metal
{
    public function __construct()
    {
        parent::__construct();
        $this->title = 'iron';
        $this->description = "Iron is a chemical element with symbol Fe (from Latin: ferrum) and atomic number 26. It 
        is a metal in the first transition series.";
    }
}