<?php

if (empty($_SESSION)) // if the session not yet started
    session_start();
require_once '../models/Database.php';
require_once '../models/Person.php';
require_once '../models/User.php';
require_once '../models/Product.php';
require_once '../models/Admin.php';

$admin = new Admin();
$user = new User();
$product = new Product();

if (!isset($_SESSION['username']) || $_SESSION['groupid'] == 0) {
    header("Location:login.php");
}

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Admin Page</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/font-awesome.min.css" rel="stylesheet">
        <link href="css/datepicker3.css" rel="stylesheet">
        <link href="css/styles.css" rel="stylesheet">

        <!--<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">-->

    </head>
    <body>
        <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span></button>
                    <a class="navbar-brand" href="index.php"><span>ِAdmin</span>Page</a>

                </div>
            </div>
        </nav>
                    
  
        <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
            <div class="profile-sidebar">
                <div class="profile-userpic">
                    <img src="http://placehold.it/50/30a5ff/fff" class="img-responsive" alt="">
                </div>
                <div class="profile-usertitle">
                    <div class="profile-usertitle-name"><?php if (isset($_SESSION['username'])) echo $_SESSION['username']; ?></div>
                    <div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
                </div>
                <div class="clear"></div>
            </div>
            <div class="divider"></div>

            <ul class="nav menu">
                <li class="active"><a href="index.php"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
                
                
                <li><a href="?page=requestedproducts.php"><em class="fa fa-toggle-off">&nbsp;</em> Requested Products </a></li>

                <li class="parent "><a data-toggle="collapse" href="#sub-item-1">
                        <em class="fa fa-navicon">&nbsp;</em> Users && Admin <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
                    </a>
                    <ul class="children collapse" id="sub-item-1">
                        <li><a class="" href="?page=requests.php">
                                <span  class="fa fa-arrow-right">&nbsp;</span>Requests From Users
                            </a></li>
                        <li><a class="" href="?page=adduser.php">
                                <span class="fa fa-arrow-right">&nbsp;</span> Add User
                            </a></li>

                        <li><a class="fa fa-arrow-right" href="?page=listusers.php">
                                <span class="">&nbsp;</span> List all Users
                            </a></li>

                        <li><a class="" href="?page=addadmin.php">
                                <span class="fa fa-arrow-right">&nbsp;</span> Add Admin
                            </a></li>

                        <li><a class="" href="?page=listadmins.php">
                                <span class="fa fa-arrow-right">&nbsp;</span> List all Admin
                            </a></li>
                    </ul>
                </li>

                <li><a href="?page=searchuser.php"><em class="fa fa-search">&nbsp;</em> Search  User &telrec;</a></li>
                <li><a href="?page=searchproduct.php"><em class="fa fa-search">&nbsp;</em> Search  Product &telrec;</a></li>
                <li><a href="?page=collectprofits.php"><em class="fa fa-hand-grab-o">&nbsp;</em> Collect Profits</a></li>
                <li><a href="../controllers/c_logout.php"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
            </ul>
        </div><!--/.sidebar-->

        <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
                </div>
            </div><!--/.row-->
            
            <div class="panel panel-container">
                <div class="row">
                    <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
                        <div class="panel panel-teal panel-widget border-right">
                            <div class="row no-padding"><em class="fa fa-xl fa-car color-blue"></em>
                                <div class="large">
                                    <?php
                                        $count =$product->count(' WHERE finished = 1 ');
                                        echo $count;
                                        ?>
                                </div>
                                <div class="text-muted">Finished Products</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
                        <div class="panel panel-blue panel-widget border-right">
                            <div class="row no-padding"><em class="fa fa-xl fa-car color-red"></em>
                                <div class="large">
                                    <?php
                                        $count =$product->count(' WHERE approved = 0 ');
                                        echo $count;
                                    ?>
                                </div>
                                <div class="text-muted">New Products</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
                        <div class="panel panel-orange panel-widget border-right">
                            <div class="row no-padding"><em class="fa fa-xl fa-users color-red"></em>
                                <div class="large">
                                    <?php
                                        $count =$user->count(' WHERE approved = 0 ');
                                        echo $count;
                                    ?>
                                </div>
                                <div class="text-muted">New Users</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
                        <div class="panel panel-red panel-widget ">
                            <div class="row no-padding"><em class="fa fa-xl fa-users color-blue"></em>
                                <div class="large">
                                    <?php
                                        $count =$user->count(' WHERE groupid != 1 ');
                                        echo $count;
                                    ?>
                                </div>
                                <div class="text-muted">Users</div>
                            </div>
                        </div>
                    </div>
                </div><!--/.row-->
            </div>

            <!-- CHAT -->



<?php
if (@$_GET['page']) {
    $url = "../controllers/c_" . $_GET['page'];
    if (is_file($url)) {
        echo "<div class='container'>";
        require_once $url;
        echo "</div>";
    } else {
        echo "<script type'text/javascript'>alert('Requsted File Not Found ');history.back();</script>";
    }
}
?>
          
                   




            <script src="js/jquery-1.11.1.min.js"></script>
            <script src="js/bootstrap.min.js"></script>
            <script src="js/chart.min.js"></script>
            <script src="js/chart-data.js"></script>
            <script src="js/easypiechart.js"></script>
            <script src="js/easypiechart-data.js"></script>
            <script src="js/bootstrap-datepicker.js"></script>
            <script src="js/custom.js"></script>


    </body>
</html>
