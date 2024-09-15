<?php

function getItems()
{
  header('Content-Type: application/json');
  require('../DBConfig.php');
  $db_config = new DBConfig();
  $mysqli = $db_config->get_connection();

      $query = "select * from itemlist where seller_ip='131.217.175.213'";
      $result = mysqli_query($mysqli, $query);
  
      $selected = [];
      if(mysqli_num_rows($result) > 0){
        $selected =  mysqli_fetch_all($result,MYSQLI_ASSOC);
      }
      mysqli_free_result($result);
      mysqli_close($mysqli);
      
      echo json_encode($selected,128);

}

echo getItems();
   
?>