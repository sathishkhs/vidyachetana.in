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
        <form class="form-horizontals" method="post" id="posts_form" name="posts_form" action="blog/posts_save" enctype="multipart/form-data">
            <input type="hidden" name="post_id" id="post_id" value="<?php echo (!empty($query->post_id)) ? $query->post_id : "" ?>" />

            <div class="card-body">

                <div class="row">
                    <div class="col-xs-3 col-sm-3 col-md-3">
                        <div class="form-group">
                            <label for="post_title">Post Title</label>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <input type="text" name="post_title" id="post_title" class="form-control" placeholder="Post Title" value="<?php echo (!empty($query->post_title)) ? $query->post_title : '' ?>" data-validation="required">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-3 col-sm-3 col-md-3">
                        <div class="form-group">
                            <label for="post_short_description">Post Short Description</label>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <textarea name="post_short_description" rows="4" id="post_short_description" class="form-control" placeholder="Post Short Description" data-validation="required"><?php echo (!empty($query->post_short_description)) ? $query->post_short_description : '' ?></textarea>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-3 col-sm-3 col-md-3">
                        <div class="form-group">
                            <label for="category_id">Select Category</label>
                        </div>
                    </div>
                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <select name="category_id" id="category_id" class="form-control" data-validation="required">
                                <option value="">-- Select Category --</option>
                                <?php foreach ($categories as $row) : ?>
                                    <option value="<?php echo $row->category_id; ?>" <?php echo (!empty($query->category_id) && $row->category_id == $query->category_id) ? 'selected' : ''; ?>><?php echo $row->category_name; ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-3 col-sm-3 col-md-3">
                        <div class="form-group">
                            <label for="post_image">Post Image</label>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <input type="file" name="post_image" id="post_image" placeholder="Post Image" value="<?php echo (!empty($query->post_image)) ? $query->post_image : '' ?>">
                            <?php if (!empty($query->post_image) && file_exists(BLOG_PHOTO_UPLOAD_PATH . $query->post_image)) { ?>

                                <img src="<?php echo BLOG_PHOTO_UPLOAD_PATH . $query->post_image; ?>" width="50">
                                <input type="hidden" name="post_image" value="<?php echo (!empty($query->post_image)) ? $query->post_image : ''; ?>" />
                            <?php } ?><br />
                            <?php if (!empty($query->post_image)) { ?>
                                <a href="blog/post_removeimg/<?php echo $query->post_id; ?>/<?php echo $query->post_image ?>" onclick="return delete_action()">Remove Image</a>
                            <?php } ?>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-xs-3 col-sm-3 col-md-3">
                        <div class="form-group">
                            <label for="post_content">Post Content</label>
                        </div>
                    </div>
                    <div class="col-xs-8 col-sm-8 col-md-8">
                        <div class="form-group">
                            <textarea name="post_content" id="post_content" class="form-control ckeditor" placeholder="Post Content" data-validation="required"><?php echo (!empty($query->post_content)) ? $query->post_content : '' ?></textarea>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-3 col-sm-3 col-md-3">
                        <div class="form-group">
                            <label for="meta_title">Meta Title</label>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <input type="text" name="meta_title" id="meta_title" class="form-control" placeholder="Meta Title" value="<?php echo (!empty($query->meta_title)) ? $query->meta_title : '' ?>">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-3 col-sm-3 col-md-3">
                        <div class="form-group">
                            <label for="meta_description">Meta Description</label>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <textarea type="text" name="meta_description" id="meta_description" class="form-control" placeholder="Meta Description"><?php echo (!empty($query->meta_description)) ? $query->meta_description : '' ?></textarea>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-3 col-sm-3 col-md-3">
                        <div class="form-group">
                            <label for="meta_keywords">Meta Keywords</label>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <input type="text" name="meta_keywords" id="meta_keywords" class="form-control" placeholder="Meta Keywords" value="<?php echo (!empty($query->meta_keywords)) ? $query->meta_keywords : '' ?>">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-3 col-sm-3 col-md-3">
                        <div class="form-group">
                            <label for="other_meta_tags">Other Meta Tags</label>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <input type="text" name="other_meta_tags" id="other_meta_tags" class="form-control" placeholder="Other Meta Tags" value="<?php echo (!empty($query->other_meta_tags)) ? $query->other_meta_tags : '' ?>">
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
               
                <a href="master/pages">
                    <button class="btn btn-warning btn-round" type="button">
                        <i class="fa fa-times"></i>Back</button></a>
            </div>
        </form>
    </div>
</div>