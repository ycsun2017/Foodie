<?php
if ( isset( $_POST['city']) ) {
    $city = $_POST['city'];
    header("location:planning_dest.php?city=$city");
}

if ( isset( $_POST['scenery']) ) {
    //print_r($_POST['scenery']);
    $scenery = $_POST['scenery']; //an array
    $len = count($scenery);
    $par = "";
    for ($i=0;$i<$len;$i++){
        $par.= $scenery[$i];
    }
    header("location:planning_result.php?scenery=$par");
}

?>