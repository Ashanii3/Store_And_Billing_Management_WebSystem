<?php

if(isset($_GET['orders?viewDetails'])){
    $invoice_no=$_GET['orders?viewDetails'];

    $selectDetails="SELECT * from orders WHERE invoice_num='$invoice_no'";
    $db = mysqli_connect("localhost", "root", "", "project");
    $resultDetails=mysqli_query($db, $selectDetails);
    // $rowCount=mysqli_fetch_row($resultDetails);
    if(!$resultDetails){
        echo "<h2 class='text-center mt-5 mb-3'>Order details are not available!</h2>";
    
    }else{
        while($rowDetails=mysqli_fetch_assoc($resultDetails)){
            $orderId=$rowDetails['order_id'];
            $userId=$rowDetails['user_id'];
            $address=$rowDetails['address'];
            $postalCode=$rowDetails['postal'];
            $mob=$rowDetails['mobile'];
            $amount=$rowDetails['amount'];
            $date=$rowDetails['date'];


                    //fetching user details
                    if($userId!=0){
                    $selectUser="SELECT * FROM users where id='$userId'";
                    $resultUsers=mysqli_query($db, $selectUser);
                    $rowUser=mysqli_fetch_assoc($resultUsers);
                        $username=$rowUser['user_name'];
                    }
        }
    ?>
        <h2 class="text-center mt-5 mb-3 ">Order : <span style="color: red;"><?php echo $invoice_no;?> </span></h2>
         <div class="container">
        
        <div class="row align-center">
        <div class="content">
            <div class="col-md-6">
                <?php

                if($userId==0){?>
                    <div class="form-group mb-2 ">
                        <label for="" class="form-label contentTitle">Order Id: &nbsp; </label>
                        <label for="" class=""> <?php echo $orderId;?></label>
                    </div>

                    <div class="form-group mb-2">
                            <label for="" class="form-label contentTitle">Order date: &nbsp; </label>
                            <label for="" class=""> <?php echo $date;?></label>
                    </div>

                    <div class="form-file  mb-2">
                        <label for="" class="form-label contentTitle">Total Amount: &nbsp;</label>
                        <label for="" class=""> 
                            <span style="color: red;"><?php echo $amount;?> /= </span>
                        </label>
                    </div>

                <?php }else{
                ?>

                <div class="form-group mb-2 ">
                    <label for="" class="form-label contentTitle">Order Id: &nbsp; </label>
                    <label for="" class=""> <?php echo $orderId;?></label>
                </div>


                <div class="form-group mb-2">
                    <label for="" class="form-label contentTitle">Customer name: &nbsp;</label>
                    <label for="" class=""> <?php echo $username;?></label>
                </div>

                <div class="form-group mb-2">
                    <label for="" class="form-label contentTitle">Order date: &nbsp; </label>
                    <label for="" class=""> <?php echo $date;?></label>
                </div>
            </div>



            <div class="col-md-6">
                <div class="form-group mb-2">
                    <label for="" class="form-label contentTitle">Delivery Address: &nbsp;</label>
                    <label for="" class=""> <?php echo $address;?>  (<?php echo $postalCode;?>)</label>
                </div>
                

                <div class="form-group mb-2">
                    <label for="" class="form-label contentTitle">Mobile: &nbsp;</label>
                    <label for="" class=""> <?php echo $mob;?></label>
                </div>


                <div class="form-file  mb-2">
                    <label for="" class="form-label contentTitle">Total Amount: &nbsp;</label>
                    <label for="" class=""> 
                        <span style="color: red;"><?php echo $amount;?> /= </span>
                    </label>
                </div>

              

            </div>

            <?php } ?>
        </div>
        </div>


    <div class="row">
     <!--table-->
        <table class="table  table-hover text-center mt-5 " >
            <thead>
                <tr>
                    <th >Item id</th>
                    <th>Item</th>
                    <th>Unit Price</th>
                    <th>Quantity</th>
                </tr>
            </thead>

            
                <?php
                      $selectItems="SELECT * from quantitysold WHERE invoice='$invoice_no' and user_id='$userId'";  
                    $resultItems=mysqli_query($db, $selectItems);
                    while($rowItems=mysqli_fetch_assoc($resultItems)){
                         $pdt_id=$rowItems['product_id'];
                        $qty=$rowItems['qty'];


                            //fetching product image
                            $selectPdt="SELECT * from toys WHERE id='$pdt_id' ";  
                            $resultPdt=mysqli_query($db, $selectPdt);
                            $rowPdt=mysqli_fetch_assoc($resultPdt);
                                    $image=$rowPdt['photo'];
                                    $name=$rowPdt['name'];
                                    $unitPrice=$rowPdt['price'];

                        ?>
                        <tbody>
                                <tr>
                                    <td><?php echo $pdt_id;?></td>

                                    <td>
                                        <?php echo $name;?>
                                        <img src="../img/<?php echo $image;?>" alt="" class='imgProduct'>
                                        
                                    </td>

                                    <td><?php echo $unitPrice;?>/=</td>
                                    <td><?php echo $qty;?></td>
                                </tr>
                        </tbody>

                     <?php
                    }
                    ?>

         </table>
    
    </div>
    </div>
    
    <?php
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <style>
        .content{
            background: #f0f2f5;
            padding-top: 25px;
            padding-bottom: 20px;
            margin-left: 30px;
            border-radius: 5px;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 70%;
            position: relative;
            left: 13%;
        }

         .contentTitle{
            font-weight: 560;
        }

        .container .row table{
            margin-top: 200px;
            width: 70%;
            position: relative;
            left: 13%;
        }
        .imgProduct{
            width: 70px;
            height: 70px;
            object-fit:contain;

        }
   </style> 
</body>
</html>