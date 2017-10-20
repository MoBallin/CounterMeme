<?php
	if(isset($_POST['submit'])){
        $host = "localhost";
        $user = "root";
        $pass = "";
        $db = "counterMeme";
        $port = 3306;
		
        $uName = $_POST["uName"];
        $pWord = $_POST["pass"];
        $mysqli = new mysqli($host, $user, $pass, $db, $port); 
        if($mysqli->connect_errno){
            echo "Connection failed on line 5";
            exit();
        }
		
		
		
        //get hash
        $query='select * from cmUsers where username=?';
        $stmt = $mysqli->stmt_init();
        if(!$stmt->prepare($query)){
            exit();
        }
        $stmt->bind_param("s", $uName);
        $stmt->execute();
        $result = $stmt->get_result();
        $exists = $result->num_rows;
        
        if ($exists == 0) {
            echo "account doesnt exist";
            exit();
        }

        $row = $result->fetch_assoc();
		$hash = $row['password'];


        if (password_verify($pWord, $hash)) {
            echo 'correct password, proceed';
            session_start();
            //echo $row[2];
			$_SESSION['user'] = $row;
            header('Location: portfolio.php');
        
        }
        else {
            echo "wrong password ". $row[2];
        }
    }
?>