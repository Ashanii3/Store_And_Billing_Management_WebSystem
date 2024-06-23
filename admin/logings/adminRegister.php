<?php 
include('../../connection.php');
include('../../functions.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Register</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="adminRegStyles.css">
</head>
<body>
        <div class="co">
                    
                    <nav class="navbar navbar-expand-lg navbar-light ">
                            <a class="navbar-brand mx-3" href="#">KIDS PLANET</a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                            </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav mx-3">
                            <li class="nav-item active mx-3">
                                <a class="nav-link" href="../../shop.php">Home <span class="sr-only">(current)</span></a>
                            </li>
            
                            <li class="nav-item active mx-3">
                                <a class="nav-link" href="adminLog.php">Log in <span class="sr-only">(current)</span></a>
                            </li>
                        
                        </ul>
                    </div>
                    </nav>
            
                    <div class="container">
                    <div class="box">
                        <div class="box-log" id="login">
                            <div class="header">
                                <h2><center>Admin Registration</center></h2> <br><br>
                            </div>


                            <form method="POST" name="myForm" enctype="multipart/form-data">
                                        <div class="input">
                                                <div class="input-field">
                                                    <input type="text" id="name" name="name" class="input-box " placeholder="UserName" width="100%">
                                                </div>
                            
                                                <div class="input-field">
                                                    <input type="email" id="email" name="email" class="input-box " placeholder="Email">
                                                </div>
                            
                                                <div class="input-field">
                                                    <input type="password" id="pwd" name="pwd" class="input-box " placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
                                                    <img src="../../images/eyeblind.png" id="eyeIcon" onclick="eyeClicked()">
                                                </div>
                                            
                            
                                                <div class="input-field ">
                                                    <input type="file" id="imge" name="imge" class="input-box ">
                                                </div>
                            
                            
                                                <div class="input-field">
                                                    <input type="submit" value="Register" class="btn bg-info text-dark border-0" id="submit" name="reg" onclick="return validate()">
                                                </div>
                                                
                                                <div class="newAcc small">
                                                    <label>Already have an account ?<a href="adminLog.php" class="text-danger">   Log In</a></label>   
                                                </div>
                                                
                                            
                                        </div>
                            </form>
                        </div>
                    </div>
                </div>
                </div>



          <!------------------password hide and show------------------------>
            <script>
                let eyeICON=document.getElementById("eyeIcon");
                let password=document.getElementById("pwd");

                function eyeClicked(){
                    if (password.type=="password"){
                        password.type="text";
                        eyeICON.src="../../images/eyeshow.png";
                    }else{
                        password.type="password"
                        eyeICON.src="../../images/eyeblind.png";
                    }
                }
            </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>


<?php
if(isset($_POST['reg'])){
    $username=$_POST['name'];
    $email=$_POST['email'];
    $password=$_POST['pwd'];


     //accessing images
     $image = $_FILES["imge"]["name"];
     $tempname = $_FILES["imge"]["tmp_name"];
     $folderImg="adminImages/$image";
     move_uploaded_file($tempname, $folderImg);

     $db = mysqli_connect("localhost", "root", "", "project");
     $select_query="select * from admin where name='".$username."' and email='".$email."' ";
     $result=mysqli_query($db,$select_query);
     $rows_count=mysqli_num_rows($result);

     if($rows_count>0){
        echo "<script>alert('Admin details already exists') </script>";
    }else{
        move_uploaded_file($tempname, $folderImg);
        $insert_query="INSERT into `admin` (name,email,password,image) values 
        ('".$username."','".$email."','".$password."','$image')";
        $sql_execute=mysqli_query($db,$insert_query);

        if($sql_execute){
            echo "<script>alert('Admin details inserted') </script>";
             echo "<script>window.open('adminLog.php','_self')</script>";
            
        }else{
            echo "<script>alert('Admin details cannot be inserted') </script>";
        }
    }
}
?>