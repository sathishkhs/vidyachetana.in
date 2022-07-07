<!-- Main content -->
<div class="container">
  <div class="row">
    <div class="col-md-10 col-sm-12 mx-auto">
      <?php $msg = $this->session->flashdata('msg');
      if (!empty($msg['txt'])) : ?>
        <div class="alert alert-block alert-<?php echo $msg['type']; ?>">
          <button type="button" class="btn defalut" data-dismiss="alert">
            <i class="fa fa-times"></i>
          </button>
          <i class="<?php echo $msg['icon']; ?>"></i>
          <?php echo $msg['txt']; ?>
        </div>
      <?php endif ?>
    </div>
  </div>
</div>
<div class="card shadow mb-4">

  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary"><?php echo $page_heading; ?> <?php if (!empty($sub_heading)) { ?><small><?php echo $sub_heading; ?></small><?php } ?></h6>
  </div>
  <div class="card-body">
    <form class="form-horizontal" role="form" action="gallery/gallery_save" method="post" enctype="multipart/form-data">
      <input name="gallery_id" type="hidden" value="<?php echo (!empty($query->gallery_id)) ? $query->gallery_id : ''; ?>" />

      <div class="card-body">


        <div class="row">
          <div class="form-group col-6">
            <div class="col-sm-12">
              <label class="col-sm-6 col-md-6 control-label" for="form-field-1">Gallery Name <span class="eror"><?php echo form_error('gallery_name'); ?></span></label>
              <input name="gallery_name" Placeholder="Gallery Name" type="text" class="form-control" value="<?php echo (!empty($query->gallery_name)) ? $query->gallery_name : ''; ?>" />
            </div>
          </div>
          <div class="form-group col-6">
            <div class="col-sm-12">
              <label class="col-sm-6 col-md-6 control-label" for="form-field-1">Gallery Image <span class="eror"><?php echo form_error('gallery_img'); ?></span></label>
              <?php echo form_error('gallery_img'); ?>
              <input type="file" name="gallery_img" id="gallery_img" placeholder="Gallery Image" value="<?php echo (!empty($query->gallery_img)) ? $query->gallery_img : '' ?>" <?php echo (!empty($query->gallery_img_id)) ? '' : 'data-validation="required"'; ?>>
              <?php if (!empty($query->gallery_img) && file_exists('./' . GALLERY_IMG_UPLOAD_PATH . $query->gallery_img)) { ?><br />
                <a href="<?php echo GALLERY_IMG_UPLOAD_PATH . $query->gallery_img; ?>" class="cboxElement" data-rel="colorbox">
                  <img src="<?php echo GALLERY_IMG_UPLOAD_PATH . $query->gallery_img; ?>" width="50"></a>
                <input type="hidden" name="gallery_img" value="<?php echo (!empty($query->gallery_img)) ? $query->gallery_img : ''; ?>" />
              <?php } ?>
              <?php if (!empty($query->gallery_img)) { ?>
                <br />
                <a href="gallery/removeimg/<?php echo $query->gallery_id; ?>" onclick="return delete_action()">Remove Image</a>
              <?php } ?>
              <p class="image-dimention">Banner Image Size Should be 1350px width and 560px height.</p>
            </div>
          </div>

        </div>

        <div class="row">
            <div class="form-group col-6">
            <div class="col-sm-12">
              <label class="col-sm-6 col-md-6 control-label" for="form-field-1">Gallery Order <span class="eror"><?php echo form_error('order_id'); ?></span></label>
              <input name="order_id" Placeholder="Gallery Order" type="text" class="form-control" value="<?php echo (!empty($query->order_id)) ? $query->order_id : ''; ?>" />
            </div>
          </div>
          <div class="form-group col-6">
            <label class="control-label">Status<span class="eror"><?php echo form_error('status_ind'); ?></span></label>
            <div class="col-sm-10">
              <input name="status_ind" value="1" type="radio" <?php echo (!empty($query->status_ind)) ? 'checked' : ''; ?> />
              <span class="label label-success">Publish</span>
              &nbsp; &nbsp; &nbsp;&nbsp;
              <input name="status_ind" value="0" type="radio" <?php echo (empty($query->status_ind)) ? 'checked' : ''; ?> />
              <span class="label label-danger">Unpublish</span>
            </div>
          </div>
        </div>

      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button class="btn btn-round btn-success" type="submit">
          <i class="fa fa-check"></i>
          Save
        </button>
        &nbsp; &nbsp; &nbsp;
        <button class="btn btn-round btn-danger" type="reset">
          <i class="fa fa-sync"></i>
          Reset
        </button>
        &nbsp; &nbsp; &nbsp;
        <a href="gallery">
          <button class="btn btn-warning btn-round" type="button">
            <i class="fa fa-times"></i>
            Back
          </button></a>
      </div>
    </form>
  </div>
</div>