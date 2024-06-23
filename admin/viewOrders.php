<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <style>
        i #emoji{
            font-size: 40px;
        }
        #delete{
            color: red;
            cursor: pointer;
            font-size: 18px;
        }
        #delete{
            transition: transform .2s;
        }
        #delete:hover{
            transform: scale(1.4);
        }
        #viewEye{
            color: black;
        }
    </style>
</head>
<body>
    <h2 class=" text-center mt-5 mb-4">View All Orders</h2>

    <table class="table table-bordered table-striped table-hover text-center mt-5 " >
        
            <?php
                $db = mysqli_connect("localhost", "root", "", "project");
                $selectOrders="SELECT * from orders";
                $resultOrders=mysqli_query($db, $selectOrders);
                $row=mysqli_num_rows($resultOrders);

                if($row==0){
                    echo "<h3 class='text-danger text-center mt-5 mb-4'>No Orders</h3><i class='fa-solid fa-face-sad-tear text-danger' id='emoji'></i>";
                }else{
                    echo "
                    <thead><tr>
                    <th>Order Id</th>
                    <th>User Id</th>
                    <th>Invoice Number</th>
                    <th>Amount</th>
                    <th>Total products</th>
                    <th>Order date</th>
                    <th>Status?</th>
                    <th>View Order</th>
                    <th>Delete?</th>
                    </tr>
                    </thead>";
                    
                    while($rowOrders=mysqli_fetch_assoc($resultOrders)){
                        $orderid=$rowOrders['order_id'];
                        $userid=$rowOrders['user_id'];
                        $invoice=$rowOrders['invoice_num'];
                        $amount=$rowOrders['amount'];
                        $itemTypes=$rowOrders['item_types'];
                        $itemQty=$rowOrders['total_items'];
                        
                        $date=$rowOrders['date'];
                        $status=$rowOrders['status'];
                        ?>
                        <tbody>
                                <td><?php echo $orderid; ?></td>
                                
                                <td>
                                    <?php if ($userid==0){
                                        echo "Local Customer";
                                    }else{
                                        echo $userid;
                                    }
                                    ?>
                                </td>
                                
                                <td><?php echo $invoice; ?></td>
                                <td>Rs:<?php echo $amount; ?></td>
                                
                                <td><?php echo $itemQty;?></td>
                                <td><?php echo date('Y-m-d', strtotime($date)); ?></td>

                                <td>
                                        <?php
                                        if($status=="Pending"){
                                            ?>
                                            <span style="color: red;"> <?php echo $status; ?>
                                            </span>
                                        <?php
                                        }else{
                                            echo $status;
                                        }
                                                
                                        ?>
                                </td>
 
                                <td>
                                    <a href="adminProfile.php?orders?viewDetails=<?php echo $invoice;?>">
                                        <i class="fa-solid fa-eye" id="viewEye"></i>
                                    </a>
                                </td>

                                <td>
                                    <a href="adminProfile.php?orders?deleting=<?php echo $orderid?>" >
                                            <i class="fa-solid fa-trash-can" id="delete">
                                    </i></a>
                                </td>
                        
                        <?php echo" </tbody>
                        ";
                    }
                }?>
     </table>
</body>
</html>

