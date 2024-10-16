<?php require_once('database/connection.php') ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('includes/head-tags.php') ?>

    <link rel="stylesheet" href="cart.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        /*start header*/
        .nav {
            height: 50px;
            width: 100%;
            background-image: linear-gradient(90deg, #74EBD5 0%, #9FACE6 100%);
            position: relative;
            opacity: 0.9;
            font-family: 'Times New Roman', Times, serif !important;
            display: flex;
            flex-direction: row;
            justify-content: space-between;
        }

        .nav>.nav-header {
            display: inline;
        }

        .nav>.nav-header>.nav-title {
            display: inline-block;
            font-size: 22px;
            color: #fff;

            margin-left: 15px;
        }

        .nav>.nav-btn {
            display: none;
        }

        .nav>.nav-links {
            display: inline;
            float: right;
            font-size: 17px;
            margin-top: 5px;
            margin-top: 5px;

            margin-left: 260px;
        }

        .nav>.nav-links>a {
            display: inline-block;
            padding: 7px 8px 3px 10px;
            text-decoration: none;
            color: #fff;
            margin-right: 20px;
            border-radius: 20px;
            margin-top: 5px;
            transition: all 0.5s ease;
            border-bottom: none !important;
        }

        .nav>.nav-links>a:hover {
            background-color: rgba(0, 0, 0, 0.3);
            border: 1px solid rgba(0, 0, 0, 0.452);
        }

        .nav>#nav-check {
            display: none;
        }

        @media (max-width:800px) {
            .nav>.nav-btn {
                display: inline-block;
                position: absolute;
                right: 0px;
                top: 0px;
            }

            .nav>.nav-btn>label {
                display: inline-block;
                width: 50px;
                height: 50px;
                padding: 13px;
            }

            .nav>.nav-btn>label:hover,
            .nav #nav-check:checked~.nav-btn>label {
                background-color: rgba(0, 0, 0, 0.3);
                padding: 10px;
            }

            .nav>.nav-btn>label>span {
                display: block;
                width: 25px;
                height: 10px;
                border-top: 2px solid #eee;
            }

            .nav>.nav-links {
                position: absolute;
                display: block;
                width: 100%;
                background-color: #333;
                height: 0px;
                transition: all 0.3s ease-in;
                overflow-y: hidden;
                top: 50px;
                left: 0px;
            }

            .nav>.nav-links>a {
                display: block;
                width: 100%;
            }

            .nav>#nav-check:not(:checked)~.nav-links {
                height: 0px;
            }

            .nav>#nav-check:checked~.nav-links {
                height: calc(100vh - 50px);
                overflow-y: auto;
            }
        }

        /*end header*/
        .cart-content {
            padding: 100px 0;
        }

        .cart h1 {
            text-align: center;
            padding: 5px 0;
            font-size: 30px;
            font-weight: 700;
            color: black;
            font-family: sans-serif;
        }

        .cart .table {
            margin-bottom: 30px;
            border-bottom: 1px solid #fff;
        }

        .cart .table thead {
            background: #95bce2d1;
        }

        .cart .table thead tr th {
            border-top: 0px;
            font-size: 16px;
            font-weight: bold;
            border-bottom: 0px;
        }

        .cart .table thead tr td {
            padding-top: 30px;
            padding-bottom: 30px;
            vertical-align: middle;
            align-self: center;
        }

        .cart .table tbody tr td .d-flex {
            display: table-cell;
            padding-right: 1.8rem;
            margin-bottom: 0;
            vertical-align: middle;
        }

        .cart .table tbody tr td .d-flex img {
            border: 1px solid #ccc;
            border-radius: 3px;
            width: 100px;
            height: 100px;
        }

        .cart .table tbody tr td .des {
            vertical-align: middle;
            align-self: center;
        }

        .cart .table tbody tr td .des p {
            margin-bottom: 0px;
        }

        .cart .table tbody tr td .des .removeBtn {
            background-color: transparent;
            border: none;
            cursor: pointer;
            font-size: small;
            color: #ff523b;
        }

        .cart .table tbody tr td h6 {
            font-size: 16px;
            color: #000;
            margin-bottom: 0px;
        }

        .checkout ul {
            border: 2px solid #ebebeb;
            background: #f3f3f3;
            padding-left: 25px;
            padding-right: 25px;
            padding-top: 16px;
            padding-bottom: 20px;
        }

        .checkout ul li {
            list-style: none;
            font-size: 16px;
            font-weight: bold;
            color: #252525;
            text-transform: uppercase;
            overflow: hidden;
        }

        .checkout ul li.subtotal {
            font-weight: bold;
            text-transform: capitalize;
            border-bottom: 1px solid #fff;
            padding-bottom: 14px;
        }

        .checkout ul li.subtotal span {
            font-weight: bold;
        }

        .checkout ul li.cart-total {
            padding-top: 10px
        }

        .checkout ul li.cart-total span {
            color: blue;
        }

        .checkout ul li span {
            float: right;
        }

        .checkout .proceed-btn {
            font-size: 15px;
            font-weight: bold;
            color: #fff;
            background: linear-gradient(90deg, #74EBD5 0%, #9FACE6 100%);
            text-transform: uppercase;
            padding: 15px 25px 14px 25px;
            display: block;
            text-align: center;
            text-decoration: none;
        }

        /* Footer main */
        .ft-main {
            padding: 1.25rem 1.875rem;
            display: flex;
            flex-wrap: wrap;
            border-top: 1px solid #80808057;
            margin-top: 25px
        }

        @media only screen and (min-width: 29.8125rem

            /* 477px */
        ) {
            .ft-main {
                justify-content: space-evenly;
            }
        }

        @media only screen and (min-width: 77.5rem

            /* 1240px */
        ) {
            .ft-main {
                justify-content: space-evenly;
            }
        }

        .ft-main-item {
            padding: 1.25rem;
            min-width: 12.5rem;
        }

        .ft-main-item ul {
            list-style: none;
        }

        .ft-main-item ul li a {
            color: gray;
        }


        /* Footer main | Newsletter form */
        form {
            display: flex;
            flex-wrap: wrap;
        }

        input[type="email"] {
            border: 0;
            padding: 0.625rem;
            margin-top: 0.3125rem;
            border: 1px solid #8080804d;
        }

        input[type="submit"] {
            background-color: #92bee1;
            color: #fff;
            cursor: pointer;
            border: 0;
            padding: 0.625rem 0.9375rem;
            margin-top: 0.3125rem;
        }

        .ft-title {
            font-size: 21px;
        }

        /* Footer social */

        .ft-social-list {
            display: flex;
            justify-content: center;
            border-top: 1px #77777785 solid;
            padding-top: 1.25rem;
            list-style: none;
        }

        .ft-social-list li {
            margin: 0.5rem;
            font-size: 1.25rem;
        }

        /* Footer legal */
        .ft-legal {
            padding: 0.9375rem 1.875rem;
            background-color: #333;
        }

        .ft-legal-list {
            width: 100%;
            display: flex;
            flex-wrap: wrap;
            list-style: none;
        }

        .ft-legal-list li {
            margin: 0.125rem 0.625rem;
            white-space: nowrap;
        }

        .ft-legal-list li {
            color: white;
            ;
        }

        /* one before the last child */
        .ft-legal-list li:nth-last-child(2) {
            flex: 1;
        }

        .nav-title img {
            width: 132px;
            margin-top: -39px;
            height: 99px;
        }
    </style>
</head>

<body>
    <!--stat header-->
    <?php include('includes/header.php') ?>


    <!--End header-->
    <!--Cart Section-->
    <section class="cart-content" id="cart-content">
        <div class="container">
            <div class="cart">
                <h1>Profile</h1>
                <div class="table-responsive" style="    border-bottom: 1px solid gainsboro;">
                    <table class="table">
                        <thead class="thead">
                            <tr>
                                <th scope="col" class="text-white">ID</th>
                                <th scope="col" class="text-white">Status</th>
                                <th scope="col" class="text-white">Discount</th>
                                <th scope="col" class="text-white">Qr code</th>
                                <th scope="col" class="text-white">Code</th>
                                <th scope="col" class="text-white">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $orders_stat = "SELECT orders.* , coupons.percentage FROM `orders` LEFT JOIN coupons ON coupons.id = orders.coupon_id WHERE `status` != 'cart' AND `user_id`=".$_SESSION['user_id']." ORDER by id DESC ";
                                $orders_query = mysqli_query($connection, $orders_stat) or die('Error in cat' . mysqli_error($connection));
                        
                                while ($result = mysqli_fetch_array($orders_query)) {
                                    if($result['status'] == 'accepted'){
                                        $status = "<span class='badge bg-success'>Accepted</span>";
                                    }elseif($result['status'] == 'rejected'){
                                        $status = "<span class='badge bg-danger'>Rejected</span>";
                                    }else{
                                        $status = "<span class='badge bg-warning'>submitted</span>";
                                    }
                                    if($result['percentage'] == null){
                                        $percentage = "NO discount";
                                    }else{
                                        $percentage = $result['percentage'].'%';

                                    }
                                    if($result['code'] == ''){
                                        $code = "Waiting for approve";
                                    }else{
                                        $code = $result['code'] ;

                                    }
                                    if($result['qr_code'] == ''){
                                        $qr_code = "Waiting for approve";
                                    }else{
                                        $qr_code = "<img height='150px' width='150px' src='images/".$result['qr_code']."'>";
                                    }
                        
                            ?>
                            <tr>
                                <td>
                                    #<?= $result['id'] ?>
                                </td>
                                <td>
                                    <?= $status ?>
                                </td>
                                <td>
                                    <h6><?= $percentage ?></h6>
                                </td>
                                <td>
                                    <?= $code ?>

                                </td>
                                <td>
                                    <?= $qr_code ?>


                                </td>
                                <td>
                                    <h6>EGP <?= $result['total_price'] ?></h6>
                                </td>
                            </tr>
                            <?php
                                }
                                ?>
                            <!-- <tr>
                                <td>
                                    <div class="d-flex">
                                        <img src="images\Buffalo 2 Sandwich Offer.jpg" alt="">
                                    </div>
                                </td>
                                <td>
                                    <div class="des">
                                        <p>2 Sandwiches + 2 Fries + 2 Cola</p>
                                        <button class="removeBtn">Remove
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </div>
                                </td>
                                <td>
                                    <h6>EGP 265</h6>
                                </td>
                                <td>
                                    <h6>EGP 265</h6>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex">
                                        <img src="images\Buffalo 2 Sandwich Offer.jpg" alt="">
                                    </div>
                                </td>
                                <td>
                                    <div class="des">
                                        <p>2 Sandwiches + 2 Fries + 2 Cola</p>
                                        <button class="removeBtn">Remove
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </div>
                                </td>
                                <td>
                                    <h6>EGP 265</h6>
                                </td>
                                <td>
                                    <h6>EGP 265</h6>
                                </td>
                            </tr> -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <!--Cart Section-->

    <!--start footer-->
    <?php include('includes/footer.php') ?>
    <!--end footer-->
</body>

</html>