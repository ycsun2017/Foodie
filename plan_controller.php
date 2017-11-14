<?php
require_once('functions.php');

//save a plan
if ( isset( $_POST['days']) ) {
    if(!connectDb()){
        die('Could not connect tourism: ' . mysql_error());
    }
    $days = $_POST['days'];
    $name = $_POST['plan-name'];
    for($i=1;$i<=$days;$i++){
        $restaurant[$i][1] = $_POST[$i.'restaurant_1'];
        $restaurant[$i][2] = $_POST[$i.'restaurant_2'];
        $scenery[$i][1] = $_POST[$i.'scenery_1'];
        $scenery[$i][2] = $_POST[$i.'scenery_2'];
        $hotel[$i] = $_POST[$i.'hotel'];
    }
    $user_id = get_user_id();
    save_plan($user_id, $name, $days, $restaurant, $scenery, $hotel);
    delete_wishlist($user_id, $restaurant);
}

//delete a plan
if(isset($_GET['delete'])){
    $plan_id = $_GET['delete']; //get plan id
    delete($plan_id);
}

//complete a plan
if(isset($_GET['complete'])){
    $plan_id = $_GET['complete'];
    complete($plan_id);
}

//copy a plan
if(isset($_GET['copy'])){
    $plan_id = $_GET['copy'];
    copy_plan($plan_id);
}

function save_plan($user_id, $name, $days, $restaurant, $scenery, $hotel){
    $query = "INSERT INTO plan (user_id, name,days)
                   VALUES ('{$user_id}', '{$name}','{$days}')";
    if(mysql_query($query)){
        $plan_id = mysql_insert_id();
        for ($i=1;$i<=$days;$i++){
            if(!day_plan($plan_id, $i, $restaurant[$i], $scenery[$i], $hotel[$i])){
                echo "<script type=\"text/javascript\">";
                echo "alert(\"Failed to save plan!\");";
                echo "location.href=document.referrer;";
                echo "</script>";
                break;
            }
        }
        echo "<script type=\"text/javascript\">";
        echo "alert(\"Successfully saved!\");";
        echo "location.href='plan_list.php';";
        echo "</script>";
    } else {
        echo "<script type=\"text/javascript\">";
        echo "alert(\"Failed to save plan!\");";
        echo "location.href=document.referrer;";
        echo "</script>";
    }
}

function day_plan($plan_id, $day_id, $restaurant, $scenery, $hotel){
    $query = "INSERT INTO day_plan (plan_id, day_id, scenery_1, scenery_2, restaurant_1, restaurant_2, hotel)
                   VALUES ('{$plan_id}', '{$day_id}','{$scenery[1]}','{$scenery[2]}','{$restaurant[1]}','{$restaurant[2]}','{$hotel}')";
    if(mysql_query($query)){
        return true;
    } else {
        return false;
    }
}

function delete_wishlist($user_id, $restaurant){
    for($i=1;$i<=count($restaurant);$i++){
        $query = "DELETE FROM wish_list WHERE user_id ='{$user_id}' AND (restaurant_id='{$restaurant[$i][1]}' OR restaurant_id='{$restaurant[$i][2]}')";
        if(!mysql_query($query)){
            return false;
        }
    }
    return true;
}

function delete($plan_id){
    if(!connectDb()){
        die('Could not connect tourism: ' . mysql_error());
    }
    $query = "DELETE FROM plan WHERE plan_id ='{$plan_id}'";
    $query2 = "DELETE FROM day_plan WHERE plan_id ='{$plan_id}'";
    if(mysql_query($query) && mysql_query($query2)){
        echo "<script type=\"text/javascript\">";
        echo "alert(\"Successfully deleted!\");";
        echo "location.href=document.referrer;";
        echo "</script>";
    } else {
        echo "<script type=\"text/javascript\">";
        echo "alert(\"Failed to delete!\");";
        echo "location.href=document.referrer;";
        echo "</script>";
    }
}

function complete($plan_id){
    if(!connectDb()){
        die('Could not connect tourism: ' . mysql_error());
    }
    $query = "UPDATE plan SET is_completed = 1 WHERE plan_id ='{$plan_id}'";
    if(mysql_query($query)){
        echo "<script type=\"text/javascript\">";
        echo "alert(\"Successfully completed the plan!\");";
        echo "location.href=document.referrer;";
        echo "</script>";
    } else {
        echo "<script type=\"text/javascript\">";
        echo "alert(\"Failed to complete!\");";
        echo "location.href=document.referrer;";
        echo "</script>";
    }
}

function copy_plan($plan_id){
    if(!connectDb()) {
        die('Could not connect tourism: ' . mysql_error());
    }
    $user_id = get_user_id();
    $query = "SELECT plan.name, days FROM plan WHERE plan_id ='{$plan_id}'";
    $result = mysql_query($query);
    $row=mysql_fetch_assoc($result);
    $name = $row['name'];
    $days = $row['days'];

    $query2 = "INSERT INTO plan (user_id, name,days)
                   VALUES ('{$user_id}', '{$name}','{$days}')";
    if(mysql_query($query2)){
        $new_plan_id = mysql_insert_id();
        $query3 = "INSERT INTO day_plan(plan_id, day_id, scenery_1, scenery_2, restaurant_1, restaurant_2, hotel)
                    SELECT {$new_plan_id},day_id, scenery_1, scenery_2, restaurant_1, restaurant_2, hotel FROM day_plan WHERE plan_id = {$plan_id}";
           // insert into 表1 select * from 表2 where id =1
        if(mysql_query($query3)){
            echo "<script type=\"text/javascript\">";
            echo "alert(\"Successfully copied the plan!\");";
            echo "location.href=document.referrer;";
            echo "</script>";
        }
    } else {
        echo "<script type=\"text/javascript\">";
        echo "alert(\"Failed to copy!\");";
        echo "location.href=document.referrer;";
        echo "</script>";
    }
}

?>