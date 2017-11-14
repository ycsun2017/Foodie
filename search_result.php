<?php include("common/head.html"); ?>
    <title>Search</title>
<?php include("common/header.html"); ?>
<?php
require_once("functions.php");
if(!connectDb()){
    die('Could not connect tourism: ' . mysql_error());
}
//get city id
//if ( !isset( $_GET['city']) ) {
//    header("Location:index.php");
//    exit();
//}
if ( isset( $_GET['city']) ) {
    $query = "SELECT * FROM restaurant WHERE city_id={$_GET['city']}";
    if(isset($_GET['type']) && $_GET['type']!="default"){
        $query .= " AND tag LIKE '%{$_GET['type']}%'";
    }
    if(isset($_GET['price']) && $_GET['price']!="default"){
        $query .= " AND price_up = {$_GET['price']}";
    }
    if(isset($_GET['other']) && $_GET['other']!=""){
        $query .= " AND (name LIKE '%{$_GET['other']}%' OR description LIKE '%{$_GET['other']}%' OR address LIKE '%{$_GET['other']}%' OR tag LIKE '%{$_GET['other']}%')";
    }
    //echo $query;
    $result = mysql_query($query);
    $i = 0;
    $len = mysql_num_rows($result);
    while($row=mysql_fetch_assoc($result))
    {
        //print_r($row);
        $restaurant_id[$i] = $row['place_id'];
        $name[$i] = $row['name'];
        $l_price[$i] = $row['price_up'];
        $h_price[$i] = $row['price_down'];
        $like[$i] = $row['like_num'];
        $address[$i++] = $row['address'];
    }
    //sort method
    if(isset($_POST['price-sort']) && isset($_POST['like-sort'])){
        $query = "SELECT * FROM restaurant WHERE city_id={$_GET['city']}";
        if(isset($_POST['type']) && $_POST['type']!="default"){
            $query .= " AND tag LIKE '%{$_POST['type']}%'";
        }
        if(isset($_POST['price']) && $_POST['price']!="default"){
            $query .= " AND price_up = {$_POST['price']}";
        }
        if(isset($_POST['other']) && $_POST['other']!=""){
            $query .= " AND (name LIKE '%{$_POST['other']}%' OR description LIKE '%{$_POST['other']}%' OR address LIKE '%{$_POST['other']}%' OR tag LIKE '%{$_POST['other']}%')";
        }
        if($_POST['price-sort']!="default" &&  $_POST['like-sort']!="default"){
            $query .= " ORDER BY price_up {$_POST['price-sort']}, like_num {$_POST['like-sort']}";
        } else if ($_POST['price-sort']!="default"){
            $query .= " ORDER BY price_up {$_POST['price-sort']}";
        } else if($_POST['like-sort']!="default"){
            $query .= " ORDER BY like_num {$_POST['like-sort']}";
        }
        $result = mysql_query($query);
        $i = 0;
        $len = mysql_num_rows($result);
        while($row=mysql_fetch_assoc($result))
        {
            //print_r($row);
            $restaurant_id[$i] = $row['place_id'];
            $name[$i] = $row['name'];
            $l_price[$i] = $row['price_up'];
            $h_price[$i] = $row['price_down'];
            $like[$i] = $row['like_num'];
            $address[$i++] = $row['address'];
        }
    }
}


?>
<div class="header">
    <div class="container">
        <div class="header-main">
            <div class="logo">
                <h1><a>Search Result</a></h1>
            </div>
        </div>
    </div>
</div>

<?php include("common/navbar.php"); ?>

<div class="container-fluid">
    <div class= "row" style ="margin-top :40px;">
        <div class="col-xs-10 col-sm-8 col-md-8 col-xs-offset-1 col-sm-offset-2 col-md-offset-2">
            <div class="col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-heading" align="center">
                        Restaurants in Hong Kong
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])."?city=".$_GET['city'];?>" method="post">
                            <div class="col-sm-12">
                                <div class="col-sm-4">
                                    <label style="vertical-align: middle">Type:</label>
                                    <select name="type" class="selectpicker">
                                        <?php
                                        if($_GET['type']=="default" || $_POST['type']=="default")
                                            echo '<option value="default" selected>please select</option >';
                                        else
                                            echo '<option value="default">please select</option >';
                                        if($_GET['type']=="sea" || $_POST['type']=="sea")
                                            echo '<option value="sea" selected>Seafood</option >';
                                        else
                                            echo '<option value="sea">Seafood</option >';
                                        if($_GET['type']=="cafe" || $_POST['type']=="cafe")
                                            echo '<option value="cafe" selected>Cafe/Beverage</option >';
                                        else
                                            echo '<option value="cafe">Cafe/Beverage</option >';
                                        if($_GET['type']=="dessert" || $_POST['type']=="dessert")
                                            echo '<option value="dessert" selected>Dessert</option >';
                                        else
                                            echo '<option value="dessert">Dessert</option >';
                                        if($_GET['type']=="fast_food" || $_POST['type']=="fast_food")
                                            echo '<option value="fast_food" selected>Fast Food</option >';
                                        else
                                            echo '<option value="fast_food">Fast Food</option >';
                                        if($_GET['type']=="bbq" || $_POST['type']=="bbq")
                                            echo '<option value="bbq" selected>BBQ</option >';
                                        else
                                            echo '<option value="bbq">BBQ</option >';
                                        if($_GET['type']=="sushi" || $_POST['type']=="sushi")
                                            echo '<option value="sushi">Sushi</option >';
                                        else
                                            echo '<option value="sushi">Sushi</option >';
                                        ?>
                                    </select>
                                </div>
                                <div class="col-sm-4">
                                    <label style="vertical-align: middle">Price range:</label>
                                    <select name="price" class="selectpicker">
                                        <?php
                                        if($_GET['price']=="default" || $_POST['price']=="default")
                                            echo '<option value="default" selected>please select</option >';
                                        else
                                            echo '<option value="default">please select</option >';
                                        if($_GET['price']=="1" || $_POST['price']=="1")
                                            echo '<option value="1" selected>1~50</option >';
                                        else
                                            echo '<option value="1">1~50</option >';
                                        if($_GET['price']=="51" || $_POST['price']=="51")
                                            echo '<option value="51" selected>51~100</option >';
                                        else
                                            echo '<option value="51">51~100</option >';
                                        if($_GET['price']=="101" || $_POST['price']=="101")
                                            echo '<option value="101" selected>101~200</option >';
                                        else
                                            echo '<option value="101">101~200</option >';
                                        if($_GET['price']=="201" || $_POST['price']=="201")
                                            echo '<option value="201" selected>201~400</option >';
                                        else
                                            echo '<option value="201">201~400</option >';
                                        if($_GET['price']=="401" || $_POST['price']=="401")
                                            echo '<option value="401" selected>401~800</option >';
                                        else
                                            echo '<option value="401">401~800</option >';
                                        ?>
                                    </select>
                                </div>
                                <div class="col-sm-4">
                                    <label style="vertical-align: middle">Other requirements:</label>
                                    <input type="text" name="other" placeholder="Key words like landmark or dishes"
                                           class="form-control" id="form-other"  value="<?php echo $_GET['other']!=""?$_GET['other']:$_POST['other'];?>">
                                </div>

                            </div>
                            <div class="col-sm-12">
                                <br>
                            </div>
                            <div class="col-sm-12">
                                <div class="col-sm-2">
                                    <label style="vertical-align: middle; float: right;">Sort by:</label>
                                </div>
                                <div class="col-sm-4">
                                    <select name="price-sort" class="selectpicker">
                                        <?php
                                        if($_POST['price-sort']=="default")
                                            echo '<option value="default" selected>price</option >';
                                        else
                                            echo '<option value="default">price</option >';
                                        if($_POST['price-sort']=="DESC")
                                            echo '<option value="DESC" selected>High to Low</option >';
                                        else
                                            echo '<option value="DESC">High to Low</option >';
                                        if($_POST['price-sort']=="ASC")
                                            echo '<option value="ASC" selected>Low to High</option >';
                                        else
                                            echo '<option value="ASC">Low to High</option >';
                                        ?>
                                    </select>
                                </div>
                                <div class="col-sm-4">
                                    <select name="like-sort" class="selectpicker">
                                        <?php
                                        if($_POST['like-sort']=="default")
                                            echo '<option value="default" selected>like</option >';
                                        else
                                            echo '<option value="default">like</option >';
                                        if($_POST['like-sort']=="DESC")
                                            echo '<option value="DESC" selected>More to Less</option >';
                                        else
                                            echo '<option value="DESC">More to Less</option >';
                                        if($_POST['like-sort']=="ASC")
                                            echo '<option value="ASC" selected>Less to More</option >';
                                        else
                                            echo '<option value="ASC">Less to More</option >';
                                        ?>
                                    </select>
                                </div>
                                <div class="col-sm-2">
                                    <button type="submit" class="btn btn-primary">Confirm</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <form class="form-horizontal" action="planning_controller.php" method="post">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>
                            image
                        </th>
                        <th>
                            name
                        </th>
                        <th>
                            price
                        </th>
                        <th>
                            like
                        </th>
                        <th>
                            address
                        </th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    for ($i=0;$i<$len;$i++){
                        if(file_exists("images/restaurant/".$restaurant_id[$i].".jpg")){
                            echo "<tr><td style='width: 20%;'><img style='width: 100%;max-height: 100px;' src=\"images/restaurant/".$restaurant_id[$i].".jpg\"  alt=\"image\" />";
                        } else {
                            echo "<tr><td style='width: 20%;'><img style='width: 100%;max-height: 100px;' src=\"images/restaurant/default.jpg\"  alt=\"image\" />";
                        }

                        echo "</td><td>".$name[$i];
                        echo "</td><td style='width: 15%;'>HKD $".$l_price[$i]."~".$h_price[$i];
                        echo "</td><td>".$like[$i];
                        echo "</td><td style=\"width:30%;\">".$address[$i];
                        echo "</td><td><a role='button' class='btn btn-primary btn-xl'
                                 href='restaurant_info.php?id=".$restaurant_id[$i]."'>view</a>";
                        echo "</td><td><a role='button' class='btn btn-danger btn-xl'
                                 href='wishlist_controller.php?add=".$restaurant_id[$i]."'>add to wish list</a></td></tr>";

                    }
                    ?>
                    </tbody>
                </table>
        </div>
    </div>
</div>


<!--//href='javascript:void(0);' onclick='add_wishlist(".$restaurant_id[$i].")'>add to wish list</a></td></tr>";-->

<script type="text/javascript">
    function add_wishlist(restaurant_id){
        //var url = "wishlist_controller.php";
        var data = [];
        data['add'] = restaurant_id;
        $.ajax({
            url:'wishlist_controller.php',
            type:"POST",
            data:data,
            success: function(data) {
                alert(data);
            }
        });
    }
</script>