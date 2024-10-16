<?php
require_once('../database/connection.php');
if (!isset($_SESSION['admin_id'])) {

    header("Location: index.php");
}
include('functions/dashboard_function.php');
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
        <?php include('includes/sidebar.php') ?>



        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">
            <div class="page-content">


                <div class="container-fluid">

                    <div class="row">
                        <div class="col-md-6 col-xl-3">
                            <div class="card text-center">
                                <a href="dash-coupon.php" class="mb-2 card-body text-muted">
                                    <h3 class="text-info mt-2"><?= $coupons_count ?></h3> Total Coupons
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3">
                            <div class="card text-center">
                                <a href="dash-offer.php" class="mb-2 card-body text-muted">
                                    <h3 class="text-purple mt-2"><?= $offers_count ?></h3> Total offer
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3">
                            <div class="card text-center">
                                <a href="#" class="mb-2 card-body text-muted">
                                    <h3 class="text-primary mt-2">9</h3> Total client
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3">
                            <div class="card text-center">
                                <a href="dash-users.php" class="mb-2 card-body text-muted">
                                    <h3 class="text-danger mt-2"><?= $users_count ?></h3> Total users
                                </a>
                            </div>
                        </div>
                    
                        <div class="col-md-6 col-xl-3">
                            <div class="card text-center">
                                <a href="dash-sharelink.php" class="mb-2 card-body text-muted">
                                    <h3 class="text-info mt-2"><?= $shares_count ?></h3> Total Share Links
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3">
                            <div class="card text-center">
                                <a href="dash-reviews.php" class="mb-2 card-body text-muted">
                                    <h3 class="text-purple mt-2"><?= $reviews_count ?></h3> Total Reviews
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3">
                            <div class="card text-center">
                                <a href="dash-category.php" class="mb-2 card-body text-muted">
                                    <h3 class="text-primary mt-2"><?= $categories_count ?></h3> Total Categories
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3">
                            <div class="card text-center">
                                <a href="dash-orders.php" class="mb-2 card-body text-muted">
                                    <h3 class="text-danger mt-2"><?= $orders_count ?></h3> Total Orders
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->

                </div>
                <!-- END layout-wrapper -->
                <?php include('includes/footer.php') ?>
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
                    <!-- end slimscroll-menu-->
                </div>
                <!-- /Right-bar -->
            </div>
        </div>
    </div>
    <?php include('includes/scripts-tag.php') ?>

</body>

</html>