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
                                <a href="add-coupon.php" class="btn btn-info">Add Coupon</a>
                                <?php if(isset($error)){ ?>

<div class="alert alert-danger" role="alert">
    <p class="mb-0"><?= $error ?></p>
    
</div>
<?php } ?>
                                    <?php if(isset($_SESSION['success'])) { ?>

                                    <div class="alert alert-success mt-2" role="alert">
                                        <h4 class="alert-heading"><?= $_SESSION['success'] ?></h4>
                                        
                                    </div>
                                    <?php } unset($_SESSION['success']); ?>
                                    <?php if(isset($success)) { ?>

                                    <div class="alert alert-success mt-2" role="alert">
                                        <h4 class="alert-heading"><?= $success ?></h4>
                                        
                                    </div>
                                    <?php } ?>
                                    <div class="table-responsive">
                                        <table class="table mb-0">

                                            <thead class="thead-light">
                                                <tr>
                                                    <th>Coupon ID</th>
                                                    <th>Coupon Code</th>
                                                    <th>Coupon percentage</th>
                                                    <th>Delete Coupon</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php 

                                                $coupons = "SELECT * FROM `coupons`";
                                                $coupons_query = mysqli_query($connection, $coupons) or die('category_error'.mysqli_error($connection));

                                                while($result = mysqli_fetch_array($coupons_query)){


                                                ?>
                                                <tr>
                                                    <td>#<?= $result['id'] ?></td>
                                                    <td>#<?= $result['code'] ?></td>
                                                    <td><?= $result['percentage'] ?></td>
                                                    <td><img src="../images/<?= $result['image'] ?>" width="100px" height="100px" alt=""></td>
                                                    <td>
                                                        <div class="row">
                                                            <form action="" method="post">
                                                                <input type="hidden" name="c_id" value="<?= $result['id'] ?>">
                                                                <button type="button" class="btn btn-warning waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#update_coupon<?= $result['id'] ?>">Edit</button>
                                                                <button type="submit" name="delete_coupon" class="btn btn-danger waves-effect waves-light" onclick="return confirm('Do you want to delete coupon #<?= $result['id'] ?>'); ">Delete</button>

                                                            </form>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <div id="update_coupon<?php echo $result['id'] ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="my-modal-title">Title</h5>
                                                                <button class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form method="POST" enctype="multipart/form-data">
                                                                <div class="row">
                                                                    <input type="hidden" name="c_id" id="c_id" value="<?php echo $result['id'] ?>">
                                                                    <div class="col-12">
                                                                        <div class="form-group">
                                                                            <label for="code">Code</label>
                                                                            <input id="code" class="form-control" value="<?php echo $result['code'] ?>" type="text" name="code" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12">
                                                                        <div class="form-group">
                                                                            <label for="percentage">Percentage</label>
                                                                            <input id="percentage" min="0" max="100" class="form-control" value="<?php echo $result['percentage'] ?>" type="text" name="percentage" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12">
                                                                        <div class="form-group">
                                                                            <label for="image">Image</label>
                                                                            <input id="image" class="form-control"  type="file" name="image">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="submit" name="update_coupon" class="btn btn-primary">Update Coupon</button>
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- end row -->

                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

            <?php include('includes/footer.php') ?>

        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->



    <div class="rightbar-overlay"></div>

    <!-- JAVASCRIPT -->
    <?php include('includes/scripts-tag.php') ?>


</body>

</html>