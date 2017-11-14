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
width: 25%;
text-align: right;
padding-right: 10px;
margin-top: 10px;
color: #888;
}
.basic-grey input[type="password"], .basic-grey input[type="email"], .basic-grey input[type="number"], .basic-grey select {
border: 1px solid #DADADA;
color: #888;
height: 30px;
margin-bottom: 16px;
margin-right: 6px;
margin-top: 2px;
outline: 0 none;
padding: 3px 3px 3px 5px;
width: 30%;
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
width: 30%;
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
<div class="basic-grey">
<h1 style="font-size:30px;font-family:Arial">Change Password
</h1>
<br/>
<br/>
<label>
<span>Initial Password :</span>
<input id="initpw" maxlength="50" type="password"/>
</label>
<label>
<span>New Password :</span>
<input id="newpw" maxlength="50" type="password"/>
</label>
<label>
<span>Confirm Password :</span>
<input id="confirmpw" maxlength="50" type="password"/>
</label>
<label>
<br/>
<br/>
<span>&nbsp;</span>
<button class="button" onclick="change()" value="Save">Submit</button>
</label>
</div>
</div>
<script>
function change(){
	var init=$("#initpw").val();
	var newpw=$("#newpw").val();
	var confirmpw=$("#confirmpw").val();
	if(newpw=="")alert("please input new password!");
	else if(confirmpw=="")alert("please confirm new password!");
	else if(newpw!=confirmpw)alert(newpw+confirmpw+"Confirm password must be the same as the new password!");
	else{
	var passwd=<?php require_once("../functions.php");
	if(!connectDb()){
die('Could not connect tourism: ' . mysql_error());
}
$user=$_SESSION['user_name'];
$sql="select password from user where username='".$user."'";
$res=mysql_query($sql) or die(mysql_error());
$info=mysql_fetch_array($res);
echo $info[0];?>;
	if(passwd!=init)alert("password is wrong!");
	else{
		$.post('setpasswd.php',{'newpw':newpw},function(data,status){
		if(data==1)
		{alert("You have successfully changed the password!");
		window.open("index.php","_self");
		}
		else alert("failed");
		});
		
		}
}
}
</script>


<?php include("common/foot.html"); ?>
