 <?php 
        echo "Submit PHP ";
    
        function search(){
    	  	$PlateNumber=$_POST['platenumber'];
    	 	 $query = "SELECT * FROM \"Vehicle\" WHERE platenumber = $PlateNumber";
    		
    		if ($result = pg_query($query)) {
				echo "Searched Successuful ";
                
                $val = pg_fetch_array($result);
                $driverid = $val[3];
                
                $query_foruser = "SELECT * FROM \"User\" WHERE driverid = $driverid";
                $user = pg_fetch_array(pg_query($query_foruser));
                echo $user[2];
				if ($result) {  
	                getRow($user[2] ,$user[0]);
	            }
    		}else{
    				echo "Searched Failed";
    		}
            
    }
?>