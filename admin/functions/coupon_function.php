<?php

if(isset($_POST['add_coupon'])){
    $code = $_POST['code'];
    $percentage = $_POST['percentage'];
    $select_names = "SELECT * from `coupons` where `code`='$code' ";
    $select_names_q = mysqli_query($connection, $select_names);
    $image_name = time() . '-' . $_FILES['image']['name'];
    $image_dirction = '../images/';
    $image_target = $image_dirction . basename($image_name);
    move_uploaded_file($_FILES['image']['tmp_name'] ,$image_target );
    if(mysqli_num_rows($select_names_q) > 0){
        $error = "Coupon already existed";
    }
    elseif($percentage < 0 || $percentage > 100){
        $error = "Coupon must be from 0 to 100 only";

    }
    else{

        $insert_coupon = "INSERT INTO `coupons` (`code`,`percentage`,`image`) Values ('$code','$percentage','$image_name') ";
        $category_query = mysqli_query($connection, $insert_coupon) or die('Error in insert'.mysqli_error($connection));
    
        if(!$category_query){
            die('Error in insert'.mysqli_error($connection));
        }else{
            header('location: dash-coupon.php');
            $_SESSION['success'] = "You coupon inserted successfully";
        }
    }

}
if(isset($_POST['delete_coupon'])){
    $id = $_POST['c_id'];

    $delete_coupon="DELETE FROM `category` WHERE `id`='$id'";

    $delete_query =mysqli_query($connection, $delete_coupon) or die('Error in delete'.mysqli_error($connection));
    if(!$delete_query){
        die('Error in delete'.mysqli_error($connection));
    }elseif($percentage < 0 || $percentage > 100){
        $error = "Coupon must be from 0 to 100 only";

    }else{
        $success = "Your category is deleted";
    }

}
if(isset($_POST['update_coupon'])){
    $id = $_POST['c_id'];
    $code = $_POST['code'];
    $percentage = $_POST['percentage'];
    $image_name = time() . '-' . $_FILES['image']['name'];
    $image_dirction = '../images/';
    $image_target = $image_dirction . basename($image_name);
    move_uploaded_file($_FILES['image']['tmp_name'] ,$image_target );
    if($percentage < 0 || $percentage > 100){
        $error = "Coupon must be from 0 to 100 only";

    }else{
        if(!empty($_FILES['image']['name'])){

            $update_coupon = "UPDATE `coupons` SET `code` ='$code', `percentage`='$percentage', `image`='$image_name' WHERE `id`='$id' ";
        }else{
            $update_coupon = "UPDATE `coupons` SET `code` ='$code', `percentage`='$percentage' WHERE `id`='$id' ";

        }
        $update_query =mysqli_query($connection, $update_coupon) or die('Error in update'.mysqli_error($connection));
        if(!$update_query){
            die('Error in update'.mysqli_error($connection));
        }else{
            $success = "Your coupon is updated";
            }

    }
      

}