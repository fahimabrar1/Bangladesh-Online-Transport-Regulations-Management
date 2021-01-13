<?php
    
   
    if($conn = pg_connect("host=localhost port=5432 dbname=BOTRM user=postgres password=pgsql"))
    {
    }else {
  		  	echo "Connection Failed";
    }
session_start();


if(empty($_SESSION['user'])){
      
    if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
         $url = "https://";   
    else  
         $url = "http://";   
    // Append the host(domain name, ip) to the URL.   
    $url.= $_SERVER['HTTP_HOST'];   
    
    // Append the requested resource location to the URL   
    $url.= $_SERVER['REQUEST_URI'];    
      
    echo $url;  
  
    if($url != "http://localhost/Bangladesh-Online-Transport-Regulations-Management/pages/login.php")
    {
        echo "<script>location.href = '../pages/login.php'</script>";
    }
}
   
?>
