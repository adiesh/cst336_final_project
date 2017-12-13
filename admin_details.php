<?php
    session_start();
    
    if($_GET['Filter'] == 'All') {
        header("Location: index.php");
    }
    
    //goes to anime.php for anime only info
    if ($_GET["Filter"] == 'anime') {
        header ("Location: anime.php");
    }
    
    //goes to apparel.php for apparel only info
    if ($_GET["Filter"] == 'apparel') {
        header ("Location: apparel.php");
    }
    
    //goes to electronics.php for electronic only info
    if ($_GET["Filter"] == 'electronics') {
        header ("Location: electronics.php");
    }
    
    //displays all info
    if( $_GET["Filter"] == ' ' && $_GET["Sort"]== ' ') {
        header ("Location: index.php");
    }
    
    if(isset($_GET['Sort'])) {
        $sort = $_GET['Sort'];
    } else {
        $sort = "0";
    }
    
    
    if(isset($_GET['id'])) {
        $id = $_GET['id'];
    } 
    
    
?>

<html>
    <head>
        <title>Online Store</title>
        <link rel="stylesheet" href="styles.css" type="text/css" />
        <link href="functions.php"/>
    </head>
    <body>
        <div id = "wrapper">
            
            <header>
                <h1>Welcome!</h1>
                <br>
                <h3>Choose an item you would like to purchase:</h3>
            </header>
            
            <form method>
                Item Type:
                <select name = "Filter">
                    <option value = " ">Filter By</option>
                    <option value = "All">All</option>
                    <option value= "anime">Anime</option>
                    <option value= "apparel">Apparel</option>
                    <option value= "electronics">Electronics</option>
                </select>
                <br>
                Item Type:
                <select name = "Sort">
                    <option value = " ">Sort By</option>
                    <option value = "price">Price</option>
                    <option value = "name">Name</option>
                    <option value = "ascending">Ascending</option>
                    <option value = "descending">Descending</option>
                </select>
                <br>
                <input type="submit" value="Search" name="submit">
            </form>
            
            <?php
                include "functions.php";
                
                
                $deets = $_GET['deets'];
                $type= $_GET['type'];;
                $shebang=$_SESSION['shebang'];
                $details = displayDetails($deets,$type);
                
                
                if($type=="anime"){
                echo "<table id='table'>";
                    echo "<tr>";
                    echo "<td> Item: ";
                    echo $details[0]['name']. "</td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<td> Item Type: ";
                    echo $details[0]["itemType"] ."</td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<td> Price: ";
                    echo  $details[0]["priceOfItem"] ."</td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<td> Status: ";
                    echo $details[0]["itemStatus"] ."</td>";
                    
                    echo "</tr>";
                
                echo "</table>";
                //echo "<td><a href='addCart.php?id=".$details[0]['name']."'>Add to Cart</a></td>";

                }
                else{
                    echo "<table id='table'>";
                    echo "<tr>";
                    echo "<td> Item: ";
                    echo $details[0][$type.'Name']. "</td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<td> Item Type: ";
                    echo $details[0][$type."Type"] ."</td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<td> Price: ";
                    if($type=="apparel"){
                    echo  $details[0]["priceOfApparel"] ."</td>";
                    }
                    if($type=="electronics"){
                    echo  $details[0]["priceOfElectronics"] ."</td>";
                    }
                    echo "</tr>";
                    echo "<tr>";
                    echo "<td> Status: ";
                    echo $details[0][$type."Status"] ."</td>";
                    
                    echo "</tr>";
                
                echo "</table>";
                // echo "<td><a href='addCart.php?id=".$details[0][$type.'Name']."'>Add to Cart</a></td>";
                }
                

           ?>
            <br>
            <form action = "update.php">
                <input type="hidden" name="itemID" value="<?php echo $id ?>">
                <input type="text">
                <input type = "submit" value = "Update!" />
            </form>
            
            <form action = "delete.php">
                <input type="hidden" name="itemID" value="<?php echo $id ?>">
                <input type="text">
                <input type = "submit" value = "Delete!" />
            </form>
            
        </div>
        
    </body>
</html>