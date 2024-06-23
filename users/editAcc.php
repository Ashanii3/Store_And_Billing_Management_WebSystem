<?php

//////////////fetching from DB
if(isset($_GET['editAcc'])){
    $user=$_SESSION['username'];
    $select="SELECT * from users where user_name='$user'";

    $db = mysqli_connect("localhost", "root", "", "project");
    $result=mysqli_query($db, $select);
    $fetch=mysqli_fetch_assoc($result);

    $id=$fetch['id'];
    $name=$fetch['user_name'];
    $pwd=$fetch['user_password'];
    $email=$fetch['email'];
    $mob=$fetch['mobile'];
    $city=$fetch['city'];
    $img=$fetch['user_image'];
}    


////////////updating the DB
if(isset($_POST['update'])){
    $upd_id=$id;
    $upd_name=$_POST['name'];
    $upd_pwd=$_POST['password'];
    $upd_email=$_POST['email'];
    $upd_mob=$_POST['mobile'];
    $upd_city=$_POST['city'];

    //images
    $upd_img=$_FILES['Editimage']['name'];
    $upd_img_tmp=$_FILES['Editimage']['tmp_name'];
    move_uploaded_file($upd_img_tmp, "./images/$upd_img");

    $update="UPDATE users set user_name='$upd_name', user_password='$upd_pwd', email='$upd_email', mobile='$upd_mob',
                city='$upd_city', user_image='$upd_img' where id=$upd_id ";
     $db = mysqli_connect("localhost", "root", "", "project");
     $resultUpdate=mysqli_query($db, $update);
     if($resultUpdate){
        echo "<script>alert('Your data has been updated Successfully') </script>";
         echo "<script>window.open('log.php', '_self') </script>";
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
        #eyeIcon1,#eyeIcon2{
            width: 23px;
           position: relative;
            bottom: 33px;
            left: 225px;
            cursor: pointer;
           
        }

        /* .Userimage{
            width: 100px;
            height: 100px;
            object-fit: contain;
            border-radius: 50%;
        } */

        .imgContainer{
            width: 100px;
            height: 100px;
            border-radius: 50%;
        }
        .Userimage{
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 50%;
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
<h2 class="text-center mt-5 mb-4">Edit Account Details</h2>
<form action="" method="POST" enctype="multipart/form-data" class="text-center">

            <div class="form-group">
                <input type="text" class="form-control border-secondary w-50 m-auto" name="name" value="<?php echo $name; ?>"> <br>
            </div>

            <div class="form-group">
                <input type="password" class="form-control border-secondary w-50 m-auto" name="password" id="password1" value="<?php echo $pwd; ?>" >
                <img src="../images/eyeblind.png" id="eyeIcon1" onclick="eyeClicked()">
                 <br>
            </div>

            <div class="form-group">
                <input type="password" class="form-control border-secondary w-50 m-auto"  id="password2" value="<?php echo $pwd; ?>" >
                <img src="../images/eyeblind.png" id="eyeIcon2" onclick="eyeClickedTwo()">
                 <br>
            </div>

            <div class="form-group">
                <input type="email" class="form-control border-secondary w-50 m-auto" name="email" value="<?php echo $email; ?>" > <br>
            </div>

            <div class="form-group">
                <input type="text" class="form-control border-secondary w-50 m-auto" name="city" value="<?php echo $city; ?>"> <br>
            </div>

            <div class="form-group d-flex  w-50 m-auto">
                <input type="file" class="form-control border-secondary m-auto " name="Editimage" >
                <div class="imgContainer  mx-2">
                         <img src="images/<?php echo $img; ?>" alt="" class="Userimage" >
                </div>
                
            </div> <br>

            <div class="form-group">
                <input type="text" class="form-control border-secondary w-50 m-auto" name="mobile" value="<?php echo $mob; ?>"> <br>
            </div>
            
    
            <div class="form_group">
                <button class="btn btn-primary rounded-0 " type="submit" name="update" id="buttonUpdate">UPDATE</button>
            </div>
        </form>


        <!----------------show & hide passwords----------------->
    <script>
                let eyeICON1=document.getElementById("eyeIcon1");
                let password1=document.getElementById("password1");

                let eyeICON2=document.getElementById("eyeIcon2");
                let password2=document.getElementById("password2");

                function eyeClicked(){
                    if (password1.type=="password"){
                        password1.type="text";
                        eyeICON1.src="../images/eyeshow.png";
                    }else{
                        password1.type="password"
                        eyeICON1.src="../images/eyeblind.png";
                    }
                }

                function eyeClickedTwo(){
                    if (password2.type=="password"){
                        password2.type="text";
                        eyeICON2.src="../images/eyeshow.png";
                    }else{
                        password2.type="password"
                        eyeICON2.src="../images/eyeblind.png";
                    }
                }
    </script>
</body>
</html>
