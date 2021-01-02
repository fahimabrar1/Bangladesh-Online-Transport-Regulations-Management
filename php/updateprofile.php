<?php


if (isset($_POST['UIMG'])) {
  
  $id = $_POST['UIMG'];

  $name = $_FILES["EIMG"]["name"];
  $target_dir = "E:\\Xampp\\Setup\\htdocs\\Bangladesh-Online-Transport-Regulations-Management\\imgaes\\pictures\\";
  $target_file = $target_dir . basename($_FILES["EIMG"]["name"]);

//      $img = fopen($name, 'r') or die("cannot read image\n");
//      $data = fread($img, filesize($name));

//      $es_data = pg_escape_bytea($data);
        
        if (!file_exists($target_file))
        {
        	echo $id;
	        move_uploaded_file($_FILES['EIMG']['tmp_name'],$target_dir.$name);



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

if (isset($_POST['UPhn'])) {
  
  $id = $_POST['UPhn'];
  $Number = $_POST['Phn'];

    $query = "UPDATE \"User\" SET MobileNumber = '$Number' WHERE DriverID = '$id';";
    echo $query;
    if(pg_query($query))
    {
        echo "Uplaoded Succesfully";
    }else{
        echo "Failed";
    }
		
}

if (isset($_POST['UEmail'])) {
  
  $id = $_POST['UEmail'];
  $Email = $_POST['email'];

    $query = "UPDATE \"User\" SET Email = '$Email' WHERE DriverID = '$id';";
    echo $query;
    if(pg_query($query))
    {
        echo "Uplaoded Succesfully";
    }else{
        echo "Failed";
    }
		
}
?>
