<?php 
    session_start();  
    $dbpass = "RNZHfeE^";#the password to connect to server
    if(isset($_GET['movieid']))
    {
        
        $movieid = $_GET['movieid'];#get the movies id to know the movie to display
    }
    
    else
    {
        echo "Could not identify the movie";
        header("Location: index.php");
    } 
    
     
    if(is_null($_SESSION['username']))
    {
        
        $signedIn = false;
        header("Location: login.php");#if there is no username redirect to login
    }
    
    else
    {
        $signedIn = true;
        $username = $_SESSION['username'];#get the username
        //$connect = mysqli_connect('mysql.immortalfyre.com', mydb, $dbpass, mydb) or die("Could not connect to server");#connect to DB
        $query = mysqli_query($connect, "SELECT * FROM images");
        while($img = mysqli_fetch_array($query))
        {
            $reel = $img['movie-reel'];#get movie reel image
        }
    }   

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">            <!--This is the movie details page to show details for movies--> 
                                                                        <!--Proper indentation clearly shows opening and corresponding closing tags-->
                                                                        <!--By M@rtin Bebey-->

<html xmlns="http://www.w3.org/1999/xhtml">
  
    <head> <!--the head containing the title-->
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title id="title">MyVidCollection</title> 
        <link type="text/css" rel="stylesheet" href="style/details.css"/>       
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
     <div id="mainbody">
        <div id="nav">
            <ul><!--an unordered list of links to the various pages-->                
                
                <?php
                
                    if($signedIn == true)#navigation displayed if logged in
                {
                    echo '<li><a href="index.php">Home</a></li>';
                    echo '<li><a href="addVid.php">Add Video</a></li>';
                    echo ' <li><a href="search.php">Search</a></li>';
                    echo '<li><a href="editVid.php">Edit Video</a></li>';
                    echo '<li><a href="displayDetails.php" class="active">Display Details</a></li>';
                    echo '<li><a href="logout.php">Logout</a></li>';
                }
                
                else
                    {
                        echo '<li><a href="login.php">Login</a></li>';
                    }   
                    
                    $query = mysqli_query($connect, "SELECT * FROM MOVIES WHERE id LIKE '$movieid'");
                    while($movie = mysqli_fetch_array($query))#getting the details of the movie from DB to be displayed
                    {
                        $id = $movie['id'];                        
                        $cover = $movie['cover'];
                        $title = $movie['title'];
                        $dvd = $movie['dvd'];
                        $bluray = $movie['bluray'];
                        $sd = $movie['sd'];
                        $hd = $movie['hd'];
                        $mpaa = $movie['mpaa'];
                        $year = $movie['year'];
                        $studio = $movie['studio'];
                        $theatricalrelease = $movie['theatricalrelease'];
                        $dvdrelease = $movie['dvdrelease'];
                        $actors = $movie['actors'];
                        $genres = $movie['genres'];
                        $summary = $movie['summary'];
                        
                    }           
                
                ?>
            </ul>
        </div>
        <div id="main"> 
        <div id="detail"> 
        <div><!--movie image-->
            <img src="<?php echo $cover  ?>" alt="Cover" width="120"/>
        </div>        
        <div><!--moivie title-->
            <strong><?php echo $title ?></strong>
        </div>  
        <br></br>    
        <!--movie format-->
             <font size="1.8"> 
        
        <div><!--table containing movie details-->
            <table> 
                <tr>
                    <td><span><img src="<?php echo $dvd  ?>" alt="" width="10"/>DVD</span></td>
                    <td><span><img src="<?php echo $bluray ?>" alt="" width="10"/>BluRay</span></td>
                    <td><span><img src="<?php echo $sd ?>" alt="" width="10"/>Digital SD</span></td>
                    <td><span><img src="<?php echo $hd ?>" alt="" width="10"/>Digital HD</span></td>
                </tr>
                <tr>
                    <td colspan="3"><strong>MPAA:</strong><?php echo $mpaa ?></td>
                    <td><strong>Year:</strong><?php echo $year ?></td>
                </tr>
                <tr>
                    <td colspan="4"><strong>Studio:</strong><?php echo $studio ?></td>
                </tr>
                 <tr>
                    <td colspan="3"><strong>Theatrical Release:</strong><?php echo $theatricalrelease ?></td>
                    <td><strong>Dvd Release:</strong><?php echo $dvdrelease ?></td>
                </tr>
                <tr>
                    <td colspan="4"><strong>Actors:</strong>
                        <?php echo $actors ?>                        
                    </td>
                </tr>
                <tr>
                    <td colspan="4"><strong>Genres:</strong>
                        <?php echo $genres ?>                        
                    </td>
                </tr>               
            </table>
            <p id="description"><?php echo $summary ?></p>
        </div>
            </font>
        </div> 
        </div>
        </div>
            <div id="footer">
                <h3>&copy; Web Dev Inc.</h3>
        	</div>
        </div>        
    </body>
    
</html><!--end of source code-->