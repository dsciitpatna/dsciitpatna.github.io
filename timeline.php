<?php
	require('config/config.php');
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
        <h1><a href="#intro"><img src="img/logo.png" alt="" title="" width="30%"></a></h1>
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class="menu-active"><a href="<?php echo ROOT_URL; ?>#intro">Home</a></li>
          <li><a href="<?php echo ROOT_URL; ?>#about">About Us</a></li>
          <li><a href="<?php echo ROOT_URL; ?>#features">Features</a></li>
          <li><a href="<?php echo ROOT_URL; ?>gallery.php">Gallery</a></li>
          <li><a href="<?php echo ROOT_URL; ?>team.php">Team</a></li>
          <li><a href="<?php echo ROOT_URL; ?>#contact">Contact Us</a></li>
          <li><a href="<?php echo ROOT_URL; ?>leaderboard.php">Leaderboard</a></li>
          <li><a href="<?php echo ROOT_URL; ?>timeline.php">Timeline</a></li>
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- #header -->


    <!--==========================
      Timeline Section
    ============================-->
    <div style="height: 80px">


    </div>
    
    <div class="container">
		<table class="table table-hover text-center shadow bg-light">
			<thead>
			<tr>
        <th>S.No.</th>
				<th>Title</th>
				<th>Short Desc</th>
				<th>Long Desc</th>
				<th>Date</th>
			</tr>
			</thead>
			<tbody>
				<?php $i=1;
					foreach($events as $event) : ?>
						<?php 
							// $point=$post['points'];
							// if ( $point>=0 && $point <=50 ) {
							// 	$class="fas fa-baby";
							// 	$bgcolor="#FA8072";
							// }
						?>
						<tr style="background: yellow">
							<td><?php echo $i++;?></td>
							<td><?php echo $event['title'] ?></td>
							<td><?php echo $event['short_desc'] ?></td>
              <td><?php echo $event['long_desc'] ?></td>
              <td><?php echo $event['date'] ?></td>
						</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
  

  <!--==========================
    Footer
  ============================-->
  <footer id="footer">
    <div class="container">
        
      <div class="row">
        <div class="col-lg-12 text-right ">
          <nav class="footer-links text-lg-right text-center pt-2 pt-lg-0">
            <a href="#intro" class="scrollto">Home</a>
            <a href="#about" class="scrollto">About</a>
          </nav>
        </div>
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
