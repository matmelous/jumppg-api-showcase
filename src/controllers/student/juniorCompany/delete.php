<?php
require __DIR__ ."/../../../services/student/index.php";

function doDeleteJuniorCompanies(){
  $post=json_post();
  $token=$post->token;
  $data=$post->data;
  return deleteData($token,'empresaJunior',$data);
}
api_response(doDeleteJuniorCompanies());
