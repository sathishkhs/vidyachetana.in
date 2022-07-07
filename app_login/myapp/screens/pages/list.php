<section class="content">
    <section class="wrapper">
        <div class="row">
            <div class="col-md-12">
                <!-- Horizontal Form -->
                <div class="box box-info">
                    <?php $msg = $this->session->flashdata('msg');
                    if (!empty($msg['txt'])) : ?>
                        <div class="alert alert-block alert-<?php echo $msg['type']; ?>">
                            <button type="button" class="btn defalut" data-dismiss="alert">
                                <i class="fa fa-remove"></i>
                            </button>
                            <i class="<?php echo $msg['icon']; ?>"></i>
                            <?php echo $msg['txt']; ?>
                        </div>
                    <?php endif ?>
                    <div class="box-header">
                        <h3 class="box-title"><?php echo $page_heading; ?></h3>
                        <div class="box-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <p class="text-right"> <a href="master/pages_add" class=" btn btn-primary" placeholder="" aria-controls="example1">Add New Page</a></p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <table id="pages_table" class="table display table-bordered table-striped table-hover dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Page Title</th>
                                        <th>Page Type</th>
                                        <th>Page Slug</th>
                                        <th>Created By</th>
                                        <th>Created Date</th>
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
                                                <td><?php echo $row->page_title; ?></td>
                                                <td><?php echo $row->type_name; ?></td>
                                                <td><?php echo $row->page_slug; ?></td>
                                                <td>
                                                    <?php
                                                    if ($row->last_modified_by == 0) {
                                                        echo $row->created_by;
                                                    } else {
                                                        echo $row->last_modified_by;
                                                    }
                                                    ?>
                                                <td align="center">
                                                    <?php
                                                    if ($row->last_modified_date == "" || $row->last_modified_date == '0000-00-00 00:00:00') {
                                                        echo $row->created_date;
                                                    } else {
                                                        echo $row->last_modified_date;
                                                    }
                                                    ?>
                                                </td>
                                                <td align="center"><?php echo (!empty($row->status_ind)) ? '<i class="fa fa-check-circle text-green" title="Active"></i>' : '<i class="fa  fa-times-circle text-red" title="Deactive"></i>'; ?></td>
                                                <td align="center">
                                                    <a href='master/pages_edit/<?php echo $row->page_id; ?>'><i class="fa fa-edit" title="Edit" aria-describedby="ui-id-4"></i></a>
                                                    <?php //if ($row->type_id == 20) { 
                                                    ?>
                                                    &nbsp;&nbsp;&nbsp;&nbsp;<a href='master/pages_delete/<?php echo $row->page_id; ?>/<?php echo $row->banner_image ?>' onclick="return delete_action();" title="Delete"><i class="fa fa-trash" title="Delete" aria-describedby="ui-id-4"></i></a>
                                                    <?php //} 
                                                    ?>
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
            </div>
            <!-- /.card-body -->
        </div>
     
        <!-- /.col -->
     
        <!-- /.container-fluid -->
    </section>
    </section>