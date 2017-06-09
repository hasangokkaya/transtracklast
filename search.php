<?php
    //database configuration
    $db_Host = 'localhost';
    $db_Username = 'root';
    $db_Password = '';
    $db_Name = 'transtrack';
    
    //connect with the database
    $db = mysqli_connect($db_Host,$db_Username,$db_Password,$db_Name);

    $term = trim(strip_tags($_GET['CarrierName']));
    
    //get matched data from skills table
    $query = "SELECT CarrierName FROM markers WHERE CarrierName LIKE '%".$term."%' ORDER BY CarrierName ASC";
	$sql_con=mysqli_query($db,$query);
	
	$data=array();
    while ($row = mysqli_fetch_array($sql_con)) {
		
        $data[]=$row["CarrierName"];
	}

    //return json data
    echo json_encode($data);
?>