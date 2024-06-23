<?php

session_start();
unset($_SESSION['username']);
//unset($_SESSION['cartDetails']);
//session_destroy();

unset($_SESSION['userId']);
//session_destroy();

echo "<script>window.open('../shop.php','_self')</script>";


?>