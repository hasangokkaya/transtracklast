<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>TransTrack</title>
<link rel="stylesheet" type="text/css" media="all" href="../css/style.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyB61_gkuXNg4YnqKmJF50DGDzRsd0_r9LU&sensor=false"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
</head>
<body>
<div id="container">
<div id="icerik">
	<div id="header"><img id="logo" src="../images/logo.png"/></div>
	<div id="menu">
	<ul id="menuUlSecenek">
	<li class="menuSecenek"><img class="menuResimButon" src="../icon/connection.png" title="Connection"/></li>
	<li class="menuSecenek"><img class="menuResimButon" src="../icon/homepage.png" title="Home"/></li>
	<li class="menuSecenek"><img class="menuResimButon" src="../icon/area.png" title="Area"/></li>
	<li class="menuSecenek"><img class="menuResimButon" src="../icon/fleet.png" title="Fleet"/></li>
	<li class="menuSecenek"><img class="menuResimButon" src="../icon/truck.png" title="Highway"/></li>
	<li class="menuSecenek"><img class="menuResimButon" src="../icon/locomotive.png" title="Railway"/></li>
	<li class="menuSecenek"><img class="menuResimButon" src="../icon/airplane.png" title="Airway"/></li>
	<li class="menuSecenek"><img class="menuResimButon" src="../icon/ship.png" title="Seaway"/></li>
	<li class="menuSecenek"><img class="menuResimButon" src="../icon/warning.png" title="Warnings"/></li>
	<li class="menuSecenek"><img class="menuResimButon" src="../icon/report.png" title="Reports"/></li>
	<li class="menuSecenek"><img class="menuResimButon" src="../icon/history.png" title="History"/></li>
	<li class="menuSecenek"><img class="menuResimButon" src="../icon/configuration.png" title="Configuration"/></li>
	<li class="menuSecenek">
	<form method="post" action="">
	<input id="mail" type="text" name="e-mail" placeholder="e-mail"/>
	<input id="pw"type="password" name="password" placeholder="password"/>
	<input id="submit" type="submit" value="Sign In"/>
	</form>	
	</li>
	</ul>
	</div>
	
	<div id="google_map"></div>
<script>
$(document).ready(function(){
//autocomplete
$(function() {
    $("#searchBox").autocomplete({
        source: 'search.php',
		minLength:1
		
    });
	});
});
</script>
	<div id="information">
		<div class="info">
			<form action="search.php" method="get" >
				<input id="searchBox" type="text" name="CarrierName"/>
				<input id="searchBtn" type="submit" value="ARA"/> 
			</form>
		</div>
		
		<div id="table1">
		<table table border="1" cellpadding="7" class="aciklama">
			<tr><td colspan="8"><div id="alarm">
			<div id="warning"><label class="aciklama">WARNING</label></div>
			</div></td></tr>
<?
include("connect.php");
$sql_select=("SELECT CarrierName,Captain,Location,Factory FROM markers");
$sonuc = mysql_num_rows($sql_select);
if($sql_select>0) {
	while($row=mysqli_fetch_array($sql_select))
	{
echo '<tr><td colspan="8">'.$row["CarrierName"].'</td></tr>
			'<tr><td colspan="8"><img id="photo" src="../images/ship.jpg"/></td></tr>
			<tr><td colspan="8">'.$row["Captain"].'</td></tr>
			<tr><td colspan="8">'.$row["Location"].'</td></tr>
			<tr><td colspan="8">'{$row['Factory']}'</td></tr>
			2<tr><td colspan="8"><img id="photo" src="./images/indicator.jpg"/></td></tr>
	'}
}'
?>
</table>
		</div>
	</div>

	<div id="table">
	<table table border="1" cellpadding="7">

	<tr>
	<th colspan="9">Tracking History</th>
	</tr>
	<tr>
		<th width="60px">Id</th>
		<th width="90px">CarrierName</th>
		<th width="90px">CarrierType</th>
		<th width="90px">Captain</th>
		<th width="90px">Fleet</th>
		<th width="105px">Location</th>
		<th width="105px">Nationality</th>
		<th width="90px">Factory</th>
		<th width="240px">Alarms</th>
	</tr>

	<tr>
<?php
include("connect.php");

$sql_select=("SELECT id,CarrierName,CarrierType,Captain,Fleet,Location,Nationality,Factory,Alarms FROM markers ORDER BY id DESC LIMIT 0,2");
$sql_con=mysqli_query($con,$sql_select);
if(mysqli_num_rows($sql_con)>0) 
{
	while($row=mysqli_fetch_assoc($sql_con))
	{
echo'<td>'.$row["id"].'</td>
<td>'.$row["CarrierName"].'</td>
<td>'.$row["CarrierType"].'</td>
<td>'.$row["Captain"].'</td>
<td>'.$row["Fleet"].'</td>
<td>'.$row["Location"].'</td>
<td>'.$row["Nationality"].'</td>
<td>'.$row["Factory"].'</td>
<td>'.$row["Alarms"].'</td>
</tr>';
}
}
else
{
	echo "tabloda hiçbir kayıt bulunamadı";
}
mysqli_close($con);
?>
</table>
</div>

<div id="footer">
	<ul id="footerUlSecenek">
	<li class="footerSecenek">Features</li>
	<li class="footerSecenek">GPS Tracking Devices</li>
	<li class="footerSecenek">How it Works</li>
	<li class="footerSecenek">Company</li>
	<li class="footerSecenek">Support</li>
	<li class="footerSecenek">Request a Demo</li>
	<li class="footerSecenek">444 5 444</li>
	</ul>
</div>
</div>
</div>
</div>
</body>


<script type="text/javascript">
$(document).ready(function() {

	var mapCenter = new google.maps.LatLng(39.539273, 35.051143); //Google map Coordinates
	var map;
	
	map_initialize(); // initialize google map
	
	//############### Google Map Initialize ##############
	function map_initialize()
	{
			var googleMapOptions = 
			{ 
				center: mapCenter, // map center
				zoom: 6, //zoom level, 0 = earth view to higher value
				maxZoom: 18,
				minZoom: 6,
				zoomControlOptions: {
				style: google.maps.ZoomControlStyle.SMALL //zoom control size
			},
				scaleControl: true, // enable scale control
				mapTypeId: google.maps.MapTypeId.ROADMAP // google map type
			};
		
		   	map = new google.maps.Map(document.getElementById("google_map"), googleMapOptions);			
			
			//Load Markers from the XML File, Check (map_process.php)
			$.get("map_process.php", function (data) {
				$(data).find("marker").each(function () {
					  var CarrierName 		= $(this).attr('CarrierName');
					  var CarrierType 		= $(this).attr('CarrierType');
					  var Captain 		= $(this).attr('Captain');
					  var Fleet 		= $(this).attr('Fleet');
					  var Location 	= $(this).attr('Location');
					  var Nationality 	= $(this).attr('Nationality');
					  var Factory 	= $(this).attr('Factory');
					  var Alarms 	= $(this).attr('Alarms');
					  var point 	= new google.maps.LatLng(parseFloat($(this).attr('Lat')),parseFloat($(this).attr('Lng')));
					  create_marker(point, CarrierName, Location, false, false, false, "http://localhost/icon/pin_blue.png");
				});
			});	
			
			//Right Click to Drop a New Marker
			google.maps.event.addListener(map, 'rightclick', function(event) {
				//Edit form to be displayed with new marker
				var EditForm = '<p><div class="marker-edit">'+
				'<form action="ajax-save.php" method="POST" name="SaveMarker" id="SaveMarker">'+
				'<label for="CarrierName"><span>CarrierName :</span><input type="text" name="CarrierName" class="save-name" placeholder="CarrierName" maxlength="40" /></label>'+
				'<label for="CarrierType"><span>CarrierType :</span> <select name="CarrierType" class="save-type"><option value="Highway">Highway</option><option value="Railway">Railway</option><option value="Airway">Airway</option><option value="Seaway">Seaway</option>'+
				'<option value="Set"></option></select></label>'+
				'<label for="Captain"><span>Captain :</span><input type="text" name="Captain" class="save-name" placeholder="Captain" maxlength="40" /></label>'+
				'<label for="Fleet"><span>Fleet :</span><input type="text" name="Fleet" class="save-name" placeholder="Fleet" maxlength="40" /></label>'+
				'<label for="Location"><span>Location :</span><input type="text" name="Location" class="save-name" placeholder="Location" maxlength="40"></label>'+
				'<label for="Nationality"><span>Nationality :</span><input type="text" name="Nationality" class="save-name" placeholder="Nationality" maxlength="40"></label>'+
				'<label for="Factory"><span>Factory :</span><input type="text" name="Factory" class="save-name" placeholder="Factory" maxlength="40"></label>'+
				'<label for="Alarms"><span>Alarms :</span><input type="text" name="Alarms" class="save-name" placeholder="Alarms" maxlength="40"></label>'+
				'</form>'+
				'</div></p><button name="save-marker" class="save-marker">Konumu Kaydet</button>';

				//Drop a new Marker with our Edit Form
				create_marker(event.latLng, 'Yeni Konum', EditForm, true, true, true, "http://localhost/icon/pin_green.png");
			});
										
	}
	
	//############### Create Marker Function ##############
	function create_marker(MapPos, MapTitle, MapDesc,  InfoOpenDefault, DragAble, Removable, iconPath)
	{	  	  		  
		
		//new marker
		var marker = new google.maps.Marker({
			position: MapPos,
			map: map,
			draggable:DragAble,
			animation: google.maps.Animation.DROP,
			title:"Hello World!",
			icon: iconPath
		});
		
		//Content structure of info Window for the Markers
		var contentString = $('<div class="marker-info-win">'+
		'<div class="marker-inner-win"><span class="info-content">'+
		'<h1 class="marker-heading">'+MapTitle+'</h1>'+
		MapDesc+ 
		'</span><button name="remove-marker" class="remove-marker" title="Remove Marker">Konumu Sil</button>'+
		'</div></div>');	

		
		//Create an infoWindow
		var infowindow = new google.maps.InfoWindow();
		//set the content of infoWindow
		infowindow.setContent(contentString[0]);

		//Find remove button in infoWindow
		var removeBtn 	= contentString.find('button.remove-marker')[0];
		var saveBtn 	= contentString.find('button.save-marker')[0];

		//add click listner to remove marker button
		google.maps.event.addDomListener(removeBtn, "click", function(event) {
			remove_marker(marker);
		});
		
		if(typeof saveBtn !== 'undefined') //continue only when save button is present
		{
			//add click listner to save marker button
			google.maps.event.addDomListener(saveBtn, "click", function(event) {
				var mReplace = contentString.find('span.info-content'); //html to be replaced after success
				var mCarrierName = contentString.find('input.save-name')[0].value; //name input field value
				var mCarrierType = contentString.find('select.save-type')[0].value; //type of marker
				var mCaptain = contentString.find('input.save-name')[0].value; //name input field value
				var mFleet = contentString.find('input.save-name')[0].value; //name input field value
				var mLocation = contentString.find('input.save-name')[0].value; //name input field value
				var mNationality = contentString.find('input.save-name')[0].value; //name input field value
				var mFactory = contentString.find('input.save-name')[0].value; //name input field value
				var mAlarms = contentString.find('input.save-name')[0].value; //name input field value
				
				
				if(mCarrierName =='' || mLocation =='')
				{
					alert("Please enter CarrierName and Location!");
				}else{
					save_marker(marker, mCarrierName, mCarrierType, mCaptain, mFleet, mLocation, mNationality, mFactory, mAlarms, mReplace); //call save marker function
				}
			});
		}
		
		//add click listner to save marker button		 
		google.maps.event.addListener(marker, 'click', function() {
				infowindow.open(map,marker); // click on marker opens info window 
	    });
		  
		if(InfoOpenDefault) //whether info window should be open by default
		{
		  infowindow.open(map,marker);
		}
	}
	
	//############### Remove Marker Function ##############
	function remove_marker(Marker)
	{
		
		/* determine whether marker is draggable 
		new markers are draggable and saved markers are fixed */
		if(Marker.getDraggable()) 
		{
			Marker.setMap(null); //just remove new marker
		}
		else
		{
			//Remove saved marker from DB and map using jQuery Ajax
			var mLatLang = Marker.getPosition().toUrlValue(); //get marker position
			var myData = {del : 'true', latlang : mLatLang}; //post variables
			$.ajax({
			  type: "POST",
			  url: "map_process.php",
			  data: myData,
			  success:function(data){
					Marker.setMap(null); 
					alert(data);
				},
				error:function (xhr, ajaxOptions, thrownError){
					alert(thrownError); //throw any errors
				}
			});
		}

	}
	
	//############### Save Marker Function ##############
	function save_marker(Marker, mCarrierName, mCarrierType, mCaptain, mFleet, mLocation, mNationality, mFactory, mAlarms, replaceWin)
	{
		//Save new marker using jQuery Ajax
		var mLatLang = Marker.getPosition().toUrlValue(); //get marker position
		var myData = {CarrierName : mCarrierName, CarrierType : mCarrierType, Captain : mCaptain, Fleet : mFleet, Location : mLocation, latlang : mLatLang, Nationality : mNationality, Factory : mFactory, Alarms : mAlarms,}; //post variables
		console.log(replaceWin);		
		$.ajax({
		  type: "POST",
		  url: "map_process.php",
		  data: myData,
		  success:function(data){
				replaceWin.html(data); //replace info window with new html
				Marker.setDraggable(false); //set marker to fixed
				Marker.setIcon('http://localhost/icon/pin_blue.png'); //replace icon
            },
            error:function (xhr, ajaxOptions, thrownError){
                alert(thrownError); //throw any errors
            }
		});
	}

});
</script>
</html>