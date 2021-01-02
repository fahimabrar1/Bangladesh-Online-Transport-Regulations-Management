<?php 


session_start();
if(isset($_SESSION['user'])){
      echo "<script>location.href='../pages/dashboard.php'</script>";
    
}elseif(isset($_POST['login'])){

            $mobile=$_POST['mobile'];
            $password=$_POST['password'];
            
            $sql="SELECT
            \"mobilenumber\",\"Password\"
            FROM \"User\"
            WHERE
            (
            \"mobilenumber\" = '$mobile'
            ) AND (\"Password\" = '$password')";
            $result = pg_query($sql);
            if(pg_affected_rows($result) >0 )
            {
            $row = pg_fetch_array($result);

            $storemobile = $row['mobilenumber'];
            $storepassword = $row['Password'];

            if($_POST['mobile']==$storemobile && $_POST['password']==$storepassword){
            $_SESSION["user"]=$row['driverid'];
                echo "<script>location.href='../pages/dashboard.php'</script>";
            }
        }
    }
?>
