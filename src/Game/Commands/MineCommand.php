<?php
namespace BinaryStudioAcademy\Game\Commands;

use BinaryStudioAcademy\Game\Contracts\Io\Writer;
use BinaryStudioAcademy\Game\GameWorld;

class MineCommand extends AbstractCommand
{
    private $resourceTitle;
    private $gameWorld;

    private $availableResources = ['carbon', 'copper', 'fire', 'fuel', 'iron', 'sand', 'silicon', 'water'];

    public function __construct(GameWorld $gameWorld, Writer $writer, string $resourceTitle)
    {
        parent::__construct($writer);
        $this->resourceTitle = $resourceTitle;
        $this->gameWorld = $gameWorld;
    }

    private function checkResource():void
    {
        if (!in_array($this->resourceTitle, $this->availableResources)) {
            throw new \Exception("No such resource.\n");
        }
        return;
    }

    /**
     * Mine resource. Mining takes some time - $timeForMining
     */
    private function mineResource():void
    {
        //If we have this resource in out pack, we simply increase count of this resource
        if (isset($this->gameWorld->getAvailableResources()[$this->resourceTitle])) {
            $this->gameWorld->getAvailableResources()[$this->resourceTitle]['count']++;
        } else {
            //Else we create this resource in out pack and set the count = 1
            $materialName = '\BinaryStudioAcademy\Game\Resources\\' . ucfirst($this->resourceTitle);
            $this->gameWorld->getAvailableResources()[$this->resourceTitle]['resource'] = new $materialName;
            $this->gameWorld->getAvailableResources()[$this->resourceTitle]['count'] = 1;
        }
//        sleep($this->gameWorld->getAvailableResources()[$this->resourceTitle]['resource']->getTimeForMining());
        $this->writer->write(ucfirst($this->resourceTitle) . " added to inventory.\n");
        return;
    }

    public function process():void
    {
        try {
            $this->checkResource();
            $this->mineResource();
//            var_dump($this->gameWorld->getAvailableResources());
        } catch (\Exception $e) {
            $this->writer->write($e->getMessage());
        }
        return;
    }
}