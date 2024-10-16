<?php

if(isset($_POST['add_offer'])){
    $name= mysqli_real_escape_string($connection, $_POST['name']);
    $price= $_POST['price'];
    $category_id= $_POST['category_id']; 
    $for_gender= $_POST['for_gender']; 
    $type= $_POST['type']; 
    $expires_in= $_POST['expires_in']; 
    $description= mysqli_real_escape_string($connection,$_POST['description']); 
    $image_name = time() . '-' . $_FILES['image']['name'];
    $image_dirction = '../images/';
    $image_target = $image_dirction . basename($image_name);
    move_uploaded_file($_FILES['image']['tmp_name'] ,$image_target );

    $insert_statement = "INSERT INTO `offers` (`name`, `for_gender`, `type`, `price`, `image`, `expires_in`,`description`, `category_id`) VALUES ('$name','$for_gender','$type','$price','$image_name','$expires_in','$description','$category_id')";
    $insert_query = mysqli_query($connection, $insert_statement) or die('Error in insert'.mysqli_error($connection));
    if(!$insert_query){
        die('Error in insert'.mysqli_error($connection));
    }else{
        header('location: dash-offer.php');
        $_SESSION['success'] = "offer Inserted successfully";
    }

}
if(isset($_POST['delete_offer'])){
    $id = $_POST['o_id'];

    $delete_product_statement="DELETE FROM `offers` WHERE `id`='$id'";

    $delete_query =mysqli_query($connection, $delete_product_statement) or die('Error in delete'.mysqli_error($connection));
    if(!$delete_query){
        die('Error in delete'.mysqli_error($connection));
    }else{
        $success = "Your offer is deleted";
    }

}
if(isset($_POST['update_offer'])){
    $id = $_POST['o_id'];
    $name= mysqli_real_escape_string($connection, $_POST['name']);
    $price= $_POST['price'];
    $category_id= $_POST['category_id']; 
    $for_gender= $_POST['for_gender']; 
    $expires_in= $_POST['expires_in']; 
    $type= $_POST['type']; 
    $description= mysqli_real_escape_string($connection,trim($_POST['description'])); 
    $image_name = time() . '-' . $_FILES['image']['name'];
    $image_dirction = '../images/';
    $image_target = $image_dirction . basename($image_name);
    move_uploaded_file($_FILES['image']['tmp_name'] ,$image_target );
    if(!empty($_FILES['image']['name'])){
        $updated_statement = "UPDATE `offers` SET `name` = '$name', `price` = '$price', `category_id`='$category_id', `type`='$type',`expires_in`='$expires_in',`for_gender`='$for_gender',`description`='$description' , `image`='$image_name' WHERE id = '$id' ";
    }else{
        $updated_statement = "UPDATE `offers` SET `name` = '$name', `price` = '$price',`category_id`='$category_id', `type`='$type',`expires_in`='$expires_in',`for_gender`='$for_gender',`description`='$description'  WHERE id = '$id'" ;
    }
    $update_query = mysqli_query($connection, $updated_statement) or die('Error in update'.mysqli_error($connection));
    if(!$update_query){
        die('Error in update'.mysqli_error($connection));
    }else{
        $success = "offer Updated successfully";
    }

}