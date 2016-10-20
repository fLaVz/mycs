<!DOCTYPE html>
	<head>
		<title>Welcome to mycs</title>
		<link href="css/style.css" rel="stylesheet" media="all" type="text/css">
		<link rel="icon" href="images/favicon.ico" />
		<meta charset="utf-8" />
		<meta name="author" content="Delvaux 'flav' Julien"/>
		<meta name="description" content="Mycs Index page" />
	</head>

	<body>

	<header>
		<a href="index.html"><img src="images/cs.png" width=2% height="4%" alt="logo_cs_1.6"></a>
		<p><b>MyCs</b></p>	
		<a href="register.php"> <input type="button" name=register value="Register"></a>
	</header>
	
	

	<div id="content">
		<div id="welcome">
			<h2><b>Inscription</b></h2>
			<p>Inscrivez-vous pour pouvoir accéder au différents <br> contenus du site !</p>
		</div>

		<div id="wform">
			<form name="signup" method="POST" action="register.php">
				<input type="text/html" placeholder="pseudo"><br><br>
				<input type="email" placeholder="email"><br><br>
				<input type="password" placeholder="Mot de passe"> 
				<input class="button" type="submit" name="signin" value="Inscription">
			</form>
		</div>

		
	</div>

	<footer>
		<p>Website made by Delvaux Julien<br>
		This is a small chat application in developement</p>
		<p>All rights are reserved and registered</p>
	</footer>

	<?php
	

	 
	?>

	</body>
</html>