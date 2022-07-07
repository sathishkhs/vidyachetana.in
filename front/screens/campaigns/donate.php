<style>
    .campaign-wrap img,
    .customer-logos img {
        width: 100% !important;
    }
</style>


<section class="contact-page">
            <div class="container">
                
                <div class="row">
                    <div class="col-xl-6 col-lg-6">
                        <div class="contact-page__left">
                           
                            
                            <div class="contact-page__contact-info">
                            <div class="section-title">
                <span class="section-title__tagline mt-4">CHANGE A CHILD’S LIFE WITH EDUCATION!</span>
            </div>
            <h4>Education has the power to break
                the vicious poverty-illiteracy cycle.</h4>

            <p>An educated child is an asset for the family in particular, and the
                country at large. Education enables children to grow up to be
                resourceful and independent adults who can provide for themselves.</p>

            <p>However, education remains a distant dream for socio-economically
                underprivileged children. Their poor socio-economic conditions
                compel them to shoulder the responsibility of earning for a living
                rather than attending school.</p>
            <p>This is where Vidya Chetana, a Scholarship Programme by Youth for
                Seva plays a key role. It provides a platform for socio-economically
                children to receive financial support for their education.</p>


                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6">
                        <div class="contact-page__form">
                            <form action="" class="contact-page__main-form contact-form-validated" novalidate="novalidate">
                                <input type="hidden" name="currency" value="INR">
                                <input type="hidden" name="citizen" value="indian">
                                <input type="hidden" name="table_name" value="payments">
                                <input type="hidden" name="sem" value="<?php echo !empty($this->input->get('sem')) ? $this->input->get('sem') : '' ?>">
                                <!-- <p class="text-center">You can send us a message through the below form <br>and we will get in touch with you.</p> -->
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="contact-page__input-box">
                                        <div class="form-group d-flex flex-wrap ">
                                        <div class="form-check d-flex">
                                            <input class="form-check-input" type="radio" checked id="fiveh" name="radioamount">
                                            <label class="form-check-label" for="fiveh"> ₹500</label> &nbsp;
                                        </div>
                                        <div class="form-check d-flex">
                                            <input class="form-check-input" type="radio" id="onek" name="radioamount">
                                            <label class="form-check-label" for="onek"> ₹750</label> &nbsp;
                                        </div>
                                        <div class="form-check d-flex">
                                            <input class="form-check-input" type="radio" id="twok" name="radioamount">
                                            <label class="form-check-label" for="twok"> ₹1000</label> &nbsp;
                                        </div>
                                        <div class="form-check d-flex">
                                            <input class="form-check-input" type="radio" id="threek" name="radioamount">
                                            <label class="form-check-label" for="threek"> ₹1500</label> &nbsp;
                                        </div>

                                        <div class="form-check d-flex">
                                            <input class="form-check-input" type="radio" id="otherk" name="radioamount">
                                            <label class="form-check-label" for="otherk"> Other amount</label> &nbsp;
                                        </div>
                                        <div class="form-check d-flex">

                                            <div class="invalid-feedback">Amount field cannot be blank!</div>
                                        </div>

                                    </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="contact-page__input-box">
                                            <input  type="text" name="amount" placeholder="Other amount*" id="amount" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="contact-page__input-box">
                                        <input  type="text" name="name" placeholder="Full Name*" required>
                                        <div class="invalid-feedback">Full name field cannot be blank!</div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="contact-page__input-box">
                                        <input id="mobile_number"  type="text" name="mobile_number" placeholder="Mobile Number*" required>
                                        <div class="invalid-feedback">Mobile Number field cannot be blank!</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="contact-page__input-box">
                                        <input  type="email" name="email" placeholder="Email*" required>
                                        <div class="invalid-feedback">Email field cannot be blank!</div>
                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <div class="contact-page__input-box">
                                        <input  type="text" name="pan" placeholder="Pan Number*" required>
                                        <div class="invalid-feedback">Pan Number field cannot be blank!</div>
                                        </div>
                                       
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="contact-page__input-box">
                                        <input  type="text" name="city" placeholder="City">
                                        <div class="invalid-feedback">City field cannot be blank!</div>
                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                       
                                        <button type="submit" class="thm-btn contact-page__btn"><i class="fas fa-arrow-circle-right"></i>Donate Now</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>




<!-- <section class="contact-page">
<div class="container">
    <div class="row mt-4">
        <div class="col-lg-7  ">
            
            <img src="assets/images/backgrounds/campaign-banner.jpg" alt="donate-banner">

        </div>
        <div class="col-lg-5 box-shadow1px mt-1">

            <div class="contact-page__form">
                <form method="post" action="<?php echo base_url(); ?>donate<?php echo !empty($this->input->get('sem')) ? '?sem=' . $this->input->get('sem') : ''; ?>" id="donate-form" class="requires-validation" novalidate method="post" enctype="multipart/form-data">
                    <input type="hidden" name="currency" value="INR">
                    <input type="hidden" name="citizen" value="indian">
                    <input type="hidden" name="table_name" value="payments">
                    <input type="hidden" name="sem" value="<?php echo !empty($this->input->get('sem')) ? $this->input->get('sem') : '' ?>">
                    
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="contact-page__input-box">
                                <div class="display-flex flex-wrap">
                                    

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="contact-page__input-box">
                                <input class="form-control mt-1" type="text" name="amount" placeholder="Other amount*" id="amount" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="contact-page__input-box">
                                <input class="form-control" type="text" name="name" placeholder="Full Name*" required>
                                <div class="invalid-feedback">Full name field cannot be blank!</div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="contact-page__input-box">
                                <input id="mobile_number" class="form-control number" type="text" name="mobile_number" placeholder="Mobile Number*" required>
                                <div class="invalid-feedback">Mobile Number field cannot be blank!</div>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="contact-page__input-box">
                                <input class="form-control" type="email" name="email" placeholder="Email*" required>
                                <div class="invalid-feedback">Email field cannot be blank!</div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="contact-page__input-box">
                                <input class="form-control" type="text" name="pan" placeholder="Pan Number*" required>
                                <div class="invalid-feedback">Pan Number field cannot be blank!</div>
                            </div>
                        </div>
                        <div class="col-xl-12">
                            <div class="contact-page__input-box">
                                <input class="form-control" type="text" name="city" placeholder="City">
                                <div class="invalid-feedback">City field cannot be blank!</div>
                            </div>
                            <button type="submit" class="thm-btn contact-page__btn"><i class="fas fa-arrow-circle-right"></i>Send a Message</button>
                        </div>
                    </div>
                </form>
                <div></div>
            </div>




          
        </div>
    </div>
</div>
</section> -->
<!-- 
<section class="container mt-4">
    <div class="row">
        <div class="col-sm-12 text-center">
            <div class="section-title">
                <span class="section-title__tagline mt-4">CHANGE A CHILD’S LIFE WITH EDUCATION!</span>
            </div>
            <h4>Education has the power to break
                the vicious poverty-illiteracy cycle.</h4>

            <p>An educated child is an asset for the family in particular, and the
                country at large. Education enables children to grow up to be
                resourceful and independent adults who can provide for themselves.</p>

            <p>However, education remains a distant dream for socio-economically
                underprivileged children. Their poor socio-economic conditions
                compel them to shoulder the responsibility of earning for a living
                rather than attending school.</p>
            <p>This is where Vidya Chetana, a Scholarship Programme by Youth for
                Seva plays a key role. It provides a platform for socio-economically
                children to receive financial support for their education.</p>

        </div>



    </div>
</section> -->



<section>
    <div class="container">
    <div class="row mt-5">
                    <div class="col-sm-12">
                   
                    <div class="section-title text-center">
                        <span class="section-title__tagline mt-4">Our Current Corporate Partners</span>
                    </div>
                    <section class="customer-logos slider">
                        <div class="slide"><img loading="lazy" class="lozad img-fluid" src="assets/images/partners/1.jpg" alt="partner 3"  style="width: 100%; height: 100%"></div>
                        <div class="slide"><img loading="lazy" class="lozad img-fluid" src="assets/images/partners/2.jpg" alt="partner 4"  style="width: 100%; height: 100%"></div>
                        <div class="slide"><img loading="lazy" class="lozad img-fluid" src="assets/images/partners/3.jpg" alt="partner 5"  style="width: 100%; height: 100%"></div>
                        <div class="slide"><img loading="lazy" class="lozad img-fluid" src="assets/images/partners/4.jpg" alt="partner 6"  style="width: 100%; height: 100%"></div>
                        <div class="slide"><img loading="lazy" class="lozad img-fluid" src="assets/images/partners/5.jpg" alt="partner 7"  style="width: 100%; height: 100%"></div>
                        <div class="slide"><img loading="lazy" class="lozad img-fluid" src="assets/images/partners/6.jpg" alt="partner 7"  style="width: 100%; height: 100%"></div>
                        <!-- <div class="slide"><img loading="lazy" class="lozad img-fluid" src="assets/images/partners/7.jpg" alt="partner 7"  style="width: 100%; height: 100%"></div> -->
                        <!-- <div class="slide p-4"><img loading="lazy" class="lozad img-fluid" src="assets/images/partners/8.jpg" alt="partner 7"  style="width: 100%; height: 100%"></div> -->
                        <div class="slide"><img loading="lazy" class="lozad img-fluid" src="assets/images/partners/9.jpg" alt="partner 7"  style="width: 100%; height: 100%"></div>
                        <!-- <div class="slide p-4"><img loading="lazy" class="lozad img-fluid" src="assets/images/partners/10.jpg" alt="partner 7"  style="width: 100%; height: 100%"></div> -->
                        <div class="slide"><img loading="lazy" class="lozad img-fluid" src="assets/images/partners/11.jpg" alt="partner 7"  style="width: 100%; height: 100%"></div>
                        <div class="slide"><img loading="lazy" class="lozad img-fluid" src="assets/images/partners/12.jpg" alt="partner 7"  style="width: 100%; height: 100%"></div>
                        <div class="slide"><img loading="lazy" class="lozad img-fluid" src="assets/images/partners/13.jpg" alt="partner 7"  style="width: 100%; height: 100%"></div>
                        <div class="slide"><img loading="lazy" class="lozad img-fluid" src="assets/images/partners/14.jpg" alt="partner 7"  style="width: 100%; height: 100%"></div>
                        <div class="slide"><img loading="lazy" class="lozad img-fluid" src="assets/images/partners/15.jpg" alt="partner 7"  style="width: 100%; height: 100%"></div>
                        <div class="slide"><img loading="lazy" class="lozad img-fluid" src="assets/images/partners/16.jpg" alt="partner 7"  style="width: 100%; height: 100%"></div>
                        <div class="slide"><img loading="lazy" class="lozad img-fluid" src="assets/images/partners/17.jpg" alt="partner 7"  style="width: 100%; height: 100%"></div>
                        <div class="slide"><img loading="lazy" class="lozad img-fluid" src="assets/images/partners/18.jpg" alt="partner 7"  style="width: 100%; height: 100%"></div>
                        <div class="slide"><img loading="lazy" class="lozad img-fluid" src="assets/images/partners/19.jpg" alt="partner 7"  style="width: 100%; height: 100%"></div>
                        <div class="slide"><img loading="lazy" class="lozad img-fluid" src="assets/images/partners/20.jpg" alt="partner 7"  style="width: 100%; height: 100%"></div>
                        <div class="slide"><img loading="lazy" class="lozad img-fluid" src="assets/images/partners/21.jpg" alt="partner 7"  style="width: 100%; height: 100%"></div>
                    </section>
         
                    </div>
                </div>
    </div>
</section>

<section class="text-center">
    <h2 class="section-title__title_small text-center">IMPACT SO FAR</h2>
    <div class="campaign-wrap">
        <div class="counter col_fourth">
            <img class="" src="assets/images/campaigns/meal-served.png" style="width:25%">
            <h2 class="timer count-title count-number" data-to="7275" data-speed="7275"></h2>
            <p class="count-text ">children required scholarship</p>
        </div>

        <div class="counter col_fourth">
            <img src="assets/images/campaigns/beneficiaries.png" style="width:25%">
            <h2 class="timer count-title count-number" data-to="5775" data-speed="5775"></h2>
            <p class="count-text ">children received
                scholarship</p>
        </div>

        <div class="counter col_fourth">
            <img src="assets/images/campaigns/hospital.png" style="width:25%">
            <h2 class="timer count-title count-number" data-to="1500" data-speed="1500"></h2>
            <p class="count-text ">children are
                waiting for your
                support</p>
        </div>
        <!-- <div class="counter col_fourth">
            <img src="assets/images/campaigns/school-meal-programme.png" style="width:25%">
            <h2 class="timer count-title count-number" data-to="<?php echo $impact_numbers->schools_on_wheels; ?>" data-speed="1500"></h2>
            <p class="count-text ">School on wheels</p>
           
        </div> -->



    </div>
</section>

<!-- <div class="register-photo" id="form-campaign">
    <div class="form-container">
        <div class="image-holder"></div>
        <form method="post" action="<?php echo base_url(); ?>donate" id="donate-form" class="requires-validation" novalidate method="post" enctype="multipart/form-data">
            <input type="hidden" name="currency" value="INR">
            <input type="hidden" name="citizen" value="indian">
            <input type="hidden" name="table_name" value="payments">
            <h5 class="mb-2 ">Care to feed those in need</h5>
            <div class="display-flex flex-wrap">
            <div class="form-check-inline">
                <label class="form-check-label" for="programme">
                    <input type="radio" class=" form-check-input m-1"  name="programme" value="hospital_feeding" checked="checked" required>Hospital Feeding Programme
                </label>
                </div>
                <div class="form-check-inline">
                <label class="form-check-label" for="programme">
                    <input type="radio" class=" form-check-input m-1"  name="programme" value="school_meal" required>School Meal Programme
                </label>
                <div class="invalid-feedback">Select any one Programme</div>
                </div>
            </div>
               
                
 
            <div class="display-flex flex-wrap">
                <div class="form-group w-50 p-1">
                    <input class="form-control" type="text" name="name" placeholder="Full Name*" required>
                    <div class="invalid-feedback">Full name field cannot be blank!</div>
                </div>
               
                <div class="form-group w-50 p-1">
                    <input class="form-control" type="text" name="mobile_number" placeholder="Mobile Number*" required>
                    <div class="invalid-feedback">Mobile Number field cannot be blank!</div>
                </div>
            </div>
            <div class="form-group ">
                    <input class="form-control" type="email" name="email" placeholder="Email*" required>
                    <div class="invalid-feedback">Email field cannot be blank!</div>
                    
                </div>
            <div class="display-flex flex-wrap">
                <div class="form-group w-50 p-1">
                    <input class="form-control" type="text" name="pan" placeholder="Pan Number*" required>
                    <div class="invalid-feedback">Pan Number field cannot be blank!</div>
                </div>
                <div class="form-group w-50 p-1">
                    <input class="form-control" type="text" name="city" placeholder="City">
                    <div class="invalid-feedback">City field cannot be blank!</div>
                </div>
            </div>
           

            <div class="display-flex flex-wrap">
                <div class=" form-group w-45 p-1 ">
                    <select class="form-control border-1 drop-select" name="amount" id="amount" required onchange="selection(this.value)"> 
                        <option value="0" >Select Meal Quantity</option>
                        <option id="mintwo" value="200" >4</option>
                        <option id="one" value="500" >10</option>
                        <option id="two" value="1000">20</option>
                        <option id="three" value="1500">30</option>
                        <option id="five" value="2500">50</option>
                        <option id="thousand" value="5000">100</option>
                        <option id="fifteen" value="10000">200</option>
                        <option id="twenty" value="25000">500</option>
                        <option id="other" value="0">Other</option>
                    </select>
                    <div class="invalid-feedback">Amount field cannot be blank!</div>
                  
                    
                </div>
                <div class=" form-group  p-1 display-flex align-items-center">
                    <span style="">Or</span>
                </div>
               
                <div class="form-group w-45 p-1">
                    <input class="form-control border-1 drop-select" type="text" name="quantity" id="quantity" placeholder="Enter Qty" >
                    <div class="invalid-feedback">Quantity field cannot be blank!</div>
                </div>
                <div class="form-check">
                    <input  class="form-check-input" type="checkbox" id="savedate" name="savedate" placeholder="Save Date*" style="font-size:15px"/>
                    <label for="savedate" class="form-check-label checkbox-label" style="font-size:15px">Reserve a date for Annadana Seva</label>
                </div>

                <div class="col-xs-12 save-date w-100">

                </div>
                <div class="save-date-text">

                </div>
                <div class="form-check ">
                    <input  class="form-check-input" type="checkbox" id="receive_updates" name="receive_updates" placeholder="Receive Updates" style="font-size:15px"/>
                    <label for="receive_updates" class="form-check-label checkbox-label" style="font-size:15px">I want to receive photos/videos of food service done on my selected special day.</label>
                </div>
                
                 <div class="col-xs-12 receive-updates-number w-100">

                </div>
            </div>
            <div class="form-group text-center">
                <button id="submit" type="submit" value="Donate Now" class="btn btn-primary px-2 py-3 btn-full  rounded w-100 " onclick="form_submit()">
                    <span class="MuiButton-label jss92 display-flex justify-content-between align-items-center"><span id="meal" class="jss89 jss93">4 meals | ₹ 200</span><span class="jss94">SHARE UNLIMITED MEALS</span></span>
                </button>   
                Or
                <a href="corporate-giving" class="btn btn-primary px-2 py-3 btn-full  rounded w-100 " >
                    <span class="jss94">BECOME OUR CORPORATE PARTNER</span>
</a> 
                <small class="text-center">Avail tax exemption under Section 80G</small>
            </div>

        </form>
    </div>
</div> -->


<section class="testimonial-one about-page-testimonial">
    <div class="testimonial-one-bg" style="background-image: url(assets/images/backgrounds/testimonial-1-bg.jpg)"></div>
    <div class="container">
        <div class="row">
            <div class="col-xl-4">
                <div class="testimonial-one__left">
                    <div class="section-title text-left">
                        <span class="section-title__tagline">SUPPORTERS SPEAK</span>
                        <h2 class="section-title__title">They identified with our vision and partnered with us to make it a reality.</h2>
                    </div>
                </div>
            </div>
            <div class="col-xl-8">
                <div class="testimonial-one__right">
                    <div class="testimonial-one__carousel owl-theme owl-carousel">
                        <!--Testimonial One Single-->
                        <div class="testimonial-one__single">
                            <p class="testimonial-one__text">I have been associated with Youth For Seva from its inception. One of the important activities undertaken by them is Vidya Chetana Sponsor A Child initiative.This gives the donor joy and also satisfaction of educating a deserving Child. They inform us about the progress of the child in terms of the child's marks and other achievements. We also get to see and interact with the children.It gives enormous satisfaction that your donation goes to a noble/worthy cause and this NGO spends all the money for the cause and not for "establishment" expenses.</p>
                            <div class="testimonial-one__client-info">
                                <div class="testimonial-one__client-img">
                                    <img src="assets/images/testimonial/devendra_joshi_CSR.jpg" alt="">
                                    <div class="testimonial-one__quote">

                                    </div>
                                </div>
                                <div class="testimonial-one__client-name">
                                    <h3>R Vaidyanathan</h3>
                                    <!-- <p>Dy. General Manager, CSR, BPCL </p> -->
                                </div>
                            </div>
                        </div>
                        <!--Testimonial One Single-->
                        <div class="testimonial-one__single">
                            <p class="testimonial-one__text">I have been associated with Youth For Seva from its inception. One of the important activities undertaken by them is Vidya Chetana Sponsor A Child initiative.This gives the donor joy and also satisfaction of educating a deserving Child. They inform us about the progress of the child in terms of the child's marks and other achievements. We also get to see and interact with the children.It gives enormous satisfaction that your donation goes to a noble/worthy cause and this NGO spends all the money for the cause and not for "establishment" expenses.</p>
                            <div class="testimonial-one__client-info">
                                <div class="testimonial-one__client-img">
                                    <img src="assets/images/testimonial/mayur_mehta_JBCPL.jpg" alt="">
                                    <div class="testimonial-one__quote">

                                    </div>
                                </div>
                                <div class="testimonial-one__client-name">
                                    <h3>Srimathi Prasad</h3>
                                    <!-- <p> Company Secretary & Vice-President Compliance, JBCPL</p> -->
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<div class="col-sm-12 col-md-12 mx-auto">
    <!--<div class="form-body">-->
    <div class="row">
        <div class="form-holder">
            <div class="form-content">
                <div class="form-items">
                    <!--                    <h3 class="text-center">Akshayachaitanya Donation Page</h3>-->
                    <!--                    <h4>Select any payment gateway to complete payment.</h4>-->

                    <form id="razorpay-form" action="<?php echo base_url(); ?>campaigns/save_payment" method="POST">
                        <script type="text/javascript" src="https://checkout.razorpay.com/v1/checkout.js" data-buttontext="" data-key="<?php echo $key; ?>" data-amount="<?php echo $amount; ?>" data-currency="INR" data-name="<?php echo $name ?>" data-image="<?php echo $image ?>" data-description="<?php echo $description ?>" data-prefill.name="<?php echo $prefill['name'] ?>" data-prefill.email="<?php echo $prefill['email'] ?>" data-prefill.contact="<?php echo $prefill['contact'] ?>" data-prefill.pan="<?php echo $prefill['pan'] ?>" data-notes.pan="<?php echo $prefill['pan'] ?>" data-notes.shopping_order_id="<?php echo $notes['merchant_order_id']; ?> " data-modal.confirm_close='true' data-modal.ondismiss="this.modal_close()" <?php if ($displayCurrency !== 'INR') { ?> data-display_amount="<?php echo $display_amount ?>" <?php } ?> <?php if ($displayCurrency !== 'INR') { ?> data-display_currency="<?php echo $display_currency ?>" <?php } ?> data-redirect='true' data-callback_url="<?php echo base_url(); ?>campaigns/save_payment/<?php echo $insert_id . '/' . $table_name; ?>">


                        </script>

                        <!-- Any extra fields to be submitted with the form but not sent to Razorpay -->
                        <input type="hidden" name="receipt" value="<?php echo $notes['merchant_order_id']; ?>">
                        <input type="hidden" name="order_id" value="<?php echo $order_id; ?>">
                        <input type="hidden" name="name" value="<?php echo $prefill['name']  ?>">
                        <input type="hidden" name="email" value="<?php echo  $prefill['email'] ?>">
                        <input type="hidden" name="mobile_number" value="<?php echo $prefill['contact']; ?>">
                        <input type="hidden" name="city" value="<?php echo $notes['city']; ?>">
                        <input type="hidden" name="pan" value="<?php echo $prefill['pan']; ?>">
                        <input type="hidden" name="dob" value="<?php echo $prefill['dob']; ?>">
                        <input type="hidden" name="citizen" value="<?php echo $prefill['citizen']; ?>">
                        <input type="hidden" name="amount" value="<?php echo $amount; ?>">
                        <input type="hidden" name="insert_id" value="<?php echo $insert_id; ?>">
                        <input type="hidden" name="savedate_check" value="<?php echo $savedate_check; ?>">
                        <input type="hidden" name="receive_updates" value="<?php echo $receive_updates; ?>">
                        <input type="hidden" name="save_the_date" value="<?php echo $save_the_date; ?>">
                        <input type="hidden" name="programme" value="<?php echo $programme; ?>">

                    </form>


                </div>
            </div>
        </div>
        <!--</div>-->
    </div>




    <script type="text/javascript">
        window.onload = function() {
            var button = document.getElementById('clickButton');
            <?php if (!empty($key) && !empty($amount)) { ?>
                $('#razorpay-form').submit();
            <?php } ?>
            $('#modal-close').on('click', function() {

                //  window.location.replace("donate");
                window.location.href = 'donate';

            });


        }


        $(".number").keydown(function(event) {
            k = event.which;

            if ((k >= 48 && k <= 57) || k == 8) {

                return true

            } else {
                event.preventDefault();
                return false;
            }


        })

        function modal_close() {
            window.location.href = 'donate';
        }
    </script>





    <script type="text/javascript">
        var selection;
        $(document).ready(function() {


            var dtToday = new Date();

            var month = dtToday.getMonth() + 1;
            var day = dtToday.getDate() + 1;
            var year = dtToday.getFullYear();
            if (month < 10)
                month = '0' + month.toString();
            if (day < 10)
                day = '0' + day.toString();

            var maxDate = year + '-' + month + '-' + day;

            var field = '<input class="form-control w-100" min="' + maxDate + '" type="date" id="save_the_date"  name="save_the_date" placeholder="Save Date"  required/>';
            var field1 = '<div class="col-md-12"><p style="font-size:14px;line-height:14px"></p></div>';


            $('#savedate').on('change', function() {
                if ($('#savedate').is(':checked')) {
                    $('.save-date').html(field)
                    $('.save-date-text').html(field1)
                } else {

                    $('.save-date').html('')
                    $('.save-date-text').html('')

                }

            })

            var field2 = '<input class="form-control w-100" type="hidden" id="whatsapp_number"  name="whatsapp_number" placeholder="Enter Your Whatsapp Number" required/>';
            $('#receive_updates').on('change', function() {
                if ($('#receive_updates').is(':checked')) {
                    $('.receive-updates-number').html(field2)

                } else {

                    $('.receive-updates-number').html('')


                }

            })


            selection = function(id) {
                $('#quantity').val(id / 50)
                $('#meal').html(id / 50 + ' meals | ₹ ' + id);
            }

            //     $('#amount').change(function(){
            //         $('option').attr('selected',false);
            //         $('#amount option:selected').each(function(){
            //         $(this).attr('selected',false);
            //         $(this).attr('selected',true);
            //         $('#quantity').val($(this).text())
            //     })
            // })




            // $('#one').on('click', function() {
            //     $('#one, #two, #three, #five, #seven, #thousand, #fifteen, #twenty ').removeAttr('selected');
            //     $('#one').attr('selected', true);
            //     $('#quantity').val('10');
            //     $('#meal').html('10 meal | ₹ 500');
            // })
            // $('#two').on('click', function() {
            //     $('#one, #two, #three, #five, #seven, #thousand, #fifteen, #twenty ').removeAttr('selected');
            //     $('#two').attr('selected', true);
            //     $('#quantity').val('20');
            //     $('#meal').html('20 meals | ₹ 1000');
            // })
            // $('#three').on('click', function() {
            //     $('#one, #two, #three, #five, #seven, #thousand, #fifteen, #twenty ').removeAttr('selected');
            //     $('#three').attr('selected', true);
            //     $('#quantity').val('30');
            //     $('#meal').html('30 meals | ₹ 1500');
            // })
            // $('#five').on('click', function() {
            //     $('#one, #two, #three, #five, #seven, #thousand, #fifteen, #twenty ').attr('selected', false);
            //     $('#five').attr('selected', true);
            //     $('#quantity').val('50');
            //     $('#meal').html('50 meals | ₹ 2500');
            // })

            // $('#thousand').on('click', function() {
            //     $('#one, #two, #three, #five, #seven, #thousand, #fifteen, #twenty ').attr('selected', false);
            //     $('#thousand').attr('selected', true);
            //     $('#quantity').val('100');
            //     $('#meal').html('100 meals | ₹ 5000');
            // })
            // $('#fifteen').on('click', function() {
            //     $('#one, #two, #three, #five, #seven, #thousand, #fifteen, #twenty ').attr('selected', false);
            //     $('#fifteen').attr('selected', true);
            //     $('#quantity').val('200');
            //     $('#meal').html('200 meals | ₹ 10000');
            // })
            // $('#twenty').on('click', function() {
            //     $('#one, #two, #three, #five, #seven, #thousand, #fifteen, #twenty ').attr('selected', false);
            //     $('#twenty').attr('selected', true);
            //     $('#quantity').val('500');
            //     $('#meal').html('500 meals | ₹ 25000');
            // })
            // $('#other').on('click', function() {
            //     var amount = $('#other').val()
            //     $('#one, #two, #three, #five, #seven, #thousand, #fifteen, #twenty ').attr('selected', false);
            //     $('#other').attr('selected', true);
            //     $('#quantity').val(amount);
            //     $('#meal').html(amount + ' meals | ₹ ' + amount);
            // })

            $('#quantity').keyup(function() {
                var quantity = $('#quantity').val();
                $('#other').val(quantity * 50);
                // $('#other').html(quantity * 100);
                $('#other').attr('selected', true);
                $('#meal').html(quantity + ' meals | ₹ ' + quantity * 50);
            })


            // $('#fiveh').on('click', function() {
            //     $('#amount').val('500');
            //     $('.countup').html('500');
            //     $('.countup + span').html('Can feed 5 People');
            // })
            // $('#onek').on('click', function() {
            //     $('#amount').val('750');
            //     $('.countup').html('750');
            //     $('.countup + span').html('Can feed 7 People');
            // })
            // $('#twok').on('click', function() {
            //     $('#amount').val('1000');
            //     $('.countup').html('1000');
            //     $('.countup + span').html('Can feed 10 People');
            // })
            // $('#threek').on('click', function() {
            //     $('#amount').val('1500');
            //     $('.countup').html('1500');
            //     $('.countup + span').html('Can feed 15 People');
            // })
            // $('#fivek').on('click', function() {
            //     $('#amount').val('10000');
            // })
            // $('#sevenk').on('click', function() {
            //     $('#amount').val('25000');
            // })
            // $('#otherk').on('click', function() {
            //     $('#amount').val('');
            //     $('#amount').focus();
            // })

            // $('#amount').on('change', function() {
            //     $('#onek, #twok, #threek', '#fivek', '#sevenk', '#fiveh').attr('checked', '');
            //     $('#otherk').attr('checked', 'checked')
            //     $('.countup').html($('#amount').val());
            //     var p_count = $('#amount').val() / 100;
            //     $('.countup + span').html('Can feed ' + Math.ceil(p_count) + ' People');

            // })
        })

        function form_submit() {
            'use strict'

            if ((($('#mobile_number').val().length < 10) || ($('#mobile_number').val().length > 11))) {
                event.preventDefault()
                event.stopPropagation()
                alert('Mobile number should be 10 digits')
            } else {

                const forms = document.querySelectorAll('.requires-validation')
                if (($('#quantity').val() < 4 && $('#amount').val() < 200 || $('#quantity').val() == '' || $('#amount').val() == '')) {
                    event.preventDefault()
                    event.stopPropagation()
                    alert('Meal Quantity is required and should be atleast 4');
                    return false;
                } else {
                    Array.from(forms)
                        .forEach(function(form) {
                            form.addEventListener('submit', function(event) {
                                if (!form.checkValidity()) {
                                    event.preventDefault()
                                    event.stopPropagation()
                                }

                                form.classList.add('was-validated')
                                document.getElementById('donate-form').submit();
                            }, false)
                        })
                }
            }


        }

        $('.customer-logos').slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 1500,
            arrows: false,
            dots: false,
            pauseOnHover: false,
            responsive: [{
                breakpoint: 768,
                settings: {
                    slidesToShow: 4
                }
            }, {
                breakpoint: 520,
                settings: {
                    slidesToShow: 2
                }
            }]
        });





        (function($) {
            $.fn.countTo = function(options) {
                options = options || {};

                return $(this).each(function() {
                    // set options for current element
                    var settings = $.extend({}, $.fn.countTo.defaults, {
                        from: $(this).data('from'),
                        to: $(this).data('to'),
                        speed: $(this).data('speed'),
                        refreshInterval: $(this).data('refresh-interval'),
                        decimals: $(this).data('decimals')
                    }, options);

                    // how many times to update the value, and how much to increment the value on each update
                    var loops = Math.ceil(settings.speed / settings.refreshInterval),
                        increment = (settings.to - settings.from) / loops;

                    // references & variables that will change with each update
                    var self = this,
                        $self = $(this),
                        loopCount = 0,
                        value = settings.from,
                        data = $self.data('countTo') || {};

                    $self.data('countTo', data);

                    // if an existing interval can be found, clear it first
                    if (data.interval) {
                        clearInterval(data.interval);
                    }
                    data.interval = setInterval(updateTimer, settings.refreshInterval);

                    // initialize the element with the starting value
                    render(value);

                    function updateTimer() {
                        value += increment;
                        loopCount++;

                        render(value);

                        if (typeof(settings.onUpdate) == 'function') {
                            settings.onUpdate.call(self, value);
                        }

                        if (loopCount >= loops) {
                            // remove the interval
                            $self.removeData('countTo');
                            clearInterval(data.interval);
                            value = settings.to;

                            if (typeof(settings.onComplete) == 'function') {
                                settings.onComplete.call(self, value);
                            }
                        }
                    }

                    function render(value) {
                        var formattedValue = settings.formatter.call(self, value, settings);
                        $self.html(formattedValue);
                    }
                });
            };

            $.fn.countTo.defaults = {
                from: 0, // the number the element should start at
                to: 0, // the number the element should end at
                speed: 1000, // how long it should take to count between the target numbers
                refreshInterval: 100, // how often the element should be updated
                decimals: 0, // the number of decimal places to show
                formatter: formatter, // handler for formatting the value before rendering
                onUpdate: null, // callback method for every time the element is updated
                onComplete: null // callback method for when the element finishes updating
            };

            function formatter(value, settings) {
                return value.toFixed(settings.decimals);
            }
        }(jQuery));

        jQuery(function($) {
            // custom formatting example
            $('.count-number').data('countToOptions', {
                formatter: function(value, options) {
                    return value.toFixed(options.decimals).replace(/\B(?=(?:\d{3})+(?!\d))/g, ',');
                }
            });

            // start all the timers
            $('.timer').each(count);

            function count(options) {
                var $this = $(this);
                options = $.extend({}, options || {}, $this.data('countToOptions') || {});
                $this.countTo(options);
            }
        });
    </script>




    <!-- 

<section class="ftco-intro-wrap ">
    <div class="container-xl">
        <div class="row g-lg-5">
            <div class="col-md-5 order-lg-last d-flex align-items-stretch">
                <div class="fund-wrap">
                    <div class="fund-raised d-flex align-items-center">
                        <div class="icon">
                            <span class="fa fa-rupee"></span>
                        </div>
                        <div class="text section-counter-2 mb-0">
                            <h4 class="countup d-inline-block">500</h4> &nbsp;&nbsp;
                            <span>Can feed 5 People</span>
                        </div>
                    </div>
                    <form action="<?php echo base_url(); ?>payment/pay" id="donate-form" class="requires-validation appointment" novalidate method="post" enctype="multipart/form-data">
                        <input type="hidden" name="currency" value="INR">
                        <input type="hidden" name="citizen" value="indian">
                        <span class="subheading">Donate Now</span>
                        <h2 class="mb-4 appointment-head">Giving is the greatest act of grace</h2>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group d-flex flex-wrap ">
                                    <div class="form-check d-flex">
                                        <input class="form-check-input" type="radio" checked id="fiveh" name="radioamount">
                                        <label class="form-check-label" for="fiveh"> ₹500</label> &nbsp;
                                    </div>
                                    <div class="form-check d-flex">
                                        <input class="form-check-input" type="radio" id="onek" name="radioamount">
                                        <label class="form-check-label" for="onek"> ₹750</label> &nbsp;
                                    </div>
                                    <div class="form-check d-flex">
                                        <input class="form-check-input" type="radio" id="twok" name="radioamount">
                                        <label class="form-check-label" for="twok"> ₹1000</label> &nbsp;
                                    </div>
                                    <div class="form-check d-flex">
                                        <input class="form-check-input" type="radio" id="threek" name="radioamount">
                                        <label class="form-check-label" for="threek"> ₹1500</label> &nbsp;
                                    </div>
                                  
                                    <div class="form-check d-flex">
                                        <input class="form-check-input" type="radio" id="otherk" name="radioamount">
                                        <label class="form-check-label" for="otherk"> Other amount</label> &nbsp;
                                    </div>
                                    <div class="form-check d-flex">
                                        <input class="form-control mt-1" type="text" name="amount" placeholder="Other amount*" id="amount" required>
                                        <div class="invalid-feedback">Amount field cannot be blank!</div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                   
                                    <input class="form-control" type="text" name="name" placeholder="Full Name*" required>
                                   
                                    <div class="invalid-feedback">Full name field cannot be blank!</div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                  
                                    <input class="form-control" type="email" name="email" placeholder="E-mail Address*" required>
                                   
                                    <div class="invalid-feedback">Email field cannot be blank!</div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                   
                                    <input class="form-control" type="text" name="mobile_number" placeholder="Mobile Number*" required>
                                   
                                    <div class="invalid-feedback">Mobile Number field cannot be blank!</div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                   
                                    <input class="form-control mt-0" type="text" name="dob" placeholder="Date Of Birth" onfocus="(this.type='date')">
                                  
                                    <div class="invalid-feedback">Date Of Birth field cannot be blank!</div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                   
                                    <input class="form-control" type="text" name="pan" placeholder="Pan Number*" required>
                                   
                                    <div class="invalid-feedback">Pan Number field cannot be blank!</div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                   
                                    <input class="form-control" type="text" name="city" placeholder="City*" required>
                                  
                                    <div class="invalid-feedback">City field cannot be blank!</div>
                                </div>
                            </div>


                            <div class="col-md-12">
                                <input id="submit" type="submit" value="Donate Now" class="btn btn-primary py-3 px-4 rounded" onclick="form_submit()">
                                <small>Avail tax exemption under Section 80G</small>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-7 heading-section d-flex align-items-center aos-init aos-animate" data-aos="fade-up" data-aos-delay="200" data-aos-duration="1000">
                <div class="mt-0 about-wrap">
                    <div class="row mt-5 g-md-3">
                        <span class="subheading">IMPACT SO FAR</span>
                        <div class="col-md-6 col-lg-4 mb-2 mb-md-0 d-flex align-items-stretch">
                            <a href="#" class="services-2">
                              
                                <img class="" src="assets/images/campaigns/meal-served.png" style="width:100%">
                                <div class="text">
                                    <h2>Cumulative meals served</h2>
                                    <h1>12000</h1>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-6 col-lg-4 mb-2 mb-md-0 d-flex align-items-stretch">
                            <a href="#" class="services-2 color-2">
                               
                                <img src="assets/images/campaigns/beneficiaries.png" style="width:100%">
                                <div class="text">
                                    <h2>Number of beneficiaries</h2>
                                    <h1>1000</h1>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-6 col-lg-4 mb-2 mb-md-0 d-flex align-items-stretch">
                            <a href="#" class="services-2 color-3">
                               
                                <img src="assets/images/campaigns/hospital.png" style="width:100%">
                                <div class="text">
                                    <h2>Number of Hospitals</h2>
                                    <h1>4</h1>
                                </div>
                            </a>
                        </div>
                    </div>
                   
                    <h2 class="mb-4">Care to feed those who submit to hunger, just so that they can save money for treatment.</h2>
                    <p>The Hospital Feeding Programme impacts health and expenses of beneficiaries. It ensures consumption of nutritious food thereby supporting good health of patients & families. It also reduces the burden of food cost and enables savings for treatment.</p>

                </div>
            </div>
        </div>
    </div>
</section> -->