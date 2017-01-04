<?php

/**
 * Created by PhpStorm.
 * User: sgonzalez
 * Date: 3/01/17
 * Time: 04:58 PM
 */
class Grid
{
    const SQUARE_WIDTH  = 10;
    const SQUARE_HEIGHT = 10;

    protected $_boardSize;
    protected $_squareStyle;

    public function __construct($size)
    {
        $this->_boardSize = $size;
        $this->_setSquareStyle();
    }

    protected function _setSquareStyle()
    {
        $this->_squareStyle = printf('style="width: %spx; height: %spx; background-color: blue"',self::SQUARE_WIDTH,self::SQUARE_HEIGHT);
    }

    public function getHtml()
    {
        $html = '';
        $style = $this->_squareStyle;

        for ($y = 0; $y < self::SQUARE_HEIGHT; $y++){
            $html.= '<div class="row">';
            for ($x = 0; $x < self::SQUARE_WIDTH; $x++){
                $html .= "<div class='square'>$x,$y</div>";
            }
            $html.= '</div>';
        }

        return $html;
    }
}