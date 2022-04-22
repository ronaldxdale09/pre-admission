<?php
    session_start();
    // Destroy session
    if(session_destroy()) {
        // Redirecting To Home Page
        unset($_SESSION['email']);

        header("Location: ../../index.php");
        $_SESSION['Logoutsuccessful']= "Logoutsuccessful";
    }
?>