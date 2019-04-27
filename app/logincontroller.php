<?php

require_once '../models/Database.php';

require_once '../models/Product.php';
require_once '../models/Person.php';


require_once '../models/User.php';
require_once '../models/Validator.php';


$user = new User();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['login']) && $_POST['login'] == 'login') {
        $username = $_POST['username'];
        $password = $_POST['password'];


        $person = new Person();
        $login = $person->login($username, $password);
        if ($login) {
            if ($login['groupid'] == 1) {
                session_start();
                $_SESSION['username'] = $username;
                $_SESSION['id'] = $login['id'];
                $_SESSION['groupid'] = 1;
                header("Location:index.php");
            } else {
                if ($login['groupid'] == 0) {
                    session_start();
                    $_SESSION['username'] = $username;
                    $_SESSION['id'] = $login['id'];
                    $_SESSION['groupid'] = 0;
                    header("Location:user/index.php");
                }
            }
        } else {
            echo "<script type'text/javascript'>alert('invalid username and password');history.back();</script>";
        }
    } elseif (isset($_POST['register']) && $_POST['register'] == 'register') {
        try {
            //print_r($_POST);


            $data['fullname'] = filter_var($_POST['fullname'], FILTER_SANITIZE_STRING);
            $data['username'] = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
            //echo $data['username'];
            $data['password'] = $_POST['password'];
            $data['visanum'] = $_POST['visanum'];
            $data['email'] = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
            //$data['visanum'] = rand(11, 100);
            $checkusername = $user->found($data['username']);
            $rules = array
                (
                "username" => "checkstring|checkempty",
                "email" => "checkempty|checkemail",
                "fullname" => "checkstring|checkempty",
                "password" => "checkempty",
            );
            if ($checkusername > 0) {
                echo "<script type'text/javascript'>alert('This User Name Is Exsist! .... Try Other One ');history.back();</script>";
                die();
            }
            $valid = new Validator($rules, $data);
            if (!$valid) {
                die();
            }
        } catch (Exception $e) {
            echo $e->getMessage();
            die();
        }

        try {
            $register = $user->register($data);
            if ($register) {

                echo "<script type'text/javascript'>alert('registerd succseefully');history.back();</script>";
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    } else {
        header("Location:login.php");
    }
}
