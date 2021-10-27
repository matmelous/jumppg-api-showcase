<?php

require __DIR__ . "/../../../services/student/index.php";
function doReadVacancy()
{
    $post = json_post();
    $token = $post->token;
    $callback = function ($value) {return studentReadVacancy($value);};
    return (userReadData($token, $callback));
}
api_response(doReadVacancy());
