<?php
 include './Backend/db/config.php';
 session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Home - SwiftShip </title>
  <meta content="" name="description">
  <meta content="" name="keywords">

 <!-- Favicons -->
 <link href="assets/img/swiftshipsinc_logo.png" rel="icon">
  <link href="assets/img/swiftshipsinc_logo.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">

</head>

<body>

<?php include './forms/header.php'?>

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="hero d-flex align-items-center">
    <div class="container">
      <div class="row gy-4 d-flex justify-content-between">
        <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center">
          <h2 data-aos="fade-up">Your Lightning Fast Delivery Partner</h2>
          <p data-aos="fade-up" data-aos-delay="100">Experience unparalleled speed and precision in every shipment. Our cutting-edge logistics ensure swift, reliable, and stress-free deliveries for businesses and individuals alike. Trust SwiftShip for a delivery experience that prioritizes your time and satisfaction. Your swift solution is just a click away!</p>

<?php
  if (isset($_POST['submit'])) {
    $track = $_POST['track'];

    $sql = "SELECT * FROM parcels WHERE reference_number = '$track'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      echo
      "<script>
      alert('Tracking Successfull!')
      window.location.href = 'track.php?ref_num_$track';
    </script>";
    while ($row = $result->fetch_assoc()) {
      $_SESSION['Courier_ID'] = $row['id']; 
      $_SESSION['Courier_status'] = $row['status'];
      $_SESSION['from_branch'] = $row['from_branch_id'];
      $_SESSION['to_branch'] = $row['to_branch_id'];
    }
    }$_SESSION['track'] = $track;
  }
?>

          <form class="form-search d-flex align-items-stretch mb-3" data-aos="fade-up" data-aos-delay="200" method="POST">
            <input type="text" name="track" class="form-control" placeholder="Track your Parcel">
            <button type="submit" name="submit" class="btn btn-primary">Search</button>
          </form>

          <div class="row gy-4" data-aos="fade-up" data-aos-delay="400">

            <div class="col-lg-3 col-6">
              <div class="stats-item text-center w-100 h-100">
                <span data-purecounter-start="0" data-purecounter-end="
                <?php
                  $sql = "SELECT * FROM user WHERE type = '3';";
                  $result = $conn->query($sql);

                  if ($result) {
                    echo mysqli_num_rows($result);
                  }
                ?>
                " data-purecounter-duration="1" class="purecounter"></span>
                <p>Clients</p>
              </div>
            </div><!-- End Stats Item -->

            <div class="col-lg-3 col-6">
              <div class="stats-item text-center w-100 h-100">
                <span data-purecounter-start="0" data-purecounter-end="
                <?php
                  $sql = "SELECT * FROM parcels;";
                  $result = $conn->query($sql);

                  if ($result) {
                    echo mysqli_num_rows($result);
                  }
                ?>
                " data-purecounter-duration="1" class="purecounter"></span>
                <p>Couriers</p>
              </div>
            </div><!-- End Stats Item -->

            <div class="col-lg-3 col-6">
              <div class="stats-item text-center w-100 h-100">
                <span data-purecounter-start="0" data-purecounter-end="
                <?php
                  $sql = "SELECT * FROM branches";
                  $result = $conn->query($sql);

                  if ($result) {
                    echo mysqli_num_rows($result);
                  }
                ?>
                " data-purecounter-duration="1" class="purecounter"></span>
                <p>Branches</p>
              </div>
            </div><!-- End Stats Item -->

            <div class="col-lg-3 col-6">
              <div class="stats-item text-center w-100 h-100">
                <span data-purecounter-start="0" data-purecounter-end="
                <?php
                  $sql = "SELECT * FROM user WHERE type = '2';";
                  $result = $conn->query($sql);

                  if ($result) {
                    echo mysqli_num_rows($result);
                  }
                ?>
                " data-purecounter-duration="1" class="purecounter"></span>
                <p>Agents</p>
              </div>
            </div><!-- End Stats Item -->

          </div>
        </div>

        <div class="col-lg-5 order-1 order-lg-2 hero-img" data-aos="zoom-out">
          <img src="assets/img/hero-img.svg" class="img-fluid mb-3 mb-lg-0" alt="">
        </div>

      </div>
    </div>
  </section><!-- End Hero Section -->

  <main id="main">

    <!-- ======= Featured Services Section ======= -->
    <section id="featured-services" class="featured-services">
      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up">
            <div class="icon flex-shrink-0"><i class="fa-solid fa-cart-flatbed"></i></div>
            <div>
              <h4 class="title">Logistics</h4>
              <p class="description">Elevating logistics with unparalleled speed and reliability. Your trusted partner for swift and stress-free deliveries, redefining the logistics experience.</p>
              <a href="services.php" class="readmore stretched-link"><span>Learn More</span><i class="bi bi-arrow-right"></i></a>
            </div>
          </div>
          <!-- End Service Item -->

          <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="100">
            <div class="icon flex-shrink-0"><i class="fa-solid fa-truck"></i></div>
            <div>
              <h4 class="title">Trucking</h4>
              <p class="description">Revolutionizing cargo transport with swift solutions. Your go-to partner for efficient and reliable trucking services, ensuring timely deliveries always.</p>
              <a href="services.php" class="readmore stretched-link"><span>Learn More</span><i class="bi bi-arrow-right"></i></a>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="200">
            <div class="icon flex-shrink-0"><i class="fa-solid fa-truck-ramp-box"></i></div>
            <div>
              <h4 class="title">Delivery</h4>
              <p class="description">Redefining delivery with unmatched speed and precision. Your reliable partner for swift and stress-free delivery solutions, ensuring satisfaction every time.</p>
              <a href="services.php" class="readmore stretched-link"><span>Learn More</span><i class="bi bi-arrow-right"></i></a>
            </div>
          </div><!-- End Service Item -->

        </div>

      </div>
    </section>
    <!-- End Featured Services Section -->

    <!-- ======= About Us Section ======= -->
    <section id="about" class="about pt-0">
      <div class="container" data-aos="fade-up">

        <div class="row gy-4">
          <div class="col-lg-6 position-relative align-self-start order-lg-last order-first">
            <img src="assets/img/about.jpg" class="img-fluid" alt="">
            <a href="https://youtu.be/HUozIpTODZQ?si=bxiwSJCxyq4x8n_A" class="glightbox play-btn" autoplay></a>
          </div>
          <div class="col-lg-6 content order-last  order-lg-first">
            <h3>About Us</h3>
            <p>
            SwiftShip is a leading logistics provider committed to swift and reliable deliveries. With cutting-edge technology and a customer-centric approach, we redefine logistics, ensuring speed, precision, and customer satisfaction.
            <ul>
              <li data-aos="fade-up" data-aos-delay="100">
                <i class="bi bi-diagram-3"></i>
                <div>
                  <h5>Unmatched Speed and Efficiency</h5>
                  <p>At SwiftShip, we redefine logistics with a commitment to unparalleled speed and efficiency.</p>
                </div>
              </li>
              <li data-aos="fade-up" data-aos-delay="200">
                <i class="bi bi-fullscreen-exit"></i>
                <div>
                  <h5> Customer-Centric Approach</h5>
                  <p>We prioritize your satisfaction by placing your needs at the forefront of our operations.</p>
                </div>
              </li>
              <li data-aos="fade-up" data-aos-delay="300">
                <i class="bi bi-broadcast"></i>
                <div>
                  <h5>Cutting-Edge Technology and Expert Team</h5>
                  <p>Backed by cutting-edge technology and an expert team, SwiftShip combines innovation with experience.</p>
                </div>
              </li>
            </ul>
          </div>
        </div>

      </div>
    </section><!-- End About Us Section -->

    <!-- ======= Services Section ======= -->
    <section id="service" class="services pt-0">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <span>Our Services</span>
          <h2>Our Services</h2>

        </div>

        <div class="row gy-4">

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="card">
              <div class="card-img">
                <img src="assets/img/storage-service.jpg" alt="" class="img-fluid">
              </div>
              <h3><a href="service-details.html" class="stretched-link">Storage</a></h3>
        <p>our reliable partner for secure and efficient storage solutions. Trust us for seamless and tailored storage services. </p>
            </div>
          </div><!-- End Card Item -->

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="card">
              <div class="card-img">
                <img src="assets/img/logistics-service.jpg" alt="" class="img-fluid">
              </div>
              <h3><a href="service-details.html" class="stretched-link">Logistics</a></h3>
              <p>Elevating logistics with unparalleled speed and reliability. Your trusted partner for swift and stress-free deliveries, redefining the logistics experience.</p>
            </div>
          </div><!-- End Card Item -->

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
            <div class="card">
              <div class="card-img">
                <img src="assets/img/cargo-service.jpg" alt="" class="img-fluid">
              </div>
              <h3><a href="service-details.html" class="stretched-link">Cargo</a></h3>
              <p>Your go-to logistics partner for swift and secure cargo transport. We redefine shipping with speed, reliability, and excellence.</p>
            </div>
          </div><!-- End Card Item -->

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
            <div class="card">
              <div class="card-img">
                <img src="assets/img/trucking-service.jpg" alt="" class="img-fluid">
              </div>
              <h3><a href="service-details.html" class="stretched-link">Trucking</a></h3>
              <p>Revolutionizing cargo transport with swift solutions. Your go-to partner for efficient and reliable trucking services, ensuring timely deliveries always.</p>
            </div>
          </div><!-- End Card Item -->

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="500">
            <div class="card">
              <div class="card-img">
                <img src="assets/img/packaging-service.jpg" alt="" class="img-fluid">
              </div>
              <h3><a href="service-details.html" class="stretched-link">Packaging</a></h3>
              <p>Elevate your shipments with precision and care. Our reliable and efficient packaging solutions ensure your goods arrive securely.</p>
            </div>
          </div><!-- End Card Item -->

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="600">
            <div class="card">
              <div class="card-img">
                <img src="assets/img/warehousing-service.jpg" alt="" class="img-fluid">
              </div>
              <h3><a href="service-details.html" class="stretched-link">Warehousing</a></h3>
              <p>Transforming logistics with state-of-the-art storage solutions. Our efficient warehousing ensures seamless operations, elevating your supply chain excellence.</p>
            </div>
          </div><!-- End Card Item -->

        </div>

      </div>
    </section><!-- End Services Section -->

    <!-- ======= Call To Action Section ======= -->
    <section id="call-to-action" class="call-to-action">
      <div class="container" data-aos="zoom-out">

        <div class="row justify-content-center">
          <div class="col-lg-8 text-center">
            <h3>Get In Touch</h3>
            <p> Get in touch with SwiftShip for seamless logistics solutions. Our commitment to speed and reliability ensures stress-free deliveries, making us your trusted shipping partner.</p>
            <a class="cta-btn" href="contact.php">Contact Us</a>
          </div>
        </div>

      </div>
    </section><!-- End Call To Action Section -->

    <!-- ======= Features Section ======= -->
    <section id="features" class="features">
      <div class="container">

        <div class="row gy-4 align-items-center features-item" data-aos="fade-up">

          <div class="col-md-5">
            <img src="assets/img/features-1.jpg" class="img-fluid" alt="">
          </div>
          <div class="col-md-7">
            <h3>Delivering at Your Doorstep</h3>
            <p class="fst-italic">
            Experience convenience with SwiftShip's doorstep delivery. Enjoy seamless service, quick turnaround, and secure packages. Trust us for swift, reliable, and stress-free deliveries every time.
            <ul>
              <li><i class="bi bi-check"></i> Swift Service: Unmatched speed for on-time deliveries.</li>
              <li><i class="bi bi-check"></i> Reliable Logistics: Dependable and secure shipments.</li>
              <li><i class="bi bi-check"></i> Customer Satisfaction: Prioritizing your needs for a stress-free experience.</li>
            </ul>
          </div>
        </div><!-- Features Item -->

        <div class="row gy-4 align-items-center features-item" data-aos="fade-up">
          <div class="col-md-5 order-1 order-md-2">
            <img src="assets/img/features-2.jpg" class="img-fluid" alt="">
          </div>
          <div class="col-md-7 order-2 order-md-1">
            <h3>Delivering Excellence Round the Clock</h3>
            <p class="fst-italic">
            Experience SwiftShip's 24/7 online support. Swift deliveries, reliability, and precision—your logistics partner for swift and stress-free shipments. Your satisfaction is our commitment.
            </p>
            <p>
            njoy peace of mind knowing that our dedicated team is always ready to assist. SwiftShip strives to redefine your delivery experience, providing unparalleled service and ensuring your satisfaction every step of the way. Trust us for a seamless and stress-free logistics partnership that prioritizes your needs.
            </p>
          </div>
        </div><!-- Features Item -->

        <div class="row gy-4 align-items-center features-item" data-aos="fade-up">
          <div class="col-md-5">
            <img src="assets/img/features-3.jpg" class="img-fluid" alt="">
          </div>
          <div class="col-md-7">
            <h3>Delivering With Love</h3>
            <p>SwiftShip delivers with love, ensuring each package receives personal care and attention. From swift, secure handling to a customer-centric approach, we redefine logistics with a commitment to satisfaction and excellence.</p>
            <ul>
              <li><i class="bi bi-check"></i> Speedy Service: Rapid deliveries for your time-sensitive shipments.</li>
              <li><i class="bi bi-check"></i> Secure Handling: Packages treated with utmost care and security.</li>
              <li><i class="bi bi-check"></i> Customer Satisfaction: Prioritizing your needs for a delightful delivery experience.</li>
            </ul>
          </div>
        </div><!-- Features Item -->

        <div class="row gy-4 align-items-center features-item" data-aos="fade-up">
          <div class="col-md-5 order-1 order-md-2">
            <img src="assets/img/features-4.jpg" class="img-fluid" alt="">
          </div>
          <div class="col-md-7 order-2 order-md-1">
            <h3>World's Biggest Shipping System</h3>
            <p class="fst-italic">
            Embark on a seamless global shipping experience with SwiftShip, the industry leader. Our cutting-edge logistics redefine the delivery landscape, ensuring unparalleled speed and efficiency. 
            </p>
            <p>
            SwiftShip stands as the world's biggest shipping system, connecting businesses and individuals with swift, reliable, and stress-free deliveries. Experience the advantage of unmatched scale and expertise with SwiftShip—your trusted partner in navigating the vast world of logistics.
            </p>
          </div>
        </div><!-- Features Item -->

      </div>
    </section><!-- End Features Section -->

    

    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials">
      <div class="container">

        <div class="slides-1 swiper" data-aos="fade-up">
          <div class="swiper-wrapper">

            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="assets/img/testimonials/testimonials-1.jpg" class="testimonial-img" alt="">
                <h3>Saul Goodman</h3>
                <h4>Ceo &amp; Founder</h4>
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>
                  <i class="bi bi-quote quote-icon-left"></i>
                   As the CEO and Founder, SwiftShip has been a game-changer for our company. The seamless logistics and swift deliveries have elevated our operations. SwiftShip is more than a partner; it's a key contributor to our success story.
                  <i class="bi bi-quote quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="assets/img/testimonials/testimonials-2.jpg" class="testimonial-img" alt="">
                <h3>Sara Wilsson</h3>
                <h4>Designer</h4>
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>
                  <i class="bi bi-quote quote-icon-left"></i>
                  SwiftShip exceeded my expectations. Their swift and reliable deliveries, coupled with exceptional customer service, make them my go-to choice. Dependability at its finest—SwiftShip truly delivers on their promises
                  <i class="bi bi-quote quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="assets/img/testimonials/testimonials-3.jpg" class="testimonial-img" alt="">
                <h3>Jena Karlis</h3>
                <h4>Store Owner</h4>
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>
                  <i class="bi bi-quote quote-icon-left"></i>
                  SwiftShip has transformed my store's logistics. Their efficient and reliable delivery services ensure my products reach customers promptly. SwiftShip's professionalism and streamlined processes have significantly enhanced my store operations. Highly recommended!
                  <i class="bi bi-quote quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="assets/img/testimonials/testimonials-4.jpg" class="testimonial-img" alt="">
                <h3>Matt Brandon</h3>
                <h4>Freelancer</h4>
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>
                  <i class="bi bi-quote quote-icon-left"></i>
                  As a freelancer, SwiftShip has been a game-changer. Their efficient and reliable delivery services have streamlined my client deliveries. With SwiftShip, I can focus on my work, knowing that deliveries are in good hands
                  <i class="bi bi-quote quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="assets/img/testimonials/testimonials-5.jpg" class="testimonial-img" alt="">
                <h3>John Larson</h3>
                <h4>Entrepreneur</h4>
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>
                  <i class="bi bi-quote quote-icon-left"></i>
                  SwiftShip has been a game-changer for my entrepreneurial ventures. Their lightning-fast and dependable logistics provide a competitive edge. SwiftShip's efficiency and reliability align perfectly with the pace of entrepreneurship. Highly recommended for ambitious endeavors!
                  <i class="bi bi-quote quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End testimonial item -->

          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section><!-- End Testimonials Section -->

    <!-- ======= Frequently Asked Questions Section ======= -->
    <section id="faq" class="faq">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <span>Frequently Asked Questions</span>
          <h2>Frequently Asked Questions</h2>

        </div>

        <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="200">
          <div class="col-lg-10">

            <div class="accordion accordion-flush" id="faqlist">

              <div class="accordion-item">
                <h3 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-1">
                    <i class="bi bi-question-circle question-icon"></i>
                    How fast are SwiftShip deliveries?
                  </button>
                </h3>
                <div id="faq-content-1" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                  <div class="accordion-body">
                  SwiftShip ensures lightning-fast deliveries, leveraging cutting-edge logistics for swift and reliable service.
                  </div>
                </div>
              </div><!-- # Faq item-->

              <div class="accordion-item">
                <h3 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-2">
                    <i class="bi bi-question-circle question-icon"></i>
                    What makes SwiftShip stand out in the industry?
                  </button>
                </h3>
                <div id="faq-content-2" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                  <div class="accordion-body">
                  SwiftShip stands out with unparalleled speed, efficiency, and a customer-centric approach, redefining the logistics experience.
                  </div>
                </div>
              </div><!-- # Faq item-->

              <div class="accordion-item">
                <h3 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-3">
                    <i class="bi bi-question-circle question-icon"></i>
                    How can I track my shipment with SwiftShip?
                  </button>
                </h3>
                <div id="faq-content-3" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                  <div class="accordion-body">
                  Tracking your shipment is easy. Use our online tracking tool and enter your consignment number for real-time updates.
                  </div>
                </div>
              </div><!-- # Faq item-->

              <div class="accordion-item">
                <h3 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-4">
                    <i class="bi bi-question-circle question-icon"></i>
                    Does SwiftShip offer international shipping services?
                  </button>
                </h3>
                <div id="faq-content-4" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                  <div class="accordion-body">
                    <i class="bi bi-question-circle question-icon"></i>
                    Yes, SwiftShip provides seamless international shipping services, connecting businesses and individuals globally.
                  </div>
                </div>
              </div><!-- # Faq item-->

              <div class="accordion-item">
                <h3 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-5">
                    <i class="bi bi-question-circle question-icon"></i>
                    Is SwiftShip environmentally conscious in its operations?
                  </button>
                </h3>
                <div id="faq-content-5" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                  <div class="accordion-body">
                  Absolutely. SwiftShip is committed to eco-friendly practices, implementing green initiatives to reduce our environmental footprint in logistics.
                  </div>
                </div>
              </div><!-- # Faq item-->

            </div>

          </div>
        </div>

      </div>
    </section><!-- End Frequently Asked Questions Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">

    <div class="container">
      <div class="row gy-4">
        <div class="col-lg-6 col-md-12 footer-info">
          <a href="Home.php" class="logo d-flex align-items-center">
            <span>SwiftShip</span>
          </a>
          <p>Your Global Logistics Partner for Swift, Reliable, and Stress-Free Deliveries. Redefining Speed and Efficiency in Shipping for Businesses and Individuals Worldwide. Experience Seamless Shipping with SwiftShip Today</p>
          <div class="social-links d-flex mt-4">
            <a href="www.twitter.com" class="twitter"><i class="bi bi-twitter"></i></a>
            <a href="https://www.facebook.com/hamii.chaudhary.39/" class="facebook"><i class="bi bi-facebook"></i></a>
            <a href="https://www.instagram.com/hyeee_dear/" class="instagram"><i class="bi bi-instagram"></i></a>
            <a href="https://pk.linkedin.com/in/muhammad-hamza-ali-7339a0247" class="linkedin"><i class="bi bi-linkedin"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-6 footer-links">
          <h4>Useful Links</h4>
          <ul>
            <li><a href="Home.php">Home</a></li>
            <li><a href="about.php">About Us</a></li>
            <li><a href="services.php">Services</a></li>
            <li><a href="contact.php">Contact Us</a></li>
            <li><a href="Privacy Policy.php">Privacy policy</a></li>
          </ul>
        </div>


        <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
          <h4>Contact Us</h4>
          <p>
            A108 Adam Street <br>
            New York, NY 535022<br>
            United States <br><br>
            <strong>Phone:</strong> +1 5589 55488 55<br>
            <strong>Email:</strong> info@example.com<br>
          </p>

        </div>

      </div>
    </div>

    <div class="container mt-4">
      <div class="copyright">
        &copy; Copyright <strong><span>SwiftShip</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/logis-bootstrap-logistics-website-template/ -->
        Designed by <a href="Home.php">Dreams Makers</a>
      </div>
    </div>

  </footer><!-- End Footer -->
  <!-- End Footer -->

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>