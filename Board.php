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
    const SQUARE_WIDTH  = 10;
    const SQUARE_HEIGHT = 10;

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
        for ($y = 0; $y < $this->_boardHeight; $y++){
            for ($x = 0; $x < $this->_boardWidth; $x++){
                /** @var Cell $cell */
                $cell = $this->_boardArray[$x][$y];
                $html.= '<div></div>';
            }
        }
        return $html;
    }
}