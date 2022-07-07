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

  <div class="card-header py-3 d-flex justify-content-between">
    <h6 class="m-0 my-2 font-weight-bold text-primary "><?php echo $page_heading; ?> <?php if (!empty($sub_heading)) { ?><small><?php echo $sub_heading; ?></small><?php } ?></h6>
    <a href="testimonials/testimonials_add" class=" btn btn-primary" placeholder="" aria-controls="example1">Add New Testimonial</a>
  </div>
  <div class="card-body">
    <div class="table-responsive">

      <table id="testimonials_table" class="table display table-bordered table-striped table-hover dataTable dtr-inline" role="grid" aria-describedby="example1_info">
        <thead>
          <tr role="row">
            <th class="sorting_asc">Full Name</th>
            <th>Created Date </th>
            <th>Last Modified </th>
            <th>Status</th>
            <th>Action</th>
          </tr>

        </thead>
        <tbody>

        </tbody>

      </table>
    </div>
  </div>
</div>