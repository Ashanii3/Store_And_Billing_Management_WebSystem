<?php
session_start();

?>

<html>
    <head>
        <meta charset="UTF-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <title>Admin Login</title>
        <link href="adminLogStyling.css" rel="stylesheet" type="text/css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
    
   </style>
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
                    <a class="nav-link" href="../../users/log.php">User <span class="sr-only">(current)</span></a>
                </li>
               
            </ul>
        </div>
        </nav>
       
        <div class="container">
        <div class="box">
  
            <div class="box-log" id="login">
                    <div class="header">
                        <h2><span style="font-size: 46px;">Hello,</span> Admin  </h2> <br><br>
                    </div>
                    <form method="POST">
                    <div class="input">
                        <div class="input-field">
                            <input type="text" id="name" name="username" class="input-box " placeholder="UserName">
                        </div>
                        
                        <div class="input-field">
                            <input type="password" id="pwd" name="pwd" class="input-box " placeholder="Password">
                            <img src="../../images/eyeblind.png" id="eyeIcon" onclick="eyeClicked()">
                        </div>
                        

                        <div class="input ">
                            <input type="submit" value="LogIn" class="btn btn-info mt-3" id="submit" name="logged" onclick="return validate()">
                        </div>

                        <div class="newAcc small">
                            <label>Dont' have an account ?<a href="adminRegister.php" class="text-danger">   Register</a></label>   
                        </div>
                    </div>
                    </form>
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


        </div>
    </div>

        </div>

        <!---------------------validating----------->
        <script>
            function validate(){
                let User=document.getElementById('name').value;
                if(User=="" || User==undefined){
                    alert("User name cannot be empty");
                    return false;
                }

                let pwd=document.getElementById('pwd').value;
                if(pwd=="" || pwd==undefined){
                    alert("Password cannot be empty");
                    return false;
                }

                return true;
            }
        </script>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

    </body>
</html>

<?php


if(isset($_POST['logged'])){

    $username=$_POST['username'];
    $password=$_POST['pwd'];
    $_SESSION['admin']=$username;

    $db = mysqli_connect("localhost", "root", "", "project");
    $select="select * from admin where name='".$username."' and password='".$password."' ";
    $result=mysqli_query($db,$select);

    if(mysqli_num_rows($result)>0){
        $row=mysqli_fetch_assoc($result);
    
       echo "<script>alert('Admin logged In') </script>";
        echo "<script>window.open('../adminProfile.php','_self')</script>";
     }else{
        echo "<script>alert('Invalid Credentials') </script>";
     }


}

?>