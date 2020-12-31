
<?php
    
   
    if($conn = pg_connect("host=localhost port=5432 dbname=BOTRM user=postgres password=pgsql"))
    {
    }else {
  		  	echo "Connection Failed";
    }
   
   
?>