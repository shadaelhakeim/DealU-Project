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
    <?php
    include('includes/head-tags.php');
    ?>
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

        <?php
        include('includes/header.php');
        ?>

        <!-- ========== Left Sidebar Start ========== -->
        <?php
include('includes/sidebar.php');
?>
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

                                    <h4 class="card-title">Add Offer </h4>

                                    <form class="row needs-validation" method="POST" enctype="multipart/form-data">
                                        <div class="mb-3 position-relative">
                                            <label class="form-label" for="validationCustom01">Name</label>
                                            <input type="text" name="name" class="form-control" id="validationCustom01" placeholder="Type something" required />
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
                                                <input type="number" name="price" class="form-control" id="validationCustom01" placeholder="Type something" required />
                                                <div class="valid-tooltip">
                                                    Looks good!
                                                </div>
                                            </div>
                                            <div class="mb-3 position-relative">
                                                <label class="form-label" for="validationCustom01">Expires in</label>
                                                <input type="date" name="expires_in" class="form-control" id="validationCustom01" placeholder="Type something" required />
                                                <div class="valid-tooltip">
                                                    Looks good!
                                                </div>
                                            </div>
                                            <div class="mb-3 position-relative">
                                                <label class="form-label" for="validationCustom01">Offer Type</label>
                                                <select name="type" class="form-select" required>
                                                    <option value="">Choose type</option>
                                                    <option value="in_store"> in Store</option>
                                                    <option value="online">Online</option>
                                                </select>
                                            </div>
                                            <div class="mb-3 position-relative">
                                                <label class="form-label" for="validationCustom01">Select Category</label>
                                                <select name="category_id" class="form-select" required>
                                                    <option>Choose category</option>
                                                    <?php 

                                                    $categories = "SELECT * FROM `category`";
                                                    $category_query = mysqli_query($connection, $categories) or die('users_error'.mysqli_error($connection));

                                                    while($result = mysqli_fetch_array($category_query)){


                                                    ?>
                                                    <option value="<?php echo $result['id'] ?>"><?php echo $result['name'] ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="mb-3 position-relative">
                                                <label class="form-label" for="validationCustom01">Select Gender </label>
                                                <select name="for_gender" class="form-select" required>
                                                    <option value="">Choose gender</option>
                                                    <option value="male">Male</option>
                                                    <option value="female">Female</option>
                                                </select>
                                            </div>
                                            <div class="mb-3 position-relative">
                                                <label class="form-label" for="validationCustom01">Description</label>
                                                <textarea type="text"  name="description" class="form-control" id="validationCustom01" placeholder="Type something" required></textarea>
                                                <div class="valid-tooltip">
                                                    Looks good!
                                                </div>
                                            </div>
                                            <div class="mb-0">
                                                <div>
                                                    <button name="add_offer" type="submit" class="btn btn-pink waves-effect waves-light">
                                                        Add Offer
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

            <?php include('includes/footer.php'); ?>
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->


    </div>
    <!-- /Right-bar -->

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    <?php
include('includes/scripts-tag.php');
?>

</body>

</html>