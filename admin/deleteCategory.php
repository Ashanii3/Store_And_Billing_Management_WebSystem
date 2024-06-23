<?php
if(isset($_GET['Categories?deleting'])){
    $del_category=$_GET['Categories?deleting'];

    if(isset($_POST['delete'])){
            $delete="DELETE from categories where categoryName='$del_category'";
            $db = mysqli_connect("localhost", "root", "", "project");
            $result=mysqli_query($db, $delete);
            if($result){
                echo "<script>alert('Category deleted Successfully') </script>";
                echo "<script>window.open('adminProfile.php?Categories', '_self') </script>";
            }
     }

     if(isset($_POST['Nodelete'])){
        echo "<script>window.open('adminProfile.php?Categories', '_self') </script>";
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
        <h2 class="text-center mt-5 mb-3">Want to delete <span style="color: red;"> <?php echo $del_category;?> </span> category ?</h2>

        <div class="container">
                <form action="" method="post">
                    <div class="form-outline mt-5">
                        <input type="submit" class="form-control btn btn-outline-danger m-auto w-50" name="delete" value="Yes, Delete">
                    </div>
                    <div class="form-outline mt-5">
                        <input type="submit" class="form-control btn btn-outline-primary m-auto w-50" name="Nodelete" value="No, Don't Delete">
                    </div>
                </form>
        </div>
</body>
</html>