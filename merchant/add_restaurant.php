<?php include("common/head.html"); ?>
    <title>Add Restaurant</title>
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
    $query = "INSERT INTO restaurant (name, price_up, price_down, address, description, city_id, tag, phone_number, opening_hours, latitude, longitude, merchant)
                   VALUES ('{$name}', '{$price_up}', '{$price_down}','{$address}', '{$description}', '{$city_id}', '{$tag}', '{$phone_number}', '{$opening_hours}', '{$latitude}', '{$longitude}', '{$merchant}')";
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
        <h1 style="font-size:35px;font-family:Arial">Add Restaurant
        </h1>
        <div class="row">
            <div class="col-xs-10 col-sm-8 col-md-8">
                <form class="form-horizontal" id="info-info-panel" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="info-info-name" class="col-sm-4 control-label">Restaurant Name*</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="name" id="info-name"  required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="info-info-name" class="col-sm-4 control-label">City*</label>
                        <div class="col-sm-8">
                            <select name="city" class="selectpicker">
                            <?php
                            for ($i=0;$i<$len;$i++){
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
                                <option value="1">1~50</option >
                                <option value="51">51~100</option >
                                <option value="101">101~200</option >
                                <option value="201">201~400</option >
                                <option value="401">401~800</option >
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="info-info-name" class="col-sm-4 control-label">Address*</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="address" id="info-address"  required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="info-info-name" class="col-sm-4 control-label">Description</label>
                        <div class="col-sm-8">
                            <textarea  class="form-control" rows="4" name="description" id="info-description"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="info-info-name" class="col-sm-4 control-label">Tag</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="tag" id="info-tag">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="info-info-name" class="col-sm-4 control-label">Phone Number</label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control" name="phone" id="info-phone" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="info-info-name" class="col-sm-4 control-label">Opening Hours</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="opening" id="info-opening" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="info-info-name" class="col-sm-4 control-label">Latitude*</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="latitude" id="info-latitude"  required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="info-info-name" class="col-sm-4 control-label">Longitude*</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="longitude" id="info-longitude"  required>
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
