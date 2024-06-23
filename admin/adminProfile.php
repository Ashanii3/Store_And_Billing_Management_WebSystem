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
    
    <title>Welcome Admin  </title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
   <link rel="stylesheet" href="adminProfStyling.css">
   <style>
  
 
    #nav{
          position: static;
          top: 0;
          left: 0;
          width: 100%;
          height: 60px;
          /* background-color: transparent; */
          transition: background-color 0.3s ease-in-out;
          z-index: 1000; 
          
        }
     

      #box{
        height: 32vmin; 
    
      }
      #box h3{
          text-align: center;
          font-weight: 500;
          line-height: 0.7;
         
      }

      .navig ul li:hover a{
          color: blue;
        }
        
      
    </style>
</head>
<body>
    
    
    <!-- Nav Bar -->
    <div class="container-fluid   p-0">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" id="nav">
      <a class="navbar-brand title mx-4" href="#"><h2>KIDS<span>PLANET.</span></h2></a>


  <div class="collapse navbar-collapse " id="navbarSupportedContent">
    <ul class="navbar-nav ms-auto px-4">
      <li class="nav-item active px-3">
        <a class="nav-link" href="./logings/shopForAdmin.php">Home </a>
      </li>


      <li class="nav-item px-3 " >
      <?php
               if(isset($_SESSION['admin'])){

                  $adminHere=$_SESSION['admin'];
                  $selectPic="SELECT * from admin where name='$adminHere'";
                  $db = mysqli_connect("localhost", "root", "", "project");
                  $resultPic=mysqli_query($db, $selectPic);
                  $fetchPic=mysqli_fetch_assoc($resultPic);

                  $Userimg=$fetchPic['image'];
                  echo "<img src='./logings/adminImages/$Userimg' alt='profile' class='image mx-2' >";
              }
        ?>
      </li>
      
    
    </ul> 
    
  </div>
</nav>



<div class="row">
    
    <div class="col-md-2 p-0">
    <div class="navig">
            <ul>

                <li class="mt-3">
                    <a href="adminProfile.php">
                        <i class="fas fa-tachometer-alt"></i>
                        <span class="title">Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="adminProfile.php?insertProducts" >
                        <i class="fa-solid fa-upload"></i>
                        <span class="title">Insert Products</span>
                    </a>
                </li>

                <li>
                    <a href="adminProfile.php?viewProducts">
                        <i class="fas fa-chart-bar"></i>
                        <span class="title">View Products</span>
                    </a>
                </li>


                <li>
                    <a href="adminProfile.php?Categories">
                        <i class="fa-solid fa-plus"></i>
                        <span class="title">Categories</span>
                    </a>
                </li>

                <li>
                    <a href="adminProfile.php?customers" >
                        <i class="fa-solid fa-users-gear"></i>
                        <span class="title">Customers</span>
                    </a>
                </li>

                <li>
                    <a href="adminProfile.php?orders">
                        <i class="fa-solid fa-bag-shopping"></i>
                        <span class="title">All Orders</span>
                    </a>
                </li>


                <li id="showDelete">
                    <a href="adminProfile.php?payments" >
                        <i class="fa-solid fa-money-check-dollar"></i>
                        <span class="title" >Payments</span>
                    </a>
                </li>

                <li>
                    <a href="adminProfile.php?reviews">
                        
                        <i class="fa-solid fa-star"></i>
                        <span class="title">Reviews</span>
                    </a>
                </li>

            
                <li>
                    <?php
                    if(isset($_SESSION['admin'])){
                          echo "
                              <a href='logings/adminLogout.php'>
                                <i class='fas fa-sign-out-alt'></i>
                                <span class='title'>Log out</span>
                              </a> ";
                    }else{
                          echo "
                          <a href='logings/adminLog.php'>
                            <i class='fa-solid fa-right-to-bracket'></i>
                            <span class='title'>Log In</span>
                          </a>";
                    }
                    ?>
                    
                </li>
            </ul>
        </div>
    </div>


     
    <div class="col-md-9 text-center" >
      
      <?php 
      if(isset($_SESSION['admin'])){

        //dashboard
        dash();

        /////////insert products
        if(isset($_GET['insertProducts'])){
          include ('insertProducts.php');
        }
        
        //view products
        if(isset($_GET['viewProducts'])){
            include ('viewProducts.php');
        }

        //editing product details
          if(isset($_GET['viewProducts?editing'])){
            include ('editProducts.php');
          }

        //deleting products
          if(isset($_GET['viewProducts?deleting'])){
            include ('deleteProduct.php');
          }


      
        //////////////insert and view categories
        if(isset($_GET['Categories'])){
          include ('insertCategories.php');
        }

        //editing categories
        if(isset($_GET['Categories?editing'])){
          include ('editCategories.php');
        }

        //deleting categories
        if(isset($_GET['Categories?deleting'])){
          include ('deleteCategory.php');
        }


        //customer details
        if(isset($_GET['customers'])){
          include ('viewCustomers.php');
        }
        //deleting customers
        if(isset($_GET['customers?deleting'])){
          include ('deleteCustomer.php');
        }


        //order details
        if(isset($_GET['orders'])){
          include ('viewOrders.php');
        }
        //deleting orders
        if(isset($_GET['orders?deleting'])){
          include ('deleteOrder.php');
        }
        //view order details
        if(isset($_GET['orders?viewDetails'])){
          include ('viewOdrDetails.php');
        }



        //payment details
        if(isset($_GET['payments'])){
          include ('viewPayments.php');
        }
        //deleting payment details
        if(isset($_GET['payments?deleting'])){
          include ('deletePayment.php');
        }


        //veiwing customer reviews
        if(isset($_GET['reviews'])){
          include ('viewReviews.php');
        }

  }
        ?>
    </div>
    


   
    <div class="col-md-1"></div> 


</div>

</div>




<script>
  

///////////////////////counters
let valueDisplays=document.querySelectorAll(".num");
let interval=1000;

valueDisplays.forEach((valueDisplay) => {
  let startValue =0;
  let endValue=parseInt(valueDisplay.getAttribute("data-val"));
  let duration=Math.floor(interval / endValue);
  let counter=setInterval(function(){
      startValue+=1;
      valueDisplay.textContent=startValue;
      if(startValue == endValue){
        clearInterval(counter);
      }
  }, duration);
});


//trending box--> icon function
function showAlert(){
  alert("Stock Unavailable !");
}


// function myFunction() {
//   var popup = document.getElementById("myPopup");
//   popup.classList.toggle("show");
// }
</script>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>




<?php

//////////////////////dashboard function
function dash(){
  
  $db = mysqli_connect("localhost", "root", "", "project");

  if(!isset($_GET['viewProducts'])){
    if(!isset($_GET['insertProducts'])){
      if(!isset($_GET['Categories'])){
        if(!isset($_GET['customers'])){
          if(!isset($_GET['customers?deleting'])){
            if(!isset($_GET['orders'])){
              if(!isset($_GET['orders?deleting'])){
                if(!isset($_GET['orders?viewDetails'])){
                  if(!isset($_GET['payments'])){ 
                    if(!isset($_GET['reviews'])){  
                      if(!isset($_GET['payments?deleting'])){  
                        if(!isset($_GET['viewProducts?editing'])){  
                          if(!isset($_GET['viewProducts?deleting'])){ 
                            if(!isset($_GET['Categories?editing'])){
                              if(!isset($_GET['Categories?deleting'])){    
                    ?>
                   

                    
                   <?php
                    //////////////fetching data to the counters
                       
                        //number of users
                         $selectUsers="SELECT * from users";
                         $resultUsers=mysqli_query($db, $selectUsers);
                         $countUsers=mysqli_num_rows( $resultUsers);
                        
                      
                           //number of orders
                         $selectPendingOrders="SELECT * from orders where status='Pending'";
                         $resultPendingOrders=mysqli_query($db, $selectPendingOrders);
                         $countPendingOrders=mysqli_num_rows( $resultPendingOrders);
                  

                          //number of items sold
                         $qty=array();
                         $totalQty=0;
                         $selectSolds="SELECT * from orders";
                         $resultSolds=mysqli_query($db, $selectSolds);
                         if(mysqli_num_rows($resultSolds)>0){
                            while($rowSolds=mysqli_fetch_array($resultSolds)){
                              $qty[]=$rowSolds['total_items'];
                              $totalQty=array_sum($qty);
                            }
                         }


                         //number of income
                         $grandTotal = array();
                         $sum=0;
                         $selectIncome="SELECT * from payments";
                         $resultIncome=mysqli_query($db, $selectIncome);
                         if(mysqli_num_rows($resultIncome)>0){
                            while($rowIncome=mysqli_fetch_array($resultIncome)){  
                                  $grandTotal[]=$rowIncome['grand_total'];
                                  $sum=array_sum($grandTotal);
                            }
                          
                         }
                   ?>
                    

                    <div class="container">
                        <div class="row " id="rowOne">
                          
                            <div class="col-md-2" id="box">
                              <i class="fa fa-users" aria-hidden="true"></i>
                              <span class="num" data-val="<?php echo $countUsers;?>"></span>
                              <h3>Users</h3>
                            </div>

                            

                            <div class="col-md-2" id="box">
                              <i class="fa-solid fa-circle-check"></i>
                              <span class="num" data-val="<?php echo $totalQty;?>">000</span>
                              <h3>Sold Items</h3>
                            </div>

                            <div class="col-md-2" id="box">
                            <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                              <span class="num" data-val="<?php echo $countPendingOrders;?>"></span>
                              <h3> Pending</h3>
                              <h3> Orders</h3>
                            </div>

                            <div class="col-md-2" id="box">
                              <i class="fa-solid fa-coins"></i>
                              <span class="Nonum" data-val=""><?php echo $sum;?></span>
                              <h3>Income</h3>
                            </div>
                 
                        </div>


                        <!------------ Latest orders ---------->
                        <div class="row mt-3" id="rowTwo">
                            <div class="col-md-7 " >

                                 <div class="boxInfo">
                                        <div class="Title "> Latest orders</div>

                                        <table class="table table-borderless text-center">
                                        <?php
                                              $db = mysqli_connect("localhost", "root", "", "project");
                                              $selectOrders="SELECT * from orders WHERE type='0' ORDER BY order_id DESC LIMIT 5 ";
                                              $resultOrders=mysqli_query($db, $selectOrders);
                                              $row=mysqli_num_rows($resultOrders);

                                              if($row>0){
                                                    echo"
                                                      <thead>
                                                          <tr>
                                                                <th>Customer</th>
                                                                <th>Date</th>
                                                                <th>Invoice</th>
                                                                <th>Amount</th>
                                                                <th>Status</th> 
                                                          </tr>
                                                      </thead>
                                                    ";

                                                    /////fetching order details
                                                    while($rowOrders=mysqli_fetch_assoc($resultOrders)){
                                                              $user_id=$rowOrders['user_id'];
                                                              $date=$rowOrders['date'];
                                                              $invoice=$rowOrders['invoice_num'];
                                                              $amount=$rowOrders['amount'];
                                                              $status=$rowOrders['status'];
                                                            
                                                              /////fetching username from users
                                                              $selectName="SELECT * from users where id='$user_id'";
                                                              $resultName=mysqli_query($db, $selectName);
                                                              $rowName=mysqli_fetch_assoc($resultName);
                                                                $username=$rowName['user_name'];
                                                                $userimage=$rowName['user_image'];
                                                              ?>
                                                              
                                                              <tbody>
                                                                  <tr>
                                                                    <td>
                                                                      <img src="../users/images/<?php echo $userimage;?>" alt="" class="orderUser">
                                                                      <?php echo $username;?>
                                                                      
                                                                   </td>
                                                                      
                                                                      <td><?php echo date('Y-m-d', strtotime($date)); ?></td>
                                                                      <td><?php echo $invoice;?></td>
                                                                      <td>Rs: <?php echo $amount;?></td>
                                                                      <td>
                                                                          <?php 
                                                                                if($status=="Pending"){ 

                                                                                    echo "<span class='badge badge-danger text-danger bg-danger bg-opacity-25'>Pending</span>";
                                                                                
                                                                                }else{ 
                                                                                    echo "<span class='badge badge-primary text-primary bg-primary bg-opacity-25'>Complete</span>";
                                                                                
                                                                                }
                                                                          ?>
                                                                      </td>
                                                                  </tr>
                                                              </tbody>
                                                              

                                               <?php   }
                                        
                                           }
                                                
                                          ?>      
                                          </table>
                                      
                                 </div>
                            </div>


                          <!------------ Trending Items ---------->
                            <div class="col-md-5">
                                        <div class="boxInfo">
                                            <div class="Title "> Trending Items</div>

                                                      <table class="table table-borderless text-center">
                                                        <?php
                                                                echo"
                                                                <thead>
                                                                    <tr>
                                                                          <th>Id</th>
                                                                          <th>Product</th>
                                                                          <th>Quantity Sold</th>

                                                                    </tr>
                                                                </thead>
                                                                ";

                                                                ////////////fetching product id from toys table
                                                                $db = mysqli_connect("localhost", "root", "", "project");
                                                                $selectID="SELECT * from toys ";
                                                                $resultID=mysqli_query($db, $selectID);


                                                                $productQuantities = array();

                                                                while($rowUserr=mysqli_fetch_assoc($resultID)){
                                                                    $product_id=$rowUserr['id'];
                                                                    $name=$rowUserr['name'];
                                                                    $imgg=$rowUserr['photo'];
                                                                    $stock=$rowUserr['stock'];
                                                                    
                                                                   
                                                                    ////////////////fetching product qty from quantitysold table for each product id
                                                                   $selectTotalQty = "SELECT  product_id, SUM(qty) AS total_quantity
                                                                                            FROM quantitysold
                                                                                            WHERE product_id='$product_id'
                                                                                            ORDER BY total_quantity DESC
                                                                                            LIMIT 1";
                                                          
                                                                    $resultItems=mysqli_query($db,$selectTotalQty);
                                                                    $rowItems=mysqli_num_rows($resultItems);

                                                                    if($rowItems>0){
                                                                          //storing to an array 
                                                                          while($rowQty=mysqli_fetch_assoc($resultItems)){
                                                                                
                                                                                $total_quantity = $rowQty['total_quantity'];
                                                                               
                                                                                  $productQuantities[$product_id] = array(
                                                                                    "total_quantity" => $total_quantity,
                                                                                    "name" => $name,
                                                                                    "image" => $imgg,
                                                                                    "stock"=> $stock
                                                                                );
                                                                          }
                                                                          
                                                                    }
                                                                   
                                                                }
                                                                arsort($productQuantities);

                                                                $count=0;
                                                                foreach($productQuantities as $product_id => $data){ 
                                                                  
                                                                          if($count>=6){
                                                                            break;
                                                                          }
                                                                          $total_quantity = $data["total_quantity"];
                                                                          $name = $data["name"];
                                                                          $imgg=$data['image'];
                                                                          $stock=$data['stock'];

                                                                          $count++;
                                                                  ?>
                                                                     
                                                                      
                                                                      <tbody>
                                                                        <tr>
                                                                          <td><?php echo $product_id;?></td>
                                                                          <td>
                                                                              <?php echo  $name; ?> &nbsp 
                                                                              <?php
                                                                              if($stock=="No"){
                                                                                 echo "<i class='fa-solid fa-circle-exclamation ' onclick=showAlert() id='exclamation'></i>";
 
                                                                              }
                                                                              
                                                                              ?> 

                                                                           </td>
                                                                          <td><?php echo $total_quantity;?></td>
                                                                        </tr>
                                                                      </tbody>
                                                                      
                                                                      
                                                                <?php
                                                                }     
                                                                  
                                                            ?>      
                                                    </table>
                                        </div>
                            </div>
                        </div>

                    </div>
                    
                    <?php
                    }
                  }
                  }
                }
              }
            }
            }
            } 
          }  
        }
      }
    }
  }
}
}

  }


?>


