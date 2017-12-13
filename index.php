<?php
    session_start();
    //displays all info,
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
    
 
?>

<html>
    <head>
        <form action = "admin_login.php">
            <input type = "submit" value = "Login!" />
        </form>

        <!--<input type = "submit" name = "loginForm" value = "Login!"><br />-->
        <title>Online Store</title>
        <link rel="stylesheet" href="styles.css" type="text/css" />
        <link href="functions.php"/>
    </head>
    <body>
        <div id = "wrapper">

            <header>
                <h1>Welcome!</h1>
                <br>
                <!-- <a href="cart.php"><img src="img/cart.png"></a> -->
                <h3>Choose an item you would like to purchase:</h3>
            </header>

            <form>
                Item Type:
                <select name = "Filter">
                    <option value = " ">Filter By</option>
                    <option value = "All">All</option>
                    <option value= "anime">Anime</option>
                    <option value= "apparel">Apparel</option>
                    <option value= "electronics">Electronics</option>
                </select>
                <br>
                Sort by:
                <select name = "Sort">
                    <option value = " ">Sort By</option>
                    <option value = "ascending">Ascending</option>
                    <option value = "descending">Descending</option>
                </select>
                <br>
                <input type="submit" value="Search" name="submit">
            </form>
            
            
            <?php
                include "functions.php";
                
                //displays the electronics from the database
                $electronics = displayElectronics($sort);
                echo "<table id='table'>";
                foreach($electronics as $electronic) {
                    echo "<tr>";
                    echo "<td><a href='details.php?deets=".$electronic['electronicsName']."&type=electronics'>". $electronic['electronicsName'] ."</a></td>";
                    //echo "<td><a href='addCart.php?id=".$electronic['electronicsName']."'>Add to Cart</a></td>";
                    echo "</tr>";
                }
                echo "</table>";
                echo "<br/>";
                
                //displays the anime from the database
                $animes = displayAnime($sort);
                echo "<table id='table'>";
                foreach($animes as $anime) {
                    echo "<tr>";
                    echo "<td><a href='details.php?deets=".$anime['name']."&type=anime'>". $anime['name'] ."</a></td>";
                    //echo "<td><a href='addCart.php?id=".$anime['name']."'>Add to Cart</a></td>";
                    echo "</tr>";
                }
                echo "</table>";
                echo "<br/>";
                
                //displays the apparel from the database
                $apparels = displayApparel($sort);
                
                echo "<table id='table'>";
                foreach($apparels as $apparel) {
                    echo "<tr>";
                    echo "<td><a href='details.php?deets=".$apparel['apparelName']."&type=apparel'>". $apparel['apparelName'] ."</a></td>";
                    //echo "<td><a href='addCart.php?id=".$apparel['apparelName']."'>Add to Cart</a></td>";
                    echo "</tr>";
                }
                echo "</table>";

           ?>


        </div>
        
    </body>
</html>