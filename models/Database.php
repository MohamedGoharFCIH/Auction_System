<?php

class Database {
    /* private $host;
      private $dbname;
      private $user;
      private $pass; */

    public $newobjdb;

    function __construct() {

        /* $this->host = 'localhost';
          $this->dbname = 'auction';
          $this->user = 'root';
          $this->pass = ' '; */
        $this->connect();
    }

    function connect() {
        try {
            $this->newobjdb = new PDO("mysql:host=localhost;dbname=auction", 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
            );
        } catch (PDOException $e) {
            echo "failed to connection " . $e->getmessage();
        }
    }

    function checkItem($select, $tablename, $value, $and = ' ') {
        $query = "SELECT $select FROM $tablename WHERE $select = ' $value ' $and";
        $stmt = $this->newobjdb->prepare($query);
        //echo $query;
        $stmt->execute();

        $count = $stmt->rowCount();

        return $count;
        /*
          ex for calling this function
         * * $check = checkItem("username", "persons", $_POST['username']);
         * * if ($check == 1) // do action 
         */
    }

    function count($item, $tablename, $where = ' ') {
        $query = "SELECT COUNT($item) FROM $tablename $where";

        $stmt = $this->newobjdb->prepare($query);

        $stmt->execute();
        //echo $query;
        if ($stmt)
            return $stmt->fetchColumn();
    }

    function add($data, $tablename) {
        foreach ($data as $key => $value) {
            $values[] = $value;
            $keys [] = $key;
        }
        $tblkeys = '`' . implode($keys, "`,`") . '`';
        $dataval = "'" . implode($values, "','") . "'";
// echo $dataval."<br>";
// echo $tblkeys."<br>";


        $query = "INSERT INTO `$tablename` ($tblkeys) VALUES ($dataval) ";
        echo $query;
        $stmt = $this->newobjdb->prepare($query);

        $stmt->execute();

//echo $query;


        if ($stmt) {
            return true;
        } else {
            throw new Exception("Error : can not insert into db");
            return false;
        }
    }

    function active($tablename, $id) {
        $query = "UPDATE $tablename SET `approved` = 1 WHERE `id` = :cid ";
        try {
            $stmt = $this->newobjdb->prepare($query);
            $stmt->bindparam(':cid', $id, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        if (!$stmt) {
            throw new Exception("Error : can not execute Query ");
        } else {
            return true;
        }
    }

    function selectUserNameAndpass($username, $password) {
        $query = "SELECT * FROM persons WHERE username = :username AND password = :password";
        try {

            $stmt = $this->newobjdb->prepare($query);
            $stmt->bindparam(':username', $username, PDO::PARAM_STR);
            $stmt->bindparam(':password', $password, PDO::PARAM_STR);
            $stmt->execute();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        if (!$stmt) {
            throw new Exception("Error : Query can not execute");
        } else {
            $count = $stmt->rowCount();
            if ($count > 0) {
                $result = $stmt->fetch();
            } else {
                return;
            }
        }
        return $result;
    }

    function delete($id, $tablename) {
        $query = "DELETE  FROM $tablename WHERE `id` = :cid ";
        try {
            $stmt = $this->newobjdb->prepare($query);
            $stmt->bindparam(':cid', $id, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            echo $e->getMessage();
        }


        if (!$stmt) {
            throw new Exception("Error : can not execute Query ");
        } else {
            return true;
        }
    }

    function getdata($tablename, $limit = ' ', $where = ' ') {
        $query = "SELECT * FROM $tablename $where ORDER BY  `id` DESC  $limit";
        try {
            $stmt = $this->newobjdb->prepare($query);

            $stmt->execute();
        } catch (Exception $e) {
            echo $e->getMessage();
        }

        // echo $query;
        if (!$stmt) {
            throw new Exception("Error : can not execute Query ");
        } else {
            $count = $stmt->rowCount();

            if ($count > 0) {
                $result = $stmt->fetchAll();
            } else {
                return;
            }
        }
        return $result;
    }

    function getrecordbyid($id, $tablename) {

        $query = "SELECT * FROM $tablename WHERE `id`= :cid";

        try {
            $stmt = $this->newobjdb->prepare($query);
            $stmt->bindparam(':cid', $id, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            echo $e->getMessage();
        }

        if (!$stmt) {
            throw new Exception("Error : can not execute Query ");
        } else {
            $count = $stmt->rowCount();
            if ($count > 0) {
                $result = $stmt->fetch();
            } else {
                return;
            }
        }
        return $result;
    }

    function update($id, $data, $tablename) {
        $query = "UPDATE $tablename SET ";
        foreach ($data as $key => $value) {
            $query .= "`" . $key . "` = '" . $value . "', ";
        }
        $pat = "+-0";
        $query .= $pat;
        $query = str_replace(", " . $pat, " ", $query);
        $query .= "WHERE `id` = :cid ";

//echo $query . "<br>";
        try {
            $stmt = $this->newobjdb->prepare($query);
            $stmt->bindparam(':cid', $id, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            echo $e->getMessage();
        }

        if (!$stmt) {
            throw new Exception("Error : Query can not execute");
        } else {
            return true;
        }
    }
    function addBidding($uid, $finalprice, $productid)
    {
        $query = "UPDATE `products` SET `bidderid` = $uid,`finalprice` = $finalprice WHERE `id` = $productid";

        try {
            $stmt = $this->newobjdb->prepare($query);
            $stmt->execute();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        //echo $query;
        if (!$stmt) {
            throw new Exception("Error : Query can not execute");
        } else {
            return true;
        }
    }
/*
    function addbid($uid, $finalprice, $productid) {
        $query = "INSERT INTO "
                . "`bidding`(bidderid,finalprice,productid)"
                . "VALUES(:uid,:finalprice,:proid)";

        try {
            $stmt = $this->newobjdb->prepare($query);
            $stmt->execute(array
                (
                'uid' => $uid,
                'finalprice' => $finalprice,
                'proid' => $productid
            ));
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        if (!$stmt) {
            throw new Exception("Error : Query can not execute");
        } else {
            return true;
        }
    }

    function updatebidding($uid, $finalprice, $productid) {
        $query = "UPDATE `bidding` SET `bidderid` = $uid AND `finalprice` = $finalprice WHERE `productid` = $productid";

        try {
            $stmt = $this->newobjdb->prepare($query);
            $stmt->execute();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        echo $query;
        if (!$stmt) {
            throw new Exception("Error : Query can not execute");
        } else {
            return true;
        }
    }
/*/
    function updateProfits($value) {
        $query = "UPDATE `persons` SET `visabalance` = $value WHERE `id`=1";
        try {
            $stmt = $this->newobjdb->prepare($query);
            $stmt->execute();
        } catch (Exception $e) {
            echo $e->getMessage();
        }

        if (!$stmt) {
            throw new Exception("Error : Query can not execute");
        } else {
            return true;
        }
    }

    function finishProducts($tablename) {
// using for products table 
        $query = "UPDATE $tablename SET `finished` = 1 WHERE `dateofend` < now()";
        try {
            $stmt = $this->newobjdb->prepare($query);
            $stmt->execute();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        //echo $query;
        if (!$stmt) {
            throw new Exception("Error : can not execute Query ");
        } else {
            return true;
        }
    }


    function selectRecord($where, $tablename, $value, $and = ' ') {
        $query = "SELECT * FROM $tablename WHERE $where = $value $and";
        try {
            $stmt = $this->newobjdb->prepare($query);
            $stmt->execute();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        if (!$stmt) {
            throw new Exception("Error : Query can not execute");
        } else {
            $count = $stmt->rowCount();

            if ($count > 0) {
                $result = $stmt->fetchAll();
            } else {
                return;
            }
        }
        return $result;
    }

    function selectProductToBid() {

        $query = "SELECT * FROM products WHERE now() BETWEEN `dateofstartbid` AND `dateofend` ";
        try {
            $stmt = $this->newobjdb->prepare($query);
            $stmt->execute();
        } catch (Exception $e) {
            echo $e->getMessage();
        }


        if (!$stmt) {
            throw new Exception("Error : Query can not execute");
        } else {
            $count = $stmt->rowCount();

            if ($count > 0) {
                $result = $stmt->fetchAll();
            } else {
                return;
            }
        }
        return $result;
    }

    function updateonerecord($id, $record, $value, $tablename, $and = ' ') {
        $query = "UPDATE $tablename SET $record = $value WHERE `id` = $id $and";

        try {
            $stmt = $this->newobjdb->prepare($query);


            $stmt->execute();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
//echo $query;
        if (!$stmt) {

            throw new Exception("Error : Query can not execute");
        } else {
            return true;
        }
    }

//SELECT products.* , persons.fullname AS ownername, persons.visabalance ,persons.id AS userid FROM products INNER JOIN persons ON persons.id = products.id WHERE products.approved = 0 
    function getjoinproductdata($limit = ' ', $where = ' ', $on = '  ON persons.id = products.productownerid', $order = ' ') {
        $query = "SELECT products.*  , persons.fullname AS ownername, persons.visabalance ,persons.id AS userid FROM products  "
                . "INNER JOIN persons $on"
                . " $where $limit $order ";
//echo $query."<br>";
        try {
            $stmt = $this->newobjdb->prepare($query);
            $stmt->execute();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        if (!$stmt) {
            throw new Exception("Error : Query can not execute");
        } else {
            $count = $stmt->rowCount();
            if ($count > 0) {
                $result = $stmt->fetchAll();
            } else {
                return;
            }
        }
        return $result;
    }

    function transformProfits($id, $value) {
        $query = "UPDATE `persons` SET `visabalance` = $value WHERE `id` = $id";
        try {
            $stmt = $this->newobjdb->prepare($query);
            $stmt->execute();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        if (!$stmt) {
            throw new Exception("Error : can not execute Query ");
        } else {
            return true;
        }
    }


/*
    function getFinalprice($productid) {
        $query = "SELECT * FROM bidding WHERE productid = $productid ";
//echo $query."<br>";
        try {
            $stmt = $this->newobjdb->prepare($query);
            $stmt->execute();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        if (!$stmt) {
            throw new Exception("Error : Query can not execute");
        } else {
            $count = $stmt->rowCount();
            if ($count > 0) {
                $result = $stmt->fetch();
            } else {
                return;
            }
        }
        return $result;
    }

    function up($price, $id) {
        $query = " UPDATE products SET finalprice = $price WHERE id = $id";
        try {
            $stmt = $this->newobjdb->prepare($query);


            $stmt->execute();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
//echo $query;
        if (!$stmt) {

            throw new Exception("Error : Query can not execute");
        } else {
            return true;
        }
    }

    function getBiddingData($where) {
        $query = "SELECT bidding.* , persons.fullname , persons.visabalance ,persons.id AS userid "
                . "FROM bidding "
                . "INNER JOIN persons "
                . "ON persons.id = bidding.bidderid "
                . "$where ORDER BY `id` ASC ";
        try {
            $stmt = $this->newobjdb->prepare($query);
            $stmt->execute();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        if (!$stmt) {
            throw new Exception("Error : Query can not execute");
        } else {
            $count = $stmt->rowCount();
            if ($count > 0) {
                $result = $stmt->fetchAll();
            } else {
                return;
            }
        }
        return $result;
    }

    function getBidding($id) {
        $query = "SELECT bidding.finalprice as price, products.* "
                . "FROM bidding "
                . "INNER JOIN products "
                . "ON products.id = bidding.productid "
                . "WHERE products.id=$id ";
        try {
            $stmt = $this->newobjdb->prepare($query);
            $stmt->execute();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        if (!$stmt) {
            throw new Exception("Error : Query can not execute");
        } else {
            $count = $stmt->rowCount();
            if ($count > 0) {
                $result = $stmt->fetch();
            } else {
                return;
            }
        }
        return $result;
    }


    function finishProductsInBidding() {
// use for bidding table
        $query = "UPDATE bidding INNER JOIN products ON products.id = bidding.productid SET bidding.finished = products.finished WHERE products.finished = 1 ";
        try {
            $stmt = $this->newobjdb->prepare($query);
            $stmt->execute();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        //echo $query;
        if (!$stmt) {
            throw new Exception("Error : can not execute Query ");
        } else {
            return true;
        }
    }
 
 */
}