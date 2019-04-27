<?php
require_once '../models/Product.php';

$product = new Product();
$data = $product->getNotCollected();


require_once '../views/v_listnotcollected.php';

