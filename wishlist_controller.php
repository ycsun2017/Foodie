<?php
require_once("functions.php");

if(isset($_GET['add'])){
    if(get_user_status()==2){  //merchant cannot use wish list
        echo "<script type=\"text/javascript\">";
        echo "alert(\"You are merchant, you cannot use wish list!\");";
        echo "window.history.back();;";
        echo "</script>";
    }
    else{
        $restaurant_id = $_GET['add']; //get restaurant id
        $user_id = get_user_id();
        if($user_id!=null)
            add($restaurant_id,$user_id);
        else {
            echo "<script type=\"text/javascript\">";
            echo "alert(\"Please log in first!\");";
            echo "location.href='login.php';";
            echo "</script>";
        }
    }
}

if(isset($_GET['delete'])){
    $restaurant_id = $_GET['delete']; //get restaurant id
    $user_id = get_user_id();
    delete($restaurant_id,$user_id);
}

function add($restaurant_id,$user_id){
    if(!connectDb()){
        die('Could not connect tourism: ' . mysql_error());
    }
    $query = "SELECT * FROM wish_list WHERE user_id ='{$user_id}' AND restaurant_id='{$restaurant_id}'";
    $result = mysql_query($query);
    if(mysql_num_rows($result)!=0){
        echo "<script type=\"text/javascript\">";
        echo "alert(\"This restaurant has already in your wish list :)!\");";
        echo "location.href=document.referrer;";
        echo "</script>";
    } else {
        $query2 = "INSERT INTO wish_list (user_id, restaurant_id)
                   VALUES ('{$user_id}', '{$restaurant_id}')";
        if(!mysql_query($query2)){
            echo "<script type=\"text/javascript\">";
            echo "alert(\"Failed to add, please try again!\");";
            echo "location.href=document.referrer;";
            echo "</script>";
        } else {
            echo "<script type=\"text/javascript\">";
            echo "alert(\"Successfully added to wish list!\");";
            echo "location.href=document.referrer;";
            echo "</script>";
        }
    }
}

function delete($restaurant_id,$user_id){
    if(!connectDb()){
        die('Could not connect tourism: ' . mysql_error());
    }
    $query = "DELETE FROM wish_list WHERE user_id ='{$user_id}' AND restaurant_id='{$restaurant_id}'";

    if(mysql_query($query)){
        echo "<script type=\"text/javascript\">";
        echo "alert(\"Successfully deleted from wish list!\");";
        echo "location.href=document.referrer;";
        echo "</script>";
    } else {
        echo "<script type=\"text/javascript\">";
        echo "alert(\"Failed to delete!\");";
        echo "location.href=document.referrer;";
        echo "</script>";
    }
}

?>

