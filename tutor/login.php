<?php 
    session_start();
    if (isset($_SESSION['elearn_tutor'])) {
        header('location: dashboard');
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Elearning - login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A simple elearning website" name="description" />
        <meta content="Tijani" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- App css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />

    </head>

    <body class="authentication-bg">
        
        <div class="account-pages my-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-10">
                        <div class="card">
                            <div class="card-body p-0">
                                <div class="row">
                                    <div class="col-lg-6 p-5">
                                        <div class="mx-auto mb-5">
                                            <a href="./">
                                                <img src="../images/logo.png" alt="" height="24" />
                                                <h3 class="d-inline align-middle ml-1 text-logo">Educa</h3>
                                            </a>
                                        </div>

                                        <h6 class="h5 mb-0 mt-4">Login to your account</h6>
                                        <p class="text-muted mt-0 mb-4">Login to your account and start teaching</p>

                                        <form method="post" id="regForm" class="authentication-form">
                                            <div id="regResult" style="display: none;"></div>

                                            <div class="form-group">
                                                <label class="form-control-label">Email Address</label>
                                                <div class="input-group input-group-merge">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="icon-dual" data-feather="mail"></i>
                                                        </span>
                                                    </div>
                                                    <input type="email" class="form-control" name="email" required id="email" placeholder="hello@coderthemes.com">
                                                </div>
                                            </div>

                                            <div class="form-group ">
                                                <label class="form-control-label">Password</label>
                                                <div class="input-group input-group-merge">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="icon-dual" data-feather="lock"></i>
                                                        </span>
                                                    </div>
                                                    <input type="password" class="form-control" name="password" required id="password"
                                                        placeholder="Enter your password">
                                                </div>
                                            </div>

                                            <div class="form-group mb-4">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                        id="checkbox-signup" checked>
                                                    <label class="custom-control-label" for="checkbox-signup">
                                                        I accept <a href="javascript: void(0);">Terms and Conditions</a>
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="form-group mb-0 text-center">
                                                <button class="btn btn-primary btn-block" type="submit">
                                                    <span class="spinner" id="regSpinner" style="display: none;">
                                                        <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                                                        <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                                                        <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                                                    </span>
                                                    <span class="btnText">
                                                        Login
                                                    </span>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                    
                                    <div class="col-lg-6 d-none d-md-inline-block">
                                        <div class="auth-page-sidebar">
                                            <div class="overlay"></div>
                                            <div class="auth-user-testimonial">
                                                <p class="font-size-24 font-weight-bold text-white mb-1">I simply love it!</p>
                                                <p class="lead">"It's a great elearning system!"
                                                </p>
                                                <p>- User</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->

                        <div class="row mt-3">
                            <div class="col-12 text-center">
                                <p class="text-muted">Don't have account? <a href="register" class="text-primary font-weight-bold ml-1">Register</a></p>
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->

                    </div> <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->

        <!-- Vendor js -->
        <script src="assets/js/vendor.min.js"></script>

        <!-- App js -->
        <script src="assets/js/app.min.js"></script>
        
    </body>
</html>


<script>
    $('#regForm').submit(function(e){
        e.preventDefault();
        $.ajax({
            url:'ajax/login.php',
            type: 'POST',
            data : $(this).serialize(),
            cache: false,
            beforeSend: function() {
                $('#regSpinner').show();
                $('#regResult').hide();
            },
            success: function(data){
                if (data == 1) {
                    location.href = 'dashboard';
                }
                else{
                    $('#regResult').html(data);
                    $('#regResult').fadeIn();
                    $('#regSpinner').hide();
                }
            }
        })
    })
</script>
