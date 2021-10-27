<?php
require __DIR__ ."/../../../services/student/index.php";

$callback=function($value){ return updateLanguage($value);};
api_response(userExtraData($callback));
