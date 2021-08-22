<?php
	session_start();
?>

<!DOCTYPE html>
	<html>
		<head>
			<meta name="viewport" content="width=device-width, initial-scale=1.0" charset="UTF-8">
			<title>FREE XKCD COMICS </title>
			<link rel="shortcut icon" href="media/favicon1.ico">
			<link rel="stylesheet" href="include/CSS/styles.css">
				<style>
					* {
						box-sizing: border-box;
					}
					h3
					{
						text-align: center;
											
					}
				
					.btn
					{
						max-width: 40%;
						margin-right: auto;
						margin-left: auto;
						margin-bottom: 5%;
						margin-top: 50px;
						padding: 10px 15px;
						border: 1px solid var(--border-color);
						border-radius: 100rem;

						color: inherit;
						background: transparent;
						font-size: 15px;
						font-family: inherit;
						letter-spacing: .2rem;

						transition: .2s;
						cursor: pointer;
					}
					.btn:nth-of-type(1)
					{
						margin-right: 1rem;
					}

					.btn:hover,
					.btn:focus
					{
						background: var(--focus);
						border-color: var(--focus);
						transform: translateY(-.2rem);
					}

					.modal1
					{
						width: 450px;
						max-width: 100%;
						/* padding: 4rem 2rem; */
						border-radius: .8rem;
						margin-top: 5%;
						padding: 1%;
						margin-right: auto;
						margin-left: auto;
						color: var(--light);
						background: var(--background);
						box-shadow: var(--m-shadow, .4rem .4rem 10.2rem .2rem) var(--shadow-1);
						position: relative;

						overflow: hidden;
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
		<div class="msg">
			<?php
				require __DIR__.'/include/escape_function.php';
				if(isset($_GET['Message']) && !empty($_GET['Message']))
				{
					echo escape($_GET['Message']);
				}
				?>
			</div>
		<body>
			<div class="modal1">
			<form name="Email_input" method="GET" id="e2"><br><br><h1 style="font-family: Tahoma, Verdana, sans-serif; text-align: center">"Goodbyes are hard, are you really sure you wanna do it?"</h1><br><br>
					<div class="modal__text"><div class="email-container">		
						<input type="email" name="Email"  style="font-family: Tahoma, Verdana, sans-serif; color: inherit;"/>
						<label style="font-family: Tahoma, Verdana, sans-serif; color: inherit;">Email</label>
						<button formaction="#m1-o" id="m1-c" return; method="GET" type="submit" name="submit" value="submit" class="btn" style="float: left;" onclick="clearHistory();">Confirm</button>
						<button formaction="index.php" return; type="submit" name="cancel" value="submit" class="btn" style="float: right;" formnovalidate>Cancel</button>
					</div>
				</div>
			</form>
		</body>
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
    if(isset($_GET['submit']) && !empty($_GET['submit']))
    {
        del_record();
    }
    
    function del_record()
    {
        if(!empty($_GET["Email"]))
		{
			// Variable to check
			$get_email = $_GET["Email"];
			$get_email = filter_var($get_email, FILTER_SANITIZE_EMAIL);
			$to_email = $get_email;
			$_SESSION["unsub_send_email"] = $to_email;
		
			//Emails OTP to the entered email address
			require __DIR__.'/email/unsub_send_otp.php';
			if ($flag == 1)
				{
					'<br><center><h1 style="color:white;"><span style="font-size: 25px;">&#9888;</span> &nbsp; Email does not exist in the records...</h1><br>';
				}
				else
				{
					//modal container for OTP
					echo '<html>
							<form method="POST">
								<div class="modal-container" id="m1-o" style="--m-background: hsla(0, 0%, 0%, 100%);">
									<div class="modal">
										<br><h1 style="font-family: Tahoma, Verdana, sans-serif; text-align: center">ENTER OTP</h1>
											<div class="modal__text"><div class="email-container">
												<input type="text" minlength="6" maxlength="6" name="OTP" style="font-family: Tahoma, Verdana, sans-serif; color: white;" required-pattern="[0-9]{6}"/></div>
													<button formaction="email/unsub_receive_otp.php" return; method="POST" type="submit" name="submit" value="submit" class="modal__btn" onclick="clearHistory();">Submit OTP</button>
													<h2><a href="unsubscribe.php" class="link-2" onclick="clearHistory();"></a></h2>
												</div>
											</div>
										</div>
									</form>
								</html>';
				}	
		}
		else
		{
			die('Email not entered...');
		}
	}	
?>
