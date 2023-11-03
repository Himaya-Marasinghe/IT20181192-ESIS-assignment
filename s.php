<?php
session_start(); // Start the session
include 'links.php';

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php'); // Redirect to the login page if the user is not logged in
    exit();
}

// User is logged in, so display the welcome message
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Patient</title>
</head>
<body>
<body class="clinic_version">
      <!-- LOADER -->
      <div id="preloader">
         <img class="preloader" src="images/loaders/heart-loading2.gif" alt="">
      </div>
      <!-- END LOADER -->
      <header>
         <div class="header-top wow fadeIn">
            <div class="container">
               <a class="navbar-brand" href="index.html"><img src="images/logo.png" alt="image"></a>
               <div class="right-header">
                  <div class="header-info">
                     <div class="info-inner">
                        <span class="icontop"><img src="images/phone-icon.png" alt="#"></span>
                        <span class="iconcont"><a href="tel:800 123 456">800 123 456</a></span>	
                     </div>
                     <div class="info-inner">
                        <span class="icontop"><i class="fa fa-envelope" aria-hidden="true"></i></span>
                        <span class="iconcont"><a data-scroll href="mailto:info@yoursite.com">info@Lifecare.com</a></span>	
                     </div>
                     <div class="info-inner">
                        <span class="icontop"><i class="fa fa-clock-o" aria-hidden="true"></i></span>
                        <span class="iconcont"><a data-scroll href="#">Daily: 7:00am - 8:00pm</a></span>	
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="header-bottom wow fadeIn">
            <div class="container">
               <nav class="main-menu">
                  <div class="navbar-header">
                     <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"><i class="fa fa-bars" aria-hidden="true"></i></button>
                  </div>
				  
                  <div id="navbar" class="navbar-collapse collapse">
                     <ul class="nav navbar-nav">
                        <li><a  href="index.html">Home</a></li>
                        <li><a data-scroll href="#about">About us</a></li>
                        <li><a data-scroll href="#service">Services</a></li>
                        <li><a data-scroll href="#doctors">Doctors</a></li>
                        <li><a data-scroll href="#price">Price</a></li>
						<li><a data-scroll href="#testimonials">Testimonials</a></li>
                        <li><a data-scroll href="#getintouch">Contact</a></li>
                        <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
          
                        
                        <li>
                        <div class="form-group" href='register.php'>
                          <div  class="form-group" >
                          <form action="logout.php" method="post">
        <button type="submit" name="logout">Logout</button>
    </form>
                           </div>
                        </li>
                       
                     </ul>
                     
                     
                  </div>
               </nav>


    <!--div id="welcome-message">
        <h2>Welcome To 4Channeling!</h2>
    </div-->
    <!--form action="logout.php" method="post">
        <button type="submit" name="logout">Logout</button>
    </form-->
</body>
</html>