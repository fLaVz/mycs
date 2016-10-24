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

			$m_user = $_REQUEST['nick'];
			$m_pwd = $_REQUEST['pwd'];
			$m_email = $_REQUEST['email'];
			
			$today = date("Y-m-d");

			$continue = 1;
 
			$pwd_sha1 = sha1($m_pwd);

			try {
				$user_exists = $connect->prepare("SELECT nick FROM user WHERE nick = :nick");
				$user_exists->bindParam(':nick', $m_user , PDO::PARAM_STR,255);
				$user_exists->execute();

				if(!$user_exists || $user_exists->rowCount() > 0) { 
					echo "<p style='color:red;'>Un autre utilisateur avec le même pseudo existe déjà!</p>";
					echo '<p>Redirection...</p>';
					$continue = 0;
					header("Refresh: 4; url=../index.html");
				
				}
			}catch(Exception $e) {
				echo "<br/>" . $e->getMessage() . "<br/>";
				
			}


			if($continue == 1) {

				try { // Insère l'utilisateur
					$insert = $connect->prepare("INSERT INTO user (nick,password,email,date)
		                            VALUES (:nick,:password,:email,:date)");
					$insert->bindParam(':nick', $m_user, PDO::PARAM_STR,255);
					$insert->bindParam(':password', $pwd_sha1, PDO::PARAM_STR,255);
					$insert->bindParam(':email', $m_email, PDO::PARAM_STR,255);
					$insert->bindParam(':date', $today, PDO::PARAM_INT,30);
					
					$insert->execute();
					echo '<p>Votre inscription a bien été prise en compte, merci !</p>';
					echo '<p>Redirection...</p>';
					header("Refresh: 4; url=../index.html");


				}catch(Exception $e) {
					echo "<br/>" . $e->getMessage() . "<br/>";
				}
			}
			?>
		</div>

		<footer>
			<p>This is a small chat application in developement</p>
			<p>Copyright &copy; Mycs <br>All rights are reserved and registered</p>
		</footer>
	</body>
</html>