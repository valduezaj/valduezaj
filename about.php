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

 
  <link href="" rel="M">
  

  
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
        <h1>Market Place	</h1> 
          <?php echo $_SESSION['username'];?>
       
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="index.php">Market</a></li>
          <li><a href="about.php" class="active">About</a></li>
          </li>
          
          <li><a href="contact.php">Contact</a></li>
          <li><a href="index.php">Logout</a></li>
        </ul>
      </nav>

      
      
      
      
      
      
      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

    </div>
  </header>

  <main id="main" data-aos="fade" data-aos-delay="1500">    
    <div class="page-header d-flex align-items-center">
      <div class="container position-relative">
        <div class="row d-flex justify-content-center">
          <div class="col-lg-6 text-center">
            <h2>About</h2>
            <p></p>

           <h1> <a class="cta-btn" href="image.php">Upload Image</a> </h1>

          </div>
        </div>
      </div>
    </div>

   
    <section id="about" class="about">
      <div class="container">
        <div class="row gy-4 justify-content-center">
          <div class="col-lg-4">
   <?php
          $res="SELECT `file` FROM register  inner JOIN
         images  on register.id=images.img_id where register.`username`='".$_SESSION['username']."'";

         $res_query=mysqli_query($connection,$res);
         if(mysqli_num_rows($res_query)>0){
         while($row = mysqli_fetch_assoc($res_query)){
        ?>  
        <?php echo '<img src="img/'.$row['file'].'" 
        class="img-fluid " width="100px" height="100px" >'?>
       
         <?php   
       }    
       } 
       else{
       echo "no";
       }
      ?>
          
          </div>
          <div class="col-lg-5 content">
            <h2>Product</h2>
            <p class="fst-italic py-3">
             Yo can choose product here if you want!
              
            </p>
            <div class="row">
              <div class="col-lg-6">
                <ul>
                  
                  <li><i class="bi bi-chevron-right"></i> <strong>Website:</strong> <span>gmail.com</span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Phone:</strong> <span>09854520196</span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>City:</strong> <span>Hilongos, Leyte</span></li>
                </ul>
              </div>
              </div>
            </div>
            
          </div>
        </div>

      </div>
    </section>

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