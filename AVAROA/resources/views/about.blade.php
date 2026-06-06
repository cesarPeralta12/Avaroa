@extends('master')
@section('title')
{{ __('About US') }}
@endsection
@section('content')
<div class="pages-hero">
    <div class="container">
        <div class="pages-title">
            <h1>About Us</h1>
            <p>About Industra</p>
        </div>
    </div>
</div>
<section>
    <!-- ABOUT SECTION START -->
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-lg-6">
                <div class="about-info-layer">
                    <h5 class="subtitle">About Industra</h5>
                    <h2>Reliable Engineering Takes Many Forms.</h2>
                    <p><strong>Industra has met the demands of a growing world. The Indusy farmer has a
                            tremendous.</strong></p>
                    <p>We are a company dedicated to giving our customers back the time they deserve to enjoy the
                        things they love. We put the extra in your ordinary,
                        restoring balance to your life by taking care of your home.</p>
                    <div class="order-list d-flex">
                        <ul class="ol-left">
                            <li>Service guarantee</li>
                            <li>Tradition of trust</li>
                        </ul>
                        <ul class="ol-right">
                            <li>Shifting idled planes.</li>
                            <li>Sustainable trade
                            </li>
                        </ul>
                    </div>
                    <div class="brand-layer d-flex">
                        <figure class="signature">
                            <img src="{{ asset('images/commons/signature.png') }}" alt="">
                        </figure>
                        <div class="bl-contact">
                            <p>Call Us for Service</p>
                            <h4>052 5401 3322</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 spacing-md">
                <figure class="about-img-layer">
                    <img src="{{ asset('images/commons/industra-img-2.jpg') }}" alt="">
                    <div class="ai-banner">
                        <div class="media">
                            <img src="{{ asset('images/icons/medal.png') }}" class="mr-3" alt="...">
                            <div class="media-body">
                                <h5 class="mt-0">Premium Quality Guaranteed.</h5>
                            </div>
                        </div>
                    </div>
                </figure>
            </div>
        </div>
    </div>
    <!-- ABOUT SECTION END -->

    <!-- WIDE SECTION START -->
    <div class="ws-wrapper mt-5 mb-5">
        <div class="row no-gutters">
            <div class="col-lg-6">
                <div class="ws-feature-left">
                    <div class="pulsing-btn-alt">
                        <a class="popup-youtube" href="https://www.youtube.com/watch?v=-_tvJtUHnmU">
                            <div class="pulse"><i class="fas fa-play"></i></div>
                        </a>
                    </div>
                    <div class="label-layer">
                        <figure class="label-icon">
                            <img src="{{ asset('images/icons/engineer-hat.png') }}" alt="">
                        </figure>
                        <div class="label-layer-caption">
                            <h4>Safety, Quality, Distinction</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="ws-feature-right">
                    <div class="feature-right-content">
                        <div class="layer-box">
                            <div class="media">
                                <img src="{{ asset('images/icons/innovation.png') }}" class="mr-3" alt="...">
                                <div class="media-body">
                                    <h4 class="mt-0">Innovation Tecnology</h4>
                                    <p>The Industrial is responsible for minor and the codes security in hotel
                                        Ecosystem for Food and Cleaner through.</p>
                                </div>
                            </div>
                        </div>
                        <div class="layer-box">
                            <div class="media">
                                <img src="{{ asset('images/icons/shield.png') }}" class="mr-3" alt="...">
                                <div class="media-body">
                                    <h4 class="mt-0">Extended Warranty</h4>
                                    <p>Our Aim Is to Keep the House Clean – Your Aim Will Help! the through Digital
                                        Innovation World Summit.</p>
                                </div>
                            </div>
                        </div>
                        <div class="layer-box">
                            <div class="media">
                                <img src="{{ asset('images/icons/engineer.png') }}" class="mr-3" alt="...">
                                <div class="media-body">
                                    <h4 class="mt-0">Qualified Engineers</h4>
                                    <p>Both of us take a lot of time in getting cleaned and beautified Clean Home.
                                        Professional Service, cleaned right the first time.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- WIDE SECTION END -->

    <!-- TEAM START -->
    <div class="container mt-5 mb-5">
        <div class="section-title">
            <h2>Meet Our Team</h2>
            <p>We will be the leading company in the national market with each of our products, and we will export
                to at least Caribbean.</p>
        </div>
        <div class="team-carousel">
            <div class="owl-carousel owl-theme owl-loaded owl-drag">





            <div class="owl-stage-outer"><div class="owl-stage" style="transition: all; width: 4070px; transform: translate3d(-740px, 0px, 0px);"><div class="owl-item cloned" style="width: 370px;"><div class="item">
                    <div class="team-card">
                        <figure class="tc-portrait">
                            <img src="{{ asset('images/commons/engineer-3.jpg') }}" alt="">
                            <ul class="tc-social">
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                <li><a href="#"><i class="fab fa-dribbble"></i></a></li>
                            </ul>
                        </figure>
                        <div class="tc-caption">
                            <h4>Jayson Williams</h4>
                            <p>Architect</p>
                        </div>
                    </div>
                </div></div><div class="owl-item cloned" style="width: 370px;"><div class="item">
                    <div class="team-card">
                        <figure class="tc-portrait">
                            <img src="{{ asset('images/commons/engineer-4.jpg') }}" alt="">
                            <ul class="tc-social">
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                <li><a href="#"><i class="fab fa-dribbble"></i></a></li>
                            </ul>
                        </figure>
                        <div class="tc-caption">
                            <h4>Martha Jones</h4>
                            <p>Engineer</p>
                        </div>
                    </div>
                </div></div><div class="owl-item cloned active" style="width: 370px;"><div class="item">
                    <div class="team-card">
                        <figure class="tc-portrait">
                            <img src="{{ asset('images/commons/engineer-5.jpg') }}" alt="">
                            <ul class="tc-social">
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                <li><a href="#"><i class="fab fa-dribbble"></i></a></li>
                            </ul>
                        </figure>
                        <div class="tc-caption">
                            <h4>Gloria Blake</h4>
                            <p>Construction</p>
                        </div>
                    </div>
                </div></div><div class="owl-item active center" style="width: 370px;"><div class="item">
                    <div class="team-card">
                        <figure class="tc-portrait">
                            <img src="{{ asset('images/commons/engineer-1.jpg') }}" alt="">
                            <ul class="tc-social">
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                <li><a href="#"><i class="fab fa-dribbble"></i></a></li>
                            </ul>
                        </figure>
                        <div class="tc-caption">
                            <h4>Robert Johnson</h4>
                            <p>Engineer</p>
                        </div>
                    </div>
                </div></div><div class="owl-item active" style="width: 370px;"><div class="item">
                    <div class="team-card">
                        <figure class="tc-portrait">
                            <img src="{{ asset('images/commons/engineer-2.jpg') }}" alt="">
                            <ul class="tc-social">
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                <li><a href="#"><i class="fab fa-dribbble"></i></a></li>
                            </ul>
                        </figure>
                        <div class="tc-caption">
                            <h4>Matt Cimino</h4>
                            <p>Construction</p>
                        </div>
                    </div>
                </div></div><div class="owl-item" style="width: 370px;"><div class="item">
                    <div class="team-card">
                        <figure class="tc-portrait">
                            <img src="{{ asset('images/commons/engineer-3.jpg') }}" alt="">
                            <ul class="tc-social">
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                <li><a href="#"><i class="fab fa-dribbble"></i></a></li>
                            </ul>
                        </figure>
                        <div class="tc-caption">
                            <h4>Jayson Williams</h4>
                            <p>Architect</p>
                        </div>
                    </div>
                </div></div><div class="owl-item" style="width: 370px;"><div class="item">
                    <div class="team-card">
                        <figure class="tc-portrait">
                            <img src="{{ asset('images/commons/engineer-4.jpg') }}" alt="">
                            <ul class="tc-social">
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                <li><a href="#"><i class="fab fa-dribbble"></i></a></li>
                            </ul>
                        </figure>
                        <div class="tc-caption">
                            <h4>Martha Jones</h4>
                            <p>Engineer</p>
                        </div>
                    </div>
                </div></div><div class="owl-item" style="width: 370px;"><div class="item">
                    <div class="team-card">
                        <figure class="tc-portrait">
                            <img src="{{ asset('images/commons/engineer-5.jpg') }}" alt="">
                            <ul class="tc-social">
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                <li><a href="#"><i class="fab fa-dribbble"></i></a></li>
                            </ul>
                        </figure>
                        <div class="tc-caption">
                            <h4>Gloria Blake</h4>
                            <p>Construction</p>
                        </div>
                    </div>
                </div></div><div class="owl-item cloned" style="width: 370px;"><div class="item">
                    <div class="team-card">
                        <figure class="tc-portrait">
                            <img src="{{ asset('images/commons/engineer-1.jpg') }}" alt="">
                            <ul class="tc-social">
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                <li><a href="#"><i class="fab fa-dribbble"></i></a></li>
                            </ul>
                        </figure>
                        <div class="tc-caption">
                            <h4>Robert Johnson</h4>
                            <p>Engineer</p>
                        </div>
                    </div>
                </div></div><div class="owl-item cloned" style="width: 370px;"><div class="item">
                    <div class="team-card">
                        <figure class="tc-portrait">
                            <img src="{{ asset('images/commons/engineer-2.jpg') }}" alt="">
                            <ul class="tc-social">
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                <li><a href="#"><i class="fab fa-dribbble"></i></a></li>
                            </ul>
                        </figure>
                        <div class="tc-caption">
                            <h4>Matt Cimino</h4>
                            <p>Construction</p>
                        </div>
                    </div>
                </div></div><div class="owl-item cloned" style="width: 370px;"><div class="item">
                    <div class="team-card">
                        <figure class="tc-portrait">
                            <img src="{{ asset('images/commons/engineer-3.jpg') }}" alt="">
                            <ul class="tc-social">
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                <li><a href="#"><i class="fab fa-dribbble"></i></a></li>
                            </ul>
                        </figure>
                        <div class="tc-caption">
                            <h4>Jayson Williams</h4>
                            <p>Architect</p>
                        </div>
                    </div>
                </div></div></div></div><div class="owl-dots"><button role="button" class="owl-dot active"><span></span></button><button role="button" class="owl-dot"><span></span></button><button role="button" class="owl-dot"><span></span></button><button role="button" class="owl-dot"><span></span></button><button role="button" class="owl-dot"><span></span></button></div></div>
            <div class="owl-theme">
                <div class="owl-controls">
                    <div class="custom-nav owl-nav"><button type="button" role="presentation" class="owl-prev"><i class="fa fa-angle-left" aria-hidden="true"></i></button><button type="button" role="presentation" class="owl-next"><i class="fa fa-angle-right" aria-hidden="true"></i></button></div>
                </div>
            </div>
        </div>
    </div>
    <!-- TEAM END -->

    <!-- SERVICES LAYER START -->
    <div class="service-wrapper mt-5 mb-5">
        <div class="container">
            <div class="section-title">
                <h2>Our Services</h2>
                <p>Industra is a global community of practice that facilitates dialogue, information exchange and
                    use of information.</p>
            </div>
            <div class="service-grid">
                <div class="row">
                    <div class="col-md-6 col-lg-4">
                        <div class="grid-service-box">
                            <figure class="grid-service-icon">
                                <img src="{{ asset('images/icons/agriculture.png') }}" alt="">
                            </figure>
                            <h4>Agricultural Engineering</h4>
                            <p>Homes and thoroughly launder them between usage, We give our teams.</p>
                            <div class="service-btn d-flex justify-content-center">
                                <a href="#" class="btn-default btn-outline btn-lg">Learn more</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="grid-service-box">
                            <figure class="grid-service-icon">
                                <img src="{{ asset('images/icons/energy.png') }}" alt="">
                            </figure>
                            <h4>Power &amp; Energy</h4>
                            <p>We are closely monitoring national, state and local health agencies.</p>
                            <div class="service-btn d-flex justify-content-center">
                                <a href="#" class="btn-default btn-outline btn-lg">Learn more</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="grid-service-box">
                            <figure class="grid-service-icon">
                                <img src="{{ asset('images/icons/chemical.png') }}" alt="">
                            </figure>
                            <h4>Chemical Research</h4>
                            <p>Follow these tips from the CDC to help prevent the spread of the seasonal.</p>
                            <div class="service-btn d-flex justify-content-center">
                                <a href="#" class="btn-default btn-outline btn-lg">Learn more</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="grid-service-box">
                            <figure class="grid-service-icon">
                                <img src="{{ asset('images/icons/mechanical.png') }}" alt="">
                            </figure>
                            <h4>Mechanical Engineering</h4>
                            <p>Industra plays a large role in the comfort of your home, but many.</p>
                            <div class="service-btn d-flex justify-content-center">
                                <a href="#" class="btn-default btn-outline btn-lg">Learn more</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="grid-service-box">
                            <figure class="grid-service-icon">
                                <img src="{{ asset('images/icons/oil.png') }}" alt="">
                            </figure>
                            <h4>Oil &amp; Gas</h4>
                            <p>We realize that every family has their own preferences, so we accommodate.</p>
                            <div class="service-btn d-flex justify-content-center">
                                <a href="#" class="btn-default btn-outline btn-lg">Learn more</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="grid-service-box">
                            <figure class="grid-service-icon">
                                <img src="{{ asset('images/icons/material.png') }}" alt="">
                            </figure>
                            <h4>Material Engineering</h4>
                            <p>While some cleaning companies use rotating cleaning plans equipped.</p>
                            <div class="service-btn d-flex justify-content-center">
                                <a href="#" class="btn-default btn-outline btn-lg">Learn more</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- SERVICES LAYER END -->

        <!-- TESTIMONIALS START -->
        <div class="testimonial-layer mt-5">
            <div class="container">
                <div class="pulsing-btn-alt">
                    <a class="popup-youtube" href="https://www.youtube.com/watch?v=-_tvJtUHnmU">
                        <div class="pulse"><i class="fas fa-play"></i></div>
                    </a>
                </div>
            </div>
        </div>
        <div class="testimonial-left-layer mb-5">
            <div class="testimonial-info">
                <h5>Testimonials</h5>
                <h2>What Our Customer Says</h2>

            </div>
            <div class="testimonials-carousel">
                <div class="owl-carousel owl-theme">
                    <div class="item">
                        <div class="testimonial-box">
                            <div class="tb-content">
                                <p class="t-description">Start with your super fans. These are your happiest clients and
                                    customers. They may have already offered
                                    to be a reference so they won’t mind the request.</p>
                                <div class="media">
                                    <img src="images/commons/avatar-1.jpg" class="mr-3" alt="...">
                                    <div class="media-body">
                                        <h5 class="mt-0">Sara Jones</h5>
                                        <p>Accounting</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimonial-box">
                            <div class="tb-content">
                                <p class="t-description">Start with your super fans. These are your happiest clients and
                                    customers. They may have already offered
                                    to be a reference so they won’t mind the request.</p>
                                <div class="media">
                                    <img src="images/commons/avatar3.jpg" class="mr-3" alt="...">
                                    <div class="media-body">
                                        <h5 class="mt-0">John Smith</h5>
                                        <p>Lawyer</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimonial-box">
                            <div class="tb-content">
                                <p class="t-description">Start with your super fans. These are your happiest clients and
                                    customers. They may have already offered
                                    to be a reference so they won’t mind the request.</p>
                                <div class="media">
                                    <img src="images/commons/avatar5.jpg" class="mr-3" alt="...">
                                    <div class="media-body">
                                        <h5 class="mt-0">Martha Johnson</h5>
                                        <p>Web Designer</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="owl-theme">
                    <div class="owl-controls">
                        <div class="custom-nav owl-nav"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- TESTIMONIALS END -->


</section>
@endsection
