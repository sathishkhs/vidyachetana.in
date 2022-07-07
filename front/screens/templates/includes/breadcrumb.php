
<?php if($page_items->display_image == 1 ){ ?>
<section class="inner-header divider layer-overlay overlay-dark-8" data-bg-img="<?php echo !empty($page_items->banner_image) && file_exists(BANNER_IMAGE_PATH.$page_items->banner_image) ? BANNER_IMAGE_PATH.$page_items->banner_image : 'assets/images/bg/bg2.jpg'; ?>">
      <div class="container pt-90 pb-40">
        <!-- Section Content -->
        <div class="section-content">
          <div class="row"> 
            <div class="col-md-6">
              <h2 class="text-white font-36">Our Impact</h2>
              <ol class="breadcrumb text-left mt-10 white">
                <li><a href="#">Home</a></li>
                <li><a href="#">Pages</a></li>
                <li class="active">Our Impact</li>
              </ol>
            </div>
          </div>
        </div>
      </div>      
    </section>
    <?php } ?>