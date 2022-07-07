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
        <form class="form-horizontals" method="post" id="impact_numbers" name="impact_numbers" action="master/impact_numbers_save" enctype="multipart/form-data">
            <input type="hidden" name="impact_numbers_id" value="<?php echo (!empty($query->impact_numbers_id)) ? $query->impact_numbers_id : "" ?>" />
            <div class="card-body">

                <div class="row">
                    <div class="col-xs-3 col-sm-3 col-md-3">
                        <div class="form-group">
                            <label for="beneficiaries_served_daily">Beneficiaries Served Daily</label>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <input type="number" name="beneficiaries_served_daily" id="beneficiaries_served_daily" class="form-control" placeholder="Beneficiaries Served Daily" value="<?php echo (!empty($query->beneficiaries_served_daily)) ? $query->beneficiaries_served_daily : '' ?>" data-validation="required">
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-xs-3 col-sm-3 col-md-3">
                        <div class="form-group">
                            <label for="beneficiary_hospitals">Beneficiary Hospitals</label>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <input type="number" name="beneficiary_hospitals" id="beneficiary_hospitals" class="form-control" placeholder="Beneficiary Hospitals" value="<?php echo (!empty($query->beneficiary_hospitals)) ? $query->beneficiary_hospitals : '' ?>" data-validation="required">

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-3 col-sm-3 col-md-3">
                        <div class="form-group">
                            <label for="schools_on_wheels">Schools on Wheels</label>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                        <input type="number" name="schools_on_wheels" id="schools_on_wheels" class="form-control" placeholder="Schools on Wheels" value="<?php echo (!empty($query->schools_on_wheels)) ? $query->schools_on_wheels : '' ?>" data-validation="required">
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