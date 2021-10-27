<?php
require __DIR__ ."/../../../services/student/index.php";


function doReadJuniorCompanies(){
  $post=json_post();
  $token=$post->token;
  $callback=function($value){ return readJuniorCompany($value);};
  return(userReadData($token,$callback));
}
api_response(doReadJuniorCompanies());
