<?php
	session_start();
?>

<!DOCTYPE html>
    <html>
        <head>
            <meta name="viewport" content="width=device-width, initial-scale=1.0" charset="UTF-8">
			<title>FREE XKCD COMICS </title>
			<link rel="shortcut icon" href="../media/favicon1.ico">
			<link rel="stylesheet" href="include/CSS/styles.css">
    		<style type="text/css">
                    * {
                        box-sizing: border-box;
                    }
                    h2
                    {
                        text-align: center;
                        color: #fff;
                        font-family: Tahoma, Verdana, sans-serif;                  
                    }
                    .btn
                    {
                        margin-bottom: 10%;
                        width: 50%;
                        height: 40px;
                        font-family: Tahoma, Verdana, sans-serif;    
                        font-size: 20px;
                        color:azure;
                        border-radius:5px;
                        background-color: rgb(0, 0, 0);
                    }
                </style>
        </head>
            <body>
                <?php require __DIR__.'/../include/layout.php'; ?>
            </body>
        <body>
            <button class="btn" name= "home" type="submit" onclick="window.location='../index.php';">Home</button>
            <h2>You are successfully subscribed for FREE XKCD COMICS.</h2>
            <h2>You will receive XKCD comics <u>every 5 minutes between 9am to 11pm</u> via email...</h2>
        </body>
    </html>