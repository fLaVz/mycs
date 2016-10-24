<?php
function connect_db() {
	$user = "id22974_flav";
	$pwd  = "jesuis1noob";

	try {
		$conn = new PDO("mysql:host=localhost;dbname=id22974_mycsdb",$user,$pwd);
		$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	} catch(PDOException $e) {
		$conn = "";
		echo "<br/>" . $e->getMessage() . "<br/>";
		return false;
	}
	return $conn;
}
?>
