
<!DOCTYPE html>
<html>
    <head>
        <title> Update Item</title>
         <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
         <link rel="stylesheet" href="styles.css" type="text/css" />
    </head>
    <body>

<?php


session_start();


// get info for the product here


include 'database.php';

echo "update.php";
echo "<br />";
$conn = getDatabaseConnection();


function getItemInfo() {
    global $conn;
    
    $sql = "SELECT * FROM Apparrel WHERE id = " . $_GET['itemId'];
    
    $stmt = $conn->prepare($sql);
    
    $stmt->execute();
    
    $record = $stmt->fetch(PDO::FETCH_ASSOC);
    print_r($record);
    return $record;
}

// should be set in the URL
//$id = $_GET['id']; 

// if statements to decide what 'tableName' should be 

$stmt = $conn->prepare("UPDATE apparrel SET apparelName=:aName, apparelType=:aType, priceOfApparel=:aPrice, status=:aStatus WHERE id = :id");






echo "data: <br/>"; 
print_r($data); 


echo "POST: <br/>"; 
print_r($_POST); 


$np = array();

$np['aName'] = $_POST['productName'];
$np['aType'] = $_POST['productType'];
$np['aPrice'] = $_POST['price'];
$np['aStatus'] = $_POST['status'];

$stmt = $conn->prepare($sql);

$stmt->execute($np);

echo "np: <br/>"; 
print_r($np);


if(isset($_GET['userId'])) {
    $itemInfo = getItemInfo();
}


/*

if (isset($_GET['itemInfo'])) {
    $np = array();

    $np['aName'] = $_POST['productName'];
    $np['aType'] = $_POST['productType'];
    $np['aPrice'] = $_POST['price'];
    $np['aStatus'] = $_POST['status'];
    
    $stmt = $conn->prepare($sql);
    
    $stmt->execute($np);
    
    echo "np: <br/>"; 
    print_r($np);
}

*/

?>


         <h1> Update Info: </h1>
        <form method="POST">
            Product Name:<input type="text" name="productName" value = "<?=$itemInfo['productName']?>"/>
            <br />
            Type:<input type="text" name="productType" value = "<?=$itemInfo['productType']?>"/>
            <br/>
            Price: <input type= "text" name ="price" value = "<?=$itemInfo['price']?>"/>
            <br/>
            Status: <input type ="text" name= "status" value = "<?=$itemInfo['status']?>"/>
            <br />
           
            <input type="submit" value="Update" name="update">
            <br />
            <!-- <input type="submit" value="Back to Admin Main" name="addUser"> -->
        </form>
        
         <form action = "admin.php">
            <input type = "submit" value = "Home" />
        </form>


    </body>
</html>