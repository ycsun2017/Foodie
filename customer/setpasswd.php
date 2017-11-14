<?php 
require_once("../functions.php");
	if(!connectDb()){
die('Could not connect tourism: ' . mysql_error());
}
session_start();
if(isset($_POST['newpw'])){
$user=$_SESSION['user_name'];
$newpw=$_POST['newpw'];
$sql="UPDATE user SET password='".$newpw."' where username='".$user."'";
$res=mysql_query($sql) or die(mysql_error());
echo $res;
}?>