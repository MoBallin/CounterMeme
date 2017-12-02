<?php
	session_start();
  if(!isset($_SESSION['user'])){
    include 'not_logged_in.php';
	}
	else {
		include 'logged_in.php';
	} 
?>


