<?php
require('config/db.php');
session_start();

// Create Query
$query = 'SELECT * FROM timeline ORDER BY date DESC';

// Get Result
$result = mysqli_query($mysqli, $query);

// Fetch Data
$events = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Free Result
mysqli_free_result($result);

// Close Connection
mysqli_close($mysqli);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>DSC IITP</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,700|Open+Sans:300,300i,400,400i,700,700i" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="lib/magnific-popup/magnific-popup.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/timeline.css" rel="stylesheet">
  <style>
   #circle
    {
      border-radius:50% 50% 50% 50%;  
      width:100%;
      height:100%;
   }
   .timeline > li .timeline-panel {
      background-color:#E8F8F5;
      border-radius:10px;
    }
    

  </style>
</head>

<body>

  <!-- Load Facebook SDK for JavaScript -->
  <div id="fb-root"></div>
  <script>
    window.fbAsyncInit = function() {
      FB.init({
        xfbml: true,
        version: 'v3.3'
      });
    };

    (function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s);
      js.id = id;
      js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
  </script>

  <!-- Your customer chat code -->
  <div class="fb-customerchat" attribution=setup_tool page_id="2181729528574999">
  </div>


  <!--==========================
    Header
  ============================-->
  <header id="header">
    <div class="container">

      <div id="logo" class="pull-left">
      <h1><a href="./"><img src="img/logo.png" alt="" title="" width="70%" id='logoimg'></a></h1>
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
        <li class="menu-active"><a href="./">Home</a></li>
          <li><a href="./gallery.php">Gallery</a></li>
          <li><a href="./team.php">Team</a></li>
          <li><a href="./#contact">Contact Us</a></li>
          <li><a href="./projects.php">Projects</a></li>
          <li><a href="./leaderboard.php">Leaderboard</a></li>
          <li><a href="./timeline.php">Timeline</a></li>
         <!-- <li><a href="./hackathon.php">Hackathon</a></li>-->
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- #header -->
 

  <!--==========================
      Timeline Section
    ============================-->
  <div style="height: 160px">


  </div>


  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <ul class="timeline">

        <?php $i = 0;
        foreach ($events as $event) : ?>
          <?php if ( $i%2==0 ) { $i++; ?>
            <li class='timeline-straight'>
            <a href="">
              <div class='timeline-image'>
                <img class=' rounded-circle img-fluid img_url' src="img/dsccover.jpg" alt="" id="circle">
              </div>
            </a>
            <div class='timeline-panel'>
              <div class='timeline-heading'>
                <h4 class='date'><?php echo $event['date']?></h4>
                <hr>
                <h4 class='subheading title'><?php echo $event['title']?></h4>
              </div>
              <div class='timeline-body'>
                <p class='details short_desc'><?php echo $event['short_desc']?></p>
                <p class='details long_desc'><?php echo $event['long_desc']?></p>
              </div>
            </div>
          </li>
        <?php } else { $i++; ?>
          <li class='timeline-inverted'><a href="">
              <div class='timeline-image'><img class='rounded-circle img-fluid img_url' src="img/1_myY345H2376N21kQ8oeyNw.jpg" alt="" id="circle"></div>
            </a>
            <div class='timeline-panel'>
              <div class='timeline-heading'>
                <h4 class='date'><?php echo $event['date']?></h4>
                <hr>
                <h4 class='subheading title'><?php echo $event['title']?></h4>
              </div>
              <div class='timeline-body'>
                <p class='details short_desc'><?php echo $event['short_desc']?></p>
                <p class='details long_desc'><?php echo $event['long_desc']?></p>
              </div>
            </div>
          </li>
          <?php } ?>

        <?php endforeach; ?>
        </ul>
      </div>
    </div>
  </div>
  <br><br>


  <!--==========================
    Footer
  ============================-->
  <footer id="footer">
    <div class="container">
        
      <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-3">
          <strong>Quick Links:</strong>
          <br><br>
          <a href="https://www.iitp.ac.in/">IIT Patna</a>
          <br>
          <a href="https://www.iitp.ac.in/hostel/reachIITP.html">Reach Us</a>
          <br>
          <br>
          <br>
          
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3">
          <strong>Social Links:</strong>
          <br><br>
          <a href="https://www.facebook.com/dsciitpatna/">
          <i class="fa fa-facebook-square">
          </i>
          Developer Student Club
          </a>
          <br>
          <a href="https://www.facebook.com/iitp.ac.in/">
          <i class="fa fa-facebook-square">
           </i>
          IIT Patna
          </a>
          <br>
          <br>
          <br>
          
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3">
         <strong>Back To:</strong>
         <br><br>
         <a href="./" class="scrollto">Home</a>
         <br>
         <a href="./projects.php" class="scrollto">Projects</a>
         <br>
          <br>
          <br>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3">
         <strong>Copyright ©</strong> 
        <br>
        <strong>Developer Student Club</strong>
         <br>
        <strong>Indian Institute of Technology, Patna</strong>
        <br>
         <a href="./projectidea.php" class="btn-get-started scrollto" >Submit A Project Idea</a>  
         </div>
         <br><br>
      </div>
    </div>
  </footer><!-- #footer -->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

  <!-- JavaScript Libraries -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/jquery/jquery-migrate.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/wow/wow.min.js"></script>
  <script src="lib/superfish/hoverIntent.js"></script>
  <script src="lib/superfish/superfish.min.js"></script>
  <script src="lib/magnific-popup/magnific-popup.min.js"></script>

  <!-- Contact Form JavaScript File -->
  <script src="contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="js/main.js"></script>

</body>

</html>