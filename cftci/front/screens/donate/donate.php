<?php print_r($keyId); ?>
<section class="page-title bg-1">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="block text-center">
          <span class="text-white">Contact Us</span>
          <h1 class="text-capitalize mb-4 text-lg">Let's take the first step towards making a difference</h1>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section">
    <div class="container">
        <div class="row">
             <div class="col-lg-6 col-sm-12 ">
                <div class="contact-content">
                    <h2 class="mb-5">We&rsquo;d love to hear from you! <br>Give us call, send us a message?</h2>
                    <ul class="address-block list-unstyled">
                        <li>
                            <h6 class="mb-2">Regd. Office</h6>
							B-486, New Friends Colony, New Delhi 110025 
                        </li>
						<li>
                            <h6 class="mb-2">Correspondence Address</h6>
							<b>Mumbai Address</b>: A 5 Ionic Bulding, 18, Arthur Bundar Road, Colaba, Mumbai - 400005 <br><br>
                            <b>Alibag Address</b>: Alibag - Pen Rd, Veshvi, Alibag, Maharashtra 402201
                        </li>
                        <li>
                            <h6 class="mb-2">email us</h6>
                            cfti.ajd@gmail.com
                            <br>
                            donate@cftiindia.com
                            <br>
                            volunteer@cftiindia.com
                            <br>
                            careers@cftiindia.com
                        </li>
                        <li>
                            <h6 class="mb-2">Phone Number</h6>
							+91 9673766347 
                            <br>
                            Alibaug office - 02141228627
                            <br>
                            Mumbai office - 022-22883789
                        </li>
                    </ul>

                    <ul class="social-icons list-inline mt-5">
                       <li> <h6 class="mb-3">Find us on social media</h6></li>
                        <li class="list-inline-item">
                            <a href="https://www.facebook.com/CentreForTransformingIndia/"><i class="icofont-facebook mr-2"></i></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="https://www.instagram.com/cfti_india"><i class="icofont-instagram mr-2"></i></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="https://www.twitter.com/cfti10"><i class="icofont-twitter mr-2"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-5 col-sm-12 border-1">
            <form id="popup_paypal_donate_form_onetime_recurring" action="<?php echo base_url('donate'); ?>"  method="POST" enctype="multipart/form-data">
                    <span class="text-color">Volunteer with us at the causes that matters</span>
                    <h3 class="text-md mb-5">Donation Form</h3>
               <input type="hidden" name="table_name" value="payments">
               <input type="hidden" name="citizen" value="INDIAN">
               <input type="hidden" name="currency" value="INR">
                  <div class="row">
                      <div class="col-lg-12 my-3 btn-main mb-5" style="border-radius: 11px">
                        <div class=" d-flex flex-wrap  p-20 border-0 mb-2 btn-main">
                            <div class="form-group form-check  mt-2">
                                <input class="form-check-input ml-10" type="radio" checked id="one" name="radioamount" value="1000" >
                                <label class="form-check-label pl-10" for="one"> ₹1000</label> &nbsp;
                            </div>
                            <div class="form-group form-check mt-2">
                                <input class="form-check-input ml-10" type="radio" id="two" name="radioamount" value="2000" >
                                <label class="form-check-label pl-10" for="two"> ₹2000</label> &nbsp;
                            </div>
                            <div class="form-group form-check  mt-2">
                                <input class="form-check-input ml-10" type="radio" id="three" name="radioamount" value="5000" >
                                <label class="form-check-label pl-10" for="three"> ₹5000</label> &nbsp;
                            </div>
                            <div class="form-group form-check  mt-2">
                                <input class="form-check-input ml-10" type="radio" id="five" name="radioamount" value="10000">
                                <label class="form-check-label pl-10" for="five"> ₹10000</label> &nbsp;
                            </div>
                            <div class="form-group form-check  mt-2">
                                <input class="form-check-input ml-10" type="radio" id="seven" name="radioamount" value="15000" >
                                <label class="form-check-label pl-10" for="seven"> ₹15000</label> &nbsp;
                            </div>

                            <div class="form-group form-check mt-2">
                                <input class="form-check-input ml-10" type="radio" id="other" name="radioamount" >
                                <label class="form-check-label pl-10" for="other"> Other amount</label> &nbsp;
                                
                            </div>
                        </div>
                      </div>
                     
                      <div class="col-lg-12">
                        <div class="form-group ">
                            <label>Custom Amount</label>
                            <input id="amount" type="text" name="amount" value="" class="form-control" onkeypress="checkother()">
                        </div>
                        </div>
                      <div class="col-lg-6">
                           <div class="form-group">
                                <label>Your Name *</label>
                                <input name="full_name" id="full_name" type="text" name="full_name" class="form-control">
                            </div>
                      </div>
                      <div class="col-lg-6">
                           <div class="form-group">
                            <label>Your Email *</label>
                            <input id="email" type="email" name="email" class="form-control">
                        </div>
                      </div>
                      <div class="col-lg-6">
                           <div class="form-group">
                                <label>Pan Number *</label>
                                <input id="pan_number" type="text" name="pan_number" type="text" class="form-control">
                            </div>
                      </div>
                      <div class="col-lg-6">
                            <div class="form-group">
                                <label>Your Phone Number *</label>
                                <input id="phone_number" type="text" name="phone_number" type="number" class="form-control">
                            </div>
                      </div>
                      <div class="col-lg-12">
                            <div class="form-group">
                                <label>Address *</label>
                                <input id="city" type="text" name="city" type="text" class="form-control">
                            </div>
                      </div>
                  </div>
                   
                    <button class="btn btn-main rounded" name="submit" type="submit">Donate Now</button>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- contact form start -->
<section class="contact-wrap section-bottom">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                
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
                    
                    <form id="razorpay-form" action="<?php echo base_url(); ?>donate/save_payment" method="POST">
                        <script type="text/javascript"  src="https://checkout.razorpay.com/v1/checkout.js"
                        data-buttontext=""
                        data-key="<?php echo $keyId; ?>"
                        data-amount="<?php echo $amount * 100; ?>"
                        data-currency="INR"
                        data-name="<?php echo $this->config->item('name') ?>"
                        data-image="<?php echo SETTINGS_UPLOAD_PATH . $settings->LOGO_IMAGE ?>"
                        data-description="<?php echo $this->config->item('description') ?>"
                        data-prefill.name="<?php echo $full_name ?>"
                        data-prefill.email="<?php echo $email ?>"
                        data-prefill.contact="<?php echo $phone_number ?>"
                        data-prefill.pan="<?php echo $pan_number ?>"
                        data-notes.pan="<?php echo $pan_number ?>"
                        data-notes.shopping_order_id="<?php echo $notes['razorpay_order_id']; ?> "
                        data-modal.confirm_close = 'true'
                        data-modal.ondismiss=function(){alert('close')}
                        <?php if ($displayCurrency !== 'INR') { ?>
                        data-display_amount="<?php echo $display_amount ?>" <?php } ?> <?php if ($displayCurrency !== 'INR') { ?>
                        data-display_currency="<?php echo $display_currency ?>" <?php } ?>
                        data-redirect = 'true'
                        data-callback_url = "<?php echo base_url(); ?>donate/save_payment/<?php echo $insert_id .'/'.$table_name; ?>"
                    
                        >

                      
                        </script>
                      
                      
                       
                    </form>
                    
                
            </div>
        </div>
        </div>
    <!--</div>-->
</div>
</div>
<style>
  .razorpay-payment-button{
    visibility: hidden;
  }
</style>


<script type="text/javascript">
        window.onload = function() {
            var button = document.getElementById('clickButton');
            <?php if (!empty($keyId) && !empty($amount)) { ?>
                $('#razorpay-form').submit();
            <?php } ?>
            $('#modal-close').on('click', function() {

                //  window.location.replace("donate");
                window.location.href = 'annadana-seva';

            });
            $('#positiveBtn').on('click', function() {

                //  window.location.replace("donate");
                window.location.href = 'annadana-seva';

            });


        }


      
        function modal_close() {
            window.location.href = 'annadana-seva';
        }
    </script>


