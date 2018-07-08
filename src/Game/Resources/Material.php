<?php
namespace BinaryStudioAcademy\Game\Resources;

abstract class Material
{
    /**
     * The title of material
     * @var string
     */
    protected $title;

    /**
     * Is this resource combine?
     * @var bool
     */
    protected $isCombine = false;


    /**
     * short description of material
     * @var string
     */
    protected $description;



    /**
     * @return string
     */
    public function getTitle():string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }


    /**
     * @return boolean
     */
    public function isIsCombine(): bool
    {
        return $this->isCombine;
    }
}