<?php
require_once '../../models/Database.php';
require_once '../../models/Person.php';
require_once '../../models/User.php';
require_once '../../models/Product.php';
require_once '../../models/Upload.php';
require_once '../../models/Validator.php';
$id = $_SESSION['id'];
$user = new User();
$userData= $user->getuserbyid($id);
require_once '../../views/user/v_editprofile.php';
 if (@$userData) {
        $pass = $userData['Password'];
        $photo = $userData['photo'];
    }

    if (isset($_POST['update']) && $_POST['update'] == 'Update') {
        $id = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']) : 0;

        $data['fullname'] = filter_var($_POST['fullname'], FILTER_SANITIZE_STRING);

        if (empty($_POST['newpassword']))
            $data['Password'] = $pass;
        else
            $data['Password'] = $_POST['newpassword'];
        $data['email'] = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $data['visanum'] = $_POST['visanum'];
        $checkvisanum = $user->Is_Unique('visanum','persons',$data['visanum']);
        echo $checkvisanum ;
        if ($checkvisanum >0 && $data['visanum']!= $userData['visanum']) {
            echo "<script type'text/javascript'>alert('This Visa Number Is Exsist! .... Try Other One ');history.back();</script>";
            die();
        }
        $rules = array
            (
            "email" => "checkempty|checkemail",
            "fullname" => "checkstring|checkempty",
        );

        $valid = new Validator($rules, $data);
        if (!$valid) {
            die();
        }

        if (isset($_FILES)) {
            //print_r($_FILES);
            $file = $_FILES['photo'];
            $allowexts = array('png', 'jpg');
            $uploaddir = '../app/layout/uploads/';
            $maxsize = 4000000;
            $upload = new Upload($file, $allowexts, $maxsize, $uploaddir);
            $upload->uploadfile();
            //echo $upload->getfileurl() . "  upload successfully";
        }
        $data['photo'] = $upload->getfileurl();
        //echo $data['photo'];
        if (empty($data['photo'])) {
            $data['photo'] = $photo;
        }

        $update = $user->updateuser($id, $data);
        if ($update) {

           echo "<script type'text/javascript'>alert('Updated succssfully');history.back();</script>";
        }
    }

