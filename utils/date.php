<?php

$feiras = ['Segunda-Feira', 'Terça-Feira', 'Quarta-Feira', 'Quinta-Feira', 'Sexta-Feira', 'Sábado', 'Domingo'];


function isWeekend($date)
{
	return (date('N', strtotime($date)) >= 6);
}

function dbDate($date)
{
	$date = str_replace("/", "-", $date);
	return (date('Y-m-d', strtotime($date)));
}

function visualDate($date)
{
	$date = str_replace("-", "/", $date);
	return (date('d/m/Y', strtotime($date)));
}
function api_date($date)
{
	if (strrpos($date, '/') !== false) {
    return dbDate($date);
	} 
  return visualDate($date);
}