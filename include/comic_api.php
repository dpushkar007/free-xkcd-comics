<!DOCTYPE html>
	<html lang="en">
	<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
		<style type="text/css">
			body {font-family: Tahoma, Arial, Helvetica, sans-serif;}
			* {box-sizing: border-box;}

			img
			{
				max-width: 100%;
				max-height: 100%;
				display: block; /* remove extra space below image */
			}
			
			.box
			{
				position:fixed;
				top: 15%;
				left: 10%;
				right: 10%;
				height: 600px;
				max-width: 700px;
				background-color: rgba(231, 231, 231, 0);
			}
			
			.box.large
			{
				height: 300px;
			}
			
			.box.small
			{
				height: 100px;
			}

			.menu
			{
				float: left;
				width: 20%;
				text-align: center;
			}

			.menu a
			{
				background-color: #e5e5e5;
				padding: 8px;
				margin-top: 7px;
				display: block;
				width: 100%;
				color: black;
			}

			/* Add styles to the form container2 */
			.comic_container
			{
				position: relative;
				font-size: 30px;
				font-family: Bradley Hand, Cursive;
				top: 0%;
				left: 35%;
				margin-top: 20px;
				height: 600px;
				max-width: 500px;
				overflow-y: scroll;
				background-color: rgba(253, 253, 253, 0);
				-ms-overflow-style: ;  /* IE and Edge */
				scrollbar-width: none;  /* Firefox */
			}
			
			/* Hide scrollbar for Chrome, Safari and Opera */
			.comic_container::-webkit-scrollbar
			{
				display: none;
			}

			/* Add styles to the form container2 */
			.button_container
			{
				position: fixed;
				top: 25%;
				left: 15%;
				max-height: 500px;
				max-width: 100px;
				margin-top: 40px;
				background-color: rgba(249, 251, 255, 0);
			}

			.font_style
			{
				font-family: OCR A Std, monospace;
				font-size: 50px;
				color: #F1C40F;
			}
		</style>
	</head>	
		<div class="box">
			<head>
				<?php
					require __DIR__.'/config.php';
					$url = $comic_url;
					$headers = get_headers($url);
					$final_url = "";
					foreach ($headers as $h)
					{
						if (substr($h,0,10) == 'Location: ')
						{
							$final_url = trim(substr($h,10));
							break;
						}
					}
					$final = $final_url.'info.0.json';
					$jsondata = file_get_contents($final);
					$json = json_decode($jsondata, true);
					$imageurl = ($json['img']);
				?>
			</head>			
		</div>
	</html>