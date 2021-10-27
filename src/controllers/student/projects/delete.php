<?php
require __DIR__ ."/../../../services/student/index.php";

function doDeleteProjects(){
  $post=json_post();
  $token=$post->token;
  $data=$post->data;
  return deleteData($token,'projetos',$data);
}
api_response(doDeleteProjects());
