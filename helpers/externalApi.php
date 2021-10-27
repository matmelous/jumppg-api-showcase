<?php

function CallAPI($method, $url, $date = false)
{
	$curl = curl_init();

	switch ($method) {
		case "POST":
			curl_setopt($curl, CURLOPT_POST, 1);

			if ($date)
				curl_setopt($curl, CURLOPT_POSTFIELDS, $date);
			break;
		case "PUT":
			curl_setopt($curl, CURLOPT_PUT, 1);
			break;
		default:
			if ($date)
				$url = sprintf("%s?%s", $url, http_build_query($date));
	}

	// Optional Authentication:
	curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
	curl_setopt($curl, CURLOPT_USERPWD, "username:password");

	curl_setopt($curl, CURLOPT_URL, $url);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

	$result = curl_exec($curl);

	if ($result === false) {
		$result = curl_error($curl);
	}
	curl_close($curl);

	return $result;
}