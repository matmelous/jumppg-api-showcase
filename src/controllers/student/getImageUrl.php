<?php
require __DIR__ . "/../../services/student/index.php";


function doReadStudent(){
	$post=json_post();
	$token=$post->token;
  $response=readProfileImage($token);

	return($response);
}
api_response(doReadStudent());