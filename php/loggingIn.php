<?php 


if(isset($_SESSION['user'])){
echo "<script>
    location.href = '../pages/dashboard.php'
</script>";

}elseif(isset($_POST['login'])){

    
    if(validate_mobile($_POST['mobile']))
    {
        
        echo "In User";
        $mobile=$_POST['mobile'];
    
        $password=$_POST['password'];
        
        $sql="SELECT
            \"mobilenumber\",\"Password\",\"driverid\"
            FROM \"User\"
            WHERE
            (
            \"mobilenumber\" = '$mobile'
            ) AND (\"Password\" = '$password')";
        
        $result = pg_query($sql);
        
        if(pg_affected_rows($result) >0 )
        {
            echo "exe";
            $row = pg_fetch_array($result);

            $storemobile = $row['mobilenumber'];
            $storepassword = $row['Password'];

            if($_POST['mobile']==$storemobile && $_POST['password']==$storepassword)
            {
                if($row['driverid'])
                {
                    $_SESSION["user"]=$row['driverid'];
                    $_SESSION["userType"]="Driver";
                    echo $row['driverid'];
                    echo "<script>location.href='../pages/dashboard.php'</script>";   
                }
            }
        } 
    }else{
        $username=$_POST['mobile'];
        $password=$_POST['password'];
        
        $sql="SELECT
            \"username\",\"Password\",\"policeid\"
            FROM \"Police\"
            WHERE
            (
            \"username\" = '$username'
            ) AND (\"Password\" = '$password')";
        $result = pg_query($sql);
        if(pg_affected_rows($result) >0 )
        {
            $row = pg_fetch_array($result);

            $storeuser = $row['username'];
            $storepassword = $row['Password'];

            if($_POST['mobile']==$storeuser && $_POST['password']==$storepassword)
            {
                if($row['policeid'])
                {    
                    $_SESSION["user"]=$row['policeid'];
                    $_SESSION["userType"]="Police";
                    echo $row['policeid'];
                    echo "<script>location.href='../pages/dashboard.php'</script>";
                }
            }
        }
    }
}
function validate_mobile($mobile)
{
    if(preg_match('/^[0-9]{10}+$/', $mobile))
    {
        return preg_match('/^[0-9]{10}+$/', $mobile);
        
    }else if(preg_match('/^[0-9]{11}+$/', $mobile))
    {
        return preg_match('/^[0-9]{11}+$/', $mobile);
    }else{
            return 0;
    }
}
?>
