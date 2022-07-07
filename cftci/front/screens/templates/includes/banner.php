

<?php if ($page_items->display_image == 1 && !empty($page_items->display_image) && file_exists((BANNER_IMAGE_PATH . $page_items->banner_image))) { ?>
<section class="page-title bg-1" style="<?php echo BANNER_IMAGE_PATH . $page_items->banner_image; ?>">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="block text-center">
          <span class="text-white"><?php  echo $page_heading; ?></span>
          <h1 class="text-capitalize mb-4 text-lg"><?php echo $page_items->page_title; ?></h1>
        </div>
      </div>
    </div>
  </div>
</section>
<?php } ?>