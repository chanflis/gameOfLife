<?php
require 'Render.php';
require 'Board.php';

$render = new Render();
$board  = new Board();

$render->appendHead('<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>');
$render->appendHead('<link rel="stylesheet" href="css/styles.css" type="text/css">');
$render->appendHead('<script type="text/javascript" async="" src="js/core.js"></script>');

$render->setBody($board->getHtml());
$render->appendBody('<button id="run-game" onclick="runGame()">Play</button>');

$render->render();
