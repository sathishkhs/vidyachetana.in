 <!--Contact page Start-->
 <section class="contact-page">
            <div class="container">
                <div class="section-title text-center">
                    <span class="section-title__tagline">Contact Vidya Chetana</span>
                    <h2 class="section-title__title_small">We would be glad to hear from you.</h2>
                </div>
                <div class="row">
                    <div class="col-xl-6 col-lg-6">
                        <div class="contact-page__left">
                           
              
                            <div class="contact-page__contact-info">
                                <ul class="contact-page__contact-list list-unstyled">
                                    <li>
                                        <div class="icon p-2">
                                            <span class="fa fa-phone"></span>
                                        </div>
                                        <div class="text">
                                            <p class="section-title__tagline">Call Us</p>
                                            <h5><a href="tel:<?php echo $settings->TOLL_FREE_TIME; ?>"><?php echo $settings->TOLL_FREE_TIME; ?></a></h5>
                                            <p>Between 9 a.m. to 6 p.m. from Monday to Saturday</p>
                                        </div>
                                    </li>
                                    <li>
                                    <div class="icon p-2">
                                            <span class="fa fa-email"></span>
                                        </div>
                                        <div class="text">
                                            <p class="section-title__tagline">Email Address</p>
                                            <h5> <?php echo $settings->EMAIL; ?> </h5>
                                           
                                        </div>
                                       
                                    </li>
                                    <li>
                                        <div class="icon p-2">
                                            <span class="icon-address"></span>
                                        </div>
                                        <div class="text">
                                            <p class="section-title__tagline">Kitchen Address</p>
                                            <h5>Vidya Chetana, </h5>
                                            <p>
                                           <?php echo $settings->OFFICE_ADDRESS; ?>
                                                <br> Contact number: <?php echo $settings->TOLL_FREE_TIME; ?>
                                            </p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6">
                        <div class="contact-page__form">
                            <form action="http://layerdrops.com/halpes/assets/inc/sendemail.php" class="contact-page__main-form contact-form-validated">
                                <p class="text-center">You can send us a message through the below form <br>and we will get in touch with you.</p>
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="contact-page__input-box">
                                            <input type="text" placeholder="Your name" name="name">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="contact-page__input-box">
                                            <input type="email" placeholder="Email address" name="email">
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="contact-page__input-box">
                                            <input type="text" placeholder="Subject" name="subject">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="contact-page__input-box">
                                            <input type="text" placeholder="Phone number" name="phone">
                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <div class="contact-page__input-box">
                                            <textarea name="message" placeholder="Write message"></textarea>
                                        </div>
                                        <button type="submit" class="thm-btn contact-page__btn"><i class="fas fa-arrow-circle-right"></i>Send a Message</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Contact page End-->