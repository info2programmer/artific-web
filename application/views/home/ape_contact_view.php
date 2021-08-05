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
            <h2>Get In <span>Touch </span></h2>
            <p> Got a project in mind ? Drop us a mail with the project details and we'll get back to you !</p>
            <div class="horizonral-subtitle"><span>Contact</span></div>
          </div>
        </div>
        <a href="#sec1" class="custom-scroll-link hero-start-link"><span>Let's Start</span> <i class="fal fa-long-arrow-down"></i></a>
      </section>
      <!-- section end-->
      <!-- section end-->
      <section data-scrollax-parent="true" id="sec1">
        <div class="section-subtitle" data-scrollax="properties: { translateY: '-250px' }">Get in Touch<span>//</span></div>
        <div class="container">
          <!-- contact details -->
          <div class="fl-wrap mar-bottom">
            <div class="row">
              <div class="col-md-3">
                <div class="pr-title fl-wrap">
                  <h3>Contact Details</h3>
                  <span>You can directly talk to us anytime you want</span>
                </div>
              </div>
              <div class="col-md-9">
                <!-- features-box-container -->
                <div class="features-box-container single-serv fl-wrap">
                  <div class="row">
                    <!--features-box -->
                    <div class="features-box col-md-6">
                      <div class="time-line-icon">
                        <i class="fal fa-mobile-android"></i>
                      </div>
                      <h3>01. Phone</h3>
                      <a href="tel:+917890186137">+91 78901 86137</a>
                    </div>
                    <!-- features-box end  -->
                    <!--features-box -->

                    <!-- features-box end  -->
                    <!--features-box -->
                    <div class="features-box col-md-6">
                      <div class="time-line-icon">
                        <i class="fal fa-envelope-open"></i>
                      </div>
                      <h3>03. Email</h3>
                      <a href="mailto:artific.reach@gmail.com">artific.reach@gmail.com</a>
                    </div>
                    <!-- features-box end  -->
                  </div>
                </div>
                <!-- features-box-container end  -->
              </div>
            </div>
          </div>

          <div class="fl-wrap mar-top">
            <div class="row">
              <div class="col-md-3">
                <div class="pr-title fl-wrap">
                  <h3>Send us your queries</h3>
                  <span>Send us your project details and we'll send you our quotation</span>
                </div>
              </div>
              <div class="col-md-7">
                <div id="contact-form">
                  <div id="message"></div>
                  <form class="custom-form" action="<?php echo base_url() ?>home/contactSubmit" method="POST">
                    <fieldset>
                      <div class="row">
                        <div class="col-md-6">
                          <label><i class="fal fa-user"></i></label>
                          <input type="text" name="txtName" id="name" placeholder="Your Name *" value="" required />
                        </div>
                        <div class="col-md-6">
                          <label><i class="fal fa-envelope"></i> </label>
                          <input type="text" name="txtEmail" id="email" placeholder="Email Address *" value="" required />
                        </div>
                        <div class="col-md-6">
                          <label><i class="fal fa-mobile-android"></i> </label>
                          <input type="text" name="txtPhone" id="phone" placeholder="Phone *" value="" required />
                        </div>
                        <div class="col-md-6">
                          <select name="txtSubject" id="subject" data-placeholder="Service" class="chosen-select sel-dec" required>
                            <option value="" selected hidden>Service</option>
                            <option value="Website">Website</option>
                            <option value="Android App">Android App</option>
                            <option value="SMO/SEO">SMO/SEO</option>
                            <option value="Software">Software</option>
                          </select>
                        </div>
                      </div>
                      <textarea name="txtMessage" id="comments" cols="40" rows="3" placeholder="Your Message:" required></textarea>
                      <div class="col-md-12">
                      <div class="g-recaptcha" data-sitekey="6LeXOOAbAAAAAO_rwutDmep-mMHrf6QJq1bC7Vdv"></div>
                      </div>

                      <div class="clearfix"></div>
                      <button class="btn float-btn flat-btn color-btn" id="submit">Send Message</button>
                    </fieldset>
                  </form>
                </div>
                <!-- contact form  end-->
              </div>
            </div>
          </div>
        </div>
        <div class="bg-parallax-module" data-position-top="70" data-position-left="20" data-scrollax="properties: { translateY: '-250px' }"></div>
        <div class="bg-parallax-module" data-position-top="40" data-position-left="70" data-scrollax="properties: { translateY: '150px' }"></div>
        <div class="bg-parallax-module" data-position-top="80" data-position-left="80" data-scrollax="properties: { translateY: '350px' }"></div>
        <div class="bg-parallax-module" data-position-top="95" data-position-left="40" data-scrollax="properties: { translateY: '-550px' }"></div>
        <div class="sec-lines"></div>
      </section>
      <?php if ($this->session->flashdata('succss_log')) : ?>
        <script>
          alert("Your message send successfully")
        </script>
      <?php endif ?>

      <?php $this->load->view('layout/home_footer_view'); ?>