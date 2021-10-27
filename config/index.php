<?php
date_default_timezone_set('America/Sao_Paulo');
$srv = $_SERVER['SERVER_NAME'];
$dominio = "api.jumppg.matheusdeveloper.com.br";
$local = '';
$ambiente = 0;
if ($srv == 'localhost' || $srv == '127.0.0.1') {
	$ambiente = 2;
}
$srv = $_SERVER['SERVER_NAME'];
