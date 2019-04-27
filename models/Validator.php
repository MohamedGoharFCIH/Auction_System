<?php

/**
 * 
 */
class Validator {

    function __construct($rules,$data) {
        $this->validate($rules, $data);
    }

    function validate($rules, $data) {
        $valid = true;

        foreach ($rules as $key => $rule) {
            $callbacks = explode('|', $rule);
            foreach ($callbacks as $callback) {
                $value = isset($data[$key]) ? $data[$key] : NULL;
                if (is_array($value)) {
                    foreach ($value as $val) {
                        if (!$this->$callback($val, $key)) {
                            $valid = false;
                        }
                    }
                } else {
                    if (!$this->$callback($value, $key)) {
                        $valid = false;
                    }
                }
            }
        }
        return $valid;
    }

    function checkstring($value, $key) {
        $pattern = "/^[a-zA-Z\p{Cyrillic}0-9\s\-]+$/u";
        $Validate = preg_match($pattern, $value);
        if ($Validate == false) {
            throw new Exception("Error the $key must be a string");
        }
        return $Validate;
    }

    function checkemail($value, $key) {
        $Validate = filter_var($value, FILTER_VALIDATE_EMAIL);
        if ($Validate == false) {
            throw new Exception("Error the $key must be a Valid email");
        }
        return $Validate;
    }

    function checkip($value, $key) {
        $Validate = filter_var($value, FILTER_VALIDATE_IP);
        if ($Validate == false) {
            throw new Exception("Error the $key must be a Valid ip");
        }
        return $Validate;
    }

    function checkurl($value, $key) {
        $Validate = filter_var($value, FILTER_VALIDATE_URL);
        if ($Validate == false) {
            throw new Exception("Error the $key must be a Valid url");
        }
        return $Validate;
    }

    function checkint($value, $key) {
        $Validate = filter_var($value, FILTER_VALIDATE_INT);
        if ($Validate == false) {
            throw new Exception("Error the $key must be a Valid integer");
        }
        return $Validate;
    }
    function checkpositive($value, $key) {
        $Validate = ($value > 0);
        if ($Validate == false) {
            throw new Exception("Error the $key must be > Zero");
        }
        return $Validate;
    }
    

    function checkempty($value, $key) {
        $Validate = !empty($value);
        if ($Validate == false) {
            throw new Exception("Error $key is required ");
        }
        return $Validate;
    }

    /* function sanitize($key,$value)
      {
      $flag	=	NULL;

      switch ($key)
      {
      case 'email':
      $value 		=	substr($value,0,150);
      $filter 	=	FILTER_SANITIZE_EMAIL;

      case 'url':
      $filter 	=	FILTER_SANITIZE_URL;

      case 'int':
      $filter 	=	FILTER_SANITIZE_NUMBER_INT;



      default:
      $filter 	=	FILTER_SANITIZE_STRING;
      $flag		=	FILTER_FLAG_NO_ENCODE_QUOTES;
      break;
      }

      $Validate 	=	filter_var($Value,$filter,$flag);
      if($Validate == false)
      {
      throw new Exception("Error the $key must be invalid ");

      }
      return $Validate;
      } */
}
