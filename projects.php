<?php 
  require('config/config.php');
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

  <!-- Projects Bootstrap CSS File -->
  <link href="./projects/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
  <link href="./projects/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
  <link href="./projects/lib/animate/animate.min.css" rel="stylesheet" />
  <link href="./projects/lib/ionicons/css/ionicons.min.css" rel="stylesheet" />
  <link href="./projects/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet" />
  <link href="./projects/lib/lightbox/css/lightbox.min.css" rel="stylesheet" />
  <link href="./projects/css/style.css" rel="stylesheet" />

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


    
    #gallery .gallery-item figure .github {
  position :absolute;
  top:50%;
  left:50%;
  height:100%;
  width:100%;
  transform: scaleY(0);
  transition:transform .5s;
}
#gallery .gallery-item figure .ctr{
  position:absolute;
  transform: translate(-50%,-50%);
  text-align:center;
  padding-top:25%;
  background:rgba(0, 0, 0, 0.1);
  opacity:0;
}
#gallery .gallery-item figure:hover .ctr{
  opacity:1;
}


#gallery #gallery-flters li:hover,
#gallery #gallery-flters li.filter-active {
    background:  linear-gradient(45deg, #1dc8cd 0%, #55fabe 100%);
    color: #fff;
}


  </style>
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
        <h1><a href="./"><img src="img/logo.png" alt="" title="" width="30%"></a></h1>
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class="menu-active"><a href="./">Home</a></li>
          <li><a href="./gallery.php">Gallery</a></li>
          <li><a href="./team.php">Team</a></li>
          <li><a href="./leaderboard.php">Leaderboard</a></li>
          <li><a href="./timeline.php">Timeline</a></li>
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- #header -->
          
     <!--==========================
      Gallery Section
    ============================-->
    <section id="gallery" class="section-bg">
        <div class="container">
          <header class="section-header">
            <h3 class="section-title">Our Projects</h3>
          </header>

          <div class="row">
            <div class="col-lg-12">
              <ul id="gallery-flters">
                <li data-filter="*" class="filter-active">All</li>
                <li data-filter=".filter-web">Web</li>
                <li data-filter=".filter-app">App</li>
                <li data-filter=".filter-ml">ML</li>
                <li data-filter=".filter-block">Blo & Cry</li>
                <li data-filter=".filter-iot">IoT</li>
                <li data-filter=".filter-cloud">Cloud APIs</li>
              </ul>
            </div>
          </div>

          <div class="row gallery-container">
            <div class="col-lg-4 col-md-6 gallery-item filter-web">
              <div class="gallery-wrap">
                <figure>
                  <img src="img/e-learning.jpg" class="img-fluid" alt="" />
                  <div class="github ctr">
                    <a href="#" target="_blank">
                      <button type="button" class="btn btn-outline-light">View Project</button>
                    </a>
                   </div>
                </figure>

                <div class="gallery-info">
                  <h4>Project 1</h4>
                  <p>description</p>
                </div>
              </div>
            </div>

            <div
              class="col-lg-4 col-md-6 gallery-item filter-cloud"
              data-wow-delay="0.2s"
            >
              <div class="gallery-wrap">
                <figure>
                  <img src="img/e-learning.jpg" class="img-fluid" alt="" />
                  <div class="github ctr">
                    <a href="#" target="_blank">
                      <button type="button" class="btn btn-outline-light">View Project</button>
                    </a>
                   </div>
                </figure>

                <div class="gallery-info">
                  <h4>Project 2</h4>
                  <p>description</p>
                </div>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 gallery-item filter-iot">
              <div class="gallery-wrap">
                <figure>
                  <img src="img/e-learning.jpg" class="img-fluid" alt="" />
                  <div class="github ctr">
                    <a href="#" target="_blank">
                      <button type="button" class="btn btn-outline-light">View Project</button>
                    </a>
                   </div>
                </figure>

                <div class="gallery-info">
                  <h4>Project 2</h4>
                  <p>description</p>
                </div>
              </div>
            </div>

            <div
              class="col-lg-4 col-md-6 gallery-item filter-ml"
              data-wow-delay="0.2s"
            >
              <div class="gallery-wrap">
                <figure>
                  <img src="img/e-learning.jpg" class="img-fluid" alt="" />
                  <div class="github ctr">
                    <a href="#" target="_blank">
                      <button type="button" class="btn btn-outline-light">View Project</button>
                    </a>
                   </div>
                </figure>

                <div class="gallery-info">
                  <h4>Project 3</h4>
                  <p>description</p>
                </div>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 gallery-item filter-app">
              <div class="gallery-wrap">
                <figure>
                  <img src="img/e-learning.jpg" class="img-fluid" alt="" />
                  <div class="github ctr">
                    <a href="#" target="_blank">
                      <button type="button" class="btn btn-outline-light">View Project</button>
                    </a>
                  </div>
                </figure>

                <div class="gallery-info">
                  <h4>Project 1</h4>
                  <p>description</p>
                </div>
              </div>
            </div>

            <div
              class="col-lg-4 col-md-6 gallery-item filter-block"
              data-wow-delay="0.1s"
            >
              <div class="gallery-wrap">
                <figure>
                  <img src="img/e-learning.jpg" class="img-fluid" alt="" />
                  <div class="github ctr">
                    <a href="#" target="_blank">
                      <button type="button" class="btn btn-outline-light">View Project</button>
                    </a>
                   </div>
                </figure>

                <div class="gallery-info">
                  <h4>Project 3</h4>
                  <p>description</p>
                </div>
              </div>
            </div>

          </div>
        </div>
      </section>
      <!-- #gallery -->

  </main>

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
         <a href="#intro" class="scrollto">Home</a>
         <br>
         <a href="#about" class="scrollto">About</a>
         <br>
          <br>
          <br>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3">
         <strong>Copyright ©</strong> 
        <br>
        <strong>Indian Institute of Technology, Patna</strong>
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

  <!-- JavaScript Libraries -->
  <script src="./projects/lib/jquery/jquery.min.js"></script>
  <script src="./projects/lib/jquery/jquery-migrate.min.js"></script>
  <script src="./projects/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="./projects/lib/easing/easing.min.js"></script>
  <script src="./projects/lib/superfish/hoverIntent.js"></script>
  <script src="./projects/lib/superfish/superfish.min.js"></script>
  <script src="./projects/lib/wow/wow.min.js"></script>
  <script src="./projects/lib/waypoints/waypoints.min.js"></script>
  <script src="./projects/lib/counterup/counterup.min.js"></script>
  <script src="./projects/lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="./projects/lib/isotope/isotope.pkgd.min.js"></script>
  <script src="./projects/lib/lightbox/js/lightbox.min.js"></script>
  <script src="./projects/lib/touchSwipe/jquery.touchSwipe.min.js"></script>
  <script src="./projects/js/main.js"></script>


</body>
</html>
