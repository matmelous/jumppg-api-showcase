<?php
function login($mail,$password)
{
  $items=["id","created_at","ativo","nome","email","sexo","celular","nacionalidade","idade","linkedin","biografia","instituicao","area","ano","cursos","hardskills","softskills","cadStatus","userType"];
  $table='estudante';
  $where=[(object)["key"=>"email","value"=>$mail,"cond"=>"and"],(object)["key"=>"senha","value"=>$password,"cond"=>"and"],(object)["key"=>"ativo","value"=>"1"]]; 
  $users=selectAll($items, $table, $where);
  if(count($users)==0){
    return error(SessionErrors::NOT_FOUND);
  }
  $user=(object)$users[0];
  $session=createSession($user->id);
  $session->user=$user;

  return $session;
}
