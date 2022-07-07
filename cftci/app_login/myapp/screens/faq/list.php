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
        <h6 class="m-0 font-weight-bold text-primary"><?php echo $page_heading; ?></h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="faq-table" width="100%" cellspacing="0">
                <thead>
				<tr>
	                       
	                        <th>faq question</th>
	                        <th>faq answer</th>	                                   
	                        <th>status</th>	
	                        <th>Action</th>
	                    </tr>
                </thead>
                <tfoot>
				<tr>
	                      
	                        <th>faq question</th>
	                        <th>faq answer</th>	                                   
	                        <th>status</th>	
	                        <th>Action</th>
	                    </tr>
                </tfoot>
                <tbody>

                  
                </tbody>
            </table>
        </div>
    </div>
</div>
	