<?php
require_once('../database/connection.php');
if (!isset($_SESSION['admin_id'])){

    header("Location: index.php");
} 
include('functions/reservation_function.php')
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
                                <?php if (isset($success)) { ?>

                                <div class="alert alert-success mt-2" role="alert">
                                    <h4 class="alert-heading"><?= $success ?></h4>

                                </div>
                                <?php } ?>

                                    <div class="table-responsive">
                                        <table class="table mb-0">

                                            <thead class="thead-light">
                                                <tr>
                                                    <th> ID</th>
                                                    <th>Subscription Value</th>
                                                    <th>Payment method </th>
                                                    <th>Status</th>
                                                    <th>Username</th>
                                                    <!-- <th>Offer ID</th> -->
                                                    <!-- <th>Accept Order</th> -->
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                $orders = "SELECT plan_reservation.*, users.name AS user_name , users.email FROM `plan_reservation` INNER JOIN users on users.id = plan_reservation.user_id";
                                $order_query = mysqli_query($connection, $orders) or die('users_error'.mysqli_error($con));
                                while($result = mysqli_fetch_array($order_query)){
                                    if($result['status'] == 0){
                                        $status = "<span class='badge bg-warning'>Pending</span>";
                                    }else{
                                        $status = "<span class='badge bg-success'>Accepted</span>";
                                    }
                                
                                ?>
                                <tr>
                                    <td scope="row"><?php echo $result['id'] ?></td>
                                    <td>3%</td>
                                    <td><?php echo $result['type_of_payment'] ?></td>
                                    <td><?php echo $status ?></td>
                                    
                                    <td><?php echo $result['user_name'] ?></td>
                                    <td>
                                        <?php  if($result['status'] == 0){ ?>
                                            <form method="POST">
                                            <input type="hidden" name="id" value="<?= $result['id'] ?>">
                                            <input type="hidden" name="name" value="<?= $result['user_name'] ?>">
                                            <input type="hidden" name="user_id" value="<?= $result['user_id'] ?>">
                                            <input type="hidden" name="email" value="<?= $result['email'] ?>">

                                        
                                        <button type="submit" name="accept_reserve" class="btn btn-success" onclick="return confirm('Are you need to accept reservation #<?php echo $result['id'] ?>');" >Accept</button>
                                    </form> 
                                    <?php } ?>                               
                                    </td>
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