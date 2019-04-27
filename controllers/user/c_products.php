<?php

require_once '../../models/Database.php';
require_once '../../models/Person.php';
require_once '../../models/Product.php';
require_once '../../models/User.php';

$product = new Product();
$user = new User();
$Pdata = $product->listStartedProducts();
require_once '../../views/user/v_products.php';

if ($_POST) {
    
    if (isset($_POST['bid']) && $_POST['bid'] = 'BID') {
        $id = $_POST['id'];
        $priceBid= is_numeric($_POST['finalprice']) ? intval($_POST['finalprice']) : 0;
        $user->bid($_SESSION['id'], $id, $priceBid);
    // print_r($_POST);
        
        
        
    }
}
?>






