<?php
if (empty($_SESSION)) // if the session not yet started
    session_start();


if (!isset($_SESSION['username']) || $_SESSION['groupid'] == 1) {
    header("Location:../login.php");
}
/*
  $e = 'mohamed';

  $x=str_split($e,.5*strlen($e));
  echo $x[1];

  //echo $_SESSION['groupid'];
 * 
 */
?>
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">

        <title>Home Page </title>
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="css/shop-homepage.css" rel="stylesheet">

    </head>

    <body>

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">

            <a class="navbar-brand" href="index.php">Online Auction</a>




            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?page=contact.php">contact</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="?page=products.php">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?page=about.php">About</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            setting
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="?page=editprofile.php">Edit Profile</a>
                            <a class="dropdown-item" href="?page=addproduct.php"> Add Product </a>
                        </div>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="../../controllers/user/c_logout.php">Logout</a>
                    </li>

                </ul>
            </div>
        </nav>
        <br>

        <div class="container">

        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="left: 9%">

            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active">
                    <img class="d-block img-fluid" src="../../app/layout/images/1.jpg" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block img-fluid" src="../../app/layout/images/2.jpg" alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block img-fluid" src="../../app/layout/images/3.jpg" alt="Third slide">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>


        <?php
        if (@$_GET['page']) {
            $url = "../../controllers/user/c_" . $_GET['page'];
            if (is_file($url)) {

                require_once $url;
            } else {
                echo "<script type'text/javascript'>alert('Requsted File Not Found ');history.back();</script>";
            }
        }
        ?>



</div>

        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    </body>

</html>
