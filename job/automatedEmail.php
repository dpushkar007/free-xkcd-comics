<?php

	require __DIR__.'/../include/comic_api.php';
	require __DIR__.'/../include/config.php';
	require __DIR__.'/../include/mail/Mailin.php';

	use Sendinblue\Mailin;
	$api_key = file_get_contents('../include/mail/api_key');
	if(isset($_GET['user_id']) && $_GET['user_id'] == 07)
	{
		$head = 'MIME-Version: 1.0\r\n';
		$head .= 'Content-Type:text/html; charset=UTF-8';
		
		$from_name = 'Free XKCD Comics';

		$subject = 'XKCD Comic';
		$image_title = '<td style="text-align:center;">'.$json['title'].'</td>';	
		$mailin = new Mailin('https://api.sendinblue.com/v2.0',$api_key);

		$sql= 'SELECT Email FROM Sub_t1';
		$stmt= $conn -> prepare($sql);
		$stmt->execute();
		$stmt->store_result();
		$stmt->bind_result($Email);

		$m_var = $s_add;

			while($stmt->fetch())
				{
					//Receivers address
					$to_email = $Email;	
			
					//message body
					$body = 
						"<html>
							<center><body>
								<img src=\"$imageurl\";
								text-align: center;
								max-height: 200%;
								max-width: 200%;
								background-position: header;
								background-repeat: no-repeat;
								background-size: cover;
								margin-top: 0px;
								height: auto;\">
							</body>
							<body style=\"text-align: center; position: absolute; bottom: 10px;\">
								<p><a href=\"$m_var\">Unsubscribe</a></p>
							</body>
						</html>";
						
						$a = date("h");
						$b = ($a * 60)+date("i");
						$c = $b % 5;
						if ($c==0)
						{
							$data = array( 
								'to' => array($to_email=>$to_name),
								'from' => array($from_email,$from_name),
								'subject' => $subject,
								'html' => $body,
								'head' => $head,
								'attachment' => array($imageurl),
								);
								
							$response = $mailin->send_email($data);
							if(!$response)
							{
								echo 'Failed to send an Email.';
							}
							else
							{
								echo 'Email sent successfully to '.$to_email.'<br>';
							}
						}
						else
						{
							echo 'Not this time...';
						}
				}
	}
	else
	{
		die('This content is inaccessible');
	}
?>