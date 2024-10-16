<?php
require_once('database/connection.php');
include('functions/add_to_cart_function.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php include('includes/head-tags.php') ?>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.min.css">
  <!-- <link rel="stylesheet" href="assets/bootstrap.min.css"> -->
  <link rel="stylesheet" href="offerdetails.css">
  <title>Offer Details</title>
  <style>
    * {
      box-sizing: border-box;
      margin: 0%;
      padding: 0%;
    }

    .alert {
      padding: 15px;
      margin-bottom: 20px;
      border: 1px solid transparent;
      border-radius: 4px
    }

    .alert h4 {
      margin-top: 0;
      color: inherit
    }

    .alert .alert-link {
      font-weight: bold
    }

    .alert>p,
    .alert>ul {
      margin-bottom: 0
    }

    .alert>p+p {
      margin-top: 5px
    }

    .alert-dismissable,
    .alert-dismissible {
      padding-right: 35px
    }

    .alert-dismissable .close,
    .alert-dismissible .close {
      position: relative;
      top: -2px;
      right: -21px;
      color: inherit
    }

    .alert-success {
      color: #3c763d;
      background-color: #dff0d8;
      border-color: #d6e9c6
    }

    .alert-success hr {
      border-top-color: #c9e2b3
    }

    .alert-success .alert-link {
      color: #2b542c
    }

    .alert-info {
      color: #31708f;
      background-color: #d9edf7;
      border-color: #bce8f1
    }

    .alert-info hr {
      border-top-color: #a6e1ec
    }

    .alert-info .alert-link {
      color: #245269
    }

    .alert-warning {
      color: #8a6d3b;
      background-color: #fcf8e3;
      border-color: #faebcc
    }

    .alert-warning hr {
      border-top-color: #f7e1b5
    }

    .alert-warning .alert-link {
      color: #66512c
    }

    .alert-danger {
      color: #a94442;
      background-color: #f2dede;
      border-color: #ebccd1
    }

    .alert-danger hr {
      border-top-color: #e4b9c0
    }

    .alert-danger .alert-link {
      color: #843534
    }

    .head-h2 {
      text-align: center;
      margin: 40px 0px;
    }

    section {
      width: 60%;
      margin: auto;
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
      align-items: flex-start;
    }

    .details-1 {
      width: 50%;
    }

    .details-1 img {
      width: 100%;
    }

    .details-2 {
      width: 50%;
    }

    .offerdetails {
      padding: 50px 0;
    }

    .heading-section {
      text-align: center;
      margin-bottom: 20px;
    }

    .heading-section h2 {
      font-size: 32px;
      font-weight: 500;
      padding-top: 10px;
      padding-bottom: 15px;
      font-family: 'Poppins', sans-serif;
    }

    h1 {
      font-size: 28px;
      font-weight: 700;
      margin-bottom: 5px;
    }

    .reviews-counter {
      font-size: 13px;
    }

    .reviews-counter span {
      vertical-align: -2px;
    }

    .rate {
      float: left;
      padding: 0 10px 0 0;
    }

    .rate:not(:checked)>input {
      position: absolute;
      top: -9999px;
    }

    .rate:not(:checked)>label {
      float: right;
      width: 15px;
      overflow: hidden;
      white-space: nowrap;
      cursor: pointer;
      font-size: 21px;
      color: #ccc;
      margin-bottom: 0;
      line-height: 21px;
    }

    .rate:not(:checked)>label:before {
      content: '\2605';
    }

    .rate>input:checked~label {
      color: #ffc700;
    }

    .rate:not(:checked)>label:hover,
    .rate:not(:checked)>label:hover~label {
      color: #deb217;
    }

    .rate>input:checked+label:hover,
    .rate>input:checked+label:hover~label,
    .rate>input:checked~label:hover,
    .rate>input:checked~label:hover~label,
    .rate>label:hover~input:checked~label {
      color: #c59b08;
    }

    .expiration {
      margin-bottom: 10px;
    }

    .columns {
      margin: 0 auto;
      max-width: 900px;

    }

    .details {
      position: relative;
      width: 100%;
    }


    .container {
      position: relative;
      width: 130%;
      height: 100%;
      float: left;
      margin-left: -100px;
    }

    .expiration {
      font-size: 16px;
      color: #777474;
    }

    .share-container {
      padding-left: 0;
    }


    .columns {
      margin-top: 30px;
    }

    .button {
      width: 100%;
      border-radius: 0;
    }

    #share-container {
      padding-left: 0;
    }

    #buy-container {
      padding-right: 0;
    }

    .share-button {
      background: #9FACE6;
      color: white;
      border: none;
      border-radius: 6px;
    }

    .popup {
      width: 400px;
      position: fixed;
      top: 0%;
      left: 50%;
      transform: translate(-50%, -50%) scale(0.1);
      border-radius: 15px;
      padding: 10px;
      background-color: #9FACE6;
      text-align: center;
      box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.2);
      color: #fff;
      visibility: hidden;
      transition: 0.4s, top 0.4s;
    }

    .open-popup {
      visibility: visible;
      top: 50%;
      transform: translate(-50%, -50%) scale(1);
    }

    .link-copy button {
      width: 100px;
      height: 25px;
      margin-left: -10px;
      border: 0px;
      background-color: #74EBD5;
      cursor: pointer;

    }

    .popup p {
      margin: 10px 0px;
    }

    .popup span {
      color: #74EBD5;
      font-weight: bold;
    }

    .popup img {
      width: 150px;
      margin-top: -50px;
    }

    .close-btn button {
      margin: 10px 0px;
      background-color: #74EBD5;
      box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.2);
      text-align: center;
      padding: 10px;
      border-radius: 20px;
      width: 100px;
      cursor: pointer;
    }

    .buy-button {
      background: #74EBD5;
      color: white;
      border: none;
      border-radius: 6px;
    }

    .buy-button:hover,
    .buy-button:active,
    .buy-button:focus {
      color: ghostwhite;
      opacity: 0.9;
    }

    .share-button:hover,
    .share-button:active,
    .share-button:focus {
      color: ghostwhite;
      opacity: 0.9;
    }

    @media (max-width: 769px) {

      #share-container,
      #buy-container {
        padding: 0 0 15px 0;
      }
    }

    .popup {
      width: 400px;
    }

    .review-form .form-group {
      clear: both;
      font-size: 15px;
      line-height: 24px;
      color: #7a7a7a;
    }

    .review-form .rate {
      float: none;
      display: inline-block;
    }

    .review-heading {
      font-size: 24px;
      font-weight: 600;
      line-height: 24px;
      margin-bottom: 6px;
      text-transform: uppercase;
      color: black;
    }

    .form-control:focus {
      outline: none;
      box-shadow: none;
    }

    .review-form .form-control {
      font-size: 14px;
      padding: 25px;
      font-size: 13px;
      margin-bottom: 10px;
      background: #f9f9f9;
      border: 0;
      border-radius: 10px;
    }

    .review-form input.form-control {
      height: 40px;
    }

    .review-form textarea.form-control {
      resize: none;
    }

    .round-black-btn {
      border-radius: 4px;
      background: linear-gradient(90deg, #74EBD5 0%, #9FACE6 100%);
      color: #fff;
      padding: 7px 45px;
      display: inline-block;
      margin-top: 20px;
      border: none;
      transition: all 0.5s ease-in-out 0s;
      text-transform: uppercase;
      cursor: pointer;
      margin-left: 10px;
    }

    .round-black-btn:hover,
    .round-black-btn:focus,
    .round-black-btn:active {
      color: ghostwhite;
      opacity: 0.6;
    }

    .details-1 {
      width: 50%;
    }

    .details-2 {
      width: 45%;
    }

    /*start header*/
    .nav {
      height: 60px;
      width: 100%;
      background-image: linear-gradient(90deg, #74EBD5 0%, #9FACE6 100%);
      position: relative;
      opacity: 0.8;
      font-family: 'Times New Roman', Times, serif;
    }

    .nav>.nav-header {
      display: inline;
    }

    .nav>.nav-header>.nav-title {
      display: inline-block;
      font-size: 22px;
      color: #fff;
      padding: 15px 10px 7px 10px;
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
      padding: 9px 9px 8px 10px;
      text-decoration: none;
      color: #ffffff;
      margin-right: 20px;
      border-radius: 20px;

    }

    .nav>.nav-links>a:hover {
      background-color: rgba(0, 0, 0, 0.3);
    }

    .nav>#nav-check {
      display: none;
    }

    @media (max-width:800px) {


      .popup {
        width: 320px;
      }

      .details-1 {
        width: 100%;
      }

      .details-2 {
        margin-top: 15px;
        width: 100%;
      }

      section {
        width: 90%;
      }



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
        padding: 10px;
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
     /* Footer main */
.ft-main {
    padding: -2.85rem 1.875rem;
    display: flex;
    flex-wrap: wrap;
    margin-top: 25px;
    font-family: initial;
    border-top: 1px solid gainsboro;
    margin-top: 70px;
    
}
@media only screen and (min-width: 29.8125rem /* 477px */) {
 .ft-main {
   justify-content: space-evenly;
 }
}
@media only screen and (min-width: 77.5rem /* 1240px */) {
 .ft-main {
   justify-content: space-evenly;
 }
}
.ft-main-item {
 padding: 1.25rem;
 min-width: 12.5rem;
}
.ft-main-item ul {
list-style: none;
text-decoration: none!important;
}
.ft-main-item li {
 list-style: none;
}
.ft-main-item ul li a{
color: gray;
}
.ft-title{
    color: rgb(109, 108, 108);
}
.ft{
    color: gray;
}

/* Footer main | Newsletter form */
.form1 {
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
.ft-title{
    color: #5e5e5e;
    padding: 5px;
    margin-bottom: 10px;  
    font-weight: bold;
    font-size: 25px;
}
.ft-main-item .ft{
   color: gray;
    padding: 5px;
}
.ft-title ul{
    list-style: none;
}
.ft-title ul li{
    list-style: none!important;
}
.ft-title ul li a{
   border-bottom: none!important;
}
/* Footer social */
.ft-social {
 padding: 0 1.875rem 1.25rem;
}
.ft-social-list {
 display: flex;
 justify-content: center;
 border-top: 1px #77777785  solid;
 padding-top: 1.25rem;
}
.ft-social-list li {
 margin: 0.5rem;
 font-size: 1.25rem;
 list-style: none!important;
}
/* Footer legal */
.ft-legal {
    padding: 0.775rem 2.875rem;
    background-color: #333;
    display: flex;
    margin-top: 6px;
    margin-bottom: -42px;
}
.ft-legal-list {
 width: 100%;
 display: flex;
 flex-wrap: wrap;
 list-style: none;
}
.ft-legal-list li {
 margin: 0.125rem 0.625rem;
 white-space: nowrap;
}
.ft-legal-list li {
 color: white;;
}
/* one before the last child */
.ft-legal-list li:nth-last-child(2) {
   flex: 1;
}
.nav-title img{
    width: 132px;
    margin-top: -39px;
    height: 99px;
}
.content{
  padding: 10px;
}
.info{
  display: flex;
    align-items: baseline;
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
footer section{
  display: none;
  width: 100%;
}

  </style>
</head>

<body>
  <!--start header-->

  <?php include('includes/header.php') ?>

  <!--End header-->
  <div class="head-h2" style="
    font-size: 24px;
    font-family: cursive;
    text-transform: capitalize;">
    <h2>Offer Details</h2>
  </div>
  <section>

    <div class="my-2" style="width: 100%;">

      <?php if (isset($success)) { ?>
        <div class="alert alert-success" role="alert">
          <strong><?= $success ?></strong>
        </div>
      <?php } elseif (isset($already_added_item)) { ?>
        <div class="alert alert-warning" role="alert">
          <strong><?= $already_added_item ?></strong>
        </div>

      <?php } ?>
    </div>
  </section>
  <section>
    <div class=" details-1">
      <img src="images/<?= $result_details['image'] ?>" alt="">
    </div>
    <div class=" details-2">
      <div class="details">
        <h1><?= $result_details['name'] ?></h1>


        <p class="description"><?= $result_details['description'] ?></p>
        <p class="expiration">Expires <?= $result_details['expires_in'] ?></p>


        <div class="columns">

          <div class="column" id="share-container">
            <?php  if(isset($_SESSION['user_id'])){ ?>
              <input type="hidden" value="<?= $_SESSION['user_id'] ?>" id="user_id">
            <button class="button share-button" onclick="openPopup()">
              <span class="icon is-small">
                <i class="fas fa-share"></i>
              </span>
              <span>SHARE OFFER</span>
            </button>
            <?php }else{ ?>
              <a href="login.php" class="button share-button" >
              <span class="icon is-small">
                <i class="fas fa-share"></i>
              </span>
              <span>SHARE OFFER</span>
            </a>
            <?php } ?>
          </div>

          <div class="column" id="buy-container">
            <?php if (isset($_SESSION['user_id'])) {  ?>
              <form method="post">

                <button type="submit" name="add_to_cart" class="button buy-button">
                  <span class="icon is-small">
                    <i class="fas fa-shopping-cart"></i>
                  </span>
                  <span>ADD TO CART</span>
                </button>
              </form>
            <?php } else { ?>
              <a href="login.php" class="button buy-button">
                <span class="icon is-small">
                  <i class="fas fa-shopping-cart"></i>
                </span>
                <span>ADD TO CART</span>
              </a>
            <?php } ?>
          </div>

        </div>
        <div class="review" id="review">
          <div class="review-heading">REVIEWS</div>
          <form class="review-form" method="POST">

            <div class="form-group">
              <label>Your rating</label>
              <div class="reviews-counter">
                <div class="rate">
                  <input type="radio" id="star5" name="rate" value="5" checked />
                  <label for="star5" title="text">5 stars</label>
                  <input type="radio" id="star4" name="rate" value="4" checked />
                  <label for="star4" title="text">4 stars</label>
                  <input type="radio" id="star3" name="rate" value="3" checked />
                  <label for="star3" title="text">3 stars</label>
                  <input type="radio" id="star2" name="rate" value="2" />
                  <label for="star2" title="text">2 stars</label>
                  <input type="radio" id="star1" name="rate" value="1" />
                  <label for="star1" title="text">1 star</label>
                </div>
                <span>Reviews</span>
              </div>
            </div>

            <div class="form-group">
              <label>Your message</label> <br>
              <textarea class="form-control" rows="10" style="width:400px;" name="message" required></textarea>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <input type="text" name="name" required class="form-control" placeholder="Name*" style="width: 400px;">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <input type="email" name="email" required class="form-control" placeholder="Email*" style="width: 400px;">
                </div>
              </div>
            </div>
            <?php if (isset($_SESSION['user_id'])) {  ?>

            <button type="submit" name="submit_review" class="round-black-btn">Submit Review</button>
            <?php }else{ ?>
              <a href="login.php" class="round-black-btn">Submit Review</a>
            <?php } ?>
          </form>

        </div>

      </div>

    </div>

    <div class="popup" id="popup">
      <img src="images/404-tick.png" alt="">
      <p> Share the link and get offer 100% , to get this offer <span>1000</span> views are required.</p>
      <div>
        <div class="link-copy">
          <input type="text" value="" id="myInput">
          <button id="copyBtn" onclick="myFuntion()">Copy Text</button>
        </div>
        <div class="close-btn">
          <button type="button" onclick="closePopup()"> OK </button>
        </div>
      </div>
    </div>
  </section>
  <?php include('includes/footer.php') ?>
  <!--end footer-->

  <script>
    let popup = document.getElementById("popup");

    function openPopup() {
      popup.classList.add("open-popup");
    }

    function closePopup() {
      popup.classList.remove("open-popup");
    }
    $(document).ready(function(){
      let user_id = $("#user_id").val();
      $("#myInput").val(`${location.href}&user_id=${user_id}`);
      console.log(user_id)
      console.log(`${location.href}&user_id=${user_id}`)
    })

    function myFuntion() {
      var copyText = document.getElementById("myInput");
      let button = document.getElementById("copyBtn");

      copyText.select();
      copyText.setSelectionRange(0, 99999);
      navigator.clipboard.writeText(copyText.value);
      button.innerText = 'copied'
        setTimeout(()=> {
          button.innerText = 'Copy Text'

        }, 5000)
      // alert(" Copied the text : " + copyText.value);
      console.log('yes');
    }
  </script>
</body>

</html>