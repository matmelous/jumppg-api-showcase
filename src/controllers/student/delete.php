<?php
require __DIR__ ."/../../services/student/index.php";

function doDelete(){
  $post=json_post();
  $token=$post->token;
  return deleteStudent($token);
}
api_response(doDelete());
