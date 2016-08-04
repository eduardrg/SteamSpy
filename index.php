<html>
	<head>
		<style type = "text/css">
			body {
				background-color: black;
			}

			h1, h2 {
				font-family: Tahoma, Arial, sans-serif;
				font-weight: 400;
				text-align: center;
			}

			h1 {
				color: white;
				font-size: 142px;
			}

			h2 {
				color: #bab39e;
				font-size: 108px;
			}


		</style>
	</head>
	<body>
		<h1>Is Finley online?</h1>
		<h2>
			<?php
				$service_url = 'http://api.steampowered.com/ISteamUser/GetPlayerSummaries/v0002/?key=8476C3AFEFAAAB4F9E96A21BB1F39D88&steamids=76561198044658071&format=json';

				$unparsed_json = file_get_contents($service_url);

				$arr_json = json_decode($unparsed_json, true);

				echo $arr_json["response"]["players"][0]["personastate"];

				switch ($arr_json["response"]["players"][0]["personastate"]) {
				    case 0:
				        echo "No, he's Offline";
				        break;
				    case 1:
				        echo "Yes, he's Online";
				        break;
				    case 2:
				        echo "Yes, but he's Busy";
				        break;
				    case 3:
				        echo "Yes, but he's Away";
				        break;
				    case 4:
				        echo "Yes, but he's set to Snooze";
				        break;
				    case 5:
				        echo "Yes, and he's looking to trade";
				        break;
				    case 6:
				        echo "Yes, and he's looking to play";
				        break;
				    default:
				        echo "Invalid personastate code";
			    }

			?>
		</h2>

	</body>
</html>
