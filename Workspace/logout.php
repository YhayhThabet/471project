<?php
    session_start();
    #this is used to log the user out
#by M@rtin Bebey
    session_destroy();#destroy the session to log out the user
    header("Location: index.php");#go back to home page (which will redirect to login page)

?>