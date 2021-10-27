<?php
require __DIR__ ."/../../../services/student/index.php";

$callback=function($value){ return updateJuniorCompany($value);};
api_response(userExtraData($callback));
