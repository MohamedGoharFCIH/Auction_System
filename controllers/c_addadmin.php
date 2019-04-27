<?php

require_once '../views/v_addadmin.php';
require_once '../models/Person.php';
require_once '../models/Admin.php';
$Admin = new Admin();
if ($_POST) {
    if ($_POST['add'] && $_POST['add'] = 'Add') {
        $Data['username'] = $_POST['username'];
        $Data['password'] = $_POST['password'];
        $Data['email'] = $_POST['email'];
        $Data['visanum'] = $_POST['visanum'];
        $Data['groupid'] = 1;
        $Data['fullname'] = $_POST['fullname'];
        $Data['approved'] = 1;
        $checkusername = $user->found($Data['username']);
        $checkvisanum = $user->Is_Unique('visanum', 'persons', $Data['visanum']);
        if ($checkusername > 0) {
            echo "<script type'text/javascript'>alert('This User Name Is Exsist! .... Try Other One ');history.back();</script>";
            die();
        }
        if ($checkvisanum > 0) {
            echo "<script type'text/javascript'>alert('This Visa Number Is Exsist! .... Try Other One ');history.back();</script>";
            die();
        }
        try {
            $add = $Admin->addUser($Data);

            if ($add) {
                echo "<script type'text/javascript'>alert('Added Successfully');history.back();</script>";
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}


