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
                    <a class="nav-item nav-link" href="#">Login</a>

                </div>
            </div>
        </div>
    </nav>


    <!-- Body -->


    <div class="container mt-5 mb-5">
        <div class=" card container p-3">

            <div class="container-fluid d-flex justify-content-center">
                <img src="../imgaes/dashboard-bg.jpg" width="200" height="200" class="rounded-circle" alt="Cinque Terre">
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
                <div class="col">
                    <div class="container-fluid row">
                        <div class=" col-sm-12 d-flex justify-content-end">
                            <a type="button" class="btn btn-outline-danger col-4 p-2 mb-2" target="_blank" href="http://localhost/Bangladesh-Online-Transport-Regulations-Management/pages/edit-profile.php?did=$DriverID">Edit Profile</a>
                        </div>
                    </div>
                    <div class="container-fluid row">
                        <div class=" col-sm-12 d-flex justify-content-end">
                            <a type="button" class="btn btn-outline-danger col-4 p-2 mb-2" target="_blank" href="http://localhost/Bangladesh-Online-Transport-Regulations-Management/pages/add vehicle.php?did=$DriverID">Add Vehicle</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container p-3 mt-2 d-flex justify-content-center">
            <h1>VEHICLES</h1>
        </div>
        <!-- Vehicles Section -->
        <div class="Vehicle">
            <?php
          while ($Vehiclerow = pg_fetch_assoc($vehicledata)) {
          getVehicle($Vehiclerow['vehicletype'],$Vehiclerow['platenumber']);      
        }
        
    ?>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="FileACaseModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">File A Case</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group ">
                                <div class="container">

                                    <div class="row">
                                        <div class="col">
                                            <label>Select Type of Cases</label>
                                            <div class="multi_select_box ">
                                                <select class="multi_select d-flex justify-content-center" multiple>
                                                    <option value="CakePHP">Headlight</option>
                                                    <option value="Laravel">Fitness Paper</option>
                                                    <option value="YII">Bike Paper</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <label>Fine Amount</label>
                                            <div class="multi_select_box ">
                                                <input type="number" class="form-control" id="inputPassword4" placeholder="Amount">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Note</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>



        <!-- Modal -->

        <div class="modal fade" id="ShowRecordsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Case History</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Amount Fined</th>
                                    <th scope="col" class="d-flex justify-content-around">Note</th>
                                </tr>
                            </thead>
                            <tbody>
                                <div>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td colspan="1">$CaseDate</td>
                                        <td colspan="1">$CaseStatus</td>
                                        <td colspan="1">$Fined</td>
                                        <td class="d-flex justify-content-around">
                                            <button type="button" class="btn btn-primary" data-container="body" data-toggle="popover" data-placement="right" data-content="Note Is Showing!!">
                                                Note
                                            </button>
                                        </td>
                                    </tr>
                                </div>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
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
