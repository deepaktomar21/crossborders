<!DOCTYPE html>
<html>

<head>
    <title>JoSafe UK-Ghana Shopper</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="icon" type="image/png" sizes="32x32"
        href="{{ asset('website/assets/images/icons/image_copy_2-removebg-preview.png') }}">
    <link rel="icon" type="image/png" sizes="16x16"
        href="{{ asset('website/assets/images/icons/image_copy_2-removebg-preview.png') }}">
 
    <link href='https://fonts.googleapis.com/css?family=Rock Salt' rel='stylesheet'>
    <meta name="apple-mobile-web-app-title" content="">
    <meta name="application-name" content="">
    <meta name="msapplication-TileColor" content="#cc9966">
    <meta name="msapplication-config" content="{{ asset('website/assets/images/icons/browserconfig.xml') }}">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/4.1.5/css/flag-icon.min.css">

    <!-- Plugins CSS File -->
    <link rel="stylesheet" href="{{ asset('website/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('website/assets/css/plugins/owl-carousel/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('website/assets/css/plugins/magnific-popup/magnific-popup.css') }}">

    <!-- Main CSS File -->
    <link rel="stylesheet" href="{{ asset('website/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('website/assets/css/skins/skin-demo-22.css') }}">
    <link rel="stylesheet" href="{{ asset('website/assets/css/demos/demo-22.css') }}">
</head>


<body>
    <div class="page-wrapper">
        {{-- header --}}
        @include('website.layouts.header')
        <main class="main">
            @yield('content')
        </main>
        @include('website.layouts.footer')
        <button id="scroll-top" title="Back to Top"><i class="icon-arrow-up"></i></button>
        <div class="mobile-menu-overlay"></div>
        <!-- End .mobil-menu-overlay -->
        <style>
            .mobile-menu-container {
                background-color: black;
            }

            .mobile-menu a {
                color: rgb(255, 176, 6) !important;
                /* Keeps text readable */
            }

            .mobile-menu a:hover {
                color: white !important;
                /* Changes text color on hover */
            }
        </style>
        <div class="mobile-menu-container mobile-menu-light">
            <div class="mobile-menu-wrapper">
                <span class="mobile-menu-close"><i class="icon-close"></i></span>



                <nav class="mobile-nav">

                    <ul class="mobile-menu">
                        <li>
                            <a href="{{ route('index') }}" style="color: rgb(255, 176, 6);">Home</a>
                        </li>
                        <li>
                            <a href="#" style="color: rgb(255, 176, 6);">Browse Products</a>
                            <ul style="display: none;">
                                <li><a href="/#service">Ghana</a></li>
                                            <li><a href="/#service">UK</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{ route('trackOrder') }}" style="color: rgb(255, 176, 6);">Track Order</a>
                        </li>

                        <li>
                            <a href="{{ route('OrderForm') }}" style="color: rgb(255, 176, 6);">Place Order</a>


                        </li>
                        <li>
                            <a title="Pricing" style="color: rgb(255, 176, 6);" href="/#pricing">Pricing</a>
                        </li>
                        <li><a href="{{ route('login') }}" style="color: rgb(255, 176, 6);"><i
                                    class="icon-user"></i>Login </a></li>
                    </ul>



                </nav><!-- End .mobile-nav -->

                <div class="social-icons">
                    <a href="#" class="social-icon" target="_blank" title="Facebook"><i
                            class="icon-facebook-f"></i></a>
                    <a href="#" class="social-icon" target="_blank" title="Twitter"><i
                            class="icon-twitter"></i></a>
                    <a href="#" class="social-icon" target="_blank" title="Instagram"><i
                            class="icon-instagram"></i></a>
                    <a href="#" class="social-icon" target="_blank" title="Youtube"><i
                            class="icon-youtube"></i></a>
                </div><!-- End .social-icons -->
            </div><!-- End .mobile-menu-wrapper -->
        </div><!-- End .mobile-menu-wrapper -->
    </div><!-- End .mobile-menu-container -->
    </div>

    <!-- Sign in / Register Modal -->
    <div class="modal fade" id="signin-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="icon-close"></i></span>
                    </button>

                    <div class="form-box">
                        <div class="form-tab">
                            <ul class="nav nav-pills nav-fill" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="signin-tab" data-toggle="tab" href="#signin"
                                        role="tab" aria-controls="signin" aria-selected="true">Sign In</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="register-tab" data-toggle="tab" href="#register"
                                        role="tab" aria-controls="register" aria-selected="false">Register</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="tab-content-5">
                                <div class="tab-pane fade show active" id="signin" role="tabpanel"
                                    aria-labelledby="signin-tab">
                                    <form action="#">
                                        <div class="form-group">
                                            <label for="singin-email">Username or email address *</label>
                                            <input type="text" class="form-control" id="singin-email"
                                                name="singin-email" required>
                                        </div><!-- End .form-group -->

                                        <div class="form-group">
                                            <label for="singin-password">Password *</label>
                                            <input type="password" class="form-control" id="singin-password"
                                                name="singin-password" required>
                                        </div><!-- End .form-group -->

                                        <div class="form-footer">
                                            <button type="submit" class="btn btn-outline-primary-2">
                                                <span>LOG IN</span>
                                                <i class="icon-long-arrow-right"></i>
                                            </button>

                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input"
                                                    id="signin-remember">
                                                <label class="custom-control-label" for="signin-remember">Remember
                                                    Me</label>
                                            </div><!-- End .custom-checkbox -->

                                            <a href="#" class="forgot-link">Forgot Your Password?</a>
                                        </div><!-- End .form-footer -->
                                    </form>

                                </div><!-- .End .tab-pane -->
                                <div class="tab-pane fade" id="register" role="tabpanel"
                                    aria-labelledby="register-tab">
                                    <form action="#">
                                        <div class="form-group">
                                            <label for="register-email">Your email address *</label>
                                            <input type="email" class="form-control" id="register-email"
                                                name="register-email" required>
                                        </div><!-- End .form-group -->

                                        <div class="form-group">
                                            <label for="register-password">Password *</label>
                                            <input type="password" class="form-control" id="register-password"
                                                name="register-password" required>
                                        </div><!-- End .form-group -->

                                        <div class="form-footer">
                                            <button type="submit" class="btn btn-outline-primary-2">
                                                <span>SIGN UP</span>
                                                <i class="icon-long-arrow-right"></i>
                                            </button>

                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input"
                                                    id="register-policy" required>
                                                <label class="custom-control-label" for="register-policy">I agree to
                                                    the
                                                    <a href="#">privacy policy</a> *</label>
                                            </div><!-- End .custom-checkbox -->
                                        </div><!-- End .form-footer -->
                                    </form>

                                </div><!-- .End .tab-pane -->
                            </div><!-- End .tab-content -->
                        </div><!-- End .form-tab -->
                    </div><!-- End .form-box -->
                </div><!-- End .modal-body -->
            </div><!-- End .modal-content -->
        </div><!-- End .modal-dialog -->
    </div><!-- End .modal -->
    <style>
        /* Default font size for large screens */
        .banner-title {

            font-size: 22px;
            word-wrap: break-word;
        }

        .custom-control-label {
            font-size: 18px;
        }

        /* Medium screens (Tablets) */
        @media (max-width: 992px) {
            .banner-title {
                font-size: 20px;
            }

            .custom-control-label {
                font-size: 16px;
            }
        }

        /* Small screens (Mobile) */
        @media (max-width: 768px) {
            .banner-title {
                font-size: 18px;
                text-align: center;
            }

            .custom-control-label {
                font-size: 14px;
            }
        }

        /* Extra small screens */
        @media (max-width: 576px) {
            .banner-title {
                font-size: 16px;
            }

            .custom-control-label {
                font-size: 13px;
            }
        }
    </style>

    <div class="container newsletter-popup-container mfp-hide" id="newsletter-popup-form">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="bg-dark row no-gutters newsletter-popup-content align-items-center">
                    <!-- Text Section -->
                    <div class="col-lg-7 col-md-12 text-center text-md-left p-3">
                        <p class="banner-title text-white font-weight-bold">
                            <span>
                                <light>Order and Ship Products Seamlessly</light>
                                <br> Across Ghana and UK
                            </span>
                        </p>

                        <div
                            class="custom-control custom-checkbox d-flex justify-content-center justify-content-md-start">
                            <input type="checkbox" class="custom-control-input" id="register-policy-2">
                            <label class="custom-control-label text-white" for="register-policy-2">
                                Do not show this popup again
                            </label>
                        </div>
                    </div>

                    <!-- Image Section -->
                    <div class="col-lg-5 col-md-12 text-center">
                        <img src="{{ asset('website/assets/images/popup/newsletter/img-1.jpg') }}"
                            class="newsletter-img img-fluid" alt="newsletter">
                    </div>
                </div>
            </div>
        </div>
    </div>




    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let popup = document.getElementById("newsletter-popup-form");
            let closeBtn = document.getElementById("popup-close-btn");
            let checkbox = document.getElementById("register-policy-2");

            // Check if popup should be hidden
            if (localStorage.getItem("hideNewsletterPopup") !== "true") {
                popup.style.display = "block"; // Show the popup
            }

            // Close popup when clicking close button
            closeBtn.addEventListener("click", function() {
                popup.style.display = "none";
            });

            // Handle checkbox click
            checkbox.addEventListener("change", function() {
                if (this.checked) {
                    localStorage.setItem("hideNewsletterPopup", "true");
                    popup.style.display = "none";
                }
            });
        });
    </script>


    <!-- Plugins JS File -->
    <script src="{{ asset('website/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('website/assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('website/assets/js/jquery.hoverIntent.min.js') }}"></script>
    <script src="{{ asset('website/assets/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('website/assets/js/superfish.min.js') }}"></script>
    <script src="{{ asset('website/assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('website/assets/js/bootstrap-input-spinner.js') }}"></script>
    <script src="{{ asset('website/assets/js/jquery.magnific-popup.min.js') }}"></script>
    <!-- Main JS File -->
    <script src="{{ asset('website/assets/js/main.js') }}"></script>

</body>

<!-- molla/index-22.html  22 Nov 2019 10:02:10 GMT -->

</html>
