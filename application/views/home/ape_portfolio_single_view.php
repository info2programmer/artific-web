<?php 
//echo "<pre>";
//var_dump($portfolio_data);
$this->load->view('layout/home_head_view');
?>
<div id="main">
            <!-- header-->
            <?php $this->load->view('layout/home_header_view') ?>
            <!--  header end -->
            <!--  navigation bar -->
            <?php $this->load->view('layout/home_side_nav_view') ?>
            <!--  navigation bar end -->
            <!--wrapper-->
            <div id="wrapper" class="single-page-wrap">
                <!-- Content-->
                <div class="content">
                    <div class="single-page-decor"></div>
                    <div class="single-page-fixed-row">
                        <div class="scroll-down-wrap">
                            <div class="mousey">
                                <div class="scroller"></div>
                            </div>
                            <span>Scroll Down</span>
                        </div>
                        <a href="index.html" class="single-page-fixed-row-link"><i class="fal fa-arrow-left"></i> <span>Back to home</span></a>
                    </div>
                    <!-- section  -->
                    <section class="no-padding dark-bg no-hidden">
                        <!-- show-case-slider-wrap-->   
                        <div class="show-case-slider-wrap slider-carousel-wrap show-case-slider-wrap-style2">
                            <div class="sp-cont sarr-contr sp-cont-prev"><i class="fal fa-long-arrow-left"></i></div>
                            <div class="sp-cont sarr-contr sp-cont-next"><i class="fal fa-long-arrow-right"></i></div>
                            <div class="show-case-slider cur_carousel-slider-container lightgallery fl-wrap full-height" data-slick='{"centerMode": true}'>
                                <!-- show-case-item -->   
                                <?php foreach($portfolio_img as $img_data):?>
                                <div class="show-case-item" data-curtext="Lokomotive Project">
                                    <div class="show-case-wrapper fl-wrap full-height">
                                        <img src="<?php echo  base_url() ?>assets/uploads/portfolio/<?php echo $img_data['image_url'] ?>" alt="">
                                        <a href="<?php echo  base_url() ?>assets/uploads/portfolio/<?php echo $img_data['image_url'] ?>" class="fet_pr-carousel-box-media-zoom   popup-image"><i class="fal fa-search"></i></a>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                                <div class="show-case-item" data-curtext="Lokomotive Project">
                                    <div class="show-case-wrapper fl-wrap full-height">
                                        <img src="images/folio/3.jpg" alt="">
                                        <a href="images/folio/3.jpg" class="fet_pr-carousel-box-media-zoom   popup-image"><i class="fal fa-search"></i></a>
                                    </div>
                                </div>
                                                                                                                                                             
                            </div>
                        </div>
                        <!-- show-case-slider-wrap end-->  
                        <!-- <div class="single-project-title single-project-title-style-2">
                            <h2><span class="caption">Locomotive Project</span></h2>
                        </div> -->
                    </section>
                    <!-- section end-->              
                    <!-- section-->
                    <section data-scrollax-parent="true">
                        <div class="section-subtitle right-pos"  data-scrollax="properties: { translateY: '-250px' }"><span>//</span><?php echo $portfolio_data[0]['poject_name'] ?></div>
                        <div class="container">
                            <!-- det box-->
                            <div class="fl-wrap mar-top">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="fixed-column l-wrap">
                                            <div class="pr-title fl-wrap">
                                                <h3>Technical Perspective</h3>
                                                <span><?php echo $portfolio_data[0]['technical_prospective'] ?></span>
                                            </div>
                                            <div class="ci-num"><span>01.</span></div>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="details-wrap fl-wrap">
                                            <h3><span><?php echo $portfolio_data[0]['poject_name'] ?></span></h3>
                                            <div class="parallax-header"><span>Category : </span>
                                            <?php foreach(explode(",", $portfolio_data[0]['project_tag']) as $list): ?>
                                                    <a href="#"><?php echo $list ?></a>
                                            <?php endforeach ?>
                                        </div>
                                            <div class="clearfix"></div>
                                            <h4>Marketing Perspective</h4>
                                            <p><?php echo $portfolio_data[0]['marketing_prospective'] ?></p>
                                        </div>
                                        <div class="pr-list fl-wrap">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <ul>
                                                        <li><span>Date :</span> <?php echo $portfolio_data[0]['date'] ?> </li>
                                                        <li><span>Client :</span>  <?php echo $portfolio_data[0]['client'] ?> </li>
                                                        <li><span>Skills :</span> <?php echo $portfolio_data[0]['skills'] ?> </li>
                                                        <li><span>Location : </span>  <a href="<?php echo $portfolio_data[0]['location_url'] ?>" target="_blank"> <?php echo $portfolio_data[0]['location_name'] ?>  </a></li>
                                                    </ul>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="fl-wrap pr-list-det">
                                                        <div class="popup-avatar"><img src="images/avatar/2.jpg" alt=""></div>
                                                        <h5>Client Review.</h5>
                                                        <p>" <?php echo $portfolio_data[0]['review_client_comment'] ?> "</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- accordion-->                            
                                        
                                        <!-- accordion end -->                                         
                                        <a href="<?php echo base_url() ?>portfolio.html" class="btn float-btn flat-btn color-btn mar-top">View project</a>
                                    </div>
                                </div>
                                <div class="limit-box fl-wrap"></div>
                            </div>
                            <!-- det box end-->
                            <!-- <div class="content-nav mar-top">
                                <ul>
                                    <li><a href="portfolio-single2.html" class="ln"><i class="fal fa-arrow-left"></i><span class="tooltip">Prev - KENT BRANT CONCEPT</span></a></li>
                                    <li>
                                        <a href="portfolio.html" class="cur-page"><span>All Projects</span></a>
                                    </li>
                                    <li><a href="portfolio-single3.html" class="rn"><i class="fal fa-arrow-right"></i><span class="tooltip">Next - BARBERSHOP WEBSITE </span></a></li>
                                </ul>
                            </div> -->
                        </div>
                        <div class="bg-parallax-module" data-position-top="50"  data-position-left="20" data-scrollax="properties: { translateY: '-250px' }"></div>
                        <div class="bg-parallax-module" data-position-top="40"  data-position-left="70" data-scrollax="properties: { translateY: '150px' }"></div>
                        <div class="bg-parallax-module" data-position-top="80"  data-position-left="80" data-scrollax="properties: { translateY: '350px' }"></div>
                        <div class="bg-parallax-module" data-position-top="95"  data-position-left="40" data-scrollax="properties: { translateY: '-550px' }"></div>
                        <div class="sec-lines"></div>
                    </section>
                    <?php $this->load->view('layout/home_footer_view'); ?>