<?php

    include("constants.inc");
    
    session_start();
    #used to login the user
#by M@rtin Bebey
    $username = $_POST['Username'];#get username of user
    $password = $_POST['Password'];#get the password
    $dbpass = "RNZHfeE^";#the password to connect to server
    $password = md5($password); #encrypt the password    
    
    //$connect = mysqli_connect('mysql.immortalfyre.com', mydb, $dbpass, mydb) or die("Could not connect to server");#connect to DB
    
    $query = mysqli_query($connect, "SELECT * FROM users WHERE username LIKE '$username' AND password LIKE '$password'");#validate credentials
    $row = mysqli_fetch_array($query);
    
    if(!is_null($row))#if credentials are valid
    {
        
        $_SESSION['username'] = $username;#get the username
        header("Location: index.php");#go to home page
        
    }
    
    else
    {        
        
        header("Location: login.php");#go back to login page if credentials are invalid
    }
                
?>
