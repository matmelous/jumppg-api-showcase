<?php
require __DIR__ ."/../../../services/student/index.php";


function activate(){
	$post=json_post();
  $token=$post->token;
  $password=$post->password;
  $mail=$post->mail;
	$password=hash('sha256',$mail.$password);
  return updatePassword($token,$password);
}
api_response(activate());