<?php

//fetching the categories data
if(isset($_GET['Categories?editing'])){
    $cat_name=$_GET['Categories?editing'];

    $select="SELECT * from categories where categoryName='$cat_name'";
    $db = mysqli_connect("localhost", "root", "", "project");
    $result=mysqli_query($db, $select);

    $row=mysqli_fetch_assoc($result);
    $pic=$row['categoryImage'];
}


//updating the categories table
if(isset($_POST['update'])){
    $updatedName=$_POST['newName'];

    $updatedImg=$_FILES['newPic']['name'];
    $tempPic=$_FILES['newPic']['tmp_name'];

    if($updatedImg==''){
        $updatedImg=$pic;
    }else{
        move_uploaded_file($tempPic,"categoryImages/$updatedImg");
    }


    $update="UPDATE categories set categoryName='$updatedName',categoryImage='$updatedImg' where categoryName='$cat_name'";
    $resultUpdate=mysqli_query($db, $update);
    if($resultUpdate){
        echo "<script> alert ('Category details updated successfully')</script>";
        echo "<script>window.open('adminProfile.php?Categories','_self')</script>";
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
        
        #buttonUpdate{
            transition: transform .2s;
        }
        #buttonUpdate:hover{
            transform: scale(1.2);
        }
        img{
            width: 140px;  
        }
    </style>
</head>
<body>
    <h2 class="text-center mt-5 mb-4">Edit Category</h2>

    <form action="" method="POST" enctype="multipart/form-data" >
                    <!-----------Edit Categories----------->
                    <div class="row mt-5">
                        <?php
                            // if(isset($_GET['Categories?editing'])){
                            //  editCategories();}
                        ?>

                            <div class="form-group  mb-2">
                                <label for="" class="form-label"><span style="font-weight: 550;">  Category Name  </span></label>
                                <input type="text" class="form-control border-secondary  w-50 m-auto" name="newName" value=" <?php echo $cat_name;?>"> <br>
                            </div>


                            <div class="form-group m-auto w-50">
                                <label for="" class="form-label mt-1"><span style="font-weight: 550;">  Image </span></label>
                                
                                <div class="d-flex ">
                                        <img src=" categoryImages/<?php echo $pic;?>" alt="" class="border border-secondary mx-5">
                                        <input type="file" class="form-control border-secondary  w-50 m-auto" name="newPic">
                                </div>
                                
                            </div> <br>
                            
                            <div class="form_group">
                                <button class="btn btn-primary rounded-0 mt-4" type="submit" name="update" id="buttonUpdate">UPDATE</button>
                            </div>

                    </div>
    </form>
</body>
</html>