 <?php 
        echo "Submit PHP ";
    
        function search(){
    	  	$PlateNumber=$_POST['platenumber'];
    	 	 $query = "SELECT * FROM \"Vehicle\" WHERE platenumber = $PlateNumber";
    		
    		if ($result = pg_query($query)) 
            {
				echo "Searched Successuful ";
                if(pg_affected_rows($result) >0 )
                {
                    $val = pg_fetch_array($result);
                    $driverid = $val[3];

                    $query_foruser = "SELECT * FROM \"User\" WHERE driverid = $driverid";
                    $user = pg_query($query_foruser);
                    if ($user) 
                    {  
                        while ($Userrow = pg_fetch_assoc($user))
                        {
                            getRow($Userrow['name'] ,$Userrow['driverid']);
                        }
                    }
                }else{
                      showRowError(); 
                }
    		}else{
    				echo "Searched Failed";
    		}
            
    }
?>