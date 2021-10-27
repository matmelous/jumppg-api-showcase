<?php
function updatePersonalData($values){
  $items=['celular','sexo','nacionalidade','idade','cadStatus'];
  $table='estudante';
  $prefix='';
  return database_update( $prefix, $items, $table,$values);
}

function updateUser($callback,$cadSTatus){
  $post=json_post();
  
  $token=$post->token;
  $session=checkToken($token);
  if(!$session->success){
    return $session;
  }

  $valuesObject=$post;
  $valuesObject->id=$session->id;
  $valuesObject->cadStatus=$cadSTatus;

  $values=objectToValues($valuesObject);

  $updateResult= $callback($values);
  if($updateResult->success){
    $session->new_values=$updateResult->new_values;
    return $session;
  }
  return $updateResult;
}

function userExtraData($callback){
  /*expect
    {
      "token":"",
      data:[
        {idioma:'',proficiencia:''}
      ]
    }


  */
  $post=json_post();
  
  $token=$post->token;
  $session=checkToken($token);
  if(!$session->success){
    return $session;
  }

  foreach($post->data as $data){
    $data->id_estudante=$session->id;
    $values=objectToValues($data);
    $response=$callback($values);
    if(!$response->success){
      $response->token=$session->token;
      return $response;
      break;
    }
  }
  return $session;
}


function updatePassword($token,$newPassword){
  $session=checkToken($token);
  if(!$session->success){
    return $session;
  }
  $valuesObject=(object)["id"=>$session->id,"senha"=>$newPassword];
  $values=objectToValues($valuesObject);
  $items=['senha'];
  $table='estudante';
  $prefix='';
  $update= database_update( $prefix, $items, $table,$values);
  if(!$update->success){
    return $update;
  }

  return $session;

}
