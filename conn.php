<?php 

    $conn = new SQLite3($database_file);

    class MyDB extends SQLite3 {
        function __construct() {
        $this->open('users.db');
        }
    }

    $db = new MyDB();

    if (!$conn) {
        die("Connection failed!!");
    }

?>