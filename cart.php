<?php
include('connection.php');
include('functions.php');
include('fonts.php');

session_start();

?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <link rel="stylesheet" href="style.css">
   <style>
    #nav{
  /* position: webkit-sticky;
  position: sticky;
  top: 0; */
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 60px;
  background-color: transparent;
  transition: background-color 0.3s ease-in-out;
  z-index: 1000; 
 
 }
 #navTwo{
  padding-top: 70px;
}
#searchbar{
    position: absolute;
    right: 10px;
   
} 

    .title span{
        color:#0275d8
      }
    #pic{
        width: 100px;
        height: 100px;
        object-fit: fill;
    }
    body{
      overflow-x: hidden;
      background-color:#f2f4f7;
    }
    #title{
      padding-top: 25px;
    }

   
    table thead{
      color: #c0c0c2;
    }
   </style>
</head>
<body>

   <!-- FIRST -->
    <!-- Nav Bar -->
    <div class="container-fluid   p-0">
    <nav class="navbar navbar-expand-lg" id="nav">
      <a class="navbar-brand title  mx-4" href="#"><h2>KIDS<span>PLANET.</span></h2></a>
  
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

  <div class="collapse navbar-collapse " id="navbarSupportedContent">
    <ul class="navbar-nav ms-auto ">
      <li class="nav-item active px-3">
        <a class="nav-link" href="shop.php">Home </a>
      </li>
      

       <?php
                 
                 if(!isset($_SESSION['username'])){
                   echo "<li class='nav-item px-3'>
                   <a class='nav-link' href='./users/register.php'>Register</a>
                 </li>
                 ";
                 }else{
                  echo "<li class='nav-item px-3'>
                  <a class='nav-link' href='./users/myprofile.php'>My Account</a>
                </li>
                ";
                 }
               
     ?>


      <li class="nav-item px-3">
        <a class="nav-link " id="subTextReview" href="shop.php#reviewSection">Reviews </a>
      </li>

      <li class="nav-item px-3">
        <a class="nav-link " id="subTextAbout" href="contact.php">Contact </a>
      </li>
     

      <li class="nav-item px-5 ">
       
      
      <?php
          cartAmount();
                  if(!isset($_SESSION['username'])){
                    
                    echo "<li class='nav-item  '>
                      <a class='nav-link'  href='cart.php'><i class='fa-solid fa-cart-shopping'></i> <sup></sup></a> </li> ";

                  }else{
                    echo "<li class='nav-item '>
                    <a class='nav-link'  href='cart.php'><i class='fa-solid fa-cart-shopping'></i> <sup> $_SESSION[count]  </sup>
                    </a></li>";
                  }
                
                ?>
        </li>
      <li class="nav-item px-2">
        
        <?php
                  totalPrice();
                  if(!isset($_SESSION['username'])){
                    
                    echo "<li class='nav-item  '>
                      <a class='nav-link'  href='#'>Total: 0/- </a> </li> ";
                  }else{
                    echo "<li class='nav-item '>
                    <a class='nav-link' href='#'>Total :  $_SESSION[tot]/-</a></li>";
                  }
                
       ?>
      </li>

      <li class="nav-item px-2">
                  <?php
                  if(!isset($_SESSION['username'])){
                    echo "<li class='nav-item px-1 '>
                      <a class='nav-link text-primary' href='./users/log.php'> Log In Here! </font> </a> </li>";
                  }else{
                    echo "<li class='nav-item px-1'>
                      <a class='nav-link text-primary' href='./users/logout.php'>Log Out</font> </a> </li>";
                  }
                ?>
      </li>
   

    </ul>
  </div>
</nav>

<!-- SECOND -->
<nav class="navbar navbar-expand-lg navbar-dark " id="navTwo">
        <ul class="navbar-nav me-auto">
        <li class="nav-item px-2">
                <?php
                  if(!isset($_SESSION['username'])){
                    echo "<li class='nav-item text-dark mx-2'>
                        <font size='4'> Welcome Guest </font>  </li>";
                  }else{
                    echo "<li class='nav-item text-dark mx-2'>
                        <font size='4'> Welcome $_SESSION[username] </font></li>";
                  }
                ?>
              </li>

  

       </ul>
    </nav>

<!-- THIRD -->
     <center><h1 class="mt-3">CART</h1></center>
 

<!-- cart details -->
    <div class="container mt-4 ">
        <div class="row d-flex ">
          <div class="col-md-1"></div>
          <div class="col-md-10">
            <div class="col-md-12 ">
     
            <form action="" method="POST">     
             
            <table class="table text-center  table-striped table-hover rounded-3" width="100%">
              
                <tr>
                   
                  <!-- php code -->
                    <?php

                    if(isset($_SESSION['username'])){

                      $user_Id= $_SESSION['userId'];
                     $sum=0;
                     $pdt_id;
                     
                     $priceQuery="select * from cart where user_id='$user_Id'";
                     $db = mysqli_connect("localhost", "root", "", "project");
                     $result=mysqli_query($db, $priceQuery);
                     $resultCount=mysqli_num_rows($result);
                    
                    if($resultCount>0){
                      echo "<thead class='bg-dark'>
                      <tr>
                          <th >Name</th>
                          <th>ID</th>
                          <th>Image</th>
                          <th>Quantity</th>
                          <th>Price</th>
                          <th>Sub Total</th>
                          <th>Action</th>
                      </tr>
                      </thead>";
                     
                     
                     while($row=mysqli_fetch_array($result)){
                         $pdt_id=$row['product_id'];
                         $quan=$row['quantity'];
                         $pdt_price=$row['price'];
                         $fetchPrices="select * from toys where id='$pdt_id'";
                         $resultPrices=mysqli_query($db, $fetchPrices);
                         $totalPrice=array($row['price']);

                         while($rowPrice=mysqli_fetch_array($resultPrices)){
                             $price_of_products=array($rowPrice['price']);
                             $priceTable=$rowPrice['price'];
                             $name=$rowPrice['name'];
                             $image=$rowPrice['photo'];
                             $sumTotal=array_sum($totalPrice);

                             $total=array_sum($price_of_products);
                             $sum+=$total;
                       
                             echo'
                            <td>  '.$name.'</td>
                            <td> '.$pdt_id.'</td>
                            <td><img src="img/'. $image.'" alt="" id="pic"></td>

                            <form method="POST">
                            <td>

                            <input  type="hidden"  name="qid" value=" '.$pdt_id.'">
                            <input  type="hidden"  name="priceT" value=" '.$priceTable.'">
                            <input class="text-center w-25 " type="text" onchange="updateParagraph()" placeholder="'.$quan.'" name="qty" min="1" max-"5">                
                            <input type="submit" name="updt" value="Update" class="btn btn-outline-success mx-3 fw-bold ">

                            </td>
                  
                            <td>'.$priceTable.'/-</td>
                        
                            <td>'.$sumTotal.'/-</td>

                            <td>
                                
                                <button  name="removing" class="btn btn-outline-danger "><a href="delete.php?delete='.$pdt_id.'" class="fw-bold text-dark text-decoration-none">Delete</a></button>
                            </td>
                            
                            
                          </form>
                        </tr>';
                      ?>
                <?php 
                        }
                     }
                    }else{
                      echo "<h3 class='text-center text-danger mt-4'>Cart is empty</h3>";
                    }

                  }
                ?>
            </table>  
            


            <!--------------------php for total sum--------------->
            <?php
              if (isset($_SESSION['username'])){

               $user_Id= $_SESSION['userId'];
        
              $priceQuery2="select * from cart where user_id='$user_Id'";
              $db = mysqli_connect("localhost", "root", "", "project");
              $result2=mysqli_query($db, $priceQuery2);
              $resultCount2=mysqli_num_rows($result2);
              if($resultCount2>0){

              echo"
                <div  class='' id='title'>
                    <h3 class='mt-5'>TOTAL: <span style='font-weight: bolder;'> $_SESSION[tot]/-</span></h3>
                </div> " ;
              
            }
          }
           ?>

          <!----------------------userid for payments------------->
          <?php  
          if(isset($_SESSION['username'])){
              $user_Id= $_SESSION['userId'];
              $getUser="select * from cart where user_id='$user_Id'";
              $db = mysqli_connect("localhost", "root", "", "project");
              $resultUser=mysqli_query($db, $getUser);
              $run_user=mysqli_fetch_array($resultUser);
              if($run_user){
                $userID=$run_user['user_id'];
              }
          
          }
          ?>


          <!----------------------buttons------------->
           <?php 
            if(isset($_SESSION['username'])){

            $user_Id= $_SESSION['userId'];
            $priceQuery3="select * from cart where user_id='$user_Id'";
            $db = mysqli_connect("localhost", "root", "", "project");
            $result3=mysqli_query($db, $priceQuery3);
            $resultCount3=mysqli_num_rows($result3);
            if($resultCount3>0){

            echo"
            <div class='my-3 '>
                    <button class='btn btn-primary rounded-0 my-2 '' ><a href='shop.php' class='text-light  text-decoration-none'><i class='fa-sharp fa-solid fa-circle-arrow-left'></i> Continue shopping</a></button>
                     <button class='btn btn-primary rounded-0 my-2 mx-4' ><a href='checkOut.php?id=$userID'  class='text-light   text-decoration-none '><i class='fa-solid fa-money-check-dollar'></i>  Proceed to Check Out </a></button> 
                
            </div>";  
            }else{
               echo '<button class="btn btn-primary rounded-0 my-4" ><a href="shop.php" class="text-light  text-decoration-none"><i class="fa-sharp fa-solid fa-circle-arrow-left"></i> Continue shopping</a></button>';
            }

           }
          
          ?>
        </div>
        </div>
        <div class="col-md-1"></div>
    
</form> 
</div>  
</div>



<!-------------------------update quantity-------------->
<?php

        if (isset($_POST['updt'])){

          $user_Id= $_SESSION['userId'];

          $qty=intval($_POST['qty']);
          $dataid=$_POST['qid'];
          $p=$_POST['priceT'];


          $selectToys="SELECT * FROM toys WHERE id=$pdt_id";
          $resultToys=mysqli_query($db, $selectToys);
          $rowToys=mysqli_fetch_assoc($resultToys);
              $remainingStock=$rowToys['remainingStock'];
              
              if($remainingStock>=$qty){
                $Addition=$p*$qty;

                $sql="UPDATE cart SET quantity=$qty,price=$Addition WHERE user_id='$user_Id' and product_id=$dataid ";
                
                          $db = mysqli_connect("localhost", "root", "", "project");
                          $results=mysqli_query($db,$sql);
                          // echo "<script> alert ('Successfully Updated')</script>";
                          totalPrice();
                          echo "<script>window.open('cart.php','_self')</script>";
              
              
              }else{
                   echo "<script> alert (' Only $remainingStock items available in stock')</script>";
              }
         
        } 

?>
</div>
    

<!-- footer -->
 <?php 
//  include("footer2.php"); ?> 

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>


