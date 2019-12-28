<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>{{ config('app.name', 'SenEdu') }}</title>
    <!-- for-mobile-apps -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Child Learn Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />

    <script>
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>

    <!-- css files -->
    <link href="{{ asset('css/main/bootstrap.css') }}" rel='stylesheet' type='text/css' /><!-- bootstrap css -->
    <link href="{{ asset('css/main/style.css') }}" rel='stylesheet' type='text/css' /><!-- custom css -->
    <link href="{{ asset('css/main/css_slider.css') }}" type="text/css" rel="stylesheet" media="all">
    <link href="{{ asset('css/main/font-awesome.min.css') }}" rel="stylesheet"><!-- fontawesome css -->
    <!-- //css files -->

    <!-- google fonts -->
    <link href="//fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i&amp;subset=latin-ext" rel="stylesheet">
    <!-- //google fonts -->

</head>
<body>

<!-- header -->
<header>
    <div class="top-head container">
        <div class="ml-auto text-right right-p">
            <ul>
                <li class="mr-3">
                    <span class="fa fa-clock-o"></span> Mon-Sat : 9:00 to 17:00</li>
                <li>
                    <span class="fa fa-envelope-open"></span> <a href="mailto:info@example.com">info@example.com</a> </li>
            </ul>
        </div>
    </div>
    <div class="container">
        <!-- nav -->
        <nav class="py-3 d-lg-flex">
            <div id="logo">
                <h1> <a href="index.html"><img src="images/s2.png" alt=""> Child Learn </a></h1>
            </div>
            <label for="drop" class="toggle"><span class="fa fa-bars"></span></label>
            <input type="checkbox" id="drop" />
            <ul class="menu ml-auto mt-1">
                <li class="active"><a href="/">Anasayfa</a></li>
                <li class=""><a href="#about">Biz kimiz</a></li>
                <li class=""><a href="#services">Kurumsal</a></li>
                <li class=""><a href="#stats">İstatistikler</a></li>
                <li class=""><a href="#team">İletişim</a></li>

            </ul>
        </nav>
        <!-- //nav -->
    </div>
</header>
<!-- //header -->

<!-- banner -->
<div class="banner" id="home">
    <div class="layer">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 banner-text-w3pvt">
                    <!-- banner slider-->
                    <div class="csslider infinity" id="slider1">
                        <input type="radio" name="slides" checked="checked" id="slides_1" />
                        <input type="radio" name="slides" id="slides_2" />
                        <input type="radio" name="slides" id="slides_3" />
                        <ul class="banner_slide_bg">
                            <li>
                                <div class="container-fluid">
                                    <div class="w3ls_banner_txt">
                                        <h3 class="b-w3ltxt text-capitalize mt-md-4">Education Courses.</h3>
                                        <h4 class="b-w3ltxt text-capitalize mt-md-2">Study For Better Future</h4>
                                        <p class="w3ls_pvt-title my-3">onec consequat sapien ut leo cursus rhoncus. Nullam dui mi, vulputate ac metus semper Nullam dui mi.
                                            Vestibulum ante. Morbi at dui nisl.</p>
                                        <a href="#about" class="btn btn-banner my-3">Read More</a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="container-fluid">
                                    <div class="w3ls_banner_txt">
                                        <h3 class="b-w3ltxt text-capitalize mt-md-4">Education Courses.</h3>
                                        <h4 class="b-w3ltxt text-capitalize mt-md-2">Study For Better Future</h4>
                                        <p class="w3ls_pvt-title my-3">onec consequat sapien ut leo cursus rhoncus. Nullam dui mi, vulputate ac metus semper Nullam dui mi.
                                            Vestibulum ante. Morbi at dui nisl.</p>
                                        <a href="#about" class="btn btn-banner my-3">Read More</a>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="container-fluid">
                                    <div class="w3ls_banner_txt">
                                        <h3 class="b-w3ltxt text-capitalize mt-md-4">Education Courses.</h3>
                                        <h4 class="b-w3ltxt text-capitalize mt-md-2">Study For Better Future</h4>
                                        <p class="w3ls_pvt-title my-3">onec consequat sapien ut leo cursus rhoncus. Nullam dui mi, vulputate ac metus semper Nullam dui mi.
                                            Vestibulum ante. Morbi at dui nisl.</p>
                                        <a href="#about" class="btn btn-banner my-3">Read More</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <div class="navigation">
                            <div>
                                <label for="slides_1"></label>
                                <label for="slides_2"></label>
                                <label for="slides_3"></label>
                            </div>
                        </div>
                    </div>
                    <!-- //banner slider-->
                </div>
                <div class="col-lg-5 col-md-8 px-lg-3 px-0">
                    <div class="banner-form-w3 ml-lg-5">
                        <div class="padding">
                            <!-- banner form -->

                                <h5 class="mb-3">Hızlı Giriş yap</h5>

                                <a href="{{ route('student.login') }}" class="btn btn-outline-danger btn-lg btn-block">Öğrenci girişi </a>
                                <a href="{{ route('teacher.login') }}" class="btn btn-outline-success btn-lg btn-block">Öğrentmen girişi </a>
                                <hr >
                                <h5>Hesabın yokmu? </h5>
                                <button onclick="showSwal();"  class="btn btn-primary btn-lg btn-block" style="margin-top: 20px;">Hesap oluştur >> </button>
                            <!-- //banner form -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- //banner -->

<!-- what we Serve -->
<section class="banner-bottom py-5" id="about">
    <div class="container py-lg-5">
        <h2 class="heading mb-sm-5 mb-4"> Build Your Career With Our Education System</h2>
        <div class="row bottom-grids">
            <div class="col-md-3 col-sm-6">
                <div class="three-grids-w3pvt-1 d-flex text-right">
                    <div class="text-effect-wthree midd-text-w3ls p-3 w-100">
                        <h5 class="text-capitalize text-bl font-weight-bold">Facillities</h5>
                        <p>Education</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 mt-sm-0 mt-4">
                <div class="three-grids-w3pvt-2 d-flex text-right">
                    <div class="text-effect-wthree midd-text-w3ls p-3 w-100">
                        <h5 class="text-capitalize text-bl font-weight-bold">Graduation</h5>
                        <p>Education</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 mt-md-0 mt-4">
                <div class="three-grids-w3pvt-3 d-flex text-right">
                    <div class="text-effect-wthree midd-text-w3ls p-3 w-100">
                        <h5 class="text-capitalize text-bl font-weight-bold">Learning</h5>
                        <p>Education</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 mt-md-0 mt-4">
                <div class="three-grids-w3pvt-4 d-flex text-right">
                    <div class="text-effect-wthree midd-text-w3ls p-3 w-100">
                        <h5 class="text-capitalize text-bl font-weight-bold">Success</h5>
                        <p>Education</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <p class="mt-4">Vivamus mattis ex massa. Morbi sed dui imperdiet, tinci dunt libero a, sagittis enim. Donec lobortis cursuser uti justo, at
                    eleifend eros init ultricies sed. Vivamus efficit ur urna vitae tempus aliquam. Proin aliquet dictum est molestie maximus sapien leo cursus rhoncus.</p>
            </div>
            <div class="col-lg-1 col-sm-4 col-5 ser-img">
                <img src="images/s1.png" class="mt-4" alt="">
                <img src="images/s2.png" class="mt-4" alt="">
            </div>
            <div class="col-lg-1 col-sm-4 col-5 ser-img">
                <img src="images/s3.png" class="mt-4" alt="">
                <img src="images/s5.png" class="mt-4" alt="">
            </div>
            <div class="col-lg-5">
                <p class="mt-4"> Vivamus efficitur ur vitae tempus aliquam. Proin aliquet dictum est, molestie maximus sapien maximus a.
                    Fuscer eleifend. convallis vitae enim eu egestas. Quisque placi rati enim nibh, vitae faucibus odio vestibulum pretium. Sed malesuada
                    libero sed commodo varius. </p>
            </div>
        </div>
    </div>
</section>
<!-- //what we Serve -->

<!-- services -->
<section class="services py-5" id="services">
    <div class="container">
        <h3 class="heading mb-5">Our Services</h3>
        <div class="row ml-sm-5">
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                <div class="our-services-wrapper mb-60">
                    <div class="services-inner">
                        <div class="our-services-img">
                            <img src="images/s1.png" alt="">
                        </div>
                        <div class="our-services-text">
                            <h4>Quality Education</h4>
                            <p>Proin varius pellentesque nunc tincidunt ante. Init id lacus</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                <div class="our-services-wrapper mb-60">
                    <div class="services-inner">
                        <div class="our-services-img">
                            <img src="images/s2.png" alt="">
                        </div>
                        <div class="our-services-text">
                            <h4>Experienced Staff</h4>
                            <p>Proin varius pellentesque nunc tincidunt ante. Init id lacus</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                <div class="our-services-wrapper mb-60">
                    <div class="services-inner">
                        <div class="our-services-img">
                            <img src="images/s3.png" alt="">
                        </div>
                        <div class="our-services-text">
                            <h4>Ac Classrooms</h4>
                            <p>Proin varius pellentesque nunc tincidunt ante. Init id lacus</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                <div class="our-services-wrapper mb-60">
                    <div class="services-inner">
                        <div class="our-services-img">
                            <img src="images/s4.png" alt="">
                        </div>
                        <div class="our-services-text">
                            <h4>Study Certificate</h4>
                            <p>Proin varius pellentesque nunc tincidunt ante. Init id lacus</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                <div class="our-services-wrapper mb-60">
                    <div class="services-inner">
                        <div class="our-services-img">
                            <img src="images/s5.png" alt="">
                        </div>
                        <div class="our-services-text">
                            <h4>Study Materials </h4>
                            <p>Proin varius pellentesque nunc tincidunt ante. Init id lacus</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                <div class="our-services-wrapper mb-60">
                    <div class="services-inner">
                        <div class="our-services-img">
                            <img src="images/s6.png" alt="">
                        </div>
                        <div class="our-services-text">
                            <h4>Library Books</h4>
                            <p>Proin varius pellentesque nunc tincidunt ante. Init id lacus</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- positioned image -->
        <div class="position-image">
            <img src="images/services.png" alt="" class="img-fluid">
        </div>
        <!-- //positioned image -->
    </div>
</section>
<!-- //services -->

<!-- stats section -->
<section class="section-stats" id="stats">
    <div class="py-5">
        <div class="container py-lg-5">
            <h3 class="heading mb-sm-5 mb-4">Our statistics</h3>
            <div class="row text-center">
                <div class="col-lg-3 col-6">
                    <div class="w3layouts_stats_left w3_counter_grid">
                        <div class="stats-icon">
                            <span class="fa fa-credit-card"></span>
                        </div>
                        <p class="counter">1568</p>
                        <p class="para-text-w3ls">Students Enrolled</p>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="w3layouts_stats_left w3_counter_grid2">
                        <div class="stats-icon">
                            <span class="fa fa-users"></span>
                        </div>
                        <p class="counter">1900</p>
                        <p class="para-text-w3ls">Professional Teachers</p>
                    </div>
                </div>
                <div class="col-lg-3 col-6 mt-lg-0 mt-4">
                    <div class="w3layouts_stats_left w3_counter_grid1">
                        <div class="stats-icon">
                            <span class="fa fa-dollar"></span>
                        </div>
                        <p class="counter">1422</p>
                        <p class="para-text-w3ls">Classes Conducted</p>
                    </div>
                </div>
                <div class="col-lg-3 col-6 mt-lg-0 mt-4">
                    <div class="w3layouts_stats_left w3_counter_grid1">
                        <div class="stats-icon">
                            <span class="fa fa-users"></span>
                        </div>
                        <p class="counter">400</p>
                        <p class="para-text-w3ls">Media Followers</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- //stats section -->

<!-- other services -->
<section class="other_services py-5" id="why">
    <div class="container py-lg-5 py-3">
        <h3 class="heading mb-sm-5 mb-4">Why Choose Us </h3>
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="grid">
                    <img src="images/choose1.jpg" alt="" class="img-fluid" />
                    <div class="info p-4">
                        <h4 class=""><img src="images/s1.png" class="img-fluid" alt=""> AC Class Rooms</h4>
                        <p class="mt-3">Onec consequat sapien amet leo cur sus rhoncus. Nullam dui mi Donec at nunc enim. Proin at iaculis tellus...</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mt-md-0 mt-4">
                <div class="grid">
                    <img src="images/choose2.jpg" alt="" class="img-fluid" />
                    <div class="info p-4">
                        <h4 class=""><img src="images/s3.png" class="img-fluid" alt=""> Quality Staff</h4>
                        <p class="mt-3">Onec consequat sapien amet leo cur sus rhoncus. Nullam dui mi Donec at nunc enim. Proin at iaculis tellus...</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mt-lg-0 mt-4">
                <div class="grid">
                    <img src="images/choose3.jpg" alt="" class="img-fluid" />
                    <div class="info p-4">
                        <h4 class=""><img src="images/s5.png" class="img-fluid" alt=""> Spacious Library </h4>
                        <p class="mt-3">Onec consequat sapien amet leo cur sus rhoncus. Nullam dui mi Donec at nunc enim. Proin at iaculis tellus...</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- //other services -->

<!-- testimonials -->
<section class="testimonials" id="testi">
    <div class="layer py-lg-5">
        <div class="container py-5">
            <h3 class="heading mb-5">What Parents Say About Us</h3>
            <div class="text-center">
                <div class="row">
                    <div class="col-md-6">
                        <div class="testi-info-text">
                            <h4>Best Education i have ever seen</h4>
                            <p>
                                <span class="fa fa-quote-left"></span> Vivamus magna justo, lacinia eget consectetur
                                sed,
                                convallis at tellus. Nulla
                                quis lorem ut libero malesuada feugiat.Nulla quis lorem ut libero malesuada
                                feugiat.
                                Donec rutrum.
                                <span class="fa ml-2 fa-quote-right"></span>
                            </p>
                        </div>
                        <div class="testi-pos">
                            <img src="images/ts1.jpg" alt="" class="img-fluid rounded-circle mb-3" />
                            <h4> John Elisa </h4>
                        </div>
                    </div>
                    <div class="col-md-6 mt-md-0 mt-5">
                        <div class="testi-info-text">
                            <h4>Best Education i have ever seen</h4>
                            <p>
                                <span class="fa fa-quote-left"></span> Vivamus magna justo, lacinia eget consectetur
                                sed,
                                convallis at tellus. Nulla
                                quis lorem ut libero malesuada feugiat.Nulla quis lorem ut libero malesuada
                                feugiat.
                                Donec rutrum.
                                <span class="fa ml-2 fa-quote-right"></span>
                            </p>
                        </div>
                        <div class="testi-pos">
                            <img src="images/ts2.jpg" alt="" class="img-fluid rounded-circle mb-3" />
                            <h4>Watson Mary</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- //testimonials -->

<!-- Team  -->
<section class="team pt-5" id="team">
    <div class="container py-lg-5">
        <h3 class="heading mb-sm-5 mb-4">Our Teachers</h3>
        <div class="row">
            <div class="team-grid col-md-3 col-sm-6 mb-5">
                <img src="images/team1.jpg" class="" alt="" />
                <div class="team-info text-center">
                    <h3 class="e">Tyson Amery</h3>
                    <span class="">Maths Teacher</span>
                </div>
            </div>
            <div class="team-grid col-md-3 col-sm-6 mb-5">
                <img src="images/team2.jpg" class="" alt="" />
                <div class="team-info text-center">
                    <h3 class="">Stas Melnik</h3>
                    <span class="">English Teacher</span>
                </div>
            </div>
            <div class="team-grid col-md-3 col-sm-6 mb-5">
                <img src="images/team3.jpg" class="" alt="" />
                <div class="team-info text-center">
                    <h3 class="">Lise Laurie</h3>
                    <span class="">Physics Teacher</span>
                </div>
            </div>
            <div class="team-grid col-md-3 col-sm-6 mb-5">
                <img src="images/team4.jpg" class="" alt="" />
                <div class="team-info text-center">
                    <h3 class="">Effie Eleanora</h3>
                    <span class="">History Teacher</span>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- //Team -->

<!-- subscribe -->
<section class="subscribe" id="subscribe">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-5 d-flex subscribe-left p-sm-5 py-4">
                <div class="image mr-3">
                    <img src="images/mail.png" alt="" class="img-fluid">
                </div>
                <div class="text">
                    <h3>Subscribe To Our Newsletter</h3>
                </div>
            </div>
            <div class="col-lg-7 subscribe-right p-sm-5 py-3">
                <form action="#" method="post">
                    <input type="email" name="email" placeholder="Enter your email here" required="">
                    <button class="btn1"><span class="fa fa-paper-plane" aria-hidden="true"></span></button>
                </form>
                <p>we never share your email with anyone else</p>
            </div>
        </div>
    </div>
</section>
<!-- //subscribe -->

<!-- footer -->
<footer>
    <div class="footer-layer py-sm-5 pt-5 pb-3">
        <div class="container py-md-3">
            <div class="footer-grid_section text-center">
                <div class="footer-title mb-3">
                    <a href="#"><img src="images/s2.png" alt=""> Child Learn</a>
                </div>
                <div class="footer-text">
                    <p>Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Nulla quis lorem ipnut libero malesuada feugiat.
                        Lorem ipsum dolor sit amet, consectetur elit.</p>
                </div>
                <ul class="social_section_1info">
                    <li class="mb-2 facebook"><a href="#"><span class="fa fa-facebook"></span></a></li>
                    <li class="mb-2 twitter"><a href="#"><span class="fa fa-twitter"></span></a></li>
                    <li class="google"><a href="#"><span class="fa fa-google-plus"></span></a></li>
                    <li class="linkedin"><a href="#"><span class="fa fa-linkedin"></span></a></li>
                    <li class="pinterest"><a href="#"><span class="fa fa-pinterest"></span></a></li>
                    <li class="vimeo"><a href="#"><span class="fa fa-vimeo"></span></a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
<!-- //footer -->

<!-- copyright -->
<section class="copyright">
    <div class="container py-4">
        <div class="row bottom">
            <ul class="col-lg-6 links p-0">
                <li><a href="#why" class="">Why Choose Us</a></li>
                <li><a href="#services" class="">Services </a></li>
                <li><a href="#team" class="">Teachers </a></li>
                <li><a href="#testi" class="">Testimonials </a></li>
            </ul>
            <div class="col-lg-6 copy-right p-0">
                <p class="">© 2019 Child Learn. All rights reserved | Design by
                    <a href="http://w3layouts.com"> W3layouts.</a>
                </p>
            </div>
        </div>
    </div>
</section>
<!-- //copyright -->

<!-- move top -->
<div class="move-top text-right">
    <a href="#home" class="move-top">
        <span class="fa fa-angle-up  mb-3" aria-hidden="true"></span>
    </a>
</div>
<!-- move top -->

<script src="{{asset('assets/js/plugins/sweetalert2.js')}}"></script>
<!--<script src="{{asset('assets/demo/demo.js')}}"></script>-->

<script>
    function showSwal() {
        swal({
            title: 'Hemen Üye Ol!',
            buttonsStyling: false,
            showConfirmButton: false,
            focus: false,
            html:
                '<p><a href="{{ route("student.register") }}" class="btn btn-link btn-lg">Öğrenci hesabı oluştur > </a></p><br>' +
                '<p><a href="{{ route("teacher.register") }}" class="btn btn-link btn-lg">Öğretmen hesabı oluştur > </a></p>'
        })
    }
</script>

</body>
</html>