<?php
    header('Content-Type: application/json');
    require('../DBConfig.php');
    $db_config = new DBConfig();
    $mysqli = $db_config->get_connection();

    $cardNum = $_GET["cardNum"];
    $cardPin = $_GET["cardPin"];

    if(isset($_GET["cardNum"]) && isset($_GET["cardPin"])) {
        $query = "select * from card where cardNum='".$cardNum."' and cardPin='".$cardPin."'";
        $result = mysqli_query($mysqli, $query);
    
        $selected = [];
        if(mysqli_num_rows($result) > 0){
          $selected =  mysqli_fetch_all($result,MYSQLI_ASSOC);
        }
        mysqli_free_result($result);
        mysqli_close($mysqli);
        
        echo json_encode($selected,128);
    }
    else
    {   
        header("HTTP/1.1 400 Bad Request");
        echo "Bad Request";
    }

        
?>
