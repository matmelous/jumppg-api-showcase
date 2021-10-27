<?php
require __DIR__ ."/../../../services/student/index.php";

$callback=function($value){ return updateAcademicInfo($value);};
api_response(updateUser($callback,3));
