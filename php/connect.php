
<?php
    
   
    if($conn = pg_connect("host=localhost port=5432 dbname=BOTRM user=postgres password=pgsql"))
    {
  		  	echo "$conn";
  		  	echo "Connected";
    }else {
  		  	echo "Connection Failed";
    }
   
   
?>