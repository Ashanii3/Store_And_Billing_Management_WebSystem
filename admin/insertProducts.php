<?php 
include('../connection.php');

if (isset($_POST['upload'])) {
    $id = $_POST["id"];
    $name = $_POST["name"];
    $addedStock=$_POST['addedStock'];
    $desc = $_POST["desc"];
    $price = $_POST["price"];
    $category=$_POST["cat"];
    $stock="Yes";

    //accessing images
    $image = $_FILES["uploadfile"]["name"];
    
    $tempname = $_FILES["uploadfile"]["tmp_name"];


    //checking
    if($id=='' or $name=='' or $addedStock==''  or $desc=='' or $price=='' or $category==''  or $image==''){
        echo "<script>alert('Required to fill all the fields'); </script>";
        exit();
    }
    else{
        move_uploaded_file($tempname, "../img/$image");
    }


    if($addedStock==0){
        $stock="No";
    }

    $db = mysqli_connect("localhost", "root", "", "project");
    $sql = "INSERT INTO toys (id,photo,name,category,description,price,addedStock,stock) VALUES (".$id.",'$image','".$name."','".$category."','".$desc."',".$price.",".$addedStock.",'". $stock."')";
    $result=mysqli_query($db, $sql);
    if($result){
        echo " <script>alert('Successfully Products Inserted'); </script>";
    }

    
     ///////////////////fetching qty sold 
    //  $quantities = array();
    //  $sum=0;
    //  $remainingStock=0;

    // $getQty="SELECT * from quantitysold where product_id=$id";
    // $resultQty=mysqli_query($db, $getQty);

    // if(mysqli_num_rows($resultQty) > 0){
    //     while($rowQty=mysqli_fetch_array($resultQty)){
    //         $quantities[] = $rowQty['qty'];
    //         $sum=array_sum($quantities);

    //         $remainingStock=$addedStock-$sum;
    
    //         $update="UPDATE toys set remainingStock='$remainingStock' where id=$id";
    //         $db = mysqli_connect("localhost", "root", "", "project");
    //         $resultUpdate=mysqli_query($db, $update);
    //     }
    // }else{
    //     $remainingStock=$addedStock;
    //     $update2="UPDATE toys set remainingStock='$remainingStock' where id=$id";
    //     $db = mysqli_connect("localhost", "root", "", "project");
    //     $resultUpdate2=mysqli_query($db, $update2);
    // }


    /////calculating remaining stock,updating remaining stock 
    
    
}
?>

<html>
<head>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Document</title>
    <style>
        #buttonUpload{
            transition: transform .2s;
        }
        #buttonUpload:hover{
            transform: scale(1.2);
        }
    </style>
</head>
<body>
    
    
        <h2 class="text-center mt-5 mb-4">Insert Products</h2>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <input type="text" class="form-control border-secondary  w-50 m-auto" name="id" placeholder="ID"> <br>
            </div>


            <div class="form-group">
                <input type="text" class="form-control border-secondary  w-50 m-auto" name="name" placeholder="Name"> <br>
            </div>

            <div class="form-group">
                <input type="text" class="form-control border-secondary  w-50 m-auto" name="addedStock" placeholder="Quantity"> <br>
            </div>

            <div class="form-group">
                <select name="cat" class="form-select border-secondary  w-50 m-auto"  >
                <option value="">Select Category</option> 
                    <?php
                        $selectCat="SELECT * from categories";
                        $db = mysqli_connect("localhost", "root", "", "project");
                        $resultCat=mysqli_query($db, $selectCat);

                        while($row=mysqli_fetch_assoc($resultCat)){
                            $CategoryName=$row['categoryName'];
                            echo "<option value='$CategoryName'>$CategoryName</option>";
                            
                        }
                    ?>

                    <!-- <option value="">Select Category</option>
                    <option value="new born">New Born</option>
                    <option value="toys">Toys</option>
                    <option value="soft toys">Soft Toys</option>
                    <option value="sport items">Sport Items</option> -->
                </select>
                <br>
            </div>

            <div class="form-group">
                <input type="text" class="form-control border-secondary  w-50 m-auto" name="desc" placeholder="Description"> <br>
            </div>
            <div class="form-group">
                <input type="text" class="form-control border-secondary  w-50 m-auto" name="price" placeholder="Price"> <br>
            </div>
            <div class="form-group">
                <input type="file" class="form-control border-secondary  w-50 m-auto" name="uploadfile">
            </div> <br>
            <div class="form_group">
                <button class="btn btn-primary btn-lg rounded-0 " type="submit" name="upload" id="buttonUpload">UPLOAD</button>
                
            </div>
        </form>
    

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>