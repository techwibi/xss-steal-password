<?php
session_name('session'); 
session_start();

require './config.php';

if(!isset($_SESSION["user"])) {

    header("Location: login.php");
    exit;
    
}

if($_SESSION['user']!='admin') {
    
    header("Location: login.php");
    exit;

}

?>




<!DOCTYPE html>
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link href="<?= $url; ?>/asset/academyLabHeader.css" rel="stylesheet">
        <link href="<?= $url; ?>/asset/labs.css" rel="stylesheet">
        <title>Exploiting cross-site scripting to steal password</title>
    </head>
    <body>
            <script src="<?= $url; ?>/asset/labHeader.js"></script>
            
            <div id="academyLabHeader">
                <section class="academyLabBanner">
                    <div class="container">
                    <div class="logo"></div>
                        <div class="title-container">
                            <h2>Exploiting cross-site scripting to steal password</h2>
                        </div>
                        <div class="widgetcontainer-lab-status is-notsolved">
                            <span>LAB</span>
                            <p>Not solved</p>
                            <span class="lab-status-icon"></span>
                        </div>
                    </div>
                </section>
            </div>

        <div theme="">
            <section class="maincontainer">
                <div class="container is-page">
                    <header class="navigation-header">
                        <section class="top-links">
                            <a href="<?= $url; ?>/index.php">Home</a><p>|</p>
                            <a href="<?= $url; ?>/logout.php">Logout</a><p>|</p>
                        </section>
                    </header>
                    <header class="notification-header">
                    </header>
                    <h1>WELCOME ADMIN</h1>
                </div>
            </section>
        </div>
    

</body></html>
