<?php

require_once '../models/Admin.php';
require_once '../models/Product.php';
require_once '../controllers/c_listnotcollected.php';
require_once '../views/v_listnotcollected.php';

$admin = new Admin();

if(isset($_GET['action']) && $_GET['action'] == 'collect')
{
   $productid = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']) : 0;
   $collect = $admin->collectProfits($productid); 
   if($collect)
   {
       echo "<script type'text/javascript'>alert('Site Percentage OF Money is Transformed Successfuly');history.back();</script>";
   }
   
}
if(isset($_GET['action']) && $_GET['action'] == 'collect')
{
   $productid = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET['id']) : 0;
   $collect = $admin->collectProfits($productid); 
   if($collect)
   {
       echo "<script type'text/javascript'>alert('Site Percentage OF Money is Transformed Successfuly');history.back();</script>";
   }
   
}
