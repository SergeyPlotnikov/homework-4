<?php
namespace BinaryStudioAcademy\Game\Resources;

class Sand extends Material
{
    public function __construct()
    {
        $this->title = 'sand';
        $this->description = "Sand is a naturally occurring granular material composed of finely divided rock and mineral 
        particles. It is defined by size, being finer than gravel and coarser than silt. Sand can also refer to a
         textural class of soil or soil type; i.e., a soil containing more than 85 percent sand-sized particles by mass.";
    }
}