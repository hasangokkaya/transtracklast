<?php
//PHP 5 +
// database settings 
$db_username = 'root';
$db_password = '';
$db_name = 'transtrack';
$db_host = 'localhost';
//mysqli
$mysqli = new mysqli($db_host, $db_username, $db_password, $db_name); 
if (mysqli_connect_errno()) 
{
	header('HTTP/1.1 500 Error: Could not connect to db!'); 
	exit();
}
################ Save & delete markers #################
if($_POST) //run only if there's a post data
{
	//make sure request is comming from Ajax
	$xhr = $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest'; 
	if (!$xhr){ 
		header('HTTP/1.1 500 Error: Request must come from Ajax!'); 
		exit();	
	}
	// get marker position and split it for database
	$mLatLang	= explode(',',$_POST["latlang"]);
	$mLat 		= filter_var($mLatLang[0], FILTER_VALIDATE_FLOAT);
	$mLng 		= filter_var($mLatLang[1], FILTER_VALIDATE_FLOAT);
	//Delete Marker
	if(isset($_POST["del"]) && $_POST["del"]==true)
	{
		$results = $mysqli->query("DELETE FROM markers WHERE Lat=$mLat AND Lng=$mLng");
		if (!$results) {  
		  header('HTTP/1.1 500 Error: Could not delete Markers!'); 
		  exit();
		} 
		exit("Done!");
	}	
	$mCarrierName = filter_var($_POST["CarrierName"], FILTER_SANITIZE_STRING);
	$mCarrierType = filter_var($_POST["CarrierType"], FILTER_SANITIZE_STRING);
	$mCaptain = filter_var($_POST["Captain"], FILTER_SANITIZE_STRING);
	$mFleet = filter_var($_POST["Fleet"], FILTER_SANITIZE_STRING);
	$mLocation = filter_var($_POST["Location"], FILTER_SANITIZE_STRING);
	$mNationality = filter_var($_POST["Nationality"], FILTER_SANITIZE_STRING);
	$mFactory = filter_var($_POST["Factory"], FILTER_SANITIZE_STRING);
	$mAlarms = filter_var($_POST["Alarms"], FILTER_SANITIZE_STRING);	
		$results = $mysqli->query("INSERT INTO markers (CarrierName, CarrierType, Captain, Fleet, Location, Lat, Lng, Nationality, Factory, Alarms) VALUES ('$mCarrierName','$mCarrierType','$mCaptain','$mFleet','$mLocation',$mLat,$mLng,'$mNationality','$mFactory','$mAlarms')");
	if (!$results) {  
		  header('HTTP/1.1 500 Error: Could not create marker!'); 
		  exit();
	} 	
	$output = '<h1 class="marker-heading">'.$mCarrierName.'</h1><p>'.$mLocation.'</p>';
	exit($output);
}
################ Continue generating Map XML #################
//Create a new DOMDocument object
$dom = new DOMDocument("1.0");
$node = $dom->createElement("markers"); //Create new element node
$parnode = $dom->appendChild($node); //make the node show up 
// Select all the rows in the markers table
$results = $mysqli->query("SELECT * FROM markers WHERE 1");
if (!$results) {  
	header('HTTP/1.1 500 Error: Could not get markers!'); 
	exit();
} 
//set document header to text/xml
header("Content-type: text/xml");
// Iterate through the rows, adding XML nodes for each
while($obj = $results->fetch_object())
{
  $node = $dom->createElement("marker");  
  $newnode = $parnode->appendChild($node);   
  $newnode->setAttribute("CarrierName",$obj->CarrierName);
  $newnode->setAttribute("CarrierType", $obj->CarrierType);
  $newnode->setAttribute("Captain",$obj->Captain);
  $newnode->setAttribute("Fleet",$obj->Fleet);
  $newnode->setAttribute("Location", $obj->Location);  
  $newnode->setAttribute("Lat", $obj->Lat);  
  $newnode->setAttribute("Lng", $obj->Lng);  
  $newnode->setAttribute("Nationality", $obj->Nationality); 
  $newnode->setAttribute("Factory", $obj->Factory); 
  $newnode->setAttribute("Alarms", $obj->Alarms);   	
}
echo $dom->saveXML();
