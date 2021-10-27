<?php
require __DIR__ ."/../../services/student/index.php";

function check(){
	$post=json_post();
  $token=$post->token;
  return checkToken($token);
}
api_response(check());