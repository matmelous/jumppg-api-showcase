<?php
require __DIR__ ."/../../../services/student/index.php";


function doReadProjects(){
  $post=json_post();
  $token=$post->token;
  $callback=function($value){ return readProject($value);};
  return(userReadData($token,$callback));
}
api_response(doReadProjects());
