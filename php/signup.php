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
			<p class="titre">MyCs</p>
		</header>

		<div id="content">
			<?php
			include_once("php/connect_db.php");
			define('PREFIXE_SHA1', 'p8%B;Qdf78');

			$connect = connect_db();
			if(!$conn) {
					echo "<p style='color:red;'>Impossible de se connecter à la bdd</p>";
					return;
			}

			$m_user = $_REQUEST['nick'];
			$m_pwd = $_REQUEST['pwd'];
			$m_email = $_REQUEST['email'];
			$today = date("m.d.y");
 
			$pwd_sha1 = sha1(PREFIXE_SHA1.$mdp);

			try { // Insère l'utilisateur
				$insert = $connect->prepare("INSERT INTO user (nick,password,email,date)
	                            VALUES (:nick,:password,:email,:date)");
				$insert->bindParam(':nick', $m_user, PDO::PARAM_STR,15);
				$insert->bindParam(':password', $pwd_sha1, PDO::PARAM_STR,32);
				$insert->bindParam(':email', $m_email, PDO::PARAM_STR,15);
				$insert->bindParam(':date', $today, PDO::PARAM_STR,30);
				
				$insert->execute();
				return true;
				
			}catch(Exception $e) {
				echo "<br/>" . $e->getMessage() . "<br/>";
				return false;
			}


			?>
		</div>

		<footer>
			<p>This is a small chat application in developement</p>
			<p>Copyright &copy; Mycs <br>All rights are reserved and registered</p>
		</footer>
	</body>
</html>