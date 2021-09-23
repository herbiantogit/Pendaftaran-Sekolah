<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Login | Pendaftaran Online Anugerah Pekerti</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="<?= base_url() ?>assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url() ?>assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url() ?>assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url() ?>assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url() ?>assets/global/css/components-rounded.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="<?= base_url() ?>assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url() ?>assets/pages/css/login-4.min.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url() ?>assets/global/css/custom.css" rel="stylesheet" type="text/css"/>
        <link href="<?= base_url() ?>assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="<?= base_url() ?>assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="<?= base_url() ?>assets/global/plugins/bootstrap-toastr/toastr.min.css"/>
        <link href="<?= base_url() ?>assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css" /> 
        <link href="<?= base_url() ?>assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />
        <link rel="shortcut icon" href="<?= base_url() ?>assets/global/img/logo.png" /> 
        <style type="text/css">
            .jw-slideshow {
                margin: auto;
                width: 768px;
                height: 2000px;
                background: #000;
                opacity: 0.7;
                color: #fff;
                padding: 26px;
                font-weight: bold;
                font-size: 2em;
            }
            .jw-slideshow h1 {
                text-align: center;
            }
            .jw-slideshow p {
                padding: 100px;
                background: #aaa;
                color: #000;
            }
        </style>
    </head>
    <body class=" login">
        <div id="panel">
            <div class="logo" >
                <br />
                <center>
                    <img src="<?= base_url() ?>assets/global/img/logo_header.png" alt="" width="300px" />
                </center>
            </div>
            <div class="content lebar" style="padding-top: 1px">
                <form class="login-form" action="#" method="post" id="form-login">
                    <h3 class="form-title" style="text-align: center"><b>Login</b></h3>
                    <div class="alert alert-danger display-hide">
                        <button class="close" data-close="alert"></button>
                        <span> Enter any username and password. </span>
                    </div>
                    <div class="form-group">
                        <label class="control-label visible-ie8 visible-ie9">Username</label>
                        <div class="input-icon">
                            <i class="fa fa-user"></i>
                            <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Username" name="username" id="username" /> </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label visible-ie8 visible-ie9">Password</label>
                        <div class="input-icon">
                            <i class="fa fa-lock"></i>
                            <input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="passwd" id="passwd" /> </div>
                    </div>
                    <div class="form-actions" style="padding-bottom: 5px">
                        <label class="checkbox">
                        </label>
                        <button type="submit" class="btn green pull-right"><i class="fa fa-sign-in"></i> Login </button>
                    </div>
                </form>
            </div>
            <div class="copyright"> 2021 &copy; Pendaftaran Online Anugerah Pekerti </div>
            <br><br>
        </div>
        <script src="<?= base_url() ?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>assets/global/plugins/jquery-validation/js/additional-methods.min.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>assets/global/plugins/backstretch/jquery.backstretch.min.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>assets/global/plugins/bootstrap-toastr/toastr.min.js"></script> 
        <script src="<?= base_url() ?>assets/global/scripts/app.min.js" type="text/javascript"></script>
        <script>
            var myVar;

            jQuery(document).ready(function () {
                var background = [];
                var loc = String(window.location).split("/");
                function getContextPath() {
                    return window.location.pathname.substring(0, window.location.pathname.indexOf("/", 2));
                }
                $(".btn-slide").click(function () {
                    $("#panel").slideToggle("slow");
                    $(this).toggleClass("active");
                    return false;
                });
                $.backstretch([
                    "<?= base_url() ?>assets/global/img/background_1.jpg",
                    "<?= base_url() ?>assets/global/img/background_2.jpg",
                    "<?= base_url() ?>assets/global/img/background_3.jpg",
                    "<?= base_url() ?>assets/global/img/background_4.jpg"
                ], {
                    duration: 2000,
                    fade: 600
                });

                var Login = function () {
                    var handleLogin = function () {
                        $('#form-login').validate({
                            errorElement: 'span', //default input error message container
                            errorClass: 'help-block', // default input error message class
                            focusInvalid: false, // do not focus the last invalid input
                            rules: {
                                username: {
                                    required: true
                                },
                                password: {
                                    required: true
                                }
                            },
                            messages: {
                                username: {
                                    required: "<b>Username Harus diisi.</b>"
                                },
                                password: {
                                    required: "<b>Password Harus diisi.</b>"
                                }
                            },
                            highlight: function (element) { // hightlight error inputs
                                $(element)
                                        .closest('.form-group').addClass('has-error'); // set error class to the control group
                            },
                            success: function (label) {
                                label.closest('.form-group').removeClass('has-error');
                                label.remove();
                            },
                            errorPlacement: function (error, element) {
                                error.insertAfter(element.closest('.input-icon'));
                            },
                            submitHandler: function (form) {
                                $.blockUI();
                                $.ajax({
                                    method: 'POST',
                                    dataType: 'json',
                                    url: '<?= site_url() ?>login/do_login',
                                    data: $('#form-login').serializeArray(),
                                    success: function (data) {
                                        $.unblockUI();
                                        if (data.success === true) {
                                            window.location.href = "<?= site_url() ?>" + data.page;
                                        } else {
                                            toastr.error("Username atau Password salah")
                                        }
                                    },
                                    fail: function (e) {
                                        $.unblockUI();
                                        toastr.error(e);
                                    }
                                });
                            }
                        });
                    };

                    return {
                        //main function to initiate the module
                        init: function () {
                            handleLogin();
                        }
                    };
                }();

                Login.init();
            });
        </script>
    </body>

</html>
