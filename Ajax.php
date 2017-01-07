<?php

require 'Board.php';

if(isset($_POST['activeCells'])){
    $activeCells = json_decode($_POST['activeCells']);

    $data = array();
    foreach ($activeCells as $cell){
        $data[$cell[0]][$cell[1]] = 1;
    }
    var_dump($data);

    $board  = new Board(10,10,$data);

}

/**
 * Created by PhpStorm.
 * User: sgonzalez
 * Date: 6/01/17
 * Time: 04:36 PM
 */
class Ajax
{

}