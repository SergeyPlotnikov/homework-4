<?php
/**
 * Created by PhpStorm.
 * User: Serhii
 * Date: 07.07.2018
 * Time: 0:06
 */

namespace BinaryStudioAcademy\Game\Commands;


use BinaryStudioAcademy\Game\Contracts\Io\Writer;

abstract class AbstractCommand
{
    protected $writer;

    public function __construct(Writer $writer)
    {
        $this->writer = $writer;
    }

    abstract public function process():void;
}