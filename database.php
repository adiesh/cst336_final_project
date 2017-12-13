<?php

// link: https://
    
function getDatabaseConnection() {
    $host = "us-cdbr-iron-east-05.cleardb.net";
    $username = "b5ba02fc3ba351";
    $password = "3f870355";
    $dbname = "heroku_860455424cb7b6b";
    
    // connect to our mysql database server
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    return $conn;
}

?>

