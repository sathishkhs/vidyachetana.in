<div class="main-container container-fluid">
    <div class="main-content">
        <div class="row-fluid">
            <div class="span12">
                <div class="login-container">
                    <div class="row-fluid">
                        <div class="center">
                            <img src="images/logo.png" />
                        </div>
                    </div>
                    <div class="space-6"></div>
                    <div class="row-fluid">
                        <div class="position-relative">
                            <div id="login-box" class="login-box visible widget-box no-border">
                                <div class="widget-body">
                                    <div class="widget-main">
                                        <h4 class="header red lighter bigger">
                                            <i class="icon-key"></i>
                                            Retrieve Password
                                        </h4>
                                        <div class="space-6"></div>
                                        <?php
                                        $msg = $this->session->flashdata('msg');
                                        if (!empty($msg['txt'])):
                                            ?>
                                            <div class="alert alert-block alert-<?php echo $msg['type']; ?>">
                                                <button type="button" class="close" data-dismiss="alert">
                                                    <i class="icon-remove"></i>
                                                </button>
                                                <i class="<?php echo $msg['icon']; ?>"></i>
                                                <?php echo $msg['txt']; ?>
                                            </div>
                                        <?php endif ?>
                                        <?php echo form_open('forgot-password'); ?>
                                        <fieldset>
                                            <label>
                                                <span class="block input-icon input-icon-right">
                                                    <?php echo form_error('email'); ?>
                                                    <input type="email" name="email" class="span12" placeholder="Email" />
                                                    <i class="icon-envelope"></i>
                                                </span>
                                            </label>
                                            <div class="clearfix">
                                                <button type="submit" class="width-35 pull-right btn btn-small btn-danger">
                                                    <i class="icon-lightbulb"></i>
                                                    Send Me!
                                                </button>
                                            </div>
                                        </fieldset>
                                        <?php echo form_close(); ?>
                                        <div class="social-or-login center">                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                     </div>
                                    </div><!--/widget-main-->
                                    <div class="toolbar clearfix">
                                        <div>
                                            <a href="" class="forgot-password-link">
                                                <i class="icon-arrow-left"></i>
                                                Back to login
                                            </a>
                                        </div>
                                        <div>
                                            <a target="_blank" href="http://vcm.org.in/"  class="user-signup-link">
                                                vcm.org.in
                                                <i class="icon-arrow-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div><!--/widget-body-->
                            </div><!--/forgot-box-->
                        </div><!--/position-relative-->
                    </div>
                </div>
            </div><!--/.span-->
        </div><!--/.row-fluid-->
    </div>
</div><!--/.main-container-->