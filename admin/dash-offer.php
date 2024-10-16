<?php
require_once('../database/connection.php');
if (!isset($_SESSION['admin_id'])){

    header("Location: index.php");
} 
include('functions/offers_function.php');
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
                    <a href="add-offer.php" class="btn btn-info">Add offer</a>
                    <?php if (isset($_SESSION['success'])) { ?>

                        <div class="alert alert-success mt-2" role="alert">
                            <h4 class="alert-heading"><?= $_SESSION['success'] ?></h4>

                        </div>
                    <?php }
                    unset($_SESSION['success']); ?>
                    <?php if (isset($success)) { ?>

                        <div class="alert alert-success mt-2" role="alert">
                            <h4 class="alert-heading"><?= $success ?></h4>

                        </div>
                    <?php } ?>
                    <div class="table-responsive">
                        <table class="table mb-0">

                            <thead class="thead-light">
                                <tr>
                                    <th>#</th>
                                    <th>Offer Name</th>
                                    <th>Offer Image</th>
                                    <th>Offer Price</th>
                                    <th>Type</th>
                                    <th>For whom</th>
                                    <th>Description</th>
                                    <th>Expires in</th>
                                    <th>Category Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                $offers = "SELECT offers.* , category.id AS category_id , category.name AS category_name FROM `offers` INNER JOIN category ON category.id = offers.category_id";
                                $offers_query = mysqli_query($connection, $offers) or die('users_error' . mysqli_error($connection));

                                while ($result = mysqli_fetch_array($offers_query)) {

                                ?>
                                    <tr>
                                        <th scope="row"><?= $result['id'] ?></th>
                                        <td><?= $result['name'] ?></td>
                                        <td><img src="../images/<?= $result['image'] ?>" width="100px" height="100px" alt=""></td>
                                        <td><?= $result['price'] ?></td>
                                        <td><?= $result['type'] ?></td>
                                        <td><?= $result['for_gender'] ?></td>
                                        <td><?= $result['description'] ?></td>
                                        <td><?= $result['expires_in'] ?></td>
                                        <td><?= $result['category_name'] ?></td>
                                        <td>
                                            <div class="row">
                                                <form action="" method="post">

                                                    <input type="hidden" name="o_id" value="<?= $result['id'] ?>">

                                                    <button type="button" class="btn btn-warning waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#update_offer<?= $result['id'] ?>">Edit</button>

                                                    <button name="delete_offer" onclick="return confirm('Are youu want to delete offer #<?= $result['id'] ?>');" class="btn btn-danger">Delete</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    <div id="update_offer<?php echo $result['id'] ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="my-modal-title">Update product</h5>
                                                    <button class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">

                                                    <form class="row needs-validation" method="POST" enctype="multipart/form-data">
                                                        <div class="mb-3 position-relative">
                                                            <input type="hidden" name="o_id" value="<?= $result['id'] ?>">
                                                            <label class="form-label" for="validationCustom01">Name</label>
                                                            <input type="text" value="<?= $result['name'] ?>" name="name" class="form-control" id="validationCustom01" placeholder="Type something" required />
                                                            <div class="valid-tooltip">
                                                                Looks good!
                                                            </div>
                                                        </div>
                                                        <div class="mb-3 position-relative">
                                                            <label class="form-label" for="validationCustom01">Image</label>
                                                            <input type="file" class="form-control admin-inp" name="image">
                                                            <div class="valid-tooltip">
                                                                Looks good!
                                                            </div>
                                                        </div>

                                                        <div class="mb-3 position-relative">
                                                            <label class="form-label" for="validationCustom01">Price</label>
                                                            <input type="number" name="price" class="form-control" value="<?= $result['price'] ?>" id="validationCustom01" placeholder="Type something" required />
                                                            <div class="valid-tooltip">
                                                                Looks good!
                                                            </div>
                                                        </div>
                                                        <div class="mb-3 position-relative">
                                                            <label class="form-label" for="validationCustom01">Expires in</label>
                                                            <input type="date" name="expires_in" class="form-control" value="<?= $result['expires_in'] ?>" id="validationCustom01" placeholder="Type something" required />
                                                            <div class="valid-tooltip">
                                                                Looks good!
                                                            </div>
                                                        </div>
                                                        <div class="mb-3 position-relative">
                                                            <label class="form-label" for="validationCustom01">Offer Type</label>
                                                            <select name="type" class="form-select" required value="<?= $result['type'] ?>">
                                                            <option value="<?php echo $result['type'] ?>" class="d-none" selected><?php echo $result['type'] ?></option>
                                                                <!-- <option value="" selected>Choose type</option> -->
                                                                <option value="in_store"> in Store</option>
                                                                <option value="online">Online</option>
                                                            </select>
                                                        </div>
                                                        <div class="mb-3 position-relative">
                                                            <label class="form-label" for="validationCustom01">Select Category</label>
                                                            <select name="category_id" class="form-select" required value="<?= $result['category_id'] ?>">
                                                            <option value="<?php echo $result['category_id'] ?>" class="d-none"><?php echo $result['category_name'] ?></option>
                                                                <?php

                                                                $categories = "SELECT * FROM `category`";
                                                                $category_query = mysqli_query($connection, $categories) or die('users_error' . mysqli_error($connection));

                                                                while ($result_category = mysqli_fetch_array($category_query)) {


                                                                ?>
                                                                    <option value="<?php echo $result_category['id'] ?>"><?php echo $result_category['name'] ?></option>
                                                                <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                        <div class="mb-3 position-relative">
                                                            <label class="form-label" for="validationCustom01">Select Gender </label>
                                                            <select name="for_gender" class="form-select" required value="">
                                                                <option value="<?= $result['for_gender'] ?>" class="d-none" selected><?= $result['for_gender'] ?></option>
                                                                <option value="male">Male</option>
                                                                <option value="female">Female</option>
                                                            </select>
                                                        </div>
                                                        <div class="mb-3 position-relative">
                                                        <label class="form-label" for="validationCustom01">Description </label>

                                                            <textarea class="form-control" name="description" id="" cols="30" rows="10"><?= $result['description'] ?></textarea>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" name="update_offer" class="btn btn-primary">Update offer</button>
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




    <?php include('includes/scripts-tag.php') ?>

</body>

</html>