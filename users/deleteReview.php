<?php
if(isset($_GET['deletingReview'])){
    $reviewId=$_GET['deletingReview'];

    $delete="DELETE from reviews where id='$reviewId'";
    $db = mysqli_connect("localhost", "root", "", "project");
    $result=mysqli_query($db, $delete);
    if($result){
        echo "<script>alert('Your Review Deleted Successfully') </script>";
        echo "<script>window.open('myprofile.php?reviews', '_self') </script>";
    }else{
        echo "<script>alert('Your Review Cannot be deleted') </script>";
    }
}



if(isset($_GET['deletingReviewByAdmin'])){
    $reviewId=$_GET['deletingReviewByAdmin'];

    $delete2="DELETE from reviews where id='$reviewId'";
    $db = mysqli_connect("localhost", "root", "", "project");
    $result2=mysqli_query($db, $delete2);
    if($result2){
        echo "<script>alert('Review Deleted Successfully') </script>";
        echo "<script>window.open('./../admin/adminProfile.php?reviews', '_self') </script>";
    }else{
        echo "<script>alert('Review Cannot be deleted') </script>";
    }
}



?>