<?php

    
    $DriverId = $_GET['did'];
    $query_forvehiclesearch = "SELECT * FROM \"Vehicle\" WHERE driverid = $DriverId";
    		
    if ($vehicledata  = pg_query($query_forvehiclesearch)) {  
      

    }else{
        echo "Searched Failed";
	}
            
    
    function getVehicle($VType,$VPlateNum,$VId){
     
        
     echo "<div class=\"card container p-3 mt-2 border rounded\">
       <div class=\"row\">
             <div class=\"col\">
                <div class=\"container-fluid\">";
            if($_SESSION["userType"]=="Police")
            {
            echo  "<div class=\" col-sm-12 d-flex justify-content-end\">
                        <a type=\"button\" class=\"btn btn-primary text-white col-3 p-2 mb-2\" data-toggle=\"modal\" data-target=\"#FileACaseModal\" >File A Case</a>
                  </div>
                  <div class=\" col-sm-12 d-flex justify-content-end\">
                        <a type=\"button\" class=\"btn btn-primary text-white col-3 p-2 mb-2\" data-toggle=\"modal\" data-target=\"#ShowRecordsModal$VId\" >Show Case Records</a>
                  </div>";
             }
            echo    "</div>   
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
</div>

<!-- Modal -->

        <div class=\"modal fade\" id=\"ShowRecordsModal$VId\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"exampleModalCenterTitle\" aria-hidden=\"true\">
            <div class=\"modal-dialog modal-dialog-centered modal-lg\" role=\"document\">
                <div class=\"modal-content\">
                    <div class=\"modal-header\">
                        <h5 class=\"modal-title\" id=\"exampleModalLabel\">Case History</h5>
                        <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
                            <span aria-hidden=\"true\">&times;</span>
                        </button>
                    </div>

                    <div class=\"modal-body\">
                        <table class=\"table table-striped table-hover\">
                            <thead>
                                <tr>
                                    <th scope=\"col\">#</th>
                                    <th scope=\"col\">Date</th>
                                    <th scope=\"col\">Status</th>
                                    <th scope=\"col\">Amount Fined</th>
                                    <th scope=\"col\" class=\"d-flex justify-content-around\">Note</th>
                                </tr>
                            </thead>
                            <tbody>
                                <div>";

                                   getCaseInRow($VId);
                                    
                        echo    "</div>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
";
    }

    function getCaseInRow($VID)
    {
        $query_forcasesearch = "SELECT * FROM \"Case\" WHERE vehicleid = $VID";
        $casedata  = pg_query($query_forcasesearch);
      
      while ($CaseRow = pg_fetch_assoc($casedata)){
     
        echo "<tr>
                <th scope=\"row\">1</th>
                    <td colspan=\"1\">";
                        echo $CaseRow['Date'];
                echo "</td>
                    <td colspan=\"1\">";
                    echo $CaseRow['Status'];
                echo "</td>
                    <td colspan=\"1\">";
                    echo $CaseRow['amount'];
                echo "</td>
                        <td class=\"d-flex justify-content-around\">                                    
                        <button type=\"button\" class=\"btn btn-primary\" data-container=\"body\" data-toggle=\"popover\" data-placement=\"right\" data-content=\"";
          echo $CaseRow['note'];
                        echo   "\">
                              Note
                        </button>
                     </td>
                   </tr>";
      }
    }
    
    
?>
