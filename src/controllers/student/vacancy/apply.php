<?php
  require __DIR__ ."/../../../services/student/index.php";
  $callback=function($value){ return createStudentApplied($value);};
  api_response(userExtraData($callback));