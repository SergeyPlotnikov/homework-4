<?php

namespace BinaryStudioAcademy\Game\Commands;

use BinaryStudioAcademy\Game\Contracts\Io\Writer;
use BinaryStudioAcademy\Game\GameWorld;

class CommandFactory extends FactoryMethod
{
    private $writer;
    private $gameWorld;

    public function __construct(GameWorld $gameWorld, Writer $writer)
    {
        $this->gameWorld = $gameWorld;
        $this->writer = $writer;
    }

    public function createCommand(string $type):AbstractCommand
    {
        if ($type == 'help') {
            return new HelpCommand($this->writer);
        } elseif ($type == 'exit') {
            return new ExitCommand($this->writer);
        } elseif ($type == 'status') {
            return new StatusCommand($this->gameWorld, $this->writer);
        } elseif (preg_match('#^scheme:(?<spaceship_module>.+)#', $type, $matches)) {
            return new SchemeCommand($this->gameWorld, $this->writer, $matches['spaceship_module']);
        } elseif (preg_match('#^mine:(?<resource>.+)#', $type, $matches)) {
            return new MineCommand($this->gameWorld, $this->writer, $matches['resource']);
        } elseif (preg_match('#^produce:(?<resource>.+)#', $type, $matches)) {
            return new ProduceCommand($this->gameWorld, $this->writer, $matches['resource']);
        } elseif (preg_match('#^build:(?<spaceship_module>.+)#', $type, $matches)) {
            return new BuildCommand($this->gameWorld, $this->writer, $matches['spaceship_module']);
        } else {
            throw new \Exception("There is no command $type \n");
        }
    }
}