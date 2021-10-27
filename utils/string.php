<?php


function sanitizeString($str, $under = false)
{
	$str = preg_replace('/[áàãâä]/ui', 'a', $str);
	$str = preg_replace('/[éèêë]/ui', 'e', $str);
	$str = preg_replace('/[íìîï]/ui', 'i', $str);
	$str = preg_replace('/[óòõôö]/ui', 'o', $str);
	$str = preg_replace('/[úùûü]/ui', 'u', $str);
	$str = preg_replace('/[ç]/ui', 'c', $str);
	// $str = preg_replace('/[,(),;:|!"#$%&/=?~^><ªº-]/', '_', $str);
	if ($under) {
		$str = preg_replace('/[^a-z0-9]/i', '_', $str);
		$str = preg_replace('/_+/', '_', $str); // ideia do Bacco :)
		$str = preg_replace('/-/', '_', $str); // ideia do Bacco :)

	} else {
		$str = preg_replace('/[^a-z0-9]/i', '-', $str);
		$str = preg_replace('/_+/', '-', $str); // ideia do Bacco :)
	}
	return $str;
}

function B_object($array)
{
	$a = 0;
	$string = '';
	foreach ($array as $key => $value) {
		if ($a > 0) {
			$string .= '&&;&&';
		} else {
			$a++;
		}
		$string .= $key . '&;&' . $value;
	}
	return ($string);
}