<?php include("common/head.html"); ?>
    <title>Personal Center</title>
<?php include("common/header.html"); ?>
<?php include("common/nav.php"); ?>

<style type="text/css">
    .alert h4{
        font-weight: 100;
    }
	.tb{
		width:100%;
		align:left;
		font-size:18px;
		font-size:Arial light;
	}
	.tb td{
		padding:15px;
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
text-shadow: 1px 1px 1px #FFF;
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
<div class="basic-grey">
<h1 style="font-size:35px;font-family:Arial">Personal Infomation
</h1>
<br/>
<table class="tb">
<tr>
	<td><label><i class="fa fa-user fa-fw"></i>
	<span><span>&nbsp;</span>Username :</span>
		<span id="username" ></span></label>
	</td>
	<td>
	<label><i class="fa fa-envelope fa-fw"></i>
<span><span>&nbsp;</span>Email :</span>
<span id="email" ></span>
</label>
	</td>
</tr>
<tr>
	<td>
	<label><i class="fa fa-user fa-fw"></i>
<span><span>&nbsp;</span>Full Name :</span>
<span id="fullname" ></span>
</label>
	</td>
	<td>
	<label><i class="fa fa-calendar fa-fw"></i>
<span><span>&nbsp;</span>Birthday :</span>
<span id="birthday" ></span>
</label>
	</td>
</tr>
<tr>
	<td>
	<label><i class="fa fa-phone fa-fw"></i>
<span><span>&nbsp;</span>Phone :</span>
<span id="phone" ></span>
</label>
	</td>
	<td></td>
</tr>
<tr>
	<td style="padding-left:5%">
<label>
<br/>
<button class="button" onclick="editInfo()">edit <i style="margin-right:-10px"class="fa fa-pencil fa-fw"></i></button>
</label>
	</td>
	<td style="padding-left:5%">
<label>
<br/>
<button class="button" onclick="window.open('changepswd.php','_self')">change password <i style="margin-right:-10px"class="fa fa-pencil fa-fw"></i></button>
</label>
	</td>
</tr>
	</table>
</div>
</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<script>
function editInfo(){
	 window.open('myAccountModify.php','_self')
}
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
$('#username').text(info.username);
$('#email').text(info.email);
$('#fullname').text(info.fullname);
$('#birthday').text(info.birthday);
$('#phone').text(info.phonenumber);
</script>

<?php include("common/foot.html"); ?>
