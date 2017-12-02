<?php
    session_start();
    
	if(!isset($_SESSION['user'])){
		include 'not_logged_in.php';
	}
	else {
		include 'logged_in.php';
	} 
	
    $link = mysqli_connect("localhost", "root", "cap2017M3M3count", "CounterMeme") or die (mysql_error());
    $user = $_SESSION['user'];
if($user == ""){
    exit;
}
    if(isset($_POST['info'])) {
        $fName = $_POST['fName'];
        $lName = $_POST['lName'];
        $aboutMe = $_POST['aboutMe'];
        $age = $_POST['age'];
        $gender = $_POST['gender'];
        $sql = 'UPDATE users SET fName="' . $fName . '", lName="' . $lName . '", age="' . $age . '", aboutMe="' . $aboutMe . '", gender="' . $gender . '" WHERE username="' . $user . '";';
        mysqli_query($link, $sql);

    }
    
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Personal Info</title>
	
	<style>
		bodyDiv{
			width: 205px;
			padding-left: 0;
			padding-right: 0;
			margin-left: auto;
			margin-right: auto;
			display: block;
		}
		
	</style>
  </head>
  <body>
	<div id="bodyDiv">
	<?php
	echo "Username: $user<br>";
	echo "First Name: $fName<br>";
	echo "Last Name: $lName<br>";
	echo "Age: $age<br>";
	echo "Gender: $gender<br>";
	?>
	
    <form method="post" action="optionalUserInfo.php">
        <br>First Name:<br><input id="fName" name="fName" type="text">
        <br>Last Name:<br><input id="lName" name="lName" type="text">
        <br>About Me:<br><textarea rows="4" cols="50" id="aboutMe" name="aboutMe"></textarea>
        <br>Age:<br><input id="age" name="age" type="text">
        <br>Gender:<br>Male <input id="gender" name="gender" value="Male" type="radio">   Female <input id="gender" name="gender" value="Female" type="radio"><br>
      <button type="submit" name="info" value="info">Submit Info</button>
    </form> 
	</div>
  </body>
</html>