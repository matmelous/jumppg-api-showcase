<?php

function activateStudent($token){
  $session=checkToken($token);
  if(!$session->success){
    return $session;
  }
  $items=['ativo'];
  $table='estudante';
  $prefix='';
  $values=objectToValues((object)['ativo'=>1,'id'=>$session->id]);
  $update=database_update($prefix, $items, $table, $values);
  if(!$update->success){
    return $update;
  }
  return $session;
}
