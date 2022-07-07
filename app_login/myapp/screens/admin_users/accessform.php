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
        <form class="form-horizontal" action="adminusers/saveaccess" method="post">
            <input name="user_id" type="hidden" value="<?php echo $user_id; ?>" />
            <div class="control-group languagepanel">
                <div class="form-controls">
                    <?php //echo "<pre>";print_r($admin_users_accesses); die(); 
                    ?>
                    <?php foreach ($query as $row) : ?>
                        <label class="col-sm-4 col-md-4">
                            <input type="checkbox" name="menuitem_id[]" value="<?php echo $row->menuitem_id; ?>" <?php echo (in_array($row->menuitem_id, $admin_users_accesses)) ? 'checked' : ''; ?> />
                            <span class="label label-primary"></span> <?php echo $row->menuitem_text; ?>
                        </label>
                    <?php endforeach ?>
                </div>
            </div>
            <br />
            <div class="form-actions form-btns">
                <button class="btn btn-round btn-success btn-sm" type="submit">
                    <i class="fa fa-check"></i>
                    Save Changes
                </button>
                &nbsp; &nbsp; &nbsp;
                <button class="btn btn-round btn-danger btn-sm" type="reset">
                    <i class="fa fa-sync"></i>
                    Reset
                </button>
            </div>
        </form>
    </div>
</div>