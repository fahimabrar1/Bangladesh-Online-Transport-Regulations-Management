<!doctype html>

<?php
    require_once("../php/connect.php");
?>
<?php
    require_once("../php/search.php");
?>
<?php
    require_once("../php/SearchResult_Template.php");
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


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
                <div class="navbar-nav ">

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


    <!--Search Bar -->


    <?php
        if(!empty($_SESSION["userType"]) && $_SESSION["userType"]=="Police")
        {
                    
        echo " 
    <div class=\"card container d-flex justify-content-center mt-5\">
        <div class=\"container mt-5\">
            <!--Search Bar -->
            <!--Search Result Table Bar -->
            
            <form class=\"form-inline mb-1\" method=\"post\" action=\"".$_SERVER["PHP_SELF"]."\">
                <input name=\"platenumber\" class=\"form-control mr-sm-2\" type=\"number\" placeholder=\"Search\" aria-label=\"Search\" maxlength=\"6\" minlength=\"6\" required>
                <button name=\"search\" class=\"btn btn-outline-primary my-2 my-sm-0\" type=\"submit\">Search</button>
            </form>



           
                   <div class=\"container p-3 my-3 border scrollable\">

                <table class=\"table table-striped table-hover\">
                    <thead>
                        <tr>
                            <th scope=\"col\">#</th>
                            <th scope=\"col\">Driver</th>
                            <th scope=\"col\"></th>
                            <th scope=\"col\"></th>
                            <th scope=\"col\" class=\"d-flex justify-content-around\">Go To Profile</th>
                        </tr>
                    </thead>
                    <tbody>"; 
                     if (isset($_POST['search'])) {
                         search();
                     }
                    echo "</tbody>
                </table>

            </div>
            </div>
    </div>";
            
        }else{
                    
            $query = "SELECT * FROM \"User\" WHERE \"driverid\" =".$_SESSION["user"];
            if ($result = pg_query($query)) 
            {
                if(pg_affected_rows($result) >0 )
                {
                    $val = pg_fetch_array($result);
                     $DriverID = $val[0];
                    
                    echo "<div class=\"card container d-flex justify-content-center mt-5\">
        <div class=\"container mt-5\">
            <a type=\"button\" class=\"btn btn btn-danger col-4 p-2 mb-2\" href=\"http://localhost/Bangladesh-Online-Transport-Regulations-Management/pages/driverprofile.php?did=$DriverID \">Go To Profile</a>
        </div>
    </div>
";
                }
            }
        }
            ?>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>
