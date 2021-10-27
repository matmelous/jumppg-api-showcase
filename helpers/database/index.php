<?php

function mysqli()
{
    global $ambiente;

    $srv = $_SERVER['SERVER_NAME'];
    if ($srv == 'localhost' || $srv == '127.0.0.1') {
        $ambiente = 2;
    }
    if ($srv == 'dev.api.jumppg.com.br') {
        $ambiente = 1;
    }

    if ($ambiente == 0) {
        $link = mysqli_connect('localhost', 'digi8747_jumppg', "AVCgVn9An9u", 'digi8747_jumppg');
    } else if ($ambiente == 2) {
        $link = new mysqli('127.0.0.1', 'root', '', 'jumppg');
    } else if ($ambiente == 1) {
        $link = mysqli_connect('localhost', 'digi8747_dev_jpg', "AVCgVn9An9u", 'digi8747_dev_jumppg');
    }
    if (!$link) {
        echo "Error: Unable to connect to MySQL." . PHP_EOL;
        echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
        echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
        exit;
    } else {
        return ($link);
    }
}

require __DIR__ . '/delete.php';
require __DIR__ . '/insert.php';
require __DIR__ . '/numOfRows.php';
require __DIR__ . '/select.php';
require __DIR__ . '/update.php';
