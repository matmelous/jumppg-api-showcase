<?php
require __DIR__ ."/../../../services/student/index.php";

function doDeleteLanguages(){
  $post=json_post();
  $token=$post->token;
  $data=$post->data;
  return deleteData($token,'idioma',$data);
}
api_response(doDeleteLanguages());
