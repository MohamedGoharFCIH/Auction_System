<?php
require_once '../models/Product.php';
require_once '../views/v_searchproduct.php';
$product = new Product();



if ($_POST) {
    if ($_POST['search'] && $_POST['search'] = 'Search') {
        $productData = $product->getproductbyid($_POST['id']);
        require_once '../views/v_listsearchproduct.php';
        
    } 
}



