<?php 

    require './config.php';
    require './conn.php';


    if(isset($_POST)) {

        $name = $_POST['name'];
        $email = $_POST['email'];
        $website = $_POST['website'];
        $comment = SQLite3::escapeString($_POST['comment']);

        $query =<<<EOF
            INSERT INTO comments (name, email, website, comment)
            VALUES ('$name', '$email', '$website', '$comment');
        EOF;


        $result = $db->exec($query);
        if ($result) {
            echo "New record created successfully";
        } else {
            echo $db->lastErrorMsg();
        }
        
    }

    header("Location: index.php");



    

?>