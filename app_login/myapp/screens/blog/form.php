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
	            <input type="hidden" name="id" id="id" value="<?php echo (!empty($query->id)) ? $query->id : "" ?>" />

	            <div class="card-body">

	                <div class="row">
	                    <div class="col-xs-3 col-sm-3 col-md-3">
	                        <div class="form-group">
	                            <label for="title">Post Title</label>
	                        </div>
	                    </div>
	                    <div class="col-xs-6 col-sm-6 col-md-6">
	                        <div class="form-group">
	                            <input type="text" name="title" id="title" class="form-control" placeholder="Post Title" value="<?php echo (!empty($query->title)) ? $query->title : '' ?>" data-validation="required" onkeyup="getslug(this.value)">
	                        </div>
	                    </div>
	                </div>
	                <!-- <div class="row">
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
                </div> -->

	                <div class="row">
	                    <div class="col-xs-3 col-sm-3 col-md-3">
	                        <div class="form-group">
	                            <label for="id">Select Author</label>
	                        </div>
	                    </div>
	                    <div class="col-xs-4 col-sm-4 col-md-4">
	                        <div class="form-group">
	                            <select name="author" id="author" class="form-control" data-validation="required">
	                                <option value="">-- Select Author --</option>
	                                <?php foreach ($authors as $row) : ?>
	                                    <option value="<?php echo $row->id; ?>" <?php echo (!empty($query->author) && $row->id == $query->author) ? 'selected' : ''; ?>><?php echo $row->name; ?></option>
	                                <?php endforeach ?>
	                            </select>
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
	                            <!-- <?php if (!empty($query->post_image)) { ?>
                                <a href="blog/post_removeimg/<?php echo $query->post_id; ?>/<?php echo $query->post_image ?>" onclick="return delete_action()">Remove Image</a>
                            <?php } ?> -->

                            <small>Banner Image Size Should be 800px width and 800px height.</small>
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
	                            <textarea name="post_content" id="post_content" class="form-control ckeditor summernote" placeholder="Post Content" data-validation="required"><?php echo (!empty($query->post_content)) ? $query->post_content : '' ?></textarea>
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
	                            <label for="other_meta_tags">Other Meta Tags (Only html tags format are allowed)</label>
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
                                        <label for="page_slug">Page Slug</label>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <?php echo form_error('page_slug'); ?>
                                        <input type="text" name="page_slug" id="page_slug" class="form-control" placeholder="Page Slug" value="<?php echo (!empty($query->page_slug)) ? $query->page_slug : '' ?>" data-validation="required">
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

	                <a href="blog">
	                    <button class="btn btn-warning btn-round" type="button">
	                        <i class="fa fa-times"></i>Back</button></a>
	                <?php if(!empty($query->id)){ ?>
					<a href="../blog/post/<?php echo (!empty($query->page_slug)) ? $query->page_slug : '' ?>" id="view_page">
	                    <button class="btn btn-info btn-round" type="button">
	                        <i class="fa fa-eye"></i>View Page</button></a>
					<?php } ?>

	            </div>
	        </form>
	    </div>
	</div>


	<script>
	    $(document).ready(function() {

	        $('.summernote').summernote({
	            callbacks: {
	                onImageUpload: function(files, editor, welEditable) {
	                    sendFile(files[0], editor, welEditable)
	                },
	                onMediaDelete: function(target) {
	                    // alert(target[0].src) 
	                    deleteFile(target[0].src);
	                }
	            },
	            height: 300, // set editor height
	            minHeight: null, // set minimum height of editor
	            maxHeight: null, // set maximum height of editor
	            focus: true, // set focus to editable area after initializing summernote
	            fontNames: ['Arial', 'Arial Black', 'Comic Sans MS', 'Courier New', 'Helvetica', 'Mukta', 'Impact', 'Tahoma', 'Times New Roman', 'Verdana', 'Roboto'],
	            addDefaultFonts: false,
	            styleTags: [
	                'p',
	                {
	                    title: 'Blockquote',
	                    tag: 'blockquote',
	                    className: 'blockquote',
	                    value: 'blockquote'
	                },
	                'pre', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6'
	            ],
	        });
	    })

	    function sendFile(file, editor, welEditable) {
	        data = new FormData();
	        data.append("file", file);
	        $.ajax({
	            data: data,
	            type: "POST",
	            url: "blog/upload_editor_image",
	            cache: false,
	            contentType: false,
	            processData: false,
	            success: function(url) {
	                $('.summernote').summernote("insertImage", url, 'filename');
	            }
	        });
	    };

	    function deleteFile(src) {

	        $.ajax({
	            data: {
	                src: src
	            },
	            type: "POST",
	            url: "blog/delete_editor_image", // replace with your url
	            cache: false,
	            success: function(resp) {
                   
	                console.log(resp);
	            }
	        });
	    }
	</script>