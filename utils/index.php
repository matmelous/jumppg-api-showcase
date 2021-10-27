<?php

require __DIR__ . '/date.php';
require __DIR__ . '/number.php';
require __DIR__ . '/string.php';

function jsError($val)
{
    echo '<script> window.parent.error_log(' . $val . '); </script>';
}

function isJson($string)
{
    json_decode($string);
    return (json_last_error() == JSON_ERROR_NONE);
}
function error($errorMessage)
{
    $error = (object) [
        "success" => false,
        "error" => $errorMessage,
    ];

    return $error;
}

function response($message)
{
    $response = (object) [
        "success" => true,
        "message" => $message,
    ];
    return $response;
}

function dyingError($errorMessage)
{
    die(json_encode(error($errorMessage)));
}

function mustExists($value)
{
    if (!isset($value)) {
        return error('Valor é obrigatório');
    }
}

function json_post($array = false)
{
    return json_decode(file_get_contents("php://input"), $array);
}

function jsonPostFormattedForDatabase($values = [[], []])
{
    $post = json_post();

    if ($post != '') {
        $values = objectToValues($post, $values);
    }
    return $values;
}

function objectToValues($object, $values = [[], []])
{
    foreach ($object as $key => $value) {
        array_push($values[0], $key);
        array_push($values[1], $value);
    }
    return $values;
}

function raw_post()
{
    return file_get_contents("php://input");
}

function valuesObject($array)
{
    $object = new stdClass();
    foreach ($array[0] as $key => $value) {
        $object->$value = $array[1][$key];
    }
    return $object;
}

function randomPassword($length)
{
    $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
    for ($i = 0; $i < $length; $i++) {
        $n = rand(0, count($alphabet) - 1);
        $pass[$i] = $alphabet[$n];
    }
    return $pass;
}

function str_contains($string, $needle)
{
    return strpos($string, $needle) !== false;
}
