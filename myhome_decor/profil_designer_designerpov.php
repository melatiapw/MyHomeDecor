<?php 
include "core/db_connect.php";
require_once 'core/init.php';


$userdata = getUserDataByUserId_d($_SESSION['id_d']);
$rowid = $_GET['rowid'];
$data = mysqli_query($connect, "SELECT * FROM designer WHERE id_d=$rowid");
$query = mysqli_query($connect, "SELECT * FROM images WHERE id_designer = '$rowid'");
$dat = mysqli_fetch_array($data);


                         ?>
<!DOCTYPE html>
<html>
<title>MyHomeDecor</title>
<!-- Native -->
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="">
<meta name="author" content="">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Raleway'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!--Bootstrap-->
	<!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Theme CSS -->
    <link href="css/clean-blog.css" rel="stylesheet">
    <link href="css/w3.css" rel="stylesheet">
    <link href="css/rating.css" rel="stylesheet">
    <link href="css/rateme.css" rel="stylesheet">
    <link href="css/cobacoba.css" rel="stylesheet">
    <link href="css/testimonial.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", sans-serif}
</style>

<body>

	<!-- Navigation -->
    <nav class="navbar navbar-default navbar-custom navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="index.php"></i> MyHomeDecor</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                <a>
                  <?php echo $userdata['username'];?>
                </a>
                  <li>

                                  <form class="navbar-form" role="search" action="search_result_d.php">
                                    <div class="input-group add-on">
                                      <input class="form-control" placeholder="Search" name="query" id="srch-term" type="text">
                                        <div class="input-group-btn">
                                          <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                                        </div>
                                    </div>
                                  </form>
                              </li>
                    <li>
                        <a class="dropdown-toggle" data-toggle="dropdown">
                        <?php
                         echo "<img src='uploads/profile".$userdata['image']."' style='width:25px;height:25px' class='w3-circle w3-hover-opacity'>";
                         ?>
						            </a>
						            <ul class="dropdown-menu dropdown-user">
                          <li>
                            <a href="profil_designer.php"><i class="fa fa-user fa-fw"></i> User Profile</a>
                          </li>
                          <li class="divider"></li>
                          <li>
                            <a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                          </li>
						            </ul>
                   </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

<!-- Page Container -->
<div class="w3-content w3-main" style="max-width:1250px;margin-top:80px">

  <!-- The Grid -->
  <div class="w3-row-padding">

    <!-- Left Column -->
    <div class="w3-third">
      <div class="w3-white w3-text-grey w3-card-4">
        <!-- Ini Kolom Avatar -->
        <div class="w3-display-container">
        <?php
                         echo "<img src='uploads/profile".$dat['image']."' style='width:100%' alt='Avatar'>";
                         ?>
          <div class="w3-display-bottomleft w3-container w3-text-black">
            <h2><?php echo $dat['first_name']; ?> <?php echo $dat['last_name']; ?></h2>
          </div>
        </div>
        <br>
        <!-- Ini Kolom Kontak, Lokasi, Rating segala macem -->
        <div class="w3-container">
          <i class="fa fa-home fa-fw w3-margin-right w3-large w3-text-teal"></i>Serang, Banten<br><br>
		      <a href="#about"><i class="fa fa-certificate fa-fw w3-margin-right w3-large w3-text-teal"></i>About me</a>
		      <br>
          <br>
		      <a href="#contact"><i class="fa fa-user fa-fw w3-margin-right w3-large w3-text-teal"></i>Contact</a>
          <hr>
          	<div class="w3-row w3-center w3-padding-10">
            		Have we worked together?
            		<a href="">
              		<input type="button" class="w3-button w3-round-xxlarge w3-hover-teal" value="Add Me as Your Designer">
            		</a>
          	</div>
          	<br>
      </div>

    <!-- End Left Column -->
    </div>

    <!-- Right Column -->
    <div class="w3-twothird">
      <div class="w3-container w3-card-2 w3-white w3-margin-bottom">
        <h2 class="w3-text-grey w3-padding-16"><i class="fa fa-suitcase fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>My Portofolio</h2>

      <!-- Buat Portofolio-->
      <!-- Portfolio Grid Section -->
       <section id="portfolio">
          <div class="w3-container">
              <div class="row">
              <?php
                while($dta = mysqli_fetch_array($query))
                { 
              ?>                                       
                  <div class="col-md-6 col-sm-8 portfolio-item">
                      <a href="#portfolioModal1" class="portfolio-link" data-toggle="modal">
                          <div class="portfolio-hover">
                              <div class="portfolio-hover-content">
                                  <i class="fa fa-plus fa-3x"></i>
                              </div>
                          </div><?php
                         echo "<td><img src='uploads/".$dta['image']."' width='50%' height='50%' class='img-responsive' alt=''></td>";
                         ?>
                      </a>
                      <div class="portfolio-caption">
                          <?php echo $dta['title'];?>
                          <p class="text-muted">Client : <a href="profil_client.html">Melati Aulia Putri</a></p>
                      </div>
                  </div>
                  <?php
                  }
                                  ?>
                 </div>
          </div>
      </section>
      <!-- Portfolio Modals -->
      <!-- Use the modals below to showcase details about your portfolio projects! -->

      <!-- Portfolio Modal 1 -->
      <div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="close-modal" data-dismiss="modal">
                      <div class="lr">
                          <div class="rl">
                          </div>
                      </div>
                  </div>
                  <div class="container">
                      <div class="row">
                          <div class="col-lg-8 col-lg-offset-2">
                              <div class="modal-body">
                                  <!-- Project Details Go Here -->
                                  <h2>Apartemen Nona Melati</h2>
                                  <p class="item-intro text-muted">Client : Melati Aulia Putri</p>
                                  <img class="img-responsive img-centered" src="img/user/Shinta Ratnasari/portofolio/Apartemen Nona Melati/1.jpg" alt="">
                                  <img class="img-responsive img-centered" src="img/user/Shinta Ratnasari/portofolio/Apartemen Nona Melati/2.jpg" alt="">
                                  <img class="img-responsive img-centered" src="img/user/Shinta Ratnasari/portofolio/Apartemen Nona Melati/3.jpg" alt="">
                                  <img class="img-responsive img-centered" src="img/user/Shinta Ratnasari/portofolio/Apartemen Nona Melati/4.jpg" alt="">
                                  <img class="img-responsive img-centered" src="img/user/Shinta Ratnasari/portofolio/Apartemen Nona Melati/5.jpg" alt="">
                                  <p> Proyek ini dikerjakan untuk mendekorasi apartemen baru Nona Melati.
                                      Tema yang diinginkan adalah simplisitas, yang didominasi dengan warna putih, terlihat elegan namun tidak terlihat kosong.
                                  </p>
                                  <ul class="list-inline">
                                      <li>Date: July 2014</li>
                                      <li>
                                        Category:
                                        <a href="k_livingroom.html">Ruang Keluarga</a>,
                                        <a href="k_kitchen.html">Dapur</a>,
                                        <a href="k_diningroom.html">Ruang Makan</a>,
                                        <a href="k_bathroom.html">Kamar Mandi</a>,
                                      </li>
                                  </ul>
                                  <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-times"></i> Close Project</button>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>

      <!-- Portfolio Modal 2 -->
      <div class="portfolio-modal modal fade" id="portfolioModal2" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="close-modal" data-dismiss="modal">
                      <div class="lr">
                          <div class="rl">
                          </div>
                      </div>
                  </div>
                  <div class="container">
                      <div class="row">
                          <div class="col-lg-8 col-lg-offset-2">
                              <div class="modal-body">
                                  <h2>Project Heading</h2>
                                  <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                                  <img class="img-responsive img-centered" src="img/portfolio/startup-framework-preview.png" alt="">
                                  <p><a href="http://designmodo.com/startup/?u=787">Startup Framework</a> is a website builder for professionals. Startup Framework contains components and complex blocks (PSD+HTML Bootstrap themes and templates) which can easily be integrated into almost any design. All of these components are made in the same style, and can easily be integrated into projects, allowing you to create hundreds of solutions for your future projects.</p>
                                  <p>You can preview Startup Framework <a href="http://designmodo.com/startup/?u=787">here</a>.</p>
                                  <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-times"></i> Close Project</button>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>

      <!-- Portfolio Modal 3 -->
      <div class="portfolio-modal modal fade" id="portfolioModal3" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="close-modal" data-dismiss="modal">
                      <div class="lr">
                          <div class="rl">
                          </div>
                      </div>
                  </div>
                  <div class="container">
                      <div class="row">
                          <div class="col-lg-8 col-lg-offset-2">
                              <div class="modal-body">
                                  <!-- Project Details Go Here -->
                                  <h2>Project Name</h2>
                                  <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                                  <img class="img-responsive img-centered" src="img/portfolio/treehouse-preview.png" alt="">
                                  <p>Treehouse is a free PSD web template built by <a href="https://www.behance.net/MathavanJaya">Mathavan Jaya</a>. This is bright and spacious design perfect for people or startup companies looking to showcase their apps or other projects.</p>
                                  <p>You can download the PSD template in this portfolio sample item at <a href="http://freebiesxpress.com/gallery/treehouse-free-psd-web-template/">FreebiesXpress.com</a>.</p>
                                  <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-times"></i> Close Project</button>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>

      <!-- Portfolio Modal 4 -->
      <div class="portfolio-modal modal fade" id="portfolioModal4" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="close-modal" data-dismiss="modal">
                      <div class="lr">
                          <div class="rl">
                          </div>
                      </div>
                  </div>
                  <div class="container">
                      <div class="row">
                          <div class="col-lg-8 col-lg-offset-2">
                              <div class="modal-body">
                                  <!-- Project Details Go Here -->
                                  <h2>Project Name</h2>
                                  <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                                  <img class="img-responsive img-centered" src="img/portfolio/golden-preview.png" alt="">
                                  <p>Start Bootstrap's Agency theme is based on Golden, a free PSD website template built by <a href="https://www.behance.net/MathavanJaya">Mathavan Jaya</a>. Golden is a modern and clean one page web template that was made exclusively for Best PSD Freebies. This template has a great portfolio, timeline, and meet your team sections that can be easily modified to fit your needs.</p>
                                  <p>You can download the PSD template in this portfolio sample item at <a href="http://freebiesxpress.com/gallery/golden-free-one-page-web-template/">FreebiesXpress.com</a>.</p>
                                  <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-times"></i> Close Project</button>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>

      <!-- Portfolio Modal 5 -->
      <div class="portfolio-modal modal fade" id="portfolioModal5" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="close-modal" data-dismiss="modal">
                      <div class="lr">
                          <div class="rl">
                          </div>
                      </div>
                  </div>
                  <div class="container">
                      <div class="row">
                          <div class="col-lg-8 col-lg-offset-2">
                              <div class="modal-body">
                                  <!-- Project Details Go Here -->
                                  <h2>Project Name</h2>
                                  <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                                  <img class="img-responsive img-centered" src="img/portfolio/escape-preview.png" alt="">
                                  <p>Escape is a free PSD web template built by <a href="https://www.behance.net/MathavanJaya">Mathavan Jaya</a>. Escape is a one page web template that was designed with agencies in mind. This template is ideal for those looking for a simple one page solution to describe your business and offer your services.</p>
                                  <p>You can download the PSD template in this portfolio sample item at <a href="http://freebiesxpress.com/gallery/escape-one-page-psd-web-template/">FreebiesXpress.com</a>.</p>
                                  <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-times"></i> Close Project</button>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>

      <!-- Portfolio Modal 6 -->
      <div class="portfolio-modal modal fade" id="portfolioModal6" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="close-modal" data-dismiss="modal">
                      <div class="lr">
                          <div class="rl">
                          </div>
                      </div>
                  </div>
                  <div class="container">
                      <div class="row">
                          <div class="col-lg-8 col-lg-offset-2">
                              <div class="modal-body">
                                  <!-- Project Details Go Here -->
                                  <h2>Project Name</h2>
                                  <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                                  <img class="img-responsive img-centered" src="img/portfolio/dreams-preview.png" alt="">
                                  <p>Dreams is a free PSD web template built by <a href="https://www.behance.net/MathavanJaya">Mathavan Jaya</a>. Dreams is a modern one page web template designed for almost any purpose. It’s a beautiful template that’s designed with the Bootstrap framework in mind.</p>
                                  <p>You can download the PSD template in this portfolio sample item at <a href="http://freebiesxpress.com/gallery/dreams-free-one-page-web-template/">FreebiesXpress.com</a>.</p>
                                  <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-times"></i> Close Project</button>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>

  		<!-- Pagination -->
  		<div class="w3-center w3-padding-32">
  			<div class="w3-bar">
  				<a href="#" class="w3-bar-item w3-button w3-hover-black">«</a>
  				<a href="#" class="w3-bar-item w3-black w3-button">1</a>
  				<a href="#" class="w3-bar-item w3-button w3-hover-black">2</a>
  				<a href="#" class="w3-bar-item w3-button w3-hover-black">3</a>
  				<a href="#" class="w3-bar-item w3-button w3-hover-black">4</a>
  				<a href="#" class="w3-bar-item w3-button w3-hover-black">»</a>
  			</div>
  		</div>
  		<hr>
      </div>

      <!-- Buat About-->
      <div class="w3-container w3-card-2 w3-white w3-margin-bottom" id="about">
        <h2 class="w3-text-grey w3-padding-16"><i class="fa fa-certificate fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>About Me</h2>
          <div class="w3-container">
            <div class="row">
              <div class="col-md-12" data-wow-delay="0.2s">
                <div class="carousel slide" data-ride="carousel" id="quote-carousel">
                  <!-- Bottom Carousel Indicators -->
                  <ol class="carousel-indicators">
                    <li data-target="#quote-carousel" data-slide-to="0" class="active"><img class="img-responsive " src="img/client/Melati Aulia Putri.jpg">
                    </li>
                    <li data-target="#quote-carousel" data-slide-to="1"><img class="img-responsive" src="img/client/Kevin Reynaldi.jpg">
                    </li>
                    <li data-target="#quote-carousel" data-slide-to="2"><img class="img-responsive" src="img/client/Arga Putra P.jpg">
                    </li>
                  </ol>
                  <!-- Carousel Slides / Quotes -->
                  <div class="carousel-inner text-center">
                    <!-- Quote 1 -->
                    <div class="item active">
                      <blockquote>
                      <div class="row">
                        <div class="col-sm-8 col-sm-offset-2">
                          <p> Terima kasih untuk Nona Shinta, kini apartemen saya menjadi lebih indah dan elegan.
                            Jangan ragu-ragu untuk menggunakan jasa beliau karena hasil dekorasinya sangat sesuai dengan permintaan client dengan harga yang bersahabat.</p>

                              <span class="rating-input">
                                <span data-value="0" class="glyphicon glyphicon-star"></span>
                                <span data-value="1" class="glyphicon glyphicon-star"></span>
                                <span data-value="2" class="glyphicon glyphicon-star"></span>
                                <span data-value="3" class="glyphicon glyphicon-star"></span>
                                <span data-value="4" class="glyphicon glyphicon-star"></span>
                              </span>

                          <small><a href="profil_client.html">Melati Aulia Putri</a></small>
                        </div>
                      </div>

                      </blockquote>
                    </div>
                    <!-- Quote 2 -->
                    <div class="item">
                      <blockquote>
                      <div class="row">
                        <div class="col-sm-8 col-sm-offset-2">
                          <p> Desain yang bagus dan artistik, rumah saya menjadi sangat nyaman untuk ditinggali istri dan anak-anak saya </p>

                          <span class="rating-input">
                            <span data-value="0" class="glyphicon glyphicon-star"></span>
                            <span data-value="1" class="glyphicon glyphicon-star"></span>
                            <span data-value="2" class="glyphicon glyphicon-star"></span>
                            <span data-value="3" class="glyphicon glyphicon-star"></span>
                            <span data-value="4" class="glyphicon glyphicon-star-empty"></span>
                          </span>

                          <small>Kevin Reynaldi</small>
                        </div>
                      </div>
                      </blockquote>
                    </div>
                    <!-- Quote 3 -->
                    <div class="item">
                      <blockquote>
                      <div class="row">
                        <div class="col-sm-8 col-sm-offset-2">
                          <p> Saudari Shinta sangat profesional dalam bekerja. Good Job! </p>
                          <span class="rating-input">
                            <span data-value="0" class="glyphicon glyphicon-star"></span>
                            <span data-value="1" class="glyphicon glyphicon-star"></span>
                            <span data-value="2" class="glyphicon glyphicon-star"></span>
                            <span data-value="3" class="glyphicon glyphicon-star"></span>
                            <span data-value="4" class="glyphicon glyphicon-star-empty"></span>

                          </span>
                          <small>Arga Putra P</small>
                        </div>
                      </div>
                      </blockquote>
                    </div>
                    <!-- Carousel Buttons Next/Prev -->
                    <a data-slide="prev" href="#quote-carousel" class="left carousel-control"><i class="fa fa-chevron-left"></i></a>
                    <a data-slide="next" href="#quote-carousel" class="right carousel-control"><i class="fa fa-chevron-right"></i></a>
                </div>
              </div>
            </div>
            <hr class="divider"/>
            <h4 class="w3-opacity"><b>Biografi Singkat</b></h4>
            <p>Saya adalah seorang designer profesional yang telah terjun di bidang ini selama lebih dari 15 tahun. Saya juga pernah dinobatkan sebagi Designer of The Year oleh majalah nasional Interior Idaman pada tahun 2013.</p>
          </div>
      	<hr>
      </div>
      </div>
      <!-- Buat contact-->
      <div class="w3-container w3-card-2 w3-white w3-margin-bottom" id="contact">
        <h2 class="w3-text-grey w3-padding-16"><i class="fa fa-user fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>My Contact</h2>
        <h4 class="w3-text-teal"><i class="fa fa-envelope fa-fw w3-margin-right"></i><?php echo $userdata['email']; ?></h5>
        <h4 class="w3-text-teal"><i class="fa fa-phone fa-fw w3-margin-right"></i><?php echo $userdata['contact']; ?></h5>
        <p>Are you my Client? Your opinion about my work will be appreciated!</p>

        <form action="/action_page.php" target="_blank">
        			<p><textarea class="w3-input w3-padding-16" type="text" placeholder="Comment" required name="Message"> </textarea></p>
              <p>How much star will you rate me?</p>
              <div class="mystar">
                <form action="">
                  <input class="mystar mystar-5" id="mystar-5" type="radio" name="star"/>
                  <label class="mystar mystar-5" for="mystar-5"></label>
                  <input class="mystar mystar-4" id="mystar-4" type="radio" name="star"/>
                  <label class="mystar mystar-4" for="mystar-4"></label>
                  <input class="mystar mystar-3" id="mystar-3" type="radio" name="star"/>
                  <label class="mystar mystar-3" for="mystar-3"></label>
                  <input class="mystar mystar-2" id="mystar-2" type="radio" name="star"/>
                  <label class="mystar mystar-2" for="mystar-2"></label>
                  <input class="mystar mystar-1" id="mystar-1" type="radio" name="star"/>
                  <label class="mystar mystar-1" for="mystar-1"></label>
                </form>
              </div>
        			<p>
        				<button class="w3-button w3-teal w3-padding-large" type="submit">
        					<i class="fa fa-paper-plane"></i> SEND TESTIMONIALS
        				</button>
        			</p>
        		</form>
        <hr>
      </div>
    <!-- End Right Column -->
    </div>
  <!-- End Grid -->
  </div>
<!-- End Page Container -->
</div>

<!-- Footer -->
<footer class="text-center" style="max-width:100%">
    <div class="footer-above">
        <div class="container">
            <div class="row">
              <div class="col-lg-8 col-lg-offset-2 text-center">
                  <h2 class="section-heading" style="color:white">Let's Get In Touch!</h2>
                  <p>Kami akan senang mendengar feedback dan masukan dari Anda</p>
              </div>
              <div class="col-lg-4 col-lg-offset-2 text-center">
                  <i class="fa fa-phone fa-3x sr-contact"></i>
                  <p>123-456-6789</p>
              </div>
              <div class="col-lg-4 text-center">
                  <i class="fa fa-envelope-o fa-3x sr-contact"></i>
                  <p><a href="mailto:your-email@your-domain.com">myhomedecor@gmail.com</a></p>
              </div>
            </div>
            <h4>You Can Follow Us Too</h4>
            <ul class="list-inline">
                <li>
                    <a href="#" class="btn-social btn-outline"><span class="sr-only">Facebook</span><i class="fa fa-fw fa-facebook"></i></a>
                </li>
                <li>
                    <a href="#" class="btn-social btn-outline"><span class="sr-only">Google Plus</span><i class="fa fa-fw fa-google-plus"></i></a>
                </li>
                <li>
                    <a href="#" class="btn-social btn-outline"><span class="sr-only">Twitter</span><i class="fa fa-fw fa-twitter"></i></a>
                </li>
                <li>
                    <a href="#" class="btn-social btn-outline"><span class="sr-only">Linked In</span><i class="fa fa-fw fa-linkedin"></i></a>
                </li>
            </ul>
        </div>
        </div>
</footer>

	<!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Theme JavaScript -->
    <script src="js/clean-blog.min.js"></script>




</body>
</html>
