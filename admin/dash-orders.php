<?php
require_once('../database/connection.php');
if (!isset($_SESSION['admin_id'])){

    header("Location: index.php");
} 
include('functions/orders_function.php')
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
                                                    <th>Order ID</th>
                                                    <th>Order Value</th>
                                                    <th>Payment method </th>
                                                    <th>Status</th>
                                                    <th>Offer Code</th>
                                                    <th>Qr image</th>
                                                    <th>User ID</th>
                                                    <!-- <th>Offer ID</th> -->
                                                    <!-- <th>Accept Order</th> -->
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                $orders = "SELECT orders.*, users.name AS user_name FROM `orders` INNER JOIN users on users.id = orders.user_id WHERE status != 'cart'";
                                $order_query = mysqli_query($connection, $orders) or die('users_error'.mysqli_error($con));
                                while($result = mysqli_fetch_array($order_query)){
                                    if($result['status'] == 'accepted'){
                                        $status = "<span class='badge bg-success'>Accepted</span>";
                                    }elseif($result['status'] == 'rejected'){
                                        $status = "<span class='badge bg-danger'>Rejected</span>";
                                    }else{
                                        $status = "<span class='badge bg-warning'>submitted</span>";
                                    }
                                    if($result['code'] == ''){
                                        $code = "Waiting to accept";
                                    }else{
                                        $code = $result['code'];
                                    }
                                    if($result['qr_code'] == ''){
                                        $qr_code = "Waiting to accept";
                                    }else{
                                        $qr_code = $result['qr_code'];
                                    }
                                
                                ?>
                                <tr>
                                    <td scope="row"><?php echo $result['id'] ?></td>
                                    <td><?php echo $result['total_price'] ?></td>
                                    <td><?php echo $result['type_of_payment'] ?></td>
                                    <td><?php echo $status ?></td>
                                    <td><?php echo $code  ?></td>
                                    <td><?php echo $qr_code  ?></td>
                                    <td><?php echo $result['user_name'] ?></td>
                                    <td>
                                        <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#Show_items<?php echo $result['id'] ?>">Show</button> 
                                        <?php  if($result['status'] == 'submitted'){ ?>
                                            <form method="POST">
                                            <input type="hidden" name="id" value="<?= $result['id'] ?>">

                                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#accept_order<?php echo $result['id'] ?>">Accept order</button> 
                                        
                                        <button type="submit" name="reject_order" class="btn btn-danger" onclick="return confirm('Are you need to reject #<?php echo $result['id'] ?>');" >Reject</button>
                                    </form> 
                                    <?php } ?>                               
                                    </td>
                                </tr>
                                <div id="Show_items<?php echo $result['id'] ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="my-modal-title">Order #<?= $result['id'] ?></h5>
                                                <button class="close" data-bs-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body"> 
                                            <?php
                                                $select_order_stat = "SELECT order_details.* , offers.name, offers.price FROM `order_details` INNER JOIN offers ON order_details.offer_id = offers.id WHERE order_details.order_id = ".$result['id']."  ";
                                                $order_details_q = mysqli_query($connection , $select_order_stat);
                                                while ($result_details= mysqli_fetch_array($order_details_q))
                                                {
                                                    ?>
                                                    <div class="card">
                                                        <ul class="list-group list-group-flush">
                                                        <li class="list-group-item">Order details id:<?php echo $result_details['id'] ?></li>
                                                                <li class="list-group-item">offer name :<?php echo $result_details['name'] ?></li>
                                                                <li class="list-group-item">offer price: <?php echo $result_details['price'] ?></li>
                                                                </ul>
                                                            </div>
                                                        <?php
                                                    }
                                                    ?>
                                                    
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="accept_order<?php echo $result['id'] ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="my-modal-title">Order #<?= $result['id'] ?></h5>
                                                <button class="close" data-bs-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body"> 
                                            <form action="" method="post" enctype="multipart/form-data">
                                                        <input type="hidden" name="id" value="<?= $result['id'] ?>">
                                                        <div class="mb-3 position-relative">
                                                            <label class="form-label" for="validationCustom01">Upload qr image</label>
                                                            <input required type="file" class="form-control admin-inp" name="qr_image">
                                                            
                                                        </div>
                                                        <div class="mb-0">
                                                        <div>
                                                            <button name="accept_order" type="submit" class="btn btn-pink waves-effect waves-light">
                                                                Accept order
                                                            </button>
                                                        </div>
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

    <?php include('includes/scripts-tag.php') ?>


</body>

</html>