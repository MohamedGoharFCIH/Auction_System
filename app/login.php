
<?php
session_start();
if (isset($_SESSION['username']) && $_SESSION['id']) {
    if ($_SESSION['groupid'] == 1) {
        header("Location:index.php");
    } else {
        if (isset($_SESSION['username']) && $_SESSION['id']) {
            if ($_SESSION['groupid'] == 0)
                header("Location:user/index.php");
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <!--<meta http-equiv="X-UA-Compatible" content="IE=edge">-->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login & Register</title>


        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="assets/css/form-elements.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="shortcut icon" href="assets/ico/favicon.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">

    </head>

    <body>

        <!-- Top content -->
        <div class="top-content">

            <div class="inner-bg">
                <div class="container">

                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
                            <h1><strong>Online Auction <br></strong> Login &amp; Register Forms</h1>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-sm-5">

                            <div class="form-box">
                                <div class="form-top">
                                    <div class="form-top-left">
                                        <h3>Login to our site</h3>
                                        <p>Enter username and password to log on:</p>
                                    </div>
                                    <div class="form-top-right">
                                        <i class="fa fa-key"></i>
                                    </div>
                                </div>

                                <div class="form-bottom">
                                    <form  action="logincontroller.php" method="POST" class="login-form">

                                        <div class="form-group">
                                            <label class="sr-only" for="form-username">Username</label>
                                            <input type="text" name="username" placeholder="Username..." class="form-username form-control" id="form-username">
                                        </div>

                                        <div class="form-group">
                                            <label class="sr-only" for="form-password">Password</label>
                                            <input type="password" name="password" placeholder="Password..." class="form-password form-control" id="form-password">
                                        </div>
                                        <input class="form-control" type="submit" name="login"  value="login">
                                    </form>
                                </div>

                            </div>

                            <div class="social-login">
                                <h3>...or login with:</h3>
                                <div class="social-login-buttons">
                                    <a class="btn btn-link-1 btn-link-1-facebook" href="#">
                                        <i class="fa fa-facebook"></i> Facebook
                                    </a>
                                    <a class="btn btn-link-1 btn-link-1-twitter" href="#">
                                        <i class="fa fa-twitter"></i> Twitter
                                    </a>
                                    <a class="btn btn-link-1 btn-link-1-google-plus" href="#">
                                        <i class="fa fa-google-plus"></i> Google Plus
                                    </a>
                                </div>
                            </div>

                        </div>

                        <div class="col-sm-1 middle-border"></div>
                        <div class="col-sm-1"></div>

                        <div class="col-sm-5">

                            <div class="form-box">
                                <div class="form-top">
                                    <div class="form-top-left">
                                        <h3>Sign up now</h3>
                                        <p>Fill in the form below to get instant access:</p>
                                    </div>
                                    <div class="form-top-right">
                                        <i class="fa fa-pencil"></i>
                                    </div>
                                </div>
                                <div class="form-bottom">
                                    <form action="logincontroller.php" method="POST" class="registration-form">
                                        <div class="form-group">
                                            <label class="sr-only" for="form-Full-name">Full Name</label>
                                            <input type="text" name="fullname" placeholder="Full name" class="form-first-name form-control" id="form-Full-name">
                                        </div>
                                        <div class="form-group">
                                            <label class="sr-only" for="form-User-name">User name</label>
                                            <input type="text" name="username" placeholder="User name" class="form-last-name form-control" id="form-User-name">
                                        </div>

                                        <div class="form-group">
                                            <label class="sr-only" for="form-email">Email</label>
                                            <input type="text" name="email" placeholder="Email" class="form-email form-control" id="form-email">
                                        </div>

                                        <div class="form-group">
                                            <label class="sr-only" for="form-pasword">Password</label>
                                            <input type="password" name="password" placeholder="Password" class=" form-control" id="form-email">
                                        </div>
                                        <div class="form-group">
                                            <label class="sr-only" for="form-pasword">Visa Number</label>
                                            <input type="number" name="visanum" placeholder="Visanum" class=" form-control" id="form-email">
                                        </div>

                                        <input class="form-control" type="submit" name="register"  value="register">
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>

        </div>


        <footer>
            <div class="container">
                <div class="row">

                    <div class="col-sm-8 col-sm-offset-2">
                        <div class="footer-border"></div>
                        <p>
                            2018 FCIH 
                        </p>

                    </div>

                </div>
            </div>
        </footer>

        <script src="assets/js/jquery-1.11.1.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.backstretch.min.js"></script>
        <script src="assets/js/scripts.js"></script>

    </body>

</html>