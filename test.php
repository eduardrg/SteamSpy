<?php

	$service_url = 'http://api.steampowered.com/ISteamUser/GetPlayerSummaries/v0002/?key=8476C3AFEFAAAB4F9E96A21BB1F39D88&steamids=76561198044658071';
	$curl = curl_init($service_url);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	$curl_response = curl_exec($curl);
	if ($curl_response === false) {
	    $info = curl_getinfo($curl);
	    curl_close($curl);
	    die('error occured during curl exec. Additional info: ' . var_export($info));
	}
	curl_close($curl);
	$decoded = json_decode($curl_response);
	if (isset($decoded->response->status) && $decoded->response->status == 'ERROR') {
	    die('error occured: ' . $decoded->response->errormessage);
	}
	echo 'Response ok!';
	var_export($decoded->response);

?>