

 <?php 
 include('fonts.php');
 ?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        /* body{
            line-height: 1.3;
        } */

        .container{
            max-width: 1400px;
            
        
        }

        .row{
            display: flex;
            flex-wrap: wrap;
        }
        ul,li{
            list-style: none;
        }
        .footer{
          
            background-color:#e9eff5;
            padding: 20px 0;
        }
        .footer-col{
            width: 15%;
            flex: 1;
            padding: 0 25px;
        }

        .footer-col h4{
            position: relative;
            font-size: 20px;
            color: black;
            margin-bottom: 30px;
        }

        .footer-col h4::before{
            content: '';
            position: absolute;
            left: 0;
            bottom: -10px;
            background-color:#0275d8;
            height: 2px;
            box-sizing: border-box;
            width: 60px;
        }

        #para{
            padding-top: 5px;
            text-align: justify;
        }
        .footer-col  li:not(:last-child){
                margin-bottom: 10px;
                
        }

        .footer-col li a{
            font-size: 16px;
            text-decoration: none;
            display: block;
            color: #2f3033;
            transition: all 0.3s ease;
            line-height: 1.9;
        }

        .footer-col li a:hover{
            color: blue;
            padding-left: 8px;
        }

        .contact{
            display: flex;
            align-items: center;
        }
        i{
            font-size: 18px;
        }
        .contact .info{
            padding-left: 20px;
        }

        .icons a #facebook,
        .icons a #instagram{
            display: inline-block;
            height: 40px;
            width: 40px;
            margin: 12px 8px 8px 0;
            /* background-color:#cfcdca; */
            text-align: center;
            line-height: 40px;
            border-radius: 50%;
            color: black;
            transition: all 0.5s ease;
            
        }


        .icons a #facebook:hover{
                background-color: #3b5998;
              color: white;
        }

        .icons a #instagram:hover{
            background: radial-gradient(circle at 30% 107%, #fdf497 0%, #fdf497 5%, #fd5949 45%,#d6249f 60%,#285AEB 90%);
              color: white;
        }
    </style>
 </head>
 <body>
     <footer class="footer mt-4">
        <div class="container">
            <div class="row">
                
                <div class="footer-col">
                    <h4>Our Shop</h4>
                    
                        <div id="para"> Presents you an amusement of toys and fashionable clothings for kids in all ages. 
                             We line up to create a pleasant and joyful experience for all our customers.
                            </div>
                        <!-- <li>
                            <a href="#">cart</a>
                        </li> -->
                    
                        <div class="icons">
                                <a href="https://www.facebook.com/kidsplanetsrilanka?mibextid=ZbWKwL"><i class="fa-brands fa-facebook-f" id="facebook"></i></a>    
                                <a href=""><i class="fa-brands fa-instagram" id="instagram"></i></a>
                                    
                        </div>
                    
                </div>


                <div class="footer-col">
                    <h4>Quick Links</h4>
                    
                        <li>
                            <a href="shop.php">Home</a>
                            <a href="cart.php">Cart</a>
                            <a href="#categories">Categories</a>
                            <a href="./users/myprofile.php">My Account</a>
                            <a href="./users/myprofile.php?myOrders">My Orders</a>
                            
                        </li>
                    
                </div>

                <div class="footer-col">
                    <h4>Contact Us</h4>
                    
                        <li>
                                <div class="contact">
                                    <i class="fa-solid fa-location-dot"></i>
                                    <p class="info">No.14 Puthalam Road, Yanthampalawa, Kurunegala.</p>
                                 </div>

                                 <div class="contact">
                                    <i class="fa-solid fa-phone"></i>
                                    <p class="info" >077 234 3356</p>
                                 </div>

                                 <div class="contact">
                                     <i class="fa-solid fa-envelope"></i>
                                    <p class="info">ishandissa@gmail.com</p>
                                 </div>

                              
                        </li>
                    
                </div>


            </div>
        </div>
     </footer>
 </body>
 </html>