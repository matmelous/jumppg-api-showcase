<?php
require __DIR__ . "/../../services/student/index.php";

function preareList(){
  $post=json_post();
  $token=$post->token;
  return(listStudent($token));
}
api_response(preareList());