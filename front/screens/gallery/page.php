<div class="container">
    <div class="row">
      <div class="gallery col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <h1 class="gallery-title"><?php echo $gallery->gallery_name; ?></h1>
     
        <?php if(!empty($categories)){ ?>
        <div class="text-center">
          <button class="btn btn-default filter-button active" id="all" onclick="call(this.id)">All</button>
          <?php foreach($categories as $category){ ?>
          <button class="btn btn-default filter-button" id="<?php echo str_replace(' ','-',$category->category_name); ?>" onclick="call(this.id)"><?php echo $category->category_name; ?></button>
          <?php } ?>
         
        </div>
        <?php }else{ ?>
            <h4 class="text-center text-red">
                No Gallery Found
            </h4>
            <?php } ?>
      </div>

      <?php if(!empty($gallery_images)){ 
          foreach($gallery_images as $image){  
          ?>
        <a href="<?php echo GALLERY_UPLOAD_PATH . $image->gallery_img_path; ?>" class="glightbox gallery_product col-6 col-lg-4 col-md-4 col-sm-4 col-xs-6 filter <?php echo str_replace(' ','-', $this->db->where('category_id',$image->category_id)->get('gallery_category')->row()->category_name); ?>">
        <img src="<?php echo GALLERY_UPLOAD_PATH . $image->gallery_img_path; ?>"> </a>
  
      <?php } } ?>
    </div>
  </div>
