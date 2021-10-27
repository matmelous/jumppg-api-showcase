<?php
function dbNumOfRows($table, $key, $value, $extra = '')
{

	$link = mysqli();

	$sql = "select " . $key . " from " . $table . "  where " . $key . "=? " . $extra;
	$query = $link->prepare($sql) or die(mysqli_error($link));
	$query->bind_param("s", $value);
	$query->execute();
	$query->store_result();
	$qtd = $query->num_rows();
	$query->fetch();
	$query->close();
	return ($qtd);
}

