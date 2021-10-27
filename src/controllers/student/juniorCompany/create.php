<?php
require __DIR__ ."/../../../services/student/index.php";

$callback=function($value){ return createJuniorCompany($value);};
api_response(userExtraData($callback,7));
