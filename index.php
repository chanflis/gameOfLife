<?php
require 'Grid.php';
require 'Render.php';
require 'Board.php';
$render = new Render();
//$grid = new Grid(10);
$board = new Board(10,10);

$render->setBody($board->getHtml());
$render->appendHead('<link rel="stylesheet" href="css/styles.css" type="text/css">');
$render->appendHead('<script type="text/javascript" async="" src="js/core.js"></script>');

//$render->render();

$render->render();
