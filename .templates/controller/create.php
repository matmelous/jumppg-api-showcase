<?php
  require __DIR__ ."/../../../services/company/index.php";
  $callback=function($value){ return createCompany($value);};
  api_response(userExtraData(callback));