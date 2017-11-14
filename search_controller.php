<?php
if(isset($_POST['city'])){
    $city = $_POST['city']; //get post city(id)
    $type = $_POST['type'];
    $price = $_POST['price'];
    $other = $_POST['other'];
    $condition = "city=$city";
    $condition .= "&type=$type";
    $condition .= "&price=$price";
    $condition .= "&other=$other";

    //echo $condition;
    header("location:search_result.php?$condition");
    exit();
}


?>