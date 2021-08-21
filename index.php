<?php
	session_start();
	define('MYSITE',true);
?>
<!DOCTYPE html>
	<html>
		<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" charset="UTF-8">
		<title>FREE XKCD COMICS </title>
		<link rel="stylesheet" href="include/CSS/styles.css">
		<link rel="shortcut icon" href="media/favicon1.ico">
			<style>
			* {
			box-sizing: border-box;
			}

			.menu
			{	
				float: left;
				margin-top: 5%;
				width: 10%;
				height: 50%;
				text-align: center;
			}

			.menu a
			{
				background-color: #e5e5e5;
				padding: 15px;
				margin: 20px;
				display: block;
				height: 100%;
				width: 100%;
				color: black;
			}
			.menub
			{	
				float: left;
				position: relative;
				text-align: center;
				margin-right: auto;
				margin-left: auto;
				max-width: 100%;
				max-height: auto;
			}
			.main
			{
				float: center;
				width: 100%;
				padding: 0 20px;
				background-image: url("media/back3.png");
			}

			.right
			{
				background-color: #e5e5e5;
				float: right;
				width: 20%;
				padding: 15px;
				top: 1%;
				text-align: center;
			}
			.btn
			{
				margin-bottom: 10%;
				width: 60%;
				height: 40px;
			}
			@media only screen and (max-width: 620px)
			{
				/* For mobile phones: */
				.menu, .main, .right
				{
					width: 100%;
				}
			}

			.bg-img
			{
				/* The image used */
				background-image: url("media/back3.png");
				max-height: 200%;
				max-width: 200%;

				/* Center and scale the image nicely */
				background-position: header;
				background-repeat: no-repeat;
				background-size: cover;
				margin-top: 0px;
				height: auto;
			}
			.subscribe_container
			{
				float: right;
				right: auto;
				margin-top: 5%;
				margin-right: 30px;
				margin-left: auto;
				max-width: 280px;
				height: auto;
				overflow: auto;
				background-color: #fff;
			}

			.msg
			{
				color: white;
				text-align: center;
				font-size: 20px;
				border: 2px white;
				background-color: red;
				border-radius: 10px;
				max-width: 100%;
				width: 40%;
				margin-right: auto;
				margin-left: auto;
			}
			</style>
		</head>
			<header>
				<?php
					require __DIR__.'/include/headerh.php';
				?>
			</header>
			<div class="msg">
					<?php
						require __DIR__.'/include/escape_function.php';
						if(isset($_GET['Message']) && !empty($_GET['Message']))
						{
							echo escape($_GET['Message']); 
						}
					?>
				</div>
			<div style="overflow:auto">
				<body class="bg-img">
					<h2><div class="menub" style= "float: center-left; font-size: 30px; color: #fff;">
						<?php
							require __DIR__.'/include/config.php';
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
							echo '<td style="text-align:center;">'.$json['title'].'</td>';
							$imageurl = ($json['img']);
							echo '<ul>';
							echo '<img src="' .$imageurl. '" style="align: center; max-width:100%; height:auto; margin-left: -12%;"></p>';
						?>
					</div>
					<form>
					<div class="subscribe_container">
						<?php
							require __DIR__.'/subscribe.php';
						?>
					</div>
						</form>
				</body>
			</div>
		</body>
		<footer class="footer">
			<?php require __DIR__.'/include/footerf.php'; ?>
		</footer>
	</html>
<script>
	if(window.history.replaceState)
	{
		window.history.replaceState(null, null, window.location.href);
	}
	
	window.addEventListener("pageshow", () => {
});
</script>
