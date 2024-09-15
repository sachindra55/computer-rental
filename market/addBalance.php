<?php
    header('Content-Type: application/json');
    require('../DBConfig.php');
    $db_config = new DBConfig();
    $mysqli = $db_config->get_connection();

$balance = $_GET["balance"];
$user_id = $_GET["user_id"];

if(!isset($_GET["balance"],$_GET["user_id"]))
{
    echo "BAD REQUEST";
}

    if(isset($_GET["balance"]) && isset($_GET["user_id"])) {


        $query = "UPDATE `user` SET `user_balance`= user_balance + '".$balance."' WHERE `user_id`= '".$user_id."'";

        mysqli_real_query($mysqli, $query);
        printf("Record Updated.\n");
        
        mysqli_free_result($result);
        mysqli_close($mysqli);
        
    }
    else
    {   
        header("HTTP/1.1 400 Bad Request");
        echo "Bad Request";
    }

        
?>
