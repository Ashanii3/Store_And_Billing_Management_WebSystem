 <?php
include_once('connection.php');
include('functions.php');
include('fonts.php');

session_start();

?> 

<html>

<head>
    <title>shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <link rel="stylesheet" href="shopStyles.css">

   <style>
        #nav{
          position: fixed;
          top: 0;
          left: 0;
          width: 100%;
          height: 60px;
          background-color: transparent;
          transition: background-color 0.3s ease-in-out;
          z-index: 1000; 
        }

        #nav.dark {
          background-color: #333; 
          color: white;
        }

        #navTwo{
          padding-top: 70px;
        }

    </style>
</head>

<body>
    <div class="mainsection">
    <!-- FIRST -->
    <!-- Nav Bar -->
    <div class="container-fluid   p-0">
    <nav class="navbar navbar-expand-lg " id="nav">
      <a class="navbar-brand title mx-4" href="#"><h2 id="kids">KIDS<span>PLANET. </span></h2></a>
  

  <div class="collapse navbar-collapse " id="navbarSupportedContent">
    <ul class="navbar-nav ms-auto ">
      
      <li class="nav-item active  px-3 ">
        <a class="nav-link " href="shop.php" id="subText">Home </a>
      </li>

      <?php
                 
                 if(!isset($_SESSION['username'])){
                   echo "<li class='nav-item  px-3'>
                   <a class='nav-link '  href='./users/register.php' id='subTextRegister'>Register</a>
                 </li>
                 ";
                 }else{
                  echo "<li class='nav-item px-3'>
                  <a class='nav-link ' id='subTextRegister' href='./users/myprofile.php'>My Account</a>
                </li>
                ";
                 }
               
     ?>


      <li class="nav-item px-3">
        <a class="nav-link " id="subTextReview" href="#reviewSection">Reviews </a>
      </li>

      <li class="nav-item px-3">
        <a class="nav-link " id="subTextAbout" href="contact.php">Contact </a>
      </li>
      
      <li class="nav-item px-5">
              <?php
                  cartAmount();
                 // $cnt= $_SESSION['count'];
                  if(!isset($_SESSION['username'])){
                    
                    echo "<li class='nav-item  '>
                      <a class='nav-link'  id='subTextCart' href='cart.php'><i class='fa-solid fa-cart-shopping'></i> <sup>0</sup></a> </li>";

                  }else{
                    echo "<li class='nav-item  '>
                     <a class='nav-link ' id='subTextCart'  href='cart.php'> <i class='fa-solid fa-cart-shopping'></i> <sup>$_SESSION[count] </sup> </a></li>";
                    
                    
                  }
                
                ?>
      </li>
      <li class="nav-item px-2">
        
              <?php
                  totalPrice();
                  // $sss=$_SESSION['totals'];
                  if(!isset($_SESSION['username'])){
                    
                    echo "<li class='nav-item '>
                      <a class='nav-link ' id='subTextTotal'  href='#'>Total: 0/- </a> </li> ";
                  }else{
                    echo "<li class='nav-item '>
                    <a class='nav-link ' id='subTextTotal' href='#'>Total:  $_SESSION[tot]/-</a></li>";
                  }
                
                ?>
      </li> 

      <li class="nav-item px-2">
         
          <?php
                  if(!isset($_SESSION['username'])){
                    echo "<li class='nav-item px-1 '>
                      <a class='nav-link text-primary '  href='./users/log.php'>Log In Here!</a></li>";
                  }else{
                    echo "<li class='nav-item px-1'>
                      <a class='nav-link text-primary'  href='./users/logout.php'>Log Out</a> </li>";
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
                    echo "<li class='nav-item text-dark mx-2'>
                        <font size='4'> Welcome Guest </font>  </li>";
                  }else{
                    echo "<li class='nav-item text-dark mx-2'>
                        <font size='4'> Welcome $_SESSION[username] </font></li>";
                  }
                ?>
              </li>

              <form class="d-flex my-2  my-lg-0 " id="searchbar" action="searching.php" method="GET">
                        
                            <input type="text"  placeholder="Search Here"  name="data" >
                            <button type="submit" value="Search" name="product">
                              <i class="fas fa-search"></i> 
                            </button>
              </form>

       </ul>
    </nav>

    <!---------------------home section------------------>

    <section class="home" id="home">
             <div class="content">
                  <h3> <span style="font-size: 3rem;">Welcome to</span> Kidsplanet<span style="color: blue;">.</span></h3>
                  <p>We brings you a delightful assortment of toys and fashionable clothing for all ages. At our 
                      shop, we aim to create an enchaning and joyful experience for our customers.</p>
                    
                      <?php
                            if(!isset($_SESSION['username'])){
                                echo " <a href='./users/register.php' class='btn'>Register</a>";
                            }
                      ?>
                 

             </div>
             
             <div class="image">
                  <img src="images/202.jpg"  alt="">
                  <!-- <img src="images/analysis.png" alt=""> -->
             </div>

    </section >




    </div>
  </div>
<!-----mainsection ends----------------------------->



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
                                    
                                    echo "<div class='col-md-3 mb-2 d-flex' id='categories'>
                                        <div class='categoryCard '>
                                        <img src='admin/categoryImages/$image' class='categoryImage' alt='' >
                                          <div class='categoryBody'>
                                              <h3 class='cont'> $name</h3>
                                              
                                              <a href='shopCategories.php?category=$name'  class='btn btn-primary text-light mb-5 mx-2 '  id='shopMore'>  Shop More
                                                
                                              </a>
                                          </div>

                                    </div>
                                  </div>";
                                  
                                  }
            
                            ?>
                            </div>
                            </div>

                            <div class="col-md-1"></div>
                      </div>

                     
               
                 

 
<!-- FOURTH -->
    <div class="row mt-4">
     
        <div class="col-md-1"></div>
        <div class="col-md-10 ">
          <div class="row mt-5">
          
          
          <h2 class="mt-5 ">Latest Products</h2><hr>

          <!-- fetching --> 
          <?php
            $db = mysqli_connect("localhost", "root", "", "project");


            // Fetch categories
          $selectCategory = "SELECT * FROM categories";
          $resultCategory = mysqli_query($db, $selectCategory);

          while ($rowCate = mysqli_fetch_assoc($resultCategory)) {
            $categoryName = $rowCate['categoryName'];

            //fetching limited products according to the categories
            $select="select * from toys where category='$categoryName' LIMIT 3";
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
          } 
          ?>

         
        </div>
    </div>
    <div class="col-md-1"></div>


</div>


<!------------- Review Section ----------->

<div class="row mt-5 " id="reviewSection">
     
     <div class="col-md-1"></div>

     <div class="col-md-10 ">
        <div class="row mt-5">

        <?php
                    
              // fetching reviews
              $selectShowReview="SELECT * from reviews LIMIT 8";
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
                              <img src='./users/images/$reviewImg' alt='' >
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
 <?php include("footer.php"); ?>

 <!--JS for scrolling navbar-->
 <script>
          const navbar = document.querySelector('#nav');
          const kidsText = document.querySelector('#kids');
          const subText = document.querySelector('#subText');
          const subTextReg = document.querySelector('#subTextRegister');
          const subTextAbout = document.querySelector('#subTextAbout');
          const subTextReview = document.querySelector('#subTextReview');
          const subTextCart = document.querySelector('#subTextCart');
          const subTextTot = document.querySelector('#subTextTotal');
          

          // Function to handle the scroll event
          function handleScroll() {
            const scrollY = window.scrollY;
            const scrollThreshold = 580; 

            if (scrollY > scrollThreshold) {
              navbar.classList.add('dark');
              kidsText.style.color = 'white';
              subText.style.color = '#c1c3c7';
              subTextReg.style.color='#c1c3c7';
              subTextAbout.style.color='#c1c3c7';
              subTextReview.style.color='#c1c3c7';
              subTextCart.style.color='#c1c3c7';
              subTextTot.style.color='#c1c3c7';
            
            } else {
              kidsText.style.color = 'black';
              subText.style.color = 'grey';
              subTextReg.style.color = 'grey';
              subTextAbout.style.color='grey';
              subTextReview.style.color='grey';
              subTextCart.style.color='grey';
              subTextTot.style.color='grey';
              navbar.classList.remove('dark');
              
              
            }
          }
          window.addEventListener('scroll', handleScroll);

   </script>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>




<!--adding to cart -->
<?php
  if(!isset($_SESSION['username'])){
  
          if(isset($_GET['toCart'])){
            echo "<script> alert ('LogIn to add to Cart')</script>";
          }


  } else{
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
              }else{

                $select="SELECT * FROM cart WHERE user_id='$user_Id' and product_id=$pdt_id ";
                $result=mysqli_query($db, $select);
                
              
                $rowAmounts=mysqli_num_rows($result);
                if($rowAmounts>0){
                  echo "<script> alert ('Item is already in the cart')</script>";
                  echo "<script>window.open('shop.php','_self')</script>";
                }else{
                  $insert="insert into cart(product_id,user_id,quantity,price) values (".$pdt_id.",".$user_Id.",1,".$pdt_price.")";
                  $result=mysqli_query($db, $insert);
                  echo "<script> alert ('Successfully added to the cart')</script>";
                  echo "<script>window.open('shop.php','_self')</script>";
                }
              }
        }
  
      }
 

?>
