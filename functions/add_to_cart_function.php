<?php
if (isset($_GET['offer_id'])) {
  $sql_select = "SELECT * FROM `offers` where `id`=" . $_GET['offer_id'] . " ";
  $select_query = mysqli_query($connection, $sql_select) or die('ERROR in details' . mysqli_error($connection));
  if (!$select_query) {
    die('ERROR in details' . mysqli_error($connection));
  } else {
    $result_details = mysqli_fetch_array($select_query);
  }
}
if (isset($_POST['add_to_cart'])) {
  $offer_id = $_GET['offer_id'];

  $select_orders = "SELECT * from `orders` where `user_id`=" . $_SESSION['user_id'] . " AND `status`='cart'";
  $orders_query = mysqli_query($connection, $select_orders) or die('Error in orders' . mysqli_error($connection));
  $results_of_orders = mysqli_fetch_array($orders_query);
  if (mysqli_num_rows($orders_query) > 0) {
    $select_item_of_orders = "SELECT * FROM `order_details` WHERE `offer_id` = $offer_id AND `order_id`=" . $results_of_orders['id'] . "";
    $result_of_items = mysqli_query($connection, $select_item_of_orders);

    if (mysqli_num_rows($result_of_items) > 0) {

      $already_added_item = "You can add item more than 1 time";
    } else {
      // Product does not exist in the cart, insert a new record
      $insert_item = "INSERT INTO `order_details`( `order_id`, `offer_id`) VALUES (" . $results_of_orders['id'] . ",'$offer_id')";
      if (mysqli_query($connection, $insert_item)) {
        $success = "Offer inserted in cart successfully.";
      } else {
        die("Error inserting records: " . mysqli_error($connection));
      }
    }
  } else {
    $insert_order = "INSERT INTO `orders`(`status`, `user_id`) VALUES ('cart'," . $_SESSION['user_id'] . ")";

    if (mysqli_query($connection, $insert_order)) {
      // Get the ID of the first insert
      //
      $order_id = mysqli_insert_id($connection);
      // Second insert query that uses the ID of the first insert
      $insert_item = "INSERT INTO `order_details`( `order_id`, `offer_id`) VALUES ('$order_id','$offer_id')";
      if (mysqli_query($connection, $insert_item)) {
        $success = "offer inserted inserted successfully.";
      } else {
        die("Error inserting records: " . mysqli_error($connection));
      }
    }
  }
}
if(isset($_POST['submit_review'])){
  $name = mysqli_real_escape_string($connection,$_POST['name']);
  $email = $_POST['email'];
  $message = mysqli_real_escape_string($connection,$_POST['message']);
  $rate = $_POST['rate'];
  $insert_stat = "INSERT INTO `reviews`( `name`, `email`,`rate`, `message`,`user_id`, `offer_id`) VALUES ('$name','$email','$rate','$message',".$_SESSION['user_id'].",".$_GET['offer_id'].") ";
  $review_query  = mysqli_query($connection, $insert_stat) or die ('ERROR in regf'.mysqli_error($connection));
  if(!$review_query){
      die ('ERROR in review'.mysqli_error($connection));
  }else{
      $success = "Review submitted successfuly";
  }
}

if(!isset($_SESSION['user_id'])){
  if(isset($_GET['user_id'])){

    $select_share_links= "SELECT * from `share_link` WHERE `offer_id`=".$_GET['offer_id']." AND `user_id`=".$_GET['user_id']."";
    $share_links_select_query = mysqli_query($connection, $select_share_links) or die('Error in links'.mysqli_error($connection));
    if(mysqli_num_rows($share_links_select_query) > 0){
      $result_in_share = mysqli_fetch_array($share_links_select_query);
      $increment_count = $result_in_share['count'] + 1;
      $increment_count_update_statement= "UPDATE `share_link` SET `count`='$increment_count' WHERE `id`=".$result_in_share['id']." ";
      $increment_count_update_query = mysqli_query($connection, $increment_count_update_statement) or die('Error in links'.mysqli_error($connection));
      if(!$increment_count_update_query){
        die('Error in links'.mysqli_error($connection));
      }
  
    }else{
      $insert_share_links= "INSERT INTO `share_link`(`user_id`, `offer_id`, `count`) VALUES (".$_GET['user_id'].", ".$_GET['offer_id']." , 1)";
      $insert_share_links_query = mysqli_query($connection, $insert_share_links) or die('Error in links'.mysqli_error($connection));
      if(!$insert_share_links_query){
        die('Error in links'.mysqli_error($connection));
      }
    }
  }
}
