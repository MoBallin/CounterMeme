<?php
	session_start();

	session_destroy();
	unset($_SESSION['user']);
	header("Location: index.php");
	#header("Refresh:0");
  exit;

?>