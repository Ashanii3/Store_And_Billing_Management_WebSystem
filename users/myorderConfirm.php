<?php
include_once('../connection.php');
session_start();


//////fetching order details

if(isset($_GET['invoice'])){
    $invoice=$_GET['invoice'];

    $user_Id= $_SESSION['userId'];
    $select="select * from orders where user_id='$user_Id' and invoice_num='$invoice'";
    $db = mysqli_connect("localhost", "root", "", "project");
    $result=mysqli_query($db, $select);

    $rowOrders=mysqli_fetch_assoc($result);
    $date=$rowOrders['date'];
    $subtotal=$rowOrders['amount'];
    $grandtotal=$subtotal+400;


    //fetching userdetail
    $selectUser="select * from users where id='$user_Id'";
    $db = mysqli_connect("localhost", "root", "", "project");
    $resultUser=mysqli_query($db, $selectUser);
    $row=mysqli_fetch_assoc($resultUser);
    $name=$row['user_name'];
}   


//////////confirming the payment
if(isset($_POST['pay'])){
   
    $insertPayment="INSERT into payments(user_id,user,invoice,sub_total,grand_total)
            values($user_Id,'".$name."',$invoice,$subtotal,$grandtotal)";
    $resultPayment=mysqli_query($db,$insertPayment);
    if($resultPayment){
        echo "<script> alert ('Payment successful')</script>";
        echo "<script>window.open('myprofile.php?myOrders','_self')</script>";
    }


    $updatePayment="UPDATE orders set status='Complete' where invoice_num=$invoice";
    $resultUpdate=mysqli_query($db,$updatePayment);
}



?> 


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payments</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link href="myordrConStyles.css" rel="stylesheet" type="text/css">
    <style>
        .line{
            font-size: 8px;
            color: #696868;
        }
       

    </style>
</head>
<body>
    

<div class="popup">

            <a href="myprofile.php?myOrders">
            <div class="close-btn" id="close-btn">&times;</div>
            </a>


            <div class="row">
                <h2>Order Received</h2>
                
                <div class="col-md-7">
                        <div class="form">
                        <form action="" method="POST">
                                
                                    <img src="../images/8183434-removebg-preview.png" >
                               
                                

                                <div class="form-content">
                                    <input type="submit" class="btn" value="Received & Paid" name="pay">
                                   
                                </div>
                        </form>
                    </div>
                </div>
                

                <div class="col-md-5 mt-3">
                        <div class="form">
                        <div class="form-content ">
                            <label >Invoice No : <span style="font-weight: 700;">
                                <?php echo $invoice;?>
                            </span></label>
                        </div>

                        <div class="form-content">
                            <label >Order Date: <span style="font-weight: 700;">
                                <?php echo $date;?>
                            </span></label>
                        </div>

                        
                        <input type="radio"  checked id="radio"> Cash On Delivery
                        <!-- <label for="">Cash On Delivery</label> -->
                        

                        <div class="form-content mt-4 mb-4">
                            <label class="mt-4">Sub Total
                                <span style="font-weight: 700;" class="amounts"> Rs:<?php echo $subtotal;?> 
                            </span></label>
                            <h6>Delivery Chargers Rs400</h6>
                        </div>
                        
                    

                        

                        <div class="form-content">
                            <label >Grand Total 
                                 <span style="font-weight:700; color:red; font-size:24px;" class="amounts">
                                Rs:<?php echo $grandtotal;?>
                            </span></label>

                        </div>

                        </div>
                </div>


            </div>

        </div>





<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>
        