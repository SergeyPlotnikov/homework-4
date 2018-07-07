<?php

namespace BinaryStudioAcademy\Game\Commands;

class HelpCommand extends AbstractCommand
{

    private $commandsForHelp = [
        ['command' => 'help', 'description' => 'Show the list of available commands'],
        ['command' => 'status', 'description' => 'Show the information about the quantity of available resources and what 
        parts of the spaceship haven\'t built yet'],
        ['command' => 'build:<spaceship_module>', 'description' => 'To build the spaceship\'s moudule.No such module or 
        already built - an error. If you do not have enough resources, you can get help on what resources are needed to
         build the module. If all modules are built-output a message about winning and exit the game.'],
        ['command' => 'scheme:<spaceship_module>', 'description' => 'output information / schema about what modules / 
        resources are needed to build the module. There is no such module - an error.'],
        ['command' => 'mine:<resource_name>', 'description' => 'Add a fire unit to the inventory / warehouse. There is
         no such resource - an error.'],
        ['command' => 'produce:<combined_resource>', 'description' => 'to produce a combined resource (metal). If you
         do not have enough resources, output a message about it.'],
        ['command' => 'exit', 'description' => 'Quit the game'],
    ];


    public function process():void
    {
        foreach ($this->commandsForHelp as $command) {
            $this->writer->write("Command: ${command['command']} =>");
            $this->writer->write("\nDescription: ${command['description']}\n\n");
        }
        return;
    }
}