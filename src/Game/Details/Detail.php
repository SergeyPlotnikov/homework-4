<?php
namespace BinaryStudioAcademy\Game\Details;

abstract class Detail
{
    protected $necessaryResources = [];


    protected $combineDetail = false;
    /**
     * if status=false,consequently this detail isn't ready yet
     * @var bool
     */
    protected $status = false;
    protected $title;

    public function getNecessaryResources(): array
    {
        return $this->necessaryResources;
    }

    /**
     * @return boolean
     */
    public function isStatus(): bool
    {
        return $this->status;
    }

    /**
     * @param boolean $status
     */
    public function setStatus(bool $status)
    {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return boolean
     */
    public function isCombineDetail(): bool
    {
        return $this->combineDetail;
    }
}