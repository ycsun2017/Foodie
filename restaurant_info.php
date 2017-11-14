<?php include("common/head.html"); ?>
    <title>View</title>
<?php include("common/header.html"); ?>

<?php
require_once("functions.php");
if(!connectDb()){
    die('Could not connect tourism: ' . mysql_error());
}
if ( !isset( $_GET['id']) ) {
    header("Location:index.php");
    exit();
}
else {
    $query = "SELECT * FROM restaurant WHERE place_id={$_GET['id']}";
    $result = mysql_query($query);
    $i = 0;
    $len = mysql_num_rows($result);
    if($len<=0){
        echo '<script type="text/javascript">'."\n";
        echo 'alert("Could not find this restaurant !");';
        echo 'window.location.href = "index.php"';
        echo '</script>'."\n";
    }
    while($row=mysql_fetch_assoc($result))
    {
        //print_r($row);
        $restaurant_id[$i] = $row['place_id'];
        $name[$i] = $row['name'];
        $l_price[$i] = $row['price_up'];
        $h_price[$i] = $row['price_down'];
        $address[$i] = $row['address'];
        $description[$i] = $row['description'];
        $tag[$i] = $row['tag'];
        $like_num[$i] = $row['like_num'];
        $phone[$i] = $row['phone_number'];
        $opening_hours[$i] = $row['Opening Hours'];
        $i++;
    }
}
?>

<div class="header">
    <div class="container">
        <div class="header-main">
            <div class="logo">
                <h1><a>View details</a></h1>
            </div>
        </div>
    </div>
</div>

<?php include("common/navbar.php"); ?>

<div class="container">
    <div class="col-sm-10 col-sm-offset-1" style="margin-top: 40px;margin-bottom: 40px;">
        <div class="col-sm-12" style="margin-bottom: 40px;">
            <?php echo "<h2 align='center'>".$name[0]."</h2>"?>
        </div>
        <div class="col-sm-6">
            <?php
                if(file_exists("images/restaurant/".$restaurant_id[0].".jpg"))
                    echo '<img style=\'align-content: center;width: 100%;\' src="images/restaurant/'.$restaurant_id[0].'.jpg"  alt="image" >';
                else
                    echo '<img style=\'align-content: center;width: 100%;\' src="images/restaurant/default.jpg"  alt="image" >';
            ?>

        </div>
        <div class="col-sm-6">
            <?php echo "<p><strong>Price</strong> : HKD $".$l_price[0]."~".$h_price[0]."</p><br>"?>
            <?php echo "<p><strong>Address</strong> : ".$address[0]."</p><br>"?>
            <?php echo "<p><strong>Tag</strong> : ".$tag[0]."</p><br>"?>
            <?php echo "<p><strong>Phone</strong> : ".$phone[0]."</p><br>"?>
            <?php echo "<p><strong>Opening hours</strong> : ".$opening_hours[0]."</p><br>"?>
            <?php echo "<p><strong>Like</strong> : ".$like_num[0]."</p><br>"?>
        </div>
        <div class="col-sm-12">
            <?php echo "<p><strong>Description</strong> : ".$description[0]."</p><br>"?>
        </div>
        <div class="col-sm-12">
            <div class="col-sm-2 col-sm-offset-1">
                <input type="button" class="btn btn-default btn-block" name="submit" value="return" onclick="javascript:window.history.back();"/>
            </div>
            <div class="col-sm-3 col-sm-offset-1">
                <input type="button" class="btn btn-danger btn-block" name="submit" value="book it now" onclick="javascript:void(0);"/>
            </div>
            <div class="col-sm-3 col-sm-offset-1">
                <a role='button' class='btn btn-primary btn-block' href='wishlist_controller.php?add=<?php echo $restaurant_id[0];?>'>add to wish list</a>
            </div>
        </div>
    </div>


</div>

<?php include("common/foot.html"); ?>