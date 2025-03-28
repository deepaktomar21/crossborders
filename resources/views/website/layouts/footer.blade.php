<footer class="footer footer-dark">
    <div class="footer-middle">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-lg-3">
                    <div class="widget widget-about">
                        <img src="{{ asset('website/assets/images/demos/demo-22/image-removebg-new.png') }}"
                            class="footer-logo" alt="Footer Logo" width="160" height="25">
                        <h4 class="widget-title">JoSafe UK-Ghana Shopper</h4>
                        <p>Order and Ship Products Seamlessly Across Ghana and UK </p>
                        <p>Express Delivery of all your items and shopping
                            Trade & Personal</p>
                        {{-- <div class="social-icons">
                            <a href="#" class="social-icon" title="Facebook" target="_blank"><i
                                    class="icon-facebook-f"></i></a>
                            <a href="#" class="social-icon" title="Twitter" target="_blank"><i
                                    class="icon-twitter"></i></a>
                            <a href="#" class="social-icon" title="Instagram" target="_blank"><i
                                    class="icon-instagram"></i></a>
                            <a href="#" class="social-icon" title="Youtube" target="_blank"><i
                                    class="icon-youtube"></i></a>
                            <a href="#" class="social-icon" title="Pinterest" target="_blank"><i
                                    class="icon-pinterest"></i></a>
                        </div><!-- End .soial-icons --> --}}
                    </div><!-- End .widget about-widget -->
                </div><!-- End .col-sm-6 col-lg-3 -->

                <div class="col-sm-6 col-lg-3">
                    <div class="widget">
                        <h4 class="widget-title">Useful Links</h4><!-- End .widget-title -->
                        <ul class="widget-list">
                            <li><a href="{{route('faq')}}">FAQ</a></li>
                            <li><a href="">Contact us</a></li>
                            <li><a href="{{ route('login') }}">Log in</a></li>
                        </ul><!-- End .widget-list -->
                    </div><!-- End .widget -->
                </div><!-- End .col-sm-6 col-lg-3 -->

                <div class="col-sm-6 col-lg-3">
                    <div class="widget">
                        <h4 class="widget-title">Customer Service</h4><!-- End .widget-title -->
                        <ul class="widget-list">
                            <li><a href="#">Payment Methods</a></li>
                            <li><a href="#">Money-back guarantee!</a></li>
                            <li><a href="#">Returns</a></li>
                            
                            <li><a href="#">Terms and conditions</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                        </ul><!-- End .widget-list -->
                    </div><!-- End .widget -->
                </div><!-- End .col-sm-6 col-lg-3 -->

                <div class="col-sm-6 col-lg-3">
                    <div class="widget">
                        <h4 class="widget-title">My Account</h4><!-- End .widget-title -->
                        <ul class="widget-list">
                            <li><a href="{{ route('register') }}">Sign Up</a></li>
                           
                            <li><a href="{{ route('trackOrder') }}">Track My Order</a></li>
                            <li><a href="#">Help</a></li>
                        </ul><!-- End .widget-list -->
                    </div><!-- End .widget -->
                </div><!-- End .col-sm-6 col-lg-3 -->
            </div><!-- End .row -->
        </div><!-- End .container -->
    </div><!-- End .footer-middle -->

    <div class="footer-bottom">
        <div class="container">
            <p class="footer-copyright">Copyright © All Rights Reserved.</p>
            <!-- End .footer-copyright -->
            {{-- <figure class="footer-payments">
                <img src="{{ asset('website/assets/images/payments.png') }}" alt="Payment methods" width="272"
                    height="20">
            </figure><!-- End .footer-payments --> --}}
        </div><!-- End .container -->
    </div><!-- End .footer-bottom -->
</footer>
