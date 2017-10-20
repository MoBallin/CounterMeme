<!doctype html>
<?php
session_start();
?>
<html>
	<head>
		<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
	<title>Browse</title>
	<link rel="stylesheet" type="text/css" href="css/navbar.css">
	</head>
	<body>
		<?php include'loggedInNavbar.php'; ?>
		<div class="container">
			<div class="row">
				<h3>All Smackdowns</h3>
				<div>
					<?php getSmackdowns(); ?>
				</div>
			</div>
		</div>
		
		
	</body>
</html>

<?php
	function getSmackdowns(){
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
			$ID = $_SESSION['user']['ID'];
			$query="select * from " ."$ID"."smackdowns";
			$result = $mysqli->query($query);
			if ($result->num_rows > 0) {

				while($row = $result->fetch_assoc()) {
					$img = $row["mainImg"];
					$smackName = $row["mainTitle"];
					echo "<h7 class='orangeSide'>$smackName</h7><br>";
					echo "<img src='$img' alt='$smackName' height='150' width='175'>";
				}
			} 
			else {
				echo "0 results";
			}
	}
?>