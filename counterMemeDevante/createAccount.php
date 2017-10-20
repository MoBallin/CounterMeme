<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
  		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		
		<title>Create Account</title>
		<link rel="stylesheet" type="text/css" href="css/navbar.css">
	</head>
	<body>
		<?php include'navbar.php';?>
		<div class="container">
			<h3>Create Account</h3>
			<form action="<?=$_SERVER['PHP_SELF']?>" method="POST">
				<div class="form-group">
      				<label for="fName">First Name:</label>
      				<input  class="form-control" id="fName" name="fName">
    			</div>
				<div class="form-group">
      				<label for="lName">Last Name:</label>
      				<input  class="form-control" id="lName" name="lName">
    			</div>
    			<div class="form-group">
      				<label for="email">Email address:</label>
      				<input type="email" class="form-control" id="email" name="email">
    			</div>
				<div class="form-group">
      				<label for="uName">Username:</label>
      				<input  class="form-control" id="uName" name='uName'>
    			</div>
				<div class="form-group">
      				<label for="pwd">Password:</label>
      				<input type="password" class="form-control" id="pwd" name="pwd">
    			</div>
				<div class="form-group">
      				<label for="abtMe">About me:</label><br>
      				<textarea rows="4" cols="50"></textarea>
    			</div>
    			<!--<div class="form-group">
      				<label for="pwd2">Confirm Password:</label>
      				<input type="password" class="form-control" id="pwd2" name="pwd2">
    			</div>
				-->
    			<div class="checkbox">
      				<label><input type="checkbox" name="remember"> Remember me</label>
    			</div>
    			<button type="submit" class="btn btn-default" name="submit">Create</button>
			</form>
		</div>
	</body>
</html>



<?php
	if(isset($_POST['submit'])){
        $host = "localhost";
        $user = "root";
        $pass = "";
        $db = "counterMeme";
        $port = 3306;
		$mysqli = new mysqli($host, $user, $pass, $db, $port); 
		if($mysqli->connect_errno){
            echo "Connection failed on line 5";
            exit();
        }
		
        $fName = $_POST["fName"];
        $lName = $_POST["lName"];
        $uName = $_POST["uName"];
        $pWord = $_POST["pwd"];
		$email = $_POST["email"];
		
		
        $query = "select ID from cmUsers where username=?";
        $stmt = $mysqli->stmt_init();
        if(!$stmt->prepare($query)){
            exit();
        }
        $stmt->bind_param("s", $uName);
        $stmt->execute();
        $result = $stmt->get_result();
        $exists = $result->num_rows;
		$row = $result->fetch_assoc();
		$ID = $row['ID'];
		
		
        if ($exists == 0){
			$hash = password_hash($pWord, PASSWORD_DEFAULT);
			$query = "insert into cmUsers (fName,lName,email,username,password) values (?,?,?,?,?);";
			$stmt = $mysqli->stmt_init();
			if(!$stmt->prepare($query)){
				exit();
			}
			$stmt->bind_param("sssss", $fName,$lName,$email,$uName,$hash);
			$stmt->execute();
            if ($mysqli->query($query) == TRUE) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $query . "<br>" . $mysqli->error;
            }
			$query = "select * from cmUsers where username=?";
			$stmt = $mysqli->stmt_init();
        	if(!$stmt->prepare($query)){
            	exit();
        	}
        	$stmt->bind_param("s", $uName);
        	$stmt->execute();
        	$result = $stmt->get_result();
        	$exists = $result->num_rows;
			$row = $result->fetch_assoc();
			$ID = $row['ID'];
			$filePath="database/userContent/$ID";
			
			
			
			//make user folders
			$oldmask = umask(0);
			mkdir($filePath,0777,true);
			$filePath="database/userContent/$ID/$ID";
			mkdir($filePath . "smackdowns",0777,true);
			mkdir($filePath . "memes",0777,true );
			mkdir($filePath . "counters",0777, true);
			mkdir($filePath . "stash",0777, true);
			umask($oldmask);
			
			
			//make user tables 
			$query1 = "create table " . "$ID" . "followers
				(
					ID int,
					dateFollowed date,
					primary key (ID)

				);" ;
				
			$query2 = "create table " . "$ID" . "following
				(
					ID int, 
					dateFollowed date,
					primary key (ID)

				);" ;
			$query3 = "create table " . "$ID" . "smackdowns 
				(
					ID int not null auto_increment,

					mainImg varchar(255),
					orangeImg varchar(255),
					greyImg varchar(255),
					greyVotes int default 0,
					orangeVotes int default 0, 
					orangeTitle varchar(255),
					greyTitle varchar(255),
					mainTitle varchar(255),
					category varchar(255),
					viewCount int default 0,
					tags varchar(255),
					caption varchar(255),


					primary key (ID)
				);" ;
			$query4 = "create table " . "$ID" . "memes 
				( 
					ID int not null auto_increment, 
					userID int,

					img varchar(255),
					uVotes int,
					dVotes int,

					primary key (ID)
				);";
		
			if ($mysqli->query($query1) === TRUE) {
    			echo "follower Table created successfully<br>";
			} else {
    			echo "Error creating table: " . $mysqli->error;
			}
			if ($mysqli->query($query2) === TRUE) {
    			echo "following Table created successfully<br>";
			} else {
    			echo "Error creating table: " . $mysqli->error;
			}
			if ($mysqli->query($query3) === TRUE) {
    			echo "smackdown Table created successfully<br>";
			} else {
    			echo "Error creating table: " . $mysqli->error;
			}
			if ($mysqli->query($query4) === TRUE) {
    			echo "meme Table created successfully<br>";
			} else {
    			echo "Error creating table: " . $mysqli->error;
			}
			
			session_start();
			$_SESSION['user'] = $row;
			header ("location: portfolio.php");
        }
        else {
            echo 'username taken :/';
        }

    }
				  /*
				              $query = "insert into cmUsers (fName,lName,email,username,password) values ( ? , ? , ? , ? , ?);";
            $stmt = $mysqli->stmt_init();
            
            if(!$stmt->prepare($query)){
                echo 'fuck';
                exit();
            }
			if ($fName = '' || $lName =''|| $uName =''|| $pWord =''|| $email=''){
			echo 'all fields required';
			exit;
		}
            $hash = password_hash($pWord, PASSWORD_DEFAULT);
            $stmt->bind_param("sssss", $fName,$lName,$email,$uName,$hash);
            $stmt->execute();*/
?>

