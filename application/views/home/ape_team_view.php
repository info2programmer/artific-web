<?php $this->load->view('layout/home_head_view'); ?>
<div id="main">
  <?php $this->load->view('layout/home_header_view') ?>
  <!--  header end -->
  <?php $this->load->view('layout/home_side_nav_view') ?>
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
        <a href="<?php echo base_url() ?>" class="single-page-fixed-row-link"><i class="fal fa-arrow-left"></i> <span>Back to home</span></a>
      </div>
      <!-- section-->
      <section class="parallax-section dark-bg sec-half parallax-sec-half-right" data-scrollax-parent="true">
        <div class="bg par-elem" data-bg="<?php echo base_url() ?>assets/ape/images/bg/17.jpg" data-scrollax="properties: { translateY: '30%' }"></div>
        <div class="overlay"></div>
        <div class="pattern-bg"></div>
        <div class="container">
          <div class="section-title">
            <h2>THE <span>ARTIFACTS</span> <br> OF ARTIFIC</h2>
            <p> Get acquainted with our enigmatic team members and know a little more about us ! </p>
            <div class="horizonral-subtitle"><span>Our team</span></div>
          </div>
          <a href="#sec1" class="custom-scroll-link hero-start-link"><span>Let's Start</span> <i class="fal fa-long-arrow-down"></i></a>
        </div>
      </section>
      <!-- section end-->
      <!-- section end-->
      <section data-scrollax-parent="true" id="sec1">
        <div class="section-subtitle right-pos" data-scrollax="properties: { translateY: '-250px' }"><span>//</span>Project Title</div>
        <div class="container">
          <!-- team-box   -->
          <div class="team-box">
            <div class="team-photo">
              <div class="overlay"></div>

              <img src="<?php echo base_url() ?>assets/ape/images/team/1.jpg" alt="" class="respimg">
            </div>
            <div class="team-info">
              <h3>Jayanta</h3>
              <h4>The Marketing Marvel </h4>
              <p>The contact thread weaver of our team , wherever the clients are he is always ready to find the best sollutions to there requirements </p>

            </div>
          </div>
          <!-- team-box end -->
          <!-- team-box   -->
          <div class="team-box">
            <div class="team-photo">
              <div class="overlay"></div>

              <img src="<?php echo base_url() ?>assets/ape/images/team/2.jpg" alt="" class="respimg">
            </div>
            <div class="team-info">
              <h3>Jit</h3>
              <h4>Animation Wizard</h4>
              <p>The requirement be big or small , he is known to make the best out of any given topic when it comes to animation</p>

            </div>
          </div>
          <!-- team-box end -->
          <!-- team-box   -->
          <div class="team-box">
            <div class="team-photo">
              <div class="overlay"></div>

              <img src="<?php echo base_url() ?>assets/ape/images/team/3.jpg" alt="" class="respimg">
            </div>
            <div class="team-info">
              <h3>Sayantan</h3>
              <h4>The Counselor</h4>
              <p>When it come to cross checking information or knowing more about some new technical info , we turn to this great sage for advice </p>

            </div>
          </div>
          <!-- team-box end -->
          <!-- team-box   -->
          <div class="team-box">
            <div class="team-photo">
              <div class="overlay"></div>

              <img src="<?php echo base_url() ?>assets/ape/images/team/4.jpg" alt="" class="respimg">
            </div>
            <div class="team-info">
              <h3>Saikat</h3>
              <h4>Programming Sorceror</h4>
              <p>The guy in chage of mystic data manipulation , creating the core building blocks of our work . </p>

            </div>
          </div>
          <!-- team-box end -->
          <!-- team-box   -->
          <div class="team-box">
            <div class="team-photo">
              <div class="overlay"></div>

              <img src="<?php echo base_url() ?>assets/ape/images/team/5.jpg" alt="" class="respimg">
            </div>
            <div class="team-info">
              <h3>Sreejit</h3>
              <h4>Whimsical Bard</h4>
              <p>The jack of all trades , master of none . the guy who is juggling one thing to the other in an endless pursuit of balancing all the things we can provide you in artific.</p>
            </div>
          </div>
          <!-- team-box end -->
        </div>
        <div class="bg-parallax-module" data-position-top="50" data-position-left="20" data-scrollax="properties: { translateY: '-250px' }"></div>
        <div class="bg-parallax-module" data-position-top="40" data-position-left="70" data-scrollax="properties: { translateY: '150px' }"></div>
        <div class="bg-parallax-module" data-position-top="80" data-position-left="80" data-scrollax="properties: { translateY: '350px' }"></div>
        <div class="bg-parallax-module" data-position-top="95" data-position-left="40" data-scrollax="properties: { translateY: '-550px' }"></div>
        <div class="sec-lines"></div>
      </section>
      <!-- section end-->
      <?php if ($this->session->flashdata('succss_log')) : ?>
        <script>
          alert("Your message send successfully")
        </script>
      <?php endif ?>

      <?php $this->load->view('layout/home_footer_view'); ?>