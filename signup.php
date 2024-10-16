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

  <title>DealU</title>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap');


    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      text-decoration: none;

    }

    /*start header*/
    .nav {
      height: 60px;
      width: 100%;
      background-image: linear-gradient(90deg, #74EBD5 0%, #9FACE6 100%);
      position: relative;
      opacity: 0.9;
      font-family: 'Times New Roman', Times, serif !important;
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
    .sign {
      margin-top: 50px;
      padding: 30px;
    }

    .container {
      padding: 50px;
      margin: 50px auto;
      max-width: 820px;
      background: #fff;
      border-radius: 6px;
      box-sizing: border-box;
      box-shadow: 0px 24px 60px -1px rgba(37, 44, 54, 0.14);
      font-family: 'Poppins', sans-serif;
    }

    .container .title {
      font-size: 25px;
      font-weight: 500;
      position: relative;
    }

    .container .title::before {
      content: '';
      position: absolute;
      left: 0;
      bottom: 0;
      height: 3px;
      width: 30px;
      background-image: linear-gradient(90deg, #74EBD5 0%, #9FACE6 100%);
    }

    .container form .user_details {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
    }

    form .user_details .input_pox {
      margin-bottom: 15px;
      margin: 20px 0 12px 0;
      width: calc(100% / 2 - 20px);
    }

    .user_details .input_pox .datails {
      display: block;
      font-weight: 500;
      margin-bottom: 5px;
    }

    .user_details .input_pox input {
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

    .user_details .input_pox input:focus,
    .user_details .input_pox input:valid {
      border-color: #9FACE6;
    }

    .gender_details {
      width: 589px;
    }

    form .gender_details .gender_title {
      font-size: 20px;
      font-weight: 500;
    }

    form .gender_details .category {
      display: flex;
      width: 80%;
      margin: 14px 0;
      justify-content: space-between;
    }

    .gender_details .category label {
      display: flex;
    }

    .gender_details .category .dot {
      height: 18px;
      width: 18px;
      background: #d9d9d9;
      border-radius: 50%;
      margin-right: 10px;
      border: 5px solid transparent;
    }

    #dot-1:checked~.category label .one,
    #dot-2:checked~.category label .two,
    #dot-3:checked~.category label .three {
      border-color: #d9d9d9;
      background-color: #9FACE6;
    }

    form input[type="radio"] {
      display: none;
    }

    form .button {
      height: 45px;
      margin: 45px 0 20px;
    }

    form .button button {
      height: 100%;
      width: 100%;
      outline: none;
      color: #fff;
      border: none;
      font-size: 18px;
      font-weight: 500;
      border-radius: 5px;
      letter-spacing: 1px;
      background-image: linear-gradient(90deg, #74EBD5 0%, #9FACE6 100%);
      cursor: pointer;
      margin-left: 200px;

    }

    form .button button :hover {
      background-image: linear-gradient(90deg, #74EBD5 0%, #9FACE6 100%);
      opacity: 0.7;
    }

    @media (max-width: 584px) {
      .container {
        max-width: 100%;
      }

      form .button input {
        margin-left: 3px;
        width: 247px;
      }

      form .user_details .input_pox {
        margin-bottom: 15px;
        width: 100%;
      }

      form .gender_details .category {
        width: 100%;
      }

      .container form .user_details {
        max-height: 300px;
        overflow: scroll;
      }

      .user_details::-webkit-scrollber {
        width: 0;
      }

      .social {
        width: 100%;
        margin: 0;
        margin-left: 2px !important;
        margin-bottom: 10px;
        display: flex;
        flex-wrap: nowrap;
        justify-content: flex-start;
      }

      .container .account {
        margin-left: 51px !important;
      }

      .gender_details {
        margin-top: 30px;
      }
    }

    .container .account {
      color: gray;
      text-decoration: none;
      font-size: 14;
      margin-left: 275px;
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
      color: #5e5e5e;
      padding: 5px;
      margin-bottom: 10px;
    }

    .ft-main-item .ft {
      color: gray;
      padding: 5px;
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

    .nav-title img {
      width: 132px;

      margin-top: -25px;

      height: 99px;
    }

    @media (max-width: 700px) {
      form .button input {
        margin-left: 100px;
      }

      #social {

        margin-left: 69px;

      }

      .container .account {
        margin-left: 131px;
      }
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
  <div class="sign">
    <div class="container">
    <?php if(isset($error)) { ?>

<div class="alert alert-danger" role="alert">
<?php echo $error; ?>
</div>
<?php  } ?>
        <?php if(isset($register_message)) { ?>

<div class="alert alert-success" role="alert">
<?php echo $register_message; ?>
</div>
<?php  } ?>
      <div class="title">Registation</div>
      <form  method="POST">
        <div class="user_details">
          <div class="input_pox">
            <span class="datails">Full Name</span>
            <input type="text" name="name" placeholder="enter your name" required>
          </div>
          <div class="input_pox">
            <span class="datails">Email</span>
            <input type="email" name="email" placeholder="enter your Email" required>
          </div>
          <div class="input_pox">
            <span class="datails">Phone Number</span>
            <input type="number" name="phone" placeholder="enter your Phone" required>
          </div>
          <div class="input_pox">
            <span class="datails">Address</span>
            <input type="text" name="address" placeholder="enter your Address" required>
          </div>
          <div class="input_pox">
            <span class="datails">Password</span>
            <input type="password" name="password" placeholder="enter your Password" required>
          </div>
          <div class="input_pox">
            <span class="datails">Confirm Password</span>
            <input type="password" name="c_password" placeholder="Confirm your Password" required>
          </div>
        </div>
        <div class="gender_details">
          <input type="radio" name="gender" id="dot-1" value="male">
          <input type="radio" name="gender" id="dot-2" value="female">
          <span class="gender_title"> Gender</span>
          <div class="category">
            <label for="dot-1">
              <span class="dot one"></span>
              <span class="gender">Male</span>
            </label>
            <label for="dot-2">
              <span class="dot two"></span>
              <span class="gender">Female</span>
            </label>

          </div>
        </div>
        <div class="button">
          <button type="submit" name="submit_register">Register</button>
        </div>

      </form>
      <div id="social">
        <a href="#" class="fa fa-facebook"></a>
        <a href="#" class="fa fa-google"></a>
        <a href="#" class="fa fa-instagram"></a>
      </div>
      <a class="account" href="login.php" target="_blank">Already have account </a>
    </div>
  </div>
  <!--start footer-->
  <footer>
    <!-- Footer main -->
    <section class="ft-main">
      <div class="ft-main-item">
        <h2 class="ft-title">About</h2>
        <ul>
          <li><a href="#">Services</a></li>
          <li><a href="#">Portfolio</a></li>
          <li><a href="#">Pricing</a></li>
          <li><a href="#">Customers</a></li>
          <li><a href="#">Careers</a></li>
        </ul>
      </div>
      <div class="ft-main-item">
        <h2 class="ft-title">Resources</h2>
        <ul>
          <li><a href="#">Docs</a></li>
          <li><a href="#">Blog</a></li>
          <li><a href="#">eBooks</a></li>
          <li><a href="#">Webinars</a></li>
        </ul>
      </div>
      <div class="ft-main-item">
        <h2 class="ft-title">Contact</h2>
        <ul>
          <li><a href="#">Help</a></li>
          <li><a href="#">Sales</a></li>
          <li><a href="#">Advertise</a></li>
        </ul>
      </div>
      <div class="ft-main-item">
        <h2 class="ft-title">Stay Updated</h2>
        <p class="ft">Subscribe to our newsletter to get our latest news.</p>
        <form>
          <input type="email" name="email" placeholder="Enter email address">
          <input type="submit" value="Subscribe">
        </form>
        <div class="content">
                        <!-- Info-1 -->
                        <div class="info">
                            <i style=" color: gray; margin-right: 5px;" class="fas fa-mobile-alt"></i>
                            <h4 class="d-inline-block">PHONE :
                                <br>
                                <span>01245782164</span></h4>
                        </div>
                        <!-- Info-2 -->
                        <div class="info">
                            <h4 style="margin-left:5px;" class="d-inline-block">EMAIL :
                                <br>
                                <span>support@DealU.com</span></h4>
                        </div>
                    </div>
      </div>
    </section>

    <!-- Footer social -->
    <section class="ft-social">
      <ul class="ft-social-list">
        <li><a href="#"><i class="fa fa-facebook" style="color: gray;"></i></a></li>
        <li><a href="#"><i class="fa fa-twitter" style="color: gray;"></i></a></li>
        <li><a href="#"><i class="fa fa-instagram" style="color: gray;"></i></a></li>
        <li><a href="#"><i class="fa fa-linkedin" style="color: gray;"></i></a></li>
      </ul>
    </section>

    <!-- Footer legal -->
    <section class="ft-legal">
      <ul class="ft-legal-list">
        <li><a href="#" style="color:white;">Terms &amp; Conditions</a></li>
        <li><a href="#" style="color: white;">Privacy Policy</a></li>
        <li>&copy; 2023 Copyright for DealU.</li>
      </ul>
    </section>
  </footer>
  <!--end footer-->
</body>

</html>