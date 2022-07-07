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
	        <form class="form-horizontals" method="post" id="posts_form" name="posts_form" action="blog/author_save" enctype="multipart/form-data">
	            <input type="hidden" name="id" id="id" value="<?php echo (!empty($query->id)) ? $query->id : "" ?>" />

	            <div class="card-body">

	                <div class="row">
	                    <div class="col-xs-3 col-sm-3 col-md-3">
	                        <div class="form-group">
	                            <label for="title">Name</label>
	                        </div>
	                    </div>
	                    <div class="col-xs-6 col-sm-6 col-md-6">
	                        <div class="form-group">
	                            <input type="text" name="name" id="name" class="form-control" placeholder="Post Title" value="<?php echo (!empty($query->name)) ? $query->name : '' ?>" >
	                        </div>
	                    </div>
	                </div>
	               

	               

	                <div class="row">
	                    <div class="col-xs-3 col-sm-3 col-md-3">
	                        <div class="form-group">
	                            <label for="image">Post Image</label>
	                        </div>
	                    </div>
	                    <div class="col-xs-6 col-sm-6 col-md-6">
	                        <div class="form-group">
	                            <input type="file" name="image" id="image" placeholder="Post Image" value="<?php echo (!empty($query->image)) ? $query->image : '' ?>">
	                            <?php if (!empty($query->image) && file_exists(AUTHOR_PHOTO_UPLOAD_PATH . $query->image)) { ?>

	                                <img src="<?php echo BLOG_PHOTO_UPLOAD_PATH . $query->image; ?>" width="50">
	                                <input type="hidden" name="image" value="<?php echo (!empty($query->image)) ? $query->image : ''; ?>" />
	                            <?php } ?><br />
	                            <!-- <?php if (!empty($query->image)) { ?>
                                <a href="blog/post_removeimg/<?php echo $query->post_id; ?>/<?php echo $query->image ?>" onclick="return delete_action()">Remove Image</a>
                            <?php } ?> -->

                            <small>Banner Image Size Should be 800px width and 800px height.</small>
	                        </div>
	                    </div>
	                </div>




	                <div class="row">
	                    <div class="col-xs-3 col-sm-3 col-md-3">
	                        <div class="form-group">
	                            <label for="email">Email</label>
	                        </div>
	                    </div>
	                    <div class="col-xs-6 col-sm-6 col-md-6">
	                        <div class="form-group">
	                            <input type="text" name="email" id="email" class="form-control" placeholder="Email" value="<?php echo (!empty($query->email)) ? $query->email : '' ?>">
	                        </div>
	                    </div>
	                </div>
	                <div class="row">
	                    <div class="col-xs-3 col-sm-3 col-md-3">
	                        <div class="form-group">
	                            <label for="mobile">Mobile</label>
	                        </div>
	                    </div>
	                    <div class="col-xs-6 col-sm-6 col-md-6">
	                        <div class="form-group">
	                            <input type="text" name="mobile" id="mobile" class="form-control" placeholder="Mobile" value="<?php echo (!empty($query->mobile)) ? $query->mobile : '' ?>">
	                        </div>
	                    </div>
	                </div>
	                <div class="row">
	                    <div class="col-xs-3 col-sm-3 col-md-3">
	                        <div class="form-group">
	                            <label for="bio">Bio</label>
	                        </div>
	                    </div>
	                    <div class="col-xs-6 col-sm-6 col-md-6">
	                        <div class="form-group">
	                            <textarea type="text" name="bio" id="bio" class="form-control" placeholder="Bio" value=""><?php echo (!empty($query->bio)) ? $query->bio : '' ?></textarea>
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