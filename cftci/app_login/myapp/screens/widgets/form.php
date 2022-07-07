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
        <form class="form-horizontals" method="post" id="user_form" name="user_form" action="master/widgets_save" enctype="multipart/form-data">
            <input type="hidden" name="widget_id" value="<?php echo (!empty($query->widget_id)) ? $query->widget_id : "" ?>" />

            <div class="card-body">
                <div class="row">
                    <div class="col-xs-3 col-sm-3 col-md-3">
                        <div class="form-group">
                            <label for="template_id">Template</label>
                        </div>
                    </div>
                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <select name="template_id" id="template_id" class="form-control" data-validation="required">
                                <option value="">Select Template</option>
                                <?php foreach ($templates as $row) : ?>
                                    <option value="<?php echo $row->template_id; ?>" <?php echo (!empty($query->template_id) && $row->template_id == $query->template_id) ? 'selected' : ''; ?>><?php echo $row->template_name; ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-3 col-sm-3 col-md-3">
                        <div class="form-group">
                            <label for="area_id">Widget Area</label>
                        </div>
                    </div>
                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <?php echo form_error('area_id'); ?>
                            <select name="area_id" id="area_id" class="form-control" data-validation="required">
                                <option value="">Select Widget Area</option>
                                <?php foreach ($area as $row) : ?>
                                    <option value="<?php echo $row->area_id; ?>" <?php echo (!empty($query->area_id) && $row->area_id == $query->area_id) ? 'selected' : ''; ?>><?php echo $row->area_name; ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-3 col-sm-3 col-md-3">
                        <div class="form-group">
                            <label for="widget_type">Widget Type</label>
                        </div>
                    </div>
                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <?php echo form_error('widget_type'); ?>
                            <select name="widget_type" id="widget_type" class="form-control" data-validation="required">
                                <option value="0">Static Content</option>
                                <?php
                                foreach ($page_type as $row) :
                                    if ((!empty($query->widget_type) && $row->type_id == $query->widget_type)) {
                                        $type_id = $row->type_id;
                                    }
                                ?>
                                    <option value="<?php echo $row->type_id; ?>" <?php echo (!empty($query->widget_type) && $row->type_id == $query->widget_type) ? 'selected' : ''; ?>><?php echo $row->type_name; ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-3 col-sm-3 col-md-3">
                        <div class="form-group">
                            <label for="page_title">Widget Tittle</label>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <?php echo form_error('widget_title'); ?>
                            <input class='form-control' name="widget_title" type="text" placeholder="widget title" value="<?php echo (!empty($query->widget_title)) ? $query->widget_title : ''; ?>" data-validation="required" />
                        </div>
                    </div>
                </div>

                <div class="row widget_image_content">
                    <div class="col-xs-3 col-sm-3 col-md-3">
                        <div class="form-group">
                            <label for="content_title">Content Tittle</label>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <?php echo form_error('content_title'); ?>
                            <input class='form-control ' name="content_title" type="text" placeholder="Content Title" value="<?php echo (!empty($query->content_title)) ? $query->content_title : ''; ?>" data-validation="required" />
                        </div>
                    </div>
                </div>

                <div class="row widget_image_content">
                    <div class="col-xs-3 col-sm-3 col-md-3">
                        <div class="form-group">
                            <label for="content_url">Content Url</label>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <?php echo form_error('content_url'); ?>
                            <input class='form-control' name="content_url" type="text" placeholder="Content Url" value="<?php echo (!empty($query->content_url)) ? $query->content_url : ''; ?>" data-validation="required" />
                        </div>
                    </div>
                </div>

                <div class="row widget_image_content">
                    <div class="col-xs-3 col-sm-3 col-md-3">
                        <div class="form-group">
                            <label for="content_image">Content Image</label>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <input type="file" name="content_image" id="content_image" placeholder="Content Image" value="<?php echo (!empty($query->content_image)) ? $query->content_image : '' ?>">
                            <?php if (!empty($query->content_image) && file_exists(WIDGETS_UPLOAD_PATH . $query->content_image)) { ?>

                                <img src="<?php echo WIDGETS_UPLOAD_PATH . $query->content_image; ?>" width="50">
                                <input type="hidden" name="content_image" value="<?php echo (!empty($query->content_image)) ? $query->content_image : ''; ?>" />
                            <?php } ?>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-xs-3 col-sm-3 col-md-3">
                        <div class="form-group">
                            <label for="widget_content">Widget Content</label>
                        </div>
                    </div>
                    <div class="col-xs-8 col-sm-8 col-md-8">
                        <div class="form-group">
                            <?php if (!empty($query->widget_type)) : ?>
                                <select class="form-control" name="widget_content" id="widget_content">
                                    <?php foreach ($ddwidgetcontent as $row) : ?>
                                        <option value="<?php echo $row['value']; ?>" <?php echo (!empty($query->widget_content) && $row['value'] == $query->widget_content) ? 'selected' : ''; ?>><?php echo $row['text']; ?></option>
                                    <?php endforeach ?>
                                </select>
                            <?php else : ?>
                                <textarea class='form-control ckeditor' rows="5" id="widget_content" name="widget_content" placeholder="Widget Content"><?php echo (!empty($query->widget_content)) ? $query->widget_content : ''; ?></textarea>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-3 col-sm-3 col-md-3">
                        <div class="form-group">
                            <label for="link_target">Link Target</label>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label class="radiobuttons"><input name="link_target" value="1" type="radio" <?php echo (!empty($query->link_target)) ? 'checked' : ''; ?> />
                                <span class="lbl">New Window</span></label>
                            &nbsp; &nbsp; &nbsp;&nbsp;
                            <label class="radiobuttons"><input name="link_target" value="0" type="radio" <?php echo (empty($query->link_target)) ? 'checked' : ''; ?> />
                                <span class="lbl">Same Window</span></label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-3 col-sm-3 col-md-3">
                        <div class="form-group">
                            <label for="display_order">Display Order</label>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <input type="text" name="display_order" id="display_order" class="form-control" placeholder="Display Order" value="<?php echo (!empty($query->display_order)) ? $query->display_order : '' ?>" data-validation="required">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-3 col-sm-3 col-md-3">
                        <div class="form-group">
                            <label for="link_text">Link Text</label>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <input type="text" name="link_text" id="page_slug" class="form-control" placeholder="link_text" value="<?php echo (!empty($query->link_text)) ? $query->link_text : 'Read More' ?>" data-validation="required">
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

                <div class="row">
                    <div class="col-xs-3 col-sm-3 col-md-3">
                        <div class="form-group">
                            <label for="display_tittle">Display Tittle</label>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label class="radiobuttons"><input name="display_tittle" value="1" type="radio" <?php echo (!empty($query->display_tittle)) ? 'checked' : ''; ?> />
                                <span class="lbl">Yes</span></label>
                            &nbsp; &nbsp; &nbsp;&nbsp;
                            <label class="radiobuttons"><input name="display_tittle" value="0" type="radio" <?php echo (empty($query->display_tittle)) ? 'checked' : ''; ?> />
                                <span class="lbl">No</span></label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-footer">
                <button class="btn btn-round btn-success" type="submit">
					<i class="fa fa-check"></i>
					Save
				</button>
                <button class="btn btn-round btn-danger" type="reset">
					<i class="fa fa-sync"></i>
					Reset
				</button>
                &nbsp; &nbsp; &nbsp;
                &nbsp; &nbsp; &nbsp;
                <a href="master/widgets">
                    <button class="btn btn-warning " type="button">
                        <i class="fa fa-times"></i>Back</button></a>
            </div>
        </form>
    </div>
</div>