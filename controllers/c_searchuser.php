<?php


require_once '../models/User.php';
require_once '../views/v_searchuser.php';
$user = new User();



if ($_POST) {
    if ($_POST['search'] && $_POST['search'] = 'Search') {
        $getUserData = $user->getuserbyid($_POST['id']);
        require_once '../views/v_listsearchuser.php';
        
    } 
}