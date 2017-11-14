<?php include("common/head.html"); ?>
<title>My Restaurant List</title>
<?php include("common/header.html"); ?>
<?php include("common/nav.php"); ?>
<?php
require_once("../functions.php");
if(!connectDb()){
    die('Could not connect tourism: ' . mysql_error());
}
$user_id = get_user_id();
$query = "SELECT * FROM restaurant WHERE merchant ='{$user_id}'";
$result = mysql_query($query);
$i = 0;
$len = mysql_num_rows($result);
while($row=mysql_fetch_assoc($result))
{
    $restaurant_id[$i] = $row['place_id'];
    $name[$i] = $row['name'];
    $l_price[$i] = $row['price_up'];
    $h_price[$i] = $row['price_down'];
    $address[$i++] = $row['address'];
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
        <h1 style="font-size:35px;font-family:Arial">My Restaurant List
        </h1>
        <input id="len" style="display: none;" value="<?php echo $len;?>">
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
                    address
                </th>
                <th></th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <?php
            for ($i=0;$i<$len;$i++){
                //echo "<tr><td style='width: 20%;'><img style='width: 100%;' src=\"../images/restaurant/1.jpg\"  alt=\"image\" />";
                if(file_exists("../images/restaurant/".$restaurant_id[$i].".jpg")){
                    echo "<tr><td style='width: 20%;'><img style='width: 100%;max-height: 100px;' src=\"../images/restaurant/".$restaurant_id[$i].".jpg\"  alt=\"image\" />";
                } else {
                    echo "<tr><td style='width: 20%;'><img style='width: 100%;max-height: 100px;' src=\"../images/restaurant/default.jpg\"  alt=\"image\" />";
                }
                echo "</td><td>".$name[$i];
                echo "</td><td style='width: 15%;'>HDK $".$l_price[$i]."~".$h_price[$i];
                echo "</td><td style=\"width:30%;\">".$address[$i];
                echo "</td><td><a role='button' class='btn btn-primary btn-xl'
                                 href='edit_restaurant.php?id=".$restaurant_id[$i]."'>view/edit</a>";
                echo "</td><td><a role='button' class='btn btn-danger btn-xl'
                                 href='javascript:void(0);' onclick='delete_restaurant(".$restaurant_id[$i].")'>delete from restaurant list</a></td></tr>";

            }
            ?>
            </tbody>
        </table>
        <hr>
        <div class="col-sm-12" style="margin-bottom: 40px;">
            <div class="col-sm-3 col-sm-offset-2">
                <a role="button" class="btn btn-success btn-block" href="add_restaurant.php">add a new restaurant</a>
            </div>
        </div>

    </div>
</div>

<script type="text/javascript">
    function delete_restaurant(restaurant_id){
        var con = confirm("Are you sure to delete?");
        if(con)
            location.href = "restaurant_controller.php?delete="+restaurant_id;
    }

</script>