<?php

    
    $DriverId = $_GET['did'];
    echo $DriverId;
    $query_forusersearch = "SELECT * FROM \"User\" WHERE driverid = $DriverId";
    		
    if ($userdata = pg_fetch_array(pg_query($query_forusersearch))) {
        echo "Searched Successuful ";        
            $DriverName = $userdata[2];
            $MobileNum = $userdata[5];
    	}else{
    				echo "Searched Failed";
    		}
            
    

?>