<!doctype html>
<?php
    require_once("../php/connect.php");
?>
<?php
    require_once("../php/addvehicle.php");
?>
<html>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Add vehicle</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body class="thebody">
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
                    <a class="nav-item nav-link" href="#">Profile</a>
                    <a class="nav-item nav-link" href="#">About Us</a>
                    <a class="nav-item nav-link" href="#">Contact</a>

                </div>
            </div>
        </div>
    </nav>

    <div class="container card p-5 mt-5 mb-5">
        <div class="container">

            <h1 class="row d-flex justify-content-center">Add new vehicle information</h1>
            <div class="form-groups">
                <br>
                <h3 class="row d-flex justify-content-center">Image of Insurance paper(optional)</h3>
                <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post" enctype="multipart/form-data">
                    <div class="row d-flex justify-content-center">
                        <div class="col-sm-8 ">
                            <div class="form-group mt-2">
                                <h3>Select Image File to Upload:</h3>
                            </div>
                        </div>
                    </div>
                    <div class="row d-flex justify-content-center">
                        <div class="col-sm-8 ">
                            <div class="form-group mt-2">

                                <br> <input name="VEIMG" type="file" class="custom-file-input" id="validatedCustomFile">
                                <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                                <div class="invalid-feedback">Example invalid custom file feedback</div>
                            </div>
                        </div>

                    </div>

                    <div class="row d-flex justify-content-center">
                        <div class="col-sm-8 ">
                            <div class="form-group">


                                <h3>Registration:</h3>
                                <input name="VNum" type="number" class="form-control mr-sm-2" id="pwd" maxlength="6" minlength="6" required>
                                <h3>Bike Type:</h3>
                                <select name="VName" class="form-control" id="exampleFormControlSelect1">
                                    <option value="MotorBike">MotorBike</option>
                                    <option value="Car">Car</option>
                                    <option value="Bus">Bus</option>
                                </select>
                                <button name="VSub" type="submit" class="btn btn-primary mt-1" value="<?php echo $_GET['did'] ?>">
                                    Add vehicle
                                </button>
                            </div>
                        </div>
                    </div>
                </form>


            </div>
        </div>
    </div>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>

</html>
