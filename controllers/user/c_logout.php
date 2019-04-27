<?php
session_start();
session_unset();
session_destroy();

header("Location:../../app/user/index.php");
exit;


