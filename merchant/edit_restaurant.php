<?php include("common/head.html"); ?>
<title>Edit Restaurant</title>
<?php include("common/header.html"); ?>
<?php include("common/nav.php"); ?>
<?php
require_once("../functions.php");
if(!connectDb()){
    die('Could not connect tourism: ' . mysql_error());
}
if(get_user_status()!=2){
    echo "<script type=\"text/javascript\">";
    echo "window.history.back();;";
    echo "</script>";
}
$query = "SELECT * FROM city";
$result = mysql_query($query);
$city_name = [];
$i = 0;
$len = mysql_num_rows($result);
while($row=mysql_fetch_assoc($result))
{
    $city_id[$i] = $row['city_id'];
    $city_name[$i++] = $row['name'];
}
if(isset($_GET['id'])){
    $merchant = get_user_id();
    $query2 = "SELECT * FROM restaurant WHERE place_id = '{$_GET['id']}' AND merchant='{$merchant}'";
    $result2 = mysql_query($query2);
    $restaurant = mysql_fetch_assoc($result2);
} else {
    echo "<script type=\"text/javascript\">";
    echo "window.history.back();";
    echo "</script>";
}


if(isset($_POST['name'])){
    //print_r($_POST);
    $name = $_POST['name'];
    $city_id = $_POST['city'];
    $price_up = $_POST['price'];
    if($price_up==1)
        $price_down = 50;
    else
        $price_down = ($price_up-1)*2;
    $address = $_POST['address'];
    $description = $_POST['description'];
    $tag = $_POST['tag'];
    $phone_number = $_POST['phone'];
    $opening_hours = $_POST['opening'];
    $latitude = $_POST['latitude'];
    $longitude = $_POST['longitude'];
    $merchant = get_user_id();

    if(!connectDb()){
        die('Could not connect tourism: ' . mysql_error());
    }
    $query = "UPDATE restaurant SET name='{$name}', price_up= '{$price_up}', price_down='{$price_down}', address='{$address}', description= '{$description}',
              city_id='{$city_id}', tag= '{$tag}', phone_number= '{$phone_number}', opening_hours= '{$opening_hours}', latitude= '{$latitude}', longitude= '{$longitude}', merchant='{$merchant}'
                   WHERE place_id = '{$_GET['id']}'";

    if(mysql_query($query)){
        echo "<script type=\"text/javascript\">";
        echo "alert(\"Successfully added to restaurant list!\");";
        echo "window.history.back();";
        echo "</script>";
    } else {
        echo "<script type=\"text/javascript\">";
        echo "alert(\"Failed to add, please try again!\");";
        echo "</script>";
    }
}

?>
<style type="text/css">
    .alert h4{
        font-weight: 100;
    }
    .basic-grey {
        margin-top:-30px;
        margin-left:auto;
        margin-right:auto;
        max-width: 1000px;
        background: #fff;
        padding: 25px 15px 25px 10px;
        font: 20px,"Arial";
        color: #888;
        border:0px solid #E4E4E4;
    }
    .basic-grey h1 {
        font-size: 35px;
        padding: 0px 0px 10px 40px;
        display: block;
        border-bottom:1px solid #E4E4E4;
        margin: -10px -15px 30px -10px;;
        color: #888;
    }
</style>

<div id="page-wrapper">
    <div class="basic-grey">
        <h1 style="font-size:35px;font-family:Arial">Edit Restaurant
        </h1>
        <div class="row">
            <div class="col-xs-10 col-sm-8 col-md-8">
                <form class="form-horizontal" id="info-info-panel" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])."?id=".$_GET['id'];?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="info-info-name" class="col-sm-4 control-label">Restaurant Name*</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="name" id="info-name" value="<?php echo $restaurant['name'];?>" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="info-info-name" class="col-sm-4 control-label">City*</label>
                        <div class="col-sm-8">
                            <select name="city" class="selectpicker">
                                <?php
                                for ($i=0;$i<$len;$i++){
                                    if($restaurant['city_id']==$city_id[$i]){
                                        echo $city_id[$i];
                                        echo "<option value=".$city_id[$i]." selected>".$city_name[$i]."</option >";
                                    }
                                    else
                                        echo "<option value=".$city_id[$i].">".$city_name[$i]."</option >";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="info-info-name" class="col-sm-4 control-label">Price Range*</label>
                        <div class="col-sm-8">
                            <select name="price" class="selectpicker">
                                <?php
                                if($restaurant['price_up']=="1")
                                    echo '<option value="1" selected>1~50</option >';
                                else
                                    echo '<option value="1">1~50</option >';
                                if($restaurant['price_up']=="51")
                                    echo '<option value="51" selected>51~100</option >';
                                else
                                    echo '<option value="51">51~100</option >';
                                if($restaurant['price_up']=="101")
                                    echo '<option value="101" selected>101~200</option >';
                                else
                                    echo '<option value="101">101~200</option >';
                                if($restaurant['price_up']=="201")
                                    echo '<option value="201" selected>201~400</option >';
                                else
                                    echo '<option value="201">201~400</option >';
                                if($restaurant['price_up']=="401")
                                    echo '<option value="401" selected>401~800</option >';
                                else
                                    echo '<option value="401">401~800</option >';
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="info-info-name" class="col-sm-4 control-label">Address*</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="address" id="info-address" value="<?php echo $restaurant['address'];?>" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="info-info-name" class="col-sm-4 control-label">Description</label>
                        <div class="col-sm-8">
                            <textarea  class="form-control" rows="4" name="description" id="info-description" ><?php echo $restaurant['description'];?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="info-info-name" class="col-sm-4 control-label">Tag</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="tag" id="info-tag" value="<?php echo $restaurant['tag'];?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="info-info-name" class="col-sm-4 control-label">Phone Number</label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control" name="phone" id="info-phone" value="<?php echo $restaurant['phone_number'];?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="info-info-name" class="col-sm-4 control-label">Opening Hours</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="opening" id="info-opening" value="<?php echo $restaurant['opening_hours'];?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="info-info-name" class="col-sm-4 control-label">Latitude*</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="latitude" id="info-latitude"  value="<?php echo $restaurant['latitude'];?>" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="info-info-name" class="col-sm-4 control-label">Longitude*</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="longitude" id="info-longitude" value="<?php echo $restaurant['longitude'];?>" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-4 col-sm-3">
                            <button type="submit" class="btn btn-primary btn-block" id="submit">submit</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
