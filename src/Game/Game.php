<?php

namespace BinaryStudioAcademy\Game;

use BinaryStudioAcademy\Game\Contracts\Io\Reader;
use BinaryStudioAcademy\Game\Contracts\Io\Writer;
use BinaryStudioAcademy\Game\Details\Detail;

class Game
{
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
                $commands = Commands::getCommandsForHelp();
                foreach ($commands as $command) {
                    $writer->write("Command: ${command['command']} =>");
                    $writer->write("\nDescription: ${command['description']}\n\n");
                }
            }
            if ($command == 'exit') {
                break;
            }
            if ($command == 'status') {
                $writer->write("You have:\n");
                foreach ($gameWorld->getAvailableResources() as $resource) {
                    $writer->write("\t\u{25CF} " . $resource['resource']->getTitle() . ' - ' . $resource['count'] . " \n");
                }
                $writer->write("Parts ready:\n");
                /**
                 * @var Detail $spaceshipDetail
                 */
                foreach ($gameWorld->getSpaceshipDetails() as $spaceshipDetail) {
                    if ($spaceshipDetail->isStatus()) {
                        $writer->write("\t\u{25CF} " . $spaceshipDetail->getTitle() . " \n");
                    }
                }
                $writer->write("Parts to build:\n");
                /**
                 * @var Detail $spaceshipDetail
                 */
                foreach ($gameWorld->getSpaceshipDetails() as $spaceshipDetail) {
                    if ($spaceshipDetail->isStatus() == false) {
                        $writer->write("\t\u{25CF} " . $spaceshipDetail->getTitle() . " \n");
                    }
                }
            }
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
