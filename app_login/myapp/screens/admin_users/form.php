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
			<form class="form-horizontal" action="adminusers/save" method="post" enctype="multipart/form-data">
				<input name="user_id" type="hidden" value="<?php echo (!empty($query->user_id)) ? $query->user_id : ''; ?>" />
				<input name="role_id" type="hidden" value="1" />
				<br />
				<div class="form-group">
					<label class="col-sm-10 col-md-8 control-label" for="form-field-1">First Name <span class="eror"><?php echo form_error('first_name'); ?></span></label>
					<div class="col-sm-10">
						<input name="first_name" type="text" class="form-control" value="<?php echo (!empty($query->first_name)) ? $query->first_name : ''; ?>"  required/>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-10 col-md-8 control-label" for="form-field-2">Last Name <span class="eror"><?php echo form_error('last_name'); ?></span></label>
					<div class="col-sm-10">
						<input name="last_name" type="text" class="form-control" value="<?php echo (!empty($query->last_name)) ? $query->last_name : ''; ?>"  required/>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-10 col-md-8 control-label" for="form-field-3">Email<span class="eror"><?php echo form_error('email'); ?></span></label>
					<div class="col-sm-10">
						<input name="email" type="text" class="form-control" value="<?php echo (!empty($query->email)) ? $query->email : ''; ?>"  required/>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-10 col-md-8 control-label" for="form-field-3">Mobile Number<span class="eror"><?php echo form_error('mobile_number'); ?></span></label>
					<div class="col-sm-10">
						<input name="mobile_number" type="text" class="form-control" value="<?php echo (!empty($query->mobile_number)) ? $query->mobile_number : ''; ?>"  pattern="[1-9]{1}[0-9]{9}" title="Enter correct Mobile number" required/>
					</div>
				</div>
				<!-- <div class="form-group">
				<label class="col-sm-10 col-md-8 control-label" for="form-field-4">User Role<span class="eror"><?php echo form_error('role_id'); ?></span></label>
				<div class="col-sm-10">
					<select class="form-control" name="role_id" id="role_id">
						<option value="">Select User Role</option>
						<?php //foreach ($usersrole as $row) : 
						?>
							<option value="<?php// echo $row->role_id; ?>" <?php //echo (!empty($query->role_id) && $row->role_id == $query->role_id) ? 'selected' : ''; 
																			?>><?php //echo $row->role_name; 
																				?></option>
						<?php //endforeach 
						?>
					</select>
				</div>
			</div> -->

				<div class="form-group">
					<label class="col-sm-10 col-md-8 control-label" for="form-field-5">User Name<span class="eror"><?php echo form_error('username'); ?></span></label>
					<div class="col-sm-10">
						<input name="username" type="text" class="form-control" value="<?php echo (!empty($query->username)) ? $query->username : ''; ?>"  required/>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-10 col-md-8 control-label" for="form-field-6">Password<span class="eror"><?php echo form_error('password'); ?></span></label>
					<div class="col-sm-10">
						<input name="password" type="text" class="form-control" value=""  required/>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-10 col-md-8 control-label" for="form-field-7">Confirm Password<span class="eror"><?php echo form_error('password'); ?></span></label>
					<div class="col-sm-10">
						<input name="confirm_password" type="text" class="form-control" value=""  required/>
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-10 col-md-8 control-label" for="form-field-8">Status<span class="eror"><?php echo form_error('status_ind'); ?></span></label>
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
					<a href="adminusers">
						<button class="btn btn-warning btn-round btn-sm" type="button">
							<i class="fa fa-times"></i>
							Back
						</button></a>
				</div>
			</form>
		</div>
	</div>