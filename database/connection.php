<?php

$connection = mysqli_connect('localhost','root', '','dealu');
if(!$connection){
    die('Error'.mysqli_connect_error());
}
session_start();