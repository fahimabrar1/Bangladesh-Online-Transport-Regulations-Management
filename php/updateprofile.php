<?php


if (isset($_POST['UIMG'])) {


    $id = $_GET['did'];
    echo $id." ";
    $target_dir = "E:\\Xampp\Setup\htdocs\Bangladesh-Online-Transport-Regulations-Management\imgaes\\";
        $file_name =  $target_dir.basename($_FILES["EIMG"]["name"]);
        $img = fopen($file_name, 'r') or die("cannot read image\n");
        $data = fread($img, filesize($file_name));

        $es_data = pg_escape_bytea($data);
        echo $es_data;
        $query = "UPDATE \"User\" SET ImgData = '$es_data' WHERE DriverID =".$id;

            echo $query;
        if(pg_query($query))
        { 
            echo "Uplaoded Succesfully";
        }else{
            echo "Failed";
        } 

}
?>
