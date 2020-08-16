<?php $this->load->view('layout/home_head_view'); ?>
<div id="main">
    <!-- header-->
    <?php $this->load->view('layout/home_header_view') ?>
    <!--  header end -->
    <!--  navigation bar -->
    <?php $this->load->view('layout/home_side_nav_view') ?>
    <div id="wrapper" class="single-page-wrap">
        <!-- Content-->
        <div class="content">
            <div class="single-page-decor"></div>
            <!-- single-page-fixed-row-->
            <div class="single-page-fixed-row blog-single-page-fixed-row">
                <div class="scroll-down-wrap">
                    <div class="mousey">
                        <div class="scroller"></div>
                    </div>
                    <span>Scroll Down</span>
                </div>
                <!-- filter  -->
                <div class="blog-filters">
                    <!-- filter tag   -->
                    <div class="tag-filter blog-btn-filter">
                        <div class="blog-btn">Tags <i class="fa fa-tags" aria-hidden="true"></i></div>
                        <ul>
                            <li><a href="http://solonick.webredox.net/tag/design/" rel="tag">Design</a></li>
                            <li><a href="http://solonick.webredox.net/tag/photography/" rel="tag">Photography</a></li>
                            <li><a href="http://solonick.webredox.net/tag/video/" rel="tag">Video</a></li>
                        </ul>
                    </div>
                    <!-- filter tag end  -->
                    <!-- filter category    -->
                    <div class="category-filter blog-btn-filter">
                        <div class="blog-btn">Categories <i class="fa fa-list-ul" aria-hidden="true"></i></div>

                        <ul class="post-categories">
                            <li><a href="http://solonick.webredox.net/category/gallery/" rel="category tag">Gallery</a>
                            </li>
                            <li><a href="http://solonick.webredox.net/category/video/" rel="category tag">Video</a></li>
                        </ul>
                    </div>
                    <!-- filter category end  -->
                    <div class="blog-search">
                        <form action="http://solonick.webredox.net/" class="searh-inner fl-wrap">
                            <input name="s" id="se" type="text" class="search" placeholder="Search..."
                                value="Search..." />
                            <button class="search-submit color-bg" id="submit_btn"><i class="fa fa-search"></i>
                            </button>
                        </form>
                    </div>
                </div>
                <!-- filter end    -->
            </div>
            <!-- single-page-fixed-row end-->
            <!-- section end-->
            <!-- section -->
            <section data-scrollax-parent="true" id="sec1">
                <div class="section-subtitle left-pos" data-scrollax="properties: { translateY: '-250px' }">
                    <span>//</span><?php echo $blogData->blog_title ?></div>
                <div class="container">
                    <!-- blog-container  -->
                    <div class="fl-wrap post-container">
                        <div class="row">
                            <div class="col-md-8">
                                <!-- post -->
                                <div class="post fl-wrap fw-post">
                                    <div id="post-301"
                                        class="post-301 post type-post status-publish format-gallery has-post-thumbnail hentry category-gallery category-video tag-design tag-photography tag-video post_format-post-format-gallery">
                                        <h2><span><?php echo $blogData->blog_title ?></span></h2>
                                        <div class="parallax-header"> <a href="#0">
                                        <?php echo date_format(date_create($blogData->date),'M j, Y') ?>
                                        </a><span>Category :</span>
                                            <?php foreach($selectedCategory as $list): ?>
                                               <a
                                                href="<?php echo base_url() ?>blogs?category=<?php echo $list->blog_category ?>"
                                                rel="category tag"><?php echo $list->blog_category ?></a> 
                                            <?php endforeach; ?>
                                        </div>
                                        <!-- blog media -->
                                        <?php if($imageList): ?>
                                        <div class="blog-media fl-wrap nomar-bottom">
                                            <div class="single-slider-wrap slider-carousel-wrap ">
                                                <div class="single-slider cur_carousel-slider-container fl-wrap">
                                                <?php foreach($imageList as $list): ?>
                                                    <div class='slick-slide-item'>
                                                        <img  src='<?php echo base_url() ?>assets/uploads/blog/<?php echo $list->img_name ?>' alt=''>
                                                    </div>
                                                <?php endforeach ?>
                                                </div>
                                                <div class="sp-cont   sp-cont-prev"><i
                                                        class="fal fa-long-arrow-left"></i></div>
                                                <div class="sp-cont   sp-cont-next"><i
                                                        class="fal fa-long-arrow-right"></i></div>
                                            </div>
                                        </div> <!-- blog media end -->
                                        <?php endif ?>
                                        <div class="parallax-header fl-wrap">
                                            <span>Tags : </span>
                                            <?php foreach($selectdTags as $list): ?>
                                                <a href="<?php echo base_url() ?>blogs?tag=<?php echo $list->tag_name ?>" rel="tag"><?php echo $list->tag_name   ?></a>
                                            <?php endforeach ?>
                                        </div>
                                        <div class="blog-text fl-wrap">
                                            <div class="clearfix"></div>
                                            <?php echo $blogData->description ?>                                            
                                        </div>
                                    </div>
                                </div>
                                <!-- post end-->
                                <!-- post-author-->
                                
                                <!--comments end -->
                            </div>
                            <!-- blog-sidebar  -->
                            <div class="col-md-4">
                                <div class="blog-sidebar fl-wrap fixed-bar">
                                    
                                    <div id="tag_cloud-2"
                                        class="widget widget-wrap fl-wrap single-side-bar widget_tag_cloud">
                                        <h4 class="widget-title">Tags<span>01.</span></h4>
                                        <ul class="tagcloud">
                                            
                                            <?php foreach($tagList as $list): ?>
                                                <li><a href="<?php echo base_url() ?>blogs?tag=<?php echo $list->tag_name ?>" class="transition link"><?php echo $list->tag_name ?></a></li>
                                            <?php endforeach ?>
                                        </ul>
                                    
                                    <div id="categories-2"
                                        class="widget widget-wrap fl-wrap single-side-bar widget_categories">
                                        <h4 class="widget-title">Categories <span>02.</span></h4>
                                            <div class="widget-container fl-wrap">
                                                <ul class="cat-item">
                                                    <?php foreach($categoryList as $list): ?>
                                                        <li><a href="<?php echo base_url() ?>blogs?caterogy=<?php echo $list->blog_category ?>"><?php echo $list->blog_category ?></a></li>
                                                    <?php endforeach ?>
                                                </ul>
                                            </div>
                                    </div>
                                </div>
                            </div>
                            <!-- blog-sidebar end -->
                            <div class="limit-box fl-wrap"></div>
                        </div>
                        <!-- content-nav -->
                        <!-- <div class="content-nav">
                            <ul>
                                <li>
                                    <a href="http://solonick.webredox.net/blog-post-title-6/" class="ln"><i
                                            class="fal fa-arrow-left"></i><span class="tooltip">Prev - Tortor tempor in
                                            porta</span></a>
                                </li>
                                <li>
                                    <a href="http://solonick.webredox.net/blog/" class="cur-page"><span>All
                                            Posts</span></a>
                                </li>
                                <li>
                                    <a href="http://solonick.webredox.net/blog/" class="rn"><i
                                            class="fal fa-arrow-right"></i><span class="tooltip">Back To List
                                        </span></a>

                                </li>
                            </ul>
                        </div> -->
                        <!-- content-nav end-->
                    </div>
                    <!-- blog-container end    -->
                </div>
                <div class="bg-parallax-module" data-position-top="50" data-position-left="20"
                    data-scrollax="properties: { translateY: '-250px' }"></div>
                <div class="bg-parallax-module" data-position-top="40" data-position-left="70"
                    data-scrollax="properties: { translateY: '150px' }"></div>
                <div class="bg-parallax-module" data-position-top="80" data-position-left="80"
                    data-scrollax="properties: { translateY: '350px' }"></div>
                <div class="bg-parallax-module" data-position-top="95" data-position-left="40"
                    data-scrollax="properties: { translateY: '-550px' }"></div>
                <div class="sec-lines"></div>
            </section>
            <?php $this->load->view('layout/home_footer_view'); ?>