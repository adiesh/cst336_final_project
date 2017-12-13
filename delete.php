<?php

include 'database.php';
$conn = getDatabaseConnection();

$id = $_GET['itemID']; 

$sql = "DELETE FROM apparrel WHERE id = ". $_GET['itemID'];

//echo "sql: $sql <br>"; 


// //$sql = "DELETE FROM apparrel WHERE id = :id";

$stmt = $conn->prepare($sql);
$stmt->execute(['id' => $_POST['id']]);

$stmt->execute();
header("Location: admin.php");



?>