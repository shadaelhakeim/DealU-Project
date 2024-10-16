<?php
if(isset($_POST['submit_register'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $password = sha1($_POST['password']);
    $c_password = sha1($_POST['c_password']);

    $email_in_mysql = "SELECT * FROM `users` where `email`='$email'";
    $duplication = mysqli_query($connection, $email_in_mysql);

    if(mysqli_num_rows($duplication) > 0){
        $error = "Email already existed";
    }elseif($password != $c_password){
        $error = "Password must be equal to confirm password";
    }else{

        $insert_stat = "INSERT INTO `users`( `name`, `email`, `gender`,`address`, `phone`, `password`) VALUES ('$name','$email','$gender','$address','$phone ','$password') ";
        $register_query  = mysqli_query($connection, $insert_stat) or die ('ERROR in regf'.mysqli_error($connection));
        if(!$register_query){
            die ('ERROR in register'.mysqli_error($connection));
        }else{
            $register_message = "Register successfully";
        }
    }




}
if(isset($_POST['submit_login'])){
    $email = $_POST['email'];
    $password = sha1($_POST['password']);

    $select_admin = "SELECT * from `users` WHERE `email`='$email' AND `password`= '$password'";
    $select_result= mysqli_query($connection,$select_admin);
    
    if($select_result){
        while($row = mysqli_fetch_array($select_result)){
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['name'] = $row['name'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['address'] = $row['address'];
            $_SESSION['phone'] = $row['phone'];
        }
        $count = mysqli_num_rows($select_result);
        if($count == 1){
            header('location: index.php');
        }else{
            $error = "That's doesn't met our creditials";
        }
    }else{
        echo "Something happen in sql statement";
    }

}