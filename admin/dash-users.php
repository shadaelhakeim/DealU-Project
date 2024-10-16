<?php
require_once('../database/connection.php');
if (!isset($_SESSION['admin_id'])){

    header("Location: index.php");
} 
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
                                    <h4 class="card-title">Users</h4>
                                   
                                    <div class="table-responsive">
                                        <table class="table mb-0">

                                            <thead class="thead-light">
                                                <tr>
                                                    <th>Client ID</th>
                                                    <th>Client Name</th>
                                                    <th>Client email</th>
                                                    <th>Client Address</th>
                                                    <th>Client gender</th>
                                                    <th>Client Phone</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php 

                                            $users = "SELECT * FROM `users`";
                                            $user_query = mysqli_query($connection, $users) or die('users_error'.mysqli_error($connection));

                                            while($result = mysqli_fetch_array($user_query)){


                                            ?>
                                                <tr>
                                                    <td><?= $result['id'] ?></td>
                                                    <td><?= $result['name'] ?></td>
                                                    <td><?= $result['email'] ?></td>
                                                    <td><?= $result['address'] ?></td>
                                                    <td><?= $result['gender'] ?></td>
                                                    <td><?= $result['phone'] ?></td>
                                                </tr>
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

    <?php include('includes/scripts-tag.php') ?>


</body>

</html>