<!DOCTYPE html>
<html lang="en">
<head>
	<?php 
            session_start();
			if(isset($_SESSION['user'])){
                header("Location: logged_in.php");  
            } 
            /*if(isset($_POST['loginBtn'])){
            header("location: logout.php");   
            }*/
    ?>
	  <title>CounterHome</title>
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:700,600' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<!--<link rel="stylesheet" href="logged_in_home.css">-->
	<link rel="stylesheet" href="main.css">
    
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
		  <li id="nav-li"><a href="howItWorks">How It Works</a></li>
		  <li id="nav-li"><a href="BrowseSmackDowns">Browse Smackdowns</a></li>
		</ul>
		<ul class="nav navbar-nav pull-right">
            <li id="login-li">
				<button id="loginBtn" type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">
					<span class="glyphicon glyphicon-log-in"></span> Login
				</button> 
				
				<!-- start of Modal for Log-In -->
				<div class="modal fade" id="myModal" role="dialog">
					<div class="modal-dialog">
					  <!-- Modal content-->
					  <div class="modal-content">
						<div class="modal-header">
						  <button type="button" class="close" data-dismiss="modal">&times;</button>
						  <h4 style="color: #3498db;" class="modal-title">Please Log-In</h4>
						</div>
						<div class="modal-body">

							<!-- start of form -->	
							<!--<img src="image.png" onError="this.onerror=null;this.src='./html/Pepe.png';" /> -->
							  <form id="loginBody" method="post" action="login.php">
								<div class="box">
									<h1 style="color: orange;">Counter<span style="color: #cacdce">Meme</span> Login</h1>
									<input type="text" name="username" placeholder="Username" onFocus="field_focus(this, 'email');" onblur="field_blur(this, 'email');" class="nameSpace" />

									<input type="password" name="password" placeholder="Password" onFocus="field_focus(this, 'password');" onblur="field_blur(this, 'password');" class="nameSpace" />

									<button type="submit" name="login" id="btn1" value="login">Login</button> <!-- End Btn -->
								</div> <!-- End Box -->
							</form>

							<p>Forgot your password? <u style="color:#f1c40f;">Click Here!</u></p>


						</div>
						<div class="modal-footer">
						  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						</div>
					  </div>
					</div>
				</div>
  
			</li>

			<li id="login-li">
				
				<button id="signUp"type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal2">
			  		<a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a>
			  	</button> 
				<div class="modal fade" id="myModal2" role="dialog">
					<div class="modal-dialog">
					  <!-- Modal content-->
						  <div class="modal-content">
								<div class="modal-header">
								  <button type="button" class="close" data-dismiss="modal">&times;</button>
								  <h4 style="color: #3498db;" class="modal-title">Sign Up!</h4>
								</div>
								<div class="modal-body">
								  <form id="loginBody" method="post" action="register.php">
									<div class="box">
										<h1 style="color: orange;">Create Counter<span style="color: #cacdce">Meme</span> Account</h1>
										
										<input type="text" name="fname" placeholder="First Name" onFocus="field_focus(this, 'fname');" onblur="field_blur(this, 'fname');" class="nameSpace2" />
										
										<input type="text" name="lname" placeholder="Last Name" onFocus="field_focus(this, 'lname');" onblur="field_blur(this, 'lname');" class="nameSpace2" />
										
										<input type="text" name="username" placeholder="Username" onFocus="field_focus(this, 'username');" onblur="field_blur(this, 'username');" class="nameSpace2" />

										<input type="password" name="password" placeholder="Password" onFocus="field_focus(this, 'password');" onblur="field_blur(this, 'password');" class="nameSpace2" />
										
										<input type="password" name="confirmedPass" placeholder="Confirm Password" onFocus="field_focus(this, 'confirmedPass');" onblur="field_blur(this, 'confirmedPass');" class="nameSpace2" />
                                        
                                        <input type="email" name="email" placeholder="Email" onFocus="field_focus(this, 'email');" onblur="field_blur(this, 'email');" class="nameSpace2" />

									<button id="btn2" type="submit" name="register" value="register">Create Account!</button> <!-- End Btn -->
								</div> <!-- End Box -->
							</form>
								</div>
								<div class="modal-footer">
								  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								</div>
						  </div>
					</div>
				</div>
				
			</li>
		</ul>
	</nav>
  </div>

  
<div id="stage"> 
<script>
            function stageContent(content){
                $("#stage").html(content); 
            }
            
            $(function(){
                //$.get("index.php", stageContent); 
                
                $("nav[role=navigation] a").click(function(e) {
                    // don't follow the href 
                    e.preventDefault(); 
                    
                    var request = $(this).attr("href"); 
                    
                    if(request == "howItWorks"){
                        $.get("howItWorks.php", stageContent); 
                    }
                    else if(request == "BrowseSmackDowns"){
                        $.get("BrowseSmackDowns.php", stageContent); 
                    }
                    /*else {
                        $.get("index.php", stageContent); 
                    }*/
                }); 
            }); 
        </script>
		
<?php
	include 'memeCarousel.html';
?>
</div>

</body>
</html>
