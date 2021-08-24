<?php
	session_start();
?>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" charset="UTF-8">
		<title>FREE XKCD COMICS </title>
		<link rel="shortcut icon" href="../media/favicon1.ico">
		<link rel="stylesheet" href="../include/CSS/styles.css">
	</head>
		<form method="POST">
	 		<div class="modal-container" id="m2-o" style="--m-background: hsla(0, 0%, 0%, .4);">
	 			<div class="modal">
	 				<br><h1 style="font-family: Tahoma, Verdana, sans-serif; text-align: center">ENTER OTP</h1>
	 					<div class="modal__text"><div class="email-container">
	 						<input type="text" style="font-family: Tahoma, Verdana, sans-serif;" sminlength="6" maxlength="6" name="OTP" style="color: white;" required-pattern="[0-9]{6}" required=""/></div>
	 						<button return; method="POST" type="submit" name="submit" value="submit" class="modal__btn">Submit OTP</button>
	 						<h2><a href="index.php" class="link-2" onclick="clearHistory();"></a></h2>
		 					</div>
		 				</div>
		 			</div>
		 		</form>
			</html>
<?php
		
	if(isset($_POST['submit']) && !empty($_POST['submit']))
	{
		ob_start();
		require __DIR__.'/../include/config.php'; // Using database connection file here
		
		if(isset($_POST["OTP"]) && !empty($_POST["OTP"]))
		{
			$OTP = $_POST["OTP"];
		}
		
		$receive_email = $_SESSION["sub_send_email"];
		$receive_otp = $_SESSION["sub_send_otp"];
		$ID = 1;
		if($receive_otp == $OTP)
		{
			$stmt = $conn->prepare('INSERT INTO Sub_t1 (Email, id) VALUES (?, ?)');
			$stmt->bind_param('si', $receive_email, $ID);
			$stmt->execute(); 
			if(!$stmt)
			{
				echo mysqli_error($conn);
			}
			else
			{
				echo 'Records added successfully.';
				header('Location: sub_con.php');
				ob_flush();
			}
				
		}
		else
		{
			$Message = 'You entered wrong OTP !!!';
			$Message = filter_var($Message, FILTER_SANITIZE_STRING);
			header('Location: ../index.php?Message='.$Message);
			die();
		}
	}
	session_destroy();
	mysqli_close($conn); // Close connection
?>