<?php
require __DIR__ ."/../../../services/student/index.php";

function doDeleteDisciplineNotes(){
  $post=json_post();
  $token=$post->token;
  $data=$post->data;
  return deleteData($token,'notaDisciplina',$data);
}
api_response(doDeleteDisciplineNotes());
