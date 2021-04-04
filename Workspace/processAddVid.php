<?php

    session_start();
    #this is used to add a video to the DB
#by M@rtin Bebey
    $dbpass = "RNZHfeE^"; #the password to connect to server      
    $username = $_SESSION['username'];#get the username and addVid form data of the new movie
    $title = $_POST['titlebox']; 
    $ratings = $_POST['ratingOptions'];
    $genres = $_POST['genreOptions'];
    
     
    if($genres == "genre2")
    {
        $genres = "Horror ";
    }
    
    if($genres == "genre3")
    {
        
        $genres = "Drama";
    }
    
    if($genres == "genre1")
    {
        $genres = " Comedy";                
           
    }
       
    $g = $_POST['G'];
    if($g)
    {
        $mpaa = "G";
    }
    else
    {
        $mpaa = " ";
    }
    
    $pg = $_POST['PG'];
    if($pg)
    {
        $mpaa = "PG";
    }
    else
    {
        $mpaa = " ";
    } 
    
    $pg13 = $_POST['PG-13'];
    
    if($pg13)
    {
        $mpaa = "PG-13";
    }
    else
    {
        $mpaa = " ";
    } 
      
    $r = $_POST['R'];
    
    if($r)
    {
        $mpaa = "R";
    }
    else
    {
        $mpaa = " ";
    } 
    
    $nc17 = $_POST['NC-17'];
    
    if($nc17)
    {
        $mpaa = "NC-17";
    }
    else
    {
        $mpaa = " ";
    }
    
    $year = $_POST['yearbox'];  
    #$runtime = $_POST['runtimebox']; 
    $theatricalrelease = $_POST['theatrebox'];
    $dvdrelease = $_POST['dvdbox']; 
    $actors = $_POST['actorsbox']; 
    $cover = $_POST['covers'];  
    $studio = $_POST['studiobox']; 
    $summary = $_POST['plotSummary']; 
     
    $dvd = $_POST['DVD']; 
    if($dvd)
    {
        $dvd = "img/checkicon.png";
    }
    else
    {
        $dvd = "img/cancelicon.png";
    }
    
    $bluray = $_POST['BluRay'];
    if($bluray)
    {
        $bluray = "img/checkicon.png";
    }
    else
    {
        $bluray = "img/cancelicon.png";
    }
     
    $sd = $_POST['DigitalSD'];
    if($sd)
    {
        $sd = "img/checkicon.png";
    }
    else
    {
        $sd = "img/cancelicon.png";
    } 
    
    $hd = $_POST['DigitalHD']; 
    if($hd)
    {
        $hd = "img/checkicon.png";
    }
    else
    {
        $hd = "img/cancelicon.png";
    }
    
    //$connect = mysqli_connect('mysql.immortalfyre.com', mydb, $dbpass, mydb) or die("Could not connect to server");#connect to DB
    if(is_null($_GET['ids']))#if this is the first added movie
    {$ids = "ae7706bdc9bbc5bf4c4aaa809584f4833420";}#random encrypted password to be assigned to the movie (ending in 3420)
    while($query = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM MOVIES WHERE username LIKE '$username' AND id LIKE '$ids'")))#check if id exists
    { 
    
          $ids++;  #if id already exists increment the id    
          header("Location: processAddVid.php?ids=$ids");#and check again
    }
    
        $movieid = $ids;#unique id is obtained and data is added to the DB
        $query = mysqli_query($connect, "INSERT INTO MOVIES (username, title, ratings, genres, mpaa, year, dvdrelease, theatricalrelease, actors, cover, studio, summary, dvd, bluray, sd, hd, id) VALUES ('$username', '$title', 
        '$ratings', '$genres', '$mpaa', '$year', '$dvdrelease', '$theatricalrelease', '$actors', '$cover', '$studio', '$summary', 
        '$dvd', '$bluray', '$sd', '$hd', '$movieid')");
        header("Location: index.php");#go to home page where new movie is displayed
       
        
?>