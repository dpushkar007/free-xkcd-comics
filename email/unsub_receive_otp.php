<?php
	session_start();
?>

<?php
		
	if(isset($_POST['submit']) && !empty($_POST['submit']))
	{
		ob_start();
		require __DIR__.'/../include/config.php'; // Using database connection file here
		
		if(isset($_POST["OTP"]) && !empty($_POST["OTP"]))
		{
			$OTP = $_POST["OTP"];
		}

		$receive_email = $_SESSION["unsub_send_email"];
		$receive_otp = $_SESSION["unsub_send_otp"];
		
		if($receive_otp == $OTP)
		{
			$sql = "DELETE FROM Sub_t1 WHERE Email = '".$receive_email."'";
			$stmt = $conn->prepare($sql);
			$stmt->execute();
			
			if(!$stmt)
			{
				echo mysqli_error($conn);
			}
			else
			{
				echo 'Record unsubscribed successfully.';
				header('Location: unsub_con.php');
				ob_flush();
			}
				
		}
		else
		{	
			$Message = 'You entered wrong OTP !!!';
			$Message = filter_var($Message, FILTER_SANITIZE_STRING);
			header('Location: ../unsubscribe.php?Message='.$Message);
			die();
		}
	}

	session-destroy();
	mysqli_close($conn); // Close connection
?>