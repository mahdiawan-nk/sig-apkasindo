<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Lunoz - Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="MyraStudio" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- App css -->
    <link href="<?=base_url('assets/admin/')?>css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?=base_url('assets/admin/')?>css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="<?=base_url('assets/admin/')?>css/theme.min.css" rel="stylesheet" type="text/css" />

</head>

<body class="bg-primary">

    <div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="d-flex align-items-center min-vh-100">
                        <div class="w-100 d-block my-5">
                            <div class="row justify-content-center">
                                <div class="col-md-8 col-lg-5">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="text-center mb-4 mt-3">
                                                <a href="index.html">
                                                    <span><img src="https://www.dpp-apkasindo.com/images/logo.png" alt="" class="w-75"></span>
                                                </a>
                                            </div>
                                            <form class="p-2" method="POST" action="<?=base_url('auth/checklogin')?>">
                                                <div class="form-group">
                                                    <label for="emailaddress">Email address</label>
                                                    <input class="form-control" required type="email" id="emailaddress" required="" placeholder="john@deo.com" name="email">
                                                </div>
                                                <div class="form-group">
                                                    <label for="password">Password</label>
                                                    <input class="form-control" required type="password" required="" id="password" placeholder="Enter your password" name="password">
                                                </div>
                                                <div class="mb-3 text-center">
                                                    <button type="submit" class="btn btn-primary btn-block" type="submit"> Sign In </button>
                                                </div>
                                            </form>
                                        </div>
                                        <!-- end card-body -->
                                    </div>
                                    <!-- end card -->
                                </div>
                                <!-- end col -->
                            </div>
                            <!-- end row -->
                        </div> <!-- end .w-100 -->
                    </div> <!-- end .d-flex -->
                </div> <!-- end col-->
            </div> <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end page -->

    <!-- jQuery  -->
    <script src="<?=base_url('assets/admin/')?>js/jquery.min.js"></script>
    <script src="<?=base_url('assets/admin/')?>js/bootstrap.bundle.min.js"></script>
    <script src="<?=base_url('assets/admin/')?>js/metismenu.min.js"></script>
    <script src="<?=base_url('assets/admin/')?>js/waves.js"></script>
    <script src="<?=base_url('assets/admin/')?>js/simplebar.min.js"></script>

    <!-- App js -->
    <script src="<?=base_url('assets/admin/')?>js/theme.js"></script>

</body>

</html>