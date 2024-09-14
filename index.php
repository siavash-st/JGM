<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Accountants & Co</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:300,400,,500,600,700" rel="stylesheet">
    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="css/ionicons.min.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    <?php 
$con;
?>
	  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="index.html">Accountant & Co</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
			<?
		$get_menu = "SELECT * FROM jgm_menu";
		$run_menu = mysqli_query($con,$get_menu);
		while($row_menu = mysqli_fetch_array($run_menu)):
		?>
	          <li class="nav-item"><a href="" class="nav-link"><? echo $row_menu[title];?></a></li>
			  <? endwhile;?>
	          <li class="nav-item cta"><a href="" class="nav-link" style="background:#F89327;color:#FFF">Get in touch</a></li>
	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->

    <section class="home-slider owl-carousel">
      <div class="slider-item" style="background-image: url(img/hero-banner_desktop2.jpg);">
        <div class="overlay"></div>
        <div class="container-fluid">
          <div class="row slider-text align-items-center" data-scrollax-parent="true">

            <div class="col-md-8 wrap col-sm-12 ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
              <h1 class="mb-4 mt-5" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">We help our clients to understand, measure & improve their numbers</h1>
              <p class="mb-4 mb-md-5 sub-p" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">We help our clients to understand, measure & improve their numbers<br> We do this based on core values and we are UNIQUE...</p>
              <p><a href="#" class="btn btn-primary p-3 px-xl-5 py-xl-3" style="background:#F89327">Get in touch</a> 
            </div>
			
			
            
          </div>
        </div>
		
      </div>

      <div class="slider-item" style="background-image: url(img/hero-banner_desktop.jpg);">
        <div class="overlay"></div>
        <div class="container-fluid">
          <div class="row slider-text align-items-center" data-scrollax-parent="true">

            <div class="col-md-8 wrap col-sm-12 ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
              <h1 class="mb-4 mt-5" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">We help our clients to understand, measure & improve their numbers</h1>
              <p class="mb-4 mb-md-5 sub-p" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">We help our clients to understand, measure & improve their numbers<br> We do this based on core values and we are UNIQUE...</p>
              <p><a href="#" class="btn btn-primary p-3 px-xl-5 py-xl-3" style="background:#F89327">Get in touch</a> 
            </div>

          </div>
        </div>
      </div>
    </section>
   
<section class="ftco-section bg-light">
      <div class="container">
	  <div class="row">
	  <div class="col-md-12 text-center">
		<ul class="ftco-footer-social list-unstyled text-center">
		  <li class="ftco-animate"><a href="#" style="color:#fff"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate" style="color:#fff"><a href="#" style="color:#fff"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="#" style="color:#fff"><span class="icon-instagram" style="color:#fff"></span></a></li>
				<li class="ftco-animate"><a href="#" style="color:#fff"><span class="icon-linkedin"></span></a></li>
				<li class="ftco-animate"><a href="#" style="color:#fff"><span class="icon-youtube"></span></a></li>
				</ul>
	  <h4>Making the numbers Talk</h4>
	  <hr style="border: 3px solid green;border-radius: 3px;width:20%"><br>
	  </div>
	  </div>
        <div class="row">
		<?
		$get_posts = "SELECT * FROM jgm_post";
		$run_posts = mysqli_query($con,$get_posts);
		while($row_post = mysqli_fetch_array($run_posts)):
		?>
          <div class="col-md-4 col-sm-6 col-xs-12 ftco-animate">
            <div class="blog-entry">
              <a href="blog-single.html" class="block-20" style="background-image: url('img/<? echo $row_post[image];?>');">
              </a>
              <div class="text d-flex py-4">
                <div class="desc pl-3">
	                <h3 class="heading"><a href="#"><? echo $row_post[title];?></a></h3>
					<a href="" class="btn btn-primary p-3">find out more</a>
	              </div>
              </div>
            </div>
          </div>
		  <? endwhile;?>
		  </div>
		  <div class="row">
		  <div class="col-md-12 text-center">
		  <p><a href="#" class="btn btn-primary p-3 px-xl-5 py-xl-3 text-center" style="background:#006082;border: 1px solid #0077b3">All case studies</a> <p>
		  </div>
		  </div>
		  </div>
</section>

    
  

  

  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/jquery.timepicker.min.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>
    
  </body>
</html>
