<?php


function insert($pref, $itens, $tabela, $internos = [[], []], $obrigatorio = true)
{
	// print_r($_POST);
	$link = mysqli();
	$ok = true;
	$sql = ["insert into " . $tabela . "(", " values ("];
	$types = '';
	$values = [];
	$a = 0;
	$falha = false;
	foreach ($itens as $item) {
		$makedecimal = false;
		$makedata = false;
		$makebool = false;
		$prefixo = $pref;
		if (substr($item, 0, 4) == 'val_') {
			$prefixo = 'val' . $pref;
			$item = substr($item, 4);
		} else if (substr($item, 0, 4) == 'dec_') {
			// echo $item;
			$item = substr($item, 4);
			$makedecimal = true;
		} else if (substr($item, 0, 4) == 'dat_') {
			$item = substr($item, 4);
			$makedata = true;
		} else if (substr($item, 0, 4) == 'bol_') {
			$item = substr($item, 4);
			$makebool = true;
		}
		if (!isset($_POST[$prefixo . $item]) and array_search($item, $internos[0]) === false and $obrigatorio) {
			$ok = false;
			$falha = $item;
			break;
		} else {
			$keep = false;

			if (array_search($item, $internos[0]) === false) {
				if (isset($_POST[$prefixo . $item]) && $_POST[$prefixo . $item] !== '') {
					$val = $_POST[$prefixo . $item];
					$teste = parse_float($val);
					if ($makedecimal) {
						// echo $val;
						// echo $teste;
						array_push($values, $teste);
						$options[$item] = $teste;
					} else if ($makedata) {
						array_push($values, api_date($val));
						$options[$item] = api_date($val);
					} else if ($makebool) {

						array_push($values, '1');
						$options[$item] = '1';
					} else {
						array_push($values, $val);
						$options[$item] = $val;
					}
					// array_push($values, $_POST[ $prefixo.$item]);
					$keep = true;
				} else if ($makebool) {
					$keep = true;
					array_push($values, '0');
					$options[$item] = '0';
				}
			} else {
				$keep = true;
				array_push($values, $internos[1][array_search($item, $internos[0])]);
			}
			if ($keep) {
				if ($a > 0) {
					$sql[0] .= ',';
					$sql[1] .= ',';
				} else {
					$a++;
				}

				$sql[0] .= $item;
				$sql[1] .= '?';
				$types .= 's';
			}
		}
	}

	$sql[0] .= ')';
	$sql[1] .= ')';
	// print_r($sql);
	// print_r($values);
	$id_end = 0;
	if ($ok) {

		$query = $link->prepare($sql[0] . $sql[1]) or die(mysqli_error($link));
		$ok = $query->bind_param($types, ...$values) or die(mysqli_error($link));
		$ok = $query->execute() or die(mysqli_error($link));
		$id_end = mysqli_insert_id($link);
		$query->close();
	}
	if ($ok) {
		return ($id_end);
	} else {
		return ($falha);
	}
}


function database_insert($pref, $itens, $tabela, $internos = [[], []], $obrigatorio = true)
{
	$response = insert($pref, $itens, $tabela, $internos, $obrigatorio);
	if (is_numeric($response)) {
		return (object) [
			"success" => true,
			"id" => $response
		];
	}
	return error($response);
}

