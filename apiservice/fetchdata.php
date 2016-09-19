<?php

	header('Access-Control-Allow-Origin: *');
	$sqlconn = mysqli_connect('localhost','root','','db_app') or die(mysqli_error());
	
	$dataquery = mysqli_query($sqlconn, "SELECT * FROM table_users");

	
	$arr = array();
	
	$dataquery = mysqli_query($sqlconn, "SELECT * FROM table_users");
	
	while($r = $dataquery->fetch_assoc()){
		$arr[] = $r;                                                           
	}
	
	foreach($arr as $key=>$value){
		$newArrData[$key] =  $arr[$key];
		$newArrData[$key]['picture'] = base64_encode($arr[$key]['picture']);
		
	}
	header('Content-type: application/json');
	echo json_encode($newArrData);
?>
