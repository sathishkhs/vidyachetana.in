<style>
    
   .campaign-wrap img, .customer-logos img{
        width:100%!important;
    }

    @media only screen and (max-width: 767px) {

    .register-photo .form-container{
    display: block;
    }
}

#donate-form{
    /* border: 1px #d3dadf solid; */
box-shadow: 0px 0px 10px 10px #e8e8e8;
border-radius: 11px;
}

.thm-text-blue{
    color:#1D6DA0
}
.text-align-center{
    text-align: center;
}

</style>



 <section class="hero-wrap rellax" style="background-image: url(&quot;assets/images/backgrounds/home-banner4-15th-nov.jpg&quot;); transform: translate3d(0px, 0px, 0px);"> 
    <!-- <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text ">
            <div class="col-lg-8 pt-5 mt-5">
                <span class="subheading">Raising Hope</span>
                <h2 class="mb-4 mt-5">Empty stomachs don’t heal. They only growl.</h2>
                <p>
                    <a href="campaign?#form-campaign" class="btn btn-green px-4 py-2">Join Us <span class="ion-ios-arrow-round-forward"></span></a>
                    <a href="#" class="btn">Watch the Video <span class="ion-ios-play"></span></a>
                </p>
            </div>
        </div>
    </div> -->
</section>
<!-- 
<section class="container mt-4">
    <div class="row">
        <div class="col-sm-12 text-center">
            <p>Akshaya Chaitanya is an NGO in Mumbai with the vision to open up a world of opportunities for every vulnerable by ensuring food security. It is an initiative of Hare Krishna Movement. We implement feeding services in government hospitals and for underprivileged school-going children. We follow a cyclic menu consisting of rice, and a variety of pulses and vegetables, making it a wholesome meal. Every day, between 12 noon and 1 p.m., we serve meals that is nutritious and locally palatable too. </p>
           
        </div>

        <div class="col-sm-6 text-center">
        <div class="section-title">
                  <span class="section-title__tagline mt-4">HOSPITAL FEEDING PROGRAMME</span>
              </div>
          
            <p>In partnership with BMC and DMER, Government of Maharashtra, 
we serve free lunch to out-patients and family members of 
in-patients in Mumbai’s government hospitals.
</p>
        </div>
        <div class="col-sm-6 text-center">
        <div class="section-title">
                  <span class="section-title__tagline mt-4">FEED THE CHILDREN PROGRAMME</span>
              </div>
            <p>In partnership with an NGO engaged in providing education 
to underprivileged children, we provide lunch to children, 
aged between 6 and 14 years.

</p>
        </div>

    </div>
</section> -->

<!-- <section class="text-center">
<h2 class="section-title__title_small text-center">IMPACT SO FAR</h2>
    <div class="campaign-wrap">
        <div class="counter col_fourth">
            <img class="" src="assets/images/campaigns/meal-served.png" style="width:25%">
            <h2 class="timer count-title count-number" data-to="<?php echo $impact_numbers->cumulative_meals_served; ?>" data-speed="1500"></h2>
            <p class="count-text ">Cumulative meals served</p>
        </div>

        <div class="counter col_fourth">
            <img src="assets/images/campaigns/beneficiaries.png" style="width:25%">
            <h2 class="timer count-title count-number" data-to="<?php echo $impact_numbers->beneficiaries_served_daily; ?>" data-speed="1500"></h2>
            <p class="count-text ">Beneficiaries served daily</p>
        </div>

        <div class="counter col_fourth">
            <img src="assets/images/campaigns/hospital.png" style="width:25%">
            <h2 class="timer count-title count-number" data-to="<?php echo $impact_numbers->beneficiary_hospitals; ?>" data-speed="1500"></h2>
            <p class="count-text ">Government hospitals</p>
        </div>
        <div class="counter col_fourth">
            <img src="assets/images/campaigns/school-meal-programme.png" style="width:25%">
            <h2 class="timer count-title count-number" data-to="<?php echo $impact_numbers->schools_on_wheels; ?>" data-speed="1500"></h2>
            <p class="count-text ">School on wheels</p>
        </div>



    </div>
</section> -->

<div class="register-photo" id="form-campaign">
    <div class="form-container">
        <div class="text-holder">
            <div class="section-title">
                  <span class="section-title__tagline mt-4">Add compassion and generosity to your celebrations by offering charity.</span>
              </div>
              
              <p>Each year we celebrate so many occasions, both personal and social. Right from birthdays to festivals to observing important national and international days. Each of these days give us an opportunity to think for the larger good of the society.  </p>
              <div class="section-title">
                    <span class="section-title__tagline mt-4">Save the date! </span>
                </div>
                <p>
                At Akshaya Chaitanya, we give you the opportunity to celebrate your special and solemn occasions with us. Your contribution to the Hospital Feeding Programme & School Meal Programme to mark your chosen day will provide the much-needed food to the needy in Mumbai’s government hospitals and migrant school children respectively. Some of the occasions you can donate for food are: 
                </p>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <ul>
                                    <li>Birthdays</li>
                                    <li>Weddings</li>
                                    <li>Housewarming</li>
                                    <li>In honour of …and more!</li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <ul>
                                    <li>In memory of </li>
                                    <li>Promotions</li>
                                    <li>New venture</li>
                                   
                                </ul>
                            </div>
                            <div class="col-md-12">
                                <h5 class="text-align-center thm-text-blue">Donate and make a difference on your special day.</h5>
                            </div>

                        </div>

                    </div>

        </div>
 
        <form method="post" action="<?php echo base_url(); ?>save-the-date" id="donate-form" class="requires-validation" novalidate method="post" enctype="multipart/form-data">
            <input type="hidden" name="currency" value="INR">
            <input type="hidden" name="citizen" value="indian">
            <input type="hidden" name="table_name" value="save_the_date">
            <h5 class="mb-2  thm-text-blue">Care to feed those who submit to hunger, just so that they can save money for treatment.</h5>
            <!-- <small class="">The Hospital Feeding Programme impacts health and expenses of beneficiaries. It ensures consumption of nutritious food thereby supporting good health of patients & families. It also reduces the burden of food cost and enables savings for treatment.</small> -->
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
                    <span class="MuiButton-label jss92 display-flex justify-content-between align-items-center"><span id="meal" class="jss89 jss93">10 meals | ₹ 500</span><span class="jss94">SHARE UNLIMITED MEALS</span></span>
                </button>   
                <!-- <button class="MuiButtonBase-root MuiButton-root jss95 jss103 MuiButton-text btn-primary" tabindex="0" type="button"><span class="MuiButton-label jss92"><span class="jss89 jss93">105 meals | ₹ 3675</span><span class="jss94">SHARE A MEAL</span></span><span class="MuiTouchRipple-root"></span></button> -->
                Or
                <a href="corporate-giving" class="btn btn-primary px-2 py-3 btn-full  rounded w-100 " >
                    <span class="jss94">BECOME OUR CORPORATE PARTNER</span>
</a> 
                <small class="text-center">Avail tax exemption under Section 80G</small>
            </div>

        </form>
    </div>
</div>

<!--our partners Start-->


<section class="hero-wrap rellax" style="background-image: url(&quot;assets/images/backgrounds/strip-banner.jpg&quot;); transform: translate3d(0px, 0px, 0px);"> 
   
</section>
<!-- <div class="container mt-5">
      <h2 class="section-title__title_small text-center">OUR PARTNERS</h2>
      <div class="row">
          <div class="col-lg-4">
              <div class="section-title">
                  <span class="section-title__tagline mt-4">In Partnership with</span>
              </div>
              <div class="row">
                  <div class="partner-image col-xl-6 col-sm-6 col-md-6 p-4 ">
                      <img src="assets/images/kitchen/partner1.jpg" alt="">
                  </div>
                  <div class="partner-image col-xl-6 col-sm-6 col-md-6 p-4 ">
                      <img src="assets/images/kitchen/partner2.jpg" alt="">
                  </div>
              </div>
          </div>
          <div class="col-lg-8">
              <div class="section-title text-center">
                  <span class="section-title__tagline mt-4">Our current Corporate Partners</span>
              </div>
              <section class="customer-logos slider">
                  <div class="slide p-4"><img src="assets/images/kitchen/partner3.jpg"></div>
                  <div class="slide p-4"><img src="assets/images/kitchen/partner4.jpg"></div>
                  <div class="slide p-4"><img src="assets/images/kitchen/parrtner5.jpg"></div>
                  <div class="slide p-4"><img src="assets/images/kitchen/partner6.jpg"></div>
                  <div class="slide p-4"><img src="assets/images/kitchen/partner7.jpg"></div>
                  <div class="slide p-4"><img src="assets/images/kitchen/partner8.jpg"></div>
              </section>
          </div>
      </div>
  </div> -->


  <!--our partners end-->

  <div class="col-sm-12 col-md-12 mx-auto">
<!--<div class="form-body">-->
    <div class="row">
        <div class="form-holder">
            <div class="form-content">
                <div class="form-items">
<!--                    <h3 class="text-center">Akshayachaitanya Donation Page</h3>-->
<!--                    <h4>Select any payment gateway to complete payment.</h4>-->
                    
                    <form id="razorpay-form" action="<?php echo base_url(); ?>campaigns/save_payment" method="POST">
                        <script type="text/javascript"  src="https://checkout.razorpay.com/v1/checkout.js"
                        data-buttontext=""
                        data-key="<?php echo $key; ?>"
                        data-amount="<?php echo $amount; ?>"
                        data-currency="INR"
                        data-name="<?php echo $name ?>"
                        data-image="<?php echo $image ?>"
                        data-description="<?php echo $description ?>"
                        data-prefill.name="<?php echo $prefill['name'] ?>"
                        data-prefill.email="<?php echo $prefill['email'] ?>"
                        data-prefill.contact="<?php echo $prefill['contact'] ?>"
                        data-notes.shopping_order_id="<?php echo $notes['merchant_order_id']; ?> "
                        data-modal.confirm_close = 'true'
                        data-modal.ondismiss="this.modal_close()"
                        <?php if ($displayCurrency !== 'INR') { ?>
                        data-display_amount="<?php echo $display_amount ?>" <?php } ?> <?php if ($displayCurrency !== 'INR') { ?>
                        data-display_currency="<?php echo $display_currency ?>" <?php } ?>
                        data-redirect = 'true'
                        data-callback_url = "<?php echo base_url(); ?>campaigns/save_payment/<?php echo $insert_id .'/'. $table_name; ?>"
                        
                        >

                      
                        </script>
                      
                        <!-- Any extra fields to be submitted with the form but not sent to Razorpay -->
                        <input type="hidden" name="receipt" value="<?php echo $notes['merchant_order_id']; ?>">
                        <input type="hidden" name="order_id" value="<?php echo $order_id; ?>">
                        <input type="hidden" name="name" value="<?php echo $prefill['name']  ?>">
                        <input type="hidden" name="email" value="<?php echo  $prefill['email']?>">
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

<script type="text/javascript" >
    window.onload = function(){
    var button = document.getElementById('clickButton');
    <?php if(!empty($key) && !empty($amount)){ ?>
    $('#razorpay-form').submit();
    <?php } ?>
    $('#modal-close').on('click',function(){
      
            //  window.location.replace("donate");
             window.location.href = 'donate';
        
    });

   
}

function modal_close(){
    window.location.href = 'donate';
}

</script>





<script type="text/javascript" >
var selection;
      $(document).ready(function() {
 var dtToday = new Date();
  
  var month = dtToday.getMonth() + 1;
  var day = dtToday.getDate()+1;
  var year = dtToday.getFullYear();
  if(month < 10)
      month = '0' + month.toString();
  if(day < 10)
      day = '0' + day.toString();
  
  var maxDate = year + '-' + month + '-' + day;

      var field = '<input class="form-control w-100" min="'+maxDate+'" type="date" id="save_the_date"  name="save_the_date" placeholder="Save Date"  required/>';
       var   field1 = '<div class="col-md-12"><p style="font-size:14px;line-height:14px">Donate food in honour of someone or to mark a special occasion. Select the date you would like to serve food to the needy people and we will do the needful on your behalf.</p></div>';
  
       
      $('#savedate').on('change',function(){
          if($('#savedate').is(':checked')){
              $('.save-date').html(field)
              $('.save-date-text').html(field1)
            }else{
                
                $('.save-date').html('')
                $('.save-date-text').html('')

          }

      })
      
       var field2 = '<input class="form-control w-100" type="number" id="whatsapp_number"  name="whatsapp_number" placeholder="Enter Your Whatsapp Number" required/>';
          $('#receive_updates').on('change',function(){
              if($('#receive_updates').is(':checked')){
                  $('.receive-updates-number').html(field2)
                 
                }else{
                    
                    $('.receive-updates-number').html('')
                  
    
              }
    
          })
      
  
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