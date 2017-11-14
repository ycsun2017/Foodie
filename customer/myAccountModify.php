<?php include("common/head.html"); ?>
    <title>Personal Center</title>
<?php include("common/header.html"); ?>
<?php include("common/nav.php"); ?>
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
font-size:18px;
font-family:Arial light;
color: #888;
text-shadow: 1px 1px 1px #FFF;
border:0px solid #E4E4E4;
}
.basic-grey h1 {
font-size: 25px;
padding: 0px 0px 10px 40px;
display: block;
border-bottom:1px solid #E4E4E4;
margin: -10px -15px 30px -10px;;
color: #888;
}
.basic-grey h1>span {
display: block;
font-size: 11px;
}
.basic-grey label {
display: block;
margin: 0px;
}
.basic-grey label>span {
float: left;
width: 20%;
text-align: right;
padding-right: 10px;
margin-top: 10px;
color: #888;
}
.basic-grey input[type="text"], .basic-grey input[type="email"], .basic-grey input[type="number"], .basic-grey select {
border: 1px solid #DADADA;
color: #888;
height: 30px;
margin-bottom: 16px;
margin-right: 6px;
margin-top: 2px;
outline: 0 none;
padding: 3px 3px 3px 5px;
width: 40%;
font-size: 12px;
line-height:15px;
box-shadow: inset 0px 1px 4px #ECECEC;
-moz-box-shadow: inset 0px 1px 4px #ECECEC;
-webkit-box-shadow: inset 0px 1px 4px #ECECEC;
}
.basic-grey textarea{
padding: 5px 3px 3px 5px;
}
.basic-grey select {
background: #FFF url('down-arrow.png') no-repeat right;
background: #FFF url('down-arrow.png') no-repeat right);
appearance:none;
-webkit-appearance:none;
-moz-appearance: none;
text-indent: 0.01px;
text-overflow: '';
width: 40%;
height: 35px;
line-height: 25px;
}
.basic-grey textarea{
height:100px;
}
.basic-grey .button {
background: #5f9ea0;
border: none;
padding: 10px 25px 10px 25px;
color: #FFF;
box-shadow: 1px 1px 5px #B6B6B6;
border-radius: 3px;
text-shadow: 1px 1px 1px #9E3F3F;
cursor: pointer;
}
.basic-grey .button:hover {
background: #008080
}
</style>

<div id="page-wrapper">
<form action="save.php" method="post" class="basic-grey">
<h1 style="font-size:30px;font-family:Arial">Personal Infomation
</h1>
<br/>
<label>
<span>Username :</span>
<input id="username" type="text" name="username" placeholder="Username"/>
</label>
<label>
<span>Full Name :</span>
<input id="fullname" type="text" name="fullname" placeholder="Your Full Name" />
</label>
<label>
<span>Birthday :</span>
<!--<input type="number" min="1" max="150" id="age" name="age" placeholder="Your Age"/>-->
    <input type="text" name="birthday" id="birthday" />
</label>
<label>
<span>Phone :</span>
<input id="phone" type="text" maxlength="20" name="phone" placeholder="Your Phone Number" />

</label>
<label>
<br/>
<span>&nbsp;</span>
<input type="submit" class="button" value="Save" />
</label>
</form>

</div>
<link rel="stylesheet" type="text/css" href="../datepicker/css/jquery-ui.css" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script type="text/javascript" src="../datepicker/js/jquery-ui-datepicker.js"></script>
<script type="text/javascript">
    window.onload = function(){
        $("#birthday").datepicker({
            minDate: '-120y',
            maxDate: 0
        });
    };
var info=<?php require_once("../functions.php");
if(!connectDb()){
die('Could not connect tourism: ' . mysql_error());
}
$user=$_SESSION['user_name'];
$sql="select email,username,fullname,birthday,phone_number from user where username='".$user."'";
$res=mysql_query($sql) or die(mysql_error());
$info=mysql_fetch_array($res);
if($info[2]=="")$info[2]="Unknown";
if($info[3]=="")$info[3]="Unknown";
if($info[4]==0)$info[4]="Unknown";
$arr=array(
	'email'=>$info[0],
	'username'=>$info[1],
	'fullname'=>$info[2],
	'birthday'=>$info[3],
	'phonenumber'=>$info[4]
);
echo json_encode($arr);
?>;
if(info.username!="Unknown")$('#username').val(info.username);
if(info.fullname!="Unknown")$('#fullname').val(info.fullname);
if(info.birthday!="Unknown")$('#birthday').val(info.birthday);
if(info.phonenumber!="Unknown")$('#phone').val(info.phonenumber);


</script>


<?php include("common/foot.html"); ?>
