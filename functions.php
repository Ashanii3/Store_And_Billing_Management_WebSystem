<?php
include('connection.php');
//@session_start();



//function-item numbers in cart 
function cartAmount(){
  if(isset($_SESSION['username'])){

    if(isset($_GET['toCart'])){
        //$ip = getIPAddress(); 
        $user_Id= $_SESSION['userId'];

        $db = mysqli_connect("localhost", "root", "", "project");
        $select2="Select * from cart where user_id='$user_Id' ";
        $result=mysqli_query($db, $select2);

        $count=mysqli_num_rows($result);
        }else{
        //   $ip = getIPAddress(); 
        $user_Id= $_SESSION['userId'];
        
          $db = mysqli_connect("localhost", "root", "", "project");
          $select3="Select * from cart where user_id='$user_Id'";
          $result=mysqli_query($db, $select3);

          $count=mysqli_num_rows($result);
        }
        
      //echo $count;
      $_SESSION['count']=$count;

      }  
}


//function for total price
function totalPrice(){

  if(isset($_SESSION['username'])){
    $sum=0;
    $user_Id= $_SESSION['userId'];

    $query="SELECT SUM(price) AS total_sum FROM cart where user_id='$user_Id'";
               $db = mysqli_connect("localhost", "root", "", "project");
              $execute=mysqli_query($db, $query);

              if($execute->num_rows > 0){
                 // Fetch the sum value
                    $row = $execute->fetch_assoc();
                    $sumTotal = $row["total_sum"];


    }
    //echo $sum;
    $_SESSION['tot']=$sumTotal;

  }
}



?>