<?php

if(isset($_GET['viewProducts?deleting'])){
    $del_ID=$_GET['viewProducts?deleting'];

    if(isset($_POST['delete'])){
            $delete="DELETE from toys where id=$del_ID";
            $db = mysqli_connect("localhost", "root", "", "project");
            $result=mysqli_query($db, $delete);
            if($result){
                echo "<script>alert('Item deleted Successfully') </script>";
                echo "<script>window.open('adminProfile.php?viewProducts', '_self') </script>";
            }
    }

    if(isset($_POST['Nodelete'])){
        echo "<script>window.open('adminProfile.php?viewProducts', '_self') </script>";
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    </style>
</head>
<body>
    <h2 class="text-center mt-5 mb-3">Want to delete product Id <span style="color: red;"><?php echo $del_ID;?> </span> ?</h2>

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

