<?php

function updateDatabaseProfileImage($values){
  
  $items=['imageUrl','cadStatus'];
  $table='estudante';
  $prefix='';
  return database_update( $prefix, $items, $table,$values);
}

function studentImageUpload($files,$post){
  
  $token=$post['token'];

  $session=checkToken($token);
  if(!$session->success){
    return $session;
  }
  
  try {
    //code...
    $inputFileName=$post['inputFileName'];
    $file= $files[$inputFileName]['name'];
    $folder='uploads/';
    $path=__DIR__.'/../../../'.$folder;

    $upload=fileUpload($file,$path,$inputFileName);
    if(!$upload->success){
      $upload->token=$session->token;
      return $upload;
    }
    $valuesObject=(object)[
      "id" => $session->id,
      "imageUrl" => $folder.$upload->fileName,
      "cadStatus" => '4'
    ];

    $values=objectToValues($valuesObject);
    
    updateDatabaseProfileImage($values);
    

    $session->data=$upload;
    return $session;
  } catch (\Throwable $th) {
    //throw $th;
    $session->success=false;
    $session->error=$th->getMessage();
    return $session;
  }
}