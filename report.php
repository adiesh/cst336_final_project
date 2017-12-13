<?php

include "database.php";

//$conn = new mysqli($host, $username, $password, $dbname);

$conn = getDatabaseConnection();


echo "Report on Store:";
echo "<br />";
echo "<br />";
echo "Average price for items by category.";

echo "<br />";
echo "<br />";

$sql3 = "SELECT avg(priceOfElectronics) AS average_price_electronics FROM electronics";



$stmt = $conn->prepare($sql3);
$stmt->execute();
$records = $stmt->fetch(PDO::FETCH_ASSOC);
echo "Average price by electronics: " .$records["average_price_electronics"]. "<br>";


$sql1 = "SELECT avg(priceOfApparel) AS average_price_apparel FROM apparrel";

$stmt = $conn->prepare($sql1);
$stmt->execute();
$records = $stmt->fetch(PDO::FETCH_ASSOC);
echo "Average price by apparel: " .$records["average_price_apparel"]. "<br>";





$sql2 = "SELECT avg(priceOfItem) AS average_price_anime FROM anime";



$stmt = $conn->prepare($sql2);
$stmt->execute();
$records = $stmt->fetch(PDO::FETCH_ASSOC);
echo "Average price by anime: " .$records["average_price_anime"]. "<br>";

echo "<br />";

echo "List the item name, along with the highest and lowest price for each table.";
echo "<br />";
echo "<br />";

$sql4 = "SELECT electronicsName, max(priceOfElectronics) as max_price FROM electronics GROUP BY electronicsName ORDER BY max_price DESC";


$stmt = $conn->prepare($sql4);
$stmt->execute();
$records = $stmt->fetch(PDO::FETCH_ASSOC);
echo "Electronics name: " .$records["electronicsName"]. ", Price: " .$records["max_price"]. "<br>";


$sql5 = "SELECT electronicsName, min(priceOfElectronics) as min_price FROM electronics GROUP BY electronicsName ORDER BY min_price";



$stmt = $conn->prepare($sql5);
$stmt->execute();
$records = $stmt->fetch(PDO::FETCH_ASSOC);
echo "Electronics name: " .$records["electronicsName"]. ", Price: " .$records["min_price"]. "<br>";



$sql6 = "SELECT apparelName, max(priceOfApparel) as max_price FROM apparrel GROUP BY apparelName ORDER BY max_price DESC";



$stmt = $conn->prepare($sql6);
$stmt->execute();
$records = $stmt->fetch(PDO::FETCH_ASSOC);
echo "Apparel name: " .$records["apparelName"]. ", Price: " .$records["max_price"]. "<br>";



$sql7 = "SELECT apparelName, min(priceOfApparel) as min_price FROM apparrel GROUP BY apparelName ORDER BY min_price";



$stmt = $conn->prepare($sql7);
$stmt->execute();
$records = $stmt->fetch(PDO::FETCH_ASSOC);
echo "Apparel name: " .$records["apparelName"]. ", Price: " .$records["min_price"]. "<br>";


$sql8 = "SELECT name, max(priceOfItem) as max_price FROM anime GROUP BY name ORDER BY max_price DESC";



$stmt = $conn->prepare($sql8);
$stmt->execute();
$records = $stmt->fetch(PDO::FETCH_ASSOC);
echo "Item name: " .$records["name"]. ", Price: " .$records["max_price"]. "<br>";



$sql9 = "SELECT name, min(priceOfItem) as min_price FROM anime GROUP BY name ORDER BY min_price";



$stmt = $conn->prepare($sql9);
$stmt->execute();
$records = $stmt->fetch(PDO::FETCH_ASSOC);
echo "Item name: " .$records["name"]. ", Price: " .$records["min_price"]. "<br>";

echo "<br />";

echo "Count type of item by table";
echo "<br/>";
echo "<br />";

$sql10 = "SELECT electronicsType, count(electronicsType) as type_total FROM electronics GROUP BY electronicsType ORDER BY type_total";


$stmt = $conn->prepare($sql10);
$stmt->execute();
$records = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach($records as $record) {
    echo "Electronics type: " .$record["electronicsType"]. ", Count: " .$record["type_total"]."<br>";
}

echo "<br />";

$sql11 = "SELECT apparelType, count(apparelType) as type_total FROM apparrel GROUP BY apparelType ORDER BY type_total";


$stmt = $conn->prepare($sql11);
$stmt->execute();
$records = $stmt->fetchAll(PDO::FETCH_ASSOC);
//echo "Apparel type: " .$records["apparelType"]. ", Count: " .$records["type_total"]."<br>";

foreach($records as $record) {
    echo "Apparel type: " .$record["apparelType"]. ", Count: " .$record["type_total"]."<br>";
}

echo "<br />";

$sql12 = "SELECT itemType, count(itemType) as type_total FROM anime GROUP BY itemType ORDER BY type_total";


$stmt = $conn->prepare($sql12);
$stmt->execute();
$records = $stmt->fetchAll(PDO::FETCH_ASSOC);
//echo "Item type: " .$records["itemType"]. ", Count: " .$records["type_total"]."<br>";
foreach($records as $record) {
    echo "Item type: " .$record["itemType"]. ", Count: " .$record["type_total"]."<br>";
}


echo "<br />";

/*
$sql5 = "SELECT apparelName, max(priceOfApparel) as max_price FROM apparrel";

echo "<br />";
echo "<br />";

$stmt = $conn->prepare($sql6);
$stmt->execute();
$records = $stmt->fetch(PDO::FETCH_ASSOC);
echo "apparel name: " .$records["apparelName"]. ", price: " .$records["max_price"]. "<br>";

$sql6 = "SELECT name, max(priceOfItem) as max_price FROM anime ";

echo "<br />";
echo "<br />";

$stmt = $conn->prepare($sql6);
$stmt->execute();
$records = $stmt->fetch(PDO::FETCH_ASSOC);
echo "item name: " .$records["name"]. ", price: " .$records["max_price"]. "<br>";

echo "Count type of item by table";

echo "<br />";
echo "<br />";

$sql7 = "SELECT electronicsType, count(electronicsType) as type_total FROM electronics GROUP BY electronicsType ORDER BY type_total";

echo "<br />";
echo "<br />";

$stmt = $conn->prepare($sql9);
$stmt->execute();
$records = $stmt->fetch(PDO::FETCH_ASSOC);
echo "electronics type: " .$records["electronicsType"]. ", count: " .$records["type_total"]."<br>";



echo "<br />";
echo "<br />";

$sql8 = "SELECT apparelType, count(apparelType) as type_total FROM apparrel GROUP BY apparelType ORDER BY type_total";

echo "<br />";
echo "<br />";

$stmt = $conn->prepare($sql8);
$stmt->execute();
$records = $stmt->fetch(PDO::FETCH_ASSOC);
echo "electronics type: " .$records["apparelType"]. ", count: " .$records["type_total"]."<br>";


echo "<br />";
echo "<br />";

$sql7 = "SELECT itemType, count(itemType) as type_total FROM anime GROUP BY itemType ORDER BY type_total";

echo "<br />";
echo "<br />";

$stmt = $conn->prepare($sql7);
$stmt->execute();
$records = $stmt->fetch(PDO::FETCH_ASSOC);
echo "item type: " .$records["itemType"]. ", count: " .$records["type_total"]."<br>";
*/

?>

<html>
    <head>
        <title> Report </title>
    </head>
    <body>
        <form action = "admin.php">
                <input type = "submit" value = "Home" />
        </form>
    </body>
    
</html>

