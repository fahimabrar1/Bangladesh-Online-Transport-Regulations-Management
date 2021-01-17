<?php

    
if(!empty($_GET['did']))
    {
        $DriverId = $_GET['did'];
    }else
    {
        $DriverId = $_SESSION['user']; 
    }

    $query_forvehiclesearch = "SELECT * FROM \"Vehicle\" WHERE driverid = $DriverId";
    		
    if ($vehicledata  = pg_query($query_forvehiclesearch)) {  
      

    }else{
        echo "Searched Failed";
	}
            
    
    function getVehicle($VType,$VPlateNum,$VId){
     
    echo "<div class=\"card container p-3 mt-2 border rounded\"";
    if(checkforcase($VPlateNum))
    {
        echo "style=\"background-color:#ff3232;\"";
    }    
    echo ">
       <div class=\"row\">
             <div class=\"col\">
                <div class=\"container-fluid\">";
            if($_SESSION["userType"]=="Police")
            {
            echo  "<div class=\" col-sm-12 d-flex justify-content-end\">
                        <a type=\"button\" class=\"btn btn-primary text-white col-3 p-2 mb-2\" data-toggle=\"modal\" data-target=\"#FileACaseModal".$VPlateNum.$VId."\" >File A Case</a>
                  </div>
                  <div class=\" col-sm-12 d-flex justify-content-end\">
                        <a type=\"button\" class=\"btn btn-primary text-white col-3 p-2 mb-2\" data-toggle=\"modal\" data-target=\"#ShowRecordsModal".$VId."\" >Show Case Records</a>
                  </div>";
             }else{
                echo "<div class=\" col-sm-12 d-flex justify-content-end\">
                        <a type=\"button\" class=\"btn btn-primary text-white col-3 p-2 mb-2\" data-toggle=\"modal\" data-target=\"#FreeACase".$VPlateNum."\" >Free A Case</a>
                  </div>
            ";
            }
            echo    "
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
</div>


        <!--SHOW RECORDS Modal -->

        <div class=\"modal fade\" id=\"ShowRecordsModal".$VId."\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"exampleModalCenterTitle\" aria-hidden=\"true\">
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
        
        
        
        <!--FILE A CASE MODAL-->
        
        <div class=\"modal fade\" id=\"FileACaseModal".$VPlateNum.$VId."\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"exampleModalCenterTitle\" aria-hidden=\"true\">
            <div class=\"modal-dialog modal-dialog-centered modal-lg\" role=\"document\">
                <div class=\"modal-content\">
                    <div class=\"modal-header\">
                        <h5 class=\"modal-title\" id=\"exampleModalLabel\">File A Case</h5>
                        <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
                            <span aria-hidden=\"true\">&times;</span>
                        </button>
                    </div>
                    <form class=\" mb-1\" method=\"post\" action=\"".$_SERVER["PHP_SELF"]."\">
                        <div class=\"modal-body\">
                            <div class=\"form-group\">
                                <div class=\"container\">

                                    <div class=\"row\">
                                        <div class=\"col\">
                                            <label>Select Type of Cases</label>
                                            <div class=\"multi_select_box\">
                                                <select  name=\"casestypes[]\" class=\"multi_select d-flex justify-content-center\" multiple>
                                                    <option value=\"Headlight\">Headlight</option>
                                                    <option value=\"Fitness Paper\">Fitness Paper</option>
                                                    <option value=\"Bike Paper\">Bike Paper</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class=\"col\">
                                            <label>Fine Amount</label>
                                            <div class=\"multi_select_box\">
                                                <input name=\"caseamount\" type=\"number\" class=\"form-control\" id=\"inputPassword4\" placeholder=\"Amount\"> 
                                                
                                                <input name=\"vp\" type=\"hidden\" class=\"form-control\"  value=\"$VPlateNum\" >
                                                <input name=\"vid\" type=\"hidden\" class=\"form-control\" value=\"$VId\" >
                                                
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class=\"form-group\">
                                <label for=\"exampleFormControlTextarea1\">Note</label>
                                <textarea name=\"casenote\"  class=\"form-control\" id=\"exampleFormControlTextarea1\" rows=\"3\"></textarea>
                            </div>
                        </div>
                        <div class=\"modal-footer\">
                            <button type=\"button\" class=\"btn btn-secondary\" data-dismiss=\"modal\">Close</button>
                            <button  name=\"casesubmit\" type=\"submit\" class=\"btn btn-primary\">Submit</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>



<!-- Free Case Moal -->
        <div class=\"modal fade\" id=\"FreeACase".$VPlateNum."\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"exampleModalLabel\" aria-hidden=\"true\">
            <div class=\"modal-dialog\" role=\"document\">
                <div class=\"modal-content\">
                    <div class=\"modal-header\">
                        <h5 class=\"modal-title\" id=\"exampleModalLabel\">Free Active Case</h5>
                        <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
                            <span aria-hidden=\"true\">&times;</span>
                        </button>
                    </div>
                    <form class=\"mb-1\" method=\"post\" action=\"".$_SERVER["PHP_SELF"]."\">
                        <div class=\"container\">
                            <div class=\"row\">
                                <div class=\"modal-body\">
                                    <input name=\"redeemcode\" type=\"text\" min=\"16\" class=\"form-control col-12\" id=\"exampleInputEmail1\" aria-describedby=\"emailHelp\" placeholder=\"Enter Code\" required>
                                    
                                    <input name=\"vp\" type=\"hidden\" class=\"form-control\"  value=\"$VPlateNum\">
                                </div>
                            </div>
                            <div class=\"row modal-footer\">
                                <button name=\"redeemsubmit\" type=\"submit\" class=\"btn btn-primary\">Free Case</button>
                                <button type=\"button\" class=\"btn btn-secondary\" data-dismiss=\"modal\">Close</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>

";
    }



    if(isset($_POST['casesubmit']))
    {
        $VPlateNum = $_POST['vp'];
        $VId = $_POST['vid'];
        filecase($VPlateNum,$VId);
        
    }else if(isset($_POST['redeemsubmit']))
    {
        $VPlateNum = $_POST['vp'];
        $redeemcode = $_POST['redeemcode'];
        redeemcode($VPlateNum,$redeemcode);
    }



    function redeemcode($VPlateNum,$redeemcode)
    {
         $query ="UPDATE \"Case\"
SET \"Status\" = 'inactive'
WHERE redeemcode = '$redeemcode' AND platenumber = '$VPlateNum'";
           if($result = pg_query($query))
           {
               echo "<script>
    location.href = '../pages/driverprofile.php?did=".$_SESSION["user"]."'
</script>";
           }else
           {
               echo "<script>
                   location.href = '../pages/driverprofile.php?did=".$_SESSION["user"]."'
               </script>";
           }
        
    }


    function filecase($VPlateNum,$VId)
    {
           $case = " ";
            // Check if any option is selected 
            if(isset($_POST['casestypes']))  
            { 
                // Retrieving each selected option 
                foreach ($_POST['casestypes'] as $ctype)  
                {
                    $case = $case." ".$ctype;
                }
            } 
            $caseamount = $_POST['caseamount'];
            $casenote = $_POST['casenote'];
            $uniqueid = uniqid().mt_rand(100,999);
            $query ="INSERT INTO \"Case\"(platenumber,vehicleid,redeemcode,\"Status\",amount ,type,\"Date\",\"Time\",note)
VALUES  ('$VPlateNum','$VId','$uniqueid','active','$caseamount','$case',CURRENT_DATE,CURRENT_TIME,'$casenote')";
           if($result = pg_query($query))
           {
               echo "<script>
    location.href = '../pages/driverprofile.php?did=".$_SESSION["user"]."'
</script>";
           }else
           {
               echo "<script>
                   location.href = '../pages/driverprofile.php?did=".$_SESSION["user"]."'
               </script>";
           }
        
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
    
    function checkforcase($VId)
    {
        $query_forcasesearch = "SELECT * FROM \"Case\" WHERE platenumber = '$VId'";
        $casedata  = pg_query($query_forcasesearch);
      
      while ($CaseRow = pg_fetch_assoc($casedata))
      {
          if($CaseRow['Status']=="active")
          {
              return true;
          }
      }
        return false;
    }

    
?>
