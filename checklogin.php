<?php 

            session_start();
            if(!isset($_SESSION['user'])){
                header("Location: http://173.255.195.5/index.php#"); 
                exit; 
            } 
        ?>