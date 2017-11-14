<?php include("common/head.html"); ?>
    <title>Create Plan</title>
<?php include("common/header.html"); ?>
<?php
require_once("functions.php");

if(isset($_POST['wish'])){
    //print_r($_POST);
    $arr_string = join(',', $_POST['wish']);

    if(!connectDb()){
        die('Could not connect tourism: ' . mysql_error());
    }
    $user_id = get_user_id();
    $query = "SELECT * FROM wish_list WHERE user_id ='{$user_id}' AND id IN ({$arr_string})";
    $result = mysql_query($query);
    $i = 0;
    $len = mysql_num_rows($result);
    $cities = [];
    while($row=mysql_fetch_assoc($result))
    {
        //find restaurant in wish list
        $restaurant_id[$i] = $row['restaurant_id'];
        $query2 = "SELECT * FROM restaurant WHERE place_id ='{$restaurant_id[$i]}'";
        $result2 = mysql_query($query2);
        $restaurant = mysql_fetch_assoc($result2);
        $name[$i] = $restaurant['name'];
        $price[$i] = $restaurant['price'];
        $address[$i] = $restaurant['address'];
        $r_latitude[$i] = $restaurant['latitude'];
        $r_longitude[$i] = $restaurant['longitude'];

        $city_id[$i] = $restaurant['city_id'];
        $cities[$city_id[$i]]++;
        $i++;
    }

    for($i=0;$i<$len;$i++){
        //find all places around the i-th restaurant, ordered by distance
        //complex sql statement!!!!!!
        $query2 = "SELECT *, ((latitude-{$r_latitude[$i]})^2 + (longitude-{$r_longitude[$i]})^2) AS dist FROM scenery WHERE city_id ='{$city_id[$i]}' ORDER BY dist";
        $result2 = mysql_query($query2);
        $s_len[$i] = mysql_num_rows($result2);
        for ($j=0;$j<$s_len[$i];$j++) {
            $can[$j] = true;
            $scenery[$i][$j] = mysql_fetch_assoc($result2);
            for($k=0;$k<$i;$k++){
                if($scenery[$k][0]['scenery_id']==$scenery[$i][$j]['scenery_id']){
                    $can[$j] = false;
                    break;
                }
            }
        }
        for ($j=0;$j<$s_len[$i];$j++) {
            if($can[$j]){
                $temp = $scenery[$i][0];
                $scenery[$i][0] = $scenery[$i][$j];
                $scenery[$i][$j] = $temp;
                break;
            }
        }
//        for ($j=0;$j<$s_len[$i];$j++) {
//            $query3 = "SELECT * FROM hotel WHERE scenery_id ='{$scenery[$i][$j]['scenery_id']}'";
//            $result3 = mysql_query($query3);
//            $hotelNum[$i][$j] = mysql_num_rows($result3);
//            for ($l=0;$l<$hotelNum[$i][$j];$l++) {
//                $row3 = mysql_fetch_assoc($result3);
//                $hotel[$i][$j][$l] = $row3;
//            }
//        }
//        echo $i;
//        print_r($can);
//        print_r($scenery[$i]);
//        echo "<br>";
//        $query2 = "SELECT * FROM scenery WHERE city_id ='{$city_id[$i]}'";
//        $result2 = mysql_query($query2);
//        $s_len[$i] = mysql_num_rows($result2);
//        for ($j=0;$j<$s_len[$i];$j++) {
//            $candidate_scenery[$i][$j] = mysql_fetch_assoc($result2);
//        }
//        $scenery[$i] = find_nearest($candidate_scenery[$i],$r_latitude[$i],$r_longitude[$i]);
    }

    for($i=0;$i<$len;$i++){
        //find all hotels around the i-th restaurant, ordered by distance
        //complex sql statement!!!!!!
        $query3 = "SELECT *, ((latitude-{$r_latitude[$i]})^2 + (longitude-{$r_longitude[$i]})^2) AS dist FROM hotel WHERE city_id ='{$city_id[$i]}' ORDER BY dist";
        $result3 = mysql_query($query3);
        $h_len[$i] = mysql_num_rows($result3);
        for ($j=0;$j<$h_len[$i];$j++) {
            $can[$j] = true;
            $hotel[$i][$j] = mysql_fetch_assoc($result3);
        }
    }//    //find scenery and hotel around the restaurant
//    foreach ($cities as $city=>$num){
//        $query2 = "SELECT * FROM scenery WHERE city_id ='{$city}'";
//        $result2 = mysql_query($query2);
//
//        for ($j=0;$j<$num;$j++) {
//            $row2=mysql_fetch_assoc($result2);
//            $scenery[$city][$j] = $row2;
//
//            $query3 = "SELECT * FROM hotel WHERE scenery_id ='{$scenery[$city][$j]['scenery_id']}'";
//            $result3 = mysql_query($query3);
//            $hotelNum[$city][$j] = mysql_num_rows($result3);
//            for ($l=0;$l<$hotelNum[$city][$j];$l++) {
//                $row3 = mysql_fetch_assoc($result3);
//                $hotel[$city][$j][$l] = $row3;
//            }
//        }
//    }
//print_r($hotel);
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
?>

    <div class="header">
        <div class="container">
            <div class="header-main">
                <div class="logo">
                    <h1><a>Create Plan</a></h1>
                </div>
            </div>
        </div>
    </div>

<?php include("common/navbar.php"); ?>

<div class="container-fluid">
    <div class= "row" style ="margin-top :40px;">
        <div class="col-xs-10 col-sm-8 col-md-8 col-xs-offset-1 col-sm-offset-2 col-md-offset-2">
            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                <form class="form-horizontal" action="plan_controller.php" method="post">
                    <?php
                        $day = ceil($i/2);
                        echo '<input style="display:none;" type="number" name="days" value="'.$day.'" >';
                        $t=[]; //scenery iterator
                        for ($i=0;$i<count($city_id);$i++){
                            $t[$city_id[$i]] = 0;
                        }
                        for ($i=0;$i<$len;$i++){
                            $k = floor($i/2)+1;
                            if($i%2==0){
                                echo '<div class="panel panel-default">';
                                echo '<div class="panel-heading" role="tab" id="heading'.$k.'">
                                        <h3 class="panel-title">';
                                echo '<a role="button" data-toggle="collapse" href="#day'.$k.'"
                                           aria-expanded="true" aria-controls="day'.$k.'">Plan of day '.($k).': </a></h3></div>';
                                echo '<div id="day'.$k.'" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingday'.$k.'">';
                                echo '<div class="panel-body">';
                                echo '<h4><strong>Morning :</strong></h4>';
                                echo '<input style="display:none;" type="number" id="in_scenery_'.$i.'" name="'.$k.'scenery_1" value="'.$scenery[$i][0]['scenery_id'].'" >';
                                echo '<p style="text-indent:2em;">Go to <a target="_blank" id="scenery_'.$i.'" href="https://www.wikipedia.org/wiki/'.$scenery[$i][0]['name'].'"> '.$scenery[$i][0]['name'].'</a></p>';
//                                echo '<div class="col-sm-12 "><div class="col-sm-2"><a role="button" class="btn btn-default "
//                                     href="javascript:void(0);" onclick="route()">how to reach?</a></div>';
                                echo '<div class="col-sm-12 "><div class="col-sm-2"><a role="button" class="btn btn-primary"
                                     href="javascript:void(0);" onclick="change_scenery('.$i.');" >change</a></div></div>';
                                echo '<h4><strong>Lunch :</strong></h4>';
                                echo '<p style="text-indent:2em;">Go to <a target="_blank" id="restaurant_'.$i.'" href="restaurant_info.php?id='.$restaurant_id[$i].'"> '.$name[$i].'</a>';
                                echo '<input style="display:none;" type="number" id="in_restaurant_'.$i.'" name="'.$k.'restaurant_1" value="'.$restaurant_id[$i].'" >';
//                                echo '<div class="col-sm-12 "><div class="col-sm-2"><a role="button" class="btn btn-default "
//                                     href="javascript:void(0);" onclick="route()">how to reach?</a></div>';
                                echo '<div class="col-sm-12 "><div class="col-sm-2"><a role="button" class="btn btn-primary "
                                     href="javascript:void(0);" onclick="change_restaurant('.$i.');">change</a></div></div>';
                            } else {
                                echo '<h4><strong>Afternoon :</strong></h4>';
                                echo '<input style="display:none;" type="number" id="in_scenery_'.$i.'" name="'.$k.'scenery_2" value="'.$scenery[$i][0]['scenery_id'].'" >';
                                echo '<p style="text-indent:2em;">Go to <a target="_blank" id="scenery_'.$i.'" href="https://www.wikipedia.org/wiki/'.$scenery[$i][0]['name'].'"> '.$scenery[$i][0]['name'].'</a></p>';
//                                echo '<div class="col-sm-12 "><div class="col-sm-2"><a role="button" class="btn btn-default "
//                                     href="javascript:void(0);" onclick="route()">how to reach?</a></div>';
                                echo '<div class="col-sm-12 "><div class="col-sm-2"><a role="button" class="btn btn-primary "
                                     href="javascript:void(0);" onclick="change_scenery('.$i.');">change</a></div></div>';
                                echo '<h4><strong>Dinner :</strong></h4>';
                                echo '<p style="text-indent:2em;">Go to <a target="_blank" id="restaurant_'.$i.'" href="restaurant_info.php?id='.$restaurant_id[$i].'"> '.$name[$i].'</a></p>';
                                echo '<input style="display:none;" type="number" id="in_restaurant_'.$i.'" name="'.$k.'restaurant_2" value="'.$restaurant_id[$i].'" >';
//                                echo '<div class="col-sm-12 "><div class="col-sm-2"><a role="button" class="btn btn-default "
//                                     href="javascript:void(0);" onclick="route()">how to reach?</a></div>';
                                echo '<div class="col-sm-12 "><div class="col-sm-2"><a role="button" class="btn btn-primary "
                                     href="javascript:void(0);" onclick="change_restaurant('.$i.');">change</a></div></div>';
                                echo '<h4><strong>Evening :</strong></h4>';
                                echo '<p style="text-indent:2em;">Go to <a target="_blank" id="hotel_'.$i.'" href="'.$hotel[$i][0]['website'].'"> '.$hotel[$i][0]['name'].'</a></p>';
                                echo '<input style="display:none;" type="number" id="in_hotel_'.$i.'" name="'.$k.'hotel" value="'.$hotel[$i][0]['place_id'].'" >';
//                                echo '<div class="col-sm-12 "><div class="col-sm-2"><a role="button" class="btn btn-default "
//                                     href="javascript:void(0);" onclick="route()">how to reach?</a></div>';
                                echo '<div class="col-sm-12 "><div class="col-sm-2"><a role="button" class="btn btn-primary "
                                     href="javascript:void(0);" onclick="change_hotel('.$i.');">change</a></div></div>';
                                echo '</div>';
                                echo '</div>';
                                echo '</div>';
                            }
                        }
                        if($i%2!=0){
                            echo '</div>';
                            echo '</div>';
                            echo '</div>';
                        }
                    ?>
                    <div class="col-sm-12" style="margin-top:40px;">
                        <div class="col-sm-3 col-sm-offset-2">
                            <label for="plan-name">please name this plan : </label>
                        </div>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="plan-name" required>
                        </div>
                    </div>
                    <div class="col-sm-12" style="margin-top:40px;margin-bottom: 40px;">
                        <div class="col-sm-3 col-sm-offset-2">
                            <input type="button" class="btn btn-default btn-block" name="submit" value="cancel" onclick="javascript:window.history.back();"/>
                        </div>
                        <div class="col-sm-3 col-sm-offset-2">
                            <button type="submit" class='btn btn-success btn-block'>save this plan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="change" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-body" id="info-body">
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Return</button>
</div>
</div>
</div>
</div>


<script type="text/javascript">
    var all_scenery = <?php echo json_encode($scenery); ?>;
    var all_hotel = <?php echo json_encode($hotel); ?>;
    var slen_arr = <?php echo json_encode($s_len); ?>;
    var hlen_arr = <?php echo json_encode($h_len); ?>;
    var all_res_id = <?php echo json_encode($restaurant_id); ?>;
    var all_res_name = <?php echo json_encode($name); ?>;

    function change_scenery(id){
        var candidate_scenery = all_scenery[id];
        var len = slen_arr[id];
        var html = '<div class="panel panel-default">' +
            '<div class="panel-heading">Change Scenery</div>' +
            '<div class="panel-body">';
        for(var i=0;i<len;i++){
            html += '<label><input name="s_option'+id+'" type="radio" value="'+i+'" /> <a target="_blank" href="https://www.wikipedia.org/wiki/'+candidate_scenery[i]['name']+'">'+candidate_scenery[i]['name']+'</a></label> <br>';
        }
        html += '<button type="button" id="s_change" onclick="s_confirm('+id+')" class="btn btn-primary btn-sm">Confirm</button>';
        html += '</div></div>';
        $('#info-body').empty().html(html);
        $('#change').modal('show');
    }

    function change_restaurant(id){
        var len = <?php echo $len;?>;
        var html = '<div class="panel panel-default">' +
            '<div class="panel-heading">Change Restaurant</div>' +
            '<div class="panel-body">';
        for(var i=0;i<len;i++){
            html += '<label><input name="r_option'+id+'" type="radio" value="'+i+'" /> <a target="_blank" href="restaurant_info.php?id='+all_res_id[i]+'">'+all_res_name[i]+'</a></label><br>';
        }

        html += '<button type="button" id="r_change" onclick="r_confirm('+id+')" class="btn btn-primary btn-sm">Confirm</button>';
        html += '</div></div>';
        $('#info-body').empty().html(html);
        $('#change').modal('show');
    }
    function change_hotel(id){
        var candidate_hotel = all_hotel[id];
        var len = hlen_arr[id];
        var html = '<div class="panel panel-default">' +
            '<div class="panel-heading">Change Hotel</div>' +
            '<div class="panel-body">';
        for(var i=0;i<len;i++){
            html += '<label><input name="h_option'+id+'" type="radio" value="'+i+'" /> <a target="_blank" href="'+candidate_hotel[i]['website']+'">'+candidate_hotel[i]['name']+'</a></label> <br>';
        }
        html += '<button type="button" id="h_change" onclick="h_confirm('+id+')" class="btn btn-primary btn-sm">Confirm</button>';
        html += '</div></div>';
        $('#info-body').empty().html(html);
        $('#change').modal('show');
    }

    function s_confirm(id){
        var options = document.getElementsByName("s_option"+id);
        for(var k=0;k<options.length;k++){
            if(options[k].checked){
                var scenery = options[k].value;
            }
        }
        var obj = document.getElementById("scenery_"+id);
        //alert(obj);
        obj.innerHTML = all_scenery[id][scenery]['name'];
        obj.setAttribute("href","https://www.wikipedia.org/wiki/"+all_scenery[id][scenery]['name']);
        var input = document.getElementById("in_scenery_"+id);
        input.setAttribute("value",all_scenery[id][scenery]['scenery_id']);
        $('#change').modal('hide');
    }
    function r_confirm(id){
        var options = document.getElementsByName("r_option"+id);
        for(var k=0;k<options.length;k++){
            if(options[k].checked){
                var res = options[k].value;
            }
        }
        var obj = document.getElementById("restaurant_"+id);
        //alert(obj);
        obj.innerHTML = all_res_name[res];
        obj.setAttribute("href","restaurant_info.php?id="+all_res_id[res]);
        var input = document.getElementById("in_restaurant_"+id);
        input.setAttribute("value",all_res_id[res]);
        $('#change').modal('hide');
    }
    function h_confirm(id){
        var options = document.getElementsByName("h_option"+id);
        for(var k=0;k<options.length;k++){
            if(options[k].checked){
                var hotel = options[k].value;
            }
        }
        var obj = document.getElementById("hotel_"+id);
        //alert(obj);
        obj.innerHTML = all_hotel[id][hotel]['name'];
        obj.setAttribute("href",all_hotel[id][hotel]['website']);
        var input = document.getElementById("in_hotel_"+id);
        input.setAttribute("value",all_hotel[id][hotel]['place_id']);
        $('#change').modal('hide');
    }
</script>

