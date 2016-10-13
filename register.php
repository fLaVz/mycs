<!DOCTYPE html>
	<head>
		<title>Register</title>
		<link href="css/style.css" rel="stylesheet" media="all" type="text/css"> 
		<meta charset="utf-8" />
		<meta name="author" content="Delvaux Julien"/>
		<meta name="description" content="Mycs Default page" />


	</head>

	<body>
		<?php

		//VARIABLES POUR LA BDD
		$user = "uapv1500182";
		$pwd = "2QDwM4";		

		//CONNEXION A LA BDD
		$connect = new PDO("mysql:host=localhost;dbname=user", $user, $pwd);

		//RECUPERATION DES VARIABLES DU FORMULAIRE



		$reg = $connect->query(INSERT INTO user nick=)






		?>

	</body>
</html>