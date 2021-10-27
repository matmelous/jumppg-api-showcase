<?php
function createStudent($values,$mail,$name){

  $student = readByEmail($mail);

  if(count($student)>0){
    return error(StudentErrors::STUDENT_EXISTS);
  }

  $items=['nome','email','senha','ativo','cadStatus','userType'];
  $table='estudante';
  $prefix='';
  $required=true;
  $response_user = database_insert($prefix, $items, $table, $values, $required);
  if(!$response_user->success){
    return $response_user;
  }
  $userId=$response_user->id;
  $token=createToken($mail);
  $response_token=insertToken($token,$userId);
  if(!$response_token->success){
    return $response_token;
  }

  if(sendToken($name,$mail,$token)){
    $success= response(StudentConstants::SUCCESS);
    $success->token=$token;
    return $success;
  }else{
    $error=error(MailErrors::SEND);
    $error->token=$token;
    return $error;
  }
}
