<?php 
    session_start();#start session
    #to search for movies 
#by M@rtin Bebey
    $dbpass = "RNZHfeE^";#the password to connect to server
    $c = 0;
    if(is_null($_SESSION['username']))#get username of user
    {
        header("Location: login.php");
        $signedIn = false;
    }
    
    else
    {
        $signedIn = true;        
        $search = $_GET['searchterm'];#get the search term
        //$connect = mysqli_connect('mysql.immortalfyre.com', mydb, $dbpass, mydb) or die("Could not connect to server");#connect o DB
        $query = mysqli_query($connect, "SELECT * FROM images");
        while($img = mysqli_fetch_array($query))
        {
            $reel = $img['movie-reel'];#get movie reel image
        }
    } 
    
    if(isset($_GET['pos']))#get the position to load content of page
    {
        $start = $_GET['pos'];
	
    }
    
    else
    {
        $start = 0;#initial position is 0
	
    }  

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">            <!--This is the search page to search for movies--> 
                                                                        <!--Proper indentation clearly shows opening and corresponding closing tags-->
                                                                        <!--By M@rtin Bebey-->

<html xmlns="http://www.w3.org/1999/xhtml">

    <head> <!--the head containing the title-->
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title id="title">MyVidCollection</title> 
        <link type="text/css" rel="stylesheet" href="style/search.css"/>       
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
                    echo ' <li><a href="search.php" class="active">Search</a></li>';
                    echo '<li><a href="editVid.php">Edit Video</a></li>';
                    echo '<li><a href="displayDetails.php">Display Details</a></li>';
                    echo '<li><a href="logout.php">Logout</a></li>';
                    echo '<li><a href="checkout.php">Check Out</a></li>';
                }
                
                else
                    {
                        echo '<li><a href="login.php">Login</a></li>';
                    }                 
                
                ?>
            </ul>
        </div>
        <div id="main">        
        <div><!--the search form (search box and submit button)-->
            <form id="mysearchForm" method="get" action="search.php" enctype="multipart/form-data">
                <div>
                    <label for="searchbar"> Search Term:<input id="searchbar" type="text" name="searchterm" value="<?php echo $search ?>" size="30"/></label>
                    <input type="submit" name="search" value="Search"/>
                </div>
            </form>            
        </div>        
    
        <?php
        
            if(isset($_GET['searchterm']))
            {
                include("constants.inc");                                
                $search = $_GET['searchterm'];
                if(is_null($search))
                {
                    $search = " ";
                    
                }
                
               
                $query = mysqli_query($connect, "SELECT * FROM MOVIES WHERE title LIKE '%$search%' LIMIT $start, 5");#get search results                           
              
                                                                  
                                
                    while($row = mysqli_fetch_array($query))#get data for 4 movies corresponding to search
                    {
                        $c++;
                        if($c == 1)
                        {
                            $cover1 = $row['cover'];
                            $title1 = $row['title'];
                            $movieid1 = $row['id'];
                        }
                        
                        if($c == 2)
                        {
                            $cover2 = $row['cover'];
                            $title2 = $row['title'];
                            $movieid2 = $row['id'];
                        }
                        
                        if($c == 3)
                        {
                            $cover3 = $row['cover'];
                            $title3 = $row['title'];
                            $movieid3 = $row['id'];
                        }
                        
                        if($c == 4)
                        {
                            $cover4 = $row['cover'];
                            $title4 = $row['title'];
                            $movieid4 = $row['id'];
                        }
                        
                        if($c == 5)#5th result used to check if there is a next page
                        {
                            $cover5 = $row['cover'];
                            $title5 = $row['title'];
                            $movieid5 = $row['id'];
                        }
                    }
                
                
                if(is_null($title1))#if nothing matches the search term
                {
                      echo "No matches found.";
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
                <div>
            <table><!--4 column table containing search results-->
                <tr>
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
                <tr>    <!--previous and next links-->                
                        <td colspan="2" id="previous"><?php if(!($start == 0)){ $newpos = $start - 4; echo'<a href="search.php?searchterm='.$search.'&pos='. $newpos .'" name="previouslink"><font size="2">Previous</font></a>';}?></td>
                        <td colspan="2" id="next"><?php if(!(is_null($title5))){ $newpos = $start+4; echo'<a href="search.php?searchterm='.$search.'&pos='.$newpos .'" name ="nextlink"><font size="2">Next</font></a>';}?></td>                    
                </tr>
            </table>
        </div>
                  
          
        
        
        </div>
        <br></br>        
        <div id="footer">
                <h3>&copy; Dev Inc.</h3>
        	</div>
        </div>
    </body>
    
</html><!--end of source code-->