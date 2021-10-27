<?php
function createCompany($token,$values,$mail,$name,$cnpj){
  $session=checkToken($token);
  if(!$session->success){
    return $session;
  }

  $company = readByCNPJ($cnpj);

  if(count($company)>0){
    $error= error(CompanyErrors::COMPANY_EXISTS_CNPJ);
    $error->token=$session->token;
    return $error;
  }

  $company2 = readByEmail($mail);

  if(count($company2)>0){
    $error= error(CompanyErrors::COMPANY_EXISTS_MAIL);
    $error->token=$session->token;
    return $error;
  }

  $items=["nome","email","senha","ativo","userType","razaoSocial","cnpj","inscricaoMunicipal","inscricaoEstadual","telefone","celular","endereco","cep","cidade","estado"];
  $table='estudante';
  $prefix='';
  $required=true;
  $response_user = database_insert($prefix, $items, $table, $values, $required);
  if(!$response_user->success){
    $response_user->token=$session->token;
    return $response_user;
  }
  $userId=$response_user->id;
  $session->id=$userId;

  /*
  $token=createToken($mail);
  $response_token=insertToken($token,$userId);
  if(!$response_token->success){
    return $response_token;
  }

  if(sendToken($name,$mail,$token)){
    return response(CompanyConstants::SUCCESS);
  }else{
    return error(MailErrors::SEND);
  }*/

  return $session;

}
