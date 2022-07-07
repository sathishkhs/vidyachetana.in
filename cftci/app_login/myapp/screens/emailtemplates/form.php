<section class="content">
    <div class="row">
        <div class="box box-info">
            <div class="overlay" id="loading_overlay" style="display:none;">
                <i class="fa fa-refresh fa-spin"></i>
            </div>
            <div class="container">
                <!-- Horizontal Form -->
                <form class="form-horizontals" method="post" id="user_form" name="user_form" action="<?php echo $this->class_name; ?>/save" enctype="multipart/form-data">
                    <input type="hidden" name="template_id" value="<?php echo (!empty($query->template_id)) ? $query->template_id : "" ?>"/>
                    <div class="container">
                        <div class="row centered-form">
                            <div class="col-xs-11 col-sm-11 col-md-11 col-sm-offset-2 col-md-offset-0">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title"><?php echo $page_heading; ?> <?php if (!empty($sub_heading)) { ?><small><?php echo $sub_heading; ?></small><?php } ?></h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-xs-3 col-sm-3 col-md-3">
                                                <div class="form-group">
                                                    <label for="page_title">Template Subject :</label>
                                                </div>
                                            </div>
                                            <div class="col-xs-6 col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <input type="text" name="template_title" id="template_title" class="form-control" placeholder="Template Title" value="<?php echo (!empty($query->template_title)) ? $query->template_title : '' ?>"   data-validation="required">
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-xs-3 col-sm-3 col-md-3">
                                                <div class="form-group">
                                                    <label for="page_content">Template Content :</label>
                                                </div>
                                            </div>
                                            <div class="col-xs-8 col-sm-8 col-md-8">
                                                <div class="form-group">
                                                    <textarea  name="template_content" id="template_content" rows="5" class="form-control ckeditor" placeholder="Template Content" data-validation="required"><?php echo (!empty($query->template_content)) ? $query->template_content : '' ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-xs-3 col-sm-3 col-md-3">
                                                <div class="form-group">
                                                    <label for="from">From Email :</label>
                                                </div>
                                            </div>
                                            <div class="col-xs-6 col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <input type="text" name="from" id="from" class="form-control" placeholder="From Email" value="<?php echo (!empty($query->from)) ? $query->from : '' ?>"   data-validation="required">
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-xs-3 col-sm-3 col-md-3">
                                                <div class="form-group">
                                                    <label for="cc">CC Email :</label>
                                                </div>
                                            </div>
                                            <div class="col-xs-6 col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <textarea name="cc" id="cc" class="form-control" placeholder="CC Email" value="<?php echo (!empty($query->cc)) ? $query->cc : '' ?>"></textarea>
                                                    <p style="color:orange">Note: Enter comma separated values</p>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-xs-3 col-sm-3 col-md-3">
                                                <div class="form-group">
                                                    <label for="bcc">BCC Email :</label>
                                                </div>
                                            </div>
                                            <div class="col-xs-6 col-sm-6 col-md-6">
                                                <div class="form-group">
                                                    <textarea name="bcc" id="bcc" class="form-control" placeholder="BCC Email" value="<?php echo (!empty($query->bcc)) ? $query->bcc : '' ?>"></textarea>
                                                    <p style="color:orange">Note: Enter comma separated values</p>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-xs-3 col-sm-3 col-md-3">
                                                <div class="form-group">
                                                    <label for="status_ind">Status :</label>
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
                                    <div class="box-footer">
                                        <a href="<?php echo $this->class_name; ?>" class="btn btn-warning">Cancel / Back</a>
                                        <button type="submit" class="btn btn-info pull-right"> Submit </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- /.box-body -->
                </form>
            </div><!-- /.box -->
        </div>
    </div>
</section>
