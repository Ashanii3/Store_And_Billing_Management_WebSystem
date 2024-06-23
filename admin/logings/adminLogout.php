<?php
session_start();
unset($_SESSION['admin']);
session_destroy();

echo "<script>window.open('adminLog.php','_self')</script>";
?>