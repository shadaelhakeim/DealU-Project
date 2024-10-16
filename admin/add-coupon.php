<?php
require_once('../database/connection.php');
if (!isset($_SESSION['admin_id'])){

    header("Location: index.php");
} 
include('functions/coupon_function.php');
?>
<!doctype html>
<html lang="en">

<head>
    <?php include('includes/head-tags.php') ?>



</head>

<body data-sidebar="dark">

    <!-- Loader -->
    <div id="preloader">
        <div id="status">
            <div class="spinner"></div>
        </div>
    </div>

    <!-- Begin page -->
    <div id="layout-wrapper">

    <?php include('includes/header.php') ?>


        <!-- ========== Left Sidebar Start ========== -->
        <?php include('includes/sidebar.php') ?>

        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">

                                    <h4 class="card-title">Add Coupon </h4>
                                    <p class="card-title-desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi modi accusantium adipisci nobis quisquam non quae perspiciatis eius suscipit explicabo? Porro sequi consequatur at dolorum illo, non eius nemo obcaecati?.</p>
                                    <?php if(isset($error)){ ?>

                                        <div class="alert alert-danger" role="alert">
                                            <p class="mb-0"><?= $error ?></p>
                                            
                                        </div>
                                        <?php } ?>
                                    <form class="row needs-validation" method="POST" enctype="multipart/form-data">

                                        <div class="mb-3 position-relative">
                                            <label class="form-label" for="validationCustom01">Code</label>
                                            <input name="code" type="text" class="form-control" id="validationCustom01" placeholder="Type something" required />
                                            <div class="valid-tooltip">
                                                Looks good!
                                            </div>
                                        </div>
                                        <div class="mb-3 position-relative">
                                            <label class="form-label" for="validationCustom01">percentage</label>
                                            <input name="percentage" min="0" max="100" type="text" class="form-control" id="validationCustom01" placeholder="Type something" required />
                                            <div class="valid-tooltip">
                                                Looks good!
                                            </div>
                                        </div>
                                        <div class="mb-3 position-relative">
                                            <label class="form-label" for="validationCustom01">Image</label>
                                            <input name="image"  type="file" class="form-control" id="validationCustom01" placeholder="Type something" required />
                                            <div class="valid-tooltip">
                                                Looks good!
                                            </div>
                                        </div>




                                        <div class="mb-0">
                                            <div>
                                                <button type="submit" class="btn btn-pink waves-effect waves-light" name="add_coupon">
                                                    Add coupon
                                                </button>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->

                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            ©
                            <script>
                                document.write(new Date().getFullYear())
                            </script> Admin dashboard<span class="d-none d-sm-inline-block"> -
                                Cearted by <i class="mdi mdi-heart text-danger"></i> DealU.</span>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

    <!-- Right Sidebar -->
    <div class="right-bar">
        <div data-simplebar class="h-100">
            <div class="rightbar-title px-3 py-4">
                <a href="javascript:void(0);" class="right-bar-toggle float-end">
                    <i class="mdi mdi-close noti-icon"></i>
                </a>
                <h5 class="m-0">Settings</h5>
            </div>

        </div>

    </div>
    <!-- end slimscroll-menu-->
    </div>
    <!-- /Right-bar -->

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    <?php include('includes/scripts-tag.php') ?>


</body>

</html>