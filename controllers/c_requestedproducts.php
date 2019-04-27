<?php

require_once '../models/Product.php';
$product = new Product();
$PData = $product->listaddedproducts();
require_once '../views/v_requestedproducts.php';





