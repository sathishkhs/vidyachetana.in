<section class="inner-header divider " data-bg-img="assets/images/bg/banner-bg.png" style="background-image: url('assets/images/bg/banner-bg.png'); background-position: bottom left;">
      <div class="container  pt-40">
        <!-- Section Content -->
        <div class="section-content">
          <div class="row"> 
            <div class="col-md-12">
              <h1 class=" text-center font-36"><?php echo $page_items->page_title; ?></h1>
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
<section>
	<?php if (!empty($page_items->page_content)): ?>
		<?php echo $page_items->page_content; ?>
	<?php endif; ?>
</section>