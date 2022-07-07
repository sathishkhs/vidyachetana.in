<style>
.page-header{
    height: 350px;
}
.bg-light-grey{
    background: #fff;
}
.helping-one__right-form input[type="number"]{
  height: 67px;
  width: 100%;
  border: none;
  padding: 0 30px;
  margin-bottom: 10px;
  border-radius: 0;
  outline: none;
  font-size: 16px;
  font-weight: 700;
  color: var(--thm-gray);
  background-color: rgb(255, 255, 255);
  box-shadow: 0px 0px 30px 0px rgb(0, 0, 0, .07);
}
.helping-one__right-form input[type="text"], .contact-page__input-box input[type="text"], .contact-page__input-box input[type="email"], .helping-one__right-form input[type="number"] {
    height: 48px;
}
@media (max-width: 768px){
    .page-header{
        height: 150px;
    }
}
    .campaign-wrap img,
    .customer-logos img {
        width: 100% !important;
    }

    .accordion-button {
        font-weight: 700;
        font-size: 26px;
        color: #ea5638;
        border:0 !important;
        border-bottom: 1px solid rgba(0,0,0,.152) !important;
    }

    .accordion-button:not(.collapsed) {
        color: #fff;
        background: #ea5638;
    }

    .accordion-button.collapsed {
        font-size: 16px;
        font-weight: 400;
    }
    .accordion-button:not(.collapsed)::after{
        background-image: none;
        font-family: "Font Awesome 5 Free";
        content: '\f068';
        height: 1.9rem;
    }
    .accordion-button:after{
        /* background-image:none; */
        /* font-family: "Font Awesome 5 Free";
        content:"\f067" */
        
    }
    .accordion-collapse{
        border: 0;
        border-bottom:solid rgb(234, 86, 56);
    }
    .accordion-button:focus{
        box-shadow: 0 0 0 .25rem rgb(234, 86, 56,0.1);
        border-color: #ea5638;
    }
    .contact-page__contact-info{
        padding-top: 4px;
    }
    h2 button{
        text-align: left;
    }
    input[type=number] {
  -moz-appearance: textfield;
}
</style>


<section class="contact-page pt-1">
    <div class="container">

        <div class="row">
            <div class="col-xl-6 col-lg-6">
                <div class="contact-page__left">


                    <div class="contact-page__contact-info">


                        <div class="container">
                            <div class="accordion" id="accordionExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingOne">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            1. What is Vidya Chetana?
                                        </button>
                                    </h2>
                                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                             Vidya Chetana is a programme of Youth for Seva (YFS), one of the most trusted
                                            NGOs in India. YFS initiated this programme in 2009 with the objective to support
                                            education of students hailing from underprivileged socio-economic backgrounds.
                                            Through this programme, YFS provides financial aid to underprivileged students in the
                                            form of scholarship.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingTwo">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            2. Which level of education does Vidya Chetana support?
                                        </button>
                                    </h2>
                                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                             Vidya Chetana provides scholarship for higher education in PUC (10+2), Degree,
                                            Engineering, and Medical courses.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingThree">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                            3. Who are the beneficiaries of Vidya Chetana?
                                        </button>
                                    </h2>
                                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                             Students from socio-economically weaker sections, specially-abled, and those students who lost their parents during COVID-19 pandemic are the beneficiaries of Vidya Chetana.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingFour">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                            4. In which states/locations does Vidya Chetana operate?
                                        </button>
                                    </h2>
                                    <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                             Vidya Chetana supports higher education of underprivileged students across 10
                                            states in India.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingFive">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                            5. How many students have Vidya Chetana supported so far?
                                        </button>
                                    </h2>
                                    <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                             So far, Vidya Chetana has supported education of 5,775 students.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingSix">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                            6. Apart from supporting education, does Vidya Chetana help the beneficiaries in any
                                            other way?
                                        </button>
                                    </h2>
                                    <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                             Apart from the definite benefit of being able to complete higher education, the
                                            beneficiaries of Vidya Chetana will receive the below-mentioned benefits too:
                                            <ul>
                                                <li> Admission guidance for college and course selection</li>
                                                <li> Career guidance sessions &amp; soft skills workshop</li>
                                                <li> Training on 21 st  century skills</li>
                                                <li> Mentorship programs to mould them into responsible citizens through</li>
                                                residential camps, value inculcating workshops etc.
                                                <li> Employability Readiness Program (for final year students)</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingSeven">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                                            7. Will I get details of the student I am donating for?
                                        </button>
                                    </h2>
                                    <div id="collapseSeven" class="accordion-collapse collapse" aria-labelledby="headingSeven" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                             Yes, you will get the following details of the student you are donating for:
                                            <ul>
                                                <li> Academic progress report (marks card, once a year) of the student you have supported</li>
                                                
                                                <li> Virtual or physical meeting with the student (through Vidya Chetana)</li>
                                                <li> Messages to and from the student (through Vidya Chetana)</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingeight">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseeight" aria-expanded="false" aria-controls="collapseeight">
                                            8. Will I get receipt and tax exemption if I donate to Vidya Chetana?
                                        </button>
                                    </h2>
                                    <div id="collapseeight" class="accordion-collapse collapse" aria-labelledby="headingeight" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                             Yes, you will receive donation receipt for your donation. You will be eligible to
                                            receive 80G tax exemption certificate only for donations of ₹500 and above.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingNine">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
                                            9. List the credentials to establish authenticity of Youth for Seva and Vidya Chetana.
                                        </button>
                                    </h2>
                                    <div id="collapseNine" class="accordion-collapse collapse" aria-labelledby="headingNine" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                             Youth for Seva is a registered NGO and is one of the most trusted charitable
                                            organisations in India. It focusses its efforts in the areas of education, health,
                                            environment, and livelihood. Vidya Chetana is one of its education initiatives.
                                            <ul>
                                                <li> Youth for Seva is registered under Indian Trusts Act 1882.</li>
                                                <li> All donations of ₹500 and above towards the programs of Youth for Seva are</li>
                                                eligible for tax exemption under Section 80G of the Income Tax Act of India.
                                                <li> Youth for Seva is also eligible to receive foreign donations as per the FCRA Act.</li>
                                                <li> Upholding transparency across all the programs, Youth for Seva publishes its</li>
                                                annual report at the end of every financial year for all its stakeholders.
                                                <li> The Trust Deed and Tax Exemption documents can be made available on request.</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>



                            </div>

                        </div>

<div class="row">
    <div class="col-sm-12 mt-1">
        <img src="assets/images/campaigns/2.png" class="w-100">
    </div>
</div>


                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 order-first order-md-2">
                <div class="contact-page__form helping-one__right-form">
                    <form name="donate-form" action="<?php echo base_url(); ?>sponsor-a-child" class="contact-page__main-form " id="donate-form"  method="post" enctype="multipart/form-data">
                        <h3 class="section-title__tagline text-center">DONATION FORM</h3>
                        <p class="">Donate generously to educate underprivileged students.</p>
                        <input id="currency" type="hidden" name="currency" value="INR">
                        <!-- <input type="hidden" name="citizen" value="indian"> -->
                        <input type="hidden" name="table_name" value="payments">
                        <input type="hidden" name="programme" value="sponsor_child">
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
                                    <input class="form-control" type="number" name="amount" placeholder="Other amount*" id="amount" value="1000">
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
                                 <small> <ul>

                                <li>Contributing donation through online mode is safe, secure, and easy with many payment options to choose from.</li>
                                <li>Once you donate ₹500 or more, you will receive donation receipt and tax exemption certificate as per Sec 80G of Income Tax Act.</li>

                                </ul> </small>
                            </div>

                    </form>
                </div>
            </div>
            
            
            <section>
    <div class="container">
    <div class="row mt-5">
                    <div class="col-sm-12">
                   
                    <div class="section-title ">
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
       

            var button = document.getElementById('clickButton');
            <?php if (!empty($key) && !empty($amount)) { ?>
                $('#razorpay-form').submit();
            <?php } ?>
            $('#modal-close').on('click', function() {

                //  window.location.replace("donate");
                window.location.href = 'sponsor-a-child';

            });


       


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
            slidesToShow: 3,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 1500,
            arrows: false,
            dots: false,
            pauseOnHover: false,
            responsive: [{
                breakpoint: 768,
                settings: {
                    slidesToShow: 3
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