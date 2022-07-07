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
        <form class="form-horizontal" action="adminroles/save" method="post">
            <input name="role_id" type="hidden" value="<?php echo (!empty($query->role_id)) ? $query->role_id : ''; ?>" />
            <div class="form-group">

                <label class="col-sm-10 col-md-3 control-label" for="form-field-5">Admin Roles Name<span class="eror"><?php echo form_error('role_name'); ?></span></label>

                <div class="col-sm-10">

                    <input name="role_name" type="text" class="form-control" value="<?php echo (!empty($query->role_name)) ? $query->role_name : ''; ?>" />

                </div>

            </div>

            <!-- <div class="form-group">

                <label class="col-sm-3 col-md-3 control-label" for="form-field-7">Admin Roles Display<span class="eror"><?php echo form_error('admin_disp'); ?></span></label>

                <div class="col-sm-10">

                    <input name="admin_disp" value="1" type="radio" <?php echo (!empty($query->admin_disp)) ? 'checked' : ''; ?> />

                    <span class="label label-success">Display</span>

                    &nbsp; &nbsp; &nbsp;&nbsp;

                    <input name="admin_disp" value="0" type="radio" <?php echo (empty($query->admin_disp)) ? 'checked' : ''; ?> />

                    <span class="label label-danger">Hide</span>

                </div>

            </div> -->

            <div class="form-group">

                <label class="col-sm-2 col-md-2 control-label" for="form-field-8">Status<span class="eror"><?php echo form_error('status_ind'); ?></span></label>

                <div class="col-sm-10">

                    <input name="status_ind" value="1" type="radio" <?php echo (!empty($query->status_ind)) ? 'checked' : ''; ?> />

                    <span class="label label-success">Publish</span>

                    &nbsp; &nbsp; &nbsp;&nbsp;

                    <input name="status_ind" value="0" type="radio" <?php echo (empty($query->status_ind)) ? 'checked' : ''; ?> />

                    <span class="label label-danger">Unpublish</span>

                </div>

            </div>
            <div class="form-actions form-btns">
                <button class="btn btn-round btn-success btn-sm" type="submit">
                    <i class="fa fa-check"></i>
                    Save
                </button>
                &nbsp; &nbsp; &nbsp;
                <button class="btn btn-round btn-danger btn-sm" type="reset">
                    <i class="fa fa-sync"></i>
                    Reset
                </button>
                &nbsp; &nbsp; &nbsp;
                <a href="adminroles">
                    <button class="btn btn-warning btn-round btn-sm" type="button">
                        <i class="fa fa-times"></i>
                        Back
                    </button></a>
            </div>
        </form>
    </div>
</div>