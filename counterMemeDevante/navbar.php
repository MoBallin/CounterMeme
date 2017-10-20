
<div >
	<img id='cmlogo' src="img/cmlogo2.png" alt='cmLogo'>
</div>

<nav class="navbar navbar-custom">
	<div class="container-fluid">
    	<div class="navbar-header">
    	</div>
    <ul class="nav navbar-nav">
		<li class="active"><a href="howItWorks.php">How it works</a></li>
 		<li><a href="index.php">Browse Smackdowns</a></li>
		<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Login/Create Account <span class="caret"></span></a>
        <ul class="dropdown-menu">
          	<form action="login1.php" method="POST">
				<div class="form-group">
      				<label for="fName">Username:</label>
      				<input  class="form-control" id="uName" name="uName">
    			</div>
				<div class="form-group">
      				<label for="fName">Password:</label>
      				<input  type="password" class="form-control" id="pass" name="pass">
				</div>
				<button class="btn btn-sm"><a href="createAccount.php">Create Account</a></button>
				<button type="submit" class="btn btn-sm" name="submit">Login</button>
			</form>
			
        </ul>
      </li>
	 </ul>
	 <form class="navbar-form navbar-right">
  		<div class="input-group">
    		<input type="text" class="form-control" placeholder="Search for smackdowns">
    		<div class="input-group-btn">
      			<button class="btn btn-default" type="submit">
        		<i class="glyphicon glyphicon-search"></i>
      			</button>
    		</div>
  		</div>
	</form>
  	</div>	
</nav>
