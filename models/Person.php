<?php

/*
 * * class person that contain common  (attr & method) between  ( admin & user) 
 * *
 */


class Person {

    protected $id;
    protected $username;
    protected $password;
    protected $email;
    protected $fullname;
    protected $photo;
    protected $visanum;
    protected $visabalance;
    protected $dbo;

    function __construct() {
        $this->dbo = new Database();
    }

    function login($username, $password) {

        $login = $this->dbo->selectUserNameAndpass($username, $password);

        return $login;
    }

/*
      function loginAdmin($username, $password) {

      $login = $this->dbo->selectusername_pass_groupidAdmin($username, $password);
      if ($login) {
      return TRUE;
      } else {
      return FALSE;
      }


      }
     * 
     */

    function deleteuser($id) {

        $deleted = $this->dbo->delete($id, 'persons');
        if ($deleted) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function addUser($data) {
        
        $added = $this->dbo->add($data, 'persons');
        if ($added) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function updateuser($id, $data) {
        $updated = $this->dbo->update($id, $data, 'persons');
        if ($updated) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function getusersdata($limit = ' ',$where=' ') {

        $data = $this->dbo->getdata('persons', $limit,$where);
        return $data;
    }

    function getuserbyid($id) {

        $data = $this->dbo->getrecordbyid($id, 'persons');
        return $data;
    }

    function getuserbyUsername($username) {

        $data = $this->dbo->selectRecord($username, 'persons', $value, $and);
        return $data;
    }

    // setter 
    function setid($id) {
        $this->id = $id;
    }

    function setfullname($fullname) {
        $this->name = $fullname;
    }

    function setusername($username) {
        $this->username = $username;
    }

    function setpassword($password) {
        $this->password = $password;
    }

    function setemail($email) {
        $this->email = $email;
    }

    function setphoto($photo) {
        $this->photo = $photo;
    }

    function setvisabalance($visabalance) {
        $this->visabalance = $visabalance;
    }

    function setvisanum($visanum) {
        $this->visanum = $visanum;
    }

    //getter
    function getid() {
        return $this->id;
    }

    function getusername() {
        return $this->username;
    }

    function getfullname() {
        return $this->fullname;
    }

    function getpassword() {
        return $this->password;
    }

    function getemail() {
        return $this->email;
    }

    function getphoto() {
        return $this->photo;
    }

    function getvisanum() {
        return $this->visanum;
    }

    function getvisabalance() {
        return $this->visabalance;
    }

}
