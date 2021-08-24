<?php
	//Dummy Database credentials
	$dbhost="dummy_sql1.dummysqldatabase.com";
	$dbuser="dsql123456";
	$dbpass="0123456789";
	$dbname="dummy_sqlname";
	$conn=Mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
		if(!$conn)
		{
			echo "Connection unsuccessful.";
		}
		else
		{
			echo "";
		}
		
	//Senders email address
	$from_email = 'example@email.com';

	//Senders name
	$from_name = 'Senders Name';

	//Comic url address
	$comic_url = 'https://c.xkcd.com/random/comic';

	//Server protocol and url for unsubscribe link
	$s_add = (!isset($_SERVER['HTTPS']) || !empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] != 'on' && isset($_SERVER['SERVER_NAME']) && !empty($_SERVER['SERVER_NAME']) ? 'https' : 'http')
	. '://' .$_SERVER['SERVER_NAME'] . '/unsubscribe.php';
	?>