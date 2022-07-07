<section class="content">
    <form method="post" action="">
        <?php
        $msg = $this->session->flashdata('msg');
        if (!empty($msg['txt'])):
            ?>
            <div class="alert-rk box box-success">
                <div class="alert alert-block alert-<?php echo $msg['type']; ?>" style="padding:5px;">
                    <span class="pull-left"><i class="<?php echo $msg['icon']; ?>"></i></span>
                    <?php echo $msg['txt']; ?>
					<span class="pull-right" style="margin-top:-4px;"><button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times" style="color: #fff !important;"></i></button></span>
                </div>
            </div>
        <?php endif ?> 
        <button type="submit" class="btn-medium btn-info" title="Delete" >Delete</button>
        <p class="pull-right"><a href='<?php echo $this->class_name; ?>/add'>Add New Email Template</a></p>   
        <div class="row">
            <div class="box box-info">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box">
                            <!-- /.box-header -->
                            <div class="box-body">
                                <table id="email_templates_table" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>S No</th>
                                            <th>Email Template Title</th>
                                            <th>Modified Date</th>
                                            <th>Modified By</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (!empty($query)):
                                            $sno=1;
                                            ?>
                                            <?php foreach ($query as $row): ?>
                                                <tr>
                                                    <td><?php echo $sno; ?></td>
                                                    <td><?php echo $row->template_title ?></td>
                                                    <td><?php
                                                        if ($row->last_modified_date == "" || $row->last_modified_date != '0000-00-00 00:00:00') {
                                                            echo $row->created_date;
                                                        } else {
                                                            echo $row->last_modified_date;
                                                        }
                                                        ?></td>
                                                    <td><?php
                                                        if ($row->last_modified_by == 0) {
                                                            echo $row->created_user;
                                                        } else {
                                                            echo $row->last_modified_user;
                                                        }
                                                        ?></td>
                                                    <td align="center"><?php echo (!empty($row->status_ind)) ? '<i class="fa fa-check-circle text-green" title="Active"></i>' : '<i class="fa  fa-times-circle text-red" title="Deactive"></i>'; ?></td>
                                                    <td align="center">
                                                        <a href='<?php echo $this->class_name; ?>/edit/<?php echo $row->template_id; ?>'><i class="fa fa-pencil" title="Edit" aria-describedby="ui-id-4"></i></a>
                                                        &nbsp;&nbsp;&nbsp;&nbsp;<a href='<?php echo $this->class_name; ?>/delete/<?php echo $row->template_id; ?>' title="Delete"><i class="fa fa-trash" title="Delete" aria-describedby="ui-id-4"></i></a>
                                                    </td>
                                                </tr>
                                                <?php $sno++; ?>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div><!-- /.box-body -->
                        </div><!-- /.box -->
                    </div><!-- /.col -->
                </div>
            </div>
        </div>
    </form><!-- /.row -->
</section>
