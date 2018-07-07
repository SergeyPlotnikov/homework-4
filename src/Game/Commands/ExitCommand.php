<?php
/**
 * Created by PhpStorm.
 * User: Serhii
 * Date: 07.07.2018
 * Time: 0:50
 */

namespace BinaryStudioAcademy\Game\Commands;


class ExitCommand extends AbstractCommand
{
    public function process():void
    {
        exit();
    }
}