<?php
require __DIR__ ."/../../services/student/index.php";

function doLogin(){
	$post=json_post();
	$password=$post->senha;
	$mail=str_replace(" ","",strtolower($post->email));
	$password=hash('sha256',$mail.$password);
  return login($mail,$password);
}
api_response(doLogin());