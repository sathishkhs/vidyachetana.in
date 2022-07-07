<section class="hero-wrap rellax" data-rellax-speed="-5" data-rellax-min="-120" data-rellax-max="0" style="background-image: url(&quot;assets/images/campaigns/bannerbg.jpg&quot;); transform: translate3d(0px, 0px, 0px);">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text ">
            <div class="col-lg-8 pt-5 mt-5">
                <!-- <span class="subheading">Raising Hope</span> -->
                <h2 class="mb-4 mt-5">Empty stomachs don’t heal. They only growl.</h2>
                <p>
                    <a href="campaign?#form-campaign" class="btn btn-green px-4 py-2">Join Us <span class="ion-ios-arrow-round-forward"></span></a>
                    <!-- <a href="#" class="btn">Watch the Video <span class="ion-ios-play"></span></a> -->
                </p>
            </div>
        </div>
    </div>
</section>

<section class="text-center">
    <div class="campaign-wrap">
        <div class="counter col_sixth">
            <img class="" src="assets/images/campaigns/meal-served.png" style="width:50%">
            <h2 class="timer count-title count-number " data-to="2021" data-speed="1500">July</h2>
            <p class="count-text ">July Began Service</p>
        </div>

        <div class="counter col_sixth">
            <img src="assets/images/campaigns/beneficiaries.png" style="width:50%">
            <h2 class="timer count-title count-number" data-to="75196" data-speed="1500"></h2>
            <p class="count-text ">Cumulative Meals Served</p>
        </div>

        <div class="counter col_sixth">
            <img src="assets/images/campaigns/hospital.png" style="width:50%">
            <h2 class="timer count-title count-number" data-to="4" data-speed="1500"></h2>
            <p class="count-text ">Beneficiary Hospitals</p>
        </div>
        <div class="counter col_sixth">
            <img class="" src="assets/images/campaigns/meal-served.png" style="width:50%">
           
            <p class="count-text ">FSSAI Compliant Centralised Kitchen in Byculla</p>
        </div>

        <div class="counter col_sixth">
            <img src="assets/images/campaigns/hospital.png" style="width:50%">
            <p class="count-text ">Locally Palatable Meals & Cyclic Menu</p>
        </div>

    </div>
</section>


<div class="register-photo" id="form-campaign">
    <div class="form-container">
        <div class="">
        <p class=" mt-3">This Diwali, you have a chance to bring light in someone’s life, just by providing food.
                Contribute generously to keep the evils of hunger at bay. Spread awareness about the 
                Hospital Feeding Programme so that silent hunger in government hospitals don’t get ignored anymore.
        </p>
        <h5 class="">Together, let’s make it a #ThoughtfulDiwali</h5>
            <p class="">This year, join us to serve the underprivileged people in Mumbai’s government hospitals. Each day, we provide freshly prepared, hot, and nutritious food to out-patients and family members of in-patients in Mumbai’s government hospitals, totally free of cost. Our Hospital Feeding Programme is an attempt to respond to the hunger pangs of the underprivileged who are not only battling illness, but also struggling to meet treatment cost. </p>
            </div>
        <form method="post" action="<?php echo base_url(); ?>payment/pay" id="donate-form" class="requires-validation" novalidate method="post" enctype="multipart/form-data">
            <input type="hidden" name="currency" value="INR">
            <input type="hidden" name="citizen" value="indian">
            <h5 class="mb-2 ">Akshaya Chaitanya wishes you a very happy & prosperous Diwali. Celebrate with us to make it a festival of light & kindness!</h5>
            <!-- <small class="">The Hospital Feeding Programme impacts health and expenses of beneficiaries. It ensures consumption of nutritious food thereby supporting good health of patients & families. It also reduces the burden of food cost and enables savings for treatment.</small> -->
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
                    <!-- <span>No. of Meals* </span> -->
                    <select class="form-control border-1 drop-select" name="amount" id="amount" required onchange="selection(this.value)"> 
                        <option value="0" >Select Meal Quantity</option>
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
                    
                    <!-- <div class="input-group-append">
                        <i class="fa fa-angle-down input-group-text"></i>
                    </div> -->
                    
                </div>
                <div class=" form-group  p-1 display-flex align-items-center">
                    <span style="">Or</span>
                </div>
               
                <div class="form-group w-45 p-1">
                    <!-- <span>Quantity</span> -->
                    <input class="form-control border-1 drop-select" type="text" name="quantity" id="quantity" placeholder="Enter Qty" >
                    <div class="invalid-feedback">Quantity field cannot be blank!</div>
                </div>
            </div>
            <div class="form-group text-center">
                <button id="submit" type="submit" value="Donate Now" class="btn btn-primary px-2 py-3 btn-full  rounded w-100 " onclick="form_submit()">
                    <span class="MuiButton-label jss92 display-flex justify-content-between align-items-center"><span id="meal" class="jss89 jss93">10 meals | ₹ 500</span><span class="jss94">SHARE AN UNLIMITED MEAL</span></span>
                </button>   
                <small class="text-center">Avail tax exemption under Section 80G</small>
                <!-- <button class="MuiButtonBase-root MuiButton-root jss95 jss103 MuiButton-text btn-primary" tabindex="0" type="button"><span class="MuiButton-label jss92"><span class="jss89 jss93">105 meals | ₹ 3675</span><span class="jss94">SHARE A MEAL</span></span><span class="MuiTouchRipple-root"></span></button> -->

            </div>

        </form>
    </div>
  
</div>


<div class="container">
    <div class="row">
        <div class="col-md-2">
            <img src="assets/images/campaigns/saraswathi.jpg" class="img-fluid" width="100%">
        </div>
        <div class="col-md-10">
            <p>“At least there is one time during the day when I can relax and have a homely meal without having to think how much it would cost.”</p>
            <h5>Saraswati Brijesh Vishwakarma, Beneficiary from BYL Nair Hospital</h5>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-md-2">
            <img src="assets/images/campaigns/vijakumar.jpg" class="img-fluid" width="100%">
        </div>
        <div class="col-md-10">
            <p>“I stay alone in Mumbai and prepare my own food, but it is not as good as this meal. And who gives hot food, sir? A lot of money gets saved by eating food here. I will send this money home next month.”</p>
            <h5>Vijaykumar Thakur, Beneficiary from G.T. Hospital</h5>
        </div>
    </div>
</div>




<div class="container-fluid  pt-4 bg-white">
    <div class="row">
        <div class="col-10 mx-auto">
            <div class="container">
                <div class="row justify-content-center mb-5">
                    <div class="col-12 heading-section text-center aos-init aos-animate mb-3" data-aos="fade-up" data-aos-duration="1000">
                        <span class="subheading">Our Corporate Partners</span>

                    </div>
                    <!-- <div class="col-md-4">
                        <section class="row">
                            <div class="col-12 text-center">
                                <h6 class="text-">Government & Civic Authorities</h6>
                            </div>
                            <div class="col-md-5"><img src="assets/images/campaigns/BMC-logo.jpg"></div>
                            <div class="col-md-5"><img src="assets/images/campaigns/MEDD-or-DMER.jpg"></div>

                        </section>
                    </div> -->
                    <div class="col-md-10 mx-auto ">
                        <!-- <div class="col-12 text-center">
                            <h6 class="">Corporate Partners</h6>
                        </div> -->
                        <section class="customer-logos slider">
                            <div class="slide"><img src="assets/images/campaigns/tlc.jpg"></div>
                            <div class="slide"><img src="assets/images/campaigns/unique.jpg"></div>
                            <div class="slide"><img src="assets/images/campaigns/barath.jpg"></div>
                            <div class="slide" ><img src="assets/images/campaigns/metro.jpg"></div>
                            <div class="slide" ><img src="assets/images/campaigns/bagri.jpg"></div>
                            <div class="slide"><img src="assets/images/campaigns/etg.jpg"></div>
                            
                        </section>
                        <p class="text-center mt-3">This Diwali, you have a chance to bring light in someone’s life, just by providing food.
                            Contribute generously to keep the evils of hunger at bay. Spread awareness about the 
                            Hospital Feeding Programme so that silent hunger in government hospitals don’t get ignored anymore.
                        </p>
                        <h4 class="text-center">Together, let’s make it a #ThoughtfulDiwali</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>







<script type="text/javascript" >
var selection;
    $(document).ready(function() {

        selection = function(id){
           $('#quantity').val(id/50)
           $('#meal').html(id/50+' meals | ₹ '+id);
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
        const forms = document.querySelectorAll('.requires-validation')
        if ($('#quantity').val() < 10 && $('#amount').val() < 500 || $('#quantity').val() =='' || $('#amount').val() == '') {
            event.preventDefault()
            event.stopPropagation()
            alert('Meal Quantity is required and should be atleast 10');
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



    $('.customer-logos').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 1500,
        arrows: false,
        dots: false,
        pauseOnHover: false,
        // variableWidth: true,
        responsive: [{
            breakpoint: 768,
            settings: {
                slidesToShow: 4
            }
        }, {
            breakpoint: 520,
            settings: {
                slidesToShow: 3
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