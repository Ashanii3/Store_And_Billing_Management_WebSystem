<?php 
include('../connection.php');


//////////////////////inserting new category
if (isset($_POST['upload'])) {
 $name = $_POST["name"];
 
     //accessing images
    $image = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];

    //checking
    if( $name=='' or $image==''){
        echo "<script>alert('Required to fill all the fields'); </script>";
        exit();
    }
    else{
        move_uploaded_file($tempname, "categoryImages/$image");
    }
    $db = mysqli_connect("localhost", "root", "", "project");
    $sql = "INSERT INTO categories (categoryName,categoryImage) VALUES ('".$name."','$image')";
    $result=mysqli_query($db, $sql);
    if($result){
        echo " <script>alert('Category Inserted Successfully'); </script>";
    }

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

        .container .row form{
            width: 70%;
            margin-left: 10%;
        }

        .Catimage{
            width: 70px;
            height: 70px;
            object-fit:cover;
        }
        i {
            margin-left: 40px;
            box-sizing: border-box;
            cursor: pointer;
            font-size: 20px;
        }
        #edit ,#delete{
            transition: transform .2s;
        }
        #edit:hover, #delete:hover{
            transform: scale(1.4);
        }

       
       
    </style>
</head>
<body>
    
    <div class="container">
        
        <div class="row">
            <h2 class=" mt-5 mb-5">Categories</h2>

            <div class="col-md-6">
                            <table class="table table-striped table-bordered table-hover text-center ">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Image</th>
                                <th>Category Name</th>
                                <th>Operations</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                ///////////fetching from categories table
                                $selectCat="Select * from categories ";
                                $db = mysqli_connect("localhost", "root", "", "project");
                                $resultCat=mysqli_query($db, $selectCat);

                                $num=1;

                                while($rowCat=mysqli_fetch_assoc($resultCat)){
                                    $image=$rowCat['categoryImage'];
                                    $name=$rowCat['categoryName'];
                                ?>
                                    <tr>
                                        <td><?php echo $num;?> </td>
                                        <td><img src='categoryImages/<?php echo $image;?>' class='Catimage'></td>
                                        <td><?php echo $name;?></td> 
                                        <td >
                                                <a href="adminProfile.php?Categories?editing=<?php echo $name ?>" ><i class="fa-solid fa-pen-to-square " id="edit" ></i></a>
                                                <a href="adminProfile.php?Categories?deleting=<?php echo $name?>"><i class="fa-solid fa-trash-can" id="delete"></i></a>
                                        </td>
                                    </tr>
                                    
                                <?php
                                $num++;
                                }
                                
                                ?>
                        </tbody>

                    </table>
            </div>

            <div class="col-md-1"></div>

            <div class="col-md-5 mt-5  ">
                 <form action="" method="POST" enctype="multipart/form-data" >

                    <!-----------Insert Categories----------->
                    <div class="row">
                            <div class="form-group ">
                                <input type="text" class="form-control border-secondary " name="name" placeholder="Category"> <br>
                            </div>


                            <div class="form-group ">
                                <input type="file" class="form-control border-secondary" name="uploadfile">
                            </div> <br>
                            
                            <div class="form_group mb-5">
                                <button class="btn btn-primary rounded-0 mt-4" type="submit" name="upload" id="buttonUpload">UPLOAD</button>
                            </div>
                    </div>
                 </form>

            </div>


           
        </div>

    </div>

    <!-- <div class="model">
             <h3>Are you sure you want to delete?</h3>
    </div>

    <script src="../users/jquery.js"></script>
    <script>
        $(function(){
            $(".model").hide();

            $('#delete').on('click',function(){
                $(".model").fadeIn();
            });
        });

    </script> -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>



<?php
function editCategories(){ 
    
}

?>