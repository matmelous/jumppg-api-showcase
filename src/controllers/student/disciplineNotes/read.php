<?php
require __DIR__ ."/../../../services/student/index.php";


function doReadDisciplineNotes(){
  $post=json_post();
  $token=$post->token;
  $callback=function($value){ return readDisciplineNote($value);};
  return(userReadData($token,$callback));
}
api_response(doReadDisciplineNotes());
