<?php
include_once('connection.php');
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
    <title>Shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <link rel="stylesheet" href="shopStyles.css">
   <style>

      #nav{
        /* position: webkit-sticky;
        position: sticky;
        top: 0; */
        position: sticky;
        top: 0;
        left: 0;
        width: 100%;
        height: 60px;
        background-color: transparent;
        transition: background-color 0.3s ease-in-out;
        z-index: 1000; 
      }
    
  

    </style>
</head>
<body>
    
    <!-- FIRST -->
    <!-- Nav Bar -->
    <div class="container-fluid   p-0">
    <nav class="navbar navbar-expand-lg" id="nav">
      <a class="navbar-brand title mx-4" href="#"><h2>KIDS<span>PLANET. </span></h2></a>
  
  <div class="collapse navbar-collapse " id="navbarSupportedContent">
    <ul class="navbar-nav ms-auto ">
      
      <li class="nav-item active  px-3">
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
        <a class="nav-link "  href="shop.php#reviewSection">Reviews </a>
      </li>

      <li class="nav-item px-3">
        <a class="nav-link "  href="contact.php">Contact </a>
      </li>
 
      
      <li class="nav-item px-5">
              <?php
                  cartAmount();
                 // $cnt= $_SESSION['count'];
                  if(!isset($_SESSION['username'])){
                    
                    echo "<li class='nav-item  '>
                      <a class='nav-link'  href='cart.php'><i class='fa-solid fa-cart-shopping'></i> <sup>0</sup></a> </li>";

                  }else{
                    echo "<li class='nav-item  '>
                     <a class='nav-link'  href='cart.php'> <i class='fa-solid fa-cart-shopping'></i> <sup>$_SESSION[count] </sup> </a></li>";
                    
                    
                  }
                
                ?>
      </li>
      <li class="nav-item px-2">
        
              <?php
                  totalPrice();
                  // $sss=$_SESSION['totals'];
                  if(!isset($_SESSION['username'])){
                    
                    echo "<li class='nav-item '>
                      <a class='nav-link'  href='#'>Total: 0/- </a> </li> ";
                  }else{
                    echo "<li class='nav-item '>
                    <a class='nav-link' href='#'>Total:  $_SESSION[tot]/-</a></li>";
                  }
                
                ?>
      </li> 

      <li class="nav-item px-2">
         
          <?php
                  if(!isset($_SESSION['username'])){
                    echo "<li class='nav-item px-1 '>
                      <a class='nav-link text-primary' href='./users/log.php'> Log In Here!</a></li>";
                  }else{
                    echo "<li class='nav-item px-1'>
                      <a class='nav-link text-primary' href='./users/logout.php'>Log Out</a> </li>";
                  }
                ?>

      </li>

    </ul> 

  </div>
</nav>


<!-- SECOND -->
<nav class="navbar navbar-expand-lg navbar-dark  " id="navTwo">
        <ul class="navbar-nav me-auto">
        <li class="nav-item px-2">
                <?php
                  if(!isset($_SESSION['username'])){
                    echo "<li class='nav-item '>
                         <a class='nav-link text-dark' href='#'><font size='4'> Welcome Guest </font></a>  </li>";
                  }else{
                    echo "<li class='nav-item '>
                        <a class='nav-link text-dark' href='#'><font size='4'> Welcome $_SESSION[username] </font></a></li>";
                  }
                ?>
              </li>


       </ul>
    </nav>


  </div>
                 

 
<!-- FOURTH -->
    <div class="row mt-4">
       
        <div class="col-md-1"></div>
        <div class="col-md-10 ">
          <div class="row">
          
          <!------------fetching Category section------------------>
          <?php
      
                    $cat_name=$_GET['category']; ?>
                    <h2 class="mt-4"><?php echo $cat_name?></h2>
                    <hr>
        <?php
                    $db = mysqli_connect("localhost", "root", "", "project");
                    $selectCategories="SELECT * from toys where category='$cat_name'";
                    $result=mysqli_query($db, $selectCategories);
                        
                        
                        while($row=mysqli_fetch_assoc($result)){
                            $id= $row['id'];
                            $name= $row['name'];
                            $description= $row['description'];
                            $price=$row['price'];
                            $image= $row['photo'];
                            $stock=$row['stock'];
                            $quty=0;
                            
                                  if($stock=="Yes"){
                                    echo "<div class='col-md-3 mt-3 mb-2 d-flex' id='content'>
                                    <div class='card border-secondary rounded-0'>
                                        <img src='img/$image' class='card-img-top' alt='$name' height='250px'>
                                            <div class='card-body '>
                                              <h4 class='card-title'>$name</h4>
                                              <hr>
                                              <p class='card-text'>$description</p>
                                              
                                                <h6 class='cardTitle'> Rs:$price</h6>
                                                
                                                <a href='shop.php?toCart=$id & itprice=$price'  class='btn btn-outline-primary rounded-0' id='cartBtn' name='addToCart'>
                                                <i class='fa-solid fa-cart-plus' id='cartIcon'></i> Add To Cart
                                                          
                                                </a>
                                              
                                        </div>
                                    </div>
                                  </div>";
                
                                  }else{
                                          echo "<div class='col-md-3 mt-3 mb-2 d-flex' >
                                          <div class='card border-secondary rounded-0' id='grayscale'>
                                              <img src='img/$image' class='card-img-top' alt='$name' height='250px'>
                                                  <div class='card-body '>
                                                    <h4 class='card-title'>$name</h4>
                                                    <hr>
                                                    <p class='card-text'>$description</p>
                                                    
                                                      <h6 class='cardTitle'> Rs:$price</h6>
                                                      <p class='cardOutofStock'>Out of Stock</p>
                                                      <a href='shop.php?toCart=$id & itprice=$price'  class='btn btn-outline-primary rounded-0' id='cartBtn' name='addToCart'>
                                                      <i class='fa-solid fa-cart-plus' id='cartIcon'></i> Add To Cart
                                                                
                                                      </a>
                                                    
                                              </div>
                                          </div>
                                        </div>";
                                  }
                      
                      
                        
                        }
    

    ?>
 

         
        </div>
    </div>
    <div class="col-md-1"></div>


</div>

<!-- cart -->
<?php
  if(!isset($_SESSION['username'])){
          if(isset($_GET['toCart'])){
            echo "<script> alert ('LogIn to add to Cart')</script>";
          }


  }else{
        if(isset($_GET['toCart'])){
          $db = mysqli_connect("localhost", "root", "", "project");
          
          $pdt_id=$_GET['toCart'];
          $pdt_price=$_GET['itprice'];
          $user_Id= $_SESSION['userId'];


          //////adding to cart if stock is available

          $selectToys="SELECT * FROM toys WHERE id=$pdt_id";
          $resultToys=mysqli_query($db, $selectToys);
          $rowToys=mysqli_fetch_assoc($resultToys);
              $remainingStock=$rowToys['remainingStock'];
              if($remainingStock==0){
                  echo "<script> alert ('Item stock Unavialable')</script>"; 
                  echo "<script>window.open('shopCategories.php','_self')</script>"; 
              }else{

                $select="SELECT * FROM cart WHERE user_id='$user_Id' and product_id=$pdt_id ";
                $result=mysqli_query($db, $select);
                
              
                $rowAmounts=mysqli_num_rows($result);
                if($rowAmounts>0){
                  echo "<script> alert ('Item is already in the cart')</script>";
                  echo "<script>window.open('shopCategories.php','_self')</script>";
                }else{
                  $insert="insert into cart(product_id,user_id,quantity,price) values (".$pdt_id.",".$user_Id.",1,".$pdt_price.")";
                  $result=mysqli_query($db, $insert);
                  echo "<script> alert ('Successfully added to the cart')</script>";
                  echo "<script>window.open('shopCategories.php','_self')</script>";
                }
              }
          
        }
  
    }  
 

?>




<!-- footer -->
 <?php 
//  include("footer.php"); ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>


