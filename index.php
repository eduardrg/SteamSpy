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
		<h1>Is your friend online?</h1>
		<h2>
			<?php
			// Fill out with your API key and friend's steam id (not their user/display name)
				$key = '';
				$steamids = '';
				$service_url = "http://api.steampowered.com/ISteamUser/GetPlayerSummaries/v0002/?key=".$key."&steamids=".$steamids."&format=json";

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

			    if (intval($state) > 0) {
					/*
					if (notification was sent within the past hour) {
						dont send;
					} else {
					*/
				    	// fill out your friend's name and your email
				    		$friendName = "Name"
						$to = "user@domain.com";
						$subject = $friendName." is ".$state_text." on Steam!";
						$message = "";
						mail($to, $subject, $message);
					// }
				}

			?>
		</h2>
	</body>
</html>
