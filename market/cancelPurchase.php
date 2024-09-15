<?php
    header('Content-Type: application/json');
    require('../DBConfig.php');
    $db_config = new DBConfig();
    $mysqli = $db_config->get_connection();

$purchase_id = $_GET["purchase_id"];


    if(isset($_GET["purchase_id"])) {

        $query = "DELETE FROM `purchase` WHERE `purchase_id`= '".$purchase_id."'";

        mysqli_real_query($mysqli, $query);
        printf("Purchase Cancelled.\n");
        
        mysqli_free_result($result);
        mysqli_close($mysqli);
        
    }
    else
    {   
        header("HTTP/1.1 400 Bad Request");
        echo "Bad Request";
    }

        
?>
