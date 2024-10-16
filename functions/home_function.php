<?php

if(isset($_POST['subscribe'])){
  $email = $_POST['email'];

  $insert_subscription_statement = "INSERT INTO `subscribtion`(`email`) VALUES ('$email')";
  $subsc_query  = mysqli_query($connection, $insert_subscription_statement) or die ('ERROR in regf'.mysqli_error($connection));
  if(!$subsc_query){
      die ('ERROR in subscription'.mysqli_error($connection));
  }else{
      $message = "subscription sent successfully";
  }
}
if(isset($_POST['submit_plan'])){
  $type_of_payment = $_POST['type_of_payment'];
  $select_user_plan = "SELECT * FROM `plan_reservation` WHERE user_id = ".$_SESSION['user_id']."";
  $result_plan = mysqli_query($connection, $select_user_plan) or die('Error in coupon'.mysqli_error($connection));
  if(mysqli_num_rows($result_plan) > 0) {
      $found= "You already submit a plan";
  }else{
  if($type_of_payment == 'cash'){
      $insert_plan = "INSERT INTO `plan_reservation` (`user_id`, `plan_id`, `status`, `type_of_payment`) VALUES (".$_SESSION['user_id'].",'1',0,'$type_of_payment') ";
  }else{
      $visa = password_hash($_POST['visa'] , PASSWORD_DEFAULT);

      $insert_plan = "INSERT INTO `plan_reservation`( `user_id`, `plan_id`, `status`, `type_of_payment`,`visa`) VALUES (".$_SESSION['user_id'].",'1',0,'$type_of_payment','$visa')";
  }
  $plan_q = mysqli_query($connection, $insert_plan) or die('Error in coupon'.mysqli_error($connection));
  if(!$plan_q){
      die('Error in checkout'.mysqli_error($connection));
  }else{
      $success = "plan reserved successfully";
  }
}
}
?>