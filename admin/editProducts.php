<?php

//fetching the toys data
if(isset($_GET['viewProducts?editing'])){
    $editingId=$_GET['viewProducts?editing'];
    
    $select="SELECT * from toys where id=$editingId";
    $db = mysqli_connect("localhost", "root", "", "project");
    $result=mysqli_query($db, $select);

    $row=mysqli_fetch_assoc($result);
    $name=$row['name'];
    $pic=$row['photo'];
    $description=$row['description'];
    $price=$row['price'];
    $category=$row['category'];
    $addedqty=$row['addedStock'];
    $stock=$row['stock'];   
}


////updating the toys table
if(isset($_POST['update'])){
    $newId=$_POST['id'];
    $newName=$_POST['name'];
    $newDescription=$_POST['description'];
    $newPrice=$_POST['price'];
    $newCategory=$_POST['category'];
    $newAddedQty=$_POST['addedqty'];
    $newStock=$_POST['check'];

    $newPic=$_FILES['image']['name'];
    $tempPic=$_FILES['image']['tmp_name'];

    if($newPic==''){
        $newPic=$pic;
    }else{
        move_uploaded_file($tempPic,"../img/$newPic");
    }
    
    $update="UPDATE toys set photo='$newPic',name='$newName',
            category='$newCategory',description='$newDescription',price='$newPrice',addedStock='$newAddedQty',stock='$newStock' 
            where id=$editingId";
    $db = mysqli_connect("localhost", "root", "", "project");
    $resultUpdate=mysqli_query($db, $update);
    if($resultUpdate){
        echo "<script> alert ('Item details updated successfully')</script>";
        echo "<script>window.open('adminProfile.php?viewProducts','_self')</script>";
    } 
}


?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <style>
        .container{
            background: #f0f2f5;
            padding-top: 15px;
            padding-bottom: 20px;
           margin-left: 30px;
           border-radius: 5px;
   
        }
        form .row .form-group{
            width: 80%;
        }
        label{
            font-weight: 550;
        }

        form .row .form-file{
            width: 90%;
        }

        img{
            width: 120px;  
        }

        #checkButtons {
            display: flex;
            align-items: center;
            justify-content: center;   
        }

      
        #buttonUpdate{
            transition: transform .2s;
        }
        #buttonUpdate:hover{
            transform: scale(1.2);
        }
    </style>
</head>
<body>
    <h2 class="text-center mt-4 ">Edit Products</h2>
    <div class="container">
    <form action="" method="POST" enctype="multipart/form-data" class="text-center">
        <div class="row">

            <div class="col-md-6">
                <div class="form-group mb-2">
                    <label for="" class="form-label">Item Id</label>
                    <input type="text" class="form-control border-secondary  mx-5" name="id" value="<?php echo $editingId;?>"  required="required"> <br>
                </div>


                <div class="form-group mb-2">
                    <label for="" class="form-label">Item Name</label>
                    <input type="text" class="form-control border-secondary  mx-5" name="name" value="<?php echo $name;?>" required="required"> <br>
                </div>

                <div class="form-group mb-1">
                    <label for="" class="form-label">Item Description</label>
                    <!-- <input type="textarea" class="form-control border-secondary  mx-5" rows="3" name="description" value="" required="required"> <br> -->
                    <textarea  class="form-control border-secondary  mx-5" id="exampleFormControlTextarea1" name="description" rows="3" required="required"> <?php echo $description;?>
                    </textarea> <br>
                </div>


                <div class="form-group mb-2">
                    <label for="" class="form-label">Price</label>
                    <input type="text" class="form-control border-secondary  mx-5" name="price" value=" <?php echo $price;?>" required="required"> <br>
                </div>
               
            </div>



            <div class="col-md-6">
                <div class="form-group mb-4">
                        <label for="" class="form-label">Category</label>
                        <select name="category" id="category" class="form-select border-secondary  mx-5" >
                                    <option value="<?php echo $category;?>"> <?php echo $category;?> </option>
                                    <?php
                                        //////////////////fetching categories
                                        $selectCat="SELECT * from categories";
                                        $db = mysqli_connect("localhost", "root", "", "project");
                                        $resultCat=mysqli_query($db, $selectCat);

                                        while($row=mysqli_fetch_assoc($resultCat)){
                                            $CategoryName=$row['categoryName'];
                                            echo "<option value='$CategoryName'>$CategoryName</option>";
                                        }
                                        
                                    ?>
                        </select>
                </div>

                <div class="form-group mb-2">
                    <label for="" class="form-label">Added Quantity</label>
                    <input type="text" class="form-control border-secondary  mx-5" name="addedqty" value=" <?php echo $addedqty; ?>" required="required"> <br>
                </div>


                <div class="form-file  mb-4">
                    <label for="" class="form-label mt-1">Image</label>

                    <div class="d-flex">
                        <img src="../img/<?php echo  $pic;?> " alt="" class="border border-secondary  mx-5">
                        <input type="file" class="form-control border-secondary m-auto" name="image"  > <br>
                    </div>
                    
                </div>

                <div class="form-group mb-2">
                    <label for="" class="form-label mb-4">In Stock?</label>
                    <div class="d-flex mx-5" id="checkButtons">
                            <?php if( $stock=="Yes"){
                                    echo 
                                    "<input type='checkbox' class='form-check  mx-3' value='Yes' name='check' checked> YES
                                    <input type='checkbox' class='form-check  mx-3 ' value='No' name='check'  > NO ";
                                }else{
                                    echo 
                                    "<input type='checkbox' class='form-check  mx-3' value='Yes' name='check'> YES
                                    <input type='checkbox' class='form-check  mx-3 ' value='No' name='check' checked> NO ";
                                }
                                ?>
                    </div>
                    
                </div>

            </div>

            <div class="form_group">
                <button class="btn btn-primary btn-lg rounded-0 mt-1" type="submit" name="update" id="buttonUpdate">UPDATE</button>
                
            </div>

        </div>
         
    </form>
    </div>
</body>
</html>