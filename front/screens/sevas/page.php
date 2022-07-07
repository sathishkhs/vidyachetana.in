

<section class="inner-header divider " data-bg-img="assets/images/bg/banner-bg.png" style="background-image: url('assets/images/bg/banner-bg.png'); background-position: bottom left;">
      <div class="container  pt-40">
        <!-- Section Content -->
        <div class="section-content">
          <div class="row"> 
            <div class="col-md-12">
              <h2 class="text-white text-center font-36"><?php echo $page_items->sevas_page_title; ?></h2>
              <!-- <ol class="breadcrumb text-left mt-10 white">
                <li><a href="#">Home</a></li>
                <li><a href="#">Pages</a></li>
                <li class="active"><?php echo $page_items->page_title; ?></li>
              </ol> -->
            </div>
          </div>
        </div>
      </div>      
    </section>

<!-- Section: Causes -->
<section>
  <div class="container pt-70 pb-40">
    <div class="row mtli-row-clearfix">
      <div class="col-sm-6 col-md-8 col-lg-8">
        <div class="causes bg-white maxwidth500 mb-30">
          <div class="thumb">
            <img src="<?php echo SEVA_PAGE_BANNER_PATH . $page_items->seva_page_banner; ?>" alt="" class="img-fullwidth">
          </div>
          
        </div>
      </div>
          
      <div class="col-sm-6 col-md-4 col-lg-4">
        <div class="sidebar sidebar-right mt-sm-30">
          <div class="widget">
            <h4 class="widget-title line-bottom">Seva Information</h4>
            <p><b><?php echo $page_items->celebration_details; ?></b></p>
          </div>
          <!-- <div class="widget">
            <h4 class="widget-title line-bottom">Twitter Feed</h4>
            <div class="twitter-feed list-border clearfix" data-username="Envato"></div>
          </div> -->
          <div class="widget">
            <h5 class="widget-title line-bottom">Event Date and Time</h5>
            <b><?php echo date('F j, Y', strtotime($page_items->celebration_date)) . " " . $page_items->celebration_time; ?></b>
          </div>
         
        </div>
      </div>

    </div>
    <div class="row">
      <div class="col-sm-12">
      <div class="causes-details border-1px bg-white clearfix p-20 pt-10 pb-20">
            <h4 class="font-20 text-uppercase"><?php echo $page_items->sevas_page_title; ?></h4>
            <p class="mt-15" id="show_more"><?php echo $page_items->seva_page_desc_top; ?>  </p>
            <button type="button" id="more_less_btn" class="btn btn-xs btn-theme-colored btn-default read_more">Read More</button>
          </div>
        <div class="container">
          <?php foreach ($sevas as $seva) { ?>
            <div class="row">

            <h4 class="font-20 text-uppercase"><?php echo $seva->category_title; ?></h4>
            <?php if (!empty($seva->seva)) { ?>
              <?php $numOfCols = 4;
              $rowCount = 0;
              $bootstrapColWidth = 12 / $numOfCols; ?>

              <?php foreach ($seva->seva as $key => $seva) {
                if ($rowCount % $numOfCols == 0) { ?> 
                <div class="row display-flex" > <?php } $rowCount++; ?>
                  <div class="col-md-<?php echo $bootstrapColWidth; ?> mt-10">
                    <div class="causes bg-silver-light maxwidth500 border-1px bg-white mb-30">
                      <div class="thumb">
                        <img src="<?php echo SEVAS_PHOTO_UPLOAD_PATH . $seva->seva_image; ?>" alt="" class="img-fullwidth">
                      </div>
                      <div class="causes-details  bg-white clearfix p-15 pb-30">
                        <h4 class="font-16 text-uppercase"><a href="page-single-cause.html"><?php echo $seva->seva_name; ?></a></h4>
                        <ul class="list-inline font-weight-600 font-14 clearfix mb-5">
                          <li class="pull-left font-weight-400 text-black-333 pr-0">Amount: <span class="text-theme-colored font-weight-700">&#8377;<?php echo $seva->seva_amount; ?></span></li>
                          <!-- <li class="pull-right font-weight-400 text-black-333 pr-0">Goal: <span class="text-theme-colored font-weight-700">$5000</span></li> -->
                        </ul>
                        <!-- <div class="progress-item mt-5">
                            <div class="progress mb-0">
                              <div data-percent="84" class="progress-bar appeared" style="width: 84%;"><span class="percent">0</span><span class="percent">84%</span></div>
                            </div>
                          </div> -->
                        <p class="mt-15"><?php echo $seva->description; ?></p>
                        <input type="hidden" id="seva_amount" vlaue="<?php echo $seva->seva_amount; ?>">
                        <button type="button" class="btn btn-default btn-theme-colored mt-10 font-16 btn-sm" data-name="<?php echo $seva->seva_name; ?>" data-amount="<?php echo $seva->seva_amount; ?>" data-toggle="modal" data-target="#myModal" onclick="seva_amount(this.getAttribute('data-amount'),this.getAttribute('data-name'))">Offer Seva <i class="flaticon-charity-make-a-donation font-16 ml-5"></i></button>
                      </div>
                    </div>
                  </div>
                  <?php
                  if ($rowCount % $numOfCols == 0) { ?>
                  </div>
              <?php }
                } ?>
            </div>
          <?php  }
          } ?>
        </div>
      </div>

      <div class="event-details">
        <?php echo $page_items->seva_page_desc_bottom; ?>
      </div>
    </div>


  </div>
</section>




<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><?php echo $page_items->sevas_page_title; ?></h4>
      </div>
      <div class="container">
        <div class="modal-body">
          <section>
            <div class="section-content">
              <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6">
                  <h3 class="mt-0 line-bottom">Offer Seva<span class="font-weight-300"> Now!</span></h3>

                  <!-- ===== START: Paypal Both Onetime/Recurring Form ===== -->
                  <form id="popup_paypal_donate_form_onetime_recurring" action="seva_page/save_donation" id="offerseva_form" method="POST" enctype="multipart/form-data">


                    <div class="row">
                      <div class="form-group col-md-12">
                        <label>Full Name</label>
                        <input id="full_name" type="text" name="full_name" value="" class="form-control">
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-md-6">
                        <label>Phone Number</label>
                        <input id="phone_number" type="text" name="phone_number" value="" class="form-control">
                      </div>
                      <div class="form-group col-md-6">
                        <label>Email Address</label>
                        <input id="email" type="email" name="email" value="" class="form-control">
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-md-6">
                        <label>Pan Number</label>
                        <input id="pan_number" type="text" name="pan_number" value="" class="form-control">
                      </div>
                      <div class="form-group col-md-6">
                        <label>City</label>
                        <input id="city" type="text" name="city" value="" class="form-control">
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-md-12">
                        <label>Custom Amount</label>
                        <input id="amount" type="text" name="amount" value="" class="form-control">
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-12">
                        <div class="form-group mb-20">
                          <div>
                            <label>Seva you are offering: </label>
                            <input id="seva_name" name="seva_name" value="" class="form-control" readonly>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-12">
                        <div class="form-group mb-20">
                          <div>
                            <label><strong>Seva Amount: &#8377;</strong><span id="custom_other_amount"> </span> </label>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="col-sm-12">
                      <div class="form-group">
                        <button type="submit" class="btn btn-flat btn-dark btn-theme-colored mt-10 pl-30 pr-30" data-loading-text="Please wait...">Donate Now</button>
                      </div>
                    </div>

                  </form>


                </div>
              </div>
            </div>
        </div>
        </section>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-dark btn-flat">Save changes</button>
      </div>
    </div>
  </div>
</div>


<script>

</script>