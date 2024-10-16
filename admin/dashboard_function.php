<?php
$users = "SELECT `id` FROM `users` ORDER BY `id`";
$users_query = mysqli_query($connection,$users) or die("Error:".mysqli_error($connection)) ;
$users_count = mysqli_num_rows($users_query);


$orders = "SELECT * FROM `orders` ORDER BY `id`";
$orders_query = mysqli_query($connection,$orders) or die("Error:".mysqli_error($connection)) ;
$orders_count = mysqli_num_rows($orders_query);

$reviews = "SELECT * FROM `reviews` ORDER BY `id`";
$reviews_query = mysqli_query($connection,$reviews) or die("Error:".mysqli_error($connection)) ;
$reviews_count = mysqli_num_rows($reviews_query);

$coupons = "SELECT * FROM `coupons` ORDER BY `id`";
$coupons_query = mysqli_query($connection,$coupons) or die("Error:".mysqli_error($connection)) ;
$coupons_count = mysqli_num_rows($coupons_query);

$category = "SELECT * FROM `category` ORDER BY `id`";
$category_query = mysqli_query($connection,$category) or die("Error:".mysqli_error($connection)) ;
$categories_count = mysqli_num_rows($category_query);


$shares = "SELECT * FROM `share_link` ORDER BY `id`";
$shares_query = mysqli_query($connection,$shares) or die("Error:".mysqli_error($connection)) ;
$shares_count = mysqli_num_rows($shares_query);

$offers = "SELECT * FROM `offers` ORDER BY `id`";
$offers_query = mysqli_query($connection,$offers) or die("Error:".mysqli_error($connection)) ;
$offers_count = mysqli_num_rows($offers_query);