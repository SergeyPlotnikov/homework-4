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
     * Type or category of material
     * @var string
     */
    protected $type;
    /**
     * short description of material
     * @var string
     */
    protected $description;

    /**
     * @return mixed
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
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }
}