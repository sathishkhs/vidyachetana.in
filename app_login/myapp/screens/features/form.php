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
        <form class="form-horizontals" method="post" id="features_form" name="features_form" action="master/feature_save" enctype="multipart/form-data">
            <input type="hidden" name="feature_id" value="<?php echo (!empty($query->feature_id)) ? $query->feature_id : "" ?>" />
            <div class="card-body">

                <div class="row">
                    <div class="col-xs-3 col-sm-3 col-md-3">
                        <div class="form-group">
                            <label for="feature_title">Feature Title</label>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <input type="text" name="feature_title" id="feature_title" class="form-control" placeholder="Feature Title" value="<?php echo (!empty($query->feature_title)) ? $query->feature_title : '' ?>" data-validation="required">
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-xs-3 col-sm-3 col-md-3">
                        <div class="form-group">
                            <label for="feature_desc">Feature Description</label>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <textarea name="feature_desc" rows="4" id="feature_desc" class="form-control" placeholder="Feature Description" data-validation="required"><?php echo (!empty($query->feature_desc)) ? $query->feature_desc : '' ?></textarea>

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-3 col-sm-3 col-md-3">
                        <div class="form-group">
                            <label for="feature_icon">Feature Icon</label>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <input type="text" name="feature_icon" id="feature_icon" class="form-control" placeholder="Feature Icon" value="<?php echo (!empty($query->feature_icon)) ? $query->feature_icon : '' ?>">
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
                <a href="master/features">
                    <button class="btn btn-warning " type="button">
                        <i class="fa fa-times"></i>Back</button></a>
            </div>

        </form>
    </div>
</div>