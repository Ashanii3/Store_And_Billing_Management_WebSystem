<?php
include_once('connection.php');
include('fonts.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <link rel="stylesheet" href="contactStyling.css">
   <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins%3Awght%40400%3B500&display=swap%27%29%3B"> -->
  
</head>
<body>
      <!-- <img class="img" src="images/grey.jpg" alt="bg" id="bg"> -->
    <!-- FIRST -->
    <!-- Nav Bar -->
    <div class="container-fluid   p-0">
    <nav class="navbar navbar-expand-lg navbar-dark" id="nav">
      <a class="navbar-brand title mx-4" href="#"><h2 id="kids">KIDS<span>PLANET. </span></h2></a>
  
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

            <div class="collapse navbar-collapse " id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto ">
                <li class="nav-item active  px-4">
                    <a class="nav-link" href="shop.php">Home </a>
                </li>
                
                </ul> 
            </div>
</nav>
</div>

<div class="container">
  <div class="row mt-5">
    <center>
      <h1 class="mt-5">Contact us</h1>
    </center>
    <div class="col-md-6">
         <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3955.9746110313436!2d80.3577099!3d7.4680552!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae33a22a1618403%3A0xa7f220d4892e9014!2sKids%20Planet!5e0!3m2!1sen!2slk!4v1687673735048!5m2!1sen!2slk" width="100%" height="420" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>

    <div class="col-md-6">
        <form action="" method="post">
            <div class="inputbox">
                <i class="fas fa-user"></i><input type="text" name="name" placeholder="Name" class="box form-control rounded-0">
            </div>

            <div class="inputbox">
                <i class="fas fa-envelope"></i><input type="email" name="email" placeholder="Email" class="box form-control rounded-0">
            </div>

            <div class="inputbox">
                <i class="fa-solid fa-message"></i>
                <!-- <input type="text" placeholder="Mobile Number" class="box form-control rounded-0" > -->
                <textarea  type="text" class=" box form-control rounded-0 "  name="description" rows="5" placeholder="Type your message"></textarea> 
            </div>
            <input type="submit" value="Submit" class="btn mt-3 border border-secondary " name="submit">
        </form>
    </div>
  </div>
</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>


<?php
if(isset($_POST['submit'])){

    $user_Id= $_SESSION['userId'];
    
    $name=$_POST['name'];
    $email=$_POST['email'];
    $descrip=$_POST['description'];

    $db = mysqli_connect("localhost", "root", "", "project");
    $insert="INSERT into contact(id,user,email,message)VALUES(".$user_Id.",'".$name."','".$email."','".$descrip."')";
    $result=mysqli_query($db,$insert);

    if($result){
      echo "<script>alert('Message sent') </script>";
       echo "<script>window.open('shop.php','_self')</script>";
      
  }
}


?>