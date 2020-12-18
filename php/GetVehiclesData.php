<?php

    
    $DriverId = $_GET['did'];
    echo $DriverId;
    $query_forvehiclesearch = "SELECT * FROM \"Vehicle\" WHERE driverid = $DriverId";
    		
    if ($vehicledata  = pg_query($query_forvehiclesearch)) {
        echo "Searched Successuful ";   
      
      

    }else{
        echo "Searched Failed";
	}
            
    
    function getVehicle($VType,$VPlateNum){
     
        $PrintVehicleData = "<div class=\"container p-3 mt-2 border rounded\">
       <div class=\"row\">
             <div class=\"col\">
                <div class=\"container-fluid\">
                  <div class=\" col-sm-12 d-flex justify-content-end\">
                        <a type=\"button\" class=\"btn btn-danger text-white col-3 p-2 mb-2\" >File A Case</a>
                  </div>
                </div>   
             </div>
            
               <div class=\"container-fluid row\">
                   <div class=\"col-sm-6\">
                       <h5>Vehicle Type : </h5>
                   </div>
                   <div class=\"col\">
                       <h5>$VType</h5>
                   </div>
               </div>
               <div class=\"container-fluid row\">
                   <div class=\"col-sm-6\">
                       <h5>Vehicle Number : </h5>
                   </div>
                   <div class=\"col\">
                       <h5>$VPlateNum</h5>
                   </div>
               </div>
               
        </div>
</div>"
;
        echo $PrintVehicleData;
    }
?>