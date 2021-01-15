<?php

    
    if(!empty($_GET['did']))
    {
        $DriverId = $_GET['did'];
    }else
    {
        $DriverId = $_SESSION['user']; 
    }
    $query_forusersearch = "SELECT * FROM \"User\" WHERE driverid = $DriverId";
    		
    if ($userdata = pg_fetch_array(pg_query($query_forusersearch))) {
            $DriverName = $userdata[2];
            $MobileNum = $userdata[6];
            if(!empty($userdata[9])){
                  $UserDP = "../imgaes/pictures/".$userdata[9];
            }else{
                $UserDP = "../imgaes/dashboard-bg.jpg";
            }
    	}else{
    				echo "Searched Failed";
    		}
            
    

?>
