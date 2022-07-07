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
        <!-- Horizontal Form -->
        <form class="form-horizontals" method="post" id="banners_form" name="banners_form" action="master/banner_save" enctype="multipart/form-data">
            <input type="hidden" name="banner_id" value="<?php echo (!empty($query->banner_id)) ? $query->banner_id : "" ?>" />
            <div class="card-body">

                <div class="row">
                    <div class="col-12">
                        <p style="color:red; font-style:12px">If you need in between words of Top banner title bigger then wrap the word within &lt;span&gt;&lt;/span&gt; tag. ex:&lt;span&gt; DURAFIL &lt;/span&gt; </p>
                    </div>
                    <div class="col-xs-3 col-sm-3 col-md-3">
                        <div class="form-group">
                            <label for="banner_top_text">Top Banner Title</label>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <textarea type="text" rows="4" name="banner_top_text" id="banner_top_text" class="form-control" placeholder="Top Banner Title"><?php echo (!empty($query->banner_top_text)) ? $query->banner_top_text : '' ?></textarea>
                        </div>
                    </div>
                </div>



                <div class="row">
                    <div class="col-xs-3 col-sm-3 col-md-3">
                        <div class="form-group">
                            <label for="layer1_text">Layer 1 Text</label>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <input type="text" name="layer1_text" id="layer1_text" class="form-control" placeholder="Layer 1 Text" value="<?php echo (!empty($query->layer1_text)) ? $query->layer1_text : '' ?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-3 col-sm-3 col-md-3">
                        <div class="form-group">
                            <label for="layer1_button">Layer 1 button</label>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <input type="text" name="layer1_button" id="layer1_button" class="form-control" placeholder="Layer 1 Button" value="<?php echo (!empty($query->layer1_button)) ? $query->layer1_button : '' ?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-3 col-sm-3 col-md-3">
                        <div class="form-group">
                            <label for="layer1_button_url">Layer 1 button URL</label>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <input type="text" name="layer1_button_url" id="layer1_button_url" class="form-control" placeholder="Layer 1 Button Url" value="<?php echo (!empty($query->layer1_button_url)) ? $query->layer1_button_url : '' ?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-3 col-sm-3 col-md-3">
                        <div class="form-group">
                            <label for="layer2_text">Layer 2 Text</label>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <input type="text" name="layer2_text" id="layer2_text" class="form-control" placeholder="Layer 2 Text" value="<?php echo (!empty($query->layer2_text)) ? $query->layer2_text : '' ?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-3 col-sm-3 col-md-3">
                        <div class="form-group">
                            <label for="layer2_button">Layer 2 button</label>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <input type="text" name="layer2_button" id="layer2_button" class="form-control" placeholder="Layer 2 Button" value="<?php echo (!empty($query->layer2_button)) ? $query->layer2_button : '' ?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-3 col-sm-3 col-md-3">
                        <div class="form-group">
                            <label for="layer2_button_url">Layer 2 button URL</label>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <input type="text" name="layer2_button_url" id="layer2_button_url" class="form-control" placeholder="Layer 2 Button Url" value="<?php echo (!empty($query->layer2_button_url)) ? $query->layer2_button_url : '' ?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-3 col-sm-3 col-md-3">
                        <div class="form-group">
                            <label for="layer3_text">Layer 3 Text</label>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <textarea name="layer3_text" rows="4" id="layer3_text" class="form-control" placeholder="Layer 3 Text" data-validation="required"><?php echo (!empty($query->layer3_text)) ? $query->layer3_text : '' ?></textarea>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-3 col-sm-3 col-md-3">
                        <div class="form-group">
                            <label for="layer3_button">Layer 3 button</label>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <input type="text" name="layer3_button" id="layer3_button" class="form-control" placeholder="Layer 3 Button" value="<?php echo (!empty($query->layer3_button)) ? $query->layer3_button : '' ?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-3 col-sm-3 col-md-3">
                        <div class="form-group">
                            <label for="layer3_button_url">Layer 3 button URL</label>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <input type="text" name="layer3_button_url" id="layer3_button_url" class="form-control" placeholder="Layer 3 Button Url" value="<?php echo (!empty($query->layer3_button_url)) ? $query->layer3_button_url : '' ?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-3 col-sm-3 col-md-3">
                        <div class="form-group">
                            <label for="banner_bottom_text">Banner Bottom Text</label>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <input type="text" name="banner_bottom_text" id="banner_bottom_text" class="form-control" placeholder="Button Text" value="<?php echo (!empty($query->banner_bottom_text)) ? $query->banner_bottom_text : '' ?>">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-3 col-sm-3 col-md-3">
                        <div class="form-group">
                            <label for="banner_background_img_path">Banner Image</label>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <?php echo form_error('banner_background_img_path'); ?>
                            <input type="file" name="banner_background_img_path" id="banner_background_img_path" placeholder="Banner Image" value="<?php echo (!empty($query->banner_background_img_path)) ? $query->banner_background_img_path : '' ?>" <?php echo (!empty($query->banner_id)) ? '' : 'data-validation="required"'; ?>>
                            <?php if (!empty($query->banner_background_img_path) && file_exists('./' . BANNERS_PHOTO_UPLOAD_PATH . $query->banner_background_img_path)) { ?><br />
                                <a href="<?php echo BANNERS_PHOTO_UPLOAD_PATH . $query->banner_background_img_path; ?>" class="cboxElement" data-rel="colorbox">
                                    <img src="<?php echo BANNERS_PHOTO_UPLOAD_PATH . $query->banner_background_img_path; ?>" width="50"></a>
                                <input type="hidden" name="banner_background_img_path" value="<?php echo (!empty($query->banner_background_img_path)) ? $query->banner_background_img_path : ''; ?>" />
                            <?php } ?>
                            <?php if (!empty($query->banner_background_img_path)) { ?>
                                <br />
                                <a href="banners/removeimg/<?php echo $query->banner_id; ?>" onclick="return delete_action()">Remove Image</a>
                            <?php } ?>
                            <p class="image-dimention">Banner Image Size Should be 1350px width and 560px height.</p>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-3 col-sm-3 col-md-3">
                        <div class="form-group">
                            <label for="status_ind">Status</label>
                        </div>
                    </div>
                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <label class="radiobuttons"><input name="status_ind" value="1" type="radio" <?php echo (!empty($query->status_ind)) ? 'checked' : ''; ?> />
                                <span class="lbl">Publish</span></label>
                            &nbsp; &nbsp; &nbsp;&nbsp;
                            <label class="radiobuttons"><input name="status_ind" value="0" type="radio" <?php echo (empty($query->status_ind)) ? 'checked' : ''; ?> />
                                <span class="lbl">Unpublish</span></label>
                        </div>
                    </div>
                </div>
            </div>
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
                <a href="master/banners">
                    <button class="btn btn-warning btn-round" type="button">
                        <i class="fa fa-times"></i>Back</button></a>
            </div>

        </form>
    </div>

</div>