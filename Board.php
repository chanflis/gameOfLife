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
    protected $_boardWidth;
    protected $_boardHeight;

    protected $_boardArray;

    public function __construct($width,$height)
    {
        $this->_boardWidth  = $width;
        $this->_boardHeight = $height;

        $this->_boardArray = array();

        $this->_initBoard();
    }

    protected function _initBoard()
    {
        for ($y = 0; $y < $this->_boardHeight; $y++){
            for ($x = 0; $x < $this->_boardWidth; $x++){
                $cell = new Cell();
                $this->_boardArray[$x][$y] = $cell;
            }
        }
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
                $html.= "<div class='square-item' id='cell-$x-$y'></div>";
            }
            $html.= '</div>';
        }
        $html.= '</div>';
        return $html;
    }
}