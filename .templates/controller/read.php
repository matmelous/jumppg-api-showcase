<?php
require __DIR__ ."/../../../services/student/index.php";


function doReadLanguages(){
  $post=json_post();
  $token=$post->token;
  $callback=function($value){ return readLanguage($value);};
  return(userReadData($token,$callback));
}
api_response(doReadLanguages());
