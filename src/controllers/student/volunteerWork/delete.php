<?php
require __DIR__ ."/../../../services/student/index.php";

function doDeleteVolunteerWork(){
  $post=json_post();
  $token=$post->token;
  $data=$post->data;
  return deleteData($token,'trabalhoVoluntario',$data);
}
api_response(doDeleteVolunteerWork());
