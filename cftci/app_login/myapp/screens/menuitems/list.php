<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <?php
                $msg = $this->session->flashdata('msg');
                if (!empty($msg['txt'])) :
                ?>
                    <div class="alert alert-block alert-<?php echo $msg['type']; ?>">
                        <button type="button" class="btn defalut" data-dismiss="alert">
                            <i class="fa fa-times"></i>
                        </button>
                        <i class="<?php echo $msg['icon']; ?>"></i>
                        <?php echo $msg['txt']; ?>
                    </div>
                <?php endif ?>
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><?php echo $page_heading; ?> <?php if (!empty($sub_heading)) { ?><small><?php echo $sub_heading; ?></small><?php } ?></h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <div class="row">
                                <div class="col-sm-12 col-md-2 ml-auto mb-2">
                                    <div id="example1_filter" class="dataTables_filter">
                                        <a href="master/menuitem_add" class=" btn btn-primary" placeholder="" aria-controls="example1">Add New Menu</a>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="menu_table" class="table table-bordered table-striped">
                                        <thead>
                                            <tr role='row'>
                                                
                                                <th>Menu</th>
                                                <th>MenuItem Text</th>
                                                <th>Menu Link</th>
                                                <th>Display Order</th>
                                                <th width="120">Modified Date</th>
                                                <th class="center">Status</th>
                                                 <th class="center" width="80px">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>