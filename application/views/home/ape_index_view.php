<?php $this->load->view('layout/home_head_view'); ?>
<div id="main">
    <!-- header-->
    <?php $this->load->view('layout/home_header_view') ?>
    <!--  header end -->
    <?php $this->load->view('layout/home_side_nav_view') ?>
    <!-- wrapper-->
    <div id="wrapper">
        <!-- scroll-nav-wrap-->
        <div class="scroll-nav-wrap fl-wrap">
            <div class="scroll-down-wrap">
                <div class="mousey">
                    <div class="scroller"></div>
                </div>
                <span>Scroll Down</span>
            </div>
            <nav class="scroll-nav scroll-init">
                <ul>
                    <li><a class="scroll-link act-link" href="#sec1">Home</a></li>
                    <li><a class="scroll-link" href="#sec2">About Us</a></li>
                    <!--<li><a class="scroll-link" href="#sec3">Our Story</a></li>-->
                    <li><a class="scroll-link" href="#sec5">Projects</a></li>
                    <li><a class="scroll-link" href="#sec6">Client Testimonials</a></li>
                </ul>
            </nav>
        </div>
        <!-- scroll-nav-wrap end-->
        <!-- hero-wrap-->
        <div class="hero-wrap no-hidden" id="sec1" data-scrollax-parent="true">
            <!-- impulse-wrap-->
            <div class="impulse-wrap">
                <div class="mm-parallax">
                    <div class="half-hero-wrap section-entry">
                        <h1>Welcome!<br>We are Artific<br>An Innovative <span> IT Solutions Organization </span></h1>
                        <h4>We develop software,apps & websites</h4>
                        <div class="clearfix"></div>
                        <a href="#sec2" class="custom-scroll-link btn float-btn flat-btn color-btn mar-top">Let's Start</a>
                    </div>
                    <div class="half-bg">
                        <div class="bg" data-bg="<?php echo base_url() ?>assets/ape/images/bg/17.jpg" data-scrollax="properties: { translateY: '250px' }"></div>
                        <div class="overlay"></div>
                    </div>
                </div>
            </div>
            <!-- impulse-wrap end-->
            <!--hero dec-->
            <div class="hero-decor-let">
                <div>Web Design</div>
                <div><span>Ui/Ux Design</span></div>
                <div>Branding</div>
                <div><span>Ecommerce</span></div>
            </div>
            <div class="hero-decor-numb"><span>22.5726° N </span><span>88.3639° E </span> <a href="https://www.google.co.in/maps/" target="_blank" class="hero-decor-numb-tooltip">Based In Kolkata</a></div>
            <div class="hero-line-dec imp-her-line"></div>
            <div class="pattern-bg"></div>
            <div class="half-bg-dec" data-ran="12"></div>
            <!--hero dec end-->
        </div>
        <!-- hero-wrap end-->
        <!-- Content-->
        <div class="content">
            <!-- section-->
            <section data-scrollax-parent="true" id="sec2">
                <div class="section-subtitle" data-scrollax="properties: { translateY: '-250px' }"> <span>//</span>Words About </div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="collage-image fl-wrap">
                                <div class="collage-image-title" data-scrollax="properties: { translateY: '150px' }">Artific.</div>
                                <img src="<?php echo base_url() ?>assets/ape/images/all/1.jpg" class="respimg" alt="">
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="main-about fl-wrap">
                                <h5>What we do</h5>
                                <h2>We Bring Creative solutions<br>to <span> complex </span> tasks</h2>
                                <p>We at Artific. Genuinely believe that even the most bland IT projects can be artistic and innovative. The goal of any business is profit but along with that we want to create something fresh, something novel when we develop our project. That is our plan of action when we look for new projects.</p>
                                <!-- features-box-container -->
                                <div class="features-box-container fl-wrap">
                                    <div class="row">
                                        <div class="features-box col-md-6">
                                            <div class="time-line-icon">
                                                <i class="fal fa-mobile"></i>
                                            </div>
                                            <h3>Mobile-App Development</h3>
                                            <p>Designing and developing unique Applications with vibrant style for ultimate user experience is our key point. When you hire us, you just don't hire us for its development, you hire us to make your vision into reality!</p>
                                        </div>
                                        <!-- features-box end  -->
                                        <!--features-box -->
                                        <div class="features-box col-md-6">
                                            <div class="time-line-icon">
                                                <i class="fal fa-rocket"></i>
                                            </div>
                                            <h3>SMO & SEO</h3>
                                            <p>Our specialized website-oriented services includes "Social Media Operations" & "Search Engine Optimization”. In such a competitive market, if you want the edge in digital marketing, these services are a must! contact us today to know more.</p>
                                        </div>
                                        <!--features-box -->
                                        <div class="features-box col-md-6">
                                            <div class="time-line-icon">
                                                <i class="fal fa-desktop"></i>
                                            </div>
                                            <h3>Website Development</h3>
                                            <p>Normal informative websites to massive E commerce Sites, whether you need a simple admin panel for uploading pictures or a complex integration of the website with a multi-level marketing software. We make them all!</p>
                                        </div>
                                        <!-- features-box end  -->
                                        <!--features-box -->
                                        <div class="features-box col-md-6">
                                            <div class="time-line-icon">
                                                <i class="fal fa-window"></i>
                                            </div>
                                            <h3>Software Development</h3>
                                            <p>We create all sorts of custom software depending upon the client requirements, we are specialized in ERP, Hotel Management, Exam Management Software, Stock and Billing Etc.</p>
                                        </div>
                                        <!-- features-box end  -->
                                        <!--features-box -->

                                        <!-- features-box end  -->
                                    </div>
                                </div>
                                <!-- features-box-container end  -->
                                <a href="portfolio.html" class="btn float-btn flat-btn color-btn">Our Portfolio</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-parallax-module" data-position-top="90" data-position-left="25" data-scrollax="properties: { translateY: '-250px' }"></div>
                <div class="bg-parallax-module" data-position-top="70" data-position-left="70" data-scrollax="properties: { translateY: '150px' }"></div>
                <div class="sec-lines"></div>
            </section>
            <!-- section end-->
            <!-- section-->
            <section class="parallax-section dark-bg sec-half parallax-sec-half-right" data-scrollax-parent="true">
                <div class="bg par-elem" data-bg="images/bg/6.jpg" data-scrollax="properties: { translateY: '30%' }"></div>
                <div class="overlay"></div>
                <div class="container">
                    <div class="section-title">
                        <h2>Some Interesting <span>Facts </span> <br> About Us</h2>
                        <p>We started as a small, subdue, called hath give fourth. Them one over saying. So the god, greater. You. Us air Moved divide midst us fifth sea . </p>
                        <div class="horizonral-subtitle"><span>Numbers</span></div>
                    </div>
                    <div class="fl-wrap facts-holder">
                        <!-- inline-facts -->
                        <div class="inline-facts-wrap">
                            <div class="inline-facts">
                                <div class="milestone-counter">
                                    <div class="stats animaper">
                                        <div class="num" data-content="0" data-num="145">0</div>
                                    </div>
                                </div>
                                <h6>Finished projects</h6>
                            </div>
                        </div>
                        <!-- inline-facts end -->
                        <!-- inline-facts  -->
                        <div class="inline-facts-wrap">
                            <div class="inline-facts">
                                <div class="milestone-counter">
                                    <div class="stats animaper">
                                        <div class="num" data-content="0" data-num="357">0</div>
                                    </div>
                                </div>
                                <h6>Happy customers</h6>
                            </div>
                        </div>
                        <!-- inline-facts end -->
                        <!-- inline-facts  -->
                        <div class="inline-facts-wrap">
                            <div class="inline-facts">
                                <div class="milestone-counter">
                                    <div class="stats animaper">
                                        <div class="num" data-content="0" data-num="825">0</div>
                                    </div>
                                </div>
                                <h6>Working hours</h6>
                            </div>
                        </div>
                        <!-- inline-facts end -->
                        <!-- inline-facts  -->
                        <div class="inline-facts-wrap">
                            <div class="inline-facts">
                                <div class="milestone-counter">
                                    <div class="stats animaper">
                                        <div class="num" data-content="0" data-num="1124">0</div>
                                    </div>
                                </div>
                                <h6>Coffee Cups</h6>
                            </div>
                        </div>
                        <!-- inline-facts end -->
                    </div>
                </div>
            </section>
            <!-- section end-->
            <!-- section-->
            <!--<section data-scrollax-parent="true" id="sec3">
    <div class="section-subtitle"  data-scrollax="properties: { translateY: '-250px' }" >My Resume  <span>//</span></div>
    <div class="container">
        <div class="section-title fl-wrap">
            <h3>Some Words About Me</h3>
            <h2>Our Awesome <span> Story</span></h2>
            <p>
                We are a team of professionals who have worked in different IT companies and in different sectors but we joined together for a common cause of creating exceptional products and services.
            </p>
        </div>
        <div class="custom-inner-holder  mar-bottom">
           
            <div class="custom-inner">
                <div class="row">
                    <div class="col-md-4">
                        <div class="custom-inner-header workres">
                            <i class="fa fa-briefcase"></i>
                            <h3> Work in company "Dolore"</h3>
                            <span>  2012-2017 </span>
                        </div>
                        <div class="ci-num"><span>01. -</span></div>
                    </div>
                    <div class="col-md-4"><img src="<?php echo base_url() ?>assets/ape/images/all/4.jpg" class="respimg" data-scrollax="properties: { translateY: '-170px' }" alt=""></div>
                    <div class="col-md-4">
                        <div class="custom-inner-content fl-wrap">
                            <h4>Complete the project "domik"</h4>
                            <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. </p>
                            <ul>
                                <li>Door portals plan</li>
                                <li>Furniture specifications</li>
                                <li>Interior design</li>
                            </ul>
                            <a href="#" class="cus-inner-head-link color-bg">Details + </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="custom-inner">
                <div class="row">
                    <div class="col-md-4">
                        <div class="custom-inner-header educ">
                            <i class="fal fa-university"></i>
                            <h3> Course designer - San Diego</h3>
                            <span>  2011-2013 </span>
                        </div>
                        <div class="ci-num"><span>02. - </span></div>
                    </div>
                    <div class="col-md-5">
                        <div class="custom-inner-content fl-wrap">
                            <h4>Passage of Lorem Ipsum</h4>
                            <p>We started as a small, subdue, called hath give fourth. Them one over saying. So the god, greater. You. Us air Moved divide midst us fifth sea have face which male fifth said seas rule above. Quis nostrud exercitation ullamco laboris nisi ut aliquip exea. commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                            <a href="#" class="cus-inner-head-link color-bg">Details + </a>
                        </div>
                    </div>
                    <div class="col-md-3"><img src="<?php echo base_url() ?>assets/ape/images/all/8.jpg" class="respimg" data-scrollax="properties: { translateY: '270px' }" alt=""></div>
                </div>
            </div>
            <div class="custom-inner">
                <div class="row">
                    <div class="col-md-4">
                        <div class="custom-inner-header workres">
                            <i class="fa fa-briefcase"></i>
                            <h3> Work in company "Generators"</h3>
                            <span>  2010-2013 </span>
                        </div>
                        <div class="ci-num"><span>03. - </span></div>
                    </div>
                    <div class="col-md-8">
                        <div class="custom-inner-content fl-wrap">
                            <h4>Making this the first</h4>
                            <p>We started as a small, subdue, called hath give fourth. Them one over saying. So the god, greater. You. Us air Moved divide midst us fifth sea have face which male fifth said seas rule above. All the Lorem Ipsum generators on the Internet tend .</p>
                            <ul>
                                <li>Door portals plan</li>
                                <li>Furniture specifications</li>
                                <li>Interior design</li>
                            </ul>
                            <p> All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="custom-inner">
                <div class="row">
                    <div class="col-md-4">
                        <div class="custom-inner-header workres">
                            <i class="fa fa-briefcase"></i>
                            <h3> Work in company "Available"</h3>
                            <span>  2011-2013 </span>
                        </div>
                        <div class="ci-num"><span>04. - </span></div>
                    </div>
                    <div class="col-md-4"><img src="<?php echo base_url() ?>assets/ape/images/all/6.jpg" class="respimg" data-scrollax="properties: { translateY: '100px' }" alt=""></div>
                    <div class="col-md-4">
                        <div class="custom-inner-content fl-wrap">
                            <h4>Complete the project "domik"</h4>
                            <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. </p>
                            <ul>
                                <li>Door portals plan</li>
                                <li>Furniture specifications</li>
                                <li>Interior design</li>
                            </ul>
                            <a href="#" class="cus-inner-head-link color-bg">Details + </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a href="#" class="btn float-btn flat-btn color-btn mar-top">Download Resume</a>
    </div>
    <div class="sec-lines"></div>
</section>-->
            <!-- section end-->
            <!--section -->
            <section class="dark-bg" id="sec5">
                <div class="fet_pr-carousel-title">
                    <div class="fet_pr-carousel-title-item">
                        <h3>OUr Projects</h3>
                        <p></p>
                        <a href="portfolio.html" class="btn float-btn flat-btn color-btn mar-top">Our Portfolio</a>
                    </div>
                </div>
                <!--slider-carousel-wrap -->
                <div class="slider-carousel-wrap fl-wrap">
                    <!--fet_pr-carousel -->
                    <div class="fet_pr-carousel cur_carousel-slider-container fl-wrap">
                        <!--slick-item -->

                        <div class="slick-item">
                            <div class="fet_pr-carousel-box">
                                <div class="fet_pr-carousel-box-media fl-wrap">
                                    <img src="<?php echo base_url() ?>assets/uploads/portfolio/bcs.jpg" class="respimg" alt="">
                                    <a href="<?php echo base_url() ?>assets/uploads/portfolio/bcs.jpg" class="fet_pr-carousel-box-media-zoom   image-popup"><i class="fal fa-search"></i></a>
                                </div>
                                <div class="fet_pr-carousel-box-text fl-wrap">
                                    <h3><a href="javascript:void(0)">BHUNIA CONSULTANCY SERVICES PVT.LTD</a></h3>
                                    <div class="fet_pr-carousel-cat">
                                        <a href="javascript:void(0)">Website </a> <a href="javascript:void(0)"> Portfolio</a> <a href="javascript:void(0)"> Product</a> <a href="javascript:void(0)"> Admin Panel</a> <a href="javascript:void(0)"> CMS</a>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="slick-item">
                            <div class="fet_pr-carousel-box">
                                <div class="fet_pr-carousel-box-media fl-wrap">
                                    <img src="<?php echo base_url() ?>assets/uploads/portfolio/Kidsville.jpg" class="respimg" alt="">
                                    <a href="<?php echo base_url() ?>assets/uploads/portfolio/Kidsville.jpg" class="fet_pr-carousel-box-media-zoom   image-popup"><i class="fal fa-search"></i></a>
                                </div>
                                <div class="fet_pr-carousel-box-text fl-wrap">
                                    <h3><a href="javascript:void(0)">Kidsville International</a></h3>
                                    <div class="fet_pr-carousel-cat">
                                        <a href="javascript:void(0)">Website </a> <a href="javascript:void(0)"> Portfolio</a> <a href="javascript:void(0)"> Product</a> <a href="javascript:void(0)"> Admin Panel</a> <a href="javascript:void(0)"> CMS</a>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="slick-item">
                            <div class="fet_pr-carousel-box">
                                <div class="fet_pr-carousel-box-media fl-wrap">
                                    <img src="<?php echo base_url() ?>assets/uploads/portfolio/Yesme.jpg" class="respimg" alt="">
                                    <a href="<?php echo base_url() ?>assets/uploads/portfolio/Yesme.jpg" class="fet_pr-carousel-box-media-zoom   image-popup"><i class="fal fa-search"></i></a>
                                </div>
                                <div class="fet_pr-carousel-box-text fl-wrap">
                                    <h3><a href="javascript:void(0)">Yesme</a></h3>
                                    <div class="fet_pr-carousel-cat">
                                        <a href="javascript:void(0)">Website </a> <a href="javascript:void(0)"> Portfolio</a> <a href="javascript:void(0)"> Product</a> <a href="javascript:void(0)"> Admin Panel</a> <a href="javascript:void(0)"> CMS</a>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="slick-item">
                            <div class="fet_pr-carousel-box">
                                <div class="fet_pr-carousel-box-media fl-wrap">
                                    <img src="<?php echo base_url() ?>assets/uploads/portfolio/lagniappe.jpg" class="respimg" alt="">
                                    <a href="<?php echo base_url() ?>assets/uploads/portfolio/lagniappe.jpg" class="fet_pr-carousel-box-media-zoom   image-popup"><i class="fal fa-search"></i></a>
                                </div>
                                <div class="fet_pr-carousel-box-text fl-wrap">
                                    <h3><a href="javascript:void(0)">LAGNIAPPE: AN E-COMMERCE WEBSITE</a></h3>
                                    <div class="fet_pr-carousel-cat">
                                        <a href="javascript:void(0)">Website </a> <a href="javascript:void(0)"> Portfolio</a> <a href="javascript:void(0)"> E-Commerce</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="slick-item">
                            <div class="fet_pr-carousel-box">
                                <div class="fet_pr-carousel-box-media fl-wrap">
                                    <img src="<?php echo base_url() ?>assets/uploads/portfolio/Micbac-India.jpg" class="respimg" alt="">
                                    <a href="<?php echo base_url() ?>assets/uploads/portfolio/Micbac-India.jpg" class="fet_pr-carousel-box-media-zoom   image-popup"><i class="fal fa-search"></i></a>
                                </div>
                                <div class="fet_pr-carousel-box-text fl-wrap">
                                    <h3><a href="javascript:void(0)">MICBAC INDIA</a></h3>
                                    <div class="fet_pr-carousel-cat">
                                        <a href="javascript:void(0)">Website </a> <a href="javascript:void(0)"> Portfolio</a> <a href="javascript:void(0)"> E-Commerce</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!--fet_pr-carousel end -->
                    <div class="sp-cont sp-arr sp-cont-prev"><i class="fal fa-long-arrow-left"></i></div>
                    <div class="sp-cont sp-arr sp-cont-next"><i class="fal fa-long-arrow-right"></i></div>
                </div>
                <!--slider-carousel-wrap end-->
                <div class="fet_pr-carousel-counter"></div>
            </section>
            <!-- section end -->
            <!--section -->
            <section data-scrollax-parent="true" id="sec6">
                <div class="section-subtitle" data-scrollax="properties: { translateY: '-250px' }">Testimonials<span>//</span></div>
                <div class="container">
                    <div class="section-title fl-wrap">
                        <h3>Reviews</h3>
                        <h2>Our Clients and <span>Testimonials</span></h2>
                        <p>Check out what our clients have to say about us , we promise not to show you the bad ones 😛</p>
                    </div>
                </div>
                <div class="clearfix"></div>
                <!--slider-carousel-wrap -->
                <div class="slider-carousel-wrap text-carousel-wrap fl-wrap">
                    <div class="text-carousel-controls fl-wrap">
                        <div class="container">
                            <div class="sp-cont  sp-cont-prev"><i class="fal fa-long-arrow-left"></i></div>
                            <div class="sp-cont   sp-cont-next"><i class="fal fa-long-arrow-right"></i></div>
                        </div>
                    </div>
                    <div class="text-carousel cur_carousel-slider-container fl-wrap">
                        <!--slick-item -->
                        <div class="slick-item">
                            <div class="text-carousel-item">
                                <div class="popup-avatar"><img src="<?php echo base_url() ?>assets/ape/images/avatar/1.jpg" alt=""></div>
                                <div class="listing-rating card-popup-rainingvis" data-starrating2="5"> </div>
                                <div class="review-owner fl-wrap">Shobon Dutta - <span>Photography Studio Manager</span></div>
                                <p> " The Artific team has helped me immensely with the problems I was facing with accountancy & billing by providing me with my very own custom software for all my immediate needs :)"</p>
                                <!-- <a href="#" class="testim-link">Via Facebook</a> -->
                            </div>
                        </div>
                        <!--slick-item end -->
                        <!--slick-item -->
                        <div class="slick-item">
                            <div class="text-carousel-item">
                                <div class="popup-avatar"><img src="<?php echo base_url() ?>assets/ape/images/avatar/2.jpg" alt=""></div>
                                <div class="listing-rating card-popup-rainingvis" data-starrating2="4"> </div>
                                <div class="review-owner fl-wrap">Nilesh Gupta - <span>Micbac India</span></div>
                                <p> "Great Service and Excellent Website Development Concepts and support . Even though i had no idea regarding what i wanted for my website , the guided my throughout the process discussing the progress and giving me choices and possibilities along the way . Great work and all the best for your future !"</p>
                                <!-- <a href="#" class="testim-link">Via Facebook</a> -->
                            </div>
                        </div>
                        <!--slick-item end -->
                        <!--slick-item -->
                        <div class="slick-item">
                            <div class="text-carousel-item">
                                <div class="popup-avatar"><img src="<?php echo base_url() ?>assets/ape/images/avatar/3.jpg" alt=""></div>
                                <div class="listing-rating card-popup-rainingvis" data-starrating2="5"> </div>
                                <div class="review-owner fl-wrap">Sharad Bhutoria - <span>The Good Cow Company </span></div>
                                <p> "Friendly attitude and great support !"</p>
                                <!-- <a href="#" class="testim-link">Via Facebook</a> -->
                            </div>
                        </div>
                        <!--slick-item end -->
                        <!--slick-item -->
                        <div class="slick-item">
                            <div class="text-carousel-item">
                                <div class="popup-avatar"><img src="<?php echo base_url() ?>assets/ape/images/avatar/4.jpg" alt=""></div>
                                <div class="listing-rating card-popup-rainingvis" data-starrating2="5"> </div>
                                <div class="review-owner fl-wrap">Skumar Iyer - <span>Chairman of Easy Elite English Educational Trust</span></div>
                                <p> "They have supported our NGO throughout the years with their IT expertise , thank you for providing such great service and support Artific !"</p>
                                <!-- <a href="#" class="testim-link">Via Facebook</a> -->
                            </div>
                        </div>
                        <!--slick-item end -->
                    </div>
                </div>
                <!--slider-carousel-wrap end-->
                <!-- client-list -->
                <div class="fl-wrap">
                    <div class="container">
                        <ul class="client-list client-list-white">
                            <li><a href="javascript:void(0)"><img src="<?php echo base_url() ?>assets/ape/images/clients/1.png" alt=""></a></li>
                            <li><a href="javascript:void(0)"><img src="<?php echo base_url() ?>assets/ape/images/clients/2.png" alt=""></a></li>
                            <li><a href="javascript:void(0)"><img src="<?php echo base_url() ?>assets/ape/images/clients/3.png" alt=""></a></li>
                            <li><a href="javascript:void(0)"><img src="<?php echo base_url() ?>assets/ape/images/clients/4.png" alt=""></a></li>
                            <li><a href="javascript:void(0)"><img src="<?php echo base_url() ?>assets/ape/images/clients/5.png" alt=""></a></li>
                        </ul>
                    </div>
                    <!-- client-list end-->
                </div>
                <div class="sec-lines"></div>
            </section>
            <!-- section end -->
            <?php $this->load->view('layout/home_footer_view'); ?>