<?php
session_start();

if (isset($_GET['deleting'])){
    $user=$_GET['deleting'];

    $delete="DELETE from users where user_name='$user'";
     $db = mysqli_connect("localhost", "root", "", "project");
     $result=mysqli_query($db, $delete);
     if($result){
         echo "<script>alert('User deleted Successfully') </script>";
         unset($_SESSION['username']);
        session_destroy();
         echo "<script>window.open('../shop.php', '_self') </script>";
     }
}


?>