<?php

namespace BinaryStudioAcademy\Game;

use BinaryStudioAcademy\Game\Commands\AbstractCommand;


use BinaryStudioAcademy\Game\Commands\ExitCommand;
use BinaryStudioAcademy\Game\Commands\HelpCommand;
use BinaryStudioAcademy\Game\Commands\SchemeCommand;
use BinaryStudioAcademy\Game\Commands\StatusCommand;
use BinaryStudioAcademy\Game\Contracts\Io\Reader;
use BinaryStudioAcademy\Game\Contracts\Io\Writer;

class Game
{

    /**
     * @var AbstractCommand $command
     */
    private $command;

    private function setCommand(AbstractCommand $command):void
    {
        $this->command = $command;
        return;
    }

    public function start(Reader $reader, Writer $writer): void
    {

//        $writer->write("Type your name:");
//        $input = trim($reader->read());
//        $writer->writeln("Good luck with this task, {$input}!");
        $gameWorld = new GameWorld();
        while (true) {
            $writer->write("Type the command:");
            $command = trim($reader->read());
            if ($command == 'help') {
                $this->setCommand(new HelpCommand($writer));
                $this->command->process();

            }
            if ($command == 'exit') {
                $this->setCommand(new ExitCommand($writer));
                $this->command->process();
            }
            if ($command == 'status') {
                $this->setCommand(new StatusCommand($gameWorld, $writer));
                $this->command->process();
            }
            if (preg_match('#^scheme:(?<spaceship_module>.+)#', $command, $matches)) {
                $this->setCommand(new SchemeCommand($gameWorld, $writer,$matches['spaceship_module']));
                $this->command->process();
            }
           // if(preg_match())
        }
        return;
    }

    public function run(Reader $reader, Writer $writer): void
    {
        // TODO: Implement step by step mode with game state persistence between steps
        $writer->writeln("You can't play yet. Please read input and convert it to commands.");
        $writer->writeln("Don't forget to create game's world.");
    }
}
