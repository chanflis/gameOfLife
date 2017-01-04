<?php
require 'Grid.php';
require 'Render.php';
require 'Board.php';
$render = new Render();
//$grid = new Grid(10);
$board = new Board(10,10);

$render->setBody($board->getHtml());
//$render->render();

$render->render();
