<?php
require __DIR__ ."/../../../services/student/index.php";

$callback=function($value){ return updateAbout($value);};
api_response(updateUser($callback,2));
