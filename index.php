<?php
  require('config/db.php');
  session_start();

  $query = 'SELECT * FROM announcements ORDER BY date DESC';
  $result = mysqli_query($mysqli, $query);
  $announcements = mysqli_fetch_all($result, MYSQLI_ASSOC);

  if(sizeof($announcements) >= 5) {
    $announcements=array_slice($announcements,0,5);
  }

  mysqli_free_result($result);
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
  <!-- font awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <!-- Main Stylesheet File -->
  <link href="css/style.css?version=1" rel="stylesheet">

  <style>
    @media only screen and (max-width: 768px) {
        
    .desktop{
      display:none;
    }
    .mobile{
      display:inline;
    }

    }
    @media only screen and (min-width: 768px) {

      .mobile {display:none;}
      .desktop{display:inline;}
      
      }
      @media only screen and (min-width: 1525px) {
        .mobile {display:none;}
      }

        
    .announcement-header {
        font-size: 32px;
        color: #111;
        text-transform: uppercase;
        text-align: center;
        font-weight: 700;
        position: relative;
        padding-bottom: 15px;
    }

    .announcement-header::before {
        content: '';
        position: absolute;
        display: block;
        width: 120px;
        height: 1px;
        background: #ddd;
        bottom: 1px;
        left: calc(50% - 60px);
    }

    .announcement-header::after {
        content: '';
        position: absolute;
        display: block;
        width: 40px;
        height: 3px;
        background: #18d26e;
        bottom: 0;
        left: calc(50% - 20px);
    }

  </style>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

      <!-- Load Facebook SDK for JavaScript -->
      <div id="fb-root"></div>
      <script>
        window.fbAsyncInit = function() {
          FB.init({
            xfbml            : true,
            version          : 'v3.3'
          });
        };

        (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));</script>

      <!-- Your customer chat code -->
      <div class="fb-customerchat"
        attribution=setup_tool
        page_id="2181729528574999">
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
          <li><a href="./#about">About Us</a></li>
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
    Intro Section
  ============================-->
  <section id="intro">
    <div class="intro-text">
      <h2>DSC IIT Patna</h2>
      <p>Empowering student developers to create impact for a better tomorrow</p>  
      <a href="./projects.php" class="btn-get-started scrollto">View Projects</a> 
      <a href="./projectidea.php" class="btn-get-started scrollto" >Submit A Project Idea</a> 
    </div>

  </section><!-- #intro -->

  <main id="main">

    <!--==========================
      About Us Section
    ============================-->
    <section id="about" class="section-bg">
      <div class="container">
        <img class="clip" src="img/cliparts.png">
        <div class="section-header">
          <h3 class="section-title">About Us</h3>
         <!-- <span class="section-divider"></span>-->
          <p class="section-description">
            Developer Student Clubs IIT Patna, powered by Google Developers, is a non-profit community that 
            aims to inspire intelligent minds in the field of technology. It provides opportunities where developers, 
            designers and managers work together to carry out real-time projects.
            <br>
            <br>
            It is open to any student, ranging from novice 
            developers who are just starting to advanced developers who want to further their skills. It is intended to be a space for
            students to learn and collaborate as they solve real-world problems.
            
            In a desire to introduce creativity into technology, designers at DSC collaborate with the developers and managers to bring 
            out effective executions. Students here have worked on real-time projects that use Web dev, ML, Blockchains, IOT and much more
            making us one of the best technical chapters of IIT Patna.
            <br>
            <br>
            DSC IITP boasts of a very diverse community with members from various disciplines of engineering working together and
            developing themselves for the future. Here at DSC IITP, students get to work with a remarkably dedicated group of developers, make 
            projects, organise workshops, represent us in hackathons and much more. We encourage every member regardless of his/her domain
            of enrolment to work on projects and learn to develop new skills. Students also get to interact with industry experts from Google who are 
            constantly in touch with us and guide us.
          </p>
        </div>
      </div>
    </section><!-- #about -->

   <!--==========================
      Call To Action Section
    ============================-->
  
    <section id="call-to-action">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 text-center ">
            <h3 class="cta-title">10+</h3>
            <p class="cta-text">PROJECTS </p>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 text-center ">
            <h3 class="cta-title">20+</h3>
            <p class="cta-text">MEETUPS</p>
          </div>
          <!--<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 text-center ">
            <h3 class="cta-title">40+</h3>
            <p class="cta-text">EVENTS</p>
          </div>-->
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 text-center ">
            <h3 class="cta-title">1</h3>
            <p class="cta-text">VISION</p>
          </div>
        </div>
      </div>
    </section>
    <!-- #call-to-action -->  
   

    <!--==========================
      Announcements Section
    ============================-->
    <section id="features">
      <div class="container wow fadeInRight">
        <h3 class="text-center announcement-header" style="text-decoration">Announcements</h3>
        <?php foreach ($announcements as $announcement) : ?>
          <div class="container">
            <h5 style="text-decoration: underline"><i class='fas fa-check-circle text-success'></i> <?php echo $announcement['title']?></h5>
            <p><?php echo $announcement['description'] ?> <br>
            <small><?php echo $announcement['date'] ?></small>
            </p>
          </div>
        <?php endforeach; ?>
      </div>

    </section><!-- #features -->

   

    <!--==========================
      Product Advanced Featuress Section
    ============================-->
    <section id="advanced-features">
    
      <div class="features-row section-bg">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <img class="advanced-feature-img-left  wow fadeInLeft" src="img/advanced-feature-2.jpg" alt="" >
              <div class="wow fadeInRight">
               <h2>&nbsp;&nbsp;The students get the opportunity to:</h2>
                <i class="ion-ios-paper-outline" class="wow fadeInRight" data-wow-duration="0.5s"></i>
                <p class="wow fadeInRight" data-wow-duration="0.5s">Grow their knowledge on developer technologies and more through peer to peer workshops and events.</p>
                <i class="ion-ios-color-filter-outline wow fadeInRight" data-wow-delay="0.2s" data-wow-duration="0.5s"></i>
                <p class="wow fadeInRight" data-wow-delay="0.2s" data-wow-duration="0.5s">Gain relevant industry experience by solving problems for local organizations with technology based solutions.</p>
                <i class="ion-ios-barcode-outline wow fadeInRight" data-wow-delay="0.4" data-wow-duration="0.5s"></i>
                <p class="wow fadeInRight" data-wow-delay="0.4s" data-wow-duration="0.5s">Showcase their prototypes and solutions to their local community and industry leaders.</p>
              </div>
            </div>
          </div>
        </div>
      </div>

      
      <!--<div class="features-row section-bg">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <img class="advanced-feature-img-right wow fadeInRight" src="img/advanced-feature-3.jpg" alt="">
              <div class="wow fadeInLeft">
                <h2>Duis aute irure dolor in reprehenderit in voluptate velit esse</h2>
                <h3>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
                <i class="ion-ios-albums-outline"></i>
                <p>Quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
              </div>
            </div>
          </div>
        </div>
      </div> -->
    </section><!-- #advanced-features -->
       
       
    <!--==========================
      Videos Section
    ============================-->
    <section id="features">
   
      <div class="container">
         <div class="row">
          <div class="col-lg-4 wow fadeInLeft" style="padding:10px 15px 15px 10px;">
            <iframe width="100%" height="315" src="https://www.youtube.com/embed/RnWWBusoySs" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
          </div>

          <div class="col-lg-4 wow fadeInRight" style="padding:10px 15px 15px 10px;">
            <iframe width="100%" height="315" src="https://www.youtube.com/embed/wTLe8nwJ_Lw" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
          </div>

          <div class="col-lg-4 wow fadeInRight" style="padding:10px 15px 15px 10px;">
              <iframe width="100%" height="315" src="https://www.youtube.com/embed/uxDuZs9k8B0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
          </div> 
        </div>
       
    
  </section>

    <!--==========================
      Social Section
    ============================-->
    <section id="social" class="section-bg">
      <div class="container">

        <div class="section-header">
          <h3 class="section-title">Social</h3>
          <!--<span class="section-divider"></span>-->
          <p class="section-description"></p>
        </div>

        <div class="row">

          <div class="col-lg-4">
            <div class="box wow fadeInLeft">
              <div style="margin: 20px 0">
                <iframe 
                  src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fdsciitpatna%2F%3F__tn__%3D%252CdkC-y.g-R%26eid%3DARALxTPcGtjxlp3B9MGmnC73Ol4fJzWTRbBv_Lz-wITcjCAa2Ctc33j-hSs7lJkg6kjBETZ0kdwuCgwn%26hc_ref%3DARQRs_qR1gWmuGCtB5fl_dxXtPf-Izype3sJgcboW2eIWoFMSYeh4SVxoVKXzuxzQQQ%26fref%3Dnf&tabs=timeline&width=340&height=500&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId"  
                  style="border:none; margin: 0; padding: 0; overflow:hidden; width:100%; height:400px" 
                  scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media">
                </iframe>
              </div>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="box wow fadeInLeft">
              <div style="margin: 20px 0">
                <a class="twitter-timeline" data-width="340" data-height="400" href="https://twitter.com/dsciitpatna?ref_src=twsrc%5Etfw">Tweets by dsciitpatna</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
              </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="box wow fadeInLeft">
                <script src="https://apps.elfsight.com/p/platform.js" defer></script>
                <div class="elfsight-app-a9e70b33-d43a-4ee9-8aad-5cf0b9c3d0f5"></div>
            </div>
        </div>

      </div>
    </section><!-- #social -->

    <!--==========================
      Map Section
    ============================-->
    <!-- <section id="map" style="height: calc( 60vh )">
      <iframe 
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14399.37835508978!2d84.8434447170254!3d25.54355318850096!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x398d567a193702ff%3A0xc9c527c7faec3056!2sIIT+Patna+Administration+Block!5e0!3m2!1sen!2sin!4v1539177184721" 
        width="100%" height="100%" frameborder="0" style="border: 0" allowfullscreen>
      </iframe>
    </section> -->

    <!--==========================
      Contact Section
    ============================-->
    <section id="contact">
      <div class="container">
        <div class="fadeInUp d-flex centre">
          <!-- <div class="col-lg-4 col-md-4"> -->
            <div class="desktop">
               <img  src="img/indiarot.png" style="width:6em;height:13em; float:right;" >
              </div>
              <div class="mobile">
              <img id="mobile" src="img/india (1).png" style="width:18em;height:7em;float:left;">
              </div>
          <!-- </div> -->
         <div class="col-lg-4 col-md-4">
            <div class="contact-about">
              <h3>DSC IIT Patna</h3>
              <p>Cras fermentum odio eu feugiat. Justo eget magna fermentum iaculis eu non diam phasellus. Scelerisque felis imperdiet proin fermentum leo. Amet volutpat consequat mauris nunc congue.</p>
              <div class="social-links">
                <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
                <a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
                <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
              </div>
            </div>
            
          </div>

          <div class="col-lg-4 col-md-4">
            <div class="info">
              <div>
                <i class="ion-ios-location-outline"></i>
                <p>Indian Institute of Technology Patna<br> Bihta, Patna -801106 (Bihar)</p>
              </div>

              <div>
                <i class="ion-ios-email-outline"></i>
                <p>info@example.com</p>
              </div>

              <div>
                <i class="ion-ios-telephone-outline"></i>
                <p>+1 5589 55488 55s</p>
              </div>

            </div>
           
          </div>

        </div>

      </div>
    </section><!-- #contact -->


<!--==========================
    hackathon
  ============================-->
    <!--<section id="hackathon">
      <div class="container">
        <div class="row justify-content-center">
          <h2>Hack O'Latte</h2>        
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid sit eum libero necessitatibus, ipsa fuga facilis modi magni, quam reprehenderit ducimus nulla similique ipsam debitis consectetur inventore aut, possimus magnam? Veritatis, rem fuga a aperiam deserunt obcaecati nobis neque, amet porro blanditiis earum hic qui quo. Error iure, incidunt hic ex similique tempora ullam eligendi dolore id et enim, facere dignissimos expedita voluptas omnis repudiandae ipsa sunt eos ea animi distinctio exercitationem. Exercitationem quasi, cumque laudantium odit reprehenderit perspiciatis nulla voluptatem doloribus dolore soluta delectus quaerat recusandae, obcaecati, a vitae inventore tenetur sint aut facilis nihil hic nesciunt! Libero, minima.</p>
          <a href="./hackathon.php" class="btn scrollto">Click here</a>
        </div>
      </div>
      
    </section>
  </main>-->

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
         <a href="#" class="scrollto">Home</a>
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
