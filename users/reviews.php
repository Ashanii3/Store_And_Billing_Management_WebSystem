<?php


if(isset($_POST['submit'])){

    $stars=[];
    $review=$_POST['feedback'];
    $stars = isset($_POST['stars']) ? $_POST['stars'] : [];

    $validStars = [];
    foreach ($stars as $star) {
        if ($star >= 1 && $star <= 5) {
            $validStars[] = $star;
        }
    }
    sort($validStars);

    $starsString = implode(',', $validStars);
    $db = mysqli_connect("localhost", "root", "", "project");

    if(isset($_SESSION['username'])){
        $user=$_SESSION['username'];
        $selectUser="SELECT * from users where user_name='$user'";
        $result=mysqli_query($db,  $selectUser);

        while($row=mysqli_fetch_assoc($result)){
            $id=$row['id'];
            $img=$row['user_image'];
        }



        $insert = "INSERT INTO reviews (user_id, user_name, user_image, feedback, stars)
           VALUES ('$id', '$user', '$img', '$review', '$starsString')";

        $resultReview=mysqli_query($db,  $insert);
        if($resultReview){
            echo "<script> alert ('Review Added')</script>";
        }
    }

  

}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="reviewsStyles.css">
    
</head>
<body>
    
<h2 class="text-center mt-5 mb-4">Add Reviews</h2>
<form action="" method="POST"  class="text-center">

            <div class="form-group ">
                <label for="" class="form-label mt-4">Your feedback</label>
                <textarea  class="form-control border-secondary w-50 m-auto" name="feedback" rows="4" >
                    </textarea> <br>
            </div>

            <div class="form_group mb-4">
                    <div class="wrapper ">
                                <input type="checkbox" id="st1" name="stars[]" value="5" />
                                <label for="st1"></label>
                                <input type="checkbox" id="st2" name="stars[]" value="4" />
                                <label for="st2"></label>
                                <input type="checkbox" id="st3" name="stars[]" value="3" />
                                <label for="st3"></label>
                                <input type="checkbox" id="st4" name="stars[]" value="2" />
                                <label for="st4"></label>
                                <input type="checkbox" id="st5" name="stars[]" value="1" />
                                <label for="st5"></label>
                    </div>
            </div>

            <div class="form_group">
                <button class="btn btn-primary btn-lg rounded-0 mt-5" type="submit" name="submit" id="buttonSubmit">SUBMIT</button>
                
            </div>
</form>




<!------ displaying reviews to the user ------->
<div class="container">
<div class="row ">
  
    <h4 class="mt-5 ">Your reviews</h4><hr>

            <?php
            if(isset($_SESSION['username'])){

                $user=$_SESSION['username'];
                $selectShowReview="SELECT * from reviews where user_name='$user' ";
                $db = mysqli_connect("localhost", "root", "", "project");
                $resultShowReview=mysqli_query($db,  $selectShowReview);

                //Initialize with empty value
                $showReview = ""; 
                $showStars = "";  

                while($rowReview=mysqli_fetch_array($resultShowReview)){
                    $reviewId=$rowReview['id'];
                    $showReview=$rowReview['feedback'];
                    $showStars=$rowReview['stars'];

                    echo "<div class='col-md-4  d-flex'>
                        
                            <div class='feedbackCard border border-secondary rounded p-2'>
                                    <div class='deleteLine d-flex '>
                                        <h3>$showReview</h3>  
                                        <a href='deleteReview.php?deletingReview=$reviewId'><i class='fa-solid fa-trash-can '></i></a>
                                    </div> ";  ?>
                                
                                <?php 
                                     if($showStars==1){
                                        echo '
                                        <div class="star-wrapper">
                                        <input class="star" type="checkbox" title="bookmark page" checked> 
                                        <input class="star" type="checkbox" title="bookmark page" >
                                        <input class="star" type="checkbox" title="bookmark page" >
                                        <input class="star" type="checkbox" title="bookmark page" >
                                        <input class="star" type="checkbox" title="bookmark page" >
                                        </div>';      
                                     }else if($showStars==2){
                                        echo '
                                        <input class="star" type="checkbox" title="bookmark page" checked> 
                                        <input class="star" type="checkbox" title="bookmark page" checked>
                                        <input class="star" type="checkbox" title="bookmark page" >
                                        <input class="star" type="checkbox" title="bookmark page" >
                                        <input class="star" type="checkbox" title="bookmark page" >';      
                                     }else if($showStars==3){
                                        echo '
                                        <input class="star" type="checkbox" title="bookmark page" checked> 
                                        <input class="star" type="checkbox" title="bookmark page" checked>
                                        <input class="star" type="checkbox" title="bookmark page" checked>
                                        <input class="star" type="checkbox" title="bookmark page" >
                                        <input class="star" type="checkbox" title="bookmark page" >';      
                                     }
                                     else if($showStars==4){
                                        echo '
                                        <input class="star" type="checkbox" title="bookmark page" checked> 
                                        <input class="star" type="checkbox" title="bookmark page" checked>
                                        <input class="star" type="checkbox" title="bookmark page" checked>
                                        <input class="star" type="checkbox" title="bookmark page" checked>
                                        <input class="star" type="checkbox" title="bookmark page" >';      
                                     }else if($showStars==5){
                                        echo '
                                        <input class="star" type="checkbox" title="bookmark page" checked> 
                                        <input class="star" type="checkbox" title="bookmark page" checked>
                                        <input class="star" type="checkbox" title="bookmark page" checked>
                                        <input class="star" type="checkbox" title="bookmark page" checked>
                                        <input class="star" type="checkbox" title="bookmark page" checked >';
                                     }
                                ?>
                            
                            <?php echo "</div>
                        </div>";
        
                }
                }
                ?>
        </div>

</div>

</body>
</html>