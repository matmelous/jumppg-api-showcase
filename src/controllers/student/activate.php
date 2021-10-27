<?php
require __DIR__ ."/../../services/student/index.php";


function activate(){
	$post=json_post();
  $token=$post->token;
  return activateStudent($token);
}
api_response(activate());