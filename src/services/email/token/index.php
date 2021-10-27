<?php

require __DIR__ . '/../../../../helpers/email.php';


function sendToken($titulo = 'Jump PG ', $nomeDest = 'Matheus', $emailDest = 'matmelous@gmail.com', $nomeRem = 'auto', $emailRem = 'auto', $senhaRem = 'auto', $respond = 'auto', $titulo2 = 'Jump PG ', $mensagem1 = '', $linkbtn1 = '', $textobtn1 = '', $stylebtn1 = 'display:none', $mensagem2 = '', $novaslinhas = '', $linklogo = 'https://jumppg.com.br/imagens/icon.png', $altlogo = 'Jump PG ', $remetente = 'Equipe Jump PG', $link1 = 'https://jumppg.com.br', $desclink1 = 'jumppg.com.br', $contatos = '(42) 9 0000-0000   |   contato@jumppg.com.br', $endereco = '- Ponta Grossa - Paraná', $styleEndereco = '')
{


	gerarEmail();

}
