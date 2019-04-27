<?php

require_once '../../models/Database.php';
require_once '../../views/user/v_addproduct.php';
require_once '../../models/Product.php';
require_once '../../models/Upload.php';
//require_once '../../models/Validator.php';
$product = new Product();
if ($_POST) {
    if (isset($_POST['send']) && $_POST['send'] = 'Send') {
        $Data['km'] = $_POST['km'];
        $Data['fuelcapacity'] = filter_var($_POST['fuelcapacity'], FILTER_SANITIZE_NUMBER_INT);
        $Data['fuelkind'] = filter_var($_POST['fuelkind'], FILTER_SANITIZE_NUMBER_INT);
        $Data['maxspeed'] = filter_var($_POST['maxspeed'], FILTER_SANITIZE_NUMBER_INT);
        $Data['startprice'] = filter_var($_POST['startprice'], FILTER_SANITIZE_NUMBER_INT);
        $Data['year'] = filter_var($_POST['year'], FILTER_SANITIZE_NUMBER_INT);
        $Data['kindofdriving'] = filter_var($_POST['kindofdriving'],FILTER_SANITIZE_STRING);
        $Data['dateofstartbid'] = $_POST['dateofstartbid'];
        $Data['dateofend'] = $_POST['dateofend'];
        $Data['color'] = $_POST['color'];
        $Data['module'] = $_POST['module'];
        $Data['describition'] = filter_var($_POST['describition'], FILTER_SANITIZE_STRING);
        $Data['productownerid'] = $_SESSION['id'];

        if (isset($_FILES)) {
            $file = $_FILES['photo'];
            $allowexts = array('png', 'jpg');
            $uploaddir = '../../app/layout/uploads/';
            $maxsize = 4000000;
            $upload = new Upload($file, $allowexts, $maxsize, $uploaddir);
            $upload->uploadfile();
            //echo $upload->getfileurl() . "  upload successfully";
        }
        $Data['photo'] = $upload->getfileurl();
        /* $rules = array
          (
          "describition" => "checkempty",
          "km" => "checkpositive",
          "fuelcapacity" => "checkpositive",
          "maxspeed" => "checkpositive",
          "startprice" => "checkpositive",
          );
          $valid = new Validator($rules, $Data);
          if (!$valid) {
          echo "<script type'text/javascript'>alert('Problem With Data ');history.back();</script>";
          }
         */
        if (date($Data['dateofstartbid']) < date('m-d-y')) {
            echo "<script type'text/javascript'>alert('Invalid Start Date !! ... Date Of Start Must Be Larger Than Today');</script>";
        } elseif (date($Data['dateofend']) <= date('m-d-y')) {
            echo "<script type'text/javascript'>alert('Invalid End Date !! ... Date Of End Must Be Larger Than Today');</script>";
        } elseif (date($Data['dateofend']) <= date($Data['dateofstartbid'])) {
            echo "<script type'text/javascript'>alert('Invalid End Or Start  Date !! ... Date Of End Must Be Larger Than Date Of Start');</script>";
        } elseif ($Data['km'] <= 0) {
            echo "<script type'text/javascript'>alert('KM must be > 0 ');</script>";
        } elseif ($Data['startprice'] <= 0) {
            echo "<script type'text/javascript'>alert('Start Price must be > 0 ');</script>";
        } elseif ($Data['maxspeed'] <= 0) {
            echo "<script type'text/javascript'>alert('Max Speed must be > 0 ');</script>";
        } else {

            $add = $product->addProduct($Data);

            if ($add) {
                echo "<script type'text/javascript'>alert('Added Success`fully ');</script>";
            }
        }
    }
}


    