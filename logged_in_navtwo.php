<!DOCTYPE html>
<html lang="en">
<head>
	<?php 

            session_start();
            if(!isset($_SESSION['user'])){
                header("Location: index.php");  
            } 
            if(isset($_SESSION['user'])){
                header("Location: logged_in.php");  
            } 
            if(isset($_POST['loginBtn'])){
        
        
            header("location: logout.php");   
            
        
            }
    ?>
	  <title>CounterHome</title>
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:700,600' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="logged_in_home.css">
    
    <!-- adds the carrot, just testing out something--><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<!-- jquery js, necessary -->
	<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
            crossorigin="anonymous">
	</script>
	<!--<script src="counterJavaScript.js" type="text/javascript"></script>
	<link rel="stylesheet" type="text/css" href="main.css">-->

	<style>
     
    </style>

	<script>
            
    </script>
</head>
<body>

<nav id="navbar-top" class="navbar-static">
  <div class="container-fluid">
    <div class="conatainer-fluid">
      <a class="navbar-brand" href="index.php">Counter<span id="grey-meme">Meme</span></a>
    </div>
    <ul class="nav navbar-nav">
      <li><h1 id="express">Express What You Meme!</h1></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li>
	<form class="navbar-form navbar-right" role="search">
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Search">
          </div>
          <button type="submit" class="btn btn-default">Submit</button>
        </form>
	
      </li>
    </ul>
  </div>
</nav>


  <div id="navbar-bottom" class="navbar-inverse">
	  <nav id="real-nav" class="navbar navbar-inverse navbar-static" role="navigation">
		<ul style="padding-left: 100px;"class="nav navbar-nav">
		  <li id="nav-li" class="active"><a href="howItWorks.php">How It Works</a></li>
		  <li id="nav-li"><a href="#">Portfolio</a></li>
            <li id="nav-li"><a href="#">Browse Smackdowns</a></li>
            <li id="nav-li"><a href="MemeCreator.php">Create</a></li>
		</ul>
		<ul class="nav navbar-nav pull-right">
            <form method="post" action="logged_in.php">
		  	<li id="login-li">
				<button name="loginBtn" value="loginBtn" id="loginBtn" type="submit" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">
					 Logout
				</button> 
            </form>
				
				
		</ul>
	</nav>
  </div>

  
<div id="stage"> 
</div>

</body>
</html>
