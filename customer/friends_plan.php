<?php include("common/head.html"); ?>
<title>Friend's Plans</title>
<?php include("common/header.html"); ?>
<?php include("common/nav.php"); ?>
<?php
require_once("../functions.php");
if(isset($_GET['id'])){
    if(!connectDb()){
        die('Could not connect tourism: ' . mysql_error());
    }
    $user_id = get_user_id();
    $query = "SELECT * FROM following WHERE t_user_id ='{$_GET['id']}' AND s_user_id='{$user_id}'";
    $result = mysql_query($query);
    if(!empty($result)){
        $query1 = "SELECT * FROM plan WHERE user_id ='{$_GET['id']}' AND is_completed = 0";
        $result1 = mysql_query($query1);
        $i = 0;
        $len = mysql_num_rows($result1);
        while($row=mysql_fetch_assoc($result1))
        {
            $plan_id[$i] = $row['plan_id'];
            $name[$i] = $row['name'];
            $days[$i] = $row['days'];
            $time[$i] = $row['time'];
            $i++;
        }
        $query2 = "SELECT * FROM plan WHERE user_id ='{$_GET['id']}' AND is_completed = 1";
        $result2 = mysql_query($query2);
        $i = 0;
        $c_len = mysql_num_rows($result2);
        while($row=mysql_fetch_assoc($result2))
        {
            $c_plan_id[$i] = $row['plan_id'];
            $c_name[$i] = $row['name'];
            $c_days[$i] = $row['days'];
            $c_time[$i] = $row['time'];
            $i++;
        }
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
        <h1 style="font-size:35px;font-family:Arial">Friend's Plans
        </h1>
        <ul id="myTab" class="nav nav-tabs">
            <li class="active">
                <a href="#uncompleted" data-toggle="tab">
                    Uncompleted Plan
                </a>
            </li>
            <li><a href="#completed" data-toggle="tab">Completed Plan</a></li>
        </ul>
        <div id="myTabContent" class="tab-content">
            <div class="col-sm-10 tab-pane fade in active" id="uncompleted">
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
                                 href='../view_plan.php?id=".$plan_id[$i]."'>view</a></td>";
                        echo "</td><td style='width: 10%;'><a role='button' class='btn btn-success btn-xl'
                                 href='../plan_controller.php?copy=".$plan_id[$i]."'>copy</a></td></tr>";
                    }
                    ?>
                    </tbody>
                </table>
            </div>
            <div class="col-sm-10 tab-pane fade" id="completed">
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
                            completed time
                        </th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    for ($i=0;$i<$c_len;$i++){
                        echo "<tr><td>".$c_name[$i];
                        echo "</td><td>".$c_days[$i];
                        echo "</td><td>".$c_time[$i];
                        echo "</td><td style='width: 10%;'><a role='button' class='btn btn-primary btn-xl'
                                 href='../view_plan.php?id=".$c_plan_id[$i]."'>view</a>";
                        echo "</td><td style='width: 10%;'><a role='button' class='btn btn-danger btn-xl'
                                 href='commentPlan.php?id=" .$c_plan_id[$i]."'>comment</a>";
                        echo "</td><td style='width: 10%;'><a role='button' class='btn btn-success btn-xl'
                                 href='javascript:void(0);' onclick='share_plan(".$c_plan_id[$i].")'>share</a></td></tr>";
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function delete_plan(plan_id){
        var con = confirm("Are you sure to delete?");
        if(con)
            location.href = "../plan_controller.php?delete="+plan_id;
    }
    function complete_plan(plan_id){
        var con = confirm("Have you already complete this plan?");
        if(con)
            location.href = "../plan_controller.php?complete="+plan_id;
    }
</script>