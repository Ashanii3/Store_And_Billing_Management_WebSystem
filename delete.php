<?php
    include('connection.php');

    if(isset($_GET['delete'])){
        $det=$_GET['delete'];
       
        $sql="DELETE FROM `cart` WHERE  product_id='$det' ";      
      $db = mysqli_connect("localhost", "root", "", "project");
      $result=mysqli_query($db,$sql);
      if($result){
            echo "<script>alert('Item deleted from cart') </script>";
            header('location:cart.php');
      }else{
        die(mysqli_error($db));
      }


    }


?>