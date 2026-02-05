<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Tourfy Brandise</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  {{-- <link href="assets/img/favicon.png" rel="icon"> --}}
  {{-- <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon"> --}}

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <!-- Swiper CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
  <!-- Swiper JS -->
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  {{-- <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet"> --}}

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">

  
</head>

{{-- {{dd($services);}} --}}

<body class="index-page">
    <header id="header" class="header d-flex align-items-center fixed-top"
    style="box-shadow: 0px 0 18px rgba(0, 0, 0, 0.1);background-color: rgba(42, 44, 57, 0.9);"
    >
        <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

        <a href="index.html" class="logo d-flex align-items-center">
            <!-- Uncomment the line below if you also wish to use an image logo -->
            <!-- <img src="assets/img/logo.png" alt=""> -->
            <h1 class="sitename">Tourfy Brandise LLP</h1>
        </a>

        <nav id="navmenu" class="navmenu">
            <ul>
            <li><a href="/" >Home</a></li>
            <li><a href="/about" class="active">About</a></li>
            <li><a href="/#services">Services</a></li>
            <li><a href="#portfolio">Portfolio</a></li>
            {{-- <li><a href="#team">Team</a></li> --}}
            <li><a href="/#blog">Blogs</a></li>
            
            <li><a href="/#contact">Contact</a></li>
            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>

        </div>
    </header>

    <main class="main">

        <!-- About Section -->
    <section id="about" class="about section mt-5">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>About</h2>
        <p>Who we are</p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="100">
            <p>
             Tourfy Brandise LLP is a results-driven marketing and branding agency that helps businesses grow online through smart strategy, high-quality content, and performance-focused advertising. We specialize in social media marketing, branding, Meta & Google Ads, UGC content, SEO, and lead generation to improve visibility, conversions, and long-term brand value. Our approach is simple—strong creatives, targeted campaigns, and continuous optimization to deliver real growth.
            </p>
            <ul>
              <li>
                <i class="bi bi-check2-circle"></i>
                <span>Data-driven marketing strategies focused on real business growth and measurable results.</span>
              </li>
              <li>
                <i class="bi bi-check2-circle"></i>
                <span>Expertise in social media marketing, branding, SEO, and high-performance Meta & Google Ads.</span>
              </li>
              <li>
                <i class="bi bi-check2-circle"></i>
                <span>High-quality creatives, targeted campaigns, and continuous optimization for better conversions.</span>
              </li>
            </ul>

          <div class="" data-aos="fade-up" data-aos-delay="200">
            <p>
            For the next-gen ventures and legacy brands ready to rewrite the rules, we design for impact and gear for growth. With insight, strategy and storytelling, we help future-focused brands reimagine how they connect, and where they’re going next.
            </p>
            {{-- <a href="#" class="read-more"><span>Read More</span><i class="bi bi-arrow-right"></i></a> --}}
          </div>

          </div>

          <div class="col-lg-6 order-1 order-lg-2 text-center">
                <img src="assets/img/working-2.jpg" alt="" class="img-fluid">
              </div>

        </div>

      </div>

    </section>
    <!-- /About Section -->

  </main>

  <footer id="footer" class="footer dark-background">
    <div class="container py-5">

      <div class="row gy-4 text-start">

        <!-- Brand -->
        <div class="footer-brand col-lg-3 col-md-6 text-center">
          <h3 class="footer-logo">Tourfy Brandise LLP</h3>
          <p class="footer-description">
            Tourfy Brandise LLP is a results-driven marketing and branding agency
            helping businesses grow through strategy, creativity, and performance-focused digital solutions.
          </p>

          <div class="social-links d-flex justify-content-center">
            {{-- <a href="#"><i class="bi bi-twitter-x"></i></a> --}}
            <a href="#"><i class="bi bi-google"></i></a>
            <a href="#"><i class="bi bi-facebook"></i></a>
            <a href="#"><i class="bi bi-instagram"></i></a>
            <a href="#"><i class="bi bi-linkedin"></i></a>
          </div>
        </div>

        <!-- Creative Services -->
        <div class="col-lg-2 col-md-6">
          <h4 class="footer-heading">Creative design services <span>↗</span></h4>
          <ul class="footer-list">
            <li>Ad creative</li>
            <li>Social media creative</li>
            <li>Presentation design</li>
            <li>Illustration design</li>
            <li>Branding services</li>
            <li>eBooks & report design</li>
            <li>Print design</li>
            <li>Packaging design</li>
          </ul>
        </div>

        <!-- Production + AI -->
        <div class="col-lg-3 col-md-6">
          <h4 class="footer-heading">Specialized production services <span>↗</span></h4>
          <ul class="footer-list">
            <li>Video production</li>
            <li>Motion design</li>
            <li>Web design</li>
            <li>Design systems</li>
            <li>Product design</li>
            <li>Copywriting</li>
          </ul>

          <h4 class="footer-heading mt-4">AI services <span>↗</span></h4>
          <ul class="footer-list">
            <li>AI-powered creative</li>
            <li>AI consulting</li>
          </ul>
        </div>

        <!-- Main -->
        <div class="col-lg-2 col-md-6">
          <h4 class="footer-heading">Main</h4>
          <ul class="footer-list">
            <li>Our work</li>
            <li>Our people</li>
            <li>About us</li>
            <li>Pricing</li>
            <li>Careers</li>
          </ul>
        </div>

        <!-- Learn -->
        <div class="col-lg-2 col-md-6">
          <h4 class="footer-heading">Learn</h4>
          <ul class="footer-list">
            <li>Blog</li>
            <li>Guides</li>
            <li>Reports</li>
            <li>Customer Stories</li>
            <li>What’s new</li>
          </ul>
        </div>

      </div>

      <hr class="footer-divider">

      <div class="copyright text-center">
        © <strong>Tourfy Brandise LLP</strong> — All Rights Reserved
      </div>

    </div>
  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  {{-- <script src="assets/vendor/swiper/swiper-bundle.min.js"></script> --}}

  <script>
    document.addEventListener("DOMContentLoaded", function () {
      new Swiper(".hero-swiper", {
        loop: true,
        speed: 2000,
        autoplay: {
          delay: 2000,
          disableOnInteraction: false,
        },
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
        },
        effect: "creative",
        creativeEffect: {
          prev: {
            shadow: true,
            translate: ["-120%", 0, -500],
            rotate: [0, 0, -20],
          },
          next: {
            shadow: true,
            translate: ["120%", 0, -500],
            rotate: [0, 0, 20],
          },
        },
      });
    });
  </script>

  {{-- service marquee --}}
  <script>
      const marquee = document.querySelector('.marquee');

      let isDown = false;
      let startX;
      let scrollLeft;

      marquee.addEventListener('mousedown', (e) => {
          isDown = true;
          marquee.classList.add('active');
          startX = e.pageX - marquee.offsetLeft;
          scrollLeft = marquee.scrollLeft;
      });

      marquee.addEventListener('mouseleave', () => {
          isDown = false;
      });

      marquee.addEventListener('mouseup', () => {
          isDown = false;
      });

      marquee.addEventListener('mousemove', (e) => {
          if (!isDown) return;
          e.preventDefault();
          const x = e.pageX - marquee.offsetLeft;
          const walk = (x - startX) * 1.5; // scroll speed
          marquee.scrollLeft = scrollLeft - walk;
      });
  </script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>

  
</body>

</html>