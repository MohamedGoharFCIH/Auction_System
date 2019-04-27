<?php

class User extends Person {

    private $db;
    private $objproduct;

    function __construct() {
        $this->db = new Database();
        $this->objproduct = new Product();

        parent::__construct();
    }

    function register($data) {

        $reg = $this->db->add($data, 'persons');
        if ($reg) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function count($where = ' ') {
        $count = $this->db->count(' username ', ' persons  ', $where);
        return $count;
    }

    function activeUser($id) {

        $active = $this->db->active('persons', $id);
        if ($active) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function found($value) {
        $f = $this->db->checkItem('username', 'persons', $value);
        return $f;
    }

    function Is_Unique($select, $tablename, $value) {
        $u = $this->db->checkItem($select, $tablename, $value);
        return $u;
    }

    function checkbidder($id) {
        $check = $this->db->checkItem('bidderid', 'products', $id,' AND `finished` = 0 ');
        if ($check > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    // still under development 
    function bid($uid, $productid, $pricebid) {
        $bidder = $this->getuserbyid($uid);
        //print_r($bidder);
        if ($bidder['approved'] == 1) {
            $product = $this->objproduct->getproductbyid($productid);
            
            $test = $this->checkbidder($uid);
            if ($test > 0) {
                echo "<script type'text/javascript'>alert('you can\'t bid in this prouct you are currently the bidder in a product');</script>";
            } else {

                if ($product['finalprice'] <= 0){
                    $x = ($product['percentagebid'] * $product['startprice'] ) + $product['startprice'];
                    
                }else{
                    $x = ($product['percentagebid'] * $product['finalprice'] ) + $product['finalprice'];
                    
                }if ($bidder['visabalance'] >= $x) {
                   if($pricebid>$x)
                {
                    $bid = $this->db->addBidding($uid, $pricebid, $productid);
                    if ($bid)
                        echo "<script type'text/javascript'>alert('Your bidding Added Successfully');</script>";
                
                }else {
                    echo "<script type'text/javascript'>alert('Sorry ....!! you Must Enter Price greater Than OR Equal Minimum Price .. ');</script>";
                }
                    
                } else {
                    echo "<script type'text/javascript'>alert('Sorry ....!! your Visa Balance Little than final price ');</script>";
                }
            }
        } else {
            echo "<script type'text/javascript'>alert('Sorry ...  you are not activated');</script>";
        }
    }

    function sendMessage($data) {
        $message = $this->db->add($data, 'contacts');
        if ($message) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /*
      function bid($uid, $productid, $pricebid) {
      $bidder = $this->getuserbyid($uid);

      if ($bidder['approved'] == 1) {
      $product = $this->objproduct->getproductbyid($productid);

      $test= $this->checkbidder($uid);
      if ($test!=NULL) {
      echo 'you can\'t bid in this prouct you are currently the bidder in other product';
      } else {


      $x = ($product['percentagebid'] * $product['startprice'] ) + $product['startprice'];
      if ($bidder['visabalance'] >= $x && ($pricebid <= $bidder['visabalance'])) {
      $count = $this->db->checkItem('productid', 'bidding', $productid);
      if ($count > 0) {
      $this->db->updatebidding($uid, $pricebid, $productid);
      $this->db->updateonerecord($productid, 'finalprice', $pricebid, 'bidding');
      $this->db->up($pricebid, $productid);
      echo "<script type'text/javascript'>alert('You bidding Successfully');history.back();</script>";
      } else {

      $this->db->addbid($uid, $pricebid, $productid);
      $this->db->updateonerecord($productid, ' finalprice', $pricebid, ' bidding ');
      $this->db->up($pricebid, $productid);
      echo "<script type'text/javascript'>alert('You bidding Successfully');history.back();</script>";
      }
      } else {
      echo "<script type'text/javascript'>alert('your Visa Balance Little than final price ');history.back();</script>";
      }

      }
      } else {
      echo "<script type'text/javascript'>alert('you are not activated');history.back();</script>";
      }
      } */
}
