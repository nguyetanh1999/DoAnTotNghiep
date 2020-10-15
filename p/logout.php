<?php
	session_start();
	unset($_SESSION["loggedin"]);
	unset($_SESSION["id"]);
	unset($_SESSION["username"]);
	unset($_SESSION["type"]);
	session_destroy();
	header("Location: login.php");
?>