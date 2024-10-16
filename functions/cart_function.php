
<?php
if(isset($_POST['apply_coupon'])){
    $coupon_code = $_POST['coupon_code'];
    $order_id = $_POST['order_id'];

    $select_coupon_statement = "SELECT id FROM `coupons` WHERE code = '$coupon_code'";
    $result_coupon = mysqli_query($connection, $select_coupon_statement) or die('Error in coupon'.mysqli_error($connection));
    if(mysqli_num_rows($result_coupon) == 0) {
        $notfound= "No coupon with this code";
    }else{
        // Coupon code exists
        $row = mysqli_fetch_array($result_coupon);
        $couponId = $row['id'];

        // Insert the coupon ID into another table (e.g., order table)
        // Assuming you have an order ID
        $insertQuery = "UPDATE orders SET coupon_id = $couponId WHERE id = $order_id";
        $submit_coupon_q = mysqli_query($connection, $insertQuery) or die('Error in coupon'.mysqli_error($connection));
        if(!$submit_coupon_q){
            die('Error in coupon'.mysqli_error($connection));
        }else{
            $submit_coupon = "Coupon applied succssfully";
        }
    }
}
if(isset($_POST['delete_offer_cart'])){
    $order_details_id = $_POST['order_details_id'];

    $remove_offer_statement="DELETE FROM `order_details` WHERE `id`='$order_details_id'";

    $delete_query =mysqli_query($connection, $remove_offer_statement) or die('Error in delete'.mysqli_error($connection));
    if(!$delete_query){
        die('Error in delete'.mysqli_error($connection));
    }else{
        $remove = "Your offer is removed";
    }

}
if(isset($_POST['checkout'])){
    $order_id = $_POST['order_id'];
    $total_price = $_POST['total_price'];
    $type_of_payment = $_POST['type_of_payment'];
    if($type_of_payment == 'cash'){
        $submit_checkout_statement = "UPDATE orders SET `status`='submitted' , `total_price`= '$total_price' , `type_of_payment`='$type_of_payment' WHERE id = $order_id";
    }else{
        $visa = password_hash($_POST['visa'] , PASSWORD_DEFAULT);

        $submit_checkout_statement = "UPDATE orders SET `status`='submitted' , `total_price`= '$total_price' , `type_of_payment`='$type_of_payment' , `payment`='$visa' WHERE id = $order_id";
    }
    // Assuming you have an order ID
    $submit_checkout_q = mysqli_query($connection, $submit_checkout_statement) or die('Error in coupon'.mysqli_error($connection));
    if(!$submit_checkout_q){
        die('Error in checkout'.mysqli_error($connection));
    }else{
        $submit_checkout = "Order has submitted successfully waiting for admin approve";
    }
}