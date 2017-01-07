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

    public function __construct()
    {
        $this->_status = self::CELL_STATUS_DEAD;
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

}