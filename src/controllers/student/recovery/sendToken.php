<?php
require __DIR__ ."/../../../services/student/index.php";


function activate(){
	$post=json_post();
  $email=$post->email;
  
  $student = readByEmail($email);

  if(count($student)===0){
    return error(StudentErrors::NOT_FOUND);
  }

  $userId=$student[0]['id'];
  $name=$student[0]['nome'];
  $token=createToken($email);
  $response_token=insertToken($token,$userId);
  if(!$response_token->success){
    return $response_token;
  }


  if(sendRecoveryToken($name,$email,$token)){
    return response(StudentConstants::RECOVERY_TOKEN_SENT);
  }
  
}
api_response(activate());