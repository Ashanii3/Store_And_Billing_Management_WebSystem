<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
            
            .review-container{
             display: flex;
             flex-wrap: wrap;
             /* gap: 1.5rem; */
             
             
           }
           
            .review-container .reviewBox{
             text-align: center;
             border: 1rem solid #fff;
             border-radius: .5rem;
             flex: 1 1 30rem;
             background: #edf0f2;
             padding-left: 10px;
             padding-right: 10px;
           }
           
           
            .review-container .reviewBox img{
             height: 4rem;
             width: 4rem;
             border-radius: 50%;
             border: .3rem solid #fff;
             margin-left: -14rem;
             margin-top: -2rem;
             object-fit: cover;
           }
           
           .review-container .reviewBox h3{
             font-size: 17px;
           }
           
           .review-container .reviewBox p{
             font-size: 14px;
           }
           
           /* stars styling */
           .star {
             visibility:hidden;
             font-size:30px;
             cursor:pointer;
             margin-left: 10px;
           
             
           }
           .star:before {
            content: "\2606";
           
            visibility: visible;
            color: #FFC107;
           }
           .star:checked:before {
            
            content: "\2605";   
            visibility:visible;
            color: #FFC107;
           }
           
           .review-container .reviewBox .trash{
            position: absolute;            
           }

           .review-container .reviewBox .trash a i{
            color: black;
            
            
           }
           
      </style>
</head>
<body>

<h2 class=" text-center mt-5 mb-4">View Reviews</h2>

<div class="row mt-4 " id="reviewSection">
     
     
     <?php
                 
           // fetching reviews
           $selectShowReview="SELECT * from reviews ";
           $db = mysqli_connect("localhost", "root", "", "project");
           $resultShowReview=mysqli_query($db,  $selectShowReview);
           $count=mysqli_num_rows($resultShowReview);
           if($count>0){
                   
                  
                  //Initialize with empty value
                 $showReview = ""; 
                 $showStars = "";  
             
                  while($rowReview=mysqli_fetch_array($resultShowReview)){
                    $reviewId=$rowReview['id'];
                    $reviewName=$rowReview['user_name'];
                    $reviewImg=$rowReview['user_image'];
                    $showReview=$rowReview['feedback'];
                    $showStars=$rowReview['stars'];

                    echo"
                    <div class=' col-md-4 review-container mt-4 mb-3' >
                       <div class='reviewBox'>
                           <img src='../users/images/$reviewImg' alt='' >
                           <h3>$reviewName</h3>
                           <p>$showReview</p> 
                           <div class='trash'>
                                <a href='../users/deleteReview.php?deletingReviewByAdmin=$reviewId'><i class='fa-solid fa-trash-can '></i></a>
                          </div>
                           "; ?>


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

                  
                  </div>
                    ";
                  } 
           }
           
           ?>
                   
  
</div>


</body>
</html>
