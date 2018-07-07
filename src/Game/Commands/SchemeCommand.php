<?php
namespace BinaryStudioAcademy\Game\Commands;

use BinaryStudioAcademy\Game\Contracts\Io\Writer;
use BinaryStudioAcademy\Game\Details\Detail;
use BinaryStudioAcademy\Game\GameWorld;

class SchemeCommand extends AbstractCommand
{
    private $spaceshipModuleName;
    private $gameWorld;

    private $spaceshipModules = ['shell', 'porthole', 'ic', 'wires', 'engine', 'launcher', 'tank', 'control_unit'];

    public function __construct(GameWorld $gameWorld, Writer $writer, string $spaceshipModuleName)
    {
        parent::__construct($writer);
        $this->spaceshipModuleName = $spaceshipModuleName;
        $this->gameWorld = $gameWorld;
    }

    private function checkModule():void
    {
        if (!in_array($this->spaceshipModuleName, $this->spaceshipModules)) {
            throw new \Exception("There is no such spaceship module.\n");
        }
        return;
    }

    public function process():void
    {
        try {
            $this->checkModule();
            $module = $this->gameWorld->getSpaceshipDetails()[$this->spaceshipModuleName];
            /**
             * @var Detail $module
             */
            if (!$module->isCombineDetail()) {
                $this->writer->write("Module name: " . $module->getTitle() . "\n");
                $this->writer->write("Necessary resources: " . implode(", ", $module->getNecessaryResources()) . "\n");
            } else {
                $this->writer->write("Module name: " . $module->getTitle() . "\n");
                $this->writer->write("It's a combined module.\n");
                $this->writer->write("Necessary details: " . implode(", ", $module->getSetOfDetails()) . "\n");
            }
        } catch (\Exception $e) {
            $this->writer->write($e->getMessage());
        }
        return;
    }
}

