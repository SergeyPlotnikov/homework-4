<?php
namespace BinaryStudioAcademy\Game\Commands;

use BinaryStudioAcademy\Game\Contracts\Io\Writer;
use BinaryStudioAcademy\Game\Details\Detail;
use BinaryStudioAcademy\Game\GameWorld;

class StatusCommand extends AbstractCommand
{
    private $gameWorld;

    public function __construct(GameWorld $gameWorld, Writer $writer)
    {
        parent::__construct($writer);
        $this->gameWorld = $gameWorld;
    }

    public function process():void
    {
        $this->writer->write("You have:\n");
        foreach ($this->gameWorld->getAvailableResources() as $resource) {
            $this->writer->write("\t\u{25CF} " . $resource['resource']->getTitle() . ' - ' . $resource['count'] . " \n");
        }
        $this->writer->write("Parts ready:\n");
        /**
         * @var Detail $spaceshipDetail
         */
        foreach ($this->gameWorld->getSpaceshipDetails() as $spaceshipDetail) {
            if ($spaceshipDetail->isStatus()) {
                $this->writer->write("\t\u{25CF} " . $spaceshipDetail->getTitle() . " \n");
            }
        }
        $this->writer->write("Parts to build:\n");
        /**
         * @var Detail $spaceshipDetail
         */
        foreach ($this->gameWorld->getSpaceshipDetails() as $spaceshipDetail) {
            if ($spaceshipDetail->isStatus() == false) {
                $this->writer->write("\t\u{25CF} " . $spaceshipDetail->getTitle() . " \n");
            }
        }
    }
}