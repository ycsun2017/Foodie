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
	.tb td,th{
		padding:10px;
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
<h1 style="font-size:35px;font-family:Arial">Notices
</h1>

<table class="tb">
<tr>
	<th>Title</th>
	<th>Time</th>
</tr>
<?php require_once("../functions.php");
if(!connectDb()){
die('Could not connect tourism: ' . mysql_error());
}
$user=$_SESSION['user_name'];
$sql="select title,time,noticeID from notice;";
$res=mysql_query($sql) or die(mysql_error());
while($info=mysql_fetch_array($res)){
echo "<tr><td><a id='".$info[2]."' href='myNoticeDisplay.php?id=".$info[2]."'>".$info[0]."</td>";
echo "<td>".$info[1]."</td>";
echo "</tr>";
}
?>
</table>
</div>
</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<script>
</script>
<?php include("common/foot.html"); ?>
