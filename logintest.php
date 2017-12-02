<?php
    
    session_start();
    $link = mysqli_connect("localhost", "root", "cap2017M3M3count", "CounterMeme") or die (mysql_error());
    date_default_timezone_set('America/Chicago');

    if(isset($_SESSION['user'])){

		header("location: index.php");
        exit;
    }
	
	

    if(isset($_POST['login'])){
        
        $username = $_POST['username'];
        $password = $_POST['password'];
        $password = sha1($password);
        
        if($username == '' || $password == ''){
header("location: index.php");   
            exit;
        
        }
        
        $datetime = date("Y-m-d h:i:s", time());
    
        $sql = 'SELECT username, password FROM users WHERE username= "' . $username . '" AND  password= "' . $password . '" LIMIT 1;';
        if($result = mysqli_query($link, $sql)){
            
            if(mysqli_num_rows($result) == 1){
                $_SESSION['user'] = $username;
                $_SESSION['password'] = $password;
                $sql = 'UPDATE users SET lastlogin="' . $datetime . '" WHERE username="' . $username . '";';  
                mysqli_query($link, $sql);
                
                header("location: index.php");
                exit;
            } else {
                echo "Error during login. Contact site administrator";
                
            }
        } else {
            echo "still cant log on";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Login</title>
  </head>
  <body>
    <form method="post" action="logintest.php">
      <br>username:<br> <input id="username" name="username" type="text">
      <br>password:<br><input id="password" name="password" type="password">
      <button type="submit" name="login" value="login">Log In</button>
    </form>
  </body>
</html>