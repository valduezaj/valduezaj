<?php
 $connection = mysqli_connect("localhost","root","","market");
 session_start();
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Market Place</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

 
  <link href="assets/img/favicon.png" rel="M">
 


  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Cardo:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">

  
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">

 
  <link href="assets/css/main.css" rel="stylesheet">

</head>

<body>

  
  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid d-flex align-items-center justify-content-between">

      <a href="index.php" class="logo d-flex align-items-center  me-auto me-lg-0">
        <i class="bi bi-camera"></i>
        <h1>Market Place</h1>
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="index.php" class="active">Market</a></li>
          <li><a href="about.php">About</a></li>
          <li><a href="admin.php">Dashboard</a></li>

    
          
          <li><a href="contact.php">Contact</a></li>
          <li><a href="login.php">Logout</a></li>
        </ul>
      </nav>

      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

    </div>
  </header>

  
  <section id="hero" class="hero d-flex flex-column justify-content-center align-items-center" data-aos="fade" data-aos-delay="1500">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-6 text-center">
          <h2>This Market Website available to selling your needed product.</h2>
    
          <a href="Login.php" class="btn-get-started">Login here</a>
          <a href="register.php" ><h4>If you don't have an account!</h4>Register here</a>
        </div>
      </div>
    </div>
  </section>

  <main id="main" data-aos="fade" data-aos-delay="1500">

   
    <section id="gallery" class="gallery">
      <div class="container-fluid">
      <?php
        $res="SELECT `file` FROM register  inner JOIN
       images  on register.id=images.img_id where register.`username`='".$_SESSION['username']."'";
       $res_query=mysqli_query($connection,$res);
       if(mysqli_num_rows($res_query)>0){
       while($row = mysqli_fetch_assoc($res_query)){
      ?>  
      

      <section id="about" class="about ">
       <div class="container"> 
         <div class="row justify-content-center ">
           <div class="col-lg-4 row">
            <div class="gallery-item h-100 ">
             <?php echo '<img src="img/'.$row['file'].'" class="img-fluid " width="500px" height="500px" >'?>
            </div>
           </div>
          </div>
        </div>
      </section>
            
        <?php   
      }    
      }
      else{
      echo "no";
      }
     ?>
        
      </div>
    </section>

  </main>
    
    
  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <div id="preloader">
    <div class="line"></div>
  </div>

  
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

 
  <script src="assets/js/main.js"></script>

</body>

</html>