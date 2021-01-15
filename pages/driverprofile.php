<!doctype html>
<?php
    require_once("../php/connect.php");
?>
<?php
    require_once("../php/GetUserData.php");
?>
<?php
    require_once("../php/GetVehiclesData.php");
?>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/css/bootstrap-select.min.css">

    <link rel="stylesheet" type="text/css" href="../css/style.css">

    <title>Bangladesh Online Transport Regulations And Management</title>
</head>

<body class="thebody">

    <!--Nav Bar -->

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand mr-5" href="#">
            <h1>BOTRM</h1>
        </a>


        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="container-fluid d-flex justify-content-end">
                <div class="navbar-nav">

                    <a class="nav-item nav-link active" href="#">Dashboard<span class="sr-only">(current)</span></a>
                    <a class="nav-item nav-link" href="#">About Us</a>
                    <a class="nav-item nav-link" href="#">Contact</a>
                    <?php
                    if(!empty($_SESSION["user"])){

                        echo  "<a class=\"nav-item nav-link\" href=\"../php/loggingOut.php\">Logout</a>";
                    }else{
                        echo  "<a class=\"nav-item nav-link\" href=\"login.php\">Login</a>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </nav>


    <!-- Body -->


    <div class="container mt-5 mb-5">
        <div class=" card container p-3">

            <div class="container-fluid d-flex justify-content-center">
                <img src="<?php echo $UserDP; ?>" width="200" height="200" class="rounded-circle" alt="Cinque Terre">
            </div>
            <div class="container-fluid">
                <hr class="m-4" style="height=1px;color:gray;background-color:gray">
            </div>

            <div class="container-fluid m-4 row">
                <div class="col">
                    <div class="container-fluid row">
                        <div class="col-sm-6">
                            <h5>Drivers' Name : </h5>
                        </div>
                        <div class="col-sm-6">
                            <h5>
                                <?php
                                echo $DriverName;
                           ?>
                            </h5>
                        </div>
                    </div>
                    <div class="container-fluid row">
                        <div class="col-sm-6">
                            <h5>Mobile Number : </h5>
                        </div>
                        <div class="col-sm-6">
                            <h5>
                                <?php
                                echo $MobileNum;
                           ?>
                            </h5>
                        </div>
                    </div>
                </div>
                <?php
                
                if($_SESSION["userType"]=="Driver")
                {
                    $did = $_GET['did'];
                  echo "<div class=\"col\">
                    <div class=\"container-fluid row\">
                        <div class=\" col-sm-12 d-flex justify-content-end\">
                            <a type=\"button\" class=\"btn btn-outline-danger col-4 p-2 mb-2\" target=\"_blank\" href=\"http://localhost/Bangladesh-Online-Transport-Regulations-Management/pages/edit-profile.php?did=$did\">Edit Profile</a>
                        </div>
                    </div>
                    <div class=\"container-fluid row\">
                        <div class=\" col-sm-12 d-flex justify-content-end\">
                            <a type=\"button\" class=\"btn btn-outline-danger col-4 p-2 mb-2\" target=\"_blank\" href=\"http://localhost/Bangladesh-Online-Transport-Regulations-Management/pages/addvehiclepage.php?did=$did\">Add Vehicle</a>
                        </div>
                    </div>
                </div>";   
                }
                
                ?>

            </div>
        </div>

        <div class="container p-3 mt-2 d-flex justify-content-center">
            <h1>VEHICLES</h1>
        </div>
        <!-- Vehicles Section -->
        <div class="Vehicle">
            <?php
          while ($Vehiclerow = pg_fetch_assoc($vehicledata)) {
          getVehicle($Vehiclerow['vehicletype'],$Vehiclerow['platenumber'],$Vehiclerow['vehicleid']);      
        }
        
    ?>
        </div>







    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/js/bootstrap.bundle.js">

    </script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/js/bootstrap-select.min.js">

    </script>
    <script src="../js/script.js"></script>

</body>

</html>
