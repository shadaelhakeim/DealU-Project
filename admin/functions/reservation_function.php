<?php 
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomCode = '';
    for ($i = 0; $i < 10; $i++) {
        $randomCode .= $characters[random_int(0, $charactersLength - 1)];
    }
if(isset($_POST['accept_reserve'])){
    $id = $_POST['id'];
    $user_id = $_POST['user_id'];
    $name = $_POST['name'];
    $email = $_POST['email'];

    $update = "UPDATE `plan_reservation` SET  `status` = 1 WHERE `id`='$id'";
    if (!mysqli_query($connection, $update)) {
        die('Error:' . mysqli_error($connection));
    } else {
        $insert_coupon = "INSERT INTO `coupons` (`code`,`percentage`,`image`) Values ('$randomCode','3','coupon.png')";
        $coupon_query = mysqli_query($connection, $insert_coupon);
        if(!$coupon_query){
            die('Error in accept'.mysqli_error($connection));
        }else{
            $success = "Plan accepted and coupon code has sent";
            $to      = "$email";
            $subject = 'The acceptance of plan for '."$name";
            $message = 'Hello this dealu'."\n".'We have accepted your reservation for the plan and here is the coupon code #'."$randomCode".'';
            $headers = 'From: johnmaher.bonder@gmail.com';
        
            mail($to, $subject, $message, $headers);
        }
    }
}