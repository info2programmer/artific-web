<?php $this->load->view('layout/home_head_view'); ?>
        <div id="main">
        <?php $this->load->view('layout/home_header_view') ?>
        <!--  header end -->
        <?php $this->load->view('layout/home_side_nav_view') ?>
            <div id="wrapper" class="single-page-wrap">
                <!-- Content-->
                <div class="content">
                    <!-- section-->
                    <section class="parallax-section dark-bg sec-half parallax-sec-half-right" data-scrollax-parent="true">
                        <div class="bg par-elem"  data-bg="<?php echo base_url() ?>assets/ape/images/bg/27.jpg" data-scrollax="properties: { translateY: '30%' }"></div>
                        <div class="overlay"></div>
                        <div class="pattern-bg"></div>
                        <div class="container">
                            <div class="section-title">
                                <h2>My  <span> Last news </span> and <br>Updates </h2>
                                <p> If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. </p>
                                <div class="horizonral-subtitle"><span>Journal</span></div>
                            </div>
                        <a href="#sec1" class="custom-scroll-link hero-start-link"><span>Let's Start</span> <i class="fal fa-long-arrow-down"></i></a>
                        </div>
                    </section>
                    <!-- section end-->
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
                            <span>Filter by: </span>
                            <!-- filter tag   -->
                            <div class="tag-filter blog-btn-filter">
                                <div class="blog-btn">Tags <i class="fa fa-tags" aria-hidden="true"></i></div>
                                <ul>
                                    <?php foreach($blog_tag as $tag): ?>
                                        <li><a href="#"><?php echo strtoupper($tag->tag_name) ?></a></li>
                                    <?php endforeach ?>
                                </ul>
                            </div>
                            <!-- filter tag end  -->
                            <!-- filter category    -->
                            <div class="category-filter blog-btn-filter">
                                <div class="blog-btn">Categories <i class="fa fa-list-ul" aria-hidden="true"></i></div>
                                <ul>
                                <?php foreach($blog_category as $category): ?>
                                    <li><a href="#"><?php echo strtoupper($category->blog_category) ?></a></li>
                                <?php endforeach ?>
                                </ul>
                            </div>
                            <!-- filter category end  -->
                            <div class="blog-search">
                                <form action="#" class="searh-inner fl-wrap">
                                    <input name="se" id="se" type="text" class="search" placeholder="Search.." value="Search..." />
                                    <button class="search-submit color-bg" id="submit_btn"><i class="fa fa-search"></i> </button>
                                </form>
                            </div>
                        </div>
                        <!-- filter end    -->
                    </div>
                    <!-- single-page-fixed-row end-->
                    <!-- section --> 
                    <section data-scrollax-parent="true" id="sec1">
                        <div class="section-subtitle left-pos"  data-scrollax="properties: { translateY: '-250px' }" ><span>//</span>Journal</div>
                        <div class="container">
                            <!-- blog-container  -->
                            <div class="fl-wrap post-container">
                                <div class="row">
                                    <div class="col-md-8">
                                       
                                                                             
                                        <!-- post -->
                                        <?php foreach($blog_list as $list): ?>

                                            <!-- post -->
                                        <div class="post fl-wrap fw-post">
                                            <h2><a href="<?php echo base_url() ?>blog/<?php echo $list['blog_id'] ?>/<?php echo strtolower(str_replace(" ","-",trim($list['blog_title']))) ?>"><span><?php echo $list['blog_title'] ?></span></a></h2>
                                            <div class="parallax-header"> <a href="#"><?php echo date_format(date_create($list['date']),"M, d Y") ?></a><span>Category : </span><?php foreach($this->home_model->get_blog_category($list['blog_id']) as $category): ?>
                                                <a href="#"><?php echo $category->blog_category ?></a>
                                            <?php endforeach; ?></div>
                                            <!-- blog media -->
                                            <div class="blog-media fl-wrap nomar-bottom">
                                                <div class="single-slider-wrap slider-carousel-wrap ">
                                                    <div class="single-slider cur_carousel-slider-container fl-wrap"  >
                                                        <?php foreach($this->admin_model->get_all_records('tbl_blog_image','blog_id',$list['blog_id']) as $img): ?>
                                                        <div class="slick-slide-item"><img src="<?php echo base_url() ?>assets/layouts/layout3/blogimage/<?php echo $img['img_name'] ?>" alt=""></div>
                                                        <?php endforeach; ?>
                                                        
                                                    </div>
                                                    <div class="sp-cont   sp-cont-prev"><i class="fal fa-long-arrow-left"></i></div>
                                                    <div class="sp-cont   sp-cont-next"><i class="fal fa-long-arrow-right"></i></div>
                                                </div>
                                            </div>
                                            <!-- blog media end -->
                                            <div class="parallax-header fl-wrap"><span>Tags : </span>
                                            <?php foreach($this->admin_model->get_all_records('tbl_blog_tag','blog_id',$list['blog_id']) as $tag): ?>
                                            <a href="#"><?php echo $tag['tag_name'] ?></a>
                                            <?php endforeach ?>
                                            </div>
                                            <div class="blog-text fl-wrap">
                                                <div class="clearfix"></div>
                                                <h3><a href="<?php echo base_url() ?>blog/<?php echo $list['blog_id'] ?>/<?php echo strtolower(str_replace(" ","-",trim($list['blog_title']))) ?>" ><strong><?php echo $list['blog_title'] ?></strong></a></h3>
                                                <p>
                                                   <?php echo $list['small_description'] ?>
                                                </p>
                                                <a href="<?php echo base_url() ?>blog/<?php echo $list['blog_id'] ?>/<?php echo strtolower(str_replace(" ","-",trim($list['blog_title']))) ?>" class="btn float-btn color-btn flat-btn">Read more </a>
                                                <!-- <ul class="post-counter">
                                                    <li><i class="fa fa-eye"></i><span>687</span></li>
                                                    <li><i class="fal fa-comments-alt"></i><span>10</span></li>
                                                </ul> -->
                                            </div>
                                        </div>
                                        <!-- post end-->
                                        
                                        <?php endforeach ?>
                                        
                                        <!-- post end--> 
                                    </div>
                                    <!-- blog-sidebar  -->
                                    <div class="col-md-4">
                                        <div class="blog-sidebar fl-wrap fixed-bar">
                                             
                                            <!-- widget-wrap -->
                                            <div class="widget-wrap fl-wrap">
                                                <h4 class="widget-title"><span>01.</span> Last Posts</h4>
                                                <div class="widget-container fl-wrap">
                                                    <div class="widget-posts fl-wrap">
                                                        <ul>
                                                            <?php $count=0 ?>
                                                            <?php foreach($blog_list as $list): ?>
                                                                <?php ++$count ?>
                                                                <?php if($count>6): ?>
                                                                    <?php break; ?>
                                                                <?php endif ?>
                                                            <li class="clearfix">
                                                                <a href="#"  class="widget-posts-img">
                                                                <?php foreach($this->admin_model->get_all_records('tbl_blog_image','blog_id',$list['blog_id']) as $img): ?>
                                                                    <img src="<?php echo base_url() ?>assets/layouts/layout3/blogimage/<?php echo $img['img_name'] ?>" class="respimg" alt="">
                                                                   <?php break; ?>
                                                                <?php endforeach ?>
                                                                </a>
                                                                <div class="widget-posts-descr">
                                                                    <a href="#" title=""><?php echo $list['blog_title'] ?></a>
                                                                    <span class="widget-posts-date"><?php echo date_format(date_create($list['date']),"M, d Y") ?> </span> 
                                                                </div>
                                                            </li>
                                                            <?php endforeach ?>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- widget-wrap end  --> 
                                            <!-- widget-wrap -->
                                            <div class="widget-wrap fl-wrap">
                                                <h4 class="widget-title"><span>02.</span> Tags</h4>
                                                <div class="widget-container fl-wrap">
                                                    <ul class="tagcloud">
                                                    <?php $tagCount = 0 ?>
                                                        <?php foreach($blog_tag as $tag): ?>
                                                            <?php ++$tagCount ?>
                                                            <?php if($tagCount > 6): ?>
                                                                <?php break; ?>
                                                            <?php endif ?>
                                                            <li><a href='#' class="transition link"><?php echo $tag->tag_name ?></a></li>
                                                        <?php endforeach ?>
                                                    </ul>
                                                </div>
                                            </div>
                                            <!-- widget-wrap end  -->  
                                                                                  
                                            <!-- widget-wrap -->
                                            <div class="widget-wrap fl-wrap">
                                                <h4 class="widget-title"><span>03.</span> Categories</h4>
                                                <div class="widget-container fl-wrap">
                                                    <ul class="cat-item">
                                                    <?php $categoyCount = 0 ?>
                                                    <?php foreach($blog_category as $category): ?>
                                                            <?php ++$categoyCount ?>
                                                            <?php if($categoyCount > 6): ?>
                                                                <?php break; ?>
                                                            <?php endif ?>
                                                            <li><a href="#"><?php echo $category->blog_category  ?></a> </li>
                                                        <?php endforeach ?>
                                                    </ul>
                                                </div>
                                            </div>
                                            <!-- widget-wrap end  -->                                                                                                                                          
                                        </div>
                                    </div>
                                    <!-- blog-sidebar end -->
                                    <div class="limit-box fl-wrap"></div>
                                </div>
                                <!-- content-nav -->
                                <div class="content-nav">
                                    <ul>
                                        <li><a href="blog.html" class="ln"><i class="fal fa-arrow-left"></i><span class="tooltip">Prev - page 1</span></a></li>
                                        <li>
                                            <span class="cur-page"><span>Page 2</span></span>
                                        </li>
                                        <li><a href="blog.html" class="rn"><i class="fal fa-arrow-right"></i><span class="tooltip">Next - page 2 </span></a></li>
                                    </ul>
                                </div>
                                <!-- content-nav end-->     
                            </div>
                            <!-- blog-container end    -->
                        </div>
                        <div class="bg-parallax-module" data-position-top="50"  data-position-left="20" data-scrollax="properties: { translateY: '-250px' }"></div>
                        <div class="bg-parallax-module" data-position-top="40"  data-position-left="70" data-scrollax="properties: { translateY: '150px' }"></div>
                        <div class="bg-parallax-module" data-position-top="80"  data-position-left="80" data-scrollax="properties: { translateY: '350px' }"></div>
                        <div class="bg-parallax-module" data-position-top="95"  data-position-left="40" data-scrollax="properties: { translateY: '-550px' }"></div>
                        <div class="sec-lines"></div>
                    </section>
                    <?php $this->load->view('layout/home_footer_view'); ?>
                    