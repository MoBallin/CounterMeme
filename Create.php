<?php 
    session_start();
    if(!isset($_SESSION['user'])){
        header("Location: index.php");  
    } 
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Create Memes</title>
  </head>
  <body>
    create memes page
  </body>
</html>