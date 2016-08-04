<?php

	$service_url = 'http://api.steampowered.com/ISteamUser/GetPlayerSummaries/v0002/?key=8476C3AFEFAAAB4F9E96A21BB1F39D88&steamids=76561198044658071&format=json';

	$unparsed_json = file_get_contents($service_url);

	$arr_json = json_decode($unparsed_json, true);

	echo $arr_json["response"]["players"][0]["personastate"];

	switch ($arr_json["response"]["players"][0]["personastate"]) {
	    case 0:
	        echo "0 - Offline";
	        break;
	    case 1:
	        echo "1 - Online";
	        break;
	    case 2:
	        echo "2 - Busy";
	        break;
	    case 3:
	        echo "3 - Away";
	        break;
	    case 4:
	        echo "4 - Snooze";
	        break;
	    case 5:
	        echo "5 - looking to trade";
	        break;
	    case 6:
	        echo "6 - looking to play";
	        break;
	    default:
	        echo $state;
    }

?>
