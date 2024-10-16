<?php 
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomCode = '';
    for ($i = 0; $i < 10; $i++) {
        $randomCode .= $characters[random_int(0, $charactersLength - 1)];
    }
if(isset($_POST['reject_order'])){
    $id = $_POST['id'];

    $update = "UPDATE `orders` SET  `status` = 'rejected' WHERE `id`='$id'";
    if (!mysqli_query($connection, $update)) {
        die('Error:' . mysqli_error($connection));
    } else {
        $success = "Order rejected";
    }
}
if(isset($_POST['accept_order'])){
    $id = $_POST['id'];
    $qr_image_name = time() . '-' . $_FILES['qr_image']['name'];
    $image_dirction = '../images/';
    $image_target = $image_dirction . basename($qr_image_name);
    move_uploaded_file($_FILES['qr_image']['tmp_name'] ,$image_target );
    $update = "UPDATE `orders` SET  `status` = 'accepted', `qr_code`= '$qr_image_name' , `code`='$randomCode' WHERE `id`='$id'";
    if (!mysqli_query($connection, $update)) {
        die('Error:' . mysqli_error($connection));
    } else {
        $success = "Order accepted";
    }
}