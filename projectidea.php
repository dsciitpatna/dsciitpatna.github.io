<?php
    require('config/db.php');
    session_start();

    $submitsuccess="";
    $submitfailure="";
    if (isset($_POST['submit'])) {
        $name= mysqli_real_escape_string($mysqli, $_POST['name']);
        $email= mysqli_real_escape_string($mysqli, $_POST['email']);
        $organization= mysqli_real_escape_string($mysqli, $_POST['organization']);
        $organization_url= mysqli_real_escape_string($mysqli, $_POST['organization_url']);
        $title= mysqli_real_escape_string($mysqli, $_POST['title']);
        $description= mysqli_real_escape_string($mysqli, $_POST['description']);
        $tags= mysqli_real_escape_string($mysqli, $_POST['tags']);
        $sql = "SELECT * FROM projectIdeas WHERE title = '" . $title . "'AND name = '" . $name ."'";
        $res = $mysqli->query($sql);
        $res = mysqli_fetch_assoc($res);
        if($res) {
            $submitfailure="Project already exists";
        } else {
            // create sql
            $sql = "INSERT INTO projectIdeas(name, email, organization, organization_url, title, description, tags) VALUES('$name', '$email', '$organization', '$organization_url', '$title', '$description', '$tags')";

            // save to db and check
            if(mysqli_query($mysqli, $sql)){
                $submitsuccess="Project idea submitted successfully";
            } else {
                $submitfailure="Error";
            }
        }
    }

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

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">

  <style>
      ::-webkit-input-placeholder {
        font-size: 25px;
        }
        :-moz-placeholder { /* Firefox 18- */
            font-size: 25px;
        }
        ::-moz-placeholder {  /* Firefox 19+ */
            font-size: 25px;
        }
        /* Overriding styles */
        ::-webkit-input-placeholder {
        font-size: 13px!important;
        }
        :-moz-placeholder { /* Firefox 18- */
            font-size: 13px!important;
        }
        ::-moz-placeholder {  /* Firefox 19+ */
            font-size: 13px!important;
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
      Submit Project Idea Section
    ============================-->
    <div class="container" style="margin: 100px auto">
        <h2 class="font-weight-bold">Submit a project idea to DSC - IIT Patna Organization.</h2>
        <p class="lead">Give your project proposals and let the community know about the things you are working on.</p>

        <?php if($submitsuccess!=='') { ?>
            <div class='text-center'><i class='fas fa-check-circle text-success'></i><h5 class="text-success"><?php echo $submitsuccess?></h5></div>
        <?php } ?>
        <?php if($submitfailure!=='' ) { ?>
            <div class='text-center'><i class='fas fa-times-circle text-danger'></i><h5 class="text-danger"><?php echo $submitfailure?></h5></div>
        <?php } ?>
        
        

        <form class="shadow" action="" method="POST">
            <fieldset>
                <legend class="font-weight-bold">About You</legend>
                <hr>
                <div class="form-group">
                    <label for="name">Name</label><br>
                    <small>Enter your full name</small>
                    <input type="text" class="form-control" name="name" placeholder="John Doe" required />
                </div>
                <div class="form-group">
                    <label for="email">Email</label><br>
                    <small>Enter your email</small>
                    <input type="email" class="form-control" name="email" placeholder="abc@gmail.com" required />
                </div>
                <div class="form-group">
                    <label for="organization">Organization</label><br>
                    <small>Enter your organization name</small>
                    <input type="text" class="form-control" name="organization" placeholder="IIT Patna" />
                </div>
                <div class="form-group">
                    <label for="organization_url">Organisation's URL</label><br>
                    <small>A link to the organisation you entered above.</small>
                    <input type="url" class="form-control" name="organization_url" placeholder="https://dsciitpatna.com" />
                </div>
            </fieldset>
            <br><br>
            <fieldset>
                <legend class="font-weight-bold">About the project idea</legend>
                <hr>
                <div class="form-group">
                    <label for="title">Project Title</label><br>
                    <small>This will be the main heading in your idea's page. Make it specific, but not too long. You could include name of your project.</small>
                    <input type="text" class="form-control" name="title" placeholder="EHR using Blockchain" required />
                </div>
                <div class="form-group">
                    <label for="description">Project description</label><br>
                    <small>Include a brief introduction to your project, and explain the work has to be procedded.</small>
                    <textarea class="form-control" rows="5" name="description" required></textarea>
                </div>
                <div class="form-group">
                    <label for="tags">Tags (optional)</label><br>
                    <small>Keywords relevant to the idea. Separate tags with commas.</small>
                    <textarea class="form-control" rows="2" name="tags" placeholder="Eg: Web, ML, IOT, ReactJs, Angular, etc."></textarea>
                </div>
            </fieldset>
            <br>
            <div class="form-group">
                <button type="submit" name="submit" class="btn btn-primary btn-lg">Submit your idea to DSC IIT-P</button>
            </div>
        </form>
    </div>

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

</body>
</html>
