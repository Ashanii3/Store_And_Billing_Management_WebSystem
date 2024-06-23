<table class="table table-bordered table-striped table-hover text-center mt-5" id="tableDetails" >
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Items</th>
                    <th>Quantity</th>
                </tr>
            </thead>

<?php


if(isset($_GET['myOrders?showItems'])){
    $invo=$_GET['myOrders?showItems'];

    $selectDetails="SELECT * from quantitysold WHERE invoice='$invo'";
    $db = mysqli_connect("localhost", "root", "", "project");
    $resultDetails=mysqli_query($db, $selectDetails);


    echo "<h2 class='text-center mt-5 mb-5'>Your Order Details: <span style='color: red;'> $invo</span></h2>";


    if($resultDetails){
        while($row=mysqli_fetch_assoc($resultDetails)){
                $product_id=$row['product_id'];
                $itemQty=$row['qty'];

                $selectImg="SELECT * from toys where id='$product_id'";
                $resultImg=mysqli_query($db, $selectImg);
                $rowImg=mysqli_fetch_assoc($resultImg);
                    $fetchImg=$rowImg['photo'];

        ?>
        
       
        

            <tbody>
                <tr>
                    <td><?php echo $product_id;?></td>

                    <td>
                        <img src="../img/<?php echo $fetchImg;?>" class='imgProduct'>
                        
                    </td>
                    <td><?php echo $itemQty;?></td>
                </tr>
            </tbody>
        
        
        
        <?php
        }
    }
}

?>
</table>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
           .imgProduct{
            width: 90px;
            height: 90px;
            object-fit:contain;
             }

            #tableDetails{
                width: 60%;
                margin: auto;
             }
             
    </style>
</head>
<body>
    
</body>
</html>





