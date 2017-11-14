<?php
require_once("../functions.php");
if(!connectDb()){
    die('Could not connect tourism: ' . mysql_error());
}
if(isset($_GET['delete'])){
    if(get_user_status()==3){  //customer cannot use wish list
        echo "<script type=\"text/javascript\">";
        echo "alert(\"You are customer, you cannot delete restaurant!\");";
        echo "window.history.back();;";
        echo "</script>";
    } else{
        $restaurant_id = $_GET['delete'];
        $user_id = get_user_id();
        $query = "DELETE FROM restaurant WHERE merchant ='{$user_id}' AND place_id='{$restaurant_id}'";
        if(mysql_query($query)){
            echo "<script type=\"text/javascript\">";
            echo "alert(\"Successfully deleted restaurant!\");";
            echo "window.history.back();;";
            echo "</script>";
        } else {
            echo "<script type=\"text/javascript\">";
            echo "alert(\"Failed to delete restaurant!\");";
            echo "window.history.back();;";
            echo "</script>";
        }
    }
}