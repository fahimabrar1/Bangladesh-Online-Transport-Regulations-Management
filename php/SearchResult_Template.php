<?php
     function getRow($DriverName , $DriverID){

        
         $var1="<div>
        <tr>
          <th scope=\"row\">1</th>
          <td colspan=\"3\" >$DriverName</td>
          <td class=\"d-flex justify-content-around\">
              <a type=\"button\" class=\"btn btn-danger text-white\" target=\"_blank\" href=\"http://localhost/Bangladesh-Online-Transport-Regulations-Management/pages/driverprofile.php?did=$DriverID\" >Go To Profile</a></td>
        </tr>
    </div>
   ";

        echo $var1;
    }
    
    function showRowError()
    {
        $var1 = "<div>
        <tr>
          <td colspan=\"12\">
              <div class=\"alert alert-warning alert-dismissible fade show\" role=\"alert\">
                  <strong>No Vehicles Found!!</strong>
                  <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                <span aria-hidden=\"true\">&times;</span>
                </button>
              </div>
          </td>
        </tr>
    </div>";
        echo $var1;

    }
   
?>