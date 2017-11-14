<?php include("common/head.html"); ?>
<title>Plan List</title>
<?php include("common/header.html"); ?>
<?php
require_once("functions.php");
if(!connectDb()){
    die('Could not connect tourism: ' . mysql_error());
}
$user_id = get_user_id();
$query = "SELECT * FROM plan WHERE user_id ='{$user_id}' AND is_completed = 0";
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
?>

<div class="header">
    <div class="container">
        <div class="header-main">
            <div class="logo">
                <h1><a>Plan List</a></h1>
            </div>
        </div>
    </div>
</div>

<?php include("common/navbar.php"); ?>

<div class="container-fluid">
    <div class= "row" style ="margin-top :40px;">
        <div class="col-xs-10 col-sm-8 col-md-8 col-xs-offset-1 col-sm-offset-2 col-md-offset-2">
            <form class="form-horizontal" action="planning_controller.php" method="post">
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
                                 href='view_plan.php?id=".$plan_id[$i]."'>view</a>";
                        echo "</td><td style='width: 10%;'><a role='button' class='btn btn-danger btn-xl'
                                 href='javascript:void(0);' onclick='delete_plan(".$plan_id[$i].")'>delete from plan list</a>";
                        echo "</td><td style='width: 10%;'><a role='button' class='btn btn-success btn-xl'
                                 href='javascript:void(0);' onclick='complete_plan(".$plan_id[$i].")'>already completed</a></td></tr>";

                    }
                    ?>
                    </tbody>
                </table>
                <hr>
                <div class="col-sm-12" style="margin-bottom: 40px;">
                    <div class="col-sm-3 col-sm-offset-2">
                        <input type="button" class="btn btn-default btn-block" name="submit" value="return" onclick="javascript:window.history.back();"/>
                    </div>
                </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function delete_plan(plan_id){
        var con = confirm("Are you sure to delete?");
        if(con)
            location.href = "plan_controller.php?delete="+plan_id;
    }
    function complete_plan(plan_id){
        var con = confirm("Have you already complete this plan?");
        if(con)
            location.href = "plan_controller.php?complete="+plan_id;
    }
</script>