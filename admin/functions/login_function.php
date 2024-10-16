<?php

if(isset($_POST['submit_login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $select_admin = "SELECT * from `admins` WHERE `email`='$email' AND `password`= '$password'";
    $select_result= mysqli_query($connection,$select_admin);
    
    if($select_result){
        while($row = mysqli_fetch_array($select_result)){
            $_SESSION['admin_id'] = $row['id'];
            $_SESSION['name'] = $row['name'];
            $_SESSION['email'] = $row['email'];
        }
        $count = mysqli_num_rows($select_result);
        if($count == 1){
            header('location: dashboard.php');
        }else{
            $error = 'Your not authorized';
        }
    }else{
        die("Something happen in sql statement". mysqli_error($connection));
    }

}