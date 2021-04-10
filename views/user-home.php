<?php include "../controls/Database.php" ?>

<?php 
  session_start();
  $db = new Database();
  if(!isset($_SESSION['username']))
  {
    header("Location:../login.php");
  }

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../style.css" />
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link
      href="https://fonts.googleapis.com/css2?family=B612:wght@400;700&display=swap"
      rel="stylesheet"
    />
    <title>Document</title>
  </head>
  <body>
    <header class="header-area">
      <div class="title">
        <h1>Hospital Management System</h1>
      </div>
      <!-- <div class="navigation">
        <nav class="navbar">
          <ul class="menu">
            <li><a href="#">Home</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Service</a></li>
            <li class="dropdown">
              <a class="dropbtn" href="#">Login As ></a>
              <ul>
                <li><a href="">User</a></li>
                <li><a href="">Doctor</a></li>
                <li><a href="">Admin</a></li>
              </ul> 
              <div class="dropdown-content">
              <a href="">User</a>
              <a href="">Doctor</a>
              <a href="">Admin</a>
            </div> 
            </li>
          </ul>
        </nav>
      </div> -->
      <div class="navigation">
        <nav class="menu">
          <ul id="nav">
            <li><a href="#home">Home</a></li>
            <li><a href="#about">About Us</a></li>
            <li><a href="#service">Service</a></li>
            <li><a href="#contact">Contact Us</a></li>
            <li>
              <a href=""><?php echo $_SESSION['username'];?></a>
              <ul>
                <li><a href="../patient/dashboard.php">Profile</a></li>
                <li><a href="../controls/logout.php">Logout</a></li>
              </ul>
            </li>
          </ul>
        </nav>
      </div>
    </header>

    <div class="banner-area" id="home">
      <div class="canvas">
        <img src="../1.jpg" alt="" />
        <div class="title1">
          <h3>Caring for better life</h3>
          <h1>Caring for better life Leading the way in medical excellence</h1>
          <h3>
            Earth greater grass for good. Place for divide evening yielding them
          </h3>
          <h3>that. Creeping beginning over gathered brought.</h3>
          <!-- <div class="apointment">
          <a href="">Make Appointment</a>
        </div> -->
        </div>
        <div class="apointment">
          <a href="../patient/book-appointment.php">Make Appointment</a>
        </div>
      </div>
    </div>


    <div class="about" id="about">
      <div class="left-area">
        <h1>About Us</h1>
        <p>
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia
          cumque at tempora fuga magnam corrupti corporis obcaecati, inventore
          atque blanditiis perferendis harum quos est illo recusandae. Voluptate
          fuga consectetur nobis. Lorem ipsum dolor sit amet, consectetur
          adipisicing elit. Saepe, pariatur dolore debitis temporibus obcaecati
          magni voluptate ipsam minus autem placeat sunt, tempora atque, sint
          incidunt in delectus quos ipsa beatae!
        </p>
        <div class="button">
          <a href="">Read More</a>
        </div>
      </div>
      <div class="right-area">
        <img src="../1.jpg" alt="" />
      </div>
    </div>

    <div class="service" id="service">
      <div class="container">
        <div class="service-title">
          <h1>Our Service</h1>
        </div>
        <div class="col33 grid1">
          <h2>1</h2>
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis enim
            soluta in qui culpa, eligendi molestiae quia voluptatibus iure sint
            neque aut aliquid autem temporibus recusandae beatae. Distinctio,
            reprehenderit consectetur!
          </p>
          <div class="service-button">
            <a href="">Read More</a>
          </div>
        </div>
        <div class="col33 grid2">
          <h2>2</h2>
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis enim
            soluta in qui culpa, eligendi molestiae quia voluptatibus iure sint
            neque aut aliquid autem temporibus recusandae beatae. Distinctio,
            reprehenderit consectetur!
          </p>
          <div class="service-button">
            <a href="">Read More</a>
          </div>
        </div>
        <div class="col33 grid3">
          <h2>3</h2>
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis enim
            soluta in qui culpa, eligendi molestiae quia voluptatibus iure sint
            neque aut aliquid autem temporibus recusandae beatae. Distinctio,
            reprehenderit consectetur!
          </p>
          <div class="service-button">
            <a href="">Read More</a>
          </div>
        </div>
      </div>
    </div>
    <div class="emergency" >
      <div class="container">
        <div class="inner-content">
          <h2>Emergency hotline</h2>
          <h1>(+01) – 256 567 550</h1>
          <p>
            We provide 24/7 customer support. Please feel free to contact us for
            emergency case.
          </p>
        </div>
      </div>
    </div>
    <div class="footer" id="contact">
      <div class="container">
        <div class="footer-about col16">
          <h3>Career</h3>
          <li><a href="">Careers</a></li>
          <li><a href="">Team</a></li>
          <li><a href="">Work</a></li>
        </div>
        <div class="contact col16">
          <h3>Contact</h3>
          <li><a href="">www.aiub.edu</a></li>
          <li><a href="">222-222-222</a></li>
          <li><a href="">Dhaka,Bangladesh</a></li>
        </div>
        <div class="social col16">
          <h3>Social</h3>
          <li><a href="">Facebook</a></li>
          <li><a href="">Twitter</a></li>
          <li><a href="">Instagram</a></li>
        </div>
        <div class="newsletter col30">
          <h2>Join Our Newsletter</h2>
          <div class="input">
            <input type="text" />
          </div>
          <div class="search">
            <a href="">Subscribe</a>
          </div>
        </div>
      </div>
    </div>


    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.nav.js"></script>
    <script src="js/main.js"></script>
    <script>
      $('#nav').onePageNav();
      //stickyScroll();

      // $(window).on('scroll',function()
      // {
      //   if($(this).scrollTop())
      //   {
      //     $('.navigation').addClass("sticky");
      //   }
      //   else{
      //     $('.navigation').removeClass("sticky");
      //   }
      // });
    </script>
  </body>
</html>
