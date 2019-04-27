<?php

class Product {

    private $id;
    private $model;
    private $type;
    private $color;
    private $year;
    private $km;
    private $kindofdriving;
    private $fuelcapacity;
    private $fuelkind;
    private $maxspeed;
    private $startbid;
    private $startprice;
    private $percentagebid;
    private $dateofend;
    private $describition;
    private $ownerid;
    private $photo;
    private $db;

    function __construct() {
        $this->db = new Database();
        $this->finishProducts();
        $this->pullBalance();
    }

    function approveproduct($productid) {
        $approved = $this->db->active('products', $productid);
        if ($approved) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function countbiddingproducts() {
        $c = $this->db->count('id ', ' products', ' WHERE bidderid != 0 ');
        return $c;
    }

  

    

    function count($where = ' ') {
        $count = $this->db->count(' id ', ' products ', $where);
        return $count;
    }

    function finishProducts() {

        $finish = $this->db->finishProducts('products');

        if ($finish)
            return TRUE;
        else
            return FALSE;
    }

    function addProduct($data) {
        $addToProducts = $this->db->add($data, 'products');
        if ($addToProducts) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function listproducts() {
        $list = $this->db->getjoinproductdata();
        return $list;
    }

    function listStartedProducts() {
        
        $where = 'WHERE now() BETWEEN `dateofstartbid` AND `dateofend`';
        $products = $this->db->getjoinproductdata(' ', $where);
        return $products;
    }

    function listaddedproducts() {
        $products = $this->db->getjoinproductdata(' ', ' WHERE products.approved = 0 ', 'ON persons.id = products.productownerid ', ' ');
        return $products;
    }

    function getproductbyid($id) {

        $data = $this->db->getrecordbyid($id, 'products');
        return $data;
    }

    function deleteproduct($id) {
        $deleted = $this->db->delete($id, 'products');
        if ($deleted) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function getNotCollected() {
        $data = $this->db->selectRecord('collected', 'products', 0, 'AND `finished` = 1');
        return $data;
    }

    function getFinishedProducts() {
        $limit = ' ';
        $where = 'WHERE finished = 1';
        $products = $this->db->getjoinproductdata($limit, $where);
        return $products;
    }

    function pullBalance() {
        $products = $this->db->getjoinproductdata(' ', ' WHERE finished = 1');
        if ($products) {
            foreach ($products as $p) {
                if ($p['finalprice'] > 0 && $p['pulled'] == 0) {
                    $p['visabalance'] -= $p['finalprice'] + ($p['finalprice'] * $p['sitepercentage']);
                    //$value = ($p['visabalance'] * 0.07) + ($p['visabalance']);
                    $this->db->updateonerecord($p['bidderid'], 'visabalance', $p['visabalance'], 'persons');
                    $this->db->updateonerecord($p['id'], ' pulled', 1, ' products');
                }
            }
        }
    }

    function transformProfits($id) {
        $where = 'WHERE products.id = ' . $id;
        $product = $this->db->getjoinproductdata(' LIMIT 1 ', $where, ' ');
        foreach ($product as $p) {
            if ($p['transformed'] == 0) {

                $value = ($p['finalprice'] - ($p['sitepercentage'] * $p['finalprice'])) + ($p['visabalance']);
                $this->db->transformProfits($p['productownerid'], $value);
                $this->db->updateonerecord($p['id'], 'transformed', 1, 'products');
            }
        }
    }

// setter 
    function setid($id) {
        $this->id = $id;
    }

    function setmodel($model) {
        $this->model = $model;
    }

    function setcolor($color) {
        $this->color = $color;
    }

    function settype($type) {
        $this->type = $type;
    }

    function setphoto($photo) {
        $this->photo = $photo;
    }

    function setyear($year) {
        $this->year = $year;
    }

    function setkm($km) {
        $this->km = $km;
    }

    function setkindofdriving($kindofdriving) {
        $this->kindofdriving = $kindofdriving;
    }

    function setfuelkind($fuelkind) {
        $this->fuelkind = $fuelkind;
    }

    function setfuelcapacity($fuelcapacity) {
        $this->fuelcapacity = $fuelcapacity;
    }

    function setmaxspeed($maxspeeed) {
        $this->maxspeed = $maxspeeed;
    }

    function setstartbid($startbid) {
        $this->startbid = $startbid;
    }

    function setstartprice($startprice) {
        $this->startprice = $startprice;
    }

    function setpercentagebid($percentage = .5) {
        $this->percentagebid = $percentage;
    }

    function setdescribition($describition) {
        $this->describition = $describition;
    }

    function setowenerid($ownerid) {
        $this->ownerid = $ownerid;
    }

//getter
    function getid() {
        return $this->id;
    }

    function getmodel() {
        return $this->model;
    }

    function getcolor() {
        return $this->color;
    }

    function gettype() {
        return $this->type;
    }

    function getphoto() {
        return $this->photo;
    }

    function getyear() {
        return $this->year;
    }

    function getkm() {
        return $this->km;
    }

    function getkindofdriving() {
        return $this->kindofdriving;
    }

    function getfuelkind() {
        return $this->fuelkind;
    }

    function getfuelcapacity() {
        return $this->fuelcapacity;
    }

    function getmaxspeed() {
        return $this->maxspeed;
    }

    function getstartbid() {
        return $this->startbid;
    }

    function getstartprice() {
        return $this->startprice;
    }

    function getpercentagebid() {
        return $this->km;
    }

    function getdescribition() {
        return $this->describition;
    }

    function getownerid() {
        return $this->ownerid;
    }

    /*   function pullBalance() {
      $bid = $this->db->getBiddingData('WHERE finished = 1');
      if ($bid) {
      foreach ($bid as $bidding) {
      if ($bidding['finalprice'] > 0) {
      $bidding['visabalance'] = $bidding['visabalance'] - $bidding['finalprice'];
      $value = ($bidding['visabalance'] * 0.07) + ($bidding['visabalance']);
      $this->db->updateonerecord($bidding['bidderid'], 'visabalance', $value, 'persons');
      $this->db->updateonerecord($bidding['productid'], 'finalprice', $bidding['finalprice'], 'products');
      $this->db->updateonerecord($bidding['id'], 'finalprice', 0, 'bidding');
      }
      }
      }
      }
     
   function getBiddingData($productid) {
        $where = ' WHERE productid = ' . $productid;
        $data = $this->db->getBiddingData($where);
        return $data;
    }
     * 
     */
     /* function getfinalprice($id) {
        $f = $this->db->getBidding($id);
        return $f;
    }
    * 
    */
}
