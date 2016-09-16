<?php

	header('Access-Control-Allow-Origin: *');
	$sqlconn = mysqli_connect('localhost','root','','db_app') or die(mysqli_error());
	
	$dataquery = mysqli_query($sqlconn, "SELECT * FROM table_users");

	
	$arr = array();
	
	$images = array();
	
	while ($r = mysqli_fetch_assoc($dataquery)) {
		$images[] = $r['picture'];
		
	}
	foreach ($images as $image) {
		echo "<dt><strong>Image:</strong></dt><dd>" . 
     '<img src="data:image/jpeg;base64,'.
      base64_encode($image).
      '" width="290" height="290">' . "</dd>";
	}
	
	$dataquery = mysqli_query($sqlconn, "SELECT * FROM table_users");
	while($r = mysqli_fetch_object($dataquery)){
		array_push($arr, array("id_users" => $r->id_users, "username" => $r->username, "full_name" => $r->full_name, "about_me" => $r->about_me));
	}
	
	print_r(json_encode($arr));
?>