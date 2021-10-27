<?php
require __DIR__ ."/../../../services/student/index.php";

$callback=function($value){ return createVolunteerWork($value);};
api_response(userExtraData($callback,10));
