<?php

if (isset($_POST['UIMG'])) {
  
  $id = $_POST['UIMG'];
     
        if (!file_exists($target_file))
        {
        	echo $id;
	        


	        $query = "UPDATE \"User\" SET ImgData = '$name' WHERE DriverID ='$id'";

	        echo $query;
	        if(pg_query($query))
	        {
	        echo "Uplaoded Succesfully";
	        }else{
	        echo "Failed";
	        }
		}
}

if (isset($_POST['VSub'])) {
  
  $id = $_POST['VSub'];
  $vnum = $_POST['VNum'];
  $vname = $_POST['VName'];

  $name = $_FILES["VEIMG"]["name"];
  $target_dir = "E:\\Xampp\\Setup\\htdocs\\Bangladesh-Online-Transport-Regulations-Management\\imgaes\\docs\\";
  $target_file = $target_dir . basename($_FILES["VEIMG"]["name"]);
  
    
    if (!file_exists($target_file))
    {
	   move_uploaded_file($_FILES['VEIMG']['tmp_name'],$target_dir.$name);
    }
    $query = "INSERT INTO \"Vehicle\"(DriverID,PlateNumber,VehicleType,ImgData)
VALUES('$id','$vnum','$vname','$name')";
    echo $query;
    if(pg_query($query))
    {
        echo "Uplaoded Succesfully";
    }else{
        echo "Failed";
    }
}
?>
