<div id="header">
		<img id='cmlogo' src="img/cmlogo2.png" alt='cmLogo' >
	</div>
<nav class="navbar navbar-custom">
  <div class="container-fluid">
    <div class="navbar-header">
    </div>
    <ul class="nav navbar-nav">
		<?php echo "<li><a href='portfolio.php'>Welcome, " . $_SESSION["user"]['username'] . "</a></li>"?>
		<li><a href="portfolio.php">Portfolio</a></li>
		<li><a href="browse.php">Browse Smackdowns</a></li>
		<li class="dropdown">
			<a class="dropdown-toggle" data-toggle="dropdown" href="#">Create <span class="caret"></span></a>
			<ul class="dropdown-menu">
				<li><a href="createMeme.php">Meme Creator</a></li>
				<li><a href="createSmackdown.php">Create a Smackdown</a></li>
			</ul>
      	</li>
      <li><a href="logout.php">Logout</a></li>
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