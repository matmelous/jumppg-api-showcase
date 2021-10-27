<?php

error_reporting(E_ALL);
ini_set("display_errors", "On");


function enviarEmail($nomeDestinatario, $emailDestinatario, $assunto, $mensagem, $nomeRemetente, $emailRemetente, $senha, $reply)
{
	ini_set("include_path", '/home2/digi8747/php:' . ini_get("include_path"));
 
	require_once "Mail.php";
	global $dominio;
	if ($nomeRemetente == 'auto') {
		$nomeRemetente = 'Auto - JumpPG';
		$emailRemetente = 'auto@jumppg.com.br';
		$senha = 'PH3oHLEbuGkL';
		$reply = 'contato@jumppg.com.br';
	}

	$from = $nomeRemetente . " <" . $emailRemetente . ">";
	$to = $nomeDestinatario . " <" . $emailDestinatario . ">";
	$subject = $assunto;
	$body = $mensagem;

	$port = "465";

	$host = "ssl://mail.jumppg.com.br";
	$username = $emailRemetente;

	$password = $senha;

	$headers = array('From' => $from,   'To' => $to,   'Subject' => $subject, 'Content-type' => ' text/html; charset=UTF-8', 'Reply-To' => $reply);
	$smtp = Mail::factory('smtp',   array('host' => $host,     'port' => $port,     'auth' => true,     'username' => $username,     'password' => $password));

	$mail = $smtp->send($to, $headers, $body);

	if (PEAR::isError($mail)) {
		return ($mail->getMessage());
	} else {
		return (true);
	}
}


function gerarEmail($titulo = 'Jump PG ', $nomeDest = 'Matheus', $emailDest = 'matmelous@gmail.com', $nomeRem = 'auto', $emailRem = 'auto', $senhaRem = 'auto', $respond = 'auto', $titulo2 = 'Jump PG ', $mensagem1 = '', $linkbtn1 = '', $textobtn1 = '', $stylebtn1 = 'display:none', $mensagem2 = '', $novaslinhas = '', $linklogo = 'https://jumppg.com.br/imagens/icon.png', $altlogo = 'Jump PG ', $remetente = 'Equipe Jump PG', $link1 = 'https://jumppg.com.br', $desclink1 = 'jumppg.com.br', $contatos = '(42) 9 0000-0000   |   contato@jumppg.com.br', $endereco = '- Ponta Grossa - Paraná', $styleEndereco = '')
{

	if ($endereco == '') {
		$styleEndereco = 'display:none';
	}
	if ($linkbtn1 != '' and $stylebtn1 == '') {
		
		$stylebtn1 = 'display:inline';
	}

	global $local2;

	$msgn = file_get_contents(__DIR__ . '/email-model.html');

	$msgn = str_replace('{{linklogo}}', $linklogo, $msgn);
	$msgn = str_replace('{{altlogo}}', $altlogo, $msgn);
	$msgn = str_replace('{{titulo}}', $titulo2, $msgn);
	$msgn = str_replace('{{mensagem1}}', $mensagem1, $msgn);
	$msgn = str_replace('{{linkbtn1}}', $linkbtn1, $msgn);
	$msgn = str_replace('{{textobtn1}}', $textobtn1, $msgn);
	$msgn = str_replace('{{stylebtn1}}', $stylebtn1, $msgn);
	$msgn = str_replace('{{mensagem2}}', $mensagem2, $msgn);
	$msgn = str_replace('{{novaslinhas}}', $novaslinhas, $msgn);
	$msgn = str_replace('{{remetente}}', $remetente, $msgn);
	$msgn = str_replace('{{link1}}', $link1, $msgn);
	$msgn = str_replace('{{desclink1}}', $desclink1, $msgn);
	$msgn = str_replace('{{contatos}}', $contatos, $msgn);
	$msgn = str_replace('{{endereco}}', $endereco, $msgn);
	$msgn = str_replace('{{styleEndereco}}', $styleEndereco, $msgn);

	if ($_SERVER['SERVER_NAME'] != 'localhost' && $_SERVER['SERVER_NAME'] != '127.0.0.1') {
		$sended = enviarEmail($nomeDest, $emailDest, $titulo, $msgn, $nomeRem, $emailRem, $senhaRem, $respond);
		return ($sended);
	} else {
		return $msgn;
	}
}
