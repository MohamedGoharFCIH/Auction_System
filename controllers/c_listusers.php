<?php

require_once '../models/Person.php';
require_once '../models/User.php';
$user = new User();

try {
    $usersData = $user->getusersdata(' ',' WHERE `groupid` = 0');
} catch (Exception $e) {
    echo $e->getMessage();
}
require_once '../views/v_listusers.php';


