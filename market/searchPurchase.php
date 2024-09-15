<?php
    header('Content-Type: application/json');
    require('../DBConfig.php');
    $db_config = new DBConfig();
    $mysqli = $db_config->get_connection();

    $purchase_id = $_GET["purchase_id"];

        $query = "select * from purchase where purchase_id='".$purchase_id."'";
        $result = mysqli_query($mysqli, $query);
    
        $selected = [];
        if(mysqli_num_rows($result) > 0){
          $selected =  mysqli_fetch_all($result,MYSQLI_ASSOC);
        }
        else
        {
            header("HTTP/1.1 404 Not Found");
            echo "No purchase record found";
                }
        mysqli_free_result($result);
        mysqli_close($mysqli);
        
        echo json_encode($selected,128);
?>
