<section class="content">
    <section class="wrapper">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <form class="form-horizontal" action="sevas/sevas_save" method="post" enctype="multipart/form-data">
                            <input name="sevas_id" type="hidden" value="<?php echo (!empty($query->sevas_id)) ? $query->sevas_id : ''; ?>" />
                            <br />
                            <div class="form-group">
                                <label class="col-sm-2 col-md-2 control-label" for="form-field-1">Seva Name </label>
                                <div class="col-sm-10">
                                    <span class="eror"><?php echo form_error('seva_name'); ?></span>
                                    <input name="seva_name" id="seva_name" type="text" class="form-control" value="<?php echo (!empty($query->seva_name)) ? $query->seva_name : ''; ?>" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 col-md-2 control-label" for="form-field-1">Seva Amount </label>
                                <div class="col-sm-10">
                                    <span class="eror"><?php echo form_error('seva_amount'); ?></span>
                                    <input name="seva_amount" id="seva_amount" type="number" class="form-control" value="<?php echo (!empty($query->seva_amount)) ? $query->seva_amount : ''; ?>" />
                                </div>
                            </div>
                            
                           

                            <div class="form-group">
                                <label class="col-sm-2 col-md-2 control-label" for="form-field-3">Seva Image</label>
                                <div class="col-sm-<?php echo !empty($query->seva_image) ? 8 : 10 ?>">
                                    <span class="eror"><?php echo form_error('seva_image'); ?></span>
                                    <input name="seva_image" type="file" class="form-control" value="" />
                                    <p class="custom-msg">Image size Should be 1350px width and 300px height</p>
                                </div>
                                <?php if (!empty($query->seva_image)) { ?>
                                    <div class="col-sm-2">
                                        <img src="<?php echo SEVAS_PHOTO_UPLOAD_PATH . $query->seva_image; ?>" width="80px" height="80px">
                                    </div>
                                <?php } ?>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 col-md-2 control-label" for="form-field-5"> Seva Description</label>
                                <div class="col-sm-10">
                                    <span class="eror"><?php echo form_error('description'); ?></span>
                                    <textarea name="description" type="text" class="form-control ckeditor" value=""><?php echo (!empty($query->description)) ? $query->description : ''; ?>  </textarea>
                                </div>
                            </div>
                            <div class="form-group">
								<label class="col-sm-2 col-md-2 control-label" for="form-field-4">Seva Category</label>
								<div class="col-sm-10">
								    <span class="eror"><?php echo form_error('sevas_id'); ?></span>
									<select class="form-control" name="seva_category_id" id="seva_category_id"  >
										<option value="">Select Seva Category</option>
										<?php foreach ($seva_categories as $row) : ?>
                                            <option value="<?php echo $row->seva_category_id; ?>" <?php echo (!empty($query->seva_category_id) && $query->seva_category_id == $row->seva_category_id) ? 'selected' : ''; ?>><?php echo $row->category_title; ?></option>
                                        <?php endforeach ?>
									</select>
								</div>
							</div>


                            <div class="form-group">
                                <label class="col-sm-2 col-md-2 control-label" for="form-field-8">Status</label>
                                <div class="col-sm-10">
                                    <span class="eror"><?php echo form_error('status_ind'); ?></span>
                                    <input name="status_ind" value="1" type="radio" <?php echo (!empty($query->status_ind)) ? 'checked' : ''; ?> />
                                    <span class="label label-success">Publish</span>
                                    &nbsp; &nbsp; &nbsp;&nbsp;
                                    <input name="status_ind" value="0" type="radio" <?php echo (empty($query->status_ind)) ? 'checked' : ''; ?> />
                                    <span class="label label-danger">Unpublish</span>
                                </div>
                            </div>
                            <hr>
                            <div class="form-actions form-btns">
                                <button class="btn btn-round btn-success" type="submit">
                                    <i class="fa fa-check"></i>
                                    Save
                                </button>
                                &nbsp; &nbsp; &nbsp;
                                <button class="btn btn-round btn-default" type="reset">
                                    <i class="fa fa-refresh"></i>
                                    Reset
                                </button>
                                &nbsp; &nbsp; &nbsp;
                                <a href="specialities">
                                    <button class="btn btn-warning btn-round" type="button">
                                        <i class="fa fa-times"></i>
                                        Back
                                    </button></a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>