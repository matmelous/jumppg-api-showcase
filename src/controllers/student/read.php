<?php
require __DIR__ . "/../../services/student/index.php";

function doReadStudent(){
	$post=json_post();
	$token=$post->token;
  return readStudent($token);
}
api_response(doReadStudent());