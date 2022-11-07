<!-- fotter -->

<div class="text-green-ligh-bg mt-5" style="width: 195px;height: 5px; position: relative;z-index: 4;bottom: -3px;">
</div>
<footer class="footer section gray-bg pb-0 pb-md-5"
    style="background-color: #f4fff9; border-bottom: 7px solid #20AA9E; padding-top: 5rem;">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-lg-5 mr-auto pe-5">
                <div class="widget mb-5 mb-lg-0">
                    <div class="logo mb-2">
                        <img src="{{ URL::asset('img/dashboard/system/pc-loader.png') }}" alt=""
                            class="img-fluid">
                    </div>
                    <p class=" text-petroleum-light">Tempora dolorem voluptatum nam vero assumenda voluptate,
                        facilis
                        ad eos
                        obcaecati tenetur
                        veritatis eveniet distinctio possimus.</p>

                    <div class="text-petroleum-light">
                        <a class="text-petroleum-light me-2 fs-5" href="https://www.facebook.com/dramrsaeed"><i
                                class="bi bi-facebook"></i></a>
                        <a class="text-petroleum-light me-2 fs-5"
                            href="https://www.youtube.com/channel/UCIYkjI4i0Ezg54wJA2WnBdg"><i
                                class="bi bi-youtube"></i></a>
                        <a class="text-petroleum-light fs-5" href=""><i class="bi bi-instagram"></i></a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-lg-4">
                <div class="widget mb-5 mb-lg-0 pe-2">
                    <h4 class="text-capitalize mb-3 text-green-ligh">Branches</h4>
                    <div class="text-green-ligh-bg mb-4" style="width: 35px; height: 5px;"></div>

                    <div class="mb-3">
                        <div class="text-petroleum-light d-flex align-items-center">
                            <span class="h6 mb-0">Tahrer Branch</span>
                        </div>
                        <h6 class="mt-2 text-petroleum"><i class="fas fa-map-marker-alt me-2"></i> 129 Tahrer st, Next
                            to Russian Cultural Center
                            Giza, Egypt</h6>
                    </div>

                    <div class="mb-3">
                        <div class="text-petroleum-light d-flex align-items-center">
                            <span class="h6 mb-0">Nasr City Branch</span>
                        </div>
                        <h6 class="mt-2 text-petroleum"><i class="fas fa-map-marker-alt me-2"></i> 7 Ammrat El-Shbab st
                            in front of Panda Market,
                            Cairo, Egypt</h6>
                    </div>

                    <div class="">
                        <div class="text-petroleum-light d-flex align-items-center">
                            <span class="h6 mb-0">Alexandria Branch</span>
                        </div>
                        <h6 class="mt-2 text-petroleum"><i class="fas fa-map-marker-alt me-2"></i> 10 Mokhtar Abd
                            El-Haleem st,
                            Saba Pasha, Alexandria, Egypt</h6>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-lg-3">
                <div class=" widget widget-contact mb-5 mb-lg-0">
                    <h4 class="text-capitalize mb-3 text-green-ligh">Get in Touch</h4>
                    <div class="text-green-ligh-bg mb-4" style="width: 35px; height: 5px;"></div>

                    <div class="mb-3">
                        <div class="text-petroleum-light d-flex align-items-center">
                            <i class="fas fa-headset me-2"></i>
                            <span class="mb-0">Support Available for 24/7</span>
                        </div>
                        <h6 class="mt-2 text-petroleum"><a class="text-petroleum"
                                href="tel:+23-345-67890">Support@dramrsaeed.com</a></h6>
                    </div>

                    <div class="mb-3">
                        <div class="text-petroleum-light d-flex align-items-center">
                            <i class="fas fa-envelope me-2"></i>
                            <span class=" mb-0">Mon to Fri : 08:30 - 18:00</span>
                        </div>
                        <h6 class="mt-2 text-petroleum"><a class="text-petroleum"
                                href="tel:+0201234500271">+02-0123-4500-271</a></h6>
                        <h6 class="mt-2 text-petroleum"><a class="text-petroleum"
                                href="tel:+0201551776699">+02-0155-1776-699</a></h6>
                    </div>

                    <div class="">
                        <a class="text-s" href="{{ route('patient_auth.appointment') }}"><button type="button"
                                class="btn text-green-ligh-bg-grad b-r-xs text-white">Book Now</button></a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</footer>
<div class="container-fluid text-green-ligh-bg">
    <div class="container">
        <div class="row pt-2 pb-3">
            <div class="col-lg-6 text-lg-start text-center copyright text-center my-auto text-white text-xs">
                <span>Copyright © 2022 Pain Cure Dr. Amr Saeed, Developed by OG agency</span>
            </div>
            <div class="col-lg-6">
                <nav class="footer-links text-lg-right text-center pt-2 pt-lg-0">
                    <a class="text-green-light-300 me-2" href="#intro" class="scrollto">Home</a>
                    <a class="text-green-light-300 me-2" href="{{ route('patient_auth.about') }}">About</a>
                    <a class="text-green-light-300 me-2" href="{{ route('patient_auth.contact') }}">Contact</a>
                    <a class="text-green-light-300 me-2" href="#">Privacy Policy</a>
                    <a class="text-green-light-300" href="#">Terms of Use</a>
                </nav>
            </div>
        </div>
    </div>
</div>
