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
    <form class="form-horizontal" role="form" action="master/form_save" method="post" enctype="multipart/form-data">
      <input name="form_id" type="hidden" value="<?php echo (!empty($query->form_id)) ? $query->form_id : ''; ?>" />

      <div class="card-body">
        <div class="row">
          <div class="form-group col-6">
            <div class="col-sm-12">
              <label class="col-sm-6 col-md-6 control-label" for="form-field-1">Form Name <span class="eror"><?php echo form_error('form_name'); ?></span></label>
              <input name="form_name" Placeholder="Form Name" type="text" class="form-control" value="<?php echo (!empty($query->form_name)) ? $query->form_name : ''; ?>" />
            </div>
          </div>
          <div class="form-group col-6">
            <div class="col-sm-12">
              <label class="col-sm-6 col-md-6 control-label" for="form-field-1">Form Path <span class="eror"><?php echo form_error('form_path'); ?></span></label>
              <input name="form_path" Placeholder="Form Path" type="text" class="form-control" value="<?php echo (!empty($query->form_path)) ? $query->form_path : ''; ?>" />
            </div>
          </div>


        </div>
        <div class="row">
          <div class="form-group col-6">
            <div class="col-sm-12">
              <label class="col-sm-6 col-md-6 control-label" for="form-field-1">Database Table Name <span class="eror"><?php echo form_error('table_name'); ?></span></label>
              <input name="table_name" Placeholder="Database Table Name" type="text" class="form-control" value="<?php echo (!empty($query->table_name)) ? $query->table_name : ''; ?>" />
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
				<a href="master/forms">
					<button class="btn btn-warning btn-round" type="button">
						<i class="fa fa-times"></i>
						Back
					</button></a>
      </div>
    </form>
  </div>
</div>