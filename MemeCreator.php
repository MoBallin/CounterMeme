<DOCTYPE html>
<html lang="en-US">
    <head>
        <?php 

            session_start();
            if(!isset($_SESSION['user'])){
                header("Location: index.php");  
            } 
        
        ?>
        <title>Meme Maker</title>
        <meta charset='utf-8'>
        <meta name="viewport" content="width=device-width, initial-scale=1">
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:700,600' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<!--<link rel="stylesheet" href="logged_in_home.css">-->
    <link rel="stylesheet" href="main.css">
    
	
	<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
            crossorigin="anonymous">
	</script>
	<!--<script src="counterJavaScript.js" type="text/javascript"></script>
	<link rel="stylesheet" type="text/css" href="main.css">-->
        
        <style>
            canvas{
                border: solid 5px black;
				padding-left: 0;
				padding-right: 0;
				margin-left: auto;
				margin-right: auto;
				display: block;
			}
			#scale{
				width: 250px;
				padding-left: 0;
				padding-right: 0;
				margin-left: auto;
				margin-right: auto;
				display: block;
			}
			#scaleDiv{
				border: solid 5px black;
				width: 260px;
				padding-left: 0;
				padding-right: 0;
				margin-left: auto;
				margin-right: auto;
				display: block;
			}     
            
        </style>
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
            
		  <li id="nav-li" class="active"><a href="index.php?howItWorks=true">How It Works</a></li>
		  <li id="nav-li"><a href="./portfolio.php">Portfolio</a></li>
            <li id="nav-li"><a href="#">Browse Smackdowns</a></li>
             <li id="nav-li">
			  <button data-toggle="dropdown">Create
				  <span class="caret"></span></button>
					  <ul class=" text-left dropdown-menu">
						<li class="text-center" id="dropdown-li"><a href="MemeCreator.php">Create Meme</a></li>
						<li class="text-center" id="dropdown-li"><a href="createMemeSmackdown.html">CreateSmackdown</a></li>
					  </ul>
		 </li>	
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
        <div id="UIInitialization">
            <canvas id="memeCrafter" width="250" height="250"></canvas>
            <img id="start-image" style="display: none;" src="storage/StockMemes/seal.jpg" alt=""/>
            <div id="scaleDiv"><input id="scale" max="4" min="0.1" step="0.01" type="range" value="1"/></div>
            <input id="fileInput" onchange="imageLoader()" type="file" />
            <input id="topText" type="text" onchange="doTransform()" placeholder="Enter Text Here" />
            <input id="bottomText" type="text" onchange="doTransform()" placeholder="Enter Text Here" />
            <a href="#" id="imageDownload" download="CounterMeme-meme.png">Download Image</a>
            <button id="sizeSwapper" type="button" onclick="swapClicked()">Change Size</button>
            <button id="saveUpload" type="button" onclick="saveUpload()">Save Your Upload</button>
        </div>
        <div id="templateSelector">
            <?php
                if (!file_exists("storage/StockMemes") && !is_dir("storage/StockMemes")) {
                    echo "<p>Error 404: Unable to Locate Storage Directory</p>";
                }else{
                    $directory = "storage/StockMemes/";
                    $images = glob($directory . "*.{jpg,jpeg,gif,png}", GLOB_BRACE);
                    foreach($images as $image){
                        list($width, $height) = getimagesize($image);
                        if($width == $height){
                            #Height and Width are equal
                            echo "<img class=\"displayImage\"src=\"".$image."\" alt=\"".$image."\" style=\"width:".$width."px;height:".$height.";\">";
                        }else if($width > $height){
                            #Width is greater than height
                            
                        }else{
                            #Height is greater than width
                            
                        }
                    }
                    /*
                    if (!file_exists($directory . "PNG") && !is_dir($directory . "PNG")) {
                        $oldmask = umask(0);
                        mkdir($directory . "PNG", 0777);
                        umask($oldmask);
                    }
                    $pngs = glob($directory . "*.png");
                    foreach($pngs as $png){
                        $dest = str_replace($directory, $directory . "PNG/", $png);
                        copy($png, $dest);
                    }
                    */
                }
            ?>
            <button id="templateImage1" onclick="loadTemplateImage(1)"><img src="storage/StockMemes/seal.jpg" alt="Awkward Seal" style="width:80px;height:80px;"></button>
            <button id="templateImage2" onclick="loadTemplateImage(2)"><img src="storage/StockMemes/thinkinfella.jpg" alt="TempPH" style="width:80px;height:80px;"></button>
            <button id="templateImage3" onclick="loadTemplateImage(3)"><img src="storage/StockMemes/pjfry.png" alt="Take My Money" style="width:80px;height:80px;"></button>
            <button id="templateImage4" onclick="loadTemplateImage(4)"><img src="storage/StockMemes/datboi.jpg" alt="Dat Boi" style="width:80px;height:80px;"></button>
            <button id="templateImage5" onclick="loadTemplateImage(5)"><img src="storage/StockMemes/canyounot.jpg" alt="Could You Not?" style="width:80px;height:80px;"></button>
            <button id="templateImage6" onclick="loadTemplateImage(6)"><img src="storage/StockMemes/notsimply.jpg" alt="One Does Not Simply" style="width:80px;height:80px;"></button>
            <button id="templateImage7" onclick="loadTemplateImage(7)"><img src="storage/StockMemes/successkid.jpg" alt="Success Kid" style="width:80px;height:80px;"></button>
            <button id="templateImage8" onclick="loadTemplateImage(8)"><img src="storage/StockMemes/justanahole.jpg" alt="Big Lebowski" style="width:80px;height:80px;"></button>
            <button id="templateImage9" onclick="loadTemplateImage(9)"><img src="storage/StockMemes/toodamnhigh.jpg" alt="Too Damn High" style="width:80px;height:80px;"></button>
        </div>
        <script>
            var canvas = document.getElementById('memeCrafter');
            var ctx = canvas.getContext("2d");
            var deviceWidth = window.innerWidth;
            var img = document.getElementById('start-image');
            var fileInput = document.getElementById('fileInput');
            var fileDownload = document.getElementById('imageDownload');
            canvas.width = Math.min(480, deviceWidth-20);
            canvas.height = Math.min(480, deviceWidth-20);
            var scale = document.getElementById('scale');
            scale.addEventListener('change', doTransform, false);
            fileDownload.addEventListener('click', prepareDownload, false);
            var swapVal = 30;
            function prepareDownload(){
                var data = canvas.toDataURL();
                fileDownload.href = data;
            }
            function swapClicked(){
                console.log("Button was clicked.");
                if(swapVal == 30){
                    swapVal = 40;
                    canvas.width = Math.min(600, deviceWidth-20);
                    doTransform();
                }else{
                    swapVal = 30;
                    canvas.width = Math.min(480, deviceWidth-20);
                    doTransform();
                }
            }
            function topText(){
                var topText = document.getElementById('topText').value;
                topText = topText.toUpperCase();
                topText = topText.trim();
                var lineCount = (topText.length/swapVal) + 1;
                var lines = [topText];
                if(lineCount >= 2){
                    lines.pop();
                    var lineOverflow = topText;
                    for(var k = 0; k < lineCount - 1; k++){
                        //console.log("Pretend this is a line");
                        var lineHolder = "";
                        var temp1 = lineOverflow.split(" ");
                        var temp2 = "";
                        for(var l = 0; l < temp1.length; l++){
                            if(lineHolder.length <= swapVal){
                                lineHolder = lineHolder.concat(temp1[l] + " ");
                            }else{
                                temp2 = temp2.concat(temp1[l] + " ");
                            }
                        }
                        lineOverflow = temp2;
                        lineHolder = lineHolder.trim();
                        if(lineHolder.length != 0){
                            console.log("The following line has a length of " + lineHolder.length + ": " + lineHolder);
                            lines.push(lineHolder);
                        }
                    }
                }
                console.log(topText.length);
                for(var tt = 0; tt < lines.length; tt++){
                    console.log("Line [" + tt + "]: " + lines[tt]);
                    var xPos = canvas.width/2;
                    var yPos = 40 + 30 * tt;
                    
                    ctx.strokeText(lines[tt], xPos, yPos);
                    ctx.fillText(lines[tt], xPos, yPos);
                }
            }
            function bottomText(){
                var bottomText = document.getElementById('bottomText').value;
                bottomText = bottomText.toUpperCase();
                bottomText = bottomText.trim();
                var lineCount = (bottomText.length/swapVal) + 1;
                var lines = [bottomText];
                if(lineCount >= 2){
                    lines.pop();
                    var lineOverflow = bottomText;
                    for(var k = 0; k < lineCount - 1; k++){
                        //console.log("Pretend this is a line");
                        var lineHolder = "";
                        var temp1 = lineOverflow.split(" ");
                        var temp2 = "";
                        for(var l = 0; l < temp1.length; l++){
                            if(lineHolder.length <= swapVal){
                                lineHolder = lineHolder.concat(temp1[l] + " ");
                            }else{
                                temp2 = temp2.concat(temp1[l] + " ");
                            }
                        }
                        lineOverflow = temp2;
                        lineHolder = lineHolder.trim();
                        if(lineHolder.length != 0){
                            console.log("The following line has a length of " + lineHolder.length + ": " + lineHolder);
                            lines.push(lineHolder);
                        }
                    }
                }
                console.log(bottomText.length);
                for(var tt = 0; tt < lines.length; tt++){
                    console.log("Line [" + tt + "]: " + lines[tt]);
                    var xPos = canvas.width/2;
                    var yPos = canvas.height - (20 + 30 * (lines.length - 1));
                    yPos += 30*tt;
                    ctx.strokeText(lines[tt], xPos, yPos);
                    ctx.fillText(lines[tt], xPos, yPos);
                }
            }
            // Temp, this is wonky
            function doTransform(){
                ctx.save();
                
                // Clear the Canvas
                ctx.clearRect(0, 0, canvas.width, canvas.height);
                // Translate to center so transformations will apply around this point
                ctx.translate(canvas.width/2, canvas.height/2);
                // Perform Scale
                
                var generalScaleVal = document.getElementById('scale').value;
                ctx.scale(generalScaleVal, generalScaleVal);
                
                /*var generalScaleValue = canvas.height/img.height;
                ctx.scale(generalScaleValue, generalScaleVal);
                */
                // Roll back earlier translation
                ctx.translate(-canvas.width/2, -canvas.height/2);
                // Draw the image
                var x = canvas.width/2 - img.width/2;
                var y = canvas.height/2 - img.height/2;
                ctx.drawImage(img, x, y);
                
                ctx.restore();
                // Set Styles to text creation
                ctx.lineWidth = 5;
                ctx.font = '20pt impact';
                ctx.strokeStyle = 'black';
                ctx.fillStyle = 'white';
                ctx.textAlign = 'center';
                ctx.lineJoin = 'round';
                
                // Draw Top Text
                topText();
                
                // Draw Bottom Text
                bottomText();
            }
            doTransform();
            img.onload = function(){
                var x = canvas.width/2 - img.width/2;
                var y = canvas.height/2 - img.height/2;
                ctx.drawImage(img, x, y);
            };
            function loadTemplateImage(load){
                if(load == 1){
                    img = new Image();
                    img.onload = function(){
                        ctx.drawImage(img, 0, 0);
                        ctx.clearRect(0, 0, canvas.width, canvas.height);
                        doTransform();
                        console.log("Loader Called");
                    }
                    img.src = "storage/StockMemes/seal.jpg";
                }else if(load == 2){
                    img = new Image();
                    img.onload = function(){
                        ctx.drawImage(img, 0, 0);
                        ctx.clearRect(0, 0, canvas.width, canvas.height);
                        doTransform();
                        console.log("Loader Called");
                    }
                    img.src = "storage/StockMemes/thinkinfella.jpg";
                }else if(load == 3){
                    img = new Image();
                    img.onload = function(){
                        ctx.drawImage(img, 0, 0);
                        ctx.clearRect(0, 0, canvas.width, canvas.height);
                        doTransform();
                        console.log("Loader Called");
                    }
                    img.src = "storage/StockMemes/pjfry.png";
                }else if(load == 4){
                    img = new Image();
                    img.onload = function(){
                        ctx.drawImage(img, 0, 0);
                        ctx.clearRect(0, 0, canvas.width, canvas.height);
                        doTransform();
                        console.log("Loader Called");
                    }
                    img.src = "storage/StockMemes/datboi.jpg";
                }else if(load == 5){
                    img = new Image();
                    img.onload = function(){
                        ctx.drawImage(img, 0, 0);
                        ctx.clearRect(0, 0, canvas.width, canvas.height);
                        doTransform();
                        console.log("Loader Called");
                    }
                    img.src = "storage/StockMemes/canyounot.jpg";
                }else if(load == 6){
                    img = new Image();
                    img.onload = function(){
                        ctx.drawImage(img, 0, 0);
                        ctx.clearRect(0, 0, canvas.width, canvas.height);
                        doTransform();
                        console.log("Loader Called");
                    }
                    img.src = "storage/StockMemes/notsimply.jpg";
                }else if(load == 7){
                    img = new Image();
                    img.onload = function(){
                        ctx.drawImage(img, 0, 0);
                        ctx.clearRect(0, 0, canvas.width, canvas.height);
                        doTransform();
                        console.log("Loader Called");
                    }
                    img.src = "storage/StockMemes/successkid.jpg";
                }else if(load == 8){
                    img = new Image();
                    img.onload = function(){
                        ctx.drawImage(img, 0, 0);
                        ctx.clearRect(0, 0, canvas.width, canvas.height);
                        doTransform();
                        console.log("Loader Called");
                    }
                    img.src = "storage/StockMemes/justanahole.jpg";
                }else if(load == 9){
                    img = new Image();
                    img.onload = function(){
                        ctx.drawImage(img, 0, 0);
                        ctx.clearRect(0, 0, canvas.width, canvas.height);
                        doTransform();
                        console.log("Loader Called");
                    }
                    img.src = "storage/StockMemes/toodamnhigh.jpg";
                }
            }
            function saveUpload(){
                
            }
            function imageLoader(){
                var reader = new FileReader();
                reader.onload = function(event){
                    img = new Image();
                    img.onload = function(){
                        ctx.drawImage(img, 0, 0);
                        ctx.clearRect(0, 0, canvas.width, canvas.height);
                        doTransform();
                        console.log("Loader Called");
                    }
                    img.src = reader.result;
                }
                reader.readAsDataURL(fileInput.files[0]);
            }
            fileInput.addEventListener('change', imageLoader(), false);
            
        </script>
    </body>
</html>