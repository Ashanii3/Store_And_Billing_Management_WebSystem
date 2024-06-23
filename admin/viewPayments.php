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
    </style>
</head>
<body>
    <h2 class=" text-center mt-5 mb-4">View All Payments</h2>

    <table class="table table-bordered table-striped table-hover text-center mt-5 " >
        
            <?php
                $db = mysqli_connect("localhost", "root", "", "project");
                $selectPayments="SELECT * from payments";
                $resultPayments=mysqli_query($db, $selectPayments);
                $row=mysqli_num_rows($resultPayments);

                if($row==0){
                    echo "<h3 class='text-danger text-center mt-5 mb-4'>No Payments</h3><i class='fa-solid fa-face-sad-tear text-danger' id='emoji'></i>";
                }else{
                    echo "
                    <thead><tr>
                    <th>Payment Id</th>
                    <th>User Id</th>
                    <th>Order date</th>
                    <th>Invoice number</th>
                    <th>Amount</th>
                    <th>Delete?</th>
                    </tr>
                    </thead>";
                    
                    while($rowPayments=mysqli_fetch_assoc($resultPayments)){
                        $paymentid=$rowPayments['payment_id'];
                        $userid=$rowPayments['user_id'];
                        $invoice=$rowPayments['invoice'];
                        $amount=$rowPayments['sub_total'];

                        $selectDate="SELECT * from orders where invoice_num=$invoice";
                        $resultDate=mysqli_query($db, $selectDate);
                        $rowDate=mysqli_fetch_assoc($resultDate);
                        $fetchdate=$rowDate['date'];

                        ?>
                        <tbody>
                                <td><?php echo $paymentid;?> </td>

                                <td>
                                    <?php
                                   
                                            if ($userid==0){
                                                echo "Local Customer";
                                            }else{
                                                echo $userid;
                                            }
                                    ?> 
                                </td>

                                <td><?php echo date('Y-m-d', strtotime($fetchdate));?> </td>
                                <td><?php echo $invoice;?> </td>
                                <td>Rs: <?php echo $amount;?> </td>
                               
                                

                                

                                <td>
                                    <a href="adminProfile.php?payments?deleting=<?php echo $paymentid?>"  class="">
                                            <i class="fa-solid fa-trash-can" id="delete">
                                    </i></a>
                                </td>
                        
                        <?php echo" </tbody>
                        ";
                    }


                }
                

            ?>
            
        
    </table>
</body>
</html>