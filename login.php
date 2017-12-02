<?php
  session_start();
  $link = mysqli_connect("localhost", "root", "cap2017M3M3count", "CounterMeme") or die (mysql_error());
  date_default_timezone_set('UTC');

  if(isset($_SESSION['user'])){
		header("location: index.php");
    exit;
  }

  if(isset($_POST['login'])){   
    $datetime = date("Y-m-d h:i:s", time());   
    $username = preg_replace('#[^a-z0-9]#i', '', $_POST['username']);
    $password = mysqli_real_escape_string($link, $_POST['password']);
    $password = sha1($password);
        
    if($username == '' || $password == ''){
      header("location: index.php");   
      exit;
    }

    $sql = 'SELECT username, password FROM users WHERE username= "' . $username . '" AND  password= "' . $password . '" LIMIT 1;';
    if($result = mysqli_query($link, $sql)){
      if(mysqli_num_rows($result) == 1){
        $sql = 'UPDATE users SET lastlogin="' . $datetime . '" WHERE username="' . $username . '";';  
        mysqli_query($link, $sql);

        $_SESSION['user'] = $username;
        
        header("location: index.php");
        exit;
      } else {
        echo "Incorrect Username/Password Combination";
      }
    } else {
      echo "Database Query Error";
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Login</title>
    <script>
      // Prevent certain characters for certain fields
      function restrict(elem) {
        var tf = document.getElementById(elem);
        var rx = new RegExp();
        if(elem == 'username') {
          rx = /[^a-z0-9]/gi;
        }
        tf.value = tf.value.replace(rx, '');
      }
    </script>
  </head>
  <body>
    <form method="post" action="login.php">
      <br>Username:<br> <input id="username" name="username" type="text" onkeyup="restrict('username')"><br><br>
      <br>Password:<br><input id="password" name="password" type="password"><br><br>
      <br><button type="submit" name="login" value="login">Log In</button>
    </form>
  </body>
</html>