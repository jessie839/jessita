<?php
session_start();

// Check if the user is already logged in
if (!isset($_SESSION['user_logged_in']) || $_SESSION['user_logged_in'] !== true) {
    // User is not logged in, redirect to the login page
    header("Location: login.php");
    exit();
}

// If the user is logged in, display the main content of your site
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['photo'])) {
    // Check if file was uploaded without errors
    if ($_FILES['photo']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['photo']['tmp_name'];
        $fileName = $_FILES['photo']['name'];
        $uploadFileDir = './uploads/';
        $dest_path = $uploadFileDir . basename($fileName);

        // Move the file to the upload directory
        if (move_uploaded_file($fileTmpPath, $dest_path)) {
            $upload_message = "File is successfully uploaded.";
        } else {
            $upload_message = "There was an error moving the uploaded file.";
        }
    } else {
        $upload_message = "No file uploaded or there was an upload error.";
    }
}

// Display uploaded photos
$uploadedPhotos = glob('./uploads/*'); // Get all files from the uploads directory
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Grace Cottage</title>
  <meta name="description" content="">
  <meta name="keywords" content="">
  <link href="assets/img/logo.jpg" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="assets/css/main.css" rel="stylesheet">
  <style>
    .gallery img {
      width: 100%;
      height: auto;
      margin-top: 10px;
    }
  </style>
</head>
<body>

    <body class="index-page">
      <header id="header" class="header d-flex align-items-center fixed-top">
        <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">
          <a href="index.html" class="logo d-flex align-items-center">
              <h1 class="sitename"style="color: black;">Grace<span>Cottage</span></h1>
          </a>
              <nav id="navmenu" class="navmenu">
                  <ul>
                      <li><a href="index.html" class="active">Home</a></li>
                      <li><a href="about.html">About</a></li>
                      <li><a href="functions.html">Functions</a></li>
                      <li><a href="properties.html">Properties</a></li>
                      <li><a href="contact.html">Contact</a></li>
                      <li><a href="logout.php">Logout</a></li>
					            
                    </ul>
                      <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
              </nav>
        </div>
      </header>
  <main class="main">
    <div id="particles-js"></div>
      <header>
        <h1>GRACE COTTAGE</h1>
      </header>
      
      <img src="assets/img/team/home.png" style="height: auto;width:100%;"/>
    <section id="hero" class="hero section" >
        <div class="overlay"></div>
        <div class="hero-content">
           <h2 class="fade-in" 
>Welcome to Grace Cottage</h2>
            
            <a href="contact.html" class="btn btn-dark ">Contact Us</a><br>
            <a href="Occupants.html" class="btn btn-dark ">View Occupants</a>
            </div></br>
            
           
            
        </div>
    </section>

    <section id="services" class="services section" style="
    margin-top: 0;
    padding-top: 0;
">
      <div class="container section-title" data-aos="fade-up">
        <h2>Functions</h2>
        <p>"Functions in our Grace Cottage are like the heart of home life—each one beautifully designed to make everyday living smooth and efficient"</p>
      </div>
      <div class="container">
        <div class="row gy-4">
          <!-- Celebrations -->
          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="service-item position-relative">
              <div class="icon">
                <i class="bi bi-gift"></i>
              </div>
              
              
                <h3>Celebrations</h3>
              </a>
              <p>"Other celebrations at our Grace Cottage are like delightful surprises—each one adds a unique sparkle to the space"</p>
              <form action="celebrations.php" method="GET" style="display: inline-block; margin: 20px;">
            <button type="submit" style="padding: 20px; width: 200px; background-color: #f65003; color: black; border: none; border-radius: 10px; font-size: 18px; cursor: pointer; transition: background-color 0.3s ease;">
                Click to upload photo
            </button>
        </form>
            </div>
          </div>
    
          <!-- Wedding Anniversaries -->
          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="service-item position-relative">
              <div class="icon">
                <i class="bi bi-person-heart"></i>
              </div>
              <h3>Wedding Anniversaries</h3>
              <p>"Wedding anniversaries at our Grace Cottage are like special milestones—celebrating love and commitment with heartfelt gatherings"</p>
              <form action="wedding-anniversaries.php" method="GET" style="display: inline-block; margin: 20px;">
            <button type="submit" style="padding: 20px; width: 200px; background-color: #f65003; color: black; border: none; border-radius: 10px; font-size: 18px; cursor: pointer; transition: background-color 0.3s ease;">
            Click to upload photo
            </button>
        </form>
            </div>
          </div>
    
          <!-- Christmas -->
          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
            <div class="service-item position-relative">
              <div class="icon">
                <i class="bi bi-tree"></i>
              </div>
              <h3>Christmas</h3>
              <p>"Christmas is like a special event at our Grace Cottage—transforming the space with festive cheer"</p>
              <form action="christmas.php" method="GET" style="display: inline-block; margin: 20px;">
            <button type="submit" style="padding: 20px; width: 200px; background-color: #f65003; color: black; border: none; border-radius: 10px; font-size: 18px; cursor: pointer; transition: background-color 0.3s ease;">
            Click to upload photo
            </button>
        </form>
            </div>
          </div>
    
          <!-- New Year -->
          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
            <div class="service-item position-relative">
              <div class="icon">
                <i class="bi bi-stars"></i>
              </div>
              <h3>New Year</h3>
              <p>"New Year's is like a grand celebration at our Grace Cottage—ushering in fresh beginnings with a burst of joy and excitement"</p>
              <form action="new-year.php" method="GET" style="display: inline-block; margin: 20px;">
            <button type="submit" style="padding: 20px; width: 200px; background-color: #f65003; color: black; border: none; border-radius: 10px; font-size: 18px; cursor: pointer; transition: background-color 0.3s ease;">
            Click to upload photo
            </button>
        </form>
            </div>
          </div>
    
          <!-- Get-together -->
          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="500">
            <div class="service-item position-relative">
              <div class="icon">
                <i class="bi bi-person-arms-up"></i>
              </div>
              <h3>Get-together</h3>
              <p>"A get-together at our Grace Cottage is like a cherished gathering—bringing people together in a warm and inviting space"</p>
              <form action="get-together.php" method="GET" style="display: inline-block; margin: 20px;">
            <button type="submit" style="padding: 20px; width: 200px; background-color: #f65003; color: black; border: none; border-radius: 10px; font-size: 18px; cursor: pointer; transition: background-color 0.3s ease;">
            Click to upload photo
            </button>
        </form>
    </div>
            </div>
          </div>
    
          <!-- Birthdays -->
          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="600">
            <div class="service-item position-relative">
              <div class="icon">
                <i class="bi bi-cake"></i>
              </div>
              <h3>Birthdays</h3>
              <p>"Birthdays are like functions in our Grace Cottage—each one brings a unique celebration, adding joy and warmth to our lives"</p>
              <form action="birthdays.php" method="GET" style="display: inline-block; margin: 20px;">
            <button type="submit" style="padding: 20px; width: 200px; background-color: #f65003; color: black; border: none; border-radius: 10px; font-size: 18px; cursor: pointer; transition: background-color 0.3s ease;">
            Click to upload photo
            </button>
        </form>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section id="agents" class="agents section">
      <div class="container section-title" data-aos="fade-up">
        <h2>About Owners:</h2>
        <p>"The heart and soul behind Grace Cottage are its owners, whose love for hospitality turns every stay into a cherished memory"</p>
      </div>
    </section>
    <footer id="footer" class="footer light-background">
      <div class="contact-section">
          <div class="info-item">
            <i class="bi bi-geo-alt icon"></i>
            <div>
              <h4>Address</h4>
              <p>R-37, Pallavan Nagar, 7th cross street<br>
                 Thiruverkadu, Chennai-600077</p>
            </div>
          </div>
          <div class="info-item">
            <i class="bi bi-telephone icon"></i>
            <div>
              <h4>Contact</h4>
              <p>
                <strong>Phone 1:</strong> <span>9940409759</span><br>
                <strong>Phone 2:</strong> <span>9952026025</span><br>
                <strong>Email:</strong> <span>d_amose@yahoo.in</span><br>
              </p>
            </div>
          </div>
        </div>
      </footer>
      <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
      <div id="preloader"></div>
      <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
      <script src="assets/vendor/php-email-form/validate.js"></script>
      <script src="assets/vendor/aos/aos.js"></script>
      <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
      <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
      <script src="assets/js/main.js"></script>
      <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>


</body>
</html>
