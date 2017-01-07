<?php

require 'Board.php';

if(isset($_POST['activeCells'])){
    $activeCells = json_decode($_POST['activeCells']);

    $data = array();
    foreach ($activeCells as $cell){
        $data[$cell[0]][$cell[1]] = 1;
    }

    $board  = new Board(null,null,$data);

    $board->evaluateTurn();

    $response = array();
    $response['status'] = 1;
    $response['board']  = $board->getHtml();

    echo json_encode($response);

}
