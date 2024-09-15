<?php
    header('Content-Type: application/json');
    require('../DBConfig.php');
    $db_config = new DBConfig();
    $mysqli = $db_config->get_connection();

$quantity = $_GET["quantity"];
$user_id = $_GET["user_id"];
$item_id = $_GET["item_id"];
$seller_ip = $_GET["seller_ip"];

    if(isset($_GET["item_id"]) && isset($_GET["user_id"]) && isset($_GET["seller_ip"]) && isset($_GET["quantity"])) {

        $query = "SELECT unit_price,seller_ip FROM `itemlist` WHERE item_id = '".$item_id."'";
        $result = mysqli_query($mysqli, $query);
        
        /* fetch associative array */
        $row = mysqli_fetch_array($result);

        $final_price = $row[0] * $quantity;
        $ip = $seller_ip = $_GET["seller_ip"];

        $query1 = "INSERT INTO `purchase`(`user_id`, `item_id`, `quantity`, `price`, `seller_ip`) VALUES ('".$user_id."', '".$item_id."', '".$quantity."', '".$final_price."','".$ip."' )";
        mysqli_real_query($mysqli, $query1);

        $query2 = "UPDATE `user` SET `user_balance`= user_balance - '".$final_price."' WHERE `user_id`= '".$user_id."'";
        mysqli_real_query($mysqli, $query2);
        $query3 = "UPDATE `itemlist` SET `stock_qty`= stock_qty - '".$quantity."' WHERE `item_id`= '".$item_id."'";
        mysqli_real_query($mysqli, $query3);

 
        echo $query1,$result1;

        mysqli_free_result($result,$result1);
        mysqli_close($mysqli);
        
    }

        
?>
