<?php

namespace BinaryStudioAcademy\Game\Commands;

class ExitCommand extends AbstractCommand
{
    public function process():void
    {
        $this->writer->write("Game is over!\n");
        exit();
    }
}