<?php

function fileUpload( $file, $destination,$inputFileName) {

	$nomef=$file;
	
	$ext='';
	$nome=$nomef;
	$onome=$nome;
	$gb=glob($destination.$file);
	
	$pt=explode('.',$nome);
	$tot=$file;
	$midle='';
	
	if(isset($pt[1])){
		$tot='';
		for($e=0;$e<(count($pt)-1);$e++){
			$tot=$tot.$midle.$pt[$e];
			$midle='.';
		}
		$ext=$pt[(count($pt)-1)];
		
	}
	$onome=$pt[0];
	$nomeBase=$tot;
	if(isset($gb[0])){
		
	
		$d=1;
		
		$last=0;
		
		
		while($last != $d or $last==0){
			$last=$d;
			$gasb=glob($destination.$tot.' ('.$d.')'.$midle.$ext);
			if(isset($gasb[0])){
			$d++;
			}
		}
		$nome=$tot.' ('.$d.')'.$midle.$ext;
		
		$onome=$tot.' ('.$d.')';
	
	}
	$alters=array($nomef,$nome);
	
	
	$next=strtolower($ext);
	if($next == 'jpg'  or $next == 'png'  or $next == 'bmp'  or $next == 'gif'){
		$tipo='image';
	}else{
		$tipo='nope';
	}
	
	if (move_uploaded_file($_FILES[$inputFileName]['tmp_name'], $destination.$nome)) {

    $response=response('Upload concluido com sucesso!');
    $response->fileName=$nome;
    return $response;
	}else{
		$errors=['','UPLOAD_ERR_INI_SIZE | The uploaded file exceeds the upload_max_filesize directive in php.ini','UPLOAD_ERR_FORM_SIZE | The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form','UPLOAD_ERR_PARTIAL  | The uploaded file was only partially uploaded','UPLOAD_ERR_NO_FILE | No file was uploaded','','UPLOAD_ERR_NO_TMP_DIR  | Missing a temporary folder. Introduced in PHP 5.0.3','UPLOAD_ERR_CANT_WRITE | Failed to write file to disk. Introduced in PHP 5.1.0','UPLOAD_ERR_EXTENSION | A PHP extension stopped the file upload. PHP does not provide a way to ascertain which extension caused the file upload to stop; examining the list of loaded extensions with phpinfo() may help'];
		$msgns=['','O arquivo enviado é grande demais','O formulário enviado é grande demais','O upload foi paralisado na metade','O arquivo não foi enviado','','A pasta temporária não foi encontrada','Não foi possível salvar o arquivo na pasta de destino','Uma extensão do PHP paralisou o upload'];
    $errorObj= error($msgns[$_FILES[$inputFileName]["error"]]);
    $errorObj->error_cod = $_FILES[$inputFileName]["error"];
    $errorObj->error_info = $errors[$_FILES[$inputFileName]["error"]];
    return $errorObj;
	}
}