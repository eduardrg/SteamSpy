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

				$state = $arr_json["response"]["players"][0]["personastate"];

				$state_text = "";

				switch ($arr_json["response"]["players"][0]["personastate"]) {
				    case 0:
				        $state_text = "Offline";
				        break;
				    case 1:
				        $state_text = "Online";
				        break;
				    case 2:
				        $state_text = "Busy";
				        break;
				    case 3:
				        $state_text = "Away";
				        break;
				    case 4:
				        $state_text = "Snooze";
				        break;
				    case 5:
				        $state_text = "looking to trade";
				        break;
				    case 6:
				        echo "looking to play";
				        break;
				    default:
				        echo "<invalid personastate code>";
			    }

			    if ($state > 0) {
					/*
					if (notification was sent within the past hour) {
						dont send;
					} else {
					*/
						$to = "tablelover1995@outlook.com";
						$subject = "Finley's ".$state_text." on Steam!";
						$message = "";
						mail($to, $subject, $message);
					// }
				}

			?>
		</h2>
	</body>
</html>
