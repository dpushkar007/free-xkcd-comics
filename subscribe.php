<?php
	session_start();
	if(!defined('MYSITE'))
	{
		die('This is defined, so that one cannot access this page seperately...');
	}
?>

<!DOCTYPE html>
	<html>
		<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" charset="UTF-8">
		<title>FREE XKCD COMICS </title>
		<link rel="shortcut icon" href="media/favicon1.ico">
		<link rel="stylesheet" href="include/CSS/styles.css">
		</head>
			<body>
				<form  method="GET">
					<div class="container">
					<label style="font-family: Tahoma, Verdana, sans-serif; color: black"><center><h3><b>Subscribe to Comics</center></label>
						<br><br><div class="email-container">		
							<b><input type="email" name="Email" style="font-family: Tahoma, Verdana, sans-serif; color: black;"/>
							<label>Email</label>
							<button formaction="#m2-o" id="m2-c" return; class="modal__btn" method="GET" type="submit" name="submit" value="submit" style="background-color:black; width: 250px;"><b>Subscribe</button>
						</div>
				</form>
			</body>
		<footer> <?php require __DIR__.'/include/footerf.php'; ?> </footer>
	</html>

<script type="text/javascript">
	function clearHistory()
	{
		if(window.history.replaceState)
		{
			window.history.replaceState(null, null, window.location.pathname);
		}
		function isNumber(evt)
		{
			evt = (evt) ? evt : window.event;
			var charCode = (evt.which) ? evt.which : evt.keyCode;
			if (charCode > 31 && (charCode < 48 || charCode > 57))
			{
				return false;
			}
			return true;
		}
	}
</script>

<?php

	ob_start();
		require __DIR__.'/include/config.php';
		require __DIR__.'/include/escape_function.php';
		if(isset($_GET['submit']) && !empty($_GET['submit']))
		{
			mailOTP();
		}

		function mailOTP()
		{
			if(!empty($_GET["Email"]))
			{
				// Variable to check
				$get_email = $_GET["Email"];
				$get_email = filter_var($get_email, FILTER_SANITIZE_EMAIL);
				$to_email = $get_email;
				$_SESSION["sub_send_email"] = $to_email;
				
				require __DIR__.'/email/sub_send_otp.php';
				if ($flag == 1)
				{
					echo escape('<b style="color: black;">Email already exists in records...');
				}
				else
				{
					//modal container for OTP
					echo '<html>
							<form method="POST">
							<div class="modal-container" id="m2-o" style="--m-background: hsla(0, 0%, 0%, .4);">
								<div class="modal">
									<br><h1 style="font-family: Tahoma, Verdana, sans-serif; text-align: center">ENTER OTP</h1>
										<div class="modal__text"><div class="email-container">
										<input type="text" style="font-family: Tahoma, Verdana, sans-serif;" sminlength="6" maxlength="6" name="OTP" style="color: white;" required-pattern="[0-9]{6}" required=""/></div>
										<button method="POST" type="submit" name="submit" value="submit" class="modal__btn" onclick="clearHistory();" >Submit OTP</button>
										<h2><a href="index.php" class="link-2" onclick="clearHistory();"></a></h2>
									</div>
								</div>
							</div>
							</form>
						</html>';
				}
				
			}
			else
			{
				echo 'Email not entered';
			}
		}
	?>
