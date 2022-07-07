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
	        <form class="form-horizontals" method="post" id="settings_form" name="settings_form" action="master/settings_update" enctype="multipart/form-data">
	            <div class="card-body">

	                <?php foreach ($query as $row) : ?>
	                    <input type="hidden" name="setting_id[<?php echo $row->setting_id; ?>]" value="<?php echo $row->setting_id; ?>" />
	                    <div class="row">
	                        <div class="col-xs-3 col-sm-3 col-md-3">
	                            <div class="form-group">
	                                <label for="<?php echo $row->setting_name; ?>"><?php echo $row->setting_name; ?></label>
	                            </div>
	                        </div>
	                        <div class="col-xs-6 col-sm-6 col-md-6">
	                            <div class="form-group">
	                                <?php if ($row->type == 'image') : ?>
	                                    <input type="file" name="setting_value_<?php echo $row->setting_id; ?>" id="setting_value_<?php echo $row->setting_id; ?>" class="form-control" placeholder="<?php echo $row->setting_name; ?>">
	                                    <?php if (!empty($row->setting_value) && file_exists(SETTINGS_UPLOAD_PATH . $row->setting_value)) : ?>

	                                        <img src="<?php echo SETTINGS_UPLOAD_PATH . $row->setting_value; ?>" width="80" />
	                                        </a>
	                                        <input name="setting_value[<?php echo $row->setting_id; ?>]" type="hidden" value="<?php echo $row->setting_value; ?>" />
	                                    <?php endif; ?>
	                                <?php elseif ($row->type == 'videoimage') : ?>
	                                    <input type="file" name="setting_value_<?php echo $row->setting_id; ?>" id="setting_value_<?php echo $row->setting_id; ?>" class="form-control" placeholder="<?php echo $row->setting_name; ?>">
	                                    <?php if (!empty($row->setting_value) && file_exists(SETTINGS_UPLOAD_PATH_VIDEO_IMAGE . $row->setting_value)) : ?>

	                                        <img src="<?php echo SETTINGS_UPLOAD_PATH_VIDEO_IMAGE . $row->setting_value; ?>" width="80" />
	                                        </a>
	                                        <input name="setting_value[<?php echo $row->setting_id; ?>]" type="hidden" value="<?php echo $row->setting_value; ?>" />
	                                    <?php endif; ?>
	                                <?php elseif ($row->type == 'textarea') : ?>
	                                    <textarea name="setting_value[<?php echo $row->setting_id; ?>]" placeholder="<?php echo $row->setting_name; ?>" class="form-control summernote page_content"><?php echo $row->setting_value; ?></textarea>
	                                <?php elseif ($row->type == 'radiobutton') : ?>
	                                    <input name="setting_value[<?php echo $row->setting_id; ?>]" value="1" type="radio" <?php echo (!empty($row->setting_value) && $row->setting_value == 1) ? 'checked' : ''; ?> />
	                                    <span class="lbl">Yes</span>
	                                    &nbsp; &nbsp; &nbsp;&nbsp;
	                                    <input name="setting_value[<?php echo $row->setting_id; ?>]" value="2" type="radio" <?php echo (!empty($row->setting_value) && $row->setting_value == 2) ? 'checked' : ''; ?> />
	                                    <span class="lbl">No</span>
	                                <?php else : ?>
	                                    <input class="form-control" name="setting_value[<?php echo $row->setting_id; ?>]" type="text" placeholder="<?php echo $row->setting_name; ?>" value="<?php echo $row->setting_value; ?>" />
	                                <?php endif ?>
	                            </div>
	                        </div>
	                    </div>
	                <?php endforeach ?>
	            </div>
	            <div class="card-footer">
	                <button class="btn btn-round btn-success" type="submit">
	                    <i class="fa fa-check"></i>
	                    Save
	                </button>
	                <button class="btn btn-danger" type="reset">
	                    <i class="fa fa-sync"></i>Reset</button>
	                &nbsp; &nbsp; &nbsp;
	                &nbsp; &nbsp; &nbsp;
	                <a href="master/settings">
	                    <button class="btn btn-warning " type="button">
	                        <i class="fa fa-times"></i>Back</button></a>
	            </div>

	        </form>
	    </div>
	</div>


	
<script>
    $(document).ready(function(){
 
 $('.summernote').summernote({
     height: 300,                 // set editor height
     minHeight: null,             // set minimum height of editor
     maxHeight: null,             // set maximum height of editor
     focus: true                  // set focus to editable area after initializing summernote
   });
})
</script>