<?php

require __DIR__ . '/../../../helpers/email.php';


function sendToken($recieverName, $recieverEmail, $token)
{
	$titulo = 'Jump PG';
 	$nomeRem = 'auto';
	$emailRem = 'auto';
	$senhaRem = 'auto';
	$respond = 'auto';
	$titulo2 = 'Bem-Vindo/a ao Jump PG';
	$mensagem1 = 'Confirma teu endereço de e-mail para abrir uma conta e dar um salto em sua carreira.
'; 
	$linkbtn1 = 'https://jumppg.com.br/cadastro-estudante/ativar/?token='.$token.'';
	$textobtn1 = 'CONFIRMAR O TEU ENDEREÇO DE E-MAIL';
	$stylebtn1 = 'color:#6b0ff0; background-color:#fff; border-color:#6b0ff0;';
	$mensagem2 = '';
/*
	$mensagem2 = '
	<a target="_blank" href="https://jumppg.com.br/cadastro-estudante/ativar/?token='.$token.'">Clique aqui para confirmar seu cadastro</a>
';*/

	$novaslinhas = '';
	// $linklogo = 'https://api.jumppg.com.br/src/assets/logo.png';
	// $linklogo = 'https://jumppg.vercel.app/logo.png';
	$linklogo = 'https://jumppg.vercel.app/Logo Dark.png';
	
	$altlogo = 'Jump PG ';
	$remetente = 'Equipe Jump PG';
	$link1 = 'https://jumppg.com.br';
	$desclink1 = 'jumppg.com.br';
	$contatos = '(42) 9 0000-0000   |   contato@jumppg.com.br';
	$endereco = '';
	$styleEndereco = '';

	return	gerarEmail(
		$titulo,
		$recieverName,
		$recieverEmail,
		$nomeRem,
		$emailRem,
		$senhaRem,
		$respond,
		$titulo2,
		$mensagem1,
		$linkbtn1,
		$textobtn1,
		$stylebtn1,
		$mensagem2,
		$novaslinhas,
		$linklogo,
		$altlogo,
		$remetente,
		$link1,
		$desclink1,
		$contatos,
		$endereco,
		$styleEndereco
	);
}
