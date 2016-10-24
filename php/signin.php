<!DOCTYPE html>
	<head>
		<title>Welcome to mycs</title>
		<link href="../css/style2.css" rel="stylesheet" media="all" type="text/css">
		<link rel="icon" href="images/favicon.ico" />
		<meta charset="utf-8" />
		<meta name="author" content="Delvaux 'flav' Julien"/>
		<meta name="description" content="Mycs Index page" />
	</head>

	<body>

		<header>
			<p class="titre">MyCs</p>
		</header>

		<div id="content">
			<?php
			include_once("connect_db.php");

			$connect = connect_db();
			if(!$connect) {
					echo "<p style='color:red;'>Impossible de se connecter à la bdd</p>";
					return;
			}

			$m_email = $_REQUEST['email'];
			$m_pwd = $_REQUEST['pwd'];
			$pwd_sha1 = sha1($m_pwd);
			
				try {
					$user_exists = $connect->prepare("SELECT email, password FROM user WHERE email = :email AND password = :pwd");
					$user_exists->bindParam(':email', $m_email , PDO::PARAM_STR,255);
					$user_exists->bindParam(':pwd', $pwd_sha1 , PDO::PARAM_STR,255);
					$user_exists->execute();
			
					if(!$user_exists || $user_exists->rowCount() > 0) { 
						echo "<p align=center style='color:green;'>Identification réussie !</p>";
						echo '<p align=center>Redirection...</p>';
						header("Refresh: 4; url=../index.html");
					}else{
						echo "<p align=center style='color:red;'>Mauvaise combinaison email / mot de passe</p>";
						echo '<p align=center>Redirection...</p>';
						header("Refresh: 4; url=../index.html");
					}
				}catch(Exception $e) {
					echo "<br/>" . $e->getMessage() . "<br/>";
				}
			?>
		</div>

		<footer>
			<p>This is a small chat application in developement</p>
			<p>Copyright &copy; Mycs <br>All rights are reserved and registered</p>
		</footer>
	</body>
</html>