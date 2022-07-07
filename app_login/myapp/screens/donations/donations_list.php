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
    <div >
      <form method="post" id="date-download" action="donations/download_donations" class="d-flex align-items-center"> 
      <div class="form-group mr-5">
        <label for="from_date">From Date</label>
        <input class="form-control" id="from_date" name="from_date" type="date" value="" >
      </div>
      <div class="form-group mr-5">
        <label for="from_date">From Date</label>
        <input class="form-control" id="to_date" name="to_date" type="date" value="" >
      </div>
    <input type="submit" id="download-donations" name="download" class=" btn btn-primary " placeholder="" aria-controls="example1" value="Download Donations">
    <input type="submit" id="atg-download-donations" name="download"  class=" btn btn-warning " placeholder="" aria-controls="example1" value="Download Donations for ATG">
      </form>  
  </div>
  </div>
  <div class="card-body">
    <div class="table-responsive">
     
      <table id="donations_table" class="table display table-bordered table-striped table-hover dataTable dtr-inline" role="grid" aria-describedby="example1_info">
        <thead>
          <tr role="row">
            <th class="sorting_asc">Name</th>
            <th>Email</th>
            <th>Mobile</th>
            <th>City</th>
            <th>Amount</th>
            <th>Razor Payment Id</th>
            <th>Status</th>
            <th> Date </th>
           
          </tr>

        </thead>
        <tbody>

        </tbody>

      </table>
    </div>
  </div>
</div>