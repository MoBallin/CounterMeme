    <head>
		<?php 

            session_start();
        ?>
        <title>CounterMeme</title>

        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

        <!--Import Google Icon Font-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!-- Compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
        <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans" rel="stylesheet">

        <!--Import jQuery before materialize.js-->
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

        <!-- Compiled and minified JavaScript -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
        
        <style>
           
            .titleWrap {
                font-family: 'Merriweather Sans', sans-serif;
                margin-top: 20px;
                margin-left: 70px;
                background-color: white;
                color:orange
                
            }
             #divWrap {
                display: inline;
                 
            }
            #subColorTitle {
                color: darkgray;
                margin-left: -17px;
                
            }
            #subXpress {
                color: darkgray;
                font-size: 20px;
                
            }
            h1 {
                display: inline;
                font-size: 55px;
                
            }
            #CMTitle {
                width: 100%;
                font-size: 50px;
            
            }
            #xpressMeme {
/*                width: 130px;*/
               display:inline; 
                
            }
            
            .nav-wrapper {
               background-color: orange;
                
            }
            #myLogo {
                margin-left: 75px;
            }
            #lastLi {
                margin-right: 150px;
            }
            .restLi {
                margin-right: 40px;
            }
           
        </style>
    </head>

    <body>
        <div id="#divWrap">
            <div id="CMTitle" class="titleWrap">
                <h1>Counter</h1>
                <span id="subColorTitle">Meme</span>
                <span id="subXpress">Express What You Meme!</span>
            </div>
            
            
        </div>
    <nav>
        <div class="nav-wrapper">
          <a id="myLogo" href="#" class="brand-logo">Logo</a>
          <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li class="restLi"><a href="howItWorks.php">How It Works</a></li>
            <li class="restLi" class="active"><a href="portfolio.php">Portfolio</a></li>
            <li class="restLi"><a href="BrowseSmackDowns.php">Browse Smackdowns</a></li>
            <li class="restLi"><a href="MemeCreator.php">Create</a></li>
            <li id="lastLi"><a href="logout.php">Logout</a></li>
          </ul>
        </div>
    </nav>
        
    </body>