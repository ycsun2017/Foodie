<?php include("common/head.html"); ?>
<title>Comment Plan</title>
<?php include("common/header.html"); ?>
<?php include("common/nav.php"); ?>
<?php
require_once("../functions.php");

if(isset($_GET['id'])){
    $plan_id = $_GET['id'];
    if(!connectDb()){
        die('Could not connect tourism: ' . mysql_error());
    }
    $user_id = get_user_id();
    $query = "SELECT * FROM plan WHERE user_id ='{$user_id}' AND plan_id = '{$plan_id}'";
    $result = mysql_query($query);
    $row = mysql_fetch_array($result);
    $name = $row['name'];
    $days = $row['days'];

    $query2 = "SELECT * FROM plan_comment WHERE plan_id = '{$plan_id}'";
    $result2 = mysql_query($query2);
    $row2 = mysql_fetch_array($result2);
    if($row2) {
        $content = $row2['content'];
    }
}
if(isset($_POST['content']) && isset($_POST['plan-id'])){
    $plan_id = $_POST['plan-id'];
    $content =  $_POST['content'];
    if(!connectDb()){
        die('Could not connect tourism: ' . mysql_error());
    }
    if(comment($plan_id,$content)){
        echo "<script type=\"text/javascript\">";
        echo "alert(\"Successfully commented!\");";
        echo "location.href='myPlan.php';";
        echo "</script>";
    } else {
        echo "<script type=\"text/javascript\">";
        echo "alert(\"Failed to comment, please try again!\")";
        echo "</script>";
    }
}
function comment($plan_id,$content){
    $query = "SELECT * FROM plan_comment WHERE plan_id = '{$plan_id}'";
    $query2 = "UPDATE plan_comment SET content = '{$content}' WHERE plan_id ='{$plan_id}'";
    $query3 = "INSERT INTO plan_comment (plan_id, content)
                   VALUES ('{$plan_id}', '{$content}')";
    $result = mysql_query($query);
    $row=mysql_fetch_assoc($result);
    if($row){
        $result2 = mysql_query($query2);
        if($result2)
            return true;
        else
            return false;
    } else {
        $result3 = mysql_query($query3);
        if($result3)
            return true;
        else
            return false;
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
        <h1 style="font-size:35px;font-family:Arial">Comment Plan
        </h1>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
            <input style="display: none;" name="plan-id" value="<?php echo $plan_id;?>">
            <div class="col-sm-12">
                <div class="col-sm-12">
                    <label class="col-sm-2 control-label">Plan name : </label>
                    <div class="col-sm-10">
                        <?php echo $name; ?>
                    </div>
                </div>
                <div class="col-sm-12">
                    <label class="col-sm-2 control-label">Days : </label>
                    <div class="col-sm-10">
                        <?php echo $days; ?>
                    </div>
                </div>
                <div class="form-group col-sm-12">
                    <label class="col-sm-2 control-label">Comment : </label>
                    <div class="col-sm-6">
                        <textarea class="form-control" rows="5" id="content" name="content"><?php echo $content;?></textarea>
                    </div>
                </div>
            </div>

            <div class="form-group col-sm-12">
                <div class="col-sm-2 col-sm-offset-2">
                    <button  class="btn btn-default btn-block" onclick="javascript:window.history.back();">Return</button>
                </div>
                <div class="col-sm-2 col-sm-offset-1">
                    <button type="submit" class="btn btn-primary btn-block">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>