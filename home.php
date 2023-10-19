<?php 
session_start();
include "BD/config.php";
if ( isset($_SESSION['id_enf'])&&isset($_SESSION['user_name'])) {
    $num=$_SESSION['id_enf'];
 
   
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <meta charset="utf-8">
    <title>KidKinder - Kindergarten Website Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- modale -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="css/modale.css" rel="stylesheet">


    <script src="https://code.iconify.design/iconify-icon/1.0.2/iconify-icon.min.js"></script>


   
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/f!ont-awesome/5.10.0/css/all.min.css" rel="stylesheet">
 <!-- Libraries Stylesheet -->
 <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">
    <!-- Flaticon Font -->
    <link href="lib/flaticon/font/flaticon.css" rel="stylesheet">

   
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
    <?php
    $sql = "DELETE FROM `etd_inscrit` WHERE date_insc+1=CURDATE();";
    $result = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
			

    ?>


    <!-- Navbar Start -->
    <div class="container-fluid bg-light position-relative shadow" >
        <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0 px-lg-5" >
            <a href="" class="navbar-brand font-weight-bold text-secondary" style="font-size: 50px;">
                <i class="flaticon-043-teddy-bear"></i>
                <span class="text-primary">Maissa kids </span>
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
    <!-- <div class="container-fluid bg-primary px-0 px-md-5 mb-5">
        <div class="row align-items-center px-3">
            <div class="col-lg-6 text-center text-lg-left">
                <h4 class="text-white mb-4 mt-5 mt-lg-0">Kids Learning Center</h4>
                <h1 class="display-3 font-weight-bold text-white">New Approach to Kids Education</h1>
                <p class="text-white mb-4">Sea ipsum kasd eirmod kasd magna, est sea et diam ipsum est amet sed sit.
                    Ipsum dolor no justo dolor et, lorem ut dolor erat dolore sed ipsum at ipsum nonumy amet. Clita
                    lorem dolore sed stet et est justo dolore.</p>
                
            </div>
            <div class="col-lg-6 text-center text-lg-right">
                <img class="img-fluid mt-5" src="img/header.png" alt="">
            </div>
        </div> 
    </div>-->
    <!-- Header End-->


    
    


    <!-- Class Start -->
    <div class="container-fluid pt-5">
        <div class="container">
            <div class="text-center pb-2">
                <p class="section-title px-5"><span class="px-2" >Popular Classes</span></p>
                <h1 class="mb-4" >Classes for Your Kids</h1>
            </div>
            <div class="row">
            <?php
                 include "BD/config.php";
                 $res = $conn->query("SELECT * FROM cours");
                 
                 while($row=mysqli_fetch_array($res)){
                    echo'<div class="col-lg-4 mb-5">
                    <div class="card border-0 bg-light shadow-sm pb-2">
                    <img class="card-img-top mb-2" src="data:image/jpg;base64,'.base64_encode($row['image_mat']).'"height="200" width="200"/>
                    <div class="card-body text-center">
                    <h4 class="card-title">'.
                    $row['nom_mat']
                    .'</h4>
                    <p class="card-text">'.$row['texte'].'</p></div>
                    <div class="card-footer bg-transparent py-4 px-5">
                            <div class="row border-bottom">
                                <div class="col-6 py-1 text-right border-right"><strong>Age of Kids</strong></div>
                                <div class="col-6 py-1">3 - 6 Years</div>
                            </div>
                            <div class="row border-bottom">
                                <div class="col-6 py-1 text-right border-right"><strong>Total Seats</strong></div>
                                <div class="col-6 py-1">'.$row['cap_mat'].'</div>
                                </div>
                                <div class="row border-bottom">
                                    <div class="col-6 py-1 text-right border-right"><strong>Class Time</strong></div>
                                    <div class="col-6 py-1">08:00 - 10:00</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 py-1 text-right border-right"><strong>Price/Month</strong></div>
                                        <div class="col-6 py-1">'.$row['prix'].'</div>
                                    </div>
                                </div>';
                                $x=$row['code_mat'];

                                $sql2 = "SELECT * FROM etd_inscrit WHERE id_enf=".$num ." AND code_mat=".$x ;
                                $result2 = mysqli_query($conn, $sql2); 
                                $data = mysqli_fetch_assoc($result2);
                                
                                
                                if ($data){
                                      
                                          
                                          echo'<form action="#id01" method="post" class="px-4 mx-auto mb-4">
                                          <a  class="btn btn-success px-4 mx-auto mb-4" name="join" value="0">Already registered  </a>
                                          </form>';
                                
                                
                                      }else {


                                                if ($row['cap_mat']==$row['nbrEtdInsc'])

                                                    echo'<form action="#id01" method="post" class="px-4 mx-auto mb-4">
                                                    <a  class="btn btn-danger px-4 mx-auto mb-4"  name="join" value="0">full</a>
                                                    </form>';
                                
                                                 else{
                                                        

                                                                    //echo' <a href="#id01?id="$row['code_mat']" name="join" class="btn btn-primary px-4 mx-auto mb-4" value="'.$row['code_mat'].'">join class</a>';}
                                                        
                                                                echo" <form action='#id01' method='post' class='px-4 mx-auto mb-4'>
                                                                    
                                                                <button class='btn btn-primary px-4 mx-auto mb-4'  type='submit' name='join' value='".$row['code_mat']."'>             
                                                            
                                                                Join Class 
                                                                </span></button> 
                                                                    
                                                                </a>
                                                                
                                                                </form>";
                                                            

                                                    }
                                            }

                            
                                        echo'</div> 
                        </div>';
                    }
                        ?>
                        <?php
                    if (isset ($_POST['join'])){
                       $id_mat=$_POST['join'];
                       if ($id_mat!=0){
                        $res = $conn->query("SELECT * FROM cours WHERE code_mat='$id_mat'");
                 
                        while($row=mysqli_fetch_array($res)){
                        
                       echo' <div id="id01" class="modal">
          <div class="modal-dialog">
            <div class="modal-content">
              <header class="container"> 
                <a href="#" class="closebtn">×</a>
                
              </header>
              <div class="container">
                <div class="row">
                    
                    
                    <div class="col-12 mt-4">
                        <div class="card p-3">
                            <p class="mb-0 fw-bold h4">Payment Methods</p>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card p-3">
                        
                            <div class="card-body border p-0">
                                <p>
                                    <a class="btn btn-primary p-2 w-100 h-100 d-flex align-items-center justify-content-between"
                                        data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="true"
                                        aria-controls="collapseExample">
                                        <span class="fw-bold">Credit Card</span>
                                        <span class="">
                                            <span class="fab fa-cc-amex"></span>
                                            <span class="fab fa-cc-mastercard"></span>
                                            <span class="fab fa-cc-discover"></span>
                                        </span>
                                    </a>
                                </p>
                                <div class="collapse show p-3 pt-0" id="collapseExample">
                                    <div class="row">
                                        <div class="col-lg-5 mb-lg-0 mb-3">
                                            <p class="h4 mb-0">Summary</p>
                                            <p class="mb-0"><span class="fw-bold">Class:</span><span class="c-green">
                                            '.$row['nom_mat'].'
                                            
                                            </span>
                                            </p>
                                            <p class="mb-0">
                                                <span class="fw-bold">Price:</span>
                                                <span class="c-green">'.$row['prix'].'  DT</span>
                                            </p>
                                            <p class="mb-0">'.$row['texte'].'</p>
                                        </div>
                                        <div class="col-lg-7">
                                            <form action="" class="form">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form__div">
                                                            <input type="text" class="form-control" placeholder=" ">
                                                            <label for="" class="form__label">Card Number</label>
                                                        </div>
                                                    </div>
        
                                                    <div class="col-6">
                                                        <div class="form__div">
                                                            <input type="text" class="form-control" placeholder=" ">
                                                            <label for="" class="form__label">MM / yy</label>
                                                        </div>
                                                    </div>
        
                                                    <div class="col-6">
                                                        <div class="form__div">
                                                            <input type="password" class="form-control" placeholder=" ">
                                                            <label for="" class="form__label">cvv code</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form__div">
                                                            <input type="text" class="form-control" placeholder=" ">
                                                            <label for="" class="form__label">name on the card</label>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-9">
                    <br> 
                    <form action="BD/payement.php" method="post" class="px-4 mx-auto mb-4">
                        <div class="btn btn-primary   w-50" style="margin-left: 300px;">
                        <button style="border:none;background:none" type="submit" name="pay" value="'.$row['code_mat'].'">
                        <i class="fa fa-dollar" ></i> 
                         Make Payment
                         </button>
                        </div>
                        </form>
                            
                        <br>
                    </div>
                </div>
            </div>
            </div>
          </div>
        </div> 
        <?php } ?>
        
        
        <!-- fin modale -->
                        '; 

                        }              
                                    
                    }
                }
                ?>

              


                <!-- <div class="col-lg-4 mb-5">
                    <div class="card border-0 bg-light shadow-sm pb-2">
                        <img class="card-img-top mb-2" src="img/class-1.jpg" alt="">
                        <div class="card-body text-center">
                            <h4 class="card-title">Drawing Class</h4>
                            <p class="card-text">Justo ea diam stet diam ipsum no sit, ipsum vero et et diam ipsum duo et no et, ipsum ipsum erat duo amet clita duo</p>
                        </div>
                        <div class="card-footer bg-transparent py-4 px-5">
                            <div class="row border-bottom">
                                <div class="col-6 py-1 text-right border-right"><strong>Age of Kids</strong></div>
                                <div class="col-6 py-1">3 - 6 Years</div>
                            </div>
                            <div class="row border-bottom">
                                <div class="col-6 py-1 text-right border-right"><strong>Total Seats</strong></div>
                                <div class="col-6 py-1">40 Seats</div>
                            </div>
                            <div class="row border-bottom">
                                <div class="col-6 py-1 text-right border-right"><strong>Class Time</strong></div>
                                <div class="col-6 py-1">08:00 - 10:00</div>
                            </div>
                            <div class="row">
                                <div class="col-6 py-1 text-right border-right"><strong>Prix/Month</strong></div>
                                <div class="col-6 py-1">$290 / Month</div>
                            </div>
                        </div>
                        <a href="" class="btn btn-primary px-4 mx-auto mb-4">Join Now</a>
                    </div>
                </div> -->


            </div>
        </div>
    </div>
    <!-- Class End -->




    <!-- Facilities Start -->
    <div class="container-fluid pt-5" >
        <div class="container pb-3">
            <div class="row">
                <div class="col-lg-4 col-md-6 pb-1">
                    <div class="d-flex bg-light shadow-sm border-top rounded mb-4" style="padding: 30px;">
                        <i class="flaticon-050-fence h1 font-weight-normal text-primary mb-3"></i>
                        <div class="pl-4">
                            <h4>Play Ground</h4>
                            <p class="m-0">Kasd labore kasd et dolor est rebum dolor ut, clita dolor vero lorem amet elitr vero...</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 pb-1">
                    <div class="d-flex bg-light shadow-sm border-top rounded mb-4" style="padding: 30px;">
                        <i class="flaticon-022-drum h1 font-weight-normal text-primary mb-3"></i>
                        <div class="pl-4">
                            <h4>Music and Dance</h4>
                            <p class="m-0">Kasd labore kasd et dolor est rebum dolor ut, clita dolor vero lorem amet elitr vero...</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 pb-1">
                    <div class="d-flex bg-light shadow-sm border-top rounded mb-4" style="padding: 30px;">
                        <i class="flaticon-030-crayons h1 font-weight-normal text-primary mb-3"></i>
                        <div class="pl-4">
                            <h4>Arts and Crafts</h4>
                            <p class="m-0">Kasd labore kasd et dolor est rebum dolor ut, clita dolor vero lorem amet elitr vero...</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 pb-1">
                    <div class="d-flex bg-light shadow-sm border-top rounded mb-4" style="padding: 30px;">
                        <i class="flaticon-017-toy-car h1 font-weight-normal text-primary mb-3"></i>
                        <div class="pl-4">
                            <h4>Safe Transportation</h4>
                            <p class="m-0">Kasd labore kasd et dolor est rebum dolor ut, clita dolor vero lorem amet elitr vero...</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 pb-1">
                    <div class="d-flex bg-light shadow-sm border-top rounded mb-4" style="padding: 30px;">
                        <i class="flaticon-025-sandwich h1 font-weight-normal text-primary mb-3"></i>
                        <div class="pl-4">
                            <h4>Healthy food</h4>
                            <p class="m-0">Kasd labore kasd et dolor est rebum dolor ut, clita dolor vero lorem amet elitr vero...</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 pb-1">
                    <div class="d-flex bg-light shadow-sm border-top rounded mb-4" style="padding: 30px;">
                        <i class="flaticon-047-backpack h1 font-weight-normal text-primary mb-3"></i>
                        <div class="pl-4">
                            <h4>Educational Tour</h4>
                            <p class="m-0">Kasd labore kasd et dolor est rebum dolor ut, clita dolor vero lorem amet elitr vero...</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Facilities Start -->



   

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
            <div class="col-3-lg-3 col-md-6 mb-5">
                <a href="" class="navbar-brand font-weight-bold text-primary m-0 mb-4 p-0" style="font-size: 40px; line-height: 40px;">
                    <i class="flaticon-043-teddy-bear"></i>
                    <span class="text-white">Maissa Kids</span>
                </a>
                <p>Project developed by a young student for a kindergarten.</p>
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
                    <h4 class="fa fa-phone text-primary"></h4>
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
                    
                    <a class="text-white mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Our Classes</a>
                    <a class="text-white mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Our Teachers</a>
       
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