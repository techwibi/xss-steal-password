<?php

    session_name('session');    
    session_start();

    if($_SESSION["user"] == 'admin'){
        unset($_SESSION['user']);
        session_unset();
        session_destroy();

        
    } 
    
    header("Location: admin.php");
    exit;

?>