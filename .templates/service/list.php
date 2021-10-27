<?php

function listStudent(){
  $itens=['id','nome','email','senha','ativo','cadStatus'];
  $tabela='estudante';
	$response = selectAll($itens, $tabela);
  return $response;
}
function readStudent($token){
  $session=checkToken($token);
  if(!$session->success){
    return $session;
  }

  $id_estudante=$session->id;

  $items=["id","created_at","ativo","nome","email","sexo","celular","nacionalidade","idade","linkedin","biografia","instituicao","area","ano","cursos","hardskills","softskills","cadStatus"];
  $table='estudante';
  $where=[(object)["key"=>"id","value"=>$id_estudante]]; 
  $users=selectAll($items, $table, $where);
  if(count($users)==0){
    return error(SessionErrors::NOT_FOUND);
  }
  $user=(object)$users[0];
  $session=createSession($user->id);
  $session->user=$user;

  return $session;
}

function readProfileImage($token){
  $session=checkToken($token);
  if(!$session->success){
    return $session;
  }

  $id_estudante=$session->id;


  $items=["id","imageUrl","nome"];
  $table='estudante';
  $where=[(object)["key"=>"id","value"=>$id_estudante]]; 
  $users=selectAll($items, $table, $where);
  if(count($users)==0){
    return error(SessionErrors::NOT_FOUND);
  }
  $user=(object)$users[0];
  $newSession=createSession($user->id);
  $newSession->data=$user;

  return $newSession;
}
