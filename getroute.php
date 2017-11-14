<?php include("common/head.html"); ?>
    <title>View Route</title>
<?php include("common/header.html"); ?>

<div class="header">
    <div class="container">
        <div class="header-main">
            <div class="logo">
                <h1><a>View Route</a></h1>
            </div>
        </div>
    </div>
</div>

<?php include("common/navbar.php"); ?>

<div class="container-fluid">
    <div class= "row" style ="margin-top :40px;">
        <div class="col-xs-10 col-sm-8 col-md-8 col-xs-offset-1 col-sm-offset-2 col-md-offset-2">
            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
<?php
$tmp=strpos($_SERVER["REQUEST_URI"],"?")+4;
$flag1=strpos($_SERVER["REQUEST_URI"],",",$tmp)+1;
$flag2=strpos($_SERVER["REQUEST_URI"],",",$flag1)+1;
$flag3=strpos($_SERVER["REQUEST_URI"],",",$flag2)+1;
$lati_o=substr($_SERVER["REQUEST_URI"],$tmp,$flag1-1-$tmp);
$long_o=substr($_SERVER["REQUEST_URI"],$flag1,$flag2-1-$flag1);
$lati_d=substr($_SERVER["REQUEST_URI"],$flag2,$flag3-1-$flag2);
$long_d=substr($_SERVER["REQUEST_URI"],$flag3);
$url='https://maps.googleapis.com/maps/api/directions/json?origin='.$lati_o.','.$long_o.'&destination='.$lati_d.','.$long_d.'&mode=transit&key=AIzaSyCij2F0ehshVOGKmic2k-xm5oTgBXZr7zI';
$html_content=file_get_contents($url); 
$data = json_decode($html_content,TRUE);
//$data=iconv("UTF-8","GB2312//IGNORE",$data);
if($data['status']=='OK'){
        $duration=$data['routes'][0]['legs'][0]['duration'];
        $end_add=$data['routes'][0]['legs'][0]['end_address'];
        $start_add=$data['routes'][0]['legs'][0]['start_address'];
        echo 'total time: '.$duration['text']."<br/><br/>";
        $steps=$data['routes'][0]['legs'][0]['steps'];
        $steplen=count($steps);
        $i=0;
        for($i=0;$i<$steplen;$i++){
			$str='step '.($i+1).': '.$steps[$i]['html_instructions']."<br/>";
			//$str=iconv("UTF-8","GB2312//IGNORE",$str);
            echo $str;
            if($steps[$i]['travel_mode']=='TRANSIT'){
				$str="take ".$steps[$i]['transit_details']['line']['short_name']."<br/>";
				//$str=iconv("UTF-8","GB2312//IGNORE",$str);
                echo $str;
				$str='from '.$steps[$i]['transit_details']['departure_stop']['name'].' to '.$steps[$i]['transit_details']['arrival_stop']['name']."<br/>";
				//$str=iconv("UTF-8","GB2312//IGNORE",$str);
                echo $str;
            }
			if($steps[$i]['distance']){
			echo "distance: ".$steps[$i]['distance']['text']."<br/>";}
            if($steps[$i]['duration']){
			echo "time: ".$steps[$i]['duration']['text']."<br/>";}
		echo "<br/>";}
}
?>
                <div class="col-sm-12" style="margin-bottom: 40px;margin-top: 40px;">
                    <div class="col-sm-3 col-sm-offset-2">
                        <input type="button" class="btn btn-default btn-block" name="submit" value="return" onclick="javascript:window.history.back();"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>