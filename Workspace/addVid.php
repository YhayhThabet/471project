<?php 
    session_start();
    $dbpass = "RNZHfeE^";#the password to connect to server
    if(is_null($_SESSION['username']))
    {        
        
        $signedIn = false;
        header("Location: login.php");
    }
    
    else
    {
        $username = $_SESSION['username'];#get the username
        $signedIn = true;
        $connect = mysqli_connect('mysql.immortalfyre.com', mydb, $dbpass, mydb) or die("Could not connect to server");#connect to DB
        $query = mysqli_query($connect, "SELECT * FROM images");
        while($img = mysqli_fetch_array($query))#get movie reel image
        {
            $reel = $img['movie-reel'];
        }
       
    }

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"          
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">      <!--This is the add video page that adds a video to the database--> 
                                                                  <!--Proper indentation clearly shows opening and corresponding closing tags-->
                                                                  <!--By M@rtin Bebey (0420751)-->
<html xmlns="http://www.w3.org/1999/xhtml">
  
    <head> <!--the head containing the title-->
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title id="title">MyVidCollection</title> 
        <link type="text/css" rel="stylesheet" href="style/style.css"/>       
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
                    echo '<li><a href="addVid.php"class="active">Add Video</a></li>';
                    echo ' <li><a href="search.php">Search</a></li>';                    
                    echo '<li><a href="logout.php">Logout</a></li>';
                }
                
                else
                    {
                        echo '<li><a href="login.php">Login</a></li>';#redirects to login if logged out
                    }               
                
                ?>
            </ul>
        </div>        
        <div id="main"><!--add/edit page form is formatted below-->
            <form id="myVidForm" method="post" action="processAddVid.php" enctype="multipart/form-data">
                <div>
                    <label for="titlebox">Title: <input id="titlebox" type="text" class="input" name="titlebox" size="30"/></label>
                    <div><!--rating selection-->
                        <label for="ratingOptions">Rating: 
                        <select name="ratingOptions" id="ratingOptions">
                            <option selected ="selected" value="rating0">Select One</option>
                            <option value="rating1">5 Stars</option>
                            <option value="rating2">4 Stars</option>
                            <option value="rating3">3 Stars</option>
                            <option value="rating4">2 Stars</option>
                            <option value="rating5">1 Stars</option>
                            <option value="rating6">0 Stars</option>
                        </select>
                    </label>
                    </div>                    
                    <div><!--genre selection-->
                        <label for="genreOptions">Genre: 
                            <select name="genreOptions" multiple="multiple" id="genreOptions">                                
                                <option value="genre1" name="comedy">Comedy</option>                                
                                <option value="genre2" name="horror">Horror</option>
                                <option value="genre3" name="drama">Drama</option>
                            </select>
                        </label>
                    </div>
                    <div>
                        <fieldset><!--mpaa fieldset-->
                            <legend>MPAA Rating</legend>
                            <div>
                                <label for="G"><input type="radio" name="G" value="g" id="G"/>G</label>
                                <label for="PG"><input type="radio" name="PG" value="pg" id="PG"/>PG</label>
                                <label for="PG-13"><input type="radio" name="PG-13" value="pg-13" id="PG-13"/>PG-13</label>
                                <label for="R"><input type="radio" name="R" value="r" id="R"/>R</label>
                                <label for="NC-17"><input type="radio" name="NC-17" value="nc-17" id="NC-17"/>NC-17</label>
                            </div>                            
                        </fieldset>
                    </div>
                    <br/> <!--space-->              
                    <div><!--other form elements-->
                        <label for="yearbox">Year: <input type="text" name="yearbox" size="30" id="yearbox"/></label>
                    </div>
                    <div>
                        <label for="runtimebox">Run Time: <input type="text" name="runtimebox" size="30" id="runtimebox"/><span class="note">(mins)</span></label>
                    </div>
                    <div>
                        <label for="theatrebox">Theatre Release: <input type="text" name="theatrebox" size="30" id="theatrebox"/><span class="note">MM/DD/YYYY</span></label>
                    </div>
                    <div>
                        <label for="dvdbox">DVD Release: <input type="text" name="dvdbox" size="30"/><span class="note" id="dvdbox">MM/DD/YYYY</span></label>
                    </div>
                    <div>
                        <label for="actorsbox">Actors: <input type="text" name="actorsbox" size="30" id="actorsbox"/></label>
                    </div>
                    <div>
                        <label for="coverbox">Cover: <input type="text" name="coverbox" size="30" id="coverbox"/></label>
                        <input type="file" value="Browse..." name="covers"/>
                    </div>
                    <div>
                        <label for="studiobox">Studio: <input type="text" name="studiobox" size="30" id="studiobox"/></label>
                    </div>                    
                    <div>
                        <label for="plotSummary"> Plot Summary: <textarea name="plotSummary" cols="77" rows="5" id="plotSummary"></textarea></label> 
                    </div> 
                    <div>
                        <fieldset><!--fieldset for video type-->
                            <legend>Video Type</legend>
                            <div>
                                <label for="DVD"><input type="checkbox" name="DVD" value="DVD" id="DVD"/>DVD</label>
                                <label for="BluRay"><input type="checkbox" name="BluRay" value="blueray" id="BluRay"/>BluRay</label>
                                <label for="DigitalSD"><input type="checkbox" name="DigitalSD" value="digitalsd" id="DigitalSD"/>Digital SD</label>
                                <label for="DigitalHD"><input type="checkbox" name="DigitalHD" value="digitalhd" id="DigitalHD"/>Digital HD</label>                                
                            </div>
                        </fieldset>
                    </div> 
                    <br/>
                    <div><!--submit/reset buttons-->
                        <input type="submit" value="Add Video"/>
                        <input type="reset" value="Reset"/>
                    </div>                  
                </div>
            </form>            
        </div><!--end of form-->
        <div id="footer">
                <h3>&copy; Web Dev Inc.</h3>
        	</div>
        </div>
    </body>

</html><!--end of source code-->