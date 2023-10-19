<?php 
session_start();
include "BD/config.php";
if ( isset($_SESSION['id_enf'])&&isset($_SESSION['user_name'])) {
    $num=$_SESSION['id_enf'];
   
 ?>
 <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>KidKinder - Kindergarten Website Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Handlee&family=Nunito&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Flaticon Font -->
    <link href="lib/flaticon/font/flaticon.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <style>
       .profile-details{
  display: flex;
  align-items: center;
  background:#7AC9D6;
  border: 2px solid #EFEEF1;
  border-radius: 6px;
  height: 50px;
  min-width: 220px;
  padding: 0 15px 0 2px;
}
         .profile-details img{
  height: 40px;
  width: 40px;
  border-radius: 6px;
  object-fit: cover;
}
 .profile-details .admin_name{
  font-size: 15px;
  font-weight: 500;
  color: #333;
  margin: 0 10px;
  white-space: nowrap;
  border-radius: 20px;
 
}
 .profile-details i{
  font-size: 25px;
  color: #333;
}
    </style>
</head>

<body>
    <!-- Navbar Start -->
    <div class="container-fluid bg-light position-relative shadow" >
        <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0 px-lg-5" >
            <a href="" class="navbar-brand font-weight-bold text-secondary" style="font-size: 50px;">
                <i class="flaticon-043-teddy-bear"></i>
                <span class="text-primary">KidKinder</span>
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                <div class="navbar-nav font-weight-bold mx-auto py-0">
                    <a href="home.php" class="nav-item nav-link active">Home</a>
                   
                    <a href="class.php" class="nav-item nav-link">Classes</a>
                    <a href="team.php" class="nav-item nav-link">Teachers</a>
                   
                   
                    <a href="contact.php" class="nav-item nav-link">Contact</a>
                </div>
                <div class="profile-details">
                        <?php  
                          $res = $conn->query("SELECT * FROM parents WHERE id_enf=$num");
                           while($row=mysqli_fetch_array($res)){
                           echo ' <img  src="data:image/jpg;base64,'.base64_encode($row['image']).'"height="200" width="200"/>';
                     
                       
                            ?>
                        
                                <span class="admin_name">
                                    <?php   
                                                echo $row['nom_enfant'];
                                            }
                                    ?>
                                </span>
                                <a href="BD/logoutBD.php">
                               
                                    <img src="img/logout.png" alt=""height="30" width="30">
                                </a>
                                
                        </div>
               
                
            </div>
        </nav>
    </div>
    
    <!-- Navbar End -->


    <!-- Header Start -->
    <div class="container-fluid bg-primary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
            <h3 class="display-3 font-weight-bold text-white">Our Teachers</h3>
            <div class="d-inline-flex text-white">
                <p class="m-0"><a class="text-white" href="">Home</a></p>
                <p class="m-0 px-2">/</p>
                <p class="m-0">Our Teachers</p>
            </div>
        </div>
    </div>
    <!-- Header End -->


     <!-- Team Start -->
     <div class="container-fluid pt-5">
        <div class="container">
            <div class="text-center pb-2">
                <p class="section-title px-5"><span class="px-2">Our Teachers</span></p>
                <h1 class="mb-4">Meet Our Teachers</h1>
            </div>

            <?php
                echo ' <div class="row">
                ';
                   
                    include "BD/config.php";
                    $res = $conn->query("SELECT * FROM instituteur ");
                    while($row=mysqli_fetch_array($res)){
                        echo '<div class="col-md-6 col-lg-3 text-center team mb-5">
                        <div class="position-relative overflow-hidden mb-4" style="border-radius: 100%;">
                        <img  class="img-fluid w-100" src="data:image/jpg;base64,'.base64_encode($row['image']).'"height="100" width="100"/>';
                    
                    echo'   <div  class="team-social d-flex align-items-center justify-content-center w-100 h-100 position-absolute">
                    <a class="btn btn-outline-light text-center mr-2 px-0" style="width: 38px; height: 38px;"
                        href="#"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-outline-light text-center mr-2 px-0" style="width: 38px; height: 38px;"
                        href="#"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-outline-light text-center px-0" style="width: 38px; height: 38px;"
                        href="#"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div> <h4>';
            
            echo $row['name_inst'].'</h4>
            <i>';
            $res2 = $conn->query("SELECT nom_mat FROM cours WHERE code_mat=".$row['code_mat']);
                    while($row2=mysqli_fetch_array($res2)){
            echo $row2['nom_mat'].'</i></div>';}}
            echo '</div>';

            ?>
      
        </div>
    </div>
    <!-- Team End -->


     <!-- Footer Start -->
     <div class="container-fluid bg-secondary text-white mt-5 py-5 px-sm-3 px-md-5">
        <div class="row pt-5">
            <div class="col-lg-3 col-md-6 mb-5">
                <a href="" class="navbar-brand font-weight-bold text-primary m-0 mb-4 p-0" style="font-size: 40px; line-height: 40px;">
                    <i class="flaticon-043-teddy-bear"></i>
                    <span class="text-white">Maissa kids</span>
                </a>
                <p>Labore dolor amet ipsum ea, erat sit ipsum duo eos. Volup amet ea dolor et magna dolor, elitr rebum duo est sed diam elitr. Stet elitr stet diam duo eos rebum ipsum diam ipsum elitr.</p>
                <div class="d-flex justify-content-start mt-4">
                    <a class="btn btn-outline-primary rounded-circle text-center mr-2 px-0"
                        style="width: 38px; height: 38px;" href="#"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-outline-primary rounded-circle text-center mr-2 px-0"
                        style="width: 38px; height: 38px;" href="#"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-outline-primary rounded-circle text-center mr-2 px-0"
                        style="width: 38px; height: 38px;" href="#"><i class="fab fa-linkedin-in"></i></a>
                    <a class="btn btn-outline-primary rounded-circle text-center mr-2 px-0"
                        style="width: 38px; height: 38px;" href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h3 class="text-primary mb-4">Get In Touch</h3>
                <div class="d-flex">
                    <h4 class="fa fa-map-marker-alt text-primary"></h4>
                    <div class="pl-3">
                        <h5 class="text-white">Address</h5>
                        <p>Sfax,Tunisia</p>
                    </div>
                </div>
                <div class="d-flex">
                    <h4 class="fa fa-envelope text-primary"></h4>
                    <div class="pl-3">
                        <h5 class="text-white">Email</h5>
                        <a href="mailto:maissaellouze02@gmail.com">maissaellouze02@gmail.com</a>
                    </div>
                </div>
                <div class="d-flex">
                    <h4 class="fa fa-phone-alt text-primary"></h4>
                    <div class="pl-3">
                        <h5 class="text-white">Phone</h5>
                        <p>+216 29 093 786</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h3 class="text-primary mb-4">Quick Links</h3>
                <div class="d-flex flex-column justify-content-start">
                    <a class="text-white mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Home</a>
                    <a class="text-white mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>About Us</a>
                    <a class="text-white mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Our Classes</a>
                    <a class="text-white mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Our Teachers</a>
                    <a class="text-white mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Our Blog</a>
                    <a class="text-white" href="#"><i class="fa fa-angle-right mr-2"></i>Contact Us</a>
                </div>
            </div>
           
        </div>
        <div class="container-fluid pt-5" style="border-top: 1px solid rgba(23, 162, 184, .2);;">
            <p class="m-0 text-center text-white">
                &copy; . All Rights Reserved. Designed by Maissa ELLOUZE
                
            </p>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary p-3 back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/isotope/isotope.pkgd.min.js"></script>
    <script src="lib/lightbox/js/lightbox.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>
<?php 
}else{
     header("Location: login.php");
     exit();
}

 ?>