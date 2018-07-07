<?php
namespace BinaryStudioAcademy\Game\Commands;

use BinaryStudioAcademy\Game\Contracts\Io\Writer;
use BinaryStudioAcademy\Game\GameWorld;

class ProduceCommand extends AbstractCommand
{
    private $gameWorld;
    private $resourceTitle;
    private $availableResource = 'metal';

    public function __construct(GameWorld $gameWorld, Writer $writer, string $resourceTitle)
    {
        parent::__construct($writer);
        $this->resourceTitle = $resourceTitle;
        $this->gameWorld = $gameWorld;
    }


    private function mineMetal():void
    {
        $ironCount = $this->gameWorld->getAvailableResources()['iron']['count'];
        $fireCount = $this->gameWorld->getAvailableResources()['fire']['count'];
        if ($ironCount < 1 && $fireCount < 1) {
            $this->writer->write("You need to mine: iron,fire.\n");
        } elseif ($ironCount < 1) {
            $this->writer->write("You need to mine: iron.\n");
        } elseif ($fireCount < 1) {
            $this->writer->write("You need to mine: fire.\n");
        } else {
            //create metal
            if (isset($this->gameWorld->getAvailableResources()[$this->availableResource])) {
                $this->gameWorld->getAvailableResources()[$this->resourceTitle]['count']++;
            } else {
                $materialName = '\BinaryStudioAcademy\Game\Resources\\' . ucfirst($this->resourceTitle);
                $this->gameWorld->getAvailableResources()[$this->resourceTitle]['resource'] = new $materialName;
                $this->gameWorld->getAvailableResources()[$this->resourceTitle]['count'] = 1;
            }
            $this->gameWorld->getAvailableResources()['iron']['count']--;
            $this->gameWorld->getAvailableResources()['fire']['count']--;
            sleep($this->gameWorld->getAvailableResources()[$this->resourceTitle]['resource']->getTimeForMining());
            $this->writer->write("Metal added to inventory.\n");
        }
        return;
    }

    public function process():void
    {
        try {
            if ($this->availableResource !== $this->resourceTitle) {
                throw new \Exception("No such combine resource.\n");
            }
            $this->mineMetal();
        } catch (\Exception $e) {
            $this->writer->write($e->getMessage());
        }
        return;
    }

}