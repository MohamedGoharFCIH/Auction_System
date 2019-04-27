<?php

require_once '../../models/Database.php';
require_once '../../models/Person.php';
require_once '../../models/User.php';
require_once '../../models/Product.php';
require_once '../../models/Validator.php';
require_once '../../views/user/v_contact.php';

if ($_POST) {
    if (isset($_POST['send']) && $_POST['send'] == 'Send') {
         $data['email'] =filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
        echo $data['email'];
        $data['userid'] = $_SESSION['id'];
        $data['message'] = filter_var($_POST['message'],FILTER_SANITIZE_STRING);
        $user = new User();
        $message = $user->sendMessage($data);
        if ($message)
        {
           echo "<script type'text/javascript'>alert('Message Sended Successfully');</script>";
        }
    }
}


// the way to send mail 
/*
  if (isset($_POST['send'])) {

  $myemail ='admin@gmail.com';
  $subject ='Contact';
  $message =$_POST['mesage'];
  $from = $_POST['email'];
  $headers = "From:" . $from;

  if (mail($to, $subject, $message, $headers)) {
  echo "Sent.";
  }
  else {
  echo "failed.";
  }
  }
 */
?>
