<?php include("common/head.html"); ?>
    <title>My Comments</title>
<?php include("common/header.html"); ?>
<?php include("common/nav.php"); ?>
<?php
require_once("../functions.php");
if(!connectDb()){
    die('Could not connect tourism: ' . mysql_error());
}
$user_id = get_user_id();
$query = "SELECT * FROM plan P, plan_comment C WHERE P.user_id ='{$user_id}' AND P.plan_id = C.plan_id";
$result = mysql_query($query);
$i = 0;
$len = mysql_num_rows($result);
while($row=mysql_fetch_assoc($result))
{
    $plan_id[$i] = $row['plan_id'];
    $name[$i] = $row['name'];
    $days[$i] = $row['days'];
    $time[$i] = $row['time'];
    $i++;
}

$query2 = "SELECT DISTINCT R.place_id,R.name, R.address FROM plan P, day_plan D, restaurant R WHERE P.user_id ='{$user_id}' AND is_completed=1 AND P.plan_id = D.plan_id AND (R.place_id = D.restaurant_1 OR R.place_id = D.restaurant_2)";
$result2 = mysql_query($query2);
$i = 0;
$len2 = mysql_num_rows($result2);
while($row2=mysql_fetch_assoc($result2))
{
    $restaurant_id[$i] = $row2['place_id'];
    $restaurant_name[$i] = $row2['name'];
    $restaurant_address[$i] = $row2['address'];
    $i++;
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
        <h1 style="font-size:35px;font-family:Arial">My Comments
        </h1>
        <ul id="myTab" class="nav nav-tabs">
            <li class="active">
                <a href="#plan" data-toggle="tab">
                    On Plan
                </a>
            </li>
            <li><a href="#restaurant" data-toggle="tab">On Restaurant</a></li>
        </ul>
        <div id="myTabContent" class="tab-content">
            <div class="col-sm-10 tab-pane fade in active" id="plan">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>
                            name
                        </th>
                        <th>
                            days
                        </th>
                        <th>
                            created time
                        </th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    for ($i=0;$i<$len;$i++){
                        echo "<tr><td>".$name[$i];
                        echo "</td><td>".$days[$i];
                        echo "</td><td>".$time[$i];
                        echo "</td><td style='width: 10%;'><a role='button' class='btn btn-primary btn-xl'
                                 href='commentPlan.php?id=".$plan_id[$i]."'>view/change comment</a>";
                        echo "</td><td style='width: 10%;'><a role='button' class='btn btn-success btn-xl'
                                 href='javascript:void(0);' onclick='share_plan(".$plan_id[$i].")'>share</a></td></tr>";
                    }
                    ?>
                    </tbody>
                </table>
            </div>
            <div class="col-sm-10 tab-pane fade" id="restaurant">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>
                        </th>
                        <th>
                            name
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
                    for ($j=0;$j<$len2;$j++){
                        if(file_exists("../images/restaurant/".$restaurant_id[$j].".jpg")){
                            echo "<tr><td style='width: 20%;'><img style='width: 100%;max-height: 100px;' src=\"../images/restaurant/".$restaurant_id[$j].".jpg\"  alt=\"image\" />";
                        } else {
                            echo "<tr><td style='width: 20%;'><img style='width: 100%;max-height: 100px;' src=\"../images/restaurant/default.jpg\"  alt=\"image\" />";
                        }
                        echo "</td><td>".$restaurant_name[$j];
                        echo "</td><td>".$restaurant_address[$j];
                        echo "</td><td style='width: 10%;'><a role='button' class='btn btn-danger btn-xl'
                                 href='#'>like</a>";
                        echo "</td><td style='width: 10%;'><a role='button' class='btn btn-success btn-xl'
                                 href='javascript:void(0);' onclick='share_plan(".$plan_id[$i].")'>share</a></td></tr>";
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>