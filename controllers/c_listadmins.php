<?php


require_once '../models/Person.php';
require_once '../models/Admin.php';
$Admin = new Admin();

try {
    $usersData = $Admin->getusersdata(' ',' WHERE `groupid` = 1');
} catch (Exception $e) {
    echo $e->getMessage();
}
require_once '../views/v_listadmins.php';
