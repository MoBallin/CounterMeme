<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php session_start(); 
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<title>Create a Smackdown</title>
	<link rel="stylesheet" type="text/css" href="css/navbar.css">
	<style type="text/css">
		html, body {
				width: 100%;
			}
			.container {
				width: 100%;
				height: 100%;
			}
		.orangeSide {
                color: orange;
            }
			.greySide {
				color: darkgray;
			}
		.smackTxt {
				width: 70%
			}
		.oImg, .gImg {
			width: 50%;
			height: 200px;
			border: 1px solid black;
		}
		.mImg {
			width: 75%;
			height: 300px;
			border: 1px solid black;
		}
		#dvPreview
		{
			filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=image);
			width: 75%;
			height: 300px;
			border: 1px solid black;
		}
		#dvPreview2, #dvPreview3 {
			filter: progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=image);
			width: 75%;
			height: 200px;
			border: 1px solid black;
		}
		.col-lg-3 {
			text-align: right;
		}
	</style>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
	<script language="javascript" type="text/javascript">
		$(function () {
			$("#fileupload3").change(function () {
				$("#dvPreview3").html("");
				var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.jpg|.jpeg|.gif|.png|.bmp)$/;
				if (regex.test($(this).val().toLowerCase())) {
					if ($.browser.msie && parseFloat(jQuery.browser.version) <= 9.0) {
						$("#dvPreview3").show();
						$("#dvPreview3")[0].filters.item("DXImageTransform.Microsoft.AlphaImageLoader").src = $(this).val();
					}
					else {
						if (typeof (FileReader) != "undefined") {
							$("#dvPreview3").show();
							$("#dvPreview3").append("<img />");
							var reader = new FileReader();
							reader.onload = function (e) {
								$("#dvPreview3 img").attr("src", e.target.result);
								$("#dvPreview3 img").css({'width' : '100%' , 'height' : '100%'})
							}
							reader.readAsDataURL($(this)[0].files[0]);
						} else {
							alert("This browser does not support FileReader.");
						}
					}
				} else {
					alert("Please upload a valid image file.");
				}
			});
		});
		
		$(function () {
			$("#fileupload2").change(function () {
				$("#dvPreview2").html("");
				var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.jpg|.jpeg|.gif|.png|.bmp)$/;
				if (regex.test($(this).val().toLowerCase())) {
					if ($.browser.msie && parseFloat(jQuery.browser.version) <= 9.0) {
						$("#dvPreview2").show();
						$("#dvPreview2")[0].filters.item("DXImageTransform.Microsoft.AlphaImageLoader").src = $(this).val();
					}
					else {
						if (typeof (FileReader) != "undefined") {
							$("#dvPreview2").show();
							$("#dvPreview2").append("<img />");
							var reader = new FileReader();
							reader.onload = function (e) {
								$("#dvPreview2 img").attr("src", e.target.result);
								$("#dvPreview2 img").css({'width' : '100%' , 'height' : '100%'})
							}
							reader.readAsDataURL($(this)[0].files[0]);
						} else {
							alert("This browser does not support FileReader.");
						}
					}
				} else {
					alert("Please upload a valid image file.");
				}
			});
		});

		$(function () {
			$("#fileupload").change(function () {
				$("#dvPreview").html("");
				var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.jpg|.jpeg|.gif|.png|.bmp)$/;
				if (regex.test($(this).val().toLowerCase())) {
					if ($.browser.msie && parseFloat(jQuery.browser.version) <= 9.0) {
						$("#dvPreview").show();
						$("#dvPreview")[0].filters.item("DXImageTransform.Microsoft.AlphaImageLoader").src = $(this).val();
						console.log();
					}
					else {
						if (typeof (FileReader) != "undefined") {
							$("#dvPreview").show();
							$("#dvPreview").append("<img />");
							var reader = new FileReader();
							reader.onload = function (e) {
								console.log(e.target.result);
								$("#dvPreview img").attr("src", e.target.result);
								$("#dvPreview img").css({'width' : '100%' , 'height' : '100%'})
							}
							reader.readAsDataURL($(this)[0].files[0]);
						} else {
							alert("This browser does not support FileReader.");
						}
					}
				} else {
					alert("Please upload a valid image file.");
				}
			});
		});
	</script>

</head>
<body>
	<?php include'loggedInNavbar.php'; ?>
	<div class="container">
		<form action="<?=$_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data">
		<h1 class="text-center greySide">Create a <span class="orangeSide">Smackdown</span></h1><br>
		<div class="row">
			
			
			<div class="col-lg-5">
				<h3 class="greySide">Title</h3>
				<input class="smackTxt" type="text" name="title" id="title"><br>
				<h3 class="greySide" >Catagory:</h3>
				<input class="smackTxt" type="text" name="category" id="category"><br>
				<h3 class="greySide" >Tags:</h3>
				<input class="smackTxt" type="tags"><br><br>
				<label class="btn btn-default btn-file">
					Upload Image <input id='fileupload' name='fileupload' type='file' style='display: none;'> 
				</label>
				<div class id="dvPreview">
				</div>
				<button type="submit" class="btn btn-default" name="submit">Finish and Create</button>
				
			</div>
			
			
			<div class="col-lg-3">
				<h2 class="greySide">Grey Contender:</h2><br><br><br><br><br><br><br><br><br>
				<h2 class="orangeSide">Orange Contender:</h2>
			</div>
			
			
			<div class="col-lg-4">
				<input class="smackTxt" type="text" name="gTitle" id="gTitle"><br><br>
				<label class="btn btn-default btn-file">
					Upload Image <input id="fileupload2" type="file" style="display: none;" name="fileupload2">
				</label>
				<div class id="dvPreview2">
				</div><br><br><br><br>
				<input class="smackTxt" type="text" name="oTitle" id="oTitle"><br><br>

				<label class="btn btn-default btn-file">
					Upload Image <input id="fileupload3" type="file" style="display: none;" name="fileupload3">
				</label>
				<div class id="dvPreview3">
				</div>
			</div>
		</div>
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
		$title = $_POST["title"];
		$category = $_POST["category"];
		$gTitle = $_POST["gTitle"];
		$oTitle = $_POST["oTitle"];
		$ID = $_SESSION['userInfo'][0];
		$mImg = $_FILES["fileupload"]["tmp_name"];
		$oImg = $_FILES["fileupload2"]["tmp_name"];
		$gImg = $_FILES["fileupload3"]["tmp_name"];
		if ($title == '' || $category == '' || $gTitle == '' || $oTitle == '' || $mImg == '' || $oImg == '' || $gImg == ''){
			echo 'all fields are required';
			exit;
		}
		
		//add info to database
		$query = "insert into "."$ID"."smackdowns (mainTitle, orangeTitle, greyTitle,category) values ( ? , ? , ? , ? );";
		$stmt = $mysqli->stmt_init();
            
        if(!$stmt->prepare($query)){
			echo 'fuck';
			exit();
         }
		$stmt->bind_param("ssss", $title,$oTitle,$gTitle,$category);
		$stmt->execute();
		if ($mysqli->query($query) == TRUE) {
			echo "New record created successfully";
        } 
		else {
			echo "Error: " . $query . "<br>" . $mysqli->error;
        }
		
		
		$query="select * from 1smackdowns where greyTitle = '$gTitle' and orangeTitle ='$oTitle';";
		$result = $mysqli->query($query);
		if (!$result) {
			echo 'fuck';
			exit;
		}
        //} 
		//else {
		//	echo "Error: " . $query . "<br>" . $mysqli->error;
		$row = $result->fetch_assoc();
		$smackID = $row['ID'];
		//add photos to folder
		$target_dir = "database/userContent/$ID/$ID";
		$target_dir .= "smackdowns/";
		$oldmask = umask(0);
		mkdir($target_dir . $smackID ,0777,true);
		$target_dir .= "$smackID/";
		$target_file = $target_dir . basename($_FILES["fileupload"]["name"]);
		$target_file2 = $target_dir . basename($_FILES["fileupload2"]["name"]);
		$target_file3 = $target_dir . basename($_FILES["fileupload3"]["name"]);
		if (!move_uploaded_file($mImg, $target_file)) {
			echo "Sorry, there was an error uploading your file.";
    	}
		if (!move_uploaded_file($gImg, $target_file2)) {
			echo "Sorry, there was an error uploading your file.";
    	}
		if (!move_uploaded_file($oImg, $target_file3)) {
			echo "Sorry, there was an error uploading your file.";
    	}
		umask($oldmask);
		//add file paths to database
		$mImg = $target_file;
		$gImg = $target_file2;
		$oImg = $target_file3;
		
		
		
		
		//$query = "insert into "."$ID"."smackdowns (mainImg, orangeImg, greyImg) values ( ? , ? , ?) where ID="."$smackID".";";
		$query = "update "."$ID"."smackdowns set mainImg=?, orangeImg=?, greyImg=? where ID =?";
		$stmt = $mysqli->stmt_init();
            
        if(!$stmt->prepare($query)){
			echo 'fuck';
			exit();
         }
		$stmt->bind_param("ssss", $mImg,$oImg,$gImg,$smackID);
		$stmt->execute();
		if ($mysqli->query($query) == TRUE) {
			echo "New record created successfully";
        } 
		else {
			echo "Error: " . $query . "<br>" . $mysqli->error;
        }
		//make counter table
		$query = "create table $ID"."_"."$smackID"."counters 
				(
					ID int auto_increment,
					userID int, 
					img varchar(255),
					uVotes int,
					dVotes int,
					creationDate date,

					primary key (ID)
				);";
		
		if ($mysqli->query($query) === TRUE) {
    			//echo "follower Table created successfully<br>";
			} else {
    			echo "Error creating table: " . $mysqli->error;
			}
		
		//jump to page*/
	}
?>