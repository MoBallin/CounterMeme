<?php
  session_start();
  $link = mysqli_connect("localhost", "root", "cap2017M3M3count", "CounterMeme") or die (mysql_error());
  $link2 = mysqli_connect("localhost", "root", "cap2017M3M3count", "\$user_memes") or die (mysql_error());
    
  if(isset($_SESSION['user'])) {
    header('location: index.php');
    exit;
  }

  date_default_timezone_set('UTC');

  // Check if username is valid and available
  if(isset($_POST['usernamecheck'])) {
    $username = preg_replace('#[^a-z0-9]#i', '', $_POST['usernamecheck']);
    $sql = 'SELECT id FROM users WHERE username = "' . $username . '" LIMIT 1';
    $query = mysqli_query($link, $sql);
    $uname_check = mysqli_num_rows($query);
    if(strlen($username) < 3 || strlen($username) > 16) {
      echo '<div class="signUpError">Must be 3 - 16 characters</div>';
      exit();
    }
    if(is_numeric($username[0])) {
      echo '<div class="signUpError">Must begin with a letter</div>';
      exit();
    }
    if($uname_check < 1) {
      echo 'ok';
      exit();
    } else {
      echo '<div class="signUpError">This username is already taken!</div>';
      exit();
    }
  }

  if(isset($_POST['username'])) {
    $fname = preg_replace('#[^a-z]#i', '', $_POST['fname']);
    $lname = preg_replace('#[^a-z]#i', '', $_POST['lname']);
    $user = preg_replace('#[^a-z0-9]#i', '', $_POST['username']);
    $email = mysqli_real_escape_string($link, $_POST['email']);
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    $pass = mysqli_real_escape_string($link, $_POST['password']);
    $passc = mysqli_real_escape_string($link, $_POST['confirmPass']);

    $sql = 'SELECT id FROM users WHERE username="' . $user . '" LIMIT 1';
    $query = mysqli_query($link, $sql);
    $u_check = mysqli_num_rows($query);

    $sql = 'SELECT id FROM users WHERE email="' . $email . '" LIMIT 1';
    $query = mysqli_query($link, $sql);
    $e_check = mysqli_num_rows($query);

    if($user == '' || $email == '' || $pass == '') {
      echo 'The form submission is missing values.';
      if(isset($_POST['regPage'])) {
        exit();
      }
    } else if(is_numeric($user[0])) {
      echo 'Username cannot begin with a number';
      if(isset($_POST['regPage'])) {
        exit();
      }
    } else if($u_check > 0) {
      echo 'The username you entered is alreay taken';
      if(isset($_POST['regPage'])) {
        exit();
      }
    } else if($pass != $passc) {
      echo 'Passwords do not match';
      if(isset($_POST['regPage'])) {
        exit();
      }
    } else if($e_check > 0) {
      echo 'That email address is already in use in the system';
      if(isset($_POST['regPage'])) {
        exit();
      }
    } else if(strlen($user) < 3 || strlen($user) > 16) {
      echo 'Username must be between 3 and 16 characters';
      if(isset($_POST['regPage'])) {
        exit();
      }
    } else if(strlen($pass) < 8 || strlen($pass) > 32) {
      echo 'Password must be between 8 and 32 characters';
      if(isset($_POST['regPage'])) {
        exit();
      }
    } else {
      $pass = sha1($pass);
      mysqli_query($link, $sql);
      $dir_path = "/var/www/countermeme/storage/" . strtolower($user) . "/";
      $datetime = date("Y-m-d h:i:s", time());
      $sql = 'INSERT INTO users(username, password, email, fname, lname, signup) VALUES ("' . $user . '", "' . $pass . '","' . $email . '", "' . $fname . '", "' . $lname . '", "' . $datetime . '");';
      mysqli_query($link, $sql);
      if (!file_exists($dir_path)) {
        mkdir($dir_path);
        chmod($dir_path, 0777);
      }
      $sql = 'create table ' . $user . '_Memes
            (
                memeID int not null auto_increment primary key,
                filetype varchar(255),
                usermemeID int
            );';
      mysqli_query($link, $sql);
      $sql = 'create table ' . $user . '_Followers
            (
                ID int not null auto_increment primary key,
                followerID int,
                followTime DATETIME,
                foreign key (followerID) references users(ID)
            );';
      mysqli_query($link, $sql);
      $sql = 'create table ' . $user . '_Following
            (
                ID int not null auto_increment primary key,
                followingID int,
                followTime DATETIME,
                foreign key (followingID) references users(ID)
            );';
      mysqli_query($link, $sql);

      $_SESSION['user'] = $user;

      if(isset($_POST['regPage'])) {
        echo 'signup_success';
      } else {
        header("location: index.php"); 
      }
      exit;
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Register</title>
    <script>
      function ajaxObj(method, url) {
        var x = new XMLHttpRequest();
        x.open( method, url, true );
        x.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        return x;
      }

      function ajaxReturn(x) {
        if(x.readyState == 4 && x.status == 200) {
          return true;
        }
      }

      // Prevent certain characters for certain fields
      function restrict(elem) {
        var tf = document.getElementById(elem);
        var rx = new RegExp();
        if(elem == 'email') {
          rx = /[^a-z0-9_\!\@\#\$\%\^\&\*\+\-\=\?\`\~\{\}\|\.\[\]]/gi;
        } else if(elem == 'username') {
          rx = /[^a-z0-9]/gi;
        } else if(elem == 'fname' || elem == 'lname') {
          rx = /[^a-z]/gi;
        }
        tf.value = tf.value.replace(rx, '');
      }

      // Check if username is valid and available
      function checkusername() {
        var user = document.getElementById('username').value;
        if(user != '') {
          document.getElementById('unamestatus').innerHTML = 'checking ...';
          var ajax = ajaxObj('POST', 'register.php');
          ajax.onreadystatechange = function() {
            if(ajaxReturn(ajax) == true) {
              if(ajax.responseText == 'ok') {
                document.getElementById('unamestatus').innerHTML = '<div class="signUpSuccess">' + user + ' is available!</div>';
              } else {
                document.getElementById('unamestatus').innerHTML = ajax.responseText;
              }
            }
          };
          ajax.send('usernamecheck=' + user);
        }
        else {
          document.getElementById('unamestatus').innerHTML = '<br>';
        }
      }

      // Sends sign up info to php
      function signup() {
        var fname = document.getElementById('fname').value;
        var lname = document.getElementById('lname').value;
        var user = document.getElementById('username').value;
        var pass = document.getElementById('password').value;
        var passc = document.getElementById('confirmedPass').value;
        var email = document.getElementById('email').value;
        var status = document.getElementById('status');
        if(user == '' || pass == '' || passc == '' || email == '') {
          status.innerHTML = 'Fill out all of the form info';
        } else if(pass != passc) {
          status.innerHTML = 'Your passwords do not match';
        } else {
          document.getElementById('registerBtn').style.display = 'none';
          status.innerHTML = '<span style="color:black">please wait ... </span>';
          var ajax = ajaxObj('POST', 'register.php');
          ajax.onreadystatechange = function() {
            if(ajaxReturn(ajax) == true) {
              if(ajax.responseText != 'signup_success') {
                status.innerHTML = ajax.responseText;
                document.getElementById('registerBtn').style.display = 'inline';
              } else {
                // alert("Success!");
                window.location.replace('index.php');
              }
            }
          };
          ajax.send('username=' + user + '&password=' + pass + '&confirmPass=' + passc + '&email=' + email + '&fname=' + fname + '&lname=' + lname + '&regPage=true');
        }
      }
    </script>
  </head>
  <body>
    <form onsubmit="return false;">
      <br>First Name:<br> <input id="fname" name="fname" type="text" onkeyup="restrict('fname')"><br><br>
      <br>Last Name:<br> <input id="lname" name="lname" type="text" onkeyup="restrict('lname')"><br><br>
      <br>Username:<br> <input id="username" name="username" type="text" onblur="checkusername()" onkeyup="restrict('username')">
      <div id="unamestatus"><br></div>
      <br>Password:<br><input id="password" name="password" type="password"><br><br>
      <br>Confirm Password:<br><input id="confirmedPass" name="confirmedPass" type="password"><br><br>
      <br>Email:<br><input id="email" name="email" type="text" onkeyup="restrict('email')"><br><br>
      <br><button id="registerBtn" type="submit" value="register" onclick="signup()">Register</button><br>
      <div id="status" class="signUpError"><br></div>
    </form>
  </body>
</html>
