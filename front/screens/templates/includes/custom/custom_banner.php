
	
	<!--Page Header Start-->
        <?php if($page_items->display_image == 1 && !empty($page_items->display_image) && file_exists((BANNER_IMAGE_PATH.$page_items->banner_image))){ ?>
        <section class="page-header ">
            <div class="page-header__bg" >
                <img src="<?php echo BANNER_IMAGE_PATH.$page_items->banner_image; ?>" alt="banner-image">
            </div>
            <!-- /.page-header__bg -->
            <div class="container">
                <!--<h2><?php // echo $page_heading; ?></h2>-->
                <!-- <ul class="thm-breadcrumb list-unstyled"> -->
                     <!-- <?php echo $breadcrumb; ?> -->
                <!-- </ul> -->
            </div>
        </section>
        <?php } ?>
                <!--Page Header End-->