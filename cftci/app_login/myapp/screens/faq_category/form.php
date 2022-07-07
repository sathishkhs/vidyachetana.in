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
<form class="form-horizontal" action="faq_category/save" method="post" enctype="multipart/form-data">
	<input name="faq_category_id" type="hidden" value="<?php echo (!empty($query->faq_category_id)) ? $query->faq_category_id : ''; ?>" />
	<br />
	<div class="form-group">
		<label class="col-sm-2 col-md-2 control-label" placeholder="Menu name" for="form-field-1">Category Name<span class="eror"><?php echo form_error('category_name'); ?></span></label>
		<div class="col-sm-10">
			<input name="category_name" type="text" class="form-control" value="<?php echo (!empty($query->category_name)) ? $query->category_name : ''; ?>" />
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 col-md-2 control-label" for="form-field-4">Category Description<span class="eror"><?php echo form_error('category_desc'); ?></span></label>
		<div class="col-sm-10">
			<textarea name="category_desc" rows="5" type="text" class="form-control ckeditor"><?php echo (!empty($query->category_desc)) ? $query->category_desc : ''; ?></textarea>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 col-md-2 control-label" for="form-field-1">Sort Order<span class="eror"><?php echo form_error('sort_order'); ?></span></label>
		<div class="col-sm-10">
			<input name="sort_order" type="text" class="form-control" value="<?php echo (!empty($query->sort_order)) ? $query->sort_order : ''; ?>" />
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
		<a href="faq_category">
			<button class="btn btn-warning btn-round" type="button">
				<i class="fa fa-times"></i>
				Back
			</button></a>
	</div>
</form>

</div>
</div>