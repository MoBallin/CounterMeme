<!DOCTYPE html>
<?php session_start();
//send here with smackID and ID?>
<html lang="en">
    <head>
        <title>Counter Meme</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="css/navbar.css">
		<!--<link rel="stylesheet" type="text/css" href="css/vs.css">-->
		<!---->
        <script>
            // Preview image before upload
            function readURL(input, name){
                if(input.files && input.files[0]){
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $(name).attr('src',e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }
        
            // Change the image modal
            function showModal(obj){
                $("#imageZoom").attr('src', $(obj).attr('src'));
                $("#imageModal").modal('show');
            }
        
            $(function(){
                //TODO: AJAX code that will load the smackdown
            });
        
        </script>
        
        
        
        <style> 
			html, body, .container {
				width: 100%;
			}
            .orange {
                color: orange;
            }
            
            #orangeSide {
                color: orange;
            }
            
            .orangeBG {
                background-color: orange;
            }
            
            .grayBG {
                background-color: lightgray;
            }
            
            .mainPic {
                display: block;
                width: 100%;
/*                max-height: 500px;*/
                height: auto;
            }
            
            #graySideMainImage, #orangeSideMainImage {
/*                height: 300px;*/
                padding: 10px;
                margin: auto;
                display: block;
            }
            
            table {
                width: 100%;
                margin: auto;
                border-collapse: collapse;
                border: 2px solid black;   
            }
            
            th {
                text-align: center;
                font-size: 30pt;
                border: 2px solid black;
            }
           
            
            img {
                display: block;
                margin-bottom: 5px;
                width: 100%;
/*                max-height: 300px;*/
                height: auto;
                box-shadow: 2px 2px 5px gray;
            }
            
            .memeImg {
                display: inline-block;
                width: 200px;
                height: 150px;
                box-shadow: 2px 2px 5px gray;
            }
            
            .memeImg:hover {
                opacity: 0.8;
            }
            
            /* The Image Modal (background) */
            #imageModal {
                left: 0;
                top: 0;
                width: 100%; /* Full width */
                height: 100%; /* Full height */
                
                background-color: rgb(0,0,0); /* Fallback color */
                background-color: rgba(0,0,0,0.7); /* Black w/ opacity */
            }
            
            #imageModal .modal-dialog{
                top: 25%;
            }
            
            div {
                text-align: center;
            }
            
            .deployedMeme {
                border-radius: 25px;
                padding: 10px;
                margin: 5px;
                box-shadow: 2px 2px 5px gray;
            }
            
            .likeStats {
                text-align: right;
                display: inline-block;
                margin-right: 5px;
            }
            
            .likeStatsReverse {
                text-align: left;
                display: inline-block;
                margin-left: 5px;
            }
            
            @media (min-width: 779px) {
                .counterSpace {
                    margin-bottom: 80px;
                }
            }
        </style>
    </head>
    <body>
		<?php include'loggedInNavbar.php'; ?>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-m-12">
                    <h1 id="graySide"><?php echo $_SESSION['smack']['greyTitle'] ?></h1>
                    <div id="graySideMainImage" class="col-lg-12 col-sm-12">
                        <img class="img-responsive" src="<?php echo $_SESSION['smack']['greyImg'] ?>" alt="Trump">
                        <button type="button" class="btn-lg" data-toggle="modal" data-target="#grayDeploy">Deploy</button>
                    </div>
                    
                </div>
                <div class="col-lg-4 col-m-12">
                    <table>
                        <h1>V<span class="orange">S</span></h1>
                        <th colspan="2" class="orange">Scoreboard</th>
                        <tr>
                            <th><?php echo $_SESSION['smack']['greyVotes'] ?></th>
                            <th class="orange"><?php echo $_SESSION['smack']['orangeVotes'] ?></th>
                        </tr>
                    </table>
                    <div class="row">
                    <div class="col-sm-6">
                        <button id="#GrayVote" class="btn" onclick="greyVote()">Cast Vote</button>
                    </div>
                    <div class="col-sm-6">
                        <button id="OrangeVote" class="btn btn-warning" onclick="orangeVote()">Cast Vote</button>
                    </div>
                    </div>
                </div>
                <div class="col-lg-4 col-m-12">
                    <h1 id="orangeSide"><?php echo $_SESSION['smack']['orangeTitle'] ?></h1>
                    <div id="orangeSideMainImage" class="col-lg-12 col-m-12">
                        <img class="img-responsive" src="<?php echo $_SESSION['smack']['orangeImg'] ?>" alt="Hillary">
                        <button type="button" class="btn-lg btn-warning" data-toggle="modal" data-target="#orangeDeploy">Deploy</button>
                    </div>
                </div>    
            </div>
            <br>
            <br>
            <div class="deployedMeme grayBG col-sm-12">
                <div class="col-sm-4 col-lg-3">
                    <img class="memeImg" src="images/Trump.jpg" alt="grayMeme" onclick="showModal(this)">
                </div>
                <div class="col-sm-2">
                    <button class="btn-lg btn-warning counterSpace">Counter</button><br>
                    <a href="#">View Counters(148)</a>
                </div>
                <div class="col-sm-4 col-lg-5">
                    <br>
                </div>
                <div class="col-sm-2">
                    <p class="likeStats counterSpace">122</p>
                    <button class="btn-lg btn-warning"><span class="glyphicon glyphicon-thumbs-up"></span></button>
                    <br>
                    <p class="likeStats">112</p>
                    <button class="btn-lg btn-warning"><span class="glyphicon glyphicon-thumbs-down"></span></button>
                </div>
            </div>
            <div class="deployedMeme orangeBG col-sm-12">
                <div class="col-sm-2">
                    <button class="btn-lg"><span class="glyphicon glyphicon-thumbs-up"></span></button>
                    <p class="likeStatsReverse counterSpace">122</p>
                    <br>
                    <button class="btn-lg"><span class="glyphicon glyphicon-thumbs-down"></span></button>
                    <p class="likeStatsReverse">110</p>
                </div>
                 <div class="col-sm-4 col-lg-5">
                    <br>
                </div>
                <div class="col-sm-2">
                    <button class="btn-lg counterSpace">Counter</button><br>
                    <a href="#">View Counters(148)</a>
                </div>
                <div class="col-sm-4 col-lg-3">
                    <img class="memeImg" src="images/Hillary.jpg" alt="orangeMeme" onclick="showModal(this)">
                </div>
            </div>
        </div>
        <!--Gray Modal -->
        <div id="grayDeploy" class="modal fade" role="dialog">
          <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Create a Meme</h4>
              </div>
              <div class="modal-body">
                <form class="form-horizontal">
                        <div class="form-group">
                            <label  class="control-label col-lg-4" for="greyContender">Grey contender:</label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" id="greyContender">
                            
                                <label class="sr-only" for="greyPicture">Picture for grey contender:</label>
                                <input onchange="readURL(this, '.upImage1');" type="file" id="greyPicture">
                                <img alt="Image Preview" class="upImage1" src="#">
                            </div>
                        </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-warning">Deploy</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
        <!-- Orange Modal -->
        <div id="orangeDeploy" class="modal fade" role="dialog">
          <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Create a Meme</h4>
              </div>
              <div class="modal-body">
                <form class="form-horizontal">
                        <div class="form-group">
                            <label  class="control-label col-lg-4" for="orangeContender">Orange contender:</label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" id="orangeContender">
                            
                                <label class="sr-only" for="orangePicture">Picture for orange contender:</label>
                                <input onchange="readURL(this, '.upImage1');" type="file" id="orangePicture">
                                <img alt="Image Preview" class="upImage1" src="#">
                            </div>
                        </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-warning">Deploy</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>
        <!-- Picture Modal -->
        <div id="imageModal" class="modal fade" role="dialog">
          <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">close</span></button>
              </div>
              <div class="modal-body">
                <img id="imageZoom" src="#">
              </div>
            </div>
          </div>
        </div>
    </body>
</html>
<?php
	$host = "localhost";
	$user = "root";
	$pass = "";
	$db = "counterMeme";
	$port = 3306;
	$ID=1;
	$smackID=1;
	$mysqli = new mysqli($host, $user, $pass, $db, $port); 
	if($mysqli->connect_errno){
		echo "Connection failed on line 5";
		exit();
	}
	$query="select * from "."$ID"."smackdowns where ID=$smackID";
	$result = $mysqli->query($query);
	if (!$result) {
		echo 'fuck';
		exit;
	}
	$row = $result->fetch_assoc();
	$_SESSION['smack']=$row;
	function greyVote(){
		$query="update "."$ID"."smackdowns set greyVote= greyVote + 1 where ID =?";
		$stmt = $mysqli->stmt_init();
            
        if(!$stmt->prepare($query)){
			echo 'fuck';
			exit();
         }
		$stmt->bind_param("s", $smackID);
		$stmt->execute();
		if ($mysqli->query($query) == false) {
			echo "error ";
        } 
	}
	function orangeVote(){
		$query="update "."$ID"."smackdowns set orangeVote = orangeVote + 1 where ID =?";
		$stmt = $mysqli->stmt_init();
            
        if(!$stmt->prepare($query)){
			echo 'fuck';
			exit();
         }
		$stmt->bind_param("s", $smackID);
		$stmt->execute();
		if ($mysqli->query($query) == false) {
			echo "error";
        } 
		
	}

?>