<?php include("common/head.html"); ?>
    <title>View Plan</title>
<?php include("common/header.html"); ?>
<?php
require_once("functions.php");

if(isset($_GET['id'])){
    $plan_id = $_GET['id'];
    if(!connectDb()){
        die('Could not connect tourism: ' . mysql_error());
    }
    $query = "SELECT * FROM day_plan WHERE plan_id = '{$plan_id}'";
    $result = mysql_query($query);
    $len = mysql_num_rows($result);
    $i=1;
    while($row=mysql_fetch_assoc($result))
    {
        $day[$i] = $row['day_id'];
        $scenery[$i][1] = $row['scenery_1'];
        $scenery_name[$i][1] = get_scenery_name($scenery[$i][1]);
        $scenery[$i][2] = $row['scenery_2'];
        $scenery_name[$i][2] = get_scenery_name($scenery[$i][2]);
        $restaurant[$i][1] = $row['restaurant_1'];
        $restaurant_name[$i][1] = get_restaurant_name($restaurant[$i][1]);
        $restaurant[$i][2] = $row['restaurant_2'];
        $restaurant_name[$i][2] = get_restaurant_name($restaurant[$i][2]);
        $hotel[$i] = $row['hotel'];
        $hotel_name[$i] = get_hotel_name($hotel[$i]);
        $hotel_website[$i] = get_hotel_website($hotel[$i]);
		$scenery_geo[$i][1][1]=get_scenery_geolat($scenery[$i][1]);
		$scenery_geo[$i][1][2]=get_scenery_geolong($scenery[$i][1]);
        $restaurant_geo[$i][1][1]=get_restaurant_geolat($restaurant[$i][1]);
		$restaurant_geo[$i][1][2]=get_restaurant_geolong($restaurant[$i][1]);
		$scenery_geo[$i][2][1]=get_scenery_geolat($scenery[$i][2]);
		$scenery_geo[$i][2][2]=get_scenery_geolong($scenery[$i][2]);
        $restaurant_geo[$i][2][1]=get_restaurant_geolat($restaurant[$i][2]);
		$restaurant_geo[$i][2][2]=get_restaurant_geolong($restaurant[$i][2]);
		$hotel_geo[$i][1]=get_hotel_geolat($hotel[$i]);
		$hotel_geo[$i][2]=get_hotel_geolong($hotel[$i]);
		$i++;
    }
}
function get_scenery_geolat($id){
	$query = "SELECT * FROM scenery WHERE scenery_id = '{$id}'";
    $result = mysql_query($query);
    $row=mysql_fetch_assoc($result);
    return $row['latitude'];
}
function get_scenery_geolong($id){
	$query = "SELECT * FROM scenery WHERE scenery_id = '{$id}'";
    $result = mysql_query($query);
    $row=mysql_fetch_assoc($result);
    return $row['longitude'];
}
function get_hotel_geolat($id){
	$query = "SELECT * FROM hotel WHERE place_id = '{$id}'";
    $result = mysql_query($query);
    $row=mysql_fetch_assoc($result);
    return $row['latitude'];
}
function get_hotel_geolong($id){
	$query = "SELECT * FROM hotel WHERE place_id = '{$id}'";
    $result = mysql_query($query);
    $row=mysql_fetch_assoc($result);
    return $row['longitude'];
}
function get_restaurant_geolat($id){
	$query = "SELECT * FROM restaurant WHERE place_id = '{$id}'";
    $result = mysql_query($query);
    $row=mysql_fetch_assoc($result);
    return $row['latitude'];
}
function get_restaurant_geolong($id){
	$query = "SELECT * FROM restaurant WHERE place_id = '{$id}'";
    $result = mysql_query($query);
    $row=mysql_fetch_assoc($result);
    return $row['longitude'];
}
function get_scenery_name($id){
    $query = "SELECT * FROM scenery WHERE scenery_id = '{$id}'";
    $result = mysql_query($query);
    $row=mysql_fetch_assoc($result);
    return $row['name'];
}
function get_restaurant_name($id){
    $query = "SELECT * FROM restaurant WHERE place_id = '{$id}'";
    $result = mysql_query($query);
    $row=mysql_fetch_assoc($result);
    return $row['name'];
}
function get_hotel_name($id){
    $query = "SELECT * FROM hotel WHERE place_id = '{$id}'";
    $result = mysql_query($query);
    $row=mysql_fetch_assoc($result);
    return $row['name'];
}
function get_hotel_website($id){
    $query = "SELECT * FROM hotel WHERE place_id = '{$id}'";
    $result = mysql_query($query);
    $row=mysql_fetch_assoc($result);
    return $row['website'];
}
?>


<div class="header">
    <div class="container">
        <div class="header-main">
            <div class="logo">
                <h1><a>View Plan</a></h1>
            </div>
        </div>
    </div>
</div>

<?php include("common/navbar.php"); ?>

<div class="container-fluid">
    <div class= "row" style ="margin-top :40px;">
        <div class="col-xs-10 col-sm-8 col-md-8 col-xs-offset-1 col-sm-offset-2 col-md-offset-2">
            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                <?php
                for ($k=1;$k<=$len;$k++){
                        echo '<div class="panel panel-default">';
                        echo '<div class="panel-heading" role="tab" id="heading'.$k.'">
                                        <h3 class="panel-title">';
                        echo '<a role="button" data-toggle="collapse" href="#day'.$k.'"
                                           aria-expanded="true" aria-controls="day'.$k.'">Plan of day '.($k).': </a></h3></div>';
                        echo '<div id="day'.$k.'" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingday'.$k.'">';
                        echo '<div class="panel-body">';
                        echo '<h4><strong>Morning :</strong></h4>';
                        echo '<p style="text-indent:2em;">Go to <a href="https://www.wikipedia.org/wiki/'.$scenery_name[$k][1].'"> '.$scenery_name[$k][1].'</a></p>';
                        echo '<div class="col-sm-12 "><div class="col-sm-2"><a role="button" class="btn btn-default "
                                     href="javascript:void(0);" onclick="route()">how to reach?</a></div></div>';

                        echo '<h4><strong>Lunch :</strong></h4>';
                        echo '<p style="text-indent:2em;">Go to <a href="restaurant_info.php?id='.$restaurant[$k][1].'"> '.$restaurant_name[$k][1].'</a>';
                        echo '<div class="col-sm-12 "><div class="col-sm-2"><a role="button" class="btn btn-default "
                                     href="javascript:void(0);" onclick="route('.$scenery_geo[$k][1][1].','.$scenery_geo[$k][1][2].','.$restaurant_geo[$k][1][1].','.$restaurant_geo[$k][1][2].')">how to reach?</a></div></div>';


                        echo '<h4><strong>Afternoon :</strong></h4>';
                        echo '<p style="text-indent:2em;">Go to <a href="https://www.wikipedia.org/wiki/'.$scenery_name[$k][2].'"> '.$scenery_name[$k][2].'</a></p>';
                        echo '<div class="col-sm-12 "><div class="col-sm-2"><a role="button" class="btn btn-default "
                                     href="javascript:void(0);" onclick="route('.$restaurant_geo[$k][1][1].','.$restaurant_geo[$k][1][2].','.$scenery_geo[$k][2][1].','.$scenery_geo[$k][2][2].')">how to reach?</a></div></div>';

                        echo '<h4><strong>Dinner :</strong></h4>';
                        echo '<p style="text-indent:2em;">Go to <a href="restaurant_info.php?id='.$restaurant[$k][2].'"> '.$restaurant_name[$k][2].'</a></p>';
                        echo '<div class="col-sm-12 "><div class="col-sm-2"><a role="button" class="btn btn-default "
                                     href="javascript:void(0);" onclick="route('.$scenery_geo[$k][2][1].','.$scenery_geo[$k][2][2].','.$restaurant_geo[$k][2][1].','.$restaurant_geo[$k][2][2].')">how to reach?</a></div></div>';

                        echo '<h4><strong>Evening :</strong></h4>';
                        echo '<p style="text-indent:2em;">Go to <a href="'.$hotel_website[$k].'"> '.$hotel_name[$k].'</a></p>';
                      
                        echo '<div class="col-sm-12 "><div class="col-sm-2"><a role="button" class="btn btn-default "
                                     href="javascript:void(0);" onclick="route('.$restaurant_geo[$k][2][1].','.$restaurant_geo[$k][2][2].','.$hotel_geo[$k][1].','.$hotel_geo[$k][2].')">how to reach?</a></div></div>';

                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                }
                if($i%2!=0){
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
                ?>
                <div class="col-sm-12" style="margin-bottom: 40px;margin-top: 40px;">
                    <div class="col-sm-3 col-sm-offset-2">
                        <input type="button" class="btn btn-default btn-block" name="submit" value="return" onclick="javascript:window.history.back();"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<script>
	function route(lat1,long1,lat2,long2){
		window.open("getroute.php?id="+lat1+","+long1+","+lat2+","+long2,'_blank');
	}
</script>