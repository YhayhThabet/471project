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
                <li><a href="index.php" class="active">Home</a></li>
                <?php
                if($signedIn == true)#navigation displayed if logged in
                {
                    echo '<li><a href="addVid.php">Add Video</a></li>';
                    echo ' <li><a href="search.php">Search</a></li>';
                    echo '<li><a href="editVid.php">Edit Video</a></li>';
                    echo '<li><a href="displayDetails.php">Display Details</a></li>';
                    echo '<li><a href="logout.php">Logout</a></li>';
                    echo '<li><a href="checkout.php">Check Out</a></li>';
                }
                
                else
                    {
                        echo '<li><a href="login.php">Login</a></li>';
                    }              
                    
                    
                    $querymovies = mysqli_query($connect, "SELECT * FROM MOVIES WHERE username LIKE '$username' LIMIT $start, 13"); #get the next 13 movies                                  
                                
                    while($movies = mysqli_fetch_array($querymovies))#get the required movie attributes for each movie
                    {
                        $c++;
                        if($c == 1)
                        {
                            $cover1 = $movies['cover'];
                            $title1 = $movies['title'];
                            $movieid1 = $movies['id'];
                        }
                        
                        if($c == 2)
                        {
                            $cover2 = $movies['cover'];
                            $title2 = $movies['title'];
                            $movieid2 = $movies['id'];
                        }
                        
                        if($c == 3)
                        {
                            $cover3 = $movies['cover'];
                            $title3 = $movies['title'];
                            $movieid3 = $movies['id'];
                        }
                        
                        if($c == 4)
                        {
                            $cover4 = $movies['cover'];
                            $title4 = $movies['title'];
                            $movieid4 = $movies['id'];
                        }
                        
                        if($c == 5)
                        {
                            $cover5 = $movies['cover'];
                            $title5 = $movies['title'];
                            $movieid5 = $movies['id'];
                        }
                        
                        if($c == 6)
                        {
                            $cover6 = $movies['cover'];
                            $title6 = $movies['title'];
                            $movieid6 = $movies['id'];
                        }
                        
                        if($c == 7)
                        {
                            $cover7 = $movies['cover'];
                            $title7 = $movies['title'];
                            $movieid7 = $movies['id'];
                        }
                        
                        if($c == 8)
                        {
                            $cover8 = $movies['cover'];
                            $title8 = $movies['title'];
                            $movieid8 = $movies['id'];
                        }
                        
                        if($c == 9)
                        {
                            $cover9 = $movies['cover'];
                            $title9 = $movies['title'];
                            $movieid9 = $movies['id'];
                        }
                        
                        if($c == 10)
                        {
                            $cover10 = $movies['cover'];
                            $title10 = $movies['title'];
                            $movieid10 = $movies['id'];
                        }
                        
                        if($c == 11)
                        {
                            $cover11 = $movies['cover'];
                            $title11 = $movies['title'];
                            $movieid11 = $movies['id'];
                        }
                        
                        if($c == 12)
                        {
                            $cover12 = $movies['cover'];
                            $title12 = $movies['title'];
                            $movieid12 = $movies['id'];
                        }
                        
                        if($c == 13)#13th movie used to check if there is a next page
                        {
                            $cover13 = $movies['cover'];
                            $title13 = $movies['title'];
                            $movieid13 = $movies['id'];
                        }
                        
                    } 
                    
                    $images = mysqli_query($connect, "SELECT * FROM images"); 
                    while($icons = mysqli_fetch_array($images))#get the icons
                    {
                        $detailsicon = $icons['detailsicon'];
                        $editicon = $icons['editicon'];
                        $trashimage = $icons['trashimage'];
                    }
                   
                ?>
            </ul>
        </div>   
        <div id="main"><!--various movies displayed in a 3X4 table-->
            <table>                        
                
                <tr><!--movie images-->      
                    
                    <td id="result1"><img src="<?php echo $cover1 ?>" alt="<?php echo $title1 ?>" width="45"/></td>
                    <td id="result2"><img src="<?php echo $cover2 ?>" alt="<?php echo $title2 ?>" width="45"/></td>
                    <td id="result3"><img src="<?php echo $cover3 ?>" alt="<?php echo $title3 ?>" width="45"/></td>
                    <td id="result4"><img src="<?php echo $cover4 ?>" alt="<?php echo $title4 ?>" width="45"/></td>                                   
                </tr> 
                <tr> 
                    <td id="resultimg1"><!--movie titltes and details,edit,delete imge links underneath each movie image-->
                    
                       <strong><?php echo $title1 ?> </strong><br></br>
                       <a href= "displayDetails.php?movieid=<?php echo $movieid1;?>" ><img src="<?php  if(!is_null($title1)){echo $detailsicon;} ?>"/></a>
                       <a href="editVid.php?movieid=<?php echo $movieid1;?>"><img src="<?php if(!is_null($title1)){echo $editicon;} ?>" /></a>
                       <a href="delete.php?movieid='<?php echo $movieid1;?>"><img src="<?php if(!is_null($title1)){echo $trashimage;} ?>" /></a>                        
                       
                    </td>
                    <td id="resultimg2">
                       <strong><?php echo $title2 ?> </strong><br></br>
                       <a href= "displayDetails.php?movieid=<?php echo $movieid2;?>" ><img src="<?php  if(!is_null($title2)){echo $detailsicon;} ?>" /></a>
                       <a href="editVid.php?movieid=<?php echo $movieid2;?>"><img src="<?php if(!is_null($title2)){echo $editicon;} ?>" /></a>
                       <a href="delete.php?movieid=<?php echo $movieid2;?>"><img src="<?php if(!is_null($title2)){echo $trashimage;} ?>" /></a>
                    </td>
                    <td id="resultimg3">
                      <strong><?php echo $title3 ?> </strong><br></br>
                      <a href= "displayDetails.php?movieid=<?php echo $movieid3;?>" ><img src="<?php  if(!is_null($title3)){echo $detailsicon;} ?>" /></a>
                       <a href="editVid.php?movieid=<?php echo $movieid3;?>"><img src="<?php if(!is_null($title3)){echo $editicon;} ?>" /></a>
                       <a href="delete.php?movieid=<?php echo $movieid3;?>"><img src="<?php if(!is_null($title3)){echo $trashimage;} ?>" /></a>
                    
                    </td>
                    <td id="resultimg4">
                      <strong><?php echo $title4 ?> </strong><br></br>
                       <a href= "displayDetails.php?movieid=<?php echo $movieid4;?>" ><img src="<?php  if(!is_null($title4)){echo $detailsicon;} ?>" /></a>
                       <a href="editVid.php?movieid=<?php echo $movieid4;?>"><img src="<?php if(!is_null($title4)){echo $editicon;} ?>" /></a>
                       <a href="delete.php?movieid=<?php echo $movieid4;?>"><img src="<?php if(!is_null($title4)){echo $trashimage;} ?>" /></a>
                    </td>
                </tr>
                <tr>
                    <td id="result5"><img src="<?php echo $cover5 ?>" alt="<?php echo $title5 ?>" width="45"/></td>
                    <td id="result6"><img src="<?php echo $cover6 ?>" alt="<?php echo $title6 ?>" width="45"/></td>
                    <td id="result7"><img src="<?php echo $cover7 ?>" alt="<?php echo $title7 ?>" width="45"/></td>
                    <td id="result8"><img src="<?php echo $cover8 ?>" alt="<?php echo $title8 ?>" width="45"/></td>             
                </tr>
                <tr>
                    <td id="resultimg5">
                      <strong><?php echo $title5 ?> </strong><br></br>
                       <a href= "displayDetails.php?movieid=<?php echo $movieid5;?>" ><img src="<?php  if(!is_null($title5)){echo $detailsicon;} ?>" /></a>
                       <a href="editVid.php?movieid=<?php echo $movieid5;?>"><img src="<?php if(!is_null($title5)){echo $editicon;} ?>" /></a>
                       <a href="delete.php?movieid=<?php echo $movieid5;?>"><img src="<?php if(!is_null($title5)){echo $trashimage;} ?>" /></a>
                    </td>
                    <td id="resultimg6">
                       <strong><?php echo $title6 ?> </strong><br></br>
                       <a href= "displayDetails.php?movieid=<?php echo $movieid6;?>" ><img src="<?php  if(!is_null($title6)){echo $detailsicon;} ?>" /></a>
                       <a href="editVid.php?movieid=<?php echo $movieid6;?>"><img src="<?php if(!is_null($title6)){echo $editicon;} ?>" /></a>
                       <a href="delete.php?movieid=<?php echo $movieid6;?>"><img src="<?php if(!is_null($title6)){echo $trashimage;} ?>" /></a>
                    </td>
                    <td id="resultimg7">
                      <strong><?php echo $title7 ?> </strong><br></br>
                      <a href= "displayDetails.php?movieid=<?php echo $movieid7;?>" ><img src="<?php  if(!is_null($title7)){echo $detailsicon;} ?>" /></a>
                       <a href="editVid.php?movieid=<?php echo $movieid7;?>"><img src="<?php if(!is_null($title7)){echo $editicon;} ?>" /></a>
                       <a href="delete.php?movieid=<?php echo $movieid7;?>"><img src="<?php if(!is_null($title7)){echo $trashimage;} ?>" /></a>
                    </td>
                    <td id="resultimg8">
                       <strong><?php echo $title8 ?> </strong><br></br>
                       <a href= "displayDetails.php?movieid=<?php echo $movieid8;?>" ><img src="<?php  if(!is_null($title8)){echo $detailsicon;} ?>" /></a>
                       <a href="editVid.php?movieid=<?php echo $movieid8;?>"><img src="<?php if(!is_null($title8)){echo $editicon;} ?>" /></a>
                       <a href="delete.php?movieid=<?php echo $movieid8;?>"><img src="<?php if(!is_null($title8)){echo $trashimage;} ?>" /></a>
                    </td>
                </tr>
                <tr>
                    <td id="result9"><img src="<?php echo $cover9 ?>" alt="<?php echo $title9 ?>" width="45"/></td>
                    <td id="result10"><img src="<?php echo $cover10 ?>" alt="<?php echo $title10 ?>" width="45"/></td>
                    <td id="result11"><img src="<?php echo $cover11 ?>" alt="<?php echo $title11 ?>" width="45"/></td>
                    <td id="result12"><img src="<?php echo $cover12 ?>" alt="<?php echo $title12 ?>" width="45"/></td>                  
                </tr>
                <tr>
                    <td id="resultimg9">
                       <strong><?php echo $title9 ?> </strong><br></br>
                       <a href= "displayDetails.php?movieid=<?php echo $movieid9;?>" ><img src="<?php  if(!is_null($title9)){echo $detailsicon;} ?>" /></a>
                       <a href="editVid.php?movieid=<?php echo $movieid9;?>"><img src="<?php if(!is_null($title9)){echo $editicon;} ?>" /></a>
                       <a href="delete.php?movieid=<?php echo $movieid9;?>"><img src="<?php if(!is_null($title9)){echo $trashimage;} ?>" /></a>
                    </td>
                    <td id="resultimg10">
                       <strong><?php echo $title10 ?> </strong><br></br>
                       <a href= "displayDetails.php?movieid=<?php echo $movieid10;?>" ><img src="<?php  if(!is_null($title10)){echo $detailsicon;} ?>" /></a>
                       <a href="editVid.php?movieid=<?php echo $movieid10;?>"><img src="<?php if(!is_null($title10)){echo $editicon;} ?>" /></a>
                       <a href="delete.php?movieid=<?php echo $movieid10;?>"><img src="<?php if(!is_null($title10)){echo $trashimage;} ?>" /></a>
                    </td>
                    <td id="resultimg11">
                       <strong><?php echo $title11 ?> </strong><br></br>
                       <a href= "displayDetails.php?movieid=<?php echo $movieid11;?>" ><img src="<?php  if(!is_null($title11)){echo $detailsicon;} ?>" /></a>
                       <a href="editVid.php?movieid=<?php echo $movieid11;?>"><img src="<?php if(!is_null($title11)){echo $editicon;} ?>" /></a>
                       <a href="delete.php?movieid=<?php echo $movieid11;?>"><img src="<?php if(!is_null($title11)){echo $trashimage;} ?>" /></a>
                    </td>
                    <td id="resultimg12">
                       <strong><?php echo $title12 ?> </strong><br></br>
                       <a href= "displayDetails.php?movieid=<?php echo $movieid12;?>" ><img src="<?php  if(!is_null($title12)){echo $detailsicon;} ?>" /></a>
                       <a href="editVid.php?movieid=<?php echo $movieid12;?>"><img src="<?php if(!is_null($title12)){echo $editicon;} ?>" /></a>
                       <a href="delete.php?movieid=<?php echo $movieid12;?>"><img src="<?php if(!is_null($title12)){echo $trashimage;} ?>" /></a>
                    </td>
                </tr>
                <tr>    <!--previous and next links-->                
                        <td colspan="2" id="previous"><?php if(!($start == 0)){ $newpos = $start - 12; echo'<a href="index.php?pos='. $newpos .'" name="previouslink"><font size="2">Previous</font></a>';}?></td>
                        <td colspan="2" id="next"><?php if(!(is_null($title13))){ $newpos = $start+12; echo'<a href="index.php?pos='.$newpos .'" name ="nextlink"><font size="2">Next</font></a>';}?></td>                    
                </tr>
              
            </table>
        </div><!--end of table--> 
          <div id="footer">
                <h3>&copy;  Web Dev Inc.</h3>
        	</div>
        </div>
    </body>
    
</html> <!--end of html document-->