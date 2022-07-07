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
<form class="form-horizontal" action="forms/forms_save" method="post" enctype="multipart/form-data">
	<input name="form_id" type="hidden" value="<?php echo (!empty($query->form_id)) ? $query->form_id : ''; ?>" />
    <input id="form_data" name="form_data" type="hidden" value='<?php echo (!empty($query->form_data)) ? $query->form_data : ""; ?>'/>
	<br />
	<div class="form-group">
		<label class="col-sm-2 col-md-2 control-label" placeholder="Menu name" for="form-field-1">Form Title<span class="eror"><?php echo form_error('form_title'); ?></span></label>
		<div class="col-sm-10">
			<input id="form-title" name="form_title" type="text" class="form-control" value="<?php echo (!empty($query->form_title)) ? $query->form_title : ''; ?>" />
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 col-md-2 control-label" for="form-field-8">Status<span class="eror"><?php echo form_error('status'); ?></span></label>
		<div class="col-sm-10">
			<input name="status_ind" value="1" type="radio" <?php echo (!empty($query->status_ind)) ? 'checked' : ''; ?> />
			<span class="label label-success">Publish</span>
			&nbsp; &nbsp; &nbsp;&nbsp;
			<input name="status_ind" value="0" type="radio" <?php echo (empty($query->status_ind)) ? 'checked' : ''; ?> />
			<span class="label label-danger">Unpublish</span>
		</div>
	</div>


    <h4>Create Form for Seva Page</h4>      
    <div class="card">
        <div class="card-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-5 border-right p-4">
                        <fieldset id="buildyourform">
                            <legend>Build your own form!</legend>
                        </fieldset>
                        <input type="button" value="Preview form" class="add btn btn-round btn-info mt-3 mr-1" id="preview" />
                        <input type="button" value="Add a field" class="add btn btn-round btn-light mt-3 mr-1" id="add" />

                    </div>
                    <div class="col-md-7 p-4" id="created_form">
                            
                    </div>
                </div>
            </div>
        </div>
    </div>


	<div class="form-actions form-btns">
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
		<a href="forms">
			<button class="btn btn-warning btn-round" type="button">
				<i class="fa fa-times"></i>
				Back
			</button></a>
	</div>
</form>

</div>
</div>