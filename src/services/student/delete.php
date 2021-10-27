<?php
function deleteStudent($token){
  $session=checkToken($token);
  if(!$session->success){
    return $session;
  }
  $table="estudante";
  $result= softDelete(
      $table, 
      [ 
        (object)[
          "key"=>"id",
          "value"=>$session->id, 
        ]
      ]
    );
    
  if($result->success){
    $session->message="Estudante removido com sucesso!";
    return $session;
  }
  
$result->token=$session->token;
  return $result;
}