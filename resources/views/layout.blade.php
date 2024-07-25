<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <link rel="shortcut icon" href="{{asset('images/favicon.png')}}" type="image/x-icon">

  <title>@yield('tieudetrang')</title>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <!-- slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.css')}}" />
  <link href="{{asset ('layout/css/styles.css')}}" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="{{asset ('css/style.css')}}" rel="stylesheet" />
  <!-- responsive style -->
  <link href="{{asset('css/responsive.css')}}" rel="stylesheet" />



</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
    <header class="header_section">
      <nav class="navbar navbar-expand-lg custom_nav-container ">
        <a class="navbar-brand" href="{{url('/')}}">
          <span>
            Giftos
          </span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class=""></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav  me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" href="{{url('/')}}">Trang chủ</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('/shop')}}">
                Cửa hàng
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="/lienhe">Liên hệ</a>
            </li>
            <li class="nav-item dropdown">
              @if (Auth::check())
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa fa-user" aria-hidden="true"></i> {{Auth::user()->name}}!
              </a>
              <ul class="dropdown-menu">

                <li><a class="dropdown-item" href="/profile">Cập nhật hồ sơ</a></li>
                <li><a class="dropdown-item" href="/thoat">Thoát</a></li>
              </ul>
              @else
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa fa-user" aria-hidden="true"></i>Tài khoản
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="/dangnhap">Đăng nhập</a></li>
                <li><a class="dropdown-item" href="/dangky">Đăng ký</a></li>
                <li><a class="dropdown-item" href="/forgot-password">Quên pass</a></li>

              </ul>
              @endif
            </li>
          </ul>
          <div class="user_option">
            <a href="/hiengiohang">
              <i class="fa fa-shopping-bag" aria-hidden="true"></i>
            </a>
            <div class="" id="timkiem">
              <form class="form-inline" action="/timkiem" method="get">
                <input class="border border-danger rounded p-2 col-6" name="tukhoa" placeholder="Từ khóa">
                <button class="btn btn-danger p-3 nav_search-btn" type="submit">
                  <i class="fa fa-search" aria-hidden="true"></i>
                </button>
              </form>
              <div id="ketquatim">
                <!-- kết quả tìm kiếm -->
              </div>
            </div>

          </div>
        </div>
      </nav>
    </header>
    <!-- end header section -->
    <!-- slider section -->
    @yield('noidung')


    <!-- info section -->

    <section class="info_section  layout_padding2-top">
      <div class="social_container">
        <div class="social_box">
          <a href="">
            <i class="fa fa-facebook" aria-hidden="true"></i>
          </a>
          <a href="">
            <i class="fa fa-twitter" aria-hidden="true"></i>
          </a>
          <a href="">
            <i class="fa fa-instagram" aria-hidden="true"></i>
          </a>
          <a href="">
            <i class="fa fa-youtube" aria-hidden="true"></i>
          </a>
        </div>
      </div>
      <div class="info_container ">
        <div class="container">
          <div class="row">
            <div class="col-md-6 col-lg-3">
              <h6>
                ABOUT US
              </h6>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed doLorem ipsum dolor sit amet, consectetur adipiscing elit, sed doLorem ipsum dolor sit amet,
              </p>
            </div>
            <div class="col-md-6 col-lg-3">
              <div class="info_form ">
                <h5>
                  Newsletter
                </h5>
                <form action="#">
                  <input type="email" placeholder="Enter your email">
                  <button>
                    Subscribe
                  </button>
                </form>
              </div>
            </div>
            <div class="col-md-6 col-lg-3">
              <h6>
                NEED HELP
              </h6>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed doLorem ipsum dolor sit amet, consectetur adipiscing elit, sed doLorem ipsum dolor sit amet,
              </p>
            </div>
            <div class="col-md-6 col-lg-3">
              <h6>
                CONTACT US
              </h6>
              <div class="info_link-box">
                <a href="">
                  <i class="fa fa-map-marker" aria-hidden="true"></i>
                  <span> Gb road 123 london Uk </span>
                </a>
                <a href="">
                  <i class="fa fa-phone" aria-hidden="true"></i>
                  <span>+01 12345678901</span>
                </a>
                <a href="">
                  <i class="fa fa-envelope" aria-hidden="true"></i>
                  <span> demo@gmail.com</span>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- footer section -->
      <footer class=" footer_section">
        <div class="container">
          <p>
            &copy; <span id="displayYear"></span> All Rights Reserved By
            <a href="https://html.design/">Free Html Templates</a>
          </p>
        </div>
      </footer>
      <!-- footer section -->

    </section>

    <!-- end info section -->


    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
    </script>
    <script src="js/custom.js"></script>

</body>

</html>