<style>
    .campaign-wrap img,
    .customer-logos img {
        width: 100% !important;
    }
</style>

<section class="feature-one bg-light-grey">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="section-title text-center">
                           <span class="section-title__tagline">Impact so far</span>
                    <!-- <h2 class="section-title__title_small">EDUCATE & EMPOWER
</h2> -->
                    <!-- <p class="mt-20">The Hospital Feeding Programme is our current intervention to ensure food security for family members of patients in Mumbai’s government hospitals.<br> Through this programme, we provide freshly prepared, locally palatable, nutritious meals on each day in government hospitals, totally free of cost. </p> -->
                    <p class="mt-20">With the support of generous donors, corporate partners, and volunteers, we have been able to impact lives of many students across India.</p>

                </div>
            </div>
            <div class="col-xl-4 col-lg-4">
                <!--Feature One Single-->
                <div class="feature-one__single feature-one__single-1">
                    <div class="feature-one__icon w-25 mr-20">
                        <span class="">
                            <img class="" src="assets/images/shapes/service.png" style="width:25%">
                        </span>
                    </div>
                    <div class="feature-one__content text-dark">
                        <!-- <h3 class="text-dark mb-0"><?php echo number_format($impact_numbers->cumulative_meals_served); ?></h3> -->
                        <h3 class="text-dark mb-0">12</h3>
                        <p class="text-dark">Years of educating
underprivileged students</p>
                    </div>
                </div>
            </div>
           
            <div class="col-xl-4 col-lg-4">
                <!--Feature One Single-->
                <div class="feature-one__single feature-one__single-3">
                    <div class="feature-one__icon w-25 mr-20">
                        <span class="">
                            <img src="assets/images/shapes/children.png" style="width:25%">
                        </span>
                    </div>
                    <div class="feature-one__content">
                        <!-- <h3 class="text-dark mb-0"><?php echo $impact_numbers->beneficiary_hospitals; ?></h3> -->
                        <h3 class="text-dark mb-0">5,775</h3>
                        <p class="text-dark">Students could complete higher education</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4">
                <!--Feature One Single-->
                <div class="feature-one__single feature-one__single-3">
                    <div class="feature-one__icon w-25 mr-20">
                        <span class="">
                            <img src="assets/images/shapes/donors.png" style="width:25%">
                        </span>
                    </div>
                    <div class="feature-one__content">
                        <h3 class="text-dark mb-0">1,375</h3>
                        <p class="text-dark">Donors supported
students education</p>
                    </div>
                </div>
            </div>
           
        </div>
    </div>
</section>
<section class="contact-page pt-10">
    <div class="container">

        <div class="row">
            <div class="col-sm-12 mx-auto">
                <!--<h1>Sponsor a Child</h1>-->
            </div>
            <div class="col-xl-6 col-lg-6">
                <div class="contact-page__left">


                    <div class="contact-page__contact-info">
                        <div class="section-title mb-0">
                            <h1 class="section-title__tagline mt-4 mb-2">DONATE TO EDUCATE UNDERPRIVILEGED STUDENTS</h1>
                        </div>

                        <p>Your donation will support students from socio-economically weaker sections to
complete education. Your contribution will help these students to pursue post-
school education such as PUC (10+2), Degree, Engineering and Medical studies.</p>

                        <h4 class="section-title__tagline">YOUR DONATION WILL BENEFIT STUDENTS</h4>

                        <p>Apart from the definite benefit of being able to complete higher education, the
student you have supported will receive the below-mentioned benefits too:</p>

                        <ul>
                            <li>Admission guidance for college and course selection </li>
                            <li>Career guidance sessions &amp; soft skills workshop</li>
                            <li>Training on 21<sup>st</sup> century skills</li>
                            <li>Mentorship programs to mould them into responsible citizens through residential camps, value inculcating workshops etc.</li>
                            <li>Employability Readiness Program (for final year students)</li>
                           
                        </ul>
                        <h4 class="section-title__tagline">AS A DONOR, WHAT WILL YOU GET?</h4>
                        <ul>
                            <li>Academic progress report (marks card, once a year) of the student you have supported</li>
                            <li>Virtual or physical meeting with the student (through Vidya Chetana)</li>
                            <li>Messages to and from the student (through Vidya Chetana)</li>
                            <li>Donation receipt and 80G tax exemption certificate</li>
                        </ul>
                    </div>
                </div>
            </div>


            <div class="col-xl-6 col-lg-6 order-first order-md-2">
                <div class="contact-page__form helping-one__right-form">
                    <form name="donate-form" action="<?php echo base_url(); ?>sponsor-for-education" class="contact-page__main-form " id="donate-form"  method="post" enctype="multipart/form-data">
                        <h3 class="section-title__tagline text-center">DONATION FORM</h3>
                        <p class="text-center">Donate generously to educate a student.</p>
                        <input id="currency" type="hidden" name="currency" value="INR">
                        <!-- <input type="hidden" name="citizen" value="indian"> -->
                        <input type="hidden" name="table_name" value="payments">
                        <input type="hidden" name="programme" value="sponsor_for_education">
                        <input type="hidden" name="sem" value="<?php echo !empty($this->input->get('sem')) ? $this->input->get('sem') : '' ?>">
                        <!-- <p class="text-center">You can send us a message through the below form <br>and we will get in touch with you.</p> -->
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="contact-page__input-box">
                                    <div class="form-group d-flex flex-wrap form-control p-20 border-0 mb-2">

                                        <div class="form-check d-flex mt-2">
                                            <label class="d-flex "><b>Citizen :</b></label>
                                        </div>
                                        <div class="form-check d-flex mt-2">
                                            <input class="form-check-input ml-10" type="radio" checked id="indian" value="indian" name="citizen">
                                            <label class="form-check-label pl-10" for="indian"> Indian</label> &nbsp;
                                        </div>
                                        <div class="form-check d-flex mt-2">
                                            <input class="form-check-input ml-10" type="radio" id="foreign" name="citizen" value="foreign" onclick="load_countries()">
                                            <label class="form-check-label pl-10" for="foreign"> Foreign</label> &nbsp;
                                        </div>



                                    </div>
                                </div>
                            </div>
                        </div>


                        <div id="indian-block">
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="contact-page__input-box">
                                        <div class="form-group d-flex flex-wrap form-control p-20 border-0 mb-2">
                                            <div class="form-check d-flex mt-2">
                                                <input class="form-check-input ml-10" type="radio" checked id="one" name="radioamount" value="1000" onclick="get_amount(this.value)">
                                                <label class="form-check-label pl-10" for="one"> ₹1000</label> &nbsp;
                                            </div>
                                            <div class="form-check d-flex mt-2">
                                                <input class="form-check-input ml-10" type="radio" id="two" name="radioamount" value="2000" onclick="get_amount(this.value)">
                                                <label class="form-check-label pl-10" for="two"> ₹2000</label> &nbsp;
                                            </div>
                                            <div class="form-check d-flex mt-2">
                                                <input class="form-check-input ml-10" type="radio" id="three" name="radioamount" value="5000" onclick="get_amount(this.value)">
                                                <label class="form-check-label pl-10" for="three"> ₹5000</label> &nbsp;
                                            </div>
                                            <div class="form-check d-flex mt-2">
                                                <input class="form-check-input ml-10" type="radio" id="five" name="radioamount" value="10000" onclick="get_amount(this.value)">
                                                <label class="form-check-label pl-10" for="five"> ₹10000</label> &nbsp;
                                            </div>
                                            <div class="form-check d-flex mt-2">
                                                <input class="form-check-input ml-10" type="radio" id="seven" name="radioamount" value="15000" onclick="get_amount(this.value)">
                                                <label class="form-check-label pl-10" for="seven"> ₹15000</label> &nbsp;
                                            </div>

                                            <div class="form-check d-flex mt-2">
                                                <input class="form-check-input ml-10" type="radio" id="other" name="radioamount">
                                                <label class="form-check-label pl-10" for="other"> Custom amount</label> &nbsp;
                                                <div class="invalid-feedback">Amount field cannot be blank!</div>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>




                        <div class="row">
                            <div class="col-lg-12">
                                <div class="helping-one__right-input-box">
                                    <input class="form-control" type="text" name="amount" placeholder="Other amount*" id="amount" value="1000">
                                    <div class="helping-one__right-dolar-icon">
                                        <span>&#8377; </span>
                                    </div>
                                </div>
                            </div>


                            <div class="row" id="indian-hide" style="display:none">
                                <div class="col-md-4">
                                    <label>Payable Amount in &nbsp;</label><label id="currency_code_text">INR</label>
                                </div>
                                <div class="col-xl-8">
                                    <div class="contact-page__input-box">
                                        <input  class="form-control" type="text" name="payble_amount" placeholder="" id="payble_amount" value="1000" readonly>
                                        <div class="invalid-feedback">Full name field cannot be blank!</div>
                                    </div>
                                </div>
                            </div>

                            <div class="row" id="countries"></div>
                            <!-- <div class="row">
                            <div class="col-lg-12">
                                <div class="helping-one__right-input-box">
                                    <label for="conv-amount">Conversion Amount</label>
                                    <input class="form-control" type="text" name="amount" placeholder="Other amount*" id="amount">
                                    <div class="helping-one__right-dolar-icon">
                                        <span>&#8377; </span>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="contact-page__input-box">
                                        <input class="form-control" type="text" name="name" placeholder="Full Name*" id="name">
                                        <div class="invalid-feedback">Full name field cannot be blank!</div>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="contact-page__input-box">
                                        <input class="form-control" id="mobile_number" type="text" name="mobile_number" placeholder="Mobile Number*">
                                        <div class="invalid-feedback">Mobile Number field cannot be blank!</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="contact-page__input-box">
                                        <input class="form-control" type="email" name="email" placeholder="Email*" id="email">
                                        <div class="invalid-feedback">Email field cannot be blank!</div>
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="contact-page__input-box">
                                        <input class="form-control" type="text" name="pan" placeholder="Pan Number*" id="pan">
                                        <div class="invalid-feedback">Pan Number field cannot be blank!</div>
                                    </div>

                                </div>
                            </div>
                            <div class="row" id="country">

                            </div>

                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="contact-page__input-box">
                                        <input class="form-control" type="text" name="city" placeholder="City">
                                        <div class="invalid-feedback">City field cannot be blank!</div>
                                    </div>
                                </div>

                                <div class="col-xl-4 mx-auto my-2">

                                    <button id="submit_form" type="submit" class="thm-btn contact-page__btn "><i class="fas fa-arrow-circle-right"></i>Donate Now</button>
                                </div>
                                <p class="text-center">Avail tax exemption under Section 80G</p>
                            </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>





<!--<section class="testimonial-one about-page-testimonial">-->
<!--    <div class="testimonial-one-bg" style="background-image: url(assets/images/backgrounds/testimonial-1-bg.jpg)"></div>-->
<!--    <div class="container">-->
<!--        <div class="row">-->
<!--            <div class="col-xl-4">-->
<!--                <div class="testimonial-one__left">-->
<!--                    <div class="section-title text-left">-->
<!--                        <span class="section-title__tagline">SUCCESS STORIES</span>-->
<!--                        <h2 class="section-title__title">They identified with our vision and partnered with us to make it a reality.</h2>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="col-xl-8">-->
<!--                <div class="testimonial-one__right">-->
<!--                    <div class="testimonial-one__carousel owl-theme owl-carousel">-->
                        <!--Testimonial One Single-->
<!--                        <div class="testimonial-one__single">-->
<!--                            <p class="testimonial-one__text">I am Sahana , studying final year BTech in Presidency University, Bangalore. I come from an economically backward family. We are two siblings and my father has been bed ridden since 6 years. My mother is a teacher in a private school and is the sole earning members in our family. When I secured a seat in BTech, I had no means to support myself to take up the course, considering our financial status. Youth For Seva helped me to pursue my education by providing financial and mentoring support. I recently secured a placement in IBM, Bangalore. I am extremely grateful to Youth for Seva , Vidya Chetana for the invaluable assistance to help me to achieve my goal.</p>-->
<!--                            <div class="testimonial-one__client-info">-->
<!--                                <div class="testimonial-one__client-img">-->
<!--                                    <img src="assets/images/testimonial/sahana_pic.jpg" alt="">-->
<!--                                    <div class="testimonial-one__quote">-->

<!--                                    </div>-->
<!--                                </div>-->
<!--                                <div class="testimonial-one__client-name">-->
<!--                                    <h3>Sahana</h3>-->
                                    <!-- <p>Dy. General Manager, CSR, BPCL </p> -->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
                        <!--Testimonial One Single-->
<!--                        <div class="testimonial-one__single">-->
<!--                            <p class="testimonial-one__text">I am Yathish from a village near Tumkur, Karnataka . I have completed BE (Mechanical ) from R V College of Engineering.Bangalore. My father has health issues. We live on the pension money of my father given by the Karnataka state government. I did my diploma after 10th std, I received a Vidya Chetana scholarship to continue my Engineering Degree .I have completed my Engineering with 6.8GPA, got placement in DXA technology. I am very thankful to the team for supporting my education.</p>-->
<!--                            <div class="testimonial-one__client-info">-->
<!--                                <div class="testimonial-one__client-img">-->
<!--                                    <img src="assets/images/testimonial/yathish_photo.jpg" alt="">-->
<!--                                    <div class="testimonial-one__quote">-->

<!--                                    </div>-->
<!--                                </div>-->
<!--                                <div class="testimonial-one__client-name">-->
<!--                                    <h3>Yathish</h3>-->
                                    <!-- <p> Company Secretary & Vice-President Compliance, JBCPL</p> -->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->

<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</section>-->



<div class="col-sm-12 col-md-12 mx-auto">
    <!--<div class="form-body">-->
    <div class="row">
        <div class="form-holder">
            <div class="form-content">
                <div class="form-items">
                    <!--                    <h3 class="text-center">Akshayachaitanya Donation Page</h3>-->
                    <!--                    <h4>Select any payment gateway to complete payment.</h4>-->

                    <form id="razorpay-form" action="<?php echo base_url(); ?>campaigns/save_payment/<?php echo $insert_id . '/' . $table_name; ?>" method="POST">
                        <script type="text/javascript" src="https://checkout.razorpay.com/v1/checkout.js" 
                        data-buttontext="" 
                        data-key="<?php echo $key; ?>" 
                        data-amount="<?php echo $amount; ?>" 
                        data-currency="INR" data-name="<?php echo $name ?>" 
                        data-image="<?php echo $image ?>" 
                        data-description="<?php echo $description ?>" 
                        data-prefill.name="<?php echo $prefill['name'] ?>" 
                        data-prefill.email="<?php echo $prefill['email'] ?>" 
                        data-prefill.contact="<?php echo $prefill['contact'] ?>" 
                        data-prefill.pan="<?php echo $prefill['pan'] ?>" 
                        data-notes.pan="<?php echo $prefill['pan'] ?>" 
                        data-notes.shopping_order_id="<?php echo $notes['merchant_order_id']; ?> " 
                        data-modal.confirm_close='true' 
                        data-modal.ondismiss="this.modal_close()" <?php if ($displayCurrency !== 'INR') { ?> 
                        data-display_amount="<?php echo $display_amount ?>" <?php } ?> <?php if ($displayCurrency !== 'INR') { ?> 
                        data-display_currency="<?php echo $display_currency ?>" <?php } ?> 
                        data-redirect='false' 
                        data-callback_url="<?php echo base_url(); ?>campaigns/save_payment/<?php echo $insert_id . '/' . $table_name; ?>">


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
                window.location.href = 'sponsor-for-education';

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
        function load_countries() {
            var countries = '<div class="row" ><div class="col-xl-12"> <div class="contact-page__input-box"><div class="form-group d-flex flex-wrap form-control p-20 border-0 mb-2"><div class="form-check d-flex mt-2"><label class="d-flex "><b>Country Currency Code:</b></label></div><div class="form-check d-flex mt-2">';
            countries += '<select id="from_currency" class="form-control" onchange="set_currency(this.value)"><option value="USD">USD</option><option value="EUR">EUR</option><option value="GBP">GBP</option><option value="SGD">SGD</option><option value="CAD">CAD</option><option value="CNY">CNY</option><option value="SEK">SEK</option><option value="SEK">SEK</option><option value="MXN">MXN</option><option value="HKD">HKD</option><option value="NOK">NOK</option><option value="RUB">RUB</option><option value="ALL">ALL</option><option value="AMD">AMD</option><option value="ARS">ARS</option><option value="AWG">AWG</option><option value="BBD">BBD</option><option value="BDT">BDT</option><option value="BMD" >BMD</option><option value="BND">BND</option><option value="BOB">BOB</option><option value="GIP">GIP</option><option value="LKR">LKR</option><option value="MNT">MNT</option><option value="GHS">GHS</option><option value="ZAR">ZAR</option><option value="NOK">NOK</option><option value="NZD">NZD</option><option value="PAB">PAB</option><option value="PEN">PEN</option><option value="PHP">PHP</option><option value="PKR">PKR</option><option value="PLN">PLN</option><option value="PYG">PYG</option><option value="RON">RON</option><option value="RUB">RUB</option><option value="SAR">SAR</option><option value="SEK">SEK</option><option value="SGD">SGD</option><option value="THB">THB</option><option value="TRY">TRY</option><option value="TWD">TWD</option><option value="UAH">UAH</option><option value="USD" selected>USD</option><option value="UYU">UYU</option><option value="VND">VND</option><option value="YER">YER</option></select></div></div></div</div></div>';
            $('#countries').html(countries);
            var country = '<div class="col-xl-12"><div class="contact-page__input-box"><input class="form-control" type="text" name="country" placeholder="Country" required><div class="invalid-feedback">City field cannot be blank!</div></div></div>';

            $('#country').html(country);
            $('#indian-hide').attr('style',false);
            $('#pan').attr('required',false);
        }
        $('#indian').click(function() {
            $('#countries').html('');
            $('#country').html('');
            $('#indian-hide').css('display','none');
            $('#pan').attr('required',true);
        })

        function set_currency(value) {
            $('#currency').val(value);
            $('#currency_code_text').html(value);
            get_amount($('#amount').val())
        }

        function get_amount(amount) {

            var currency = $('#currency').val();
            $.ajax({
                url: "campaigns/currency_convert/" + amount + "/" + currency,
                success: function(data) {
                    $('#payble_amount').val(data);
                }
            })
            // $.getJSON("campaigns/currency_convert/"+amount+"/"+currency, function(data){
            // console.log(data);
            // });
        }


        var selection;
        $(document).ready(function() {

            $("#donate-form").validate({
                // Specify validation rules

                rules: {
                    // The key name on the left side is the name attribute
                    // of an input field. Validation rules are defined
                    // on the right side
                    name: "required",
                    email: {
                        required: true,
                        // Specify that email should be validated
                        // by the built-in "email" rule
                        email: true
                    },
                    mobile_number: {
                        required: true,
                        minlength: 10,
                        maxlength: 12
                    },
                    pan: {
                        required: true
                    },
                    amount: {
                        required: true
                    },
                    // payble_amount: required
                },
                // Specify validation error messages
                messages: {
                    name: "Please enter your firstname",
                    mobile_number: {
                        required: "Please provide a mobile_number",
                        minlength: "Your mobile number must be at least 10 characters long",
                        maxlength: "Your mobile number must not be more than 12 characters length"
                    },
                    email: "Please enter a valid email address",
                    pan: "please enter pan number",
                    amount: "Please enter amount",
                    payble_amount: "Please enter amount"
                },
                // Make sure the form is submitted to the destination defined
                // in the "action" attribute of the form when valid
                submitHandler: function(form) {
                    var amount = $('#amount').val();
                    if(amount == '' || amount < 500 ){
                        alert('Amount cannot be less than ₹500')
                    }else{
                    form.submit();
                    }
                }
            });

            
        });








            $('#one').on('click', function() {
                $('#one, #two, #three, #five, #seven, #thousand, #fifteen, #twenty ').removeAttr('checked');
                $('#amount').val('1000');
                $('#one').attr('checked', true);



            })
            $('#two').on('click', function() {
                $('#one, #two, #three, #five, #seven, #thousand, #fifteen, #twenty ').removeAttr('ckecked');
                $('#amount').val('2000');
                $('#two').attr('checked', true);

            })
            $('#three').on('click', function() {
                $('#one, #two, #three, #five, #seven, #thousand, #fifteen, #twenty ').removeAttr('checked');
                $('#amount').val('5000');
                $('#three').attr('checked', true);

            })
            $('#five').on('click', function() {
                $('#one, #two, #three, #five, #seven, #thousand, #fifteen, #twenty ').attr('checked', false);
                $('#amount').val('10000');
                $('#five').attr('checked', true);

            })

            $('#seven').on('click', function() {
                $('#one, #two, #three, #five, #seven, #thousand, #fifteen, #twenty ').attr('checked', false);
                $('#amount').val('15000');
                $('#seven').attr('checked', true);

            })

            $('#other').on('click', function() {
                var amount = $('#other').val()
                $('#one, #two, #three, #five, #seven, #thousand, #fifteen, #twenty ').attr('checked', false);
                // $('#amount').val(amount);
                $('#other').attr('checked', true);

            })

            $('#amount').keyup(function() {
                var quantity = $('#amount').val();
                $('#other').val(quantity);
                // $('#other').html(quantity * 100);
                $('#other').attr('checked', true);

            })


            // It has the name attribute "registration"
           

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





        //         function indianblock(){
        //             var indianblock = '<div class="row">';
        //                 indianblock += '<div class="col-xl-12">';
        //                                         indianblock += '<div class="contact-page__input-box"><div class="form-group d-flex flex-wrap form-control p-20 border-0 mb-2">';
        //                                             indianblock += '<div class="form-check d-flex mt-2">';
        //                                                 indianblock += '<input class="form-check-input ml-10" type="radio" checked id="one" name="radioamount">';
        //                                                 indianblock += '<label class="form-check-label pl-10" for="one"> ₹1000</label> &nbsp;';
        //                                             indianblock += '</div>';
        //                                             indianblock += '<div class="form-check d-flex mt-2">';
        //                                                 indianblock += '<input class="form-check-input ml-10" type="radio" id="two" name="radioamount">';
        //                                                 indianblock += '<label class="form-check-label pl-10" for="two"> ₹2000</label> &nbsp;';
        //                                             indianblock += '</div>';
        //                                             indianblock += '<div class="form-check d-flex mt-2">';
        //                                                 indianblock += '<input class="form-check-input ml-10" type="radio" id="three" name="radioamount">';
        //                                                 indianblock += '<label class="form-check-label pl-10" for="three"> ₹5000</label> &nbsp;';
        //                                             indianblock += '</div>';
        //                                             indianblock += '<div class="form-check d-flex mt-2">';
        //                                                 indianblock += '<input class="form-check-input ml-10" type="radio" id="five" name="radioamount">';
        //                                                 indianblock += '<label class="form-check-label pl-10" for="five"> ₹10000</label> &nbsp;';
        //                                             indianblock += '</div>';
        //                                             indianblock += '<div class="form-check d-flex mt-2">';
        //                                                 indianblock += '<input class="form-check-input ml-10" type="radio" id="seven" name="radioamount">';
        //                                                 indianblock += '<label class="form-check-label pl-10" for="seven"> ₹15000</label> &nbsp;';
        //                                             indianblock += '</div>';

        //                                             indianblock += '<div class="form-check d-flex mt-2">';
        //                                                 indianblock += '<input class="form-check-input ml-10" type="radio" id="other" name="radioamount">';
        //                                                 indianblock += '<label class="form-check-label pl-10" for="other"> Custom amount</label> &nbsp;';
        //                                                 indianblock += '<div class="invalid-feedback">Amount field cannot be blank!</div>';
        //                                             indianblock += '</div>';
        //                                         indianblock += '</div>';
        //                                     indianblock += '</div>';
        //                                 indianblock += '</div>';
        //                             indianblock += '</div>';
        //             $('#indian-block').html(indianblock);

        //         }
        // indianblock();
        //         function foreignblock(){
        //             var indianblock = '<div class="row">';
        //                 indianblock += '<div class="col-xl-12">';
        //                                         indianblock += '<div class="contact-page__input-box"><div class="form-group d-flex flex-wrap form-control p-20 border-0 mb-2">';
        //                                             indianblock += '<div class="form-check d-flex mt-2">';
        //                                                 indianblock += '<input class="form-check-input ml-10" type="radio" checked id="one" name="radioamount">';
        //                                                 indianblock += '<label class="form-check-label pl-10" for="one"> $14</label> &nbsp;';
        //                                             indianblock += '</div>';
        //                                             indianblock += '<div class="form-check d-flex mt-2">';
        //                                                 indianblock += '<input class="form-check-input ml-10" type="radio" id="two" name="radioamount">';
        //                                                 indianblock += '<label class="form-check-label pl-10" for="two"> ₹27</label> &nbsp;';
        //                                             indianblock += '</div>';
        //                                             indianblock += '<div class="form-check d-flex mt-2">';
        //                                                 indianblock += '<input class="form-check-input ml-10" type="radio" id="three" name="radioamount">';
        //                                                 indianblock += '<label class="form-check-label pl-10" for="three"> ₹5000</label> &nbsp;';
        //                                             indianblock += '</div>';
        //                                             indianblock += '<div class="form-check d-flex mt-2">';
        //                                                 indianblock += '<input class="form-check-input ml-10" type="radio" id="five" name="radioamount">';
        //                                                 indianblock += '<label class="form-check-label pl-10" for="five"> ₹10000</label> &nbsp;';
        //                                             indianblock += '</div>';
        //                                             indianblock += '<div class="form-check d-flex mt-2">';
        //                                                 indianblock += '<input class="form-check-input ml-10" type="radio" id="seven" name="radioamount">';
        //                                                 indianblock += '<label class="form-check-label pl-10" for="seven"> ₹15000</label> &nbsp;';
        //                                             indianblock += '</div>';

        //                                             indianblock += '<div class="form-check d-flex mt-2">';
        //                                                 indianblock += '<input class="form-check-input ml-10" type="radio" id="other" name="radioamount">';
        //                                                 indianblock += '<label class="form-check-label pl-10" for="other"> Custom amount</label> &nbsp;';
        //                                                 indianblock += '<div class="invalid-feedback">Amount field cannot be blank!</div>';
        //                                             indianblock += '</div>';
        //                                         indianblock += '</div>';
        //                                     indianblock += '</div>';
        //                                 indianblock += '</div>';
        //                             indianblock += '</div>';
        //             $('#indian-block').html(indianblock);
        //         }
    </script>