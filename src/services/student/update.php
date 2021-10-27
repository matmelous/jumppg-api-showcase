<?php
function updatePersonalData($values){
  $items=['celular','sexo','nacionalidade','idade','cadStatus'];
  $table='estudante';
  $prefix='';
  return database_update( $prefix, $items, $table,$values);
}

function updateAbout($values){
  $items=['linkedin','biografia','cadStatus'];
  $table='estudante';
  $prefix='';
  return database_update( $prefix, $items, $table,$values);
}

function updateAcademicInfo($values){
  $items=['instituicao','area','ano','cadStatus'];
  $table='estudante';
  $prefix='';
  return database_update( $prefix, $items, $table,$values);
}

function updateMoreInfo($values){
  $items=['cursos','hardSkills','softSkills','cadStatus'];
  $table='estudante';
  $prefix='';
  return database_update( $prefix, $items, $table,$values);
}

function updateCadStatus($id,$status){
  
  $valuesObject=(object)["id"=>$id,"cadStatus"=>$status];
  $values=objectToValues($valuesObject);
  $items=['cadStatus'];
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

function userExtraData($callback,$cadSTatus=null){
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
  if($cadSTatus!=null){
    $updateResult= updateCadStatus($session->id,$cadSTatus);
    if(!$updateResult->success){
      $updateResult->token=$session->token;
      return $updateResult;
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
