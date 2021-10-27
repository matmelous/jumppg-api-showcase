<?php
require __DIR__ . "/../../services/student/index.php";

function doUploadFile(){
	$post=$_POST;
  $files=$_FILES;
  return studentImageUpload($files,$post);
}
api_response(doUploadFile());