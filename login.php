<?php
require_once('database/connection.php');
include('functions/authentication_function.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php include('includes/head-tags.php') ?>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="assets/bootstrap.min.css">
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap');

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      text-decoration: none;

    }

    body {

      justify-content: center;
      align-items: center;

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

      margin-left: 15px;
    }

    .nav>.nav-btn {
      display: none;
    }

    .nav>.nav-links {
      display: inline;
      float: right;
      font-size: 17px;
      margin-top: 5px;
      margin-top: 5px;
    }

    .nav>.nav-links>a {
      display: inline-block;
      padding: 7px 8px 3px 10px;
      text-decoration: none;
      color: #fff;
      margin-right: 20px;
      border-radius: 20px;
      margin-top: 5px;
      transition: all 0.5s ease;
      border-bottom: none !important;
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
    .containerl {
      margin-top: 50px;
      padding: 50px;
      margin: 50px auto;
      max-width: 820px;
      background: #fff;
      border-radius: 6px;
      box-sizing: border-box;
      box-shadow: 0px 24px 60px -1px rgba(37, 44, 54, 0.14);
      font-family: 'Poppins', sans-serif;
    }

    .containerl .title {
      font-size: 25px;
      font-weight: 500;
      position: relative;
      text-align: center;
    }

    .containerl .title::before {
      content: '';
      position: absolute;

      left: 351px;

      bottom: -5px;
      height: 3px;
      width: 50px;
      background-image: linear-gradient(90deg, #74EBD5 0%, #9FACE6 100%);
    }

    .containerl form .user_detailsl {
      display: block;
      margin: auto;
      flex-wrap: wrap;
      justify-content: space-between;
    }

    form .user_details .input_poxl {
      margin-bottom: 15px;
      margin: 20px 0 12px 0;

    }

    .user_detailsl .input_poxl {
      margin-bottom: 20px;

    }

    .user_detailsl .input_poxl .datails {
      display: block;
      font-weight: 500;
      margin-bottom: 20px;
      font-family: inherit;
    }

    .user_detailsl .input_poxl input {
      height: 45px;
      width: 100%;
      outline: none;
      border-radius: 5px;
      border: 1px solid #ccc;
      padding-left: 15px;
      font-size: 16px;
      border-bottom-width: 2px;
      transition: all 0.3s ease;

    }

    .user_detailsl .input_poxl input:focus,
    .user_detailsl .input_poxl input:valid {
      border-color: #9FACE6;
    }

    form .button {

      height: 45px;
      margin: 43px 0px 20;
      width: 500px;

    }

    form .button input {
      margin: auto;
      display: block;
      height: 100%;
      width: 300px;
      outline: none;
      color: #fff;
      border: none;
      font-size: 18px;
      font-weight: 500;
      border-radius: 5px;
      letter-spacing: 1px;
      background-image: linear-gradient(90deg, #74EBD5 0%, #9FACE6 100%);
      cursor: pointer;

    }

    form .button input :hover {
      background-image: linear-gradient(90deg, #74EBD5 0%, #9FACE6 100%);
    }

    @media (max-width: 584px) {
      body {
        width: fit-content;

      }

      .containerl {
        max-width: 100%;
      }

      form .button input {
        margin: 0 auto;
        width: 200px !important;
        display: block;
      }

      /* .containerl form .user_detailsl {
    margin-left: 0;
    } */
      form .user_detailsl .input_pox {
        margin-bottom: 15px;
        width: 100%;
      }

      form .gender_details .category {
        width: 100%;
      }

      form .button {

        width: 400px;
      }

      .containerl form .user_details {
        max-height: 300px;
        overflow: scroll;
      }

      .user_detailsl::-webkit-scrollber {
        width: 0;
      }

      .social {
        width: 100%;
        margin: 0;
        margin-bottom: 10px;
        display: flex;
        flex-wrap: nowrap;
        justify-content: flex-start;
      }

      .containerl .account {
        margin-left: -37px !important;
        margin-right: 50px;
      }

      .gender_details {
        margin-top: 30px;
      }

    }

    .last-log {
      margin-left: 150px;
    }

    .containerl .account {
      color: gray;
      text-decoration: none;
      font-size: 14;
      margin-left: 33px;

    }

    .category .account:hover {
      color: black;
    }

    .fa {
      padding: 10px;
      width: 31px;
      text-align: center;
      margin: 2px 3px;
    }

    .fa:hover {
      opacity: 0.7;
    }

    #social {
      margin-bottom: 20px;
      margin-left: 220px;
    }

    #social .fa-facebook {
      background: #3B5998;
      color: white;
      text-decoration: none;
      font-size: 10px;
      margin-right: 10px;
      margin-left: 55px;
      border-radius: 50px;
    }

    #social .fa-google {
      background: #dd4b39;
      color: white;
      text-decoration: none;
      font-size: 11px;
      margin-right: 10px;
      margin-left: 20px;
      border-radius: 50px;
    }

    #social .fa-instagram {
      background: linear-gradient(45deg, #e30b6f, #ff9d58);
      color: white;
      text-decoration: none;
      font-size: 11px;
      margin-right: 10px;
      margin-left: 20px;
      border-radius: 50px;
    }

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

    .ft-main-item ul {
      list-style: none;
    }

    .ft-main-item ul li a {
      color: gray;
    }

    .ft-title {
      color: #424141;
      font-size: 25px;
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

    .ft-title {
      color: #5e5e5e;
      padding: 5px;
      margin-bottom: 10px;
    }

    .ft-main-item .ft {
      color: gray;
      padding: 5px;
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
      list-style: none;
    }

    .ft-social-list li {
      margin: 0.5rem;
      font-size: 1.25rem;
    }

    /* Footer legal */
    .ft-legal {
      padding: 0.9375rem 1.875rem;
      background-color: #333;
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
      color: white;
      ;
    }

    /* one before the last child */
    .ft-legal-list li:nth-last-child(2) {
      flex: 1;
    }

    /* media  */
    @media (max-width: 700px) {

      form .button input {
        width: 250px;
        display: block;
        margin: auto;
      }

      #social {
        margin-left: 121px;
      }

      .last-log {
        margin-left: 52px;

      }

      .containerl .title::before {
        left: 235px;
      }
    }


    .nav-title img {
      width: 132px;

      margin-top: -25px;

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
  font-size: 15px;
  font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
}
.info span{
  font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
  color: gray;
    font-family: unset;
    font-weight: 100;
    font-size: 14px;
}
  </style>
</head>

<body>
  <!--stat header-->
  <?php include('includes/header.php') ?>


  <!--End header-->
  <div class="containerl">
    <div class="title">Sign in</div>
    <form method="POST" style="    margin-right: 30px;">
      <div class="user_detailsl">
        <div class="input_poxl">
          <span class="datails">Email</span>
          <input type="text" name="email" placeholder="enter your Email" required>
        </div>
        <div class="input_poxl">
          <span class="datails">Password</span>
          <input type="password" name="password" placeholder="enter your Password" required>
        </div>
        <div class="button">
          <button name="submit_login" type="submit" class="btn btn-info">Login </button>
        </div>
        <?php if(isset($error)) { ?>

      <div class="alert alert-danger" role="alert">
      <?php echo $error; ?>
      </div>
      <?php  } ?>
      </div>
    </form>
    <div id="social">
      <a href="#" class="fa fa-facebook"></a>
      <a href="#" class="fa fa-google"></a>
      <a href="#" class="fa fa-instagram"></a>
    </div>
    <div class="last-log">
    <a style="color:gray;" href="signup.php??>">Don't have account yet</a>
      <a class="account" href="sign up.html" target="_blank">Forget Password?</a>
    </div>
  </div>
  <!--start footer-->
  <?php include('includes/footer.php') ?>

</body>

</html>