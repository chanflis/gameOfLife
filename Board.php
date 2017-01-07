<?php
require 'Cell.php';
/**
 * Created by PhpStorm.
 * User: sgonzalez
 * Date: 3/01/17
 * Time: 05:50 PM
 */
class Board
{
    protected $_boardWidth  = 20;
    protected $_boardHeight = 20;

    protected $_boardArray;

    public function __construct($width = null,$height = null, $data = null)
    {
        if (!is_null($width)) $this->_boardWidth = $width;
        if (!is_null($height)) $this->_boardHeight = $height;

        $this->_boardArray = array();

        $this->_initBoard($data);
    }

    protected function _initBoard($data = null)
    {
        for ($y = 0; $y < $this->_boardHeight; $y++){
            for ($x = 0; $x < $this->_boardWidth; $x++){
                $cell = new Cell();

                if (!is_null($data) && isset($data[$x][$y])){
                    $cell->setStatus(Cell::CELL_STATUS_LIVE);
                }
                $this->_boardArray[$x][$y] = $cell;
            }
        }
    }

    public function evaluateTurn()
    {
        for ($y = 0; $y < $this->_boardHeight; $y++){
            for ($x = 0; $x < $this->_boardWidth; $x++){
                /** @var Cell $cell */
                $cell = $this->_boardArray[$x][$y];
                $cell->setAliveNeighbors($this->getAliveNeighbors($x,$y));
                $cell->evaluate();
            }
        }
    }

    public function getNeighbors($x,$y)
    {
        $neighbors = array();

        if (isset($this->_boardArray[$x-1][$y]))
            $neighbors[$x-1][$y] = 1;
        if (isset($this->_boardArray[$x-1][$y-1]))
            $neighbors[$x-1][$y-1] = 1;
        if (isset($this->_boardArray[$x][$y-1]))
            $neighbors[$x][$y-1] = 1;
        if (isset($this->_boardArray[$x+1][$y]))
            $neighbors[$x+1][$y] = 1;
        if (isset($this->_boardArray[$x+1][$y+1]))
            $neighbors[$x+1][$y+1] = 1;
        if (isset($this->_boardArray[$x][$y+1]))
            $neighbors[$x][$y+1] = 1;
        if (isset($this->_boardArray[$x-1][$y+1]))
            $neighbors[$x-1][$y+1] = 1;
        if (isset($this->_boardArray[$x+1][$y-1]))
            $neighbors[$x+1][$y-1] = 1;

        return $neighbors;
    }

    public function getAliveNeighbors($x,$y)
    {
        $neighborsAliveCount = 0;

        if (isset($this->_boardArray[$x-1][$y])   && $this->_boardArray[$x-1][$y]->getStatus()   == Cell::CELL_STATUS_LIVE)
            $neighborsAliveCount++;
        if (isset($this->_boardArray[$x-1][$y-1]) && $this->_boardArray[$x-1][$y-1]->getStatus() == Cell::CELL_STATUS_LIVE)
            $neighborsAliveCount++;
        if (isset($this->_boardArray[$x][$y-1])   && $this->_boardArray[$x][$y-1]->getStatus()   == Cell::CELL_STATUS_LIVE)
            $neighborsAliveCount++;
        if (isset($this->_boardArray[$x+1][$y])   && $this->_boardArray[$x+1][$y]->getStatus()   == Cell::CELL_STATUS_LIVE)
            $neighborsAliveCount++;
        if (isset($this->_boardArray[$x+1][$y+1]) && $this->_boardArray[$x+1][$y+1]->getStatus() == Cell::CELL_STATUS_LIVE)
            $neighborsAliveCount++;
        if (isset($this->_boardArray[$x][$y+1])   && $this->_boardArray[$x][$y+1]->getStatus()   == Cell::CELL_STATUS_LIVE)
            $neighborsAliveCount++;
        if (isset($this->_boardArray[$x-1][$y+1]) && $this->_boardArray[$x-1][$y+1]->getStatus() == Cell::CELL_STATUS_LIVE)
            $neighborsAliveCount++;
        if (isset($this->_boardArray[$x+1][$y-1]) && $this->_boardArray[$x+1][$y-1]->getStatus() == Cell::CELL_STATUS_LIVE)
            $neighborsAliveCount++;

        return $neighborsAliveCount;
    }

    public function getHtml()
    {
        $html = '';
        $html.= '<div id="board-container">';
        for ($y = 0; $y < $this->_boardHeight; $y++){
            $html.= '<div class="row-item">';
            for ($x = 0; $x < $this->_boardWidth; $x++){
                /** @var Cell $cell */
                $cell = $this->_boardArray[$x][$y];
                $active = $cell->getNewStatus() ? 'active' : '';
                $html.= "<div class='square-item $active' id='$x-$y'></div>";
            }
            $html.= '</div>';
        }
        $html.= '</div>';
        return $html;
    }
}