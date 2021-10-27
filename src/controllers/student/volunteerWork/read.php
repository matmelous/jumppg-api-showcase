<?php
require __DIR__ ."/../../../services/student/index.php";


function doReadVolunteerWork(){
  $post=json_post();
  $token=$post->token;
  $callback=function($value){ return readVolunteerWork($value);};
  return(userReadData($token,$callback));
}
api_response(doReadVolunteerWork());
