<?php
include_once('../../connection.php');
include('../../functions.php');
include('../../fonts.php');
session_start();

?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
   <link rel="stylesheet" href="shopFrAdminStyle.css">
   <style>
    
    </style>
</head>
<body>
    
    <!-- FIRST -->
    <!-- Nav Bar -->
    <div class="container-fluid   p-0">
    <nav class="navbar navbar-expand-lg " id="nav">
      <a class="navbar-brand title  mx-4" href="#"><h2 id="kids">KIDS<span>PLANET. </span></h2></a>
  
      

  <div class="collapse navbar-collapse " id="navbarSupportedContent">
    <ul class="navbar-nav ms-auto ">
      <!-- <li class="nav-item active px-3">
        <a class="nav-link" href="shopForAdmin.php">Home </a>
      </li>
      -->


      <?php
                 
                 if(!isset($_SESSION['admin'])){
                   echo "<li class='nav-item  px-2'>
                   <a class='nav-link '  href='adminLog.php' >Register</a>
                 </li>
                 ";
                 }else{
                  echo "<li class='nav-item px-2'>
                  <a class='nav-link '  href='../adminProfile.php'>Admin Profile</a>
                </li>
                ";
                 }
               
     ?>

      <li class="nav-item px-3 ">
         
          <?php
                  if(!isset($_SESSION['admin'])){
                    echo "<li class='nav-item px-3 '>
                      <a class='nav-link text-primary ' id='logs' href='adminLog.php'> Log In Here!</a></li>";
                  }else{
                    echo "<li class='nav-item px-3'>
                      <a class='nav-link text-primary ' id='logs' href='adminLogout.php'>Log Out</a> </li>";
                  }
                ?>

      </li>
       
    </ul> 
    
  </div>
</nav>



<!-- SECOND -->
<nav class="navbar navbar-expand-lg navbar-dark  ">
        <ul class="navbar-nav me-auto">
        <li class="nav-item px-2">
                <?php
                  if(isset($_SESSION['admin'])){
                    echo "<li class='nav-item text-dark mx-2'>
                       <font size='4'> Welcome $_SESSION[admin] </font></li>";
                  }
                ?>
              </li>

     
       </ul>
    </nav>



       <!---------------------home section------------------>

       <section class="home" id="home">
             <div class="content">
                  <h3> <span style="font-size: 3rem;">Welcome to</span> Kidsplanet<span style="color: blue;">.</span></h3>
                  <p>We brings you a delightful assortment of toys and fashionable clothing for all ages. At our 
                      shop, we aim to create an enchaning and joyful experience for our customers.</p>
                  <a href="#" class="btn">Register</a>
             </div>
             
             <div class="image">
                  <!-- <img src="images/s1.png"  alt=""> -->
                  <img src="../../images/202.jpg" alt="">
             </div>

    </section >

    

                      <!------------Category section------------------>
                                      
                      <div class="row">
                      <div class="col-md-1"></div>

                      <div class="col-md-10">
                      

                            <div class="row">
                            <h2 class="mt-5 ">Shop by Category</h2><hr>
                           
                            <?php
                                  $db = mysqli_connect("localhost", "root", "", "project");
                                  $selectCategory="select * from categories";
                                  $resultCategory=mysqli_query($db, $selectCategory);
                                  
                                  
                                  while($row=mysqli_fetch_assoc($resultCategory)){
                            
                                     $name= $row['categoryName'];
                                     $image= $row['categoryImage'];
                                    
                                    echo "<div class='col-md-3 mb-2 d-flex' >
                                        <div class='categoryCard '>
                                        <img src='../categoryImages/$image' class='categoryImage' alt='' >
                                          <div class='categoryBody'>
                                              <h3 class='cont'> $name</h3>
                                              
                                              <a href='#'  class='btn btn-primary text-light mb-5 mx-2 '  id='shopMore'>  Shop More
                                                
                                              </a>
                                          </div>

                                    </div>
                                  </div>";
                                  
                                  }
            
                            ?>
                            </div>
                            </div>

                      </div>

                      <div class="col-md-1"></div>


   
 
<!-- FOURTH -->
    <div class="row mt-4">
       
        <div class="col-md-1"></div>
        <div class="col-md-10 ">
          <div class="row">
          

          <h2 class="mt-5">Latest Products</h2><hr>

          <!-- fetching --> 
          <?php
            $db = mysqli_connect("localhost", "root", "", "project");
            $select="select * from toys";
            $result=mysqli_query($db, $select);
            
            
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
                    <div class='card border-black rounded-0' >
                        <img src='../../img/$image' class='card-img-top' alt='$name' height='250px'>
                            <div class='card-body '>
                              <h4 class='card-title'>$name</h4>
                              <hr>
                              <p class='card-text'>$description</p>
                              
                                <h6 class='cardTitle'> Rs:$price</h6>
                              
                        </div>
                    </div>
                  </div>";
              }else{
                    echo "<div class='col-md-3 mt-3 mb-2 d-flex' id='content'>
                    <div class='card border-black rounded-0' id='grayscale'>
                        <img src='../../img/$image' class='card-img-top' alt='$name' height='250px'>
                            <div class='card-body '>
                              <h4 class='card-title'>$name</h4>
                              <hr>
                              <p class='card-text'>$description</p>
                              
                                <h6 class='cardTitle'> Rs:$price</h6>
                                <p class='cardOutofStock'>Out of Stock</p>
                              
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



<!------------- Review Section ----------->

<div class="row mt-4 " id="reviewSection">
     
     <div class="col-md-1"></div>

     <div class="col-md-10 ">
        <div class="row mt-5">

        <?php
                    
              // fetching reviews
              $selectShowReview="SELECT * from reviews ";
              $db = mysqli_connect("localhost", "root", "", "project");
              $resultShowReview=mysqli_query($db,  $selectShowReview);
              $count=mysqli_num_rows($resultShowReview);
              if($count>0){
                      
                     echo "<h2 class='mt-5 '>Customer Feedback</h2><hr>";
                    

                     //Initialize with empty value
                    $showReview = ""; 
                    $showStars = "";  
                
                     while($rowReview=mysqli_fetch_array($resultShowReview)){
                       $reviewId=$rowReview['id'];
                       $reviewName=$rowReview['user_name'];
                       $reviewImg=$rowReview['user_image'];
                       $showReview=$rowReview['feedback'];
                       $showStars=$rowReview['stars'];

                       echo"
                       <div class=' col-md-3 review-container mt-4 mb-3' >
                          <div class='reviewBox'>
                              <img src='../../users/images/$reviewImg' alt='' >
                              <h3>$reviewName</h3>
                              <p>$showReview</p> "; ?>


                              <?php 
                                     if($showStars==1){
                                        echo '
                                        <div class="star-wrapper">
                                        <input class="star" type="checkbox" title="bookmark page" checked> 
                                        <input class="star" type="checkbox" title="bookmark page" >
                                        <input class="star" type="checkbox" title="bookmark page" >
                                        <input class="star" type="checkbox" title="bookmark page" >
                                        <input class="star" type="checkbox" title="bookmark page" >
                                        </div>';      
                                     }else if($showStars==2){
                                        echo '
                                        <input class="star" type="checkbox" title="bookmark page" checked> 
                                        <input class="star" type="checkbox" title="bookmark page" checked>
                                        <input class="star" type="checkbox" title="bookmark page" >
                                        <input class="star" type="checkbox" title="bookmark page" >
                                        <input class="star" type="checkbox" title="bookmark page" >';      
                                     }else if($showStars==3){
                                        echo '
                                        <input class="star" type="checkbox" title="bookmark page" checked> 
                                        <input class="star" type="checkbox" title="bookmark page" checked>
                                        <input class="star" type="checkbox" title="bookmark page" checked>
                                        <input class="star" type="checkbox" title="bookmark page" >
                                        <input class="star" type="checkbox" title="bookmark page" >';      
                                     }
                                     else if($showStars==4){
                                        echo '
                                        <input class="star" type="checkbox" title="bookmark page" checked> 
                                        <input class="star" type="checkbox" title="bookmark page" checked>
                                        <input class="star" type="checkbox" title="bookmark page" checked>
                                        <input class="star" type="checkbox" title="bookmark page" checked>
                                        <input class="star" type="checkbox" title="bookmark page" >';      
                                     }else if($showStars==5){
                                        echo '
                                        <input class="star" type="checkbox" title="bookmark page" checked> 
                                        <input class="star" type="checkbox" title="bookmark page" checked>
                                        <input class="star" type="checkbox" title="bookmark page" checked>
                                        <input class="star" type="checkbox" title="bookmark page" checked>
                                        <input class="star" type="checkbox" title="bookmark page" checked >';
                                     }
                                ?>
                            


                          <?php echo "</div>
   
                     
                     </div>
                       ";
                     } 
              }
              
              ?>
                      
        </div>
     </div>

     <div class="col-md-1"></div>
</div>



<!-- footer -->
 <?php include("../../footer.php"); ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>


