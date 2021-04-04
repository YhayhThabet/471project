<?php

    session_start(); 
    #this is used to delete a movie
#by M@rtin Bebey
    $dbpass = "RNZHfeE^";#the password to connect to server   
    $id = $_GET['movieid'];#movie id to be deleted
    //$connect = mysqli_connect('mysql.immortalfyre.com', mydb, $dbpass, mydb) or die("Could not connect to server");#connect to DB
    $query = mysqli_query($connect, "DELETE FROM MOVIES WHERE id LIKE '$id'");#delete the movie with the unique id
    
    if($query)
    {
        header("Location: index.php");#go back to home page
    }
    
    else
    {
        echo "Transaction Failed";
    }
    

?>