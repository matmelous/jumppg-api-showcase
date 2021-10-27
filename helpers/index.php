<?php

error_reporting(E_ALL);
ini_set("display_errors", "On");

if (!function_exists('mysqli_init') && !extension_loaded('mysqli')) {
	die('We don\'t have mysqli!!! | verifique o php.ini e remova o (;) antes da extensão mysqli | talvez não tenha instalado no linux, neste caso  execute: sudo apt-get update; sudo apt-get install php-mysql; sudo service apache2 restart; ');
}

require __DIR__ . "/../config/index.php";
require __DIR__ . "/../utils/index.php";
require __DIR__ . "/database/index.php";


function api_listar($itens, $tabela, $where = null, $order = '', $indexar = false)
{
	try {
		header('Content-Type: application/json');
		$response = selectAll($itens, $tabela, $where, $order, $indexar);
		print_r(json_encode($response));
	} catch (Exception $error) {
		$errorMessage = $error->getMessage();
		api_error($errorMessage);
	}
}

function api_cadastrar($pref, $itens, $tabela, $internos = [[], []], $obrigatorio = true)
{
	$newInternos=jsonPostFormattedForDatabase($internos);
	$response = database_insert($pref, $itens, $tabela, $newInternos, $obrigatorio);
	api_response($response);
}

function api_editar($pref, $itens, $tabela, $internos = [[], []], $obrigatorio = false, $id = 'id', $extra = '')
{
	$newInternos=jsonPostFormattedForDatabase($internos);
	$response = database_update( $pref, $itens, $tabela,$newInternos, $obrigatorio, $id, $extra);
	api_response($response);
}

function api_excluir($tabela, $coluna, $id, $where = '')
{
	$response = database_delete($tabela, $coluna, $id, $where);
	api_response($response);
}

function api_response($object)
{
	try {
		header('Content-Type: application/json');
		print_r(json_encode($object));
	} catch (Exception $e) {
	  http_response_code(500);
		print_r($object);
	}
}

function api_success(){
	 $response	 = (object) [
			"success" => true
	 ];
	api_response($response);
}


function checkReponse($object)
{
	try {
		// cors();
		if(!$object->success){
	  	http_response_code(500);
			die(json_encode($object));
		}
	} catch (Exception $e) {
	  http_response_code(500);
		die($object);
	}
}

function api_error($errorMessage)
{
	// cors();
  http_response_code(500);
	$response = error($errorMessage);
	api_response($response);
}



$local = '';
$local2 = $_SERVER['DOCUMENT_ROOT'];
if ($srv == 'localhost' || $srv == '127.0.0.1') {
	$local = '/jumppg.com.br';
	$local2 = $_SERVER['DOCUMENT_ROOT'] . '/jumppg.com.br';
}

function posted($post, $values)
{

	foreach ($values as $value) {
		if (!isset($post[$value])) {
			die('{"erro":"Valor ' . $value . ' não encontrado"}');
		}
	}
	return true;
}

require __DIR__ . "/upload.php";
