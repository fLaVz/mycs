<?php
function connect_db() {
	//$user = "id22974_flav";
	//$pwd  = "jesuis1noob";
	//id22974_mycsdb

	$user = "root";

	try {
		$conn = new PDO("mysql:host=localhost;dbname=test",$user,$pwd);
		$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	} catch(PDOException $e) {
		$conn = "";
		echo "<br/>" . $e->getMessage() . "<br/>";
		return false;
	}
	return $conn;
}
?>
