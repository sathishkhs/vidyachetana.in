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
    <form class="form-horizontal" role="form" action="testimonials/testimonials_save" method="post" enctype="multipart/form-data">
      <input name="testimonials_id" type="hidden" value="<?php echo (!empty($query->testimonials_id)) ? $query->testimonials_id : ''; ?>" />

      <div class="card-body">

        <div class="row">
          <div class="form-group col-6">
            <div class="col-sm-12">
              <label class="col-sm-6 col-md-6 control-label" for="form-field-1">Full Name<span class="eror"><?php echo form_error('fullname'); ?></span></label>
              <input name="fullname" Placeholder="Full Name" type="text" class="form-control" value="<?php echo (!empty($query->fullname)) ? $query->fullname : ''; ?>" />
            </div>
          </div>
          <div class="form-group col-6">
            <div class="col-sm-12">
              <label class="col-sm-6 col-md-6 control-label" for="form-field-1">City<span class="eror"><?php echo form_error('city'); ?></span></label>
              <input name="city" Placeholder="City" type="text" class="form-control" value="<?php echo (!empty($query->city)) ? $query->city : ''; ?>" />
            </div>
          </div>
        </div>
        <div class="row">
          <div class="form-group col-6">
            <div class="col-sm-12">
              <label class="col-sm-6 col-md-6 control-label" for="form-field-1">Select Product<span class="eror"><?php echo form_error('products_id'); ?></span></label>
              <select name="products_id" id="products_id" class="form-control " onChange="return getproductcategory(this.value)">

                <option value="">-- Select Product --</option>

                <?php foreach ($products as $row) : ?>

                  <option value="<?php echo $row->products_id; ?>" <?php echo (!empty($query->products_id) && $row->products_id == $query->products_id) ? 'selected' : ''; ?>><?php echo $row->product_name; ?></option>

                <?php endforeach ?>

              </select>
            </div>
          </div>
          <div class="form-group col-6">
            <div class="col-sm-12">
              <label class="col-sm-6 col-md-6 control-label" for="form-field-1">-- Select Product Category --<span class="eror"><?php echo form_error('product_id'); ?></span></label>
              <select name="product_category_id" id="product_category_id" class="form-control product_category">

                <option value="">Select Product Category</option>
                <?php foreach ($product_category as $row) : ?>

                  <option value="<?php echo $row->product_category_id; ?>" <?php echo (!empty($query->product_category_id) && $row->product_category_id == $query->product_category_id) ? 'selected' : ''; ?>><?php echo $row->product_category_name; ?></option>

                <?php endforeach ?>


              </select>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="form-group col-11">
            <div class="col-sm-12">
              <label class="col-sm-6 col-md-6 control-label" for="form-field-1">Testimonial Comment<span class="eror"><?php echo form_error('testimonials_comment'); ?></span></label>
              <textarea rows="5" name="testimonials_comment" Placeholder="Testimonial Comment" type="text" class="form-control"><?php echo (!empty($query->testimonials_comment)) ? $query->testimonials_comment : ''; ?></textarea>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="form-group col-6">
            <div class="col-sm-12">
              <label class="col-sm-6 col-md-6 control-label" for="form-field-1">Upload User Image <span class="eror"><?php echo form_error('user_image'); ?></span></label>
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" name="user_image" class="custom-file-input" id="exampleInputFile">
                  <label class="custom-file-label" for="exampleInputFile">Choose file (500x493)</label>
                </div>
                <?php if (!empty($query->user_image)) { ?>
                  <img src="<?php echo base_url(TESTIMONIALS_IMAGE_PATH . $query->user_image) ?>" width="100px" height="100px">
                <?php } ?>
              </div>
            </div>
          </div>

        </div>
        <div class="row">
          <div class="form-group col-6">
            <div class="col-sm-12">
              <label class="col-sm-6 col-md-6 control-label" for="form-field-1">Upload Testimonial Image <span class="eror"><?php echo form_error('gallery_image'); ?></span></label>
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" name="testimonials_image" class="custom-file-input" id="exampleInputFile">
                  <label class="custom-file-label" for="exampleInputFile">Choose file (1148x200)</label>
                </div>
                <?php if (!empty($query->testimonials_image)) { ?>
                  <img src="<?php echo base_url(TESTIMONIALS_IMAGE_PATH . $query->testimonials_image) ?>" width="100px" height="100px">
                <?php } ?>
              </div>
            </div>
          </div>

        </div>
        <div class="form-group">
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
      <!-- /.card-body -->

      <div class="card-footer">
        <button class="btn btn-round btn-success" type="submit">
					<i class="fa fa-check"></i>
					Save
				</button>
        <button class="btn btn-round btn-danger" type="reset">
					<i class="fa fa-sync"></i>
					Reset
				</button>
        
        <a href="master/countries">
          <button class="btn btn-warning btn-round" type="button">
						<i class="fa fa-times"></i>
						Back
					</button></a>
      </div>
    </form>
  </div>
</div>