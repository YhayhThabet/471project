<?php 
    session_start();
    $username = $_GET['username'];#get username of user
    $dbpass = "RNZHfeE^";#the password to connect to server
    $connect = mysqli_connect('mysql.immortalfyre.com', mydb, $dbpass, mydb) or die ("Could not connect to server.");#connect to DB
    $query = mysqli_query($connect, "SELECT * FROM images");
        while($img = mysqli_fetch_array($query))
        {
            $reel = $img['movie-reel'];#get movie reel image
        }
        
    if(is_null($username))
    {
        #go to login if not logged in
        $signedIn = false;
    }
    
    else
    {
        $signedIn = true;
        
    }   

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">      <!--This is the login page to log into users accounts--> 
                                                                  <!--Proper indentation clearly shows opening and corresponding closing tags-->
                                                                  <!--By M@rtin Bebey-->

<html xmlns="http://www.w3.org/1999/xhtml">

    <head> <!--the head containing the title-->
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title id="title">MyVidCollection</title> 
        <link type="text/css" rel="stylesheet" href="style/login.css"/>       
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
                    echo ' <li><a href="search.php">Search</a></li>';
                    echo '<li><a href="editVid.php">Edit Video</a></li>';
                    echo '<li><a href="displayDetails.php">Display Details</a></li>';
                }
                ?>    
                <?php
                
                    if($signedIn == false)
                    {
                        echo '<li><a href="login.php" class="active">Login</a></li>';
                    }
                
                            
                
                ?>
            </ul>
        </div>        
        <div id="main"> <!--the login form-->
            <form id="myloginForm" method="post" action="mylogin.php?username=<?php $username?>&password=<?php $password?>" enctype="multipart/form-data">
                <div>
                    <label for="Username">Username:<input id="Username" name="Username" type="text" size="30"/></label>
                   
                </div>
                <div>
                    <label for="Password">Password:<input id="Password" type="password" name="Password" size="30"/></label>
                </div>  
                <div>
                    <label for="Remember"><input id="Remember" type="checkbox" name="Remember" value="remember"/>Remember Me</label>
                </div>  
                <div><!--submit/reset buttons-->
                    <input type="submit" value="Login" name="login"/>
                    <input type="reset" value="Reset" name="resetForm"/>
                </div> 
            </form>            
        </div>        
        <br></br>
        <div id="footer">
                <h3>&copy;  Web Dev Inc.</h3>
        	</div>
       </div>
    </body>
    
</html><!--end of source code-->