<?php
require_once("../functions.php");
if(!connectDb()){
die('Could not connect tourism: ' . mysql_error());
}
session_start();
if(isset($_POST['username'])){
	print_r($_POST);
	$user=$_SESSION['user_name'];
	$username=$_POST['username'];
	$fullname=$_POST['fullname'];
	if($fullname!=""){
		$sql="UPDATE user SET fullname='".$fullname."' where username='".$user."'";
	$res=mysql_query($sql) or die(mysql_error());
	}
	$birthday=$_POST['birthday'];
	if($birthday!=""){
		$sql="UPDATE user SET birthday='".$birthday."' where username='".$user."'";
	$res=mysql_query($sql) or die(mysql_error());
	}
	$phone=$_POST['phone'];
	if($phone!=""){
		$sql="UPDATE user SET phone_number='".$phone."' where username='".$user."'";
	$res=mysql_query($sql) or die(mysql_error());
	}
	if($username!=""&&$user!=$username){
		$_SESSION['user_name']=$username;
		$sql="UPDATE user SET username='".$username."' where username='".$user."'";
	$res=mysql_query($sql) or die(mysql_error());	
	}
}
header("Location:myAccountDisplay.php");
?>