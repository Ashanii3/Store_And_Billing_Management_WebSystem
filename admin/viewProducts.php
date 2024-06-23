<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="viewProdStyleing.css">
</head>
<body>
   
    <h2 class=" text-center mt-5 mb-4">View Products</h2>

    
    <table class="table table-bordered table-striped table-hover text-center mt-5 " >
        <thead>
            <tr>
                <th>Id</th>
                <th id="productColumn">Product</th>
                <th>Price</th>
                <th >Added Qty</th>
                <th>Sold</th>
                <th>Remaining Qty</th>
                <th>In Stock?</th>
                <th>Operations</th>
            </tr>
        </thead>

        <tbody>
            <?php

                $db = mysqli_connect("localhost", "root", "", "project");
                $selectProducts="SELECT * from toys";
                $resultProducts=mysqli_query($db, $selectProducts);
                while($rowProducts=mysqli_fetch_assoc($resultProducts)){
                        $id=$rowProducts['id'];
                        $name=$rowProducts['name'];
                        $image=$rowProducts['photo'];
                        $price=$rowProducts['price'];
                        $addedstock=$rowProducts['addedStock'];
                        $status=$rowProducts['stock'];


                                    ///////////////////fetching qty sold 
                                     $quantities = array();
                                     $sum=0;

                                    $getQty="SELECT * from quantitysold where product_id='$id'";
                                    $resultQty=mysqli_query($db, $getQty);
                                
                                    if(mysqli_num_rows($resultQty) > 0){
                                        while($rowQty=mysqli_fetch_array($resultQty)){
                                            $quantities[] = $rowQty['qty'];
                                            $sum=array_sum($quantities);


                                            /////calculating remaining stock,updating remaining stock 
                                            $remainingStock=$addedstock-$sum;
                                    
                                            $update="UPDATE toys set remainingStock='$remainingStock' where id=$id";
                                            $db = mysqli_connect("localhost", "root", "", "project");
                                            $resultUpdate=mysqli_query($db, $update);
                                        }
                                    }else{
                                      $remainingStock=$addedstock;

                                            $update2="UPDATE toys set remainingStock='$remainingStock' where id=$id";
                                            $db = mysqli_connect("localhost", "root", "", "project");
                                            $resultUpdate2=mysqli_query($db, $update2);
                                    }


                                

                                    ////////////stock status in toys table
                                    if($sum==$addedstock){
                                        $status="No";
                                        $updateStock="UPDATE toys set stock='No' where id=$id";
                                        $db = mysqli_connect("localhost", "root", "", "project");
                                        $resultStock=mysqli_query($db, $updateStock);
                                    }

                                    
                                    
            ?>

                        <tr>
                            <td> <?php echo $id ?></td>
                            <td> <?php echo $name ?> <img src='../img/<?php echo $image ?>' class='imgProduct'></td>
                            <td>Rs: <?php echo $price?></td>
                            <td> <?php echo $addedstock;?></td>

                            <td>
                                <?php echo $sum;?>
                            </td>
                            <td>
                                <?php echo $remainingStock;?>
                            </td>

                            <td >
                                    <?php
                                    if($status=="No"){
                                        ?>
                                        <span style="color: red;"> <?php echo $status; ?>
                                        </span>
                                    <?php
                                    }else{
                                        echo $status;
                                    }
                                             
                                    ?>
                            </td>
                            
                            <td >
                                <a href="adminProfile.php?viewProducts?editing=<?php echo $id?>" ><i class="fa-solid fa-pen-to-square " id="edit" ></i></a>
                                  
                                
                                <a href="adminProfile.php?viewProducts?deleting=<?php echo $id?>"  >
                                        <i class="fa-solid fa-trash-can" id="delete">
                                </i></a>
                            </td>
                        </tr>
                  
            <?php
                }
            
            ?>   
             
        </tbody>
    </table class="mb-4">






    


    <!---------------------------delete pop up------------->

      <!-- <span class="overlay"></span>
      <div class="modal-box">
        <i class="fa-regular fa-circle-check"></i>
        <h2>Delete My Account</h2>
        <h3>Are you sure you want to delete?</h3>
        <div class="buttons">
          <button class="close-btn">No, Don't delete</button>
          <button>

                <a href="deleteProduct.php?deleting=<?php echo $id?>" class=" text-decoration-none text-light" > 
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
    </script> -->
 
    

<!------bootstrap links--------->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>