<?php
	session_start();
?>

<?php
		ob_start();

        require __DIR__.'/../include/mail/Mailin.php';
		require __DIR__.'/../include/comic_api.php';
		require __DIR__.'/../include/config.php';
		use Sendinblue\Mailin;
		$api_key = file_get_contents('include/mail/api_key');

		$head = 'MIME-Version: 1.0\r\n';
		$head .= 'Content-Type:text/html; charset=UTF-8';
		
		$subject = 'XKCD COMICS! ';
		
		$otp_rand = rand(100000, 999999);
		$otp_gen = $otp_rand;
		$_SESSION["unsub_send_otp"] = $otp_gen;

		$mailin = new Mailin('https://api.sendinblue.com/v2.0',$api_key);

		$stmt = $conn -> prepare("SELECT Email FROM Sub_t1 WHERE Email = '".$to_email."'");
		$stmt -> execute();
		$stmt -> store_result();
		$stmt -> bind_result($Email);

		if(!$stmt -> fetch())
		{	
			echo '<br><center><h2 style="color:white;"><span style="font-size: 25px;">&#9888;</span> &nbsp; Email does not exist in the records...</h2><br>';
			$flag = 1;
		}
		else
		{	
			//message body
			$body = 
				"<html>
					<body style=\"text-align: center;\">
						<h2><u>Here is your OTP</h2>
						<br><h1>$otp_gen</h1>
					</body>
				</html>";
							
			//array of data
			$data = array( 
							'to' => array($to_email=>$to_name),
							'from' => array($from_email,$from_name),
							'subject' => $subject,
							'html' => $body,
							'head' => $head
						);
							
			$response = $mailin->send_email($data);
			if(!$response)
			{
				echo 'Failed to send an Email.';
			}
			else
			{
				echo '';
			}
			//modal container for OTP
			echo '<html>
					<form  method="POST">
						<div class="modal-container" id="m1-o" style="--m-background: hsla(0, 0%, 0%, 100%);">
							<div class="modal">
								<br><h1 style="font-family: Tahoma, Verdana, sans-serif; text-align: center">ENTER OTP</h1>
									<div class="modal__text"><div class="email-container">
										<input type="text" minlength="6" maxlength="6" name="OTP" style="font-family: Tahoma, Verdana, sans-serif; color: white;" required-pattern="[0-9]{6}" required=""/></div>
											<button formaction="email/unsub_receive_otp.php" return; method="POST" type="submit" name="submit" value="submit" class="modal__btn" onclick="clearHistory();">Submit OTP</button>
											<h2><a href="unsubscribe.php" class="link-2" onclick="clearHistory();"></a></h2>
										</div>
									</div>
								</div>
							</form>
						</html>';

		}
		exit();
?>