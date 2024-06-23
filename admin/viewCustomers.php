<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <style>
        .imgUser{
            width: 40px;
            height: 40px;
            object-fit: cover;
            border-radius: 50%;
        }
        i #emoji{
            font-size: 40px;
        }
        #delete{
            color: red;
            cursor: pointer;
            font-size: 18px;
        }
        #delete{
            transition: transform .2s;
        }
        #delete:hover{
            transform: scale(1.4);
        }
    </style>
</head>
<body>
    <h2 class=" text-center mt-5 mb-4">View All Customers</h2>

    <table class="table table-bordered table-striped table-hover text-center mt-5 " >
        
            <?php
                $db = mysqli_connect("localhost", "root", "", "project");
                $select="Select * from users ";
                $result=mysqli_query($db, $select);
                $rowUsers=mysqli_num_rows($result);

                if($rowUsers==0){
                    echo "<h3 class='text-danger text-center mt-5 mb-4'>No Customers yet!</h3><i class='fa-solid fa-face-sad-tear text-danger' id='emoji'></i>";
                }else{
                    echo "
                    <thead><tr>
                    <th>User Id</th>
                    <th>User Image</th>
                    <th>User Name</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>City</th>
                    <th>Delete?</th>
                    </tr>
                    </thead>";
                    
                    while($row=mysqli_fetch_assoc($result)){
                        $id=$row['id'];
                        $user=$row['user_name'];
                        $userImg=$row['user_image'];
                        $email=$row['email'];
                        $mobile=$row['mobile'];
                        $city=$row['city'];

                                 /////////////fetching from payments table
                                //  $selectMore="SELECT * from orders where user_id='$id'";
                                //  $resultMore=mysqli_query($db, $selectMore);
                                // //  while($more=mysqli_fetch_assoc($resultMore)){
                                // //      $address=$more['address'];
                                // //      echo "User ID: $id, Address: $address<br>";   
                                // //  }
                                // if(mysqli_num_rows($resultMore)>0){
                                //     $more=mysqli_fetch_assoc($resultMore);
                                //     $address=$more['address'];
                                // }else{
                                //     $address="";
                                // }

                                 ?>
                        
                        <tbody><tr>

                                    <td> <?php echo $id; ?> </td>
                                    <td>
                                            <img src="../users/images/<?php echo $userImg;?>" alt="" class="imgUser">
                                    </td>
                                    <td> <?php echo $user; ?> </td>
                                    <td> <?php echo $email; ?> </td>
                                    <td> <?php echo $mobile; ?> </td>
                                    <td><?php echo $city; ?> </td>
                                     

                                    <td>
                                        <a href="adminProfile.php?customers?deleting=<?php echo $id?>"  class="">
                                            <i class="fa-solid fa-trash-can text-danger" id="delete">
                                        </i></a>
                                    </td>      
                        
                        </tr> </tbody>
                    

            <?php
                    }
                }
            ?>
        
    </table>
</body>
</html>