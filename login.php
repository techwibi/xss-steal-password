<?php
session_name('session'); 
session_start();

require './config.php';
require './conn.php';

$error = false;

if(isset($_SESSION["user"])) {
    if($_SESSION['user']=='admin') {
        header("Location: admin.php");
        exit;
    }
}


if(isset($_POST["username"])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $query =<<<EOF
        SELECT * FROM users WHERE username = '$username';
    EOF;

    $result = $db->query($query);

    $query = "SELECT * FROM users WHERE username = '$username'";

    // $result = mysqli_query($conn, $query);
    
    if($result) {
        $row = $result->fetchArray(SQLITE3_ASSOC);

        if ($row["password"] == $password) {

            $_SESSION["user"] = 'admin';
            header("Location: admin.php");
            exit;
        }
    }

    $error = true;
}


?>




<!DOCTYPE html>
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Exploiting cross-site scripting to steal password</title>
<link  rel="stylesheet" href="<?= $url; ?>/asset/academyLabHeader.css">
<link  rel="stylesheet" href="<?= $url; ?>/asset/labs.css">
</head>
    <body>
            
            
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
                            <a href="<?= $url; ?>/login.php">My account</a><p>|</p>
                        </section>
                    </header>
                    <header class="notification-header">
                    </header>
                    <h1>Login</h1>
                    <section>
                        <form class="login-form" method="POST" action="<?= $url; ?>/login.php">
                            <label>Username</label>
                            <input required="" type="text" name="username">
                            <label>Password</label>
                            <input required="" type="password" name="password">
                            <?php if($error): ?>
                                <span>Username dan Password Salah</span>
                                <br>
                            <?php endif ?>
                            <button class="button" type="submit"> Log in </button>
                        </form>
                    </section>
                </div>
            </section>
        </div>
        <!-- <script src="<?= $url; ?>/asset/labHeader.js"></script> -->
    

</body></html>
