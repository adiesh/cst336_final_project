
<!DOCTYPE html>
<html>
    <head>
        <title> Add Item</title>
         <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
        <link rel="stylesheet" href="styles.css" type="text/css" />
    </head>
    <body>

<?php


session_start();

include 'database.php';

echo "addRecord.php";
echo "<br />";

$conn = getDatabaseConnection();

// create a drop down bar to add item to table

$sql = "INSERT INTO apparrel (apparelName, apparelType, priceOfApparel, apparelStatus) VALUES (:aName, :aType, :aPrice, :aStatus)";
        
        
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


echo "<div id = 'notification'> Item was added </div>";
        

?>



         <h1> Add Item: </h1>
        <form method="POST">
            <!-- Item Type:
             <select name = "Filter">
                <option value = " ">Filter By</option>
                <option value= "anime">Anime</option>
                <option value= "apparel">Apparel</option>
                <option value= "electronics">Electronics</option>
            </select> -->
            <br />
            
            <div id = "notification">
                
                
                    Product Name:<input type="text" name="productName"/>
                    <br />
                    Type:<input type="text" name="productType">
                    <br/>
                    Price: <input type= "numeric" name ="price"/>
                    <br/>
                    Status: <input type ="text" name= "status"/>
                    <br />
                
                    
                   
                </form>
                
                  <input type="submit" value="Add" name="addItem">
                    <br />
                    <!-- <input type="submit" value="Back to Admin Main" name="addUser"> -->
                </form>
                
                
                <form action = "admin.php">
                    <input type = "submit" value = "Home" />
                </form>
                        
            </div>
            
            
        
            

    </body>
</html>