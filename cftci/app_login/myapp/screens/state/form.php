<!-- Main content -->
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
    <form class="form-horizontal" role="form" action="master/state_save" method="post" enctype="multipart/form-data">
      <input name="state_id" type="hidden" value="<?php echo (!empty($query->state_id)) ? $query->state_id : ''; ?>" />

      <div class="card-body">

        <div class="row">
          <div class="form-group col-7 mx-auto">

            <div class="col-sm-10">
              <label class="control-label" for="form-field-4">Select Country<span class="eror"><?php echo form_error('country_id'); ?></span></label>
              <select name="country_id" id="country_id" class="form-control ">

                <option value="">Select Country</option>

                <?php foreach ($countries as $row) : ?>

                  <option value="<?php echo $row->country_id; ?>" <?php echo (!empty($query->country_id) && $row->country_id == $query->country_id) ? 'selected' : ''; ?>><?php echo $row->country_name; ?></option>

                <?php endforeach ?>

              </select>

            </div>
          </div>
        </div>

        <div class="row">
          <div class="form-group col-6">
            <div class="col-sm-12">
              <label class="col-sm-6 col-md-6 control-label" for="form-field-1">State Name <span class="eror"><?php echo form_error('state_name'); ?></span></label>
              <input name="state_name" Placeholder="State Name" type="text" class="form-control" value="<?php echo (!empty($query->state_name)) ? $query->state_name : ''; ?>" />
            </div>
          </div>
          <div class="form-group col-6">
            <div class="col-sm-12">
              <label class="col-sm-6 col-md-6 control-label" for="form-field-1">State Code <span class="eror"><?php echo form_error('state_code'); ?></span></label>
              <input name="state_code" Placeholder="State Code" type="text" class="form-control" value="<?php echo (!empty($query->state_code)) ? $query->state_code : ''; ?>" />
            </div>
          </div>

        </div>

        <div class="form-group">
          <label class="control-label">Status<span class="eror"><?php echo form_error('status_ind'); ?></span></label>
          <div class="col-sm-10">
            <input name="status_ind" value="1" type="radio" <?php echo (!empty($query->status_ind)) ? 'checked' : ''; ?> />
            <span class="label label-success">Publish</span>
            &nbsp; &nbsp; &nbsp;&nbsp;
            <input name="status_ind" value="0" type="radio" <?php echo (empty($query->status_ind)) ? 'checked' : ''; ?> />
            <span class="label label-danger">Unpublish</span>
          </div>
        </div>
      </div>
      <!-- /.card-body -->

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
        <a href="master/countries">
          <button class="btn btn-warning btn-round" type="button">
						<i class="fa fa-times"></i>
						Back
					</button></a>
      </div>
    </form>
  </div>
</div>