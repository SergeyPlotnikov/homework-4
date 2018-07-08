<?php

namespace BinaryStudioAcademy\Game;

use BinaryStudioAcademy\Game\Commands\AbstractCommand;
use BinaryStudioAcademy\Game\Commands\BuildCommand;
use BinaryStudioAcademy\Game\Commands\CommandFactory;
use BinaryStudioAcademy\Game\Commands\ExitCommand;
use BinaryStudioAcademy\Game\Commands\HelpCommand;
use BinaryStudioAcademy\Game\Commands\MineCommand;
use BinaryStudioAcademy\Game\Commands\ProduceCommand;
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

        $writer->write("Let's play the game!\n");
        $gameWorld = GameWorld::getInstance();
        $commandFactory = new CommandFactory($gameWorld, $writer);
        //while we won't build all main modules of our spaceship
        while ($gameWorld->getCountOfMainModules() > 0) {
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
        $writer->write("You win!!!!");
        return;
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

//        $writer->write("\nType the command status: ");
//        $command = trim($reader->read());
//        try {
//            $command = $commandFactory->createCommand($command);
//            $this->setCommand($command);
//            $this->command->process();
//        } catch (\Exception $exception) {
//            $writer->write($exception->getMessage());
//        }
//
//        $writer->write("\nType the command scheme:porthole: ");
//        $command = trim($reader->read());
//        try {
//            $command = $commandFactory->createCommand($command);
//            $this->setCommand($command);
//            $this->command->process();
//        } catch (\Exception $exception) {
//            $writer->write($exception->getMessage());
//        }
//
//        $writer->write("\nType the command mine:fuel: ");
//        $command = trim($reader->read());
//        try {
//            $command = $commandFactory->createCommand($command);
//            $this->setCommand($command);
//            $this->command->process();
//        } catch (\Exception $exception) {
//            $writer->write($exception->getMessage());
//        }
//
//        $writer->write("\nType the command produce:metal: ");
//        $command = trim($reader->read());
//        try {
//            $command = $commandFactory->createCommand($command);
//            $this->setCommand($command);
//            $this->command->process();
//        } catch (\Exception $exception) {
//            $writer->write($exception->getMessage());
//        }
//
//        $writer->write("\nType the command status: ");
//        $command = trim($reader->read());
//        try {
//            $command = $commandFactory->createCommand($command);
//            $this->setCommand($command);
//            $this->command->process();
//        } catch (\Exception $exception) {
//            $writer->write($exception->getMessage());
//        }
//
//        $writer->write("\nType the command build:shell:");
//        $command = trim($reader->read());
//        try {
//            $command = $commandFactory->createCommand($command);
//            $this->setCommand($command);
//            $this->command->process();
//        } catch (\Exception $exception) {
//            $writer->write($exception->getMessage());
//        }
//
//        $writer->write("\nType the command status: ");
//        $command = trim($reader->read());
//        try {
//            $command = $commandFactory->createCommand($command);
//            $this->setCommand($command);
//            $this->command->process();
//        } catch (\Exception $exception) {
//            $writer->write($exception->getMessage());
//        }
//
//        $writer->write("\nType the command exit: ");
//        $command = trim($reader->read());
//        try {
//            $command = $commandFactory->createCommand($command);
//            $this->setCommand($command);
//            $this->command->process();
//        } catch (\Exception $exception) {
//            $writer->write($exception->getMessage());
//        }

        return;
    }
}
