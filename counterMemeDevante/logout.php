<?php
  session_start();
	if(isset($_SESSION['user'])){
		session_destroy();
		header("location: index.php");
	}
  else 
  {
    echo "fuck";
  }
?>