<?php

namespace BinaryStudioAcademy\Game;

use BinaryStudioAcademy\Game\Commands\AbstractCommand;
use BinaryStudioAcademy\Game\Commands\CommandFactory;
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

        $writer->write("Let's play the game!\n");

        //while we won't build all main modules of our spaceship
        while (true) {
            $gameWorld = GameWorld::getInstance();
            $commandFactory = new CommandFactory($gameWorld, $writer);
            $writer->write("\nType the command:");
            $command = trim($reader->read());
            try {
                $command = $commandFactory->createCommand($command);
                $this->setCommand($command);
                $this->command->process();
            } catch (\Exception $exception) {
                $writer->write($exception->getMessage());
            }
        }
    }

    public function run(Reader $reader, Writer $writer): void
    {
        $writer->write("Let's test the game!\n");
        $gameWorld = GameWorld::getInstance();
        $commandFactory = new CommandFactory($gameWorld, $writer);
        $writer->write("\nType the command: ");
        $command = trim($reader->read());
        try {
            $command = $commandFactory->createCommand($command);
            $this->setCommand($command);
            $this->command->process();
        } catch (\Exception $exception) {
            $writer->write($exception->getMessage());
        }

    }
}
