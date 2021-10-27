<?php
require __DIR__ ."/../../../services/student/index.php";

$callback=function($value){ return updateMoreInfo($value);};
api_response(updateUser($callback,9));
