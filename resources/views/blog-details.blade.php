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
            <li><a href="/about">About</a></li>
            <li><a href="/#services">Services</a></li>
            <li><a href="#portfolio" >Portfolio</a></li>
            <li><a href="/creator">Creator</a></li>

            <li><a href="/#team">Team</a></li>
            <li><a href="/#blog" class="active">Blogs</a></li>
            
            <li><a href="/#contact">Contact</a></li>
            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>

        </div>
    </header>

    <main class="main">

    <!-- Page Title -->
    <div class="page-title dark-background">
      <div class="container position-relative">
        <h1>Blog Details</h1>
        <p>{{$blog->title}}</p>
        {{-- <nav class="breadcrumbs">
          <ol>
            <li><a href="index.html">Home</a></li>
            <li class="current">Blog Details</li>
          </ol>
        </nav> --}}
      </div>
    </div>
    <!-- End Page Title -->

    <div class="container">
      <div class="row d-flex">

        <div class="col-lg-12">

          <!-- Blog Details Section -->
          <section id="blog-details" class="blog-details section">
            <div class="container">

              <article class="article">

                <div class="post-img">
                  <img src="{{ $blog->image }}" alt="" class="img-fluid">
                </div>

                <h2 class="title">{{$blog->title}}</h2>
                <div class="content">
                  <p>
                    {{$blog->short_description}}
                  </p>
                  <p>
                    {{$blog->description}}
                  </p>
                </div>  
                {{-- <div class="meta-top">
                  <ul>
                    <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="blog-details.html">John Doe</a></li>
                    <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="blog-details.html"><time datetime="2020-01-01">Jan 1, 2022</time></a></li>
                    <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a href="blog-details.html">12 Comments</a></li>
                  </ul>
                </div> --}}
                <!-- End meta top -->

                {{-- <div class="content">
                  <p>
                    Similique neque nam consequuntur ad non maxime aliquam quas. Quibusdam animi praesentium. Aliquam et laboriosam eius aut nostrum quidem aliquid dicta.
                    Et eveniet enim. Qui velit est ea dolorem doloremque deleniti aperiam unde soluta. Est cum et quod quos aut ut et sit sunt. Voluptate porro consequatur assumenda perferendis dolore.
                  </p>

                  <p>
                    Sit repellat hic cupiditate hic ut nemo. Quis nihil sunt non reiciendis. Sequi in accusamus harum vel aspernatur. Excepturi numquam nihil cumque odio. Et voluptate cupiditate.
                  </p>

                  <blockquote>
                    <p>
                      Et vero doloremque tempore voluptatem ratione vel aut. Deleniti sunt animi aut. Aut eos aliquam doloribus minus autem quos.
                    </p>
                  </blockquote>

                  <p>
                    Sed quo laboriosam qui architecto. Occaecati repellendus omnis dicta inventore tempore provident voluptas mollitia aliquid. Id repellendus quia. Asperiores nihil magni dicta est suscipit perspiciatis. Voluptate ex rerum assumenda dolores nihil quaerat.
                    Dolor porro tempora et quibusdam voluptas. Beatae aut at ad qui tempore corrupti velit quisquam rerum. Omnis dolorum exercitationem harum qui qui blanditiis neque.
                    Iusto autem itaque. Repudiandae hic quae aspernatur ea neque qui. Architecto voluptatem magni. Vel magnam quod et tempora deleniti error rerum nihil tempora.
                  </p>

                  <h3>Et quae iure vel ut odit alias.</h3>
                  <p>
                    Officiis animi maxime nulla quo et harum eum quis a. Sit hic in qui quos fugit ut rerum atque. Optio provident dolores atque voluptatem rem excepturi molestiae qui. Voluptatem laborum omnis ullam quibusdam perspiciatis nulla nostrum. Voluptatum est libero eum nesciunt aliquid qui.
                    Quia et suscipit non sequi. Maxime sed odit. Beatae nesciunt nesciunt accusamus quia aut ratione aspernatur dolor. Sint harum eveniet dicta exercitationem minima. Exercitationem omnis asperiores natus aperiam dolor consequatur id ex sed. Quibusdam rerum dolores sint consequatur quidem ea.
                    Beatae minima sunt libero soluta sapiente in rem assumenda. Et qui odit voluptatem. Cum quibusdam voluptatem voluptatem accusamus mollitia aut atque aut.
                  </p>
                  <img src="assets/img/blog/blog-inside-post.jpg" class="img-fluid" alt="">

                  <h3>Ut repellat blanditiis est dolore sunt dolorum quae.</h3>
                  <p>
                    Rerum ea est assumenda pariatur quasi et quam. Facilis nam porro amet nostrum. In assumenda quia quae a id praesentium. Quos deleniti libero sed occaecati aut porro autem. Consectetur sed excepturi sint non placeat quia repellat incidunt labore. Autem facilis hic dolorum dolores vel.
                    Consectetur quasi id et optio praesentium aut asperiores eaque aut. Explicabo omnis quibusdam esse. Ex libero illum iusto totam et ut aut blanditiis. Veritatis numquam ut illum ut a quam vitae.
                  </p>
                  <p>
                    Alias quia non aliquid. Eos et ea velit. Voluptatem maxime enim omnis ipsa voluptas incidunt. Nulla sit eaque mollitia nisi asperiores est veniam.
                  </p>

                </div> --}}
                <!-- End post content -->

                {{-- <div class="meta-bottom">
                  <i class="bi bi-folder"></i>
                  <ul class="cats">
                    <li><a href="#">Business</a></li>
                  </ul>

                  <i class="bi bi-tags"></i>
                  <ul class="tags">
                    <li><a href="#">Creative</a></li>
                    <li><a href="#">Tips</a></li>
                    <li><a href="#">Marketing</a></li>
                  </ul>
                </div> --}}
                <!-- End meta bottom -->

              </article>

            </div>
          </section>
          
        </div>
      </div>
    </div>

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
            <a 
                href="https://share.google/nxqcVNzZogesvJNoq"
                target="_blank"
                rel="noopener noreferrer"
            >
              <i class="bi bi-google"></i>
            </a>
            <a href="https://www.facebook.com/TourfyBrandise1" target="_blank" rel="noopener noreferrer">
              <i class="bi bi-facebook"></i>
            </a>
            <a href="https://www.instagram.com/brandise_marketing/" target="_blank" rel="noopener noreferrer">
              <i class="bi bi-instagram"></i>
            </a>
            <a href="https://wa.me/917982120764" target="_blank" rel="noopener noreferrer">
              <i class="bi bi-whatsapp"></i>
            </a>
            <a href="https://www.linkedin.com/company/tourfybrandise/" target="_blank" rel="noopener noreferrer">
              <i class="bi bi-linkedin"></i>
            </a>
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