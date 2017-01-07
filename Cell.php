<?php

/**
 * Created by PhpStorm.
 * User: sgonzalez
 * Date: 3/01/17
 * Time: 04:58 PM
 */
class Cell
{
    const CELL_STATUS_LIVE = true;
    const CELL_STATUS_DEAD = false;

    private $_status;
    private $_newStatus;
    private $_neighbors;
    private $_aliveNeighbors;

    public function __construct()
    {
        $this->_status    = self::CELL_STATUS_DEAD;
        $this->_newStatus = self::CELL_STATUS_DEAD;
    }

    public function kill()
    {
        $this->_newStatus = self::CELL_STATUS_DEAD;
    }

    public function born()
    {
        $this->_newStatus = self::CELL_STATUS_LIVE;
    }

    public function getStatus()
    {
        return $this->_status;
    }

    public function getNewStatus()
    {
        return $this->_newStatus;
    }

    public function setStatus($status)
    {
        $this->_status = $status;
    }

    public function setNewStatus($newStatus)
    {
        $this->_newStatus = $newStatus;
    }

    public function statusHasChanged()
    {
        return $this->_status != $this->_newStatus;
    }

    public function getNeighbors()
    {
        return $this->_neighbors;
    }

    public function setNeighbors($neighbors)
    {
        $this->_neighbors = $neighbors;
    }

    public function getAliveNeighbors()
    {
        return $this->_aliveNeighbors ? $this->_aliveNeighbors  : 0;
    }

    public function setAliveNeighbors($neighbors)
    {
        $this->_aliveNeighbors = $neighbors;
    }

    public function evaluate()
    {
        if ($this->_aliveNeighbors < 2)
            $this->kill();
        else if($this->_aliveNeighbors > 3)
            $this->kill();
        else if ($this->_aliveNeighbors == 3)
            $this->born();
        else if ($this->_aliveNeighbors == 2)
            $this->setNewStatus($this->getStatus());
    }




}