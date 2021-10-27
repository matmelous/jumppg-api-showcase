<?php
require __DIR__ ."/../../../services/student/index.php";

$callback=function($value){ return createProject($value);};
api_response(userExtraData($callback,6));
