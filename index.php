<?php
require('include/db.php');
$query = "SELECT * FROM home,section_control,social_media,about,contact,contact_us,site_background,seo,admin";
$run = mysqli_query($db,$query);
$user_data =  mysqli_fetch_array($run);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title><?=$user_data['page_title']?></title>
  <meta content="<?=$user_data['description']?>" name="description">
  <meta content="<?=$user_data['keywords']?>" name="keywords">

  <!-- Favicons -->
  <link href="images/<?=$user_data['siteicon']?>" rel="icon">
  <link href="images/<?=$user_data['siteicon']?>" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  
  <!-- ... (your existing code) ... -->
  <style>
    html, body {
      height: 100%;
      margin: 0;
      padding: 0;
    }

    body {
      background-image: url('images/new_background.jpg');
      background-size: cover;
      background-repeat: no-repeat;
      background-attachment: fixed;
    }

    /* Rest of your CSS styles */
  </style>

</head>

  <!-- ======= Header ======= -->
  <header id="header" class="header-tops">

    <div class="container">

      <h1><a href="index.php"><?=$user_data['title']?></a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="mr-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a> -->
      <h2><?=$user_data['subtitle']?></h2>

      <nav id="navbar" class="navbar">
        <ul>
<?php
if($user_data['home_section']){
?>
<li><a class="nav-link active" href="#header">Home</a></li>
<?php 
}
if($user_data['about_section']){
?>
          <li><a class="nav-link" href="#about">About</a></li>
          <?php 
}
if($user_data['portfolio_section']){
?>
          <li><a class="nav-link" href="#portfolio">Portfolio</a></li>
          <?php 
}
if($user_data['contact_section']){
?> 
          <li><a class="nav-link" href="#contact">Contact</a></li>
          <?php 
}
?>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
<?php
if($user_data['showicons']){
  ?>
  <div class="social-links">

    <?php if($user_data['twitter']!=''){?>    
    <a href="https://twitter.com/<?=$user_data['twitter']?>" class="twitter"><i class="bi bi-twitter"></i></a>
    <?php 
}    
    ?>
     
<?php if($user_data['facebook']!=''){?>    
  <a href="#" class="https://facebook.com/<?=$user_data['facebook']?>"><i class="bi bi-facebook"></i></a>
  
    <?php 
}    
if($user_data['instagram']!=''){
    ?>
     <a href="https://www.instagram.com/fandyrezz__/" class="https://instagram.com/<?=$user_data['instagram']?>"><i class="bi bi-instagram"></i></a>
    <?php
}
    ?>
      </div>
  <?php
}
?>
      

    </div>
  </header><!-- End Header -->

  <!-- ======= About Section ======= -->
  <section id="about" class="about">

    <!-- ======= About Me ======= -->
    <div class="about-me container">

      <div class="section-title">
        <h2>About</h2>
        <p>Learn more about me</p>
      </div>

      <div class="row">
        <div class="col-lg-4" data-aos="fade-right">
          <img src="images/<?=$user_data['profile_pic']?>" class="img-fluid" alt="">
        </div>
        <div class="col-lg-8 pt-4 pt-lg-0 content" data-aos="fade-left">
          <h3><?=$user_data['about_title']?></h3>
          <p class="fst-italic">
            <?=$user_data['about_subtitle']?>
          </p>
          <div class="row">
            <div class="col-lg-6">
              <ul>
<?php
$query2 = "SELECT * FROM personal_info";
$run2 = mysqli_query($db,$query2);

while($personal_info =  mysqli_fetch_array($run2)){
  ?>
<ul style="color: white;">
<li><i class="bi bi-chevron-right"></i> <strong><?=$personal_info['label']?> :</strong> <span><?=$personal_info['value']?></span></li>
</ul>
  <?php
}
?>                
              </ul>
            </div>
          </div>
          <p style="color: white;">
            <?=$user_data['about_desc']?>
          </p>
        </div>
      </div>

    </div><!-- End About Me -->

    <!-- ======= Skills  ======= -->
    <div class="skills container">

      <div class="section-title">
        <h2>Skills</h2>
      </div>

      <div class="row skills-content">

        <div class="col-lg-12">
<?php
$query3 = "SELECT * FROM skills";
$run3 = mysqli_query($db,$query3);

while($skill =  mysqli_fetch_array($run3)){
  ?>
          <div class="progress">
            <span class="skill"><?=$skill['skill_name']?> <i class="val"><?=$skill['skill_level']?>%</i></span>
            <div class="progress-bar-wrap">
              <div class="progress-bar" role="progressbar" aria-valuenow="<?=$skill['skill_level']?>" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
          </div>
          <?php
}
          ?>


        </div>

      </div>

    </div><!-- End Skills -->

  </section><!-- End About Section -->



  <!-- ======= Portfolio Section ======= -->
  <section id="portfolio" class="portfolio">
    <div class="container">

      <div class="section-title">
        <h2>Portfolio</h2>
        <p>My Works</p>
      </div>

      <div class="row">
        <div class="col-lg-12  d-flex justify-content-center">
          
        </div>
      </div>

      <div class="row portfolio-container">
      <?php
$query4 = "SELECT * FROM portfolio";
$run4 = mysqli_query($db,$query4);
while($portfolio =  mysqli_fetch_array($run4)){
  ?>
        <div class="col-lg-4 col-md-6 portfolio-item filter-app">
          <div class="portfolio-wrap">
            <img src="images/<?=$portfolio['project_pic']?>" class="img-fluid" alt="">
            <div class="portfolio-info">
              <h4><?=$portfolio['project_name']?></h4>
              <p><?=$portfolio['project_type']?></p>
              <div class="portfolio-links">
                <a href="images/<?=$portfolio['project_pic']?>" data-gallery="portfolioGallery" class="portfolio-lightbox" title="App 1"><i class="bx bx-plus"></i></a>
                <a href="<?-$portfolio['project_link']?>" data-gallery="portfolioDetailsGallery" data-glightbox="type: external" class="portfolio-details-lightbox" title="Portfolio Details"><i class="bx bx-link"></i></a>
              </div>
            </div>
          </div>
        </div>
<?php
}
?>

      </div>

    </div>
  </section><!-- End Portfolio Section -->

  <!-- ======= Contact Section ======= -->
  <section id="contact" class="contact">
    <div class="container">

      <div class="section-title">
        <h2>Contact</h2>
        <p>Contact Me</p>
      </div>

      <div class="row mt-2">

        <div class="col-md-6 d-flex align-items-stretch">
          <div class="info-box">
            <i class="bx bx-map"></i>
            <h3>My Address</h3>
            <p><?=$user_data['address']?></p>
          </div>
        </div>

        <div class="col-md-6 mt-4 mt-md-0 d-flex align-items-stretch">
          <div class="info-box">
            <i class="bx bx-share-alt"></i>
            <h3>Social Profiles</h3>
            <?php if($user_data['twitter']!=''){?>    
    <a href="https://twitter.com/<?=$user_data['twitter']?>" class="twitter"><i class="bi bi-twitter"></i></a>
    <?php 
}    
    ?>
     
<?php if($user_data['facebook']!=''){?>    
  <a href="#" class="https://facebook.com/<?=$user_data['facebook']?>"><i class="bi bi-facebook"></i></a>
  
    <?php 
}    
if($user_data['instagram']!=''){
    ?>
     <a href="#" class="https://instagram.com/<?=$user_data['instagram']?>"><i class="bi bi-instagram"></i></a>
  <?php
}
?>
    </div>
  </div>  

        <div class="col-md-6 mt-4 d-flex align-items-stretch">
          <div class="info-box">
            <i class="bx bx-envelope"></i>
            <h3>Email Me</h3>
            <p><?=$user_data['email_user']?></p>
          </div>
        </div>
        <div class="col-md-6 mt-4 d-flex align-items-stretch">
          <div class="info-box">
            <i class="bx bx-phone-call"></i>
            <h3>Call Me</h3>
            <p><?=$user_data['mobile']?></p>
          </div>
        </div>
      </div>

      
      <div class="form" id=>
              <form action="include/admin.php" method="post" class="php-email-form">
                <div class="row">
                  <div class="form-group col-md-6">
                    <input type="text" name="fullname" class="form-control" id="fullname" placeholder="Your Name" required>
                  </div>
                  <div class="form-group col-md-6 mt-3 mt-md-0">
                    <input type="email" class="form-control" name="email_form" id="email_form" placeholder="Your Email" required>
                  </div>
                </div>
                <div class="form-group mt-3">
                  <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
                </div>
                <div class="form-group mt-3">
                  <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
                </div>
                <div class="my-3">
                  <div class="sent-message">Your message has been sent. Thank you!</div>
                </div>
                <button type="submit" name="submit_form">Send Message</button></div>
              </form>
            </div>
            
  </section><!-- End Contact Section -->

  <!-- <div class="credits">
    <!-- All the links in the footer should remain intact. -->
    <!-- You can delete the links only if you purchased the pro version. -->
    <!-- Licensing information: https://bootstrapmade.com/license/ -->
    <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/personal-free-resume-bootstrap-template/ -->
    <!-- Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
  </div> -->

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>