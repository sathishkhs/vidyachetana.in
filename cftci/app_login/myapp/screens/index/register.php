<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-5 d-none d-lg-block bg-register-image" style="background:url(img/home-delivery-service.jpg);background-size:cover;"></div>
                <div class="col-lg-7">
                    <div class="p-5">
                        
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

                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                        </div>
                        <form class="user" id="reg-form" method="post" action="register" autocomplete="off">
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="text" class="form-control form-control-user" id="first_name" name="first_name" placeholder="First Name">
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control form-control-user" id="last_name" name="last_name" placeholder="Last Name">

                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <select class="form-control form-control-role" name="role_id" id="role_id">

                                        <option value="">Select User Role</option>

                                        <?php foreach ($roles as $row) : ?>
                                            <?php if($row->role_id ==1 || $row->role_id == 2){

                                            }else{ ?>
                                            <option class="form-control-option" value="<?php echo $row->role_id; ?>" <?php echo (!empty($query->role_id) && $row->role_id == $query->role_id) ? 'selected' : ''; ?>><?php echo $row->role_name; ?></option>

                                        <?php } endforeach ?>

                                    </select>
                                </div>
                                <div class="col-sm-6">
                                    <input type="email" class="form-control form-control-user" id="email" name="email" placeholder="Email Address">
                                    <span id="error-email"></span>

                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="text" class="form-control form-control-user" id="username" name="username" placeholder="User Name" value="" required>
                                    <span id="error-username"></span>
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control form-control-user" id="mobile_number" name="mobile_number" placeholder="Mobile Number" value="" pattern="[1-9]{1}[0-9]{9}" title="Enter correct Mobile number" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input  type="password" class="form-control form-control-user" id="password" placeholder="Password" name="password" value="">
                                    <span id="error-password"></span>
                                </div>
                                <div class="col-sm-6">
                                    <input type="password" class="form-control form-control-user" id="confirm_password" placeholder="Repeat Password" name="confirm_password" value="" required>
                                </div>
                            </div>
                            <input type="button" value="Register Account" class="btn btn-primary btn-user btn-block" id="btnsubmit">


                            <!-- <hr>
                        <a href="index.html" class="btn btn-google btn-user btn-block">
                            <i class="fab fa-google fa-fw"></i> Register with Google
                        </a>
                        <a href="index.html" class="btn btn-facebook btn-user btn-block">
                            <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                        </a> -->
                        </form>
                        <hr>
                        <div class="text-center">
                            <a class="small" href="forgotpassword">Forgot Password?</a>
                        </div>
                        <div class="text-center">
                            <a class="small" href="">Already have an account? Login!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $(':input[type="button"]').prop('disabled', true);
        })
        $('#password, #confirm_password').keyup(function() {
            check_pass_match();
        })
        $('#username').keyup(function() {
            check_username();
        })
        $('#email').keyup(function() {
            check_email();
        })

        $('#btnsubmit').click(function(e) {
            e.preventDefault();
            if (check_pass_match() == true) {
                $('#reg-form').submit();
            }
        })

        function check_email() {
            var email = $('#email').val();
            if(email.length >3){
            $.ajax({
                url: 'index/check_email',
                data: {
                    email: email
                },
                dataType: 'JSON',
                type: 'POST',
                cache: false,
                success: function(result) {

                    if (result == '0' && result != 1) {
                        $(':input[type="button"]').prop('disabled', true);
                        $('#error-email').html('<span class="text-danger">Email already Exists </span>');

                    } else {
                        $(':input[type="button"]').prop('disabled', false);
                        $('#error-email').empty();

                    }
                }
            })
        }

        }

        function check_username() {
            var username = $('#username').val();
            if(username.length > 3){
            $.ajax({
                url: 'index/check_username',
                data: {
                    username: username
                },
                dataType: 'JSON',
                type: 'POST',
                cache: false,
                success: function(result) {

                    if (result == '0' && result != 1) {
                        $(':input[type="button"]').prop('disabled', true);
                        $('#error-username').html('<span class="text-danger">Username already Exists </span>');

                    } else {
                        $(':input[type="button"]').prop('disabled', false);
                        $('#error-username').empty();

                    }
                }
            })
        }

        }

        function check_pass_match() {
            var password = $('#password').val();
            var confirm = $('#confirm_password').val();
            if (password.length >= 5 && confirm.length >= 5) {
                if (password == confirm && confirm.length > 0) {
                    $('#error-password').html('<span class="text-success">Password Matched</span>')
                    $(':input[type="button"]').prop('disabled', false);
                    return true;
                } else {
                    $(':input[type="button"]').prop('disabled', true);
                    $('#error-password').html('<span class="text-danger">Password Mis Matched</span>')
                    return false;
                }
                $(':input[type="button"]').prop('disabled', true);
                return false;
            } else {
                $('#error-password').html('<span class=" text-danger">Password and repeat password should be 6 characters.</span>')
                $(':input[type="button"]').prop('disabled', true);
                return false;
            }
        }

       
    </script>