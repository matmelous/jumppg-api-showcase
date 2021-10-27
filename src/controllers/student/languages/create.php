<?php
require __DIR__ ."/../../../services/student/index.php";

$callback=function($value){ return createLanguage($value);};
api_response(userExtraData($callback,5));
