<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/11/11
 * Time: 18:24
 */
require_once("functions.php");
if(!connectDb()){
    die('Could not connect tourism: ' . mysql_error());
}
if ( !isset( $_GET['city']) ) {
    $url = "planning_city.php";
    echo "<script language='javascript' type='text/javascript'>";
    echo "alert('please choose a city first');";
    echo "window.location.href='$url'";
    echo "</script>";
}

$query = "SELECT * FROM scenery WHERE city_id={$_GET['city']}";
$result = mysql_query($query);
$i = 0;
$len = mysql_num_rows($result);
while($row=mysql_fetch_assoc($result))
{
    //print_r($row);
    $scenery_id[$i] = $row['scenery_id'];
    $name[$i] = $row['name'];
    $price[$i] = $row['price'];
    $address[$i++] = $row['address'];
}

?>

<?php include("common/head.html"); ?>
<title>Planning</title>
<?php include("common/header.html"); ?>

<div class="header">
    <div class="container">
        <div class="header-main">
            <div class="logo">
                <h1><a href="index.php">Make a travel plan !</a></h1><hr>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class= "row" style ="margin-top :40px;">
        <div class="col-xs-10 col-sm-8 col-md-8 col-xs-offset-1 col-sm-offset-2 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h3 align="center" class="col-sm-12" >
                        <span style="color:#f8565d;">STEP 2</span> : Please choose several feature spots you want to view: </h3>
                    <form class="form-horizontal" action="planning_controller.php" method="post">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>

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
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            for ($i=0;$i<$len;$i++){
                                echo "<tr><td><input type=\"checkbox\" name=\"scenery[]\" value=".$scenery_id[$i].">";
                                echo "</td><td>".$name[$i];
                                echo "</td><td>".$price[$i];
                                echo "</td><td style=\"width:40%;\">".$address[$i]."</td></tr>";
                            }
                            ?>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <div class="col-sm-3 col-sm-offset-2" style="padding-top: 10px">
                                <button type="button" id="previous" class="btn btn-warning btn-block">Previous</button>
                            </div>
                            <div class="col-sm-3 col-sm-offset-2" style="padding-top: 10px">
                                <button type="submit" class="btn btn-primary btn-block">Confirm</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<!--    <script type="text/javascript">-->
<!---->
<!--        $('#rootwizard').bootstrapWizard({'tabClass': 'bwizard-steps',onTabClick: function(tab, navigation, index) {-->
<!--            return false;-->
<!--        }});-->
<!---->
<!--//        $('#rootwizard').bootstrapWizard('show',1);-->
<!---->
<!--    </script>-->

<?php include("common/foot.html"); ?>
