<?php
require __DIR__ ."/../../../services/student/index.php";

$callback=function($value){ return updateVolunteerWork($value);};
api_response(userExtraData($callback));
