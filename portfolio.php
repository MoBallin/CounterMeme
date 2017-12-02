<DOCTYPE html>
<html lang="en-US">
    <head>
        <?php 

            session_start();
            if(!isset($_SESSION['user'])){
                header("Location: index.php");  
            } 
            if(isset($_SESSION['user'])){
                $user = $_SESSION['user']; 
            } 
        $link = mysqli_connect("localhost", "root", "cap2017M3M3count", "CounterMeme") or die (mysql_error());
                
                $sql = 'SELECT * FROM users WHERE username="' . $user . '" LIMIT 1';
                $query = mysqli_query($link, $sql);
                $rank_check = mysqli_num_rows($query);
                if($rank_check == 0)
                {
                    echo "DB error, no rank in system";
                }
                  while($row = mysqli_fetch_row($query))
                        {
                               
                            $rank = $row[1];
                            $userID = $row[0];
                            $aboutMe = $row[10];
                        }
        $_SESSION['userID'] = $userID;
              
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
    <script type="text/javascript" src="js/bootstrap-filestyle.min.js"> </script>
	
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
/*            this will stylize the user profile card*/
    .card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  margin: auto;
  text-align: left;
  font-family: arial;
}

.title {
  color: orange;
  font-size: 18px;
}


 
            
        </style>
    </head>
    <body>

          <h2 style="text-align:center">User Profile Card</h2>

<div class="card">
    <input type="file" name="img2" id="chooseimg" onchange="readURL(this);">
    <img src="storage/StockMemes/datboi.jpg"   id="profilePic" style="width:100%" alt="your image"/>
  <?php echo '<h1>' . $user .'</h1>';?>
  <p class="title">Info:</p>
  <p>
      <?php
        
      
        echo 'RANK: <br>' . $rank;
//        echo '<br> id:   ' . $test;
        echo '<br> About Me: <br>' . $aboutMe;
        ?>
    </p>
  
    
        <form method="post">
            <p>
            <button type="button" class="btn btn-default btn-lg" id ="follow" name="follow" value="follow" onclick="followMe(this)" style="width:100%">Follow
            <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
            </button>
            </p>
        </form>
    

  
</div>   
              
           
        <script>
            
               function readURL(input)
            {
                if(input.files && input.files[0]){
                    var reader = new FileReader();
                    reader.onload = function(e){
                        $('#profilePic')
                            .attr('src', e.target.result)
                            
                    };
                reader.readAsDataURL(input.files[0]);
                }
                
            }
            
          
            
        
             
    function followMe(button){
                var elem = document.getElementById("follow");
               if(elem.value=="follow"){
                   elem.value = "unfollowed";
                    document.getElementById("follow").childNodes[0].nodeValue="Unfollow ";
                }
                else{
                    if(elem.value == "unfollowed")
                        {
                            elem.value = "follow";
                            document.getElementById("follow").childNodes[0].nodeValue="Follow ";
                        }
               }
    }
       
           
   
        </script>
      
              
        
              
    </body>
</html>