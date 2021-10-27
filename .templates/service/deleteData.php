<?php
function deleteData($token,$table,$dataArray){
  /*expect
    {
      "token":"",
      data:[
        {id:''}
      ]
    }


  */
  $session=checkToken($token);
  if(!$session->success){
    return $session;
  }

  $id_estudante=$session->id;

  foreach($dataArray as $data){
    $response= softDelete(
      $table, 
      [ 
        (object)[
          "key"=>"id",
          "value"=>$data->id, 
          "cond"=>"and"
        ], 
        (object)[
          "key"=>"id_estudante",
          "value"=>$id_estudante
        ]
      ]
    );

    if(!$response->success){
      $response->token=$session->token;
      return $response;
      break;
    }
  }
  return $session;
}