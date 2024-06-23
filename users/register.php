<?php 
include('../connection.php');
include('../functions.php');

?>

<html>
    <head>
        <meta charset="UTF-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <title>User Register</title>
        <link href="RegisterStyles.css" rel="stylesheet" type="text/css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
                    <a class="nav-link" href="../shop.php">Home <span class="sr-only">(current)</span></a>
                </li>

                <li class="nav-item active mx-3">
                    <a class="nav-link" href="log.php">Log in <span class="sr-only">(current)</span></a>
                </li>
               
            </ul>
        </div>
        </nav>

        <div class="container">
        <div class="box">
            <div class="box-log" id="login">
                <div class="header">
                    <h2><center>New User Registration</center></h2> <br><br>
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
                        <input type="password" id="pwd1" name="pwd" class="input-box " placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
                        <img src="../images/eyeblind.png" id="eyeIcon1" onclick="eyeClicked()">
                    </div>

                    <div class="input-field">
                        <input type="password" id="pwd2" name="ReInterpwd" class="input-box " placeholder="Confirm Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
                        <img src="../images/eyeblind.png" id="eyeIcon2" onclick="eyeClickedTwo()">
                    </div>
                   

                    <div class="input-field">
                        <input type="text" id="city" name="city" class="input-box " placeholder="City">
                    </div>

                    <div class="input-field ">
                        <input type="text" id="mobile" name="mobile" class="input-box " placeholder="Mobile Number">
                    </div>

                    <div class="input-field ">
                        <input type="file" id="imge" name="imge" class="input-box ">
                    </div>


                    <div class="input-field " >
                        <div class="input-box ">
                        <label>Gender:</label>  
                        </div> 
                        
                        <div class="radio ">
                        
                        <input type="radio" id="rdbmale" name="gender" class="rdb" value="Male">Male&nbsp; <i class="fa-solid fa-person "></i> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                         <input type="radio" id="rdbfemale" name="gender" value="Female" id="button" >Female&nbsp;<i class="fa-solid fa-person-dress "></i>
                         </div>
                    </div>

                    <div class="input-field">
                        <input type="submit" value="Register" class="btn bg-info text-dark border-0" id="submit" name="reg" onclick="return validate()">
                    </div>
                    
                    <div class="newAcc small">
                        <label>Already have an account ?<a href="log.php" class="text-danger">   Log In</a></label>   
                    </div>
                    

                    
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>

  
    <!----------------show & hide passwords----------------->
    <script>
                let eyeICON1=document.getElementById("eyeIcon1");
                let password1=document.getElementById("pwd1");

                let eyeICON2=document.getElementById("eyeIcon2");
                let password2=document.getElementById("pwd2");
               

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

        <!----------------VALIDAIONS----------------->
        <script>
            function validate(){
                let Username=document.getElementById('name').value;
                if(Username=="" || Username==undefined){
                    alert("User name cannot be empty");
                    return false;
                }

                let Email=document.getElementById('email').value;
                if(Email=="" || Email==undefined){
                    alert("Email cannot be empty");
                    return false;
                }

                let Mobile=document.getElementById('mobile').value;
                if(isNaN(Mobile)){
                    alert("Invalid Mobile Number");
                    return false;
                }
                if(Mobile.length>11){
                    alert(" Mobile Number Should be less than 11");
                    return false;
                }

                let Male=document.getElementById('rdbmale').checked;
                let Female=document.getElementById('rdbfemale').checked;
                if(Male==false && Female==false){
                    alert("Gender should be selected");
                    return false;
                }
                return true;
            }

        </script>



        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    </body>
</html>

<!----------------php------------------------->
<?php
if(isset($_POST['reg'])){
    $username=$_POST['name'];
    $email=$_POST['email'];
    $password=$_POST['pwd'];
    $Confirm_password=$_POST['ReInterpwd'];
    $city=$_POST['city'];
    $mobile=$_POST['mobile'];
    $gender=$_POST['gender'];
    
    //accessing images
    $image = $_FILES["imge"]["name"];
    $tempname = $_FILES["imge"]["tmp_name"];
    $folderImg="images/$image";

   
    

    //checking
    if($username=='' or $email=='' or $password=='' or $Confirm_password=='' or $city=='' or $mobile==''  or $gender==''){
        echo "<script>alert('Required to fill all the fields'); </script>";
        exit();
    }
    else{
        move_uploaded_file($tempname, $folderImg);
    }

   

    //////////////// insert and select queries
if($password==$Confirm_password){
    $db = mysqli_connect("localhost", "root", "", "project");
    $select_query="select * from users where user_name='".$username."' and email='".$email."' ";
    $result=mysqli_query($db,$select_query);
    $rows_count=mysqli_num_rows($result);
    if($rows_count>0){
        echo "<script>alert('Username or Email already exists') </script>";
    }else{
        move_uploaded_file($tempname, $folderImg);
        $insert_query="INSERT into `users` (user_name,user_password,email,mobile,city,user_image,gender) values 
        ('".$username."','".$password."','".$email."',".$mobile.",'".$city."','$image','".$gender."')";
        $sql_execute=mysqli_query($db,$insert_query);
    
        if($sql_execute){
            echo "<script>alert('User details inserted') </script>";
             echo "<script>window.open('log.php','_self')</script>";
            
        }else{
            echo "<script>alert('User details cannot be inserted') </script>";
        }

    }
    }else{

        echo "<script>alert('Passowrd Not matched') </script>";
    }

}

?>