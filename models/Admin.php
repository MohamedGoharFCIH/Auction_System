
<?php

/*

 */
require_once '../models/Person.php';
require_once '../models/Product.php';
require_once '../models/Database.php';

class Admin extends Person {

    private $objproduct;
    private $db;

//put your code here
    function __construct() {

        $this->objproduct = new Product();
        $this->db = new Database();

        parent::__construct();
        
    }

    function replayToMessage($id, $value) {


        $message = $this->db->updateonerecord($id, 'replay', $value, 'contacts');
        if ($message) {
            return true;
        } else {
            return FALSE;
        }
    }

    function collectProfits($productid) {
        $site = $this->db->getrecordbyid(1, 'persons');
        $price;
        $product = $this->db->getrecordbyid($productid,'products');
        if ($product['collected']== 0) {
            $price = $product['finalprice'];
            $value =($product['sitepercentage'] * $price)+$site['visabalance'];
            if ($value) {
                $profits = $this->db->updateProfits($value);
                if ($profits) {
                    $this->db->updateonerecord($productid, 'collected', 1, 'products');
                    return TRUE;
                } else {
                    return FALSE;
                }
            }
        } else {
            return FALSE;
        }
    }


}
