<?php
/**
 * Created by PhpStorm.
 * User: Serhii
 * Date: 07.07.2018
 * Time: 2:03
 */

namespace BinaryStudioAcademy\Game\Commands;


use BinaryStudioAcademy\Game\Contracts\Io\Writer;
use BinaryStudioAcademy\Game\Details\Detail;
use BinaryStudioAcademy\Game\GameWorld;

class SchemeCommand extends AbstractCommand
{
    private $spaceshipModuleName;
    private $gameWorld;

    private $spaceshipModules = ['shell', 'porthole', 'ic', 'wires', 'engine', 'launcher', 'tank'];

    public function __construct(GameWorld $gameWorld, Writer $writer, string $spaceshipModuleName)
    {
        parent::__construct($writer);
        $this->spaceshipModuleName = $spaceshipModuleName;
        $this->gameWorld = $gameWorld;
    }

    private function checkModule()
    {
        if (!in_array($this->spaceshipModuleName, $this->spaceshipModules)) {
            throw new \Exception("There is no such spaceship module.\n");
        }
    }

    public function process():void
    {
        try {
            $this->checkModule();
            $module = $this->gameWorld->getSpaceshipDetails()[$this->spaceshipModuleName];
            /**
             * @var Detail $module
             */
            $this->writer->write("Module name: " . $module->getTitle() . "\n");
            $this->writer->write("Necessary details: " . implode(", ", $module->getNecessaryResources() . "\n"));
        } catch (\Exception $e) {
            $this->writer->write($e->getMessage());
        }
        return;
    }
}

