<!DOCTYPE html>
<html lang="en">
<?php include('include/head.php');
include('admin/connection.php');
function make_query($conn)
{
  $query = "SELECT * FROM `banner` ORDER BY Id ASC";
  $result = mysqli_query($conn, $query);
  return $result;
}

function make_slide_indicators($conn)
{
  $output = '';
  $count = 0;
  $result = make_query($conn);
  while ($row = mysqli_fetch_array($result)) {
    if ($count == 0) {
      $output .= '
   <li data-target="#carouselExampleIndicators" data-slide-to="' . $count . '" class="active"></li>
   ';
    } else {
      $output .= '
   <li data-target="#carouselExampleIndicators" data-slide-to="' . $count . '"></li>
   ';
    }
    $count = $count + 1;
  }
  return $output;
}
?>

<body>
  <div class="wrapper">
    <?php include('include/header.php'); ?>

    <!-- Carousel Start -->
    <div id="carousel" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <?php echo make_slide_indicators($conn); ?>
      </ol>
      <div class="carousel-inner">
        <?php
        $url = "http://localhost/testlogin/admin/";
        $sql = "SELECT * FROM `banner`";
        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);
        for ($i = 1; $i <= $num; $i++) {
          $row = mysqli_fetch_array($result);

        ?>

          <?php
          if ($i == 1) {
          ?>
            <div class="carousel-item active image-margin">
              <img class="d-block w-100" src="<?php echo $url . $row['image'] ?>" />
            </div>
          <?php
          } else {
          ?>
            <div class="carousel-item image-margin">
              <img class="d-block w-100" src="<?php echo $url . $row['image'] ?>" />
            </div>

        <?php
          }
        }
        ?>
      </div>
    </div>

    <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
  <!-- Carousel End -->

  <div class="background_all">

    <!-- About Start -->

    <div class="about wow fadeInUp" data-wow-delay="0.1s">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-5 col-md-6">
            <div class="about-img">
              <img src="img/about.jpg" alt="Image" />
            </div>
          </div>
          <div class="col-lg-7 col-md-6">
            <div class="section-header text-left">
              <p>Welcome to 2nd Heand Cable Machinery</p>
              <h2>25 Years Experience</h2>
            </div>
            <div class="about-text">
              <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                Phasellus nec pretium mi. Curabitur facilisis ornare velit non
                vulputate. Aliquam metus tortor, auctor id gravida
                condimentum, viverra quis sem.
              </p>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                Phasellus nec pretium mi. Curabitur facilisis ornare velit non
                vulputate. Aliquam metus tortor, auctor id gravida
                condimentum, viverra quis sem. Curabitur non nisl nec nisi
                scelerisque maximus. Aenean consectetur convallis porttitor.
                Aliquam interdum at lacus non blandit.
              </p>
              <a class="btn" href="Aboutus.php">Learn More</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- About End -->

    <!-- Service Start -->
    <div class="service">
      <div class="container">
        <div class="section-header text-center">
          <p>Our Product</p>
          <h2>We Provide Mechinery</h2>
        </div>
      </div>

      <!-- <div class="card" style="width: 18rem;">
          <img class="card-img-top" src="./img/rotating-machinery.jpg" alt="machine_one">
          <div class="card-body">
            <h5 class="card-title">Machine1</h5>
            <a href="#" class="btn btn-primary">More Info</a>
          </div>
        </div> -->

      <div class="container">
        <div class="row">

          <?php
          include 'connection.php';
          $url = "http://localhost/testlogin/admin/";
          $sql = "SELECT * FROM `product`";
          $count = 1;
          $result = mysqli_query($conn, $sql);
          if (mysqli_num_rows($result) > 0)
            while ($row = mysqli_fetch_array($result)) {
          ?>
            <div class="col-lg-4 col-md-4">
              <div class="card product_card" style="width: 18rem;">
                <img class="card-img-top" src="<?php echo  $url . $row['pro'] ?>" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title"><?php echo  $row['pname'] ?></h5>
                  <p class="card-text show_text"><?php echo $row['pdse'] ?></p>
                  <a href="prodectdetails.php?id=<?php echo $row['id']; ?>" class="img-name btn btn-primary text-light">Read More...</a>
                </div>
              </div>
            </div>
          <?php
            } ?>
        </div>
      </div>
    </div>
    <!-- Service End -->

    <!-- Team Start -->
    <!-- <div class="team">
      <div class="container">
        <div class="section-header text-center">
          <h2>New Machinery</h2>
        </div>
        <div class="row">
          <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
            <a href="#">
              <div class="team-item">
                <div class="team-img">
                  <img src="img/p-1.jpg" alt="Team Image" />
                </div>
                <div class="team-text">
                  <h2>Machin Name</h2>
                  <p>Lorem, ipsum dolor</p>
                </div>
              </div>
            </a>
          </div>
          <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
            <a href="#">
              <div class="team-item">
                <div class="team-img">
                  <img src="img/p-2.jpg" alt="Team Image" />
                </div>
                <div class="team-text">
                  <h2>Machin Name</h2>
                  <p>Lorem, ipsum dolor</p>
                </div>
              </div>
            </a>
          </div>
          <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.23s">
            <a href="#">
              <div class="team-item">
                <div class="team-img">
                  <img src="img/p-4.jpg" alt="Team Image" />
                </div>
                <div class="team-text">
                  <h2>Machin Name</h2>
                  <p>Lorem, ipsum dolor</p>
                </div>
              </div>
            </a>
          </div>
          <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
            <a href="#">
              <div class="team-item">
                <div class="team-img">
                  <img src="img/p-1.jpg" alt="Team Image" />
                </div>
                <div class="team-text">
                  <h2>Machin Name</h2>
                  <p>Lorem, ipsum dolor</p>
                </div>
              </div>
            </a>
          </div>
        </div>
      </div>
    </div> -->
    <!-- Team End -->


    <!-- Testimonial Start -->
    <div class="testimonial wow fadeIn" data-wow-delay="0.1s">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="testimonial-slider-nav">
              <div class="slider-nav">
                <img src="img/testimonial-1.jpg" alt="Testimonial" />
              </div>
              <div class="slider-nav">
                <img src="img/testimonial-2.jpg" alt="Testimonial" />
              </div>
              <div class="slider-nav">
                <img src="img/testimonial-3.jpg" alt="Testimonial" />
              </div>
              <div class="slider-nav">
                <img src="img/testimonial-4.jpg" alt="Testimonial" />
              </div>
              <div class="slider-nav">
                <img src="img/testimonial-1.jpg" alt="Testimonial" />
              </div>
              <div class="slider-nav">
                <img src="img/testimonial-2.jpg" alt="Testimonial" />
              </div>
              <div class="slider-nav">
                <img src="img/testimonial-3.jpg" alt="Testimonial" />
              </div>
              <div class="slider-nav">
                <img src="img/testimonial-4.jpg" alt="Testimonial" />
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <div class="testimonial-slider">
              <div class="slider-item">
                <h3>Customer Name</h3>
                <h4>profession</h4>
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                  Phasellus nec pretium mi. Curabitur facilisis ornare velit
                  non vulputate. Aliquam metus tortor, auctor id gravida
                  condimentum, viverra quis sem. Curabitur non nisl nec nisi
                  scelerisque maximus.
                </p>
              </div>
              <div class="slider-item">
                <h3>Customer Name</h3>
                <h4>profession</h4>
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                  Phasellus nec pretium mi. Curabitur facilisis ornare velit
                  non vulputate. Aliquam metus tortor, auctor id gravida
                  condimentum, viverra quis sem. Curabitur non nisl nec nisi
                  scelerisque maximus.
                </p>
              </div>
              <div class="slider-item">
                <h3>Customer Name</h3>
                <h4>profession</h4>
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                  Phasellus nec pretium mi. Curabitur facilisis ornare velit
                  non vulputate. Aliquam metus tortor, auctor id gravida
                  condimentum, viverra quis sem. Curabitur non nisl nec nisi
                  scelerisque maximus.
                </p>
              </div>
              <div class="slider-item">
                <h3>Customer Name</h3>
                <h4>profession</h4>
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                  Phasellus nec pretium mi. Curabitur facilisis ornare velit
                  non vulputate. Aliquam metus tortor, auctor id gravida
                  condimentum, viverra quis sem. Curabitur non nisl nec nisi
                  scelerisque maximus.
                </p>
              </div>
              <div class="slider-item">
                <h3>Customer Name</h3>
                <h4>profession</h4>
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                  Phasellus nec pretium mi. Curabitur facilisis ornare velit
                  non vulputate. Aliquam metus tortor, auctor id gravida
                  condimentum, viverra quis sem. Curabitur non nisl nec nisi
                  scelerisque maximus.
                </p>
              </div>
              <div class="slider-item">
                <h3>Customer Name</h3>
                <h4>profession</h4>
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                  Phasellus nec pretium mi. Curabitur facilisis ornare velit
                  non vulputate. Aliquam metus tortor, auctor id gravida
                  condimentum, viverra quis sem. Curabitur non nisl nec nisi
                  scelerisque maximus.
                </p>
              </div>
              <div class="slider-item">
                <h3>Customer Name</h3>
                <h4>profession</h4>
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                  Phasellus nec pretium mi. Curabitur facilisis ornare velit
                  non vulputate. Aliquam metus tortor, auctor id gravida
                  condimentum, viverra quis sem. Curabitur non nisl nec nisi
                  scelerisque maximus.
                </p>
              </div>
              <div class="slider-item">
                <h3>Customer Name</h3>
                <h4>profession</h4>
                <p>

                  Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                  Phasellus nec pretium mi. Curabitur facilisis ornare velit
                  non vulputate. Aliquam metus tortor, auctor id gravida
                  condimentum, viverra quis sem. Curabitur non nisl nec nisi
                  scelerisque maximus.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <!-- Testimonial End -->

    <!-- form- start----- -->
    <div class="contact wow fadeInUp">
      <div class="container">
        <div class="section-header text-center">
          <p>Get In Touch</p>
          <h2>For Any Query</h2>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="contact-info">
              <div class="contact-item">
                <i class="flaticon-address"></i>
                <div class="contact-text">
                  <h2>Location</h2>
                  <p>123 Street, New York, USA</p>
                </div>
              </div>
              <div class="contact-item">
                <i class="flaticon-call"></i>
                <div class="contact-text">
                  <h2>Phone</h2>
                  <p>+012 345 67890</p>
                </div>
              </div>
              <div class="contact-item">
                <i class="flaticon-send-mail"></i>
                <div class="contact-text">
                  <h2>Email</h2>
                  <p>info@example.com</p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="contact-form">
              <div id="success"></div>
              <form name="sentMessage" id="contactForm" novalidate="novalidate" method="POST" action="mail/contact.php">
                <div class="control-group">
                  <input type="text" class="form-control" id="name" placeholder="Your Name" required="required" data-validation-required-message="Please enter your name" />
                  <p class="help-block text-danger"></p>
                </div>
                <div class="control-group">
                  <input type="email" class="form-control" id="email" placeholder="Your Email" required="required" data-validation-required-message="Please enter your email" />
                  <p class="help-block text-danger"></p>
                </div>
                <div class="control-group">
                  <input type="text" class="form-control" id="subject" placeholder="Subject" required="required" data-validation-required-message="Please enter a subject" />
                  <p class="help-block text-danger"></p>
                </div>
                <div class="control-group">
                  <textarea class="form-control" id="message" placeholder="Message" required="required" data-validation-required-message="Please enter your message"></textarea>
                  <p class="help-block text-danger"></p>
                </div>
                <div>
                  <button class="btn" type="submit" id="sendMessageButton">
                    Send Message
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- form end-----     -->
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d71111.46287963848!2d77.39885236614447!3d28.623851360228084!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1654934985933!5m2!1sen!2sin" width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div>
        </div>
      </div>
    </div>
  </div>
    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>


  <?php include('include/footer.php') ?>


  






  <!-- JavaScript Libraries -->
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/wow/wow.min.js"></script>
  <script src="lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="lib/isotope/isotope.pkgd.min.js"></script>
  <script src="lib/lightbox/js/lightbox.min.js"></script>
  <script src="lib/waypoints/waypoints.min.js"></script>
  <script src="lib/counterup/counterup.min.js"></script>
  <script src="lib/slick/slick.min.js"></script>

  <!--Javascript -->
  <script src="js/main.js"></script>
</body>

</html>