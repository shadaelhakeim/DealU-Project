<?php 
require_once('database/connection.php');
include('functions/cart_function.php');
include('includes/head-tags.php')
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Deal U</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="cart.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
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
    .content{
  padding: 10px;
}
.info{
  display: flex;
    align-items: baseline;
}
.info .d-inline-block{
  color: gray;
  font-family: serif;
  font-weight: 200;
  font-size: 18px;
}
.info span{
  color: gray;
    font-family: unset;
    font-weight: 100;
    font-size: 16px;
}
  </style>
</head>

<body>
  <!--stat header-->
    <?php include('includes/header.php') ?>

  <!--End header-->
  <!--Cart Section-->
  <?php if(isset($submit_checkout)){ ?>
            <div class="alert alert-success" role="alert">
              <strong><?= $submit_checkout ?></strong>
            </div>
            <?php } ?>
            <?php if(isset($_SESSION['user_id'])) { 
          $select_orders = "SELECT * from `orders` where `user_id`=".$_SESSION['user_id']." AND `status`='cart'";
          $orders_query = mysqli_query($connection, $select_orders) or die('Error in orders'.mysqli_error($connection));
          // if(mysqli_num_rows( $orders_query) > 0){
          // }
          $orders = mysqli_fetch_array($orders_query);
          if(mysqli_num_rows($orders_query) >  0){
          
          ?>
          <section class="cart-content" id="cart-content">
            <div class="container">
              <div class="cart">
              <?php if(isset($remove)){ ?>
            <div class="alert alert-danger" role="alert">
              <strong><?= $remove ?></strong>
            </div>
            <?php } ?>

                <h1>Cart</h1>
                <div class="table-responsive" style="    border-bottom: 1px solid gainsboro;">
                  <table class="table">
                    <thead class="thead">
                      <tr>
                        <th scope="col" class="text-white">Image</th>
                        <th scope="col" class="text-white">Offer</th>
                        <th scope="col" class="text-white">Price</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                $order_items_stat = "SELECT order_details.id AS order_details_id, order_details.offer_id , offers.name , offers.image ,offers.price FROM `order_details` INNER JOIN offers ON order_details.offer_id = offers.id WHERE order_details.order_id = ".$orders['id']."";
                $order_items_query = mysqli_query($connection, $order_items_stat) or die ('Error in cat'. mysqli_error($connection));
                  
                  $share_link_state = "SELECT * from `share_link` WHERE `user_id`=".$_SESSION['user_id']."";
                  $share_link_state_query = mysqli_query($connection, $share_link_state) or die('Error in coupons'.mysqli_error($connection));
                  $share_link_array = mysqli_fetch_array($share_link_state_query);
                
                if($orders['coupon_id'] != null || $orders['coupon_id'] != 0){

                  $select_offers_state = "SELECT * from `coupons` WHERE `id`=".$orders['coupon_id']."";
                  $select_offers_q = mysqli_query($connection, $select_offers_state) or die('Error in coupons'.mysqli_error($connection));
                  $coupon_array = mysqli_fetch_array($select_offers_q);
                  
                }
                
              
                // if(mysqli_num_rows($order_items_query) % 10 == 0){
                //   $discount = 0.1;
                // }
                // if(mysqli_num_rows($order_items_query) % 10 == 0){
                //   echo "discount";
                //   $discount = 0.1;
                //   $totalBeforeDiscount +=  $result['quantity'] *  $result['pprice'];
                //   $total =  $totalBeforeDiscount - ($totalBeforeDiscount * $discount);

                // }else{

                //   $total +=  $result['quantity'] *  $result['pprice'];
                // }
                
                $total = 0;
                // echo $orders['offer_id'];
                while($result = mysqli_fetch_array($order_items_query)){
                  if(mysqli_num_rows($share_link_state_query) > 0){
                    if($share_link_array['count'] % 10000 == 0){
                      $total = 0;
                      
                    }else{
                      $total +=  $result['price'];
                    }
                  }else{
                    $total +=  $result['price'];
                  }
                  
                  if(mysqli_num_rows($order_items_query) > 0){
                  ?>
                      <tr>
                        <td>
                          <div class="d-flex">
                            <img src="images\<?= $result['image'] ?>" alt="">
                          </div>
                        </td>
                        <td>
                          <div class="des">
                            <p><?= $result['name'] ?></p>
                            <form method="post">
                              <input type="hidden" name="order_details_id" value="<?= $result['order_details_id'] ?>">
                              <button class="removeBtn" type="submit" name="delete_offer_cart">Remove
                                <i class="fas fa-trash-alt"></i>
                              </button>
                            </form>
                          </div>
                        </td>
                        <td>
                          <h6>EGP <?= $result['price'] ?></h6>
                        </td>
                      </tr>
                      <?php
                  } 
                  else
                  {
                  ?>
                  <h2>No data in cart</h2>
                  <?php
                  } 
                } 
            ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </section>
          <!--Cart Section-->

          <div class="col-lg-4 offset-lg-4">
            <?php if(isset($notfound)){ ?>
            <div class="alert alert-danger" role="alert">
              <strong><?= $notfound ?></strong>
            </div>
            <?php } ?>
            <?php if(isset($submit_coupon)){ ?>
            <div class="alert alert-success" role="alert">
              <strong><?= $submit_coupon ?></strong>
            </div>
            <?php } ?>
            <div class="checkout">
              <ul>
                <?php if($total > 1){ ?>
                <?php if($orders['coupon_id'] == 0 || $orders['coupon_id'] == null){ ?>
                <li>
                  <form method="post" >
                    <input type="hidden" name="order_id" value="<?= $orders['id'] ?>">
                    <div  style="display: flex; width: 100%;">
                      <input type="text" class="form-control" name="coupon_code">
                      <button class="btn btn-success" style="height: 37px;
    margin-left: 2px;
    font-size: 14px;
    width: 157px;" type="submit" name="apply_coupon">Apply coupon</button>
                  </div>
                  </form>
                </li>
                <?php }} ?>
                <li class="subtotal">subtotal
                  <span>EGP <?= $total ?></span>
                </li>
                
                <?php if($orders['coupon_id'] != 0 || $orders['coupon_id'] != null){ ?>

                <li class="subtotal text-success">Discount
                  <span>% <?= $coupon_array['percentage'] ?></span>
                </li>
                <li class="cart-total">Total
                  <span>EGP <?= $total - ($total * ($coupon_array['percentage'] / 100 )) ?></span>
                </li>
                <?php }else{ ?>
                  <li class="cart-total">Total
                    <span>EGP <?= $total ?></span>
                  </li>
                <?php } ?>
              </ul>
              <form action="" method="post">
                <select name="type_of_payment" class="form-control mb-sm-2" id="type_of_payment" required> 
                  <option value="">Choose payment method</option>
                  <option value="cash">Cash</option> 
                  <option value="visa">Visa</option> 
                </select>  
                <div style="display: none; width:100%" id="visa_div"> 
                  <input type="password" name="visa" maxlength="14" minlength="14" class="form-control my-3" placeholder="please type your visa number"> 
                </div> 
                <input type="hidden" name="order_id" value="<?= $orders['id'] ?>">
                
                <?php if($orders['coupon_id'] != 0 || $orders['coupon_id'] != null){ ?>

                <input type="hidden" name="total_price" value="<?= $total - ($total * ($coupon_array['percentage'] / 100 )) ?>">
                <?php }else{ ?>

                <input type="hidden" name="total_price" value="<?= $total ?>">
                <?php } ?>

                <button  onclick="return confirm('Are you want to checkout?')" type="submit" name="checkout" href="#" class="proceed-btn w-100" style="border: none;
    border-radius: 4px;" >Proceed to Checkout</button>
              </form>
            </div>
          </div>
          <?php }else{ ?>
          <h2> No items in your cart </h2>
          <a href="offers.php" class="btn btn-primary">Explore offers</a>

          <?php }
      } 
      else
      { ?>
        <h2>Your are not logined to view cart Login first</h2>
        <a href="login.php" class="btn btn-primary">Login here</a>
      <?php  
      } ?> 
  <!--start footer-->
      <?php include('includes/footer.php') ?>
  <!--end footer-->
  <script>
    
    $('#type_of_payment').on('change',function(){ 
      let option = $(this).val(); 
      if(option === 'cash'){ 
        $('#visa_div').hide(); 
        $('#visa_div input').removeAttr('required'); 
      }else{ 
        $('#visa_div input').attr('required','required'); 
        $('#visa_div').show(); 

      } 
    })
  </script>
</body>

</html>