<?php
    session_start();#start session
    $dbpass = "RNZHfeE^";#the password to connect to server
    $c = 0;
    
    if(isset($_GET['pos']))
    {
        $start = $_GET['pos'];#get the position to load content of page
	
    }
    
    else
    {
        $start = 0;#initial position is 0
	
    }
    
    if(is_null($_SESSION['username']))
    {        
        
        $signedIn = false;
        header("Location: login.php");#go to login if not logged in
    }
    
    else
    {
        $username = $_SESSION['username'];#get username of user
        $signedIn = true;
        //$connect = mysqli_connect('mysql.immortalfyre.com', mydb, $dbpass, mydb) or die("Could not connect to server");#connect to DB
        $query = mysqli_query($connect, "SELECT * FROM images");
        while($img = mysqli_fetch_array($query))
        {
            $reel = $img['movie-reel'];#get movie reel image
        }
       
    } 
    
    
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">            <!--This is the Home page--> 
                                                                        <!--Proper indentation clearly shows opening and corresponding closing tags-->
                                                                        <!--By M@rtin Bebey-->

<html xmlns="http://www.w3.org/1999/xhtml">
  
    <head> <!--the head containing the title-->
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title id="title">MyVidCollection</title> 
        <link type="text/css" rel="stylesheet" href="style/home.css"/>       
    </head>

    <body> <!--the body contating everything displayed on the page-->
    <div id="container">
    <div id="header">
        <div><!--the reel image-->
            <img id="img" src="<?php echo $reel ?>" alt="movie-reel" width="100"/>
        </div>
        <div id="titles"><!--the headers-->
            <h2><strong>MyVid</strong> Collection</h2>
            <h3>An individual video library</h3>
        </div>
     </div>
        <div id="nav">
            <ul><!--an unordered list of links to the various pages-->
                <?php
                if($signedIn == true)#navigation displayed if logged in
                {
                    echo '<li><a href="index.php">Home</a></li>';
                    echo '<li><a href="addVid.php">Add Video</a></li>';
                    echo '<li><a href="search.php">Search</a></li>';
                    echo '<li><a href="editVid.php">Edit Video</a></li>';
                    echo '<li><a href="displayDetails.php">Display Details</a></li>';
                    echo '<li><a href="logout.php">Logout</a></li>';
                    echo '<li><a href="checkout.php"class="active">Check Out</a></li>';
                }
                
                else
                    {
                        echo '<li><a href="login.php">Login</a></li>';
                    }              
                ?>
            </ul>
        </div>   
          <div id="footer">
                <h3>&copy;  Web Dev Inc.</h3>
        	</div>
        </div>
    </body>
    
</html> <!--end of html document-->