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

  <div class="overflow-hidden ">
    <div class="row no-gutters row-bordered row-border-light">
      <div class="col-md-3 pt-0">
        <div class="list-group list-group-flush account-settings-links">
          <a class="list-group-item list-group-item-action active" data-toggle="list" href="#account-general">General</a>
          <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-change-password">Change password</a>
        </div>
      </div>
      <div class="col-md-9 border-left-primary border pb-4">
        <div class="tab-content">
          <div class="tab-pane fade active show" id="account-general">
            <form class="form-horizontal" action="index/save_profile" method="post" enctype="multipart/form-data">
              <input name="user_id" type="hidden" value="<?php echo (!empty($profile->user_id)) ? $profile->user_id : ''; ?>" />
              <?php $msg = $this->session->flashdata('profile_pic_err');
              if (!empty($msg['profile_pic'])) : ?>
                <div class="alert alert-block alert-<?php echo $msg['type']; ?>">
                  <button type="button" class="btn defalut" data-dismiss="alert">
                    <i class="fa fa-times"></i>
                  </button>
                  <i class="<?php echo $msg['icon']; ?>"></i>
                  <?php echo $msg['txt']; ?>
                </div>
              <?php endif ?>
              <div class="card-body media align-items-center">
                <?php if (!empty($profile->profile_pic) && file_exists(PROFILE_PIC_PATH . $profile->profile_pic)) { ?>
                  <img src="<?php echo PROFILE_PIC_PATH . $profile->profile_pic; ?>" alt="" class="d-block ui-w-80 ui-profile-border">
                <?php } else { ?>
                  <img src="img/avatar5.png" alt="" class="d-block ui-w-80 ui-profile-border">
                <?php } ?>
                <div class="media-body ml-4">
                  <label class="btn btn-outline-primary">
                    Upload Profile photo
                    <input class="account-settings-fileinput" type="file" name="profile_pic" id="profile_pic" placeholder="Profile Picture">
                  </label> &nbsp;
                  <button type="button" class="btn btn-danger md-btn-flat">Reset</button>

                  <div class="text-light small mt-1">Allowed JPG, GIF or PNG. Max size of 2MB</div>
                </div>
              </div>
              <hr class="border-light m-0">

              <div class="card-body">
                <div class="row mb-2">
                  <div class="col-md-3 text-muted ">Username:</div>
                  <div class="col-md-9">
                    <b><?php echo !empty($profile->username) ? $profile->username : ''; ?></b>
                  </div>
                </div>
                <div class="row mb-2">
                  <div class="col-md-3 text-muted ">Role:</div>
                  <div class="col-md-9">
                    <b><?php echo !empty($role->role_name) ? $role->role_name : ''; ?></b>
                  </div>
                </div>
                <br />
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="col-sm-12 col-md-12 control-label" for="form-field-1">First Name <span class="eror"><?php echo form_error('first_name'); ?></span></label>
                      <div class="col-sm-12">
                        <input name="first_name" type="text" class="form-control" value="<?php echo (!empty($profile->first_name)) ? $profile->first_name : ''; ?>" />
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="col-sm-12 col-md-12 control-label" for="form-field-2">Last Name <span class="eror"><?php echo form_error('last_name'); ?></span></label>
                      <div class="col-sm-12">
                        <input name="last_name" type="text" class="form-control" value="<?php echo (!empty($profile->last_name)) ? $profile->last_name : ''; ?>" />
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="col-sm-12 col-md-12 control-label" for="form-field-3">Email<span class="eror"><?php echo form_error('email'); ?></span></label>
                      <div class="col-sm-12">
                        <input name="email" type="text" class="form-control" value="<?php echo (!empty($profile->email)) ? $profile->email : ''; ?>" />
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="col-sm-12 col-md-12 control-label" for="form-field-3">Mobile Number<span class="eror"><?php echo form_error('mobile_number'); ?></span></label>
                      <div class="col-sm-12">
                        <input name="mobile_number" type="text" class="form-control" value="<?php echo (!empty($profile->mobile_number)) ? $profile->mobile_number : ''; ?>" pattern="[1-9]{1}[0-9]{9}" title="Enter correct Mobile number" required/>
                      </div>
                    </div>
                  </div>
                </div>
                <br /><br />
                <div class="form-actions form-btns">
                  <button class="btn btn-round btn-success btn-sm" type="submit">
                    <i class="fa fa-check"></i>
                    Save
                  </button>
                  &nbsp; &nbsp; &nbsp;
                  <button class="btn btn-round btn-danger btn-sm" type="reset">
                    <i class="fa fa-sync"></i>
                    Reset
                  </button>
                  &nbsp; &nbsp; &nbsp;
                  <a href="adminusers">
                    <button class="btn btn-warning btn-round btn-sm" type="button">
                      <i class="fa fa-times"></i>
                      Back
                    </button></a>
                </div>
            </form>
          </div>
          </form>
        </div>
        <div class="tab-pane fade" id="account-change-password">
          <div class="card-body pb-2">
            <form class="form-horizontal" id="change-password-form" action="index/change_password" method="post" enctype="multipart/form-data">
              <div class="form-group">
                <label class="form-label">Current password</label>
                <input type="password" id="current_password" name="current_password" value="" class="form-control">
                <span id="current-password-err"></span>
              </div>

              <div class="form-group">
                <label class="form-label">New password</label>
                <input type="password" id="new_password" name="new_password" value="" class="form-control">
                <span id="new-password-err"></span>
              </div>

              <div class="form-group">
                <label class="form-label">Repeat new password</label>
                <input type="password" id="repeat_password" name="repeat_password" value="" class="form-control">
              </div>
              

              <div class="form-actions form-btns">
                <button class="btn btn-round btn-success btn-sm" id="password-change-btn" type="button">
                  <i class="fa fa-check"></i>
                  Save
                </button>
                &nbsp; &nbsp; &nbsp;
                <button class="btn btn-round btn-danger btn-sm" type="reset">
                  <i class="fa fa-sync"></i>
                  Reset
                </button>
                &nbsp; &nbsp; &nbsp;
                <a href="adminusers">
                  <button class="btn btn-warning btn-round btn-sm" type="button">
                    <i class="fa fa-times"></i>
                    Back
                  </button></a>
              </div>
            </form>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>



</div>

<script>
$(document).ready(function(){

$('#password-change-btn').click(function(e){
  e.preventDefault();
  $('#new-password-err').empty('');
  $('#current-password-err').empty('');
  var current_password = $('#current_password').val();
  var new_password = $('#new_password').val();
  var repeat_password = $('#repeat_password').val();
  
  $.ajax({
url: 'index/check_password',
data:{password:current_password},
data_type:'JSON',
method:'POST',
success: function(result){
  if(result === 1){
    if(new_password.length >= 5 && repeat_password.length >= 5){
  if(new_password === repeat_password ){
      $('#new-password-err').html('<span class="text-success">Password & Repeat password Matched</span>');
      $('#change-password-form').submit();
  }else{
    $('#new-password-err').html('<span class="text-danger">Password Should match with repeat password</span>');
  }
}else{
  $('#new-password-err').html('<span class="text-danger">Password Repeat Password Should not be less than 5 characters</span>');
}
  }else{
    $('#current-password-err').html('<span class="text-danger">Current Password you entered is wrong</span>');
  }
}

  })
  
})

})
</script>