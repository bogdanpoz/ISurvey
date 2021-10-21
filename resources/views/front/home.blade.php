<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="{{ asset('landing/img/delta-fav.png') }}" type="image/gif" sizes="16x16">
    <title>iNextSurvey</title>
    <link rel="stylesheet" href="{{ asset('landing/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('landing/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('landing/css/jquery.mCustomScrollbar.min.css') }}">
    <link rel="stylesheet" href="{{ asset('landing/boxicons/boxicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('landing/css/style.css') }}">
    <script src="https://unpkg.com/@lottiefiles/lottie-player@0.4.0/dist/tgs-player.js"></script>
    <link rel="stylesheet" href="{{ asset('landing/js/animation.js') }}">

</head>

<body>
    <nav id="sidebar">
        <div class="sidebar-header">
            <h5 class="mb-0">iNextSurvey</h5>
        </div>

        <ul class="list-unstyled components">
            <li class="nav-item">
                <a href="#">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link px-3" href="#service">Features</a>
            </li>
            <li class="nav-item">
                <a class="nav-link px-3" href="#pricing">Pricing</a>
            </li>
        </ul>
        <div class="px-3 pb-3 w-250">
            <p><a href="#">Terms & Conditions</a></p>
            <p><a href="#">Privacy Policy</a></p>
            <p><a href="#">FAQ</a></p>
        </div>
        <div class="d-flex px-3 w-250">
            <a href="{{ route('login') }}" class="btn btn-primary btn-sm">Sign In</a>
            <a href="{{ route('register') }}" class="btn btn-outline-primary btn-sm ml-3">Register</a>
        </div>
    </nav>
    <!--Navbar-->
    <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-white">
        <div class="container">
            <a class="navbar-brand" href="#">
            <img src="{{ asset('landing/img/inextlogo.png') }}" class="logo img-fluid">


            </a>
            <button type="button" id="sidebarCollapse" class="btn d-lg-none p-0 bg-transparent">
                <i class="bx bx-menu-alt-left bx-md"></i>
            </button>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item ">
                        <a class="nav-link px-3" href="/">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-3" href="#service">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-3" href="#pricing">Pricing</a>
                    </li>
                </ul>
                <div>
                    <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
                    <a href="{{ route('register') }}" class="btn btn-outline-primary ml-2">Register</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="pb-3 pt-md-5">
        <div class="container pb-2 pt-md-5 d-flex">
            <div class="row py-5 justify-content-between align-items-center">
                <div class="col-lg-6 col-md-7 py-5">

                    <h1 class="font-weight-bold display-5 mb-4 mr-auto">Building online surveys has never been easier.</h1>
                    <p class="lead mb-5">Create simple but proffesional surveys easily within a few minutes using inextSurvey.</p>
                    <a href="{{ route('register') }}" class="btn btn-primary btn-size">Get Started Now</a>
                </div>
                <lottie-player src="https://assets4.lottiefiles.com/packages/lf20_fe19o5z0.json" background="transparent" speed="1" style="width: 500px; height: 500px;" loop autoplay></lottie-player>
            </div>
        </div>
    </div>

    <section class="section bg-grey feature-sec-1" id="service">
        <div class="container">
            <div class="row">
            <div class="col-lg-5 col-md-12 col-sm-12 align-self-center order-1 order-md-2 mt-5">
                    <lottie-player src="https://assets3.lottiefiles.com/private_files/lf30_xg0ti7bw.json" background="transparent" speed="1" style="width: 400px; height: 400px;" loop autoplay></lottie-player>
                    <!-- <img src="{{ asset('landing/img/blue-1.png') }}" class="img-fluid d-block mx-auto"> -->
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 align-self-center order-2 order-md-2">
                    <h2 class="section-title mb-4">Create a fully branded experience</h2>
                    <p>Our services provides a fully branded experience when it comes to the survey development process. No matter if you are a single person or company looking for a readily available survey creator, inextsurey cover both parts.</p>
                </div>
                <div class="col-lg-1"></div>
                
            </div>
        </div>
    </section>

    <section class="section feature-sec-1">
        <div class="container">
            <div class="row">
                
                <div class="col-lg-1"></div>
                <div class="col-lg-6 col-md-12 col-sm-12 align-self-center">
                    <h2 class="section-title mb-4">10 question types</h2>
                    <p>Using 10 different uniquely customizable question types you will be able to create surveys to fit any of your needs. Our tools makes sure that every survey you create can be vastly different from eachother.</p>

                </div>
                <div class="col-lg-5 col-md-12 col-sm-12 align-self-center mt-5 ">
                    <lottie-player src="https://assets2.lottiefiles.com/private_files/lf30_7gsvftum.json" background="transparent" speed="1" style="width: 400px; height: 400px;" loop autoplay></lottie-player>
                    <!--  <img src="{{ asset('landing/img/make-survey.svg') }}" class="img-fluid d-block mx-auto"> -->

                </div>
            </div>
        </div>
    </section>

    <section class="section bg-grey feature-sec-1" id="service">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12 align-self-center order-2 order-md-2">
                    <h2 class="section-title mb-4">Share your surveys</h2>
                    <p>All of your surveys can be shared to anyone you want after creating them using survey URLS. The option of embeding your survey URL within HTML is also provided if needed.</p>
                </div>
                <div class="col-lg-1"></div>
                <div class="col-lg-5 col-md-12 col-sm-12 align-self-center order-1 order-md-1">
                    <lottie-player src="https://assets9.lottiefiles.com/private_files/lf30_viesrx12.json" background="transparent" speed="1" style="width: 300px; height: 300px;" loop autoplay></lottie-player>
                    <!-- <img src="{{ asset('landing/img/blue-1.png') }}" class="img-fluid d-block mx-auto"> -->
                </div>
            </div>
        </div>
    </section>

    <section class="section feature-sec-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12 align-self-center mb-5">
                    <h2 class="section-title mb-4">Analyze the responses</h2>
                    <p>Need help with any of your projects?. Collect responses from your surveys and analyze the data to help you or your bussiness with your reasearch.</p>
                </div>
                <div class="col-lg-5 col-md-12 col-sm-12 align-self-center">
                    <lottie-player src="https://assets7.lottiefiles.com/private_files/lf30_lnvgs1oh.json" background="transparent" speed="1" style="width: 400px; height: 400px;" loop autoplay></lottie-player>
                    <!-- <img src="{{ asset('landing/img/site-stats.gif') }}" class="img-fluid d-block mx-auto"> -->
                </div>
                <div class="col-lg-1"></div>

                <div class="col-lg-6 col-md-12 col-sm-12 align-self-center">
                    <h2 class="section-title mb-4">Analyze the responses</h2>
                    <p>Need help with any of your projects?. Collect responses from your surveys and analyze the data to help you or your bussiness with your reasearch.</p>
                </div>

            </div>
        </div>
    </section>

    <!--Price section-->
    <section class="section bg-grey" id="pricing">
        <div class="text-center">
            <h2 class="mb-4">Pricing Plans</h2>
            <p class="px-2">inextSurvey deliver multiple pricing plans to fit any of your demands.</p>
        </div>
        <div class="container">
            <div class="row">
                @foreach($plans as $plan)
                <div class="col-lg-4 col-md-12 col-12 mt-5">
                    <div class="pricing-item">
                        <div class="pricing-header">
                            <h3 class="pricing-title">{{ $plan->title }}</h3>
                        </div>
                        <div class="pricing-body">
                            <div class="number">
                                <span>{{ $loop->index + 1}}</span>
                            </div>
                            <div class="price-wrapper">
                                <span class="currency">$</span>
                                <span class="price">{{ $plan->price }}</span>
                                <span class="period">/{{ ucfirst($plan->interval) }}</span>
                            </div>
                            <ul class="list">
                                @foreach (explode("\n", str_replace("\r", "", $plan->description)) as $feature)
                                <li class="active">{{ $feature }}</li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="pricing-footer">
                            <a href="{{ route('register') }}" class="btn btn-primary">Select Plan</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!--bottom banner-->
    <section class="section parallax">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="info">
                        <h3>Start developing surveys with our tools<br>by making your own account</h3>
                        <a class="btn btn-secondary mt-3" href="{{ route('register') }}">CREATE AN ACCOUNT</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--footer-->
    <footer class="footer">
        <div class="footer-middle">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-lg-3">
                        <div class="widget widget-about">
                            <h3>iNextSurvey</h3>
                            <p>For more information, contact or news please visit our social media pages down below.</p>

                            <div class="social-icons">
                                <a href="#" class="social-icon" target="_blank" title="Facebook"><i class="bx bxl-facebook"></i></a>
                                <a href="#" class="social-icon" target="_blank" title="Twitter"><i class="bx bxl-twitter"></i></a>
                                <a href="#" class="social-icon" target="_blank" title="Instagram"><i class="bx bxl-instagram"></i></a>
                                <a href="#" class="social-icon" target="_blank" title="Youtube"><i class="bx bxl-youtube"></i></a>

                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-3">
                        <div class="widget">
                            <h6 class="widget-title">Get to know us</h6>
                            <ul class="widget-list">
                                <li><a href="#">About iNextSurvey</a></li>
                                <li><a href="#">Our Blogs</a></li>
                                <li><a href="#">Services</a></li>
                                <li><a href="#">Sitemap</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-3">
                        <div class="widget">
                            <h6 class="widget-title">Help</h6>
                            <ul class="widget-list">
                                <li><a href="#">Pricing</a></li>
                                <li><a href="#">FAQ</a></li>
                                <li><a href="#">Contact us</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-3">
                        <div class="widget">
                            <h6 class="widget-title">Policy</h6>
                            <ul class="widget-list">
                                <li><a href="#">Terms and conditions</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                                <li><a href="#">GDPR Compliance</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <div class="container">
                <p class="footer-copyright">Copyright © 2021 iNextSurvey. All Rights Reserved.</p>
            </div>
        </div>
    </footer>

    <script src="{{ asset('landing/js/jquery-3.6.0.slim.min.js') }}"></script>
    <script src="{{ asset('landing/js/popper.min.js') }}"></script>
    <script src="{{ asset('landing/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('landing/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <script src="{{ asset('landing/js/custom.js') }}"></script>
</body>

</html>