<?php
include_once('connection.php');
session_start();

if(isset($_GET['id'])){
    $user=$_GET['id'];
}

//fetching user mobile number
$selectUser="select * from users where id='$user'";
$db = mysqli_connect("localhost", "root", "", "project");
$resultUser=mysqli_query($db, $selectUser);
$row=mysqli_fetch_assoc($resultUser);
$mobile=$row['mobile'];
$name=$row['user_name'];



             
    $query="SELECT SUM(price) AS total_sum FROM cart where user_id='$user'";
    $db = mysqli_connect("localhost", "root", "", "project");
    $execute=mysqli_query($db, $query);

    if($execute->num_rows > 0){
    // Fetch the sum value
        $row = $execute->fetch_assoc();
        $sumTotal = $row["total_sum"];
        $grandtotal=$sumTotal+400;
    }else{
    echo "No results found";
    }


    
         //////////////////////////////////////Total qty
    $query2="SELECT SUM(quantity) AS total_sum FROM cart where user_id='$user'";
    $db = mysqli_connect("localhost", "root", "", "project");
    $execute2=mysqli_query($db, $query2);
 
    if($execute2->num_rows > 0){
        // Fetch the sum value
        $row = $execute2->fetch_assoc();
        $sumQty = $row["total_sum"];
         
 
    }else{
         echo "No results found";
    }
 

         /////////confirming the order
        if(isset($_POST['confirm'])){
            $address=$_POST['addr'];
            $postal=$_POST['postal'];

            $tot_price=0;

                $db = mysqli_connect("localhost", "root", "", "project");
                $cart="SELECT * from cart WHERE user_id='$user'";
                $result=mysqli_query($db, $cart);
                $count_products=mysqli_num_rows($result);

                //////// random invoice number
                $invoice=mt_rand();
                $status='Pending';

                while($row=mysqli_fetch_array($result)){
                    $pdt_id=$row['product_id'];
                    $QTY=$row['quantity'];


                    $insertQty="INSERT into quantitySold(user_id,invoice,product_id,qty)
                        values(".$user.",".$invoice.",".$pdt_id.",".$QTY.")";
                    $resultQty=mysqli_query($db, $insertQty);


                    $select_product="SELECT * from toys WHERE id='$pdt_id'";
                    $result2=mysqli_query($db,  $select_product);

                    while($row_price=mysqli_fetch_array($result2)){
                        $prodct_price=array($row_price['price']);
                        $prodct_sum=array_sum($prodct_price);
                        $tot_price+=$prodct_sum;
                        
                    }
                }
        
                //insert into orders table
                $insert="INSERT into orders(user_id,address,postal,mobile,amount,item_types,total_items,invoice_num,date,status)
                    values(".$user.",'".$address."',".$postal.",'".$mobile."',".$sumTotal.",".$count_products.",".$sumQty.",".$invoice.",NOW(),'".$status."')";
                $result_orders=mysqli_query($db, $insert);
                if($result_orders){
                    echo "<script>alert('Orders are submitted') </script>";
                    echo "<script>window.open('shop.php','_self')</script>";
                }


                //deleting items from cart
                $delete_cart="DELETE from cart where user_id='$user'";
                $result=mysqli_query($db, $delete_cart);
            }




?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payments</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link href="" rel="stylesheet" type="text/css">
    <style>
        .line{
            font-size: 8px;
            color: #696868;
        }
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        
.popup{
    position: absolute;
    top: 50%;
    left: 50%;
    opacity: 1;
    transform: translate(-50%,-50%)scale(1.25);
    width: 880px;
    height: 420px;
    padding: 20px;
    background: #f3eaea;
    border-radius: 11px;
    box-shadow: 2px 2px 4px 2px ;
    transition: top 0ms ease-in-out 200ms,
                opacity 200ms ease-in-out 0ms,
                transition 20ms ease-in-out 0ms;
}

.popup.active{
    top: 50%;
    opacity: 1;
    transform: translate(-50%,-50%)scale(1);
    transition: top 0ms ease-in-out 200ms,
                opacity 200ms ease-in-out 0ms,
                transition 20ms ease-in-out 0ms;
}

.popup .close-btn{
    position: absolute;
    top: 10px;
    right: 12px;
    width: 30px;
    height: 30px;
    background:red;
    color: white;
    text-align: center;
    border-radius: 15px;
    cursor: pointer;
    transition: transform .2s;
}

.popup .close-btn:hover{
    transform: scale(1.2);
}

.popup h2{
    text-align: center;
    margin-bottom: 20px;
}


.popup .form .form-content{
    margin: 13px;
    
}



.popup .form .form-content input{
    width: 90%;
    padding: 4px;
    margin-top: 5px;
    margin-bottom: 5px;
    outline: none;
    border: 1px solid #aaa;
    border-radius: 5px;
}




.popup .form .form-content .btn{
    font-weight: bold;
    width: 22%;
    position: absolute;
   left: 340px;
   padding: 5px;
    margin-top: 25px;
    border: none;
    border-radius: 10px;
    font-size: 20px;
    background:#186aed ;
    color: white;
    cursor: pointer;
    transition: transform .2s;
}
.popup .form .form-content .btn:hover{
    transform: scale(1.2);
}


.popup .form  #radio{
    margin-left: 15px;   
}

.amounts{
    position: absolute;
    right: 80px;

}

 h6{
    font-size: 11px;
    position: absolute;
    right: 80px;
    color: #696868;
    
}

    </style>
</head>
<body>
    

<div class="popup">

            <a href="cart.php">
            <div class="close-btn" id="close-btn">&times;</div>
            </a>


            <div class="row">
                <h2>Check Out</h2>
                
                <div class="col-md-7">
                        <div class="form">
                        <form action="" method="POST">
                                <div class="form-content ">
                                    <label for="">Address:</label>
                                    <input type="text"  name="addr" placeholder="Address">
                                </div>
                                <div class="form-content">
                                    <label for="">Postal Code:</label>
                                    <input type="text" name="postal" placeholder="Postal code">
                                </div>
                                <div class="form-content">
                                    <label for="">Mobile 2:</label>
                                    <input type="text" name="mob" value="<?php echo $mobile;?>">
                                </div>

                                <div class="form-content">
                                    <input type="submit" class="btn" value="Order Confirm" name="confirm">
                                    
                                </div>
                        </form>
                    </div>
                </div>
                

                <div class="col-md-5 mt-3">
                        <div class="form">
                       
<!-- 
                        <div class="form-content">
                            <label >Date: <span style="font-weight: 700;">
                              
                            </span></label>
                        </div> -->

                        
                        <input type="radio"  checked id="radio"> Cash On Delivery
                        <!-- <label for="">Cash On Delivery</label> -->
                        

                        <div class="form-content mt-4 mb-4">
                            <label class="mt-4">Sub Total<span class="line">••••••••••••••••••••••••••••••••••</span> 
                                <span style="font-weight: 700;" class="amounts"> Rs:<?php echo $sumTotal;?> 
                            </span></label>
                            <h6>Delivery Chargers Rs400</h6>
                        </div>
                        
                        <!-- <br>
                        <hr width="80%"> -->

                        

                        <div class="form-content">
                            <label >Grand Total <span class="line">••••••••••••••••••</span>
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
        