<?php
include_once('../connection.php');
include('../functions.php');
session_start();

?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Welcome <?php
    if(isset($_SESSION['username'])){
      echo $_SESSION['username'];
    }else{
      echo "Guest";
    }
    ?> 
    </title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
   <link rel="stylesheet" href="myprofilestyle.css">
   <style>
 

      
      .title span{
        color:#0275d8
      }

      #nav{
        position: static;
        top: 0;
        left: 0;
        width: 100%;
        height: 60px;
        background-color: transparent;
        transition: background-color 0.3s ease-in-out;
        z-index: 1000; 
        
      }

      
      .image{
            width: 45px;
            height: 45px;
            object-fit: cover;
            border-radius: 50%;
        }
        .navig ul li:hover a{
          /* color:  #635e5e; */
          color: blue;
        }
        table{
        margin-left: 20px;
      }
      
    </style>
</head>
<body>
    
    
    <!-- Nav Bar -->
    <div class="container-fluid   p-0">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark " id="nav">
      <a class="navbar-brand title mx-4" href="#"><h2>KIDS<span>PLANET.</span></h2></a>
  

  <div class="collapse navbar-collapse " id="navbarSupportedContent">
    <ul class="navbar-nav ms-auto px-4">
      <li class="nav-item active px-4">
        <a class="nav-link" href="../shop.php">Home </a>
      </li>
  

      <li class="nav-item px-3 " >
      <?php
               if(isset($_SESSION['username'])){
                echo "<li class='nav-item '>
                <span style='color:grey; font-size:27px; '> $_SESSION[username]</span></li> ";
              

                  $user=$_SESSION['username'];
                  $selectPic="SELECT * from users where user_name='$user'";
                  $db = mysqli_connect("localhost", "root", "", "project");
                  $resultPic=mysqli_query($db, $selectPic);
                  $fetchPic=mysqli_fetch_assoc($resultPic);

                  $Userimg=$fetchPic['user_image'];
                  echo "<img src='images/$Userimg' alt='profile' class='image mx-2' >";
              }
        ?>
      </li>
    
    </ul> 
    
  </div>
</nav>



<div class="row" id="content">
    
    <div class="col-md-2 p-0">
    <div class="navig">
            <ul>
                

                <li>
                    <a href="myprofile.php?editAcc"> 
                        <i class="fa-solid fa-user-pen"></i>
                        <span class="title">Edit Account</span>
                    </a>
                </li>

                <li>
                    <a href="myprofile.php" >
                        <i class="fa-solid fa-list-check"></i>
                        <span class="title">Pending Orders</span>
                    </a>
                </li>

                <li>
                    <a href="myprofile.php?myOrders">
                        <i class="fa-solid fa-bag-shopping"></i>
                        <span class="title">My Orders</span>
                    </a>
                </li>

                <li>
                    <a href="myprofile.php?reviews">
                        <i class="fa-solid fa-star"></i>
                        <span class="title">Reviews</span>
                    </a>
                </li>

                <li id="del">
                    <a  >
                        <i class="fa-solid fa-trash"></i>
                        <span class="title" >Delete Account</span>
                    </a>
                </li>

                <li>
                      <?php
                          if(isset($_SESSION['username'])){
                                echo "
                                    <a href='logout.php'>
                                      <i class='fas fa-sign-out-alt'></i>
                                      <span class='title'>Log out</span>
                                    </a> ";
                          }else{
                                echo "
                                <a href='log.php'>
                                  <i class='fa-solid fa-right-to-bracket'></i>
                                  <span class='title'>Log In</span>
                                </a>";
                                
                          }
                          ?>
                  
                </li>
            </ul>
        </div>
    </div>
    
    <div class="col-md-9 ">
      
      
      <?php 
      if(isset($_SESSION['username'])){
          userOrders();

          if(isset($_GET['editAcc'])){
            include ('editAcc.php');
          }

          if(isset($_GET['myOrders'])){
            include ('myorders.php');
          }

          if(isset($_GET['reviews'])){
            include ('reviews.php');
          }

          if(isset($_GET['myOrders?showItems'])){
            include ('myorderDetails.php');
          }

          if(isset($_GET['myprofile.php?deleting'])){
            include ('deleteUser.php');
          }

      }
      
      ?>
    </div>
    <div class="col-md-1"></div>

</div>

</div>


<?php 



?>





<section>
  <!---------------------------delete pop up------------->

  <span class="overlay"></span>
      <div class="modal-box">
        <i class="fa-solid fa-trash-can"></i>
        <h2>Delete My Account</h2>
        <h3>Are you sure you want to delete you account?</h3>
        <div class="buttons">
          <button class="close-btn">No, Don't delete</button>
          <button>

                <a href="deleteUser.php?deleting=<?php echo $user?>" class=" text-decoration-none text-light" > 
                Yes, Sure </a>
          </button>
        </div>
      </div>
  
    <script>
      const section = document.querySelector("section"),
        overlay = document.querySelector(".overlay"),
        showBtn = document.querySelector("#del"),
        closeBtn = document.querySelector(".close-btn");
      showBtn.addEventListener("click", () => section.classList.add("active"));
      overlay.addEventListener("click", () =>
        section.classList.remove("active")
      );
      closeBtn.addEventListener("click", () =>
        section.classList.remove("active")
      );
    </script>

</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>




<?php

//////////////////////pending orders function
function userOrders(){
  if(isset($_SESSION['username'])){
  $db = mysqli_connect("localhost", "root", "", "project");
  $user_Id= $_SESSION['userId'];


  if(!isset($_GET['editAcc'])){
    if(!isset($_GET['myOrders'])){
      if(!isset($_GET['reviews'])){
        if(!isset($_GET['myOrders?showItems'])){
        if(!isset($_GET['deleteAcc'])){
          $select="Select * from orders where user_id='$user_Id' and status='pending' ";
          $result=mysqli_query($db, $select);
          $count=mysqli_num_rows($result);
          if($count>0){
            echo "<h2 class='text-center mt-5 '> You have <span class='text-danger'>$count</span> pending orders </h2>
            <h4 class='text-center mt-3 '>
              <a href='myprofile.php?myOrders' class='text-dark '>Order Details</a>
            </h4>";
            
          }else{
            echo "<h2 class='text-center mt-5 '> You have <span class='text-danger'>0</span> pending orders </h2>
            <h4 class='text-center mt-3 '>
              <a href='../shop.php' class='text-dark '>Continue Shopping</a>
            </h4>";
          }
        }   
        }
    }
  }
 
  }
  }
}

?>


