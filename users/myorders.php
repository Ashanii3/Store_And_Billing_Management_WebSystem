
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <style>
        body{
            overflow-y: scroll;
        }
        p{
            display: inline-block; 
        }
        .imgProduct{
            width: 90px;
            height: 90px;
            object-fit:contain;

        }
        #table2{
            width: 70%;
        }

        .content #close-btn{
            position: absolute;
            top: 30%;
            right: 4%;
            width: 40px;
            height: 50px;
           color: black;
        }
        #viewEye{
            color: black;
        }
        
    </style>


</head>
<body>
    <h2 class="text-center mt-5 mb-5">My Orders</h2>


    <!-- php code for fetch data and display in the table -->
    <?php
        $user=$_SESSION['username'];
        $selectUser="SELECT * from users where user_name='$user'";
        $db = mysqli_connect("localhost", "root", "", "project");
        $result=mysqli_query($db, $selectUser);
        $fetch=mysqli_fetch_assoc($result);
    
        $id=$fetch['id'];
        
    ?>

    
        <div class="row">
           
            <div class="col-md-12 ">
                        <!-- table -->
                        <table class="table table-bordered table-striped table-hover text-center" id="table1" >
                            <thead >
                            <tr>
                                <th>Order NO</th>
                                <th>Date</th>
                                <th>Invoice Number </th>
                                <th>Item Qty</th>
                                <th>Due Amount</th>
                                <th>View</th>
                                <th>Paid?</th>
                                <th>Status</th>
                            </tr>
                            </thead>

                            <tbody>
                                <?php
                                    $selectOrders="SELECT * from orders where user_id='$id'";
                                    $resultOrders=mysqli_query($db, $selectOrders);
                                    $num=1;

                                    while($rowOrders=mysqli_fetch_assoc($resultOrders)){
                                        $orderId=$rowOrders['order_id'];
                                        $_SESSION['ORDERING_id']=$orderId;
                                        $totalItems=$rowOrders['total_items'];
                                        $amount=$rowOrders['amount'];
                                        $types=$rowOrders['item_types'];
                                        $invoice=$rowOrders['invoice_num'];
                                        $date=$rowOrders['date'];
                                        $status=$rowOrders['status'];
                                    
                                        if($status=='Pending'){
                                            $status= 'Incomplete';
                                        }else{
                                            $status='Complete';
                                        }
                                        ?>
                                            
                                            <tr>
                                            <td><?php echo $num;?></td>
                                            <td><?php echo $date;?></td>
                                            <td><?php echo $invoice;?></td>

                                            <td><?php echo $totalItems;?> </td>
                                            <td>Rs: <?php echo $amount;?></td>

                                            <td>
                                                <a href="myprofile.php?myOrders?showItems=<?php echo $invoice;?>">
                                                    <i class="fa-solid fa-eye" id="viewEye"></i>
                                                </a>
                                            </td>
                                        

                                            <td><?php echo $status;?></td>
                                            
                                            <?php
                                            
                                            if($status=="Incomplete"){
                                                echo "<td>
                                                <a href='myorderConfirm.php?invoice=$invoice' class='btn  fw-bold text-success bg-success bg-opacity-25' id='showBox'>Confirm</a>
                                                </td>";
                                            }else{
                                                echo "<td class='text-center'>
                                                        <span style='color:red;'>Paid</span></td>
                                                </tr>";
                    
                                            }
                                            
                                        $num++;
                                        
                                    }
                                    
                                ?>
                                
                            </tbody>
                        </table>
            </div>

        </div>
        
    

</body>
</html>


