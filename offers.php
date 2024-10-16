<?php
require_once('database/connection.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <?php include('includes/head-tags.php') ?>
  


  <style>
    body {

      font-family: "Open Sans", Helvetica, Arial, sans-serif;
      font-size: 13.5px;
      line-height: 1.8;

    }

    p {
      font-family: "Open Sans", Helvetica, Arial, sans-serif;
      font-size: 13.5px;
      line-height: 1.8;
    }

    a {
      text-decoration: none;
    }

    a:hover {
      text-decoration: none;
      color: #fe495d;
    }

    /*start header*/
    .nav {
      height: 60px;
      width: 100%;
      background-image: linear-gradient(90deg, #74EBD5 0%, #9FACE6 100%);
      position: relative;
      opacity: 0.9;
      font-family: 'Times New Roman', Times, serif;
    }

    .nav>.nav-header {
      display: inline;
    }

    .nav>.nav-header>.nav-title {
      display: inline-block;
      font-size: 22px;
      color: #fff;
      padding: 15px 10px 0px 10px;
      margin-left: 15px;
    }

    .nav>.nav-btn {
      display: none;
    }

    .nav>.nav-links {
      display: inline;
      float: right;
      font-size: 18px;
      margin-top: 5px;
    }

    .nav>.nav-links>a {
      display: inline-block;
      padding: 5px 9px 0px 10px;
      text-decoration: none;
      color: #ffffff;
      margin-right: 20px;
      border-radius: 20px;
      transition: all 0.5s ease;

    }

    .nav>.nav-links>a:hover {
      background-color: rgba(0, 0, 0, 0.3);
      border: 1px solid rgba(0, 0, 0, 0.452);
    }

    .nav>#nav-check {
      display: none;
    }

    @media (max-width:800px) {
      .nav>.nav-btn {
        display: inline-block;
        position: absolute;
        right: 0px;
        top: 0px;
      }

      .nav>.nav-btn>label {
        display: inline-block;
        width: 50px;
        height: 50px;
        padding: 13px;
      }

      .nav>.nav-btn>label:hover,
      .nav #nav-check:checked~.nav-btn>label {
        background-color: rgba(0, 0, 0, 0.3);
      }

      .nav>.nav-btn>label>span {
        display: block;
        width: 25px;
        height: 10px;
        border-top: 2px solid #eee;
      }

      .nav>.nav-links {
        position: absolute;
        display: block;
        width: 100%;
        background-color: #333;
        height: 0px;
        transition: all 0.3s ease-in;
        overflow-y: hidden;
        top: 50px;
        left: 0px;
      }

      .nav>.nav-links>a {
        display: block;
        width: 100%;
      }

      .nav>#nav-check:not(:checked)~.nav-links {
        height: 0px;
      }

      .nav>#nav-check:checked~.nav-links {
        height: calc(100vh - 50px);
        overflow-y: auto;
      }
    }

    /*end header*/
    /*stat fillter*/
    .fillter {
      width: 150px;
    }

    #sidebar {
      margin: 0;
      float: left
    }

    ul {
      list-style: none;
      padding: 5px
    }

    .nav-item .nav-link {
      text-decoration: none;
      color: white;
      border: 1px solid #cccccc;
      padding: 10px;
      padding-right: 20px;
      padding-left: 20px;
      background-color: #98b6e3;
      border: none;
      border-radius: 20px;
    }

    .nav-item .nav-link:hover {
      opacity: 0.7;
    }

    .card {
      width: 250px;
      display: inline-block;
      height: 300px
    }

    .card-img-top {
      width: 250px;
      height: 210px
    }

    .card-body p {
      margin: 2px
    }

    .card-body {
      padding: 0;
      padding-left: 2px
    }

    .filter {
      display: none;
      padding: 0;
      margin: 0
    }

    .p-1-border-bottom {
      font-size: 15px;
      text-transform: uppercase;
      margin-bottom: 15px;
    }

    .mb-2 {
      font-size: 15px;
      font-family: initial;
    }

    .navbar-nav {
      display: flex;
      flex-wrap: wrap;
      border-bottom: 1px solid #80808066;
      justify-content: center;
      margin-left: -221px;
      border: none;
    }

    @media(min-width:991px) {

      .nav-item {
        padding-left: 25px;
      }

      .card {
        width: 190px;
        display: inline-block;
        height: 300px
      }

      .card-img-top {
        width: 188px;
        height: 210px
      }

      #mobile-filter {
        display: none
      }
    }

    @media(min-width:768px) and (max-width:991px) {
      .navbar-nav {
        margin-left: 20%
      }

      .nav-item {
        padding-left: 10px
      }

      .card {
        width: 230px;
        display: inline-block;
        height: 300px;
        margin-bottom: 10px
      }

      .card-img-top {
        width: 230px;
        height: 210px
      }

      #mobile-filter {
        display: none
      }
    }

    @media(min-width:568px) and (max-width:767px) {
      .navbar-nav {
        margin-left: 20%
      }

      .nav-item {
        padding-left: 10px
      }

      .card {
        width: 205px;
        display: inline-block;
        height: 300px;
        margin-bottom: 10px
      }

      .card-img-top {
        width: 203px;
        height: 210px
      }

      .fa-circle {
        font-size: 15px
      }

      #mobile-filter {
        display: none
      }
    }

    @media(max-width:567px) {
      body {
        width: fit-content;
      }

      .navbar-nav {
        margin-left: 0%
      }

      .nav-item {
        padding-left: 10px
      }

      #sidebar {
        width: 100%;
        padding: 10px;
        margin: 0;
        float: left
      }

      #products {
        width: 100%;
        padding: 5px;
        margin: 0;
        float: right
      }

      .card {
        width: 230px;
        display: inline-block;
        height: 300px;
        margin-bottom: 10px;
        margin-top: 10px
      }

      .card-img-top {
        width: 230px;
        height: 210px
      }

      .list-group-item {
        padding: 3px
      }

      .offset-1 {
        margin-left: 8%
      }

      .filter {
        display: block;
        margin-left: 70%;
        margin-top: 2%
      }

      #sidebar {
        display: none
      }

      #mobile-filter {
        padding: 10px
      }

      .container-blue-bg {
        display: none;
      }

      .navbar-sm {
        display: none;
      }

      .fillter {
        display: none;
      }

      .col-md-4 {
        display: none;
      }

      .pagination {
        margin-left: 166px !important;
        width: 14px;
      }
    }

    @media (max-width:717px) {
      .container-blue-bg {
        display: none;
      }

      .navbar-sm {
        display: none;
      }

      .fillter {
        display: none;
      }

      .col-md-4 {
        display: none;
      }

      .pagination {
        margin-left: 166px !important;
        width: 14px;
      }
    }

    /*end fillter*/
    .section-heading {
      font-size: 21px;
      letter-spacing: -0.3px;
      font-weight: 300;
      margin-bottom: 14px;
    }

    .col-md-4 {
      margin-top: 19px;
    }

    .store-offer-item {
      padding: 20px 20px 16px 20px;
      margin-bottom: 15px;
      display: flex;
    }

    .store-offer-item:after {
      content: ".";
      display: block;
      height: 0;
      clear: both;
      visibility: hidden;

    }

    .shadow-box {
      background: #fff;
      box-sizing: border-box;
      box-shadow: 0px 18px 56px -1px rgba(37, 44, 54, 0.14);
    }

    .container-blue-bg {
      display: flex;
      justify-content: space-around;
      align-items: flex-start;
      flex-direction: row;
    }

    .store-offer-item .store-thumb-link {
      float: left;
      width: 20%;
      margin-right: 20px;
    }

    .store-offer-item .store-thumb-link .offer-image {
      max-width: 126px;
      line-height: 0px;
      margin-bottom: 5px;
      text-align: center;
    }

    .offer-image a {
      border: 2px solid #f5f5f5;
      -webkit-border-radius: 2px;
      -moz-border-radius: 2px;
      border-radius: 2px;
      display: block;
    }

    .offer-image a:hover {
      border-color: #fe495d;
    }

    .offer-image img {
      width: 80%;
    }

    .store-offer-item .store-thumb-link .store-name a {
      display: inline-block;
      line-height: 1;
      font-size: 13px;
      color: #1c9ab3;
      text-align: center;
      width: 100%;
    }

    .store-offer-item .store-thumb-link .store-name a:hover {
      color: #fe495d;
    }

    .store-offer-item .store-thumb-link .store-name a span {
      overflow: hidden;
      text-overflow: ellipsis;
      width: 85%;
      display: block;
      float: left;
      white-space: nowrap;
    }

    .store-offer-item .store-thumb-link .store-name a i,
    .des-more i {
      font-size: 9px;
    }

    .store-offer-item .latest-coupon {
      /* max-width: 300px; */
      margin-right: 20px;
      float: left;
      width: 80%;
    }

    .latest-coupon .coupon-title {
      font-size: 16px;
      margin-bottom: 5px;
      font-weight: 500;
      margin-top: -2px;
      line-height: 1.5;
    }

    .latest-coupon .coupon-des {
      font-size: 13px;
      line-height: 1.7;
      position: relative;
    }

    .store-offer-item .coupon-detail {
      float: right;
      margin-top: 25px;
    }

    .coupon-button-type .coupon-deal,
    .coupon-button-type .coupon-print,
    .coupon-button-type .coupon-code {
      line-height: 1;
      padding: 14px 38px;
      background-image: linear-gradient(90deg, #74EBD5 0%, #9FACE6 100%);
      color: #FFFFFF;
      font-size: 16px;
      font-weight: 600;
      display: inline-block;
      letter-spacing: 1px;
      text-transform: uppercase;
      -webkit-border-radius: 3px;
      -moz-border-radius: 3px;
      border-radius: 3px;
      margin-bottom: 2px;
      min-width: 195px;
      text-align: center;
    }

    .coupon-save {
      float: right;
      font-size: 15px;
      margin-right: -4px;
      margin-top: -2px;
      color: #999999;
    }

    .widget-area .widget .widget-title {
      font-size: 13px;
      text-transform: uppercase;
      margin-bottom: 10px;
      letter-spacing: 1.2px;
      font-weight: 600;
    }

    .newsletter-box-wrapper.shadow-box {

      display: flex;
    }

    a.store-gird img {
      border: 1px solid #f1f1f1;
      border-style: hidden;
      display: table;
      width: 80px;
      padding: 10px;
    }

    .newsetter1 {
      display: flex;
      justify-content: space-evenly;
      align-items: stretch;
      flex-direction: row-reverse;
    }

    .newsetter2 {
      display: flex;
      flex-direction: row;
      justify-content: space-evenly;
    }

    a.store-gird:hover img {
      display: table;
      box-shadow: 0 1px 1px rgba(0, 0, 0, 0.08);
    }

    a.store-gird span {
      margin: 5px 0 15px 0;
      display: block;
      text-align: center;
      line-height: 1.4;
      color: #000000a6;
      font-weight: bold;
    }

    /* store coupon style */
    .coupon-listing-item {
      padding-bottom: 0px;
    }

    .coupon-listing-item .offer-image img {
      width: 100%;
    }

    .coupon-listing-item .c-type .c-code {
      background: #b9dc2f;
      color: #FFFFFF;
      padding: 4px 10px 4px;
      line-height: 1;
      text-transform: uppercase;
      font-size: 13px;
      font-weight: bold;
      letter-spacing: 1px;
      display: inline-block;
      -webkit-border-radius: 2px;
      -moz-border-radius: 2px;
      border-radius: 2px;
    }

    .coupon-listing-item .c-type .exp {
      font-size: 12px;
      color: #999999;
      margin-left: 10px;
    }

    .coupon-listing-item .coupon-detail .voted-value {
      font-size: 11px;
      letter-spacing: 0.5px;
      text-transform: uppercase;
    }

    .coupon-listing-footer {
      margin: 18px -20px 0px;
      padding: 10px 20px 12px;
      border-top: 1px solid #f5f5f5;
      margin-top: 177px;
      margin-bottom: -17px;
    }

    .coupon-listing-footer ul {
      margin: 0px;
      padding: 0px;
      list-style: none;
    }

    .coupon-listing-footer ul li {
      padding: 0;
      display: inline-block;
      margin-left: 15px;
    }

    .ui.buttons {
      display: inline-block;
      vertical-align: middle;
      margin: 5px .25em 0 0;
    }

    .ui.basic.buttons .button {
      border-left: 1px solid rgba(39, 41, 43, .15);
      box-shadow: none;
    }

    .coupon-listing-item .coupon-detail .ui.basic.buttons {
      border-radius: 2px;
      border: 1px solid #ccc;
    }

    .coupon-listing-item .coupon-detail .user-ratting .ui.button {
      padding: 5px 10px 5px;
    }

    .ui.buttons .button {
      float: left;
      border-radius: 0;
      margin: 0;
    }

    .ui.buttons .button:first-child {
      border-left: none;
    }

    .coupon-listing-footer ul li:first-child {
      margin-left: 0px;
    }

    .coupon-listing-footer ul li a,
    .coupon-listing-footer ul li span {
      font-size: 12px;
      color: #999999;
      cursor: pointer;
    }

    .coupon-listing-footer ul li a:hover,
    .coupon-listing-footer ul li span:hover {
      color: #1c9ab3;
    }

    .coupon-listing-footer ul li:last-child {
      float: right;
      margin-left: 0px;
    }

    .coupon-listing-footer .reveal-content {
      padding: 30px 20px 40px;
      border-top: 1px solid #f5f5f5;
      margin: 12px -20px -12px;
      display: none;
      position: relative;
    }

    .exp-text {
      font-size: 11px;
    }

    .fa-sm {

      margin-right: 10px;
    }

    /*start paination*/
    .pagination {
      display: inline-block;
      padding: 15px;
      display: flex;
      justify-content: center;
      margin-left: -119px
    }

    .pagination a {
      color: black;
      float: left;
      padding: 8px 16px;
      text-decoration: none;
      transition: background-color .3s;
      border: 1px solid #ddd;
      margin: 0 4px;
    }

    .pagination a.active {
      background-color: #8bc8de;
      color: white;
      border: 1px solid #8bc8de;
    }

    .pagination a:hover:not(.active) {
      background-color: #ddd;
    }

    /*end paination*/

    /* Footer main */
    .ft-main {
      padding: 1.25rem 1.875rem;
      display: flex;
      flex-wrap: wrap;
      border-top: 1px solid #80808057;
      margin-top: 25px
    }

    @media only screen and (min-width: 29.8125rem

      /* 477px */
    ) {
      .ft-main {
        justify-content: space-evenly;
      }
    }

    @media only screen and (min-width: 77.5rem

      /* 1240px */
    ) {
      .ft-main {
        justify-content: space-evenly;
      }
    }

    .ft-main-item {
      padding: 1.25rem;
      min-width: 12.5rem;
    }

    .ft-main-item ul li a {
      color: gray;
    }

    .ft-title {
      color: rgb(109, 108, 108);
    }

    .ft {
      color: gray;
    }

    /* Footer main | Newsletter form */
    form {
      display: flex;
      flex-wrap: wrap;
    }

    input[type="email"] {
      border: 0;
      padding: 0.625rem;
      margin-top: 0.3125rem;
      border: 1px solid #8080804d;
    }

    input[type="submit"] {
      background-color: #92bee1;
      color: #fff;
      cursor: pointer;
      border: 0;
      padding: 0.625rem 0.9375rem;
      margin-top: 0.3125rem;
    }

    /* Footer social */
    .ft-social {
      padding: 0 1.875rem 1.25rem;
    }

    .ft-social-list {
      display: flex;
      justify-content: center;
      border-top: 1px #77777785 solid;
      padding-top: 1.25rem;
    }

    .ft-social-list li {
      margin: 0.5rem;
      font-size: 1.25rem;
    }

    /* Footer legal */
    .ft-legal {
      padding: 0.0625rem 1.875rem;
      background-color: #333;
    }

    .ft-legal-list {
      width: 100%;
      display: flex;
      flex-wrap: wrap;
    }

    .ft-legal-list li {
      margin: 0.125rem 0.625rem;
      white-space: nowrap;
    }

    .ft-legal-list li {
      color: white;
      ;
    }

    /* one before the last child */
    .ft-legal-list li:nth-last-child(2) {
      flex: 1;
    }

    .nav-title img {
      width: 132px;
      margin-top: -39px;
      height: 99px;
    }
    .category li.active{
      color: #8CDFDD;
    }
    .category li a{
      color: #040404;
    }
    .category .active{
      color: #8CDFDD;
    }
    #sidebar  a{
      color: #040404;
    }
    #sidebar  a:hover{
      color: #8CDFDD;
    }
    .content{
  padding: 10px;
}
.info{
  display: flex;
    align-items: baseline;
    margin-top: -37px;
}
.info .d-inline-block{
  color: gray;
  font-family: serif;
  font-weight: 200;
  font-size: 18px;
}
.info span{
  color: gray;
    font-family: unset;
    font-weight: 100;
    font-size: 16px;
}
form{
  margin-bottom: 20px;
}
  </style>
</head>

<body>
  <!--stat header-->
  <?php include('includes/header.php') ?>


  <!--End header-->
  
  <div class="container-blue-bg">
    <!--list fillter-->
    <div class="fillter">
      <div class="filter"> <button class="btn btn-default" type="button" data-toggle="collapse" data-target="#mobile-filter" aria-expanded="false" aria-controls="mobile-filter">Filters<span class="fa fa-filter pl-1"></span></button>
      </div>

      <section id="sidebar">
        <div style="    border-bottom: 1px solid #80808033;
        width: 172px;
        margin-left: 0px;">
          <h6 class="p-1-border-bottom">category</h6>
          <ul class="category">
            <li><input type="checkbox"><a href="offers.php">All</a></li>
            <?php

            $categories_stat = "SELECT * FROM `category`";
            $category_query = mysqli_query($connection, $categories_stat) or die('Error in cat' . mysqli_error($connection));

            while ($result = mysqli_fetch_array($category_query)) {


            ?>
              <li id="<?= $result['id'] ?>"><input type="checkbox">
              <a href="offers.php?category_id=<?= $result['id'] ?>">
              <?= $result['name'] ?></a>
            </li>
            <?php
            }
            ?>
            <!-- <li><input type="checkbox"><a href="">Skin care</a></li>
            <li><input type="checkbox"><a href="">Make up</a></li>
            <li><input type="checkbox"><a href="">Transportion</a></li>
            <li><input type="checkbox"><a href="">Other</a></li> -->

          </ul>
        </div>
        <div style="margin-left:4px;">
          <h6 class="p-1-border-bottom">Filter By</h6>
          <p class="mb-2">popularity</p>
          <ul class="list-group popularity">
            <div class="form-inline border rounded p-sm-2 my-2"> 
              <input id="popular" type="radio" name="type" id="offline"> 
              <label for="popular" class="pl-1 pt-sm-0 pt-1">
                <a href="offers.php?popular">Popular</a>
              </label> 
            </div>
            <div class="form-inline border rounded p-sm-2 my-2"> 
              <input type="radio" id="unpopular" name="type" id="online"> 
              <label for="unpopular" class="pl-1 pt-sm-0 pt-1">
              <a href="offers.php?unpopular">Unpopular</a>

            </label> 
            </div>
          </ul>
        </div>
        <div style="margin-left:4px;" >
          <p class="mb-2">Type</p>
          <form class="ml-md-2" style="display: inline;">
            <div class="form-inline border rounded p-sm-2 my-2"> <input type="radio" name="type" id="offline"> <label for="in store" class="pl-1 pt-sm-0 pt-1"><a href="offers.php?type=in_store">In store</a></label> </div>
            <div class="form-inline border rounded p-sm-2 my-2"> <input type="radio" name="type" id="online"> <label for="ugly" class="pl-1 pt-sm-0 pt-1"><a href="offers.php?type=online">Online</a></label> </div>
          </form>
        </div>
        <div style="margin-left:4px;">
          <p class="mb-2">Gender</p>
          <form class="ml-md-2" style="display: inline;">
            <div class="form-inline border rounded p-sm-2 my-2"> <input type="radio" name="type" id="offline"> <label for="in store" class="pl-1 pt-sm-0 pt-1"><a href="offers.php?for_gender=male">Male</a></label> </div>
            <div class="form-inline border rounded p-sm-2 my-2"> <input type="radio" name="type" id="online"> <label for="ugly" class="pl-1 pt-sm-0 pt-1"><a href="offers.php?for_gender=female">Female</a></label> </div>
          </form>
        </div>
      </section>
    </div>

    <!--end fillter-->

    <div class="col-md-8">
      <h2 class="section-heading">Latest Offers and Deals</h2>
      <div class="coupons-list">
        <?php 
        
        if(isset($_GET['category_id'])){
          $offers_stat = "SELECT * FROM `offers` WHERE `category_id`=".$_GET['category_id']."";
          $category_query = mysqli_query($connection, $offers_stat) or die('Error in cat' . mysqli_error($connection));

          while ($result = mysqli_fetch_array($category_query)) {
          
          
          ?>
          <div class="store-offer-item shadow-box">
            <div class="store-thumb-link">
              <div class="offer-image">
                <a href=""><img src="images/<?= $result['image'] ?>" alt="<?= $result['name'] ?>" title="<?= $result['name'] ?>"></a>
              </div>
              <div class="store-name">
                <a href="#"><span><?= $result['name'] ?></span> <i class="glyphicon glyphicon-menu-right" aria-hidden="true"></i></a>
              </div>
            </div>
            <div class="latest-coupon">
              <h3 class="coupon-title"><a href="#"><?= $result['name'] ?></a></h3>
              <div class="coupon-des">
              <?= $result['description'] ?>
              </div>
              <div class="coupon-detail coupon-button-type">
                <a href="offer_details.php?offer_id=<?= $result['id'] ?>" class="coupon-deal coupon-button" data-aff-url="https://google.com">Get Deal <i class="shop icon"></i></a>
                <div class="exp-text">Expires <?= $result['expires_in'] ?>
                  <a title="Save This Coupon" href="#" class="coupon-save">
                    <i class="fa-solid fa-star fa-fade fa-sm" style="color: #ffdf3d;"></i>
                </a>
                </div>
              </div>
            </div>
          </div>
      <?php
        }
      }
      elseif(isset($_GET['popular'])){
        $offers_stat = "SELECT * FROM `offers` ORDER BY id DESC  limit 6";
        $category_query = mysqli_query($connection, $offers_stat) or die('Error in cat' . mysqli_error($connection));

        while ($result = mysqli_fetch_array($category_query)) {
        
        
        ?>
        <div class="store-offer-item shadow-box">
          <div class="store-thumb-link">
            <div class="offer-image">
              <a href=""><img src="images/<?= $result['image'] ?>" alt="<?= $result['name'] ?>" title="<?= $result['name'] ?>"></a>
            </div>
            <div class="store-name">
              <a href="#"><span><?= $result['name'] ?></span> <i class="glyphicon glyphicon-menu-right" aria-hidden="true"></i></a>
            </div>
          </div>
          <div class="latest-coupon">
            <h3 class="coupon-title"><a href="#"><?= $result['name'] ?></a></h3>
            <div class="coupon-des">
            <?= $result['description'] ?>
            </div>
            <div class="coupon-detail coupon-button-type">
              <a href="offer_details.php?offer_id=<?= $result['id'] ?>" class="coupon-deal coupon-button" data-aff-url="https://google.com">Get Deal <i class="shop icon"></i></a>
              <div class="exp-text">Expires <?= $result['expires_in'] ?>
                <a title="Save This Coupon" href="#" class="coupon-save">
                  <i class="fa-solid fa-star fa-fade fa-sm" style="color: #ffdf3d;"></i>
              </a>
            </div>
            </div>
          </div>
        </div>
    <?php
      }}
      elseif(isset($_GET['for_gender'])){
        $offers_stat = "SELECT * FROM `offers` WHERE `for_gender`= '$_GET[for_gender]' ";
        $category_query = mysqli_query($connection, $offers_stat) or die('Error in cat' . mysqli_error($connection));

        while ($result = mysqli_fetch_array($category_query)) {
        
        
        ?>
        <div class="store-offer-item shadow-box">
          <div class="store-thumb-link">
            <div class="offer-image">
              <a href=""><img src="images/<?= $result['image'] ?>" alt="<?= $result['name'] ?>" title="<?= $result['name'] ?>"></a>
            </div>
            <div class="store-name">
              <a href="#"><span><?= $result['name'] ?></span> <i class="glyphicon glyphicon-menu-right" aria-hidden="true"></i></a>
            </div>
          </div>
          <div class="latest-coupon">
            <h3 class="coupon-title"><a href="#"><?= $result['name'] ?></a></h3>
            <div class="coupon-des">
            <?= $result['description'] ?>
            </div>
            <div class="coupon-detail coupon-button-type">
              <a href="offer_details.php?offer_id=<?= $result['id'] ?>" class="coupon-deal coupon-button" data-aff-url="https://google.com">Get Deal <i class="shop icon"></i></a>
              <div class="exp-text">Expires <?= $result['expires_in'] ?>
                <a title="Save This Coupon" href="#" class="coupon-save">
                  <i class="fa-solid fa-star fa-fade fa-sm" style="color: #ffdf3d;"></i>
              </a>
            </div>
            </div>
          </div>
        </div>
    <?php
      }}
      elseif(isset($_GET['type'])){
        $offers_stat = "SELECT * FROM `offers` WHERE `type`= '$_GET[type]' ";
        $category_query = mysqli_query($connection, $offers_stat) or die('Error in cat' . mysqli_error($connection));

        while ($result = mysqli_fetch_array($category_query)) {
        
        
        ?>
        <div class="store-offer-item shadow-box">
          <div class="store-thumb-link">
            <div class="offer-image">
              <a href=""><img src="images/<?= $result['image'] ?>" alt="<?= $result['name'] ?>" title="<?= $result['name'] ?>"></a>
            </div>
            <div class="store-name">
              <a href="#"><span><?= $result['name'] ?></span> <i class="glyphicon glyphicon-menu-right" aria-hidden="true"></i></a>
            </div>
          </div>
          <div class="latest-coupon">
            <h3 class="coupon-title"><a href="#"><?= $result['name'] ?></a></h3>
            <div class="coupon-des">
            <?= $result['description'] ?>
            </div>
            <div class="coupon-detail coupon-button-type">
              <a href="offer_details.php?offer_id=<?= $result['id'] ?>" class="coupon-deal coupon-button" data-aff-url="https://google.com">Get Deal <i class="shop icon"></i></a>
              <div class="exp-text">Expires <?= $result['expires_in'] ?>
                <a title="Save This Coupon" href="#" class="coupon-save">
                  <i class="fa-solid fa-star fa-fade fa-sm" style="color: #ffdf3d;"></i>
              </a>
            </div>
            </div>
          </div>
        </div>
    <?php
      }}
      else{
        $offers_stat = "SELECT * FROM `offers`";
        $category_query = mysqli_query($connection, $offers_stat) or die('Error in cat' . mysqli_error($connection));

        while ($result = mysqli_fetch_array($category_query)) {


        ?>
          <div class="store-offer-item shadow-box">
            <div class="store-thumb-link">
              <div class="offer-image">
                <a href=""><img src="images/<?= $result['image'] ?>" alt="<?= $result['name'] ?>" title="<?= $result['name'] ?>"></a>
              </div>
              <div class="store-name">
                <a href="#"><span><?= $result['name'] ?></span> <i class="glyphicon glyphicon-menu-right" aria-hidden="true"></i></a>
              </div>
            </div>
            <div class="latest-coupon">
              <h3 class="coupon-title"><a href="#"><?= $result['name'] ?></a></h3>
              <div class="coupon-des">
              <?= $result['description'] ?>
              </div>
              <div class="coupon-detail coupon-button-type">
                <a href="offer_details.php?offer_id=<?= $result['id'] ?>" class="coupon-deal coupon-button" data-aff-url="https://google.com">Get Deal <i class="shop icon"></i></a>
                <div class="exp-text">Expires <?= $result['expires_in'] ?>
                  <a title="Save This Coupon" href="#" class="coupon-save">
                    <i class="fa-solid fa-star fa-fade fa-sm" style="color: #ffdf3d;"></i>
                </a>
              </div>
              </div>
            </div>
            <!-- <div class="coupon-footer coupon-listing-footer">
              <ul class="clearfix">
                <li><span><i class="glyphicon glyphicon-signal"></i> 267 Used - 16 Today</span></li>
                <li><a class=""><i class="glyphicon glyphicon-share-alt"></i> Share</a></li>
                <li><a href="#"><i class="glyphicon glyphicon-envelope"></i> Email</a></li>
                <li><a href="#"><i class="glyphicon glyphicon-comment"></i> Comments</a></li>
              </ul>
              <div class="reveal-content reveal-share">
                <span class="close"></span>
                <h4>Share it with your friends</h4>
                <div class="ui fluid left icon input">
                  <input value="http://example.com/stores/Nature/#c_28668" type="text">
                  <i class="linkify icon"></i>
                </div>
                <br>
                <div class="coupon-share">
                  <a class="tiny ui facebook button"><i class="facebook icon"></i>Facebook</a>
                  <a class="tiny ui twitter button"><i class="twitter icon"></i>Twitter</a>
                  <a class="tiny ui google plus button"><i class="google plus icon"></i>Google Plus</a>
                  <a class="tiny ui instagram button"><i class="instagram icon"></i>Instagram</a>
                </div>
              </div>
              <div class="reveal-content reveal-email">
                <span class="close"></span>
                <h4>Send this coupon to an email</h4>
                <div class="ui fluid action left icon input">
                  <input placeholder="Email address ..." type="text">
                  <i class="mail outline icon"></i>
                  <div class="ui button btn btn_primary">Send</div>
                </div><br>
                <p>This is not a email subscription service. Your email (or your friend's email) will only be used to send this coupon.</p>
              </div>
              <div class="reveal-content reveal-comments">
                <span class="close"></span>
                <h4>Showing most recent comments</h4>
              </div>
            </div> -->
          </div>
        <?php
        }
      }
        ?>
      </div>
    </div>
    <div class="col-md-4">
      <div id="secondary" class="widget-area sidebar">
        <aside class="widget widget_newsletter">
          <h4 class="widget-title">Popular Stores</h4>
          <div class="newsletter-box-wrapper shadow-box" style="
              margin-left: 24px;
          ">
            <div class="newsletter1" style="
                margin-left: 10px;
            ">
              <div class="col-md-6">
                <a class="store-gird" href="#"><img class="img-responsive" src="images/photo_2023-04-11_23-46-45 (2).jpg"><span>McDonald's</span></a>
              </div>
              <div class="col-md-6">
                <a class="store-gird" href="#"><img class="img-responsive" src="images/photo_2023-04-11_23-46-44 (2).jpg"><span>shein</span></a>
              </div>

              <div class="col-md-6">
                <a class="store-gird" href="#"><img class="img-responsive" src="images/photo_2023-04-11_23-46-44.jpg"><span>H&M</span></a>
              </div>
              <div class="col-md-6">
              </div>
            </div>
            <div class="newsletter2">
              <div class="col-md-6">
                <a class="store-gird" href="#"><img class="img-responsive" src="images/photo_2023-04-11_23-46-46.jpg"><span>Domino's</span></a>
              </div>
              <div class="col-md-6">
                <a class="store-gird" href="#"><img class="img-responsive" src="images/photo_2023-05-07_17-48-24.jpg"><span>Zara</span></a>
              </div>
              <div class="col-md-6">
                <a class="store-gird" href="#"><img class="img-responsive" src="images/photo_2023-05-08_23-49-14 (2).jpg"><span>PizzaHut</span></a>
              </div>

            </div>
            <div class="newsletter3" style="
            margin-right: 10px;
        ">
              <div class="col-md-6">
                <a class="store-gird" href="#"><img class="img-responsive" src="images/photo_2023-05-07_17-47-17.jpg"><span>PAPA JOHNS</span></a>
              </div>
              <div class="col-md-6">
                <a class="store-gird" href="#"><img class="img-responsive" src="images/photo_2023-04-11_23-46-46 (3).jpg"><span>Dunkin Dounats</span></a>
              </div>
              <div class="col-md-6">
                <a class="store-gird" href="#"><img class="img-responsive" src="images/photo_2023-05-07_17-28-48.jpg"><span>Uber</span></a>
              </div>
            </div>
        </aside>
      </div>
    </div>
  </div>
  <!--start pagination-->
  <div class="pagination">
    <a href="#">&laquo;</a>
    <a href="#">1</a>
    <a href="#" class="active">2</a>
    <a href="#">3</a>
    <a href="#">4</a>
    <a href="#">5</a>
    <a href="#">6</a>
    <a href="#">&raquo;</a>
  </div>
  <!--end pagination-->
  <!--start footer-->
  <?php include('includes/footer.php') ?>

  <!--end footer-->
  <script>
    $('#seemore12').on('show.bs.collapse', function() {
      $("#des-more12").html('<a role="button" data-toggle="collapse" href="#seemore12" aria-expanded="false" aria-controls="seemore12">Less <i class="glyphicon glyphicon-menu-up"></i></a>');
    })
    $('#seemore12').on('hide.bs.collapse', function() {
      $("#des-more12").html('... <a role="button" data-toggle="collapse" href="#seemore12" aria-expanded="false" aria-controls="seemore12">More <i class="glyphicon glyphicon-menu-down"></i></a>');
    })
    $(document).ready(function(){
        console.log(location)
        if(location.search === ''){
            $('.category li:first-child input').attr('checked','checked')
        }else{
            let getId= location.search.split('=')[1];
            // if(getId === )
            $(`.category li#${getId}`).addClass('active');
            $(`.category li#${getId} input`).attr('checked','checked')
            console.log(location.search.split('='))
        }
    })
  </script>
</body>

</html>