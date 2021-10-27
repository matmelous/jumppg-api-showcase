<?php
require __DIR__ ."/../../services/student/index.php";

function prepareStudent(){
  $post=json_post();
  $valuesObject=$post;
  $mail=str_replace(" ","",strtolower($post->email));
  $name=$post->nome;
	$password=$post->senha;
	$password=hash('sha256',$mail.$password);
  $valuesObject->senha=$password;
  $valuesObject->ativo=1;
  $valuesObject->cadStatus=0;
  $valuesObject->userType='student';

  $values=objectToValues($valuesObject);

  return createStudent($values,$mail,$name);
}
api_response(prepareStudent());
