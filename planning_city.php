<?php include("common/head.html"); ?>
    <title>Planning</title>
<?php include("common/header.html"); ?>
<?php
require_once("functions.php");
if(!connectDb()){
    die('Could not connect tourism: ' . mysql_error());
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

?>
    <div class="header">
        <div class="container">
            <div class="header-main">
                <div class="logo">
                    <h1><a href="index.php">Make a travel plan !</a></h1><hr>
                </div>
            </div>
        </div>
    </div>
<!--    <div id="rootwizard" class="col-sm-8 col-sm-offset-2">-->
<!--        <ul>-->
<!--            <li><a data-toggle="tab" >STEP 1</a></li>-->
<!--            <li><a data-toggle="tab" >STEP 2</a></li>-->
<!--            <li><a data-toggle="tab" >STEP 3</a></li>-->
<!--        </ul>-->
<!--    </div>-->
    <div class="container-fluid">
    <div class= "row" style ="margin-top :40px;">
        <div class="col-xs-10 col-sm-8 col-md-8 col-xs-offset-1 col-sm-offset-2 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-body">
                <h3 align="center" class="col-sm-12" >
                    <span style="color:#f8565d;">STEP 1</span> : Please choose your destination city: </h3>
                <div class= "form-group col-sm-8 col-sm-offset-3">
                    <form class="form-horizontal" action="planning_controller.php" method="post">
                        <div class= "col-sm-9">
                            <select name="city" class= "form-control selectpicker" required>
                                <?php
                                     for ($i=0;$i<$len;$i++){
                                         echo "<option value=".$city_id[$i].">".$city_name[$i]."</option >";
                                     }
                                ?>
                            </select>
                        </div>
                        <div class= "col-sm-offset-3 col-sm-5"></div><br><br>
                        <div class="form-group">
                            <div class="col-sm-4 col-sm-offset-5" style="padding-top: 10px">
                                <button type="submit" class="btn btn-primary btn-block">Confirm</button>
                            </div>
                        </div>
                    </form>
                </div>
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