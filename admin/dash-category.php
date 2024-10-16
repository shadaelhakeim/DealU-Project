<?php
require_once('../database/connection.php');
if (!isset($_SESSION['admin_id'])){

    header("Location: index.php");
} 
include('functions/category_function.php');
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
                                    <a href="add-category.php" class="btn btn-info">Add category</a>
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
                                                    <th>Category ID</th>
                                                    <th>Category Name</th>
                                                    <th>Delete Category</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php 

                                                $categories = "SELECT * FROM `category`";
                                                $category_query = mysqli_query($connection, $categories) or die('category_error'.mysqli_error($connection));

                                                while($result = mysqli_fetch_array($category_query)){


                                            ?>
                                                <tr>
                                                    <td><?= $result['id'] ?></td>
                                                    <td><?= $result['name'] ?></td>
                                                    <td>
                                                        <div class="row">
                                                            <form action="" method="post">
                                                                <input type="hidden" name="c_id" value="<?= $result['id'] ?>">
                                                                <button type="button" class="btn btn-warning waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#update_category<?= $result['id'] ?>">Edit</button>
                                                                <button type="submit" name="delete_category" class="btn btn-danger waves-effect waves-light" onclick="return confirm('Do you want to delete category #<?= $result['id'] ?>'); ">Delete</button>

                                                            </form>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <div id="update_category<?php echo $result['id'] ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="my-modal-title">Title</h5>
                                                                <button class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form method="POST">
                                                                <div class="row">
                                                                <input type="hidden" name="c_id" id="c_id" value="<?php echo $result['id'] ?>">
                                                                    <div class="col-12">
                                                                        <div class="form-group">
                                                                            <label for="name">Name</label>
                                                                            <input id="name" class="form-control" value="<?php echo $result['name'] ?>" type="text" name="name" required>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="submit" name="update_category" class="btn btn-primary">Update Category</button>
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

    <?php include('includes/scripts-tag.php') ?>


</body>

</html>