<?php
function readLanguage($id_estudante){
  $items=['id_estudante','idioma','proficiencia','id'];
  $table='idioma';
  return selectAll($items, $table, [(object)["key"=>"id_estudante","value"=>$id_estudante]]);
}

function userReadData($token,$callback){
  /*expect
    {
      "token":"",
    }
  */
  $session=checkToken($token);
  if(!$session->success){
    return $session;
  }

  $response=$callback($session->id);
  if(!is_array($response)){
    $response->token=$session->token;
    return $response;
  }
  $session->data=$response;
  return $session;
}

function readByEmail($email){
  
  $items=['id','nome','email'];
  $table='estudante';
  return selectAll($items, $table, [(object)["key"=>"email","value"=>$email]]);
}
function readByCNPJ($cnpj){
  
  $items=['id','nome','email'];
  $table='estudante';
  return selectAll($items, $table, [(object)["key"=>"cnpj","value"=>$cnpj]]);
}