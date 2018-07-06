<?php
/**
 * Created by PhpStorm.
 * User: Serhii
 * Date: 06.07.2018
 * Time: 0:01
 */

namespace BinaryStudioAcademy\Game;


class Commands
{
    private static $commands = [
        ['build:random', 'There is no such spaceship module.'],
        ['mine:unnamed', 'No such resource.'],
        ['what?', 'There is no command what?'],
        ['build:shell', "Inventory should have: metal,fire."],
        ['produce:metal', 'You need to mine: iron,fire.'],
        ['mine:iron', 'Iron added to inventory.'],
        ['produce:metal', 'You need to mine: fire.'],
        ['mine:fire', 'Fire added to inventory.'],
        ['produce:metal', 'Metal added to inventory.'],
        ['build:shell', "Inventory should have: fire."],
        ['mine:fire', 'Fire added to inventory.'],
        ['build:shell', 'Shell is ready!'],
        ['build:porthole', 'Inventory should have: sand,fire.'],
        ['mine:fire', 'Fire added to inventory.'],
        ['build:porthole', 'Inventory should have: sand.'],
        ['mine:sand', 'Sand added to inventory.'],
        ['build:porthole', 'Porthole is ready!'],
        ['build:control_unit', 'Inventory should have: ic,wires.'],
        ['build:ic', 'Inventory should have: metal,silicon.'],
        ['mine:silicon', 'Silicon added to inventory.'],
        ['produce:metal', 'You need to mine: iron,fire.'],
        ['mine:iron', 'Iron added to inventory.'],
        ['produce:metal', 'You need to mine: fire.'],
        ['mine:fire', 'Fire added to inventory.'],
        ['produce:metal', 'Metal added to inventory.'],
        ['build:ic', 'Ic is ready!'],
        ['build:ic', 'Attention! Ic is ready.'],
        ['build:wires', 'Inventory should have: copper,fire.'],
        ['mine:copper', 'Copper added to inventory.'],
        ['mine:fire', 'Fire added to inventory.'],
        ['build:wires', 'Wires is ready!'],
        ['build:control_unit', 'Control_unit is ready!'],
        ['build:engine', 'Inventory should have: metal,carbon,fire.'],
        ['mine:fire', 'Fire added to inventory.'],
        ['mine:iron', 'Iron added to inventory.'],
        ['produce:metal', 'Metal added to inventory.'],
        ['mine:fire', 'Fire added to inventory.'],
        ['mine:carbon', 'Carbon added to inventory.'],
        ['build:engine', 'Engine is ready!'],
        ['build:launcher', 'Inventory should have: water,fire,fuel.'],
        ['mine:water', 'Water added to inventory.'],
        ['build:launcher', 'Inventory should have: fire,fuel.'],
        ['mine:fire', 'Fire added to inventory.'],
        ['mine:fuel', 'Fuel added to inventory.'],
        ['build:launcher', 'Launcher is ready!'],
        ['build:tank', 'Inventory should have: metal,fuel.'],
        ['mine:fuel', 'Fuel added to inventory.'],
        ['mine:fire', 'Fire added to inventory.'],
        ['mine:iron', 'Iron added to inventory.'],
        ['produce:metal', 'Metal added to inventory.'],
        ['build:tank', 'Tank is ready! => You won!'],
        ['scheme:tank', 'Tank => metal|fuel'],
        ['scheme:unknown', 'There is no such spaceship module.'],
        ['exit', 'Quit the game'],
        ['status', 'Show the information about the quantity of available resources and what parts of the spaceship
         haven\'t built yet'],
        ['help', 'Show the list of available commands']
    ];

    private static $commandsForHelp = [
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

    /**
     * @return array
     */
    public static function getCommands(): array
    {
        return self::$commands;
    }

    /**
     * @return array
     */
    public static function getCommandsForHelp(): array
    {
        return self::$commandsForHelp;
    }
}