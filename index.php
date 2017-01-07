<?php
require 'Board.php';
$board  = new Board();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Game of life</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="css/styles.css" type="text/css">
    <script type="text/javascript" async="" src="js/core.js"></script>
</head>
<body>
    <div class="game-wrapper">
        <div class="board-wrapper">
            <?php echo $board->getHtml() ?>
        </div>
        <div class="buttons-wrapper">
            <button id="run-game" onclick="runGame()">Play</button>
            <button id="run-game" onclick="pauseGame()">Pause</button>
            <button id="run-game" onclick="nextMove()">Next Move</button>
        </div>
    </div>
</body>
</html>
