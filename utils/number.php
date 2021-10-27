<?php

function isDecimal($date)
{
	if (strpos($date, '.') === false or strpos($date, ',') === false or substr_count($date, '.') > 1  or substr_count($date, ',') > 1) {
		return false;
	} else {
		return true;
	}
}



function moeda($date)
{


	$pt = explode('.', $date);
	$pt2 = explode(',', $date);
	$nval = '';

	if (count($pt) > 1) {
		for ($i = 0; $i < count($pt) - 1; $i++) {
			$nval += $pt[$i];
		}
		$ctv = $pt[count($pt) - 1];
		if (strlen($ctv) == 1) {
			$ctv = $ctv . '0';
		} else if (strlen($ctv) > 2) {
			$ctv = substr($ctv, 0, 2);
		}
		$nval .= ',' . $ctv;
	} else if (count($pt2) > 1) {

		for ($i = 0; $i < count($pt2) - 1; $i++) {
			$nval += $pt2[$i];
		}
		$ctv = $pt2[count($pt2) - 1];
		if (strlen($ctv) == 1) {
			$ctv = $ctv + '0';
		} else if (strlen($ctv) > 2) {
			$ctv = substr($ctv, 0, 2);
		}
		$nval = floatval($nval . '.' . $ctv);
	} else {
		$nval = $date . ',00';
	}
	return ($nval);
}


function decimal($date)
{


	$pt = explode('.', $date);
	$pt2 = explode(',', $date);
	$nval = '';

	if (count($pt) > 1) {
		for ($i = 0; $i < count($pt) - 1; $i++) {
			$nval += $pt[$i];
		}
		$ctv = $pt[count($pt) - 1];

		$nval .= ',' . $ctv;
	} else if (count($pt2) > 1) {

		for ($i = 0; $i < count($pt2) - 1; $i++) {
			$nval += $pt2[$i];
		}
		$ctv = $pt2[count($pt2) - 1];

		$nval = floatval($nval . '.' . $ctv);
	} else {
		$nval = $date;
	}
	return ($nval);
}

function parse_float($date)
{

	$date = $date . '';
	$pt = explode('.', $date);
	$pt2 = explode(',', $date);
	$nval = '';
	// print_r($pt);
	// print_r($pt2);

	if (count($pt) > 1) {
		for ($i = 0; $i < count($pt) - 1; $i++) {
			// echo ' | '. $nval.' - '.$i.' = '.$pt[$i].' | ';
			$nval .= $pt[$i];
		}
		$ctv = $pt[count($pt) - 1];

		$nval .= '.' . $ctv;
	} else if (count($pt2) > 1) {

		for ($i = 0; $i < count($pt2) - 1; $i++) {
			// echo ' | '. $nval.' - '.$i.' = '.$pt2[$i].' | ';
			$nval .= $pt2[$i];
		}
		$ctv = $pt2[count($pt2) - 1];

		$nval = floatval($nval . '.' . $ctv);
	} else {
		$nval = $date;
	}
	// echo $i;
	return floatval($nval);
}
