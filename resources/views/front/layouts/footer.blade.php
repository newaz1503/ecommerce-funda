<footer id="footer">
    <div class="container w-100">
        <div class="row pt-3 justify-content-center">
            <div class="col-12 col-md-6 col-lg-4">
                <h3 class="footer_title">{{ $site_setting->website_name ?? 'MyShop' }}</h3>
                <div class="contact_info">
                    <ul>
                        <li class="mb-2">
                            <div class="contact_info d-flex gap-3">
                                <div class="contact_icon">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                                <div class="contact_text">
                                    <p>{{ $site_setting->address ?? '' }}</p>
                                </div>
                            </div>
                        </li>
                        <li class="mb-2">
                            <div class="contact_info d-flex gap-3">
                                <div class="contact_icon">
                                    <i class="fas fa-phone-alt"></i>
                                </div>
                                <div class="contact_text">
                                    <p>{{ $site_setting->phone1 ?? 'MyShop' }}</p>
                                </div>
                            </div>
                        </li>
                        <li class="mb-2">
                            <div class="contact_info d-flex gap-3">
                                <div class="contact_icon">
                                    <i class="far fa-envelope"></i>
                                </div>
                                <div class="contact_text">
                                    <p>{{ $site_setting->email1 ?? 'MyShop' }}</p>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3">
                <div class="ps-4">
                    <h3 class="footer_title">About</h3>
                    <div class="about_info">
                        <ul>
                            <li class="mb-2"><a href="#">About Us</a></li>
                            <li class="mb-2"><a href="#">Privacy Policy</a></li>
                            <li class="mb-2"><a href="#">Terms & Conditions</a></li>
                            <li class="mb-2"><a href="#">Cookie Policy</a></li>
                        </ul>
                    </div>
                </div>

            </div>
            <div class="col-12 col-md-6 col-lg-2">
                <h3 class="footer_title">Help</h3>
                <div class="help_info">
                    <ul>
                        <li class="mb-2"><a href="#">Shipping</a></li>
                        <li class="mb-2"><a href="#">Payment</a></li>
                        <li class="mb-2"><a href="#">Return And Replacement</a></li>
                        <li class="mb-2"><a href="#">FAQ</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-3">
                <div class="ps-4">
                    <h3 class="footer_title">Social</h3>
                    <div class="social_info">
                        <ul class="d-flex gap-4">
                            @if($site_setting->facebook)
                                <li class="mb-2"><a href="{{$site_setting->facebook ?? '' }}" target="blank"><i class="fab fa-facebook"></i></a></li>
                            @endif
                            @if($site_setting->twitter)
                                <li class="mb-2"><a href="{{$site_setting->twitter ?? '' }}" target="blank"><i class="fab fa-twitter"></i></a></li>
                            @endif
                            <li class="mb-2"><a href="#"><i class="fab fa-youtube"></i></a></li>

                            <li class="mb-2"><a href="#"><i class="fab fa-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>
</footer>
