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
        <a href="master/widgets_add" class=" btn btn-primary" placeholder="" aria-controls="example1">Add New Widget</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">

            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Templates</th>
                        <th>Widget Area</th>
                        <th>Widget Type</th>
                        <th>Widget Tittle</th>
                        <th>Modified Date</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $sno = 1; ?>
                    <?php if (!empty($query)) : ?>
                        <?php foreach ($query as $row) : ?>
                            <tr>
                                <td><?php echo $sno; ?></td>
                                <td><?php echo $row->template_name; ?></td>
                                <td><?php echo $row->area_name; ?></td>
                                <td><?php echo (!empty($row->type_name)) ? $row->type_name : 'Static Content'; ?></td>
                                <td><?php echo $row->widget_title ?></td>
                                <td><?php echo $row->created_date ?></td>
                                <td align="center"><?php echo (!empty($row->status_ind)) ? '<i class="fa fa-check-circle text-success" title="Active"></i>' : '<i class="fa  fa-times-circle text-red" title="Deactive"></i>'; ?></td>
                                <td align="center">
                                    <a href='master/widgets_edit/<?php echo $row->widget_id; ?>'><i class="fa fa-edit" title="Edit" aria-describedby="ui-id-4"></i></a>
                                    &nbsp;&nbsp;&nbsp;&nbsp;<a href='master/widgets_delete/<?php echo $row->widget_id; ?>/<?php echo $row->content_image ?>' title="Delete"><i class="fa fa-trash" title="Delete" aria-describedby="ui-id-4"></i></a>
                                </td>
                            </tr>
                            <?php $sno++; ?>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>