<?php include("common/head.html"); ?>
<title>My Wish List</title>
<?php include("common/header.html"); ?>
<?php include("common/nav.php"); ?>
<?php
require_once("../functions.php");
if(!connectDb()){
    die('Could not connect tourism: ' . mysql_error());
}
$user_id = get_user_id();
$query = "SELECT * FROM wish_list WHERE user_id ='{$user_id}'";
$result = mysql_query($query);
$i = 0;
$len = mysql_num_rows($result);
while($row=mysql_fetch_assoc($result))
{
    $wish_id[$i] = $row['id'];
    $restaurant_id[$i] = $row['restaurant_id'];
    $query2 = "SELECT * FROM restaurant WHERE place_id ='{$restaurant_id[$i]}'";
    $result2 = mysql_query($query2);
    $restaurant = mysql_fetch_assoc($result2);
    $name[$i] = $restaurant['name'];
    $price[$i] = $restaurant['price'];
    $address[$i++] = $restaurant['address'];
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
        <h1 style="font-size:35px;font-family:Arial">My Wish List
        </h1>
        <input id="len" style="display: none;" value="<?php echo $len;?>">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>
                    <input type='checkbox' id='selectall' onclick="select_all();">
                </th>
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
                echo "<tr><td><input type='checkbox' id='check".$i."' name='wish[]' value=".$wish_id[$i].">";
                if(file_exists("../images/restaurant/".$restaurant_id[$i].".jpg")){
                    echo "<td style='width: 20%;'><img style='width: 100%;max-height: 100px;' src=\"../images/restaurant/".$restaurant_id[$i].".jpg\"  alt=\"image\" />";
                } else {
                    echo "<td style='width: 20%;'><img style='width: 100%;max-height: 100px;' src=\"../images/restaurant/default.jpg\"  alt=\"image\" />";
                }
                echo "</td><td>".$name[$i];
                echo "</td><td style='width: 15%;'>".$price[$i];
                echo "</td><td style=\"width:30%;\">".$address[$i];
                echo "</td><td><a role='button' class='btn btn-primary btn-xl'
                                 href='../restaurant_info.php?id=".$restaurant_id[$i]."'>view</a>";
                echo "</td><td><a role='button' class='btn btn-danger btn-xl'
                                 href='javascript:void(0);' onclick='delete_wishlist(".$restaurant_id[$i].")'>delete from wish list</a></td></tr>";

            }
            ?>
            </tbody>
        </table>
        <hr>
        <div class="col-sm-12" style="margin-bottom: 40px;">
            <div class="col-sm-3 col-sm-offset-2">
                <input type="button" class="btn btn-default btn-block" name="submit" value="return" onclick="javascript:window.history.back();"/>
            </div>
            <div class="col-sm-3 col-sm-offset-2">
                <button type="submit" class="btn btn-success btn-block">create a travel plan</button>
            </div>
        </div>

    </div>
</div>

<script type="text/javascript">
    function delete_wishlist(restaurant_id){
        var con = confirm("Are you sure to delete?");
        if(con)
            location.href = "../wishlist_controller.php?delete="+restaurant_id;
    }
    function select_all(){
        var len = document.getElementById("len");
        for (var i=0;i<len.value;i++){
            var name = 'check'+i;
            var check = document.getElementById(name);
            check.checked = !check.checked;
        }
    }
    function check(form){
        var len = document.getElementById("len");
        for (var i=0;i<len.value;i++){
            var name = 'check'+i;
            var check = document.getElementById(name);
            if(check.checked)
                return true;
        }
        alert("Please select the restaurants you plan to go !");
        return false;
    }
</script>