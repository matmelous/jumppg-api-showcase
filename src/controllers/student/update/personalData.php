<?php
require __DIR__ ."/../../../services/student/index.php";

$callback=function($value){ return updatePersonalData($value);};
api_response(updateUser($callback,1));
