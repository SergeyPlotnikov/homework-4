<?php

namespace BinaryStudioAcademy\Game\Commands;


abstract class FactoryMethod
{
    abstract public function createCommand(string $type):AbstractCommand;
}