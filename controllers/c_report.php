<?php
require_once '../models/Database.php';
require_once '../models/Person.php';
require_once '../models/User.php';
require_once '../models/User.php';
$list  = new Product();
$getproduct=$list->listproducts();
require_once '../views/v_report.php';




