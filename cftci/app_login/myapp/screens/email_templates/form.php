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
        <form class="form-horizontal" action="email-templates/save" method="post">
            <br />
            <input name="template_id" type="hidden" value="<?php echo (!empty($query->template_id)) ? $query->template_id : ''; ?>" />
            <div class="form-group">
                <label class="col-sm-2 col-md-2 control-label" for="form-field-1">Templates Title</label>
                <div class="col-sm-5">
                    <?php echo form_error('template_title'); ?>
                    <input class="input-xxlarge form-control" name="template_title" type="text" placeholder="Email Templates Title" value="<?php echo (!empty($query->template_title)) ? $query->template_title : ''; ?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 col-md-2 control-label" for="form-field-1">Templates Content</label>
                <div class="col-sm-10">
                    <?php echo form_error('template_content'); ?>
                    <textarea class='input-xxlarge textarea ckeditor' rows="5" id="template_content" name="template_content" placeholder="Email Templates Content"><?php echo (!empty($query->template_content)) ? $query->template_content : ''; ?></textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 col-md-2 control-label" for="form-field-1">From</label>
                <div class="col-sm-5">
                    <?php echo form_error('from'); ?>
                    <input class="input-xxlarge form-control" name="from" type="text" placeholder="From" value="<?php echo (!empty($query->from)) ? $query->from : ''; ?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 col-md-2 control-label" for="form-field-1">CC</label>
                <div class="col-sm-5">
                    <?php echo form_error('cc'); ?>
                    <textarea class="input-xxlarge form-control" name="cc" id="cc" placeholder="CC"><?php echo (!empty($query->cc)) ? $query->cc : ''; ?></textarea>
                    <p style="color:orange">Note: Enter comma separated values</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 col-md-2 control-label" for="form-field-1">BCC</label>
                <div class="col-sm-5">
                    <?php echo form_error('bcc'); ?>
                    <textarea class="input-xxlarge form-control " name="bcc" id="bcc" placeholder="BCC"><?php echo (!empty($query->bcc)) ? $query->bcc : ''; ?></textarea>
                    <p style="color:orange">Note: Enter comma separated values</p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 col-md-2 control-label" for="form-field-1">Status</label>
                <div class="col-sm-10">
                    <?php echo form_error('status_ind'); ?>
                    <input name="status_ind" value="1" checked="checked" type="radio" <?php echo (!empty($query->status_ind)) ? 'checked' : ''; ?> />
                    <span class="label label-success">Publish</span>
                    &nbsp; &nbsp; &nbsp;&nbsp;
                    <input name="status_ind" value="0" type="radio" <?php echo (empty($query->status_ind)) ? 'checked' : ''; ?> />
                    <span class="label label-danger">Unpublish</span>
                </div>
            </div>
            <div class="form-actions">
                <button class="btn btn-round btn-success" type="submit">
                    <i class="fa fa-check"></i>
                    Save
                </button>
                &nbsp; &nbsp; &nbsp;
                <button class="btn btn-round btn-default" type="reset">
                    <i class="fa fa-sync"></i>
                    Reset
                </button>
                &nbsp; &nbsp; &nbsp;
                <a href="email-templates">
                    <button class="btn btn-warning btn-round" type="button">
                        <i class="fa fa-times"></i>
                        Back
                    </button></a>
            </div>
        </form>
    </div>
</div>