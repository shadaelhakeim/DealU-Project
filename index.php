<?php
require_once('database/connection.php');
include('functions/home_function.php')
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php include('includes/head-tags.php') ?>
  <link rel="stylesheet" href="home_1.css">

</head>

<body>


  <?php include('includes/header.php') ?>

  <!--End header-->
  <!--start landing section-->
  <div class="landing" id="intro">
    <div class="intro">
      <div class="into_text">
        <h1>Get Best <span style="color: #b1bdf0;font-family: cursive; text-shadow: 0 2px #9FACE7;">Deal</span> And <br>Save Your Money</h1> <br>
        <h3>by getting best offers,extra coupons</h3> <br>
        <a href="login.php??>">Join now for free</a>
      </div>
      <img src="images/man-enjoying-shopping-discount (1).png" alt="">
    </div>
  </div>
  <!--End landing section-->
  <?php if (isset($message)) { ?>
    <div class="alert alert-success" role="alert">
      <div class="popup open-popup email-popup" id="popup">
        <img src="images/404-tick.png" alt="">
        <p><?= $message ?></p>
        <div>
          <div class="close-btn">
            <button type="button" onclick="closePopup()"> Close </button>
          </div>
        </div>
      </div>
    </div>

  <?php } ?>
  <?php if (isset($found)) { ?>
    <div class="popup open-popup" id="popup">
      <img src="images/404-tick.png" alt="">
      <p><?= $found ?></p>
      <div>
        <div class="close-btn">
          <button type="button" onclick="closePopup()"> Close </button>
        </div>
      </div>
    </div>

  <?php } ?>
  <?php if (isset($success)) { ?>
    <div class="popup open-popup" id="popup">
      <img src="images/404-tick.png" alt="">
      <p><?= $success ?></p>
      <div>
        <div class="close-btn">
          <button type="button" onclick="closePopup()"> Close </button>
        </div>
      </div>
    </div>

  <?php } ?>
  <!--start work sec-->
  <div class="row" style="background-color: #f0fff382;">
    <div class="work">
      <img src="images/join.png" alt="">
      <h2>1.Join</h2>
      <p>join us to get all deals & offers by sign up.</p>
    </div>
    <div class="work">
      <img src="images/coupon.png" alt="">
      <h2>Grab a Deal</h2>
      <p>Choose the best deal you like.</p>
    </div>
    <div class="work">
      <img src="images/scan.png" alt="">
      <h2>Scan QR</h2>
      <p>After geting yous best deal get the QR to be scaned in the store and get the your Discount or get the code to use it online.</p>
    </div>
  </div>
  <!--end work sec-->
  <!--start offers sec-->
  <div class="pop-offers">
    <h2>Today's Popular Offers</h2>
    <div class="offers">
      <!-- <div class="column" style=>
        <div class="coulmn1">
          <table>

            <tr>
              <th rowspan="3">
                <img src="images/photo_2023-04-11_23-46-40.jpg" alt="">
              </th>
              <th><span style="color: #f5aace;
          font-weight: bold;">20% off</span> on all items</th>
            </tr>
            <tr>
              <th>Discount 20%</th>
              <th>
                <button>GET DISCOUNT</button>
              </th>
            </tr>
          </table>
        </div>
        <div class="coulmn2">
          <table>
            <tr>
              <th rowspan="3">
                <img src="images/photo_2023-04-11_23-46-43.jpg" class="height: 90px;" alt="">
              </th>
              <th><span style="color: #f5aace;
          font-weight: bold;">20% off</span> on all items</th>
            </tr>
            <tr>
              <th>Discount 20%</th>
              <th>
                <button>GET DISCOUNT</button>
              </th>
            </tr>
          </table>
        </div>
        <div class="coulmn3">
          <table>
            <tr>
              <th rowspan="3">
                <img src="images/photo_2023-04-11_23-46-46.jpg" alt="">
              </th>
              <th><span style="color: #f5aace;
          font-weight: bold;">20% off</span> on all items</th>
            </tr>
            <tr>
              <th>Discount 20%</th>
              <th>
                <button>GET DISCOUNT</button>
              </th>
            </tr>
          </table>
        </div>
      </div>
      <div class="column">
        <div class="table2">
          <table class="col1">
            <tr>
              <th rowspan="3">
                <img src="images/photo_2023-04-11_23-46-45 (2).jpg" alt="">
              </th>
              <th><span style="color: #f5aace;
          font-weight: bold;">20% off</span> on all items</th>
            </tr>
            <tr>
              <th>Discount 20%</th>
              <th>
                <button>GET DISCOUNT</button>
              </th>
            </tr>
          </table>
          <table class="col2">
            <tr>
              <th rowspan="3">
                <img src="images/photo_2023-04-11_23-46-44.jpg" alt="">
              </th>
              <th><span style="color: #f5aace;
            font-weight: bold;">20% off</span> on all items</th>
            </tr>
            <tr>
              <th>Discount 20%</th>
              <th>
                <button>GET DISCOUNT</button>
              </th>
            </tr>
          </table>
          <table class="col3">
            <tr>
              <th rowspan="3">
                <img src="images/photo_2023-04-11_23-46-44 (2).jpg" alt="">
              </th>
              <th><span style="color: #f5aace;
          font-weight: bold;">20% off</span> on all items</th>
            </tr>
            <tr>
              <th>Discount 20%</th>
              <th>
                <button>GET DISCOUNT</button>
              </th>
            </tr>
          </table>
        </div>
      </div> -->
      <div class="row" >
      <?php
      $offers_stat = "SELECT * FROM `offers` ORDER BY id DESC limit 6";
      $offers_query = mysqli_query($connection, $offers_stat) or die('Error in cat' . mysqli_error($connection));

      while ($result = mysqli_fetch_array($offers_query)) {

      ?>
    <div class="work" style="width: auto;
    height: auto;
    margin-top: 0;
    margin-left: 0px;
    margin-right: -23px;
 ">
    <table>

      <tr>
        <th rowspan="3">
          <img src="images/<?= $result['image'] ?>" alt="">
        </th>
        <th>Get this offer at<span style="color:#89c2e3;;
                    font-weight: bold;"> Exclutive</span> price</th>
      </tr>
      <tr>
      <th>Save up to 20%</th>
        <th>
          <a href="offer_details.php?offer_id=<?= $result['id'] ?>">GET DEAL</a>
        </th>
      </tr>
      </table>
    </div>
    <?php
      }
      ?>
    
  </div>
    </div>
    <div class="join">
      <a href="offers.php" class="button"><span>Explore more offers </span></a>
    </div>
  </div>

  <!--end offers sec-->
  <!--start subscribe-->
  <div class="subscribe" style="margin-top: 65px;">
    <div class="sub">
      <p>Get notified when new coupons <br> are released</p>
      <div class="notified">
        <form method="post" style="justify-content: center;">
          <input style="margin-top: 0;" required class="email" type="email" name="email" placeholder="email">
          <button class="submit" type="submit" name="subscribe">subscribe</button>

        </form>
      </div>
    </div>
  </div>
  <!--end subsicribe sec-->

  <!--brand slider logo-->
  <div class="brands-slider-col">
    <p>Some of the brands that we work with</p>
    <div id="brand-discount-slider">
      <div class="brand-arrow-next">
        &#10095;
      </div>
      <div class="brand-arrow-prev">
        &#10094;
      </div>
      <ul>
        <li>
          <div class="brand-logo-container">
            <img src="images/photo_2023-04-15_17-43-23.jpg">
          </div>
        </li>
        <li>
          <div class="brand-logo-container">
            <img src="images/photo_2023-04-11_23-46-46.jpg">
          </div>
        </li>
        <li>
          <div class="brand-logo-container">
            <img src="images/photo_2023-04-11_23-46-46 (3).jpg">
          </div>
        </li>
        <li>
          <div class="brand-logo-container">
            <img src="images/photo_2023-04-11_23-46-44.jpg">
          </div>
        </li>
        <li>
          <div class="brand-logo-container">
            <img src="images/photo_2023-04-11_23-46-44 (2).jpg">
          </div>
        </li>
        <li>
          <div class="brand-logo-container">
            <img src="images/photo_2023-04-11_23-46-46 (2).jpg">
          </div>
        </li>
        <li>
          <div class="brand-logo-container">
            <img src="images/photo_2023-04-11_23-46-43.jpg">
          </div>
        </li>
      </ul>
    </div>
  </div>
  <!--end slider logo-->
  <!--start coupon section-->
  <div class="crd">
    <p>Best Avaliable Coupons </p>
  </div>
  <div class="container">
    <div class="card">
      <?php
      $coupons_stat = "SELECT * FROM `coupons` WHERE image != 'coupon.png' ORDER BY id DESC limit 3;";
      $coupons_query = mysqli_query($connection, $coupons_stat) or die('Error in cat' . mysqli_error($connection));

      while ($result = mysqli_fetch_array($coupons_query)) {

      ?>
        <div class="coupon-card">
          <img width="60" height="60" style="object-fit: contain;" src="images/<?= $result['image'] ?>" class="logo">

          <h3>Enjoy and get discount on your favorite items<br> <span><?= $result['percentage'] ?> %</span></h3>
          <!-- <div class="coupon-row">
          <a href="coupons.php?coupon_id=<?= $result['id'] ?>" class="cpnBtn">Copy Now</a>

        </div> -->
          <div class="coupon-row">
            <input id="cpnCode" class="myInput<?= $result['id'] ?>" value="<?= $result['code'] ?>">
            <button id="cpnBtn" class="copyBtn<?= $result['id'] ?>">COPY CODE</button>
            <!-- <span id="cpnCode" class="myInput<?= $result['id'] ?>"><?= $result['code'] ?></span>
            <span id="cpnBtn" class="copyBtn<?= $result['id'] ?>">COPY CODE</span> -->
          </div>

          <div class="circle1"></div>
          <div class="circle2"></div>
        </div>
      <?php
      }
      ?>
    </div>
  </div>
  <!--end coupn section-->

  <!--start pricing table-->
  <h1 class="p-title">Choose the best plan for you to get more offers</h1>
  <div class="pricing-table">
    <div class="ptable-item">
      <div class="ptable-single">
        <div class="ptable-header">
          <div class="ptable-title">
            <h2>Silver</h2>
          </div>
          <div class="ptable-price">
            <h2><small>$</small>99<span>/ M</span></h2>
          </div>
        </div>
        <div class="ptable-body">
          <div class="ptable-description">
            <ul>
              <li>Pure HTML & CSS</li>
              <li>Responsive Design</li>
              <li>Well-commented Code</li>
              <li>Easy to Use</li>
            </ul>
          </div>
        </div>
        <div class="ptable-footer">
          <div class="ptable-action">
            <a href="#">Not Avaliable</a>
          </div>
        </div>
      </div>
    </div>

    <div class="ptable-item featured-item">
      <div class="ptable-single">
        <div class="ptable-header">
          <div class="ptable-status">
            <span>Hot</span>
          </div>
          <div class="ptable-title">
            <h2>Gold</h2>
          </div>
          <div class="ptable-price">
            <h2><small>$</small>40<span>/ M</span></h2>
          </div>
        </div>
        <div class="ptable-body">
          <div class="ptable-description">
            <ul>
              <li>Pure HTML & CSS</li>
              <li>Responsive Design</li>
              <li>Well-commented Code</li>
              <li>Easy to Use</li>
            </ul>
          </div>
        </div>
        <div class="ptable-footer">
          <div class="ptable-action">
            <button type="button" onclick="openPopup()">Buy Now</button>

            <!-- <a href="">Buy Now</a> -->
          </div>
        </div>
      </div>
    </div>

    <div class="ptable-item">
      <div class="ptable-single">
        <div class="ptable-header">
          <div class="ptable-title">
            <h2>Platinum</h2>
          </div>
          <div class="ptable-price">
            <h2><small>$</small>80<span>/ M</span></h2>
          </div>
        </div>
        <div class="ptable-body">
          <div class="ptable-description">
            <ul>
              <li>Pure HTML & CSS</li>
              <li>Responsive Design</li>
              <li>Well-commented Code</li>
              <li>Easy to Use</li>
            </ul>
          </div>
        </div>
        <div class="ptable-footer">
          <div class="ptable-action">
            <a href="#">Not Avaliable</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--end pricing table-->
  <!--start footer-->

  <!--end footer-->
  <?php include('includes/footer.php') ?>
  <div class="popup plan-popup" id="popup">
    <!-- <img src="images/404-tick.png" alt=""> -->
    <button class="" onclick=""></button>
    <p> Submit plan for 3% percentage </p>
    <div>
      <form action="" style="display: unset;" method="POST">
        <select name="type_of_payment" class="form-control mb-sm-2" id="type_of_payment" required>
          <option value="">Choose payment method</option>
          <option value="cash">Cash</option>
          <option value="visa">Visa</option>
        </select>
        <div style="display: none; width:100%" id="visa_div">
          <input type="password" name="visa" maxlength="14" minlength="14" class="form-control my-3" placeholder="please type your visa number">
        </div>
        <?php if (isset($_SESSION['user_id'])) { ?>
          <button type="submit" class="btn btn-primary" name="submit_plan"> Submit offer </button>
        <?php } else { ?>
          <a href="login.php" type="submit" class="btn btn-primary" name="submit_plan"> Submit offer </a>
        <?php } ?>
      </form>
      <div class="close-btn">
        <button type="button" onclick="closePopupPlan()"> Close </button>
      </div>
    </div>
  </div>

  <script src="home.js"></script>
  <script>
    $('#type_of_payment').on('change', function() {
      let option = $(this).val();
      if (option === 'cash') {
        $('#visa_div').hide();
        $('#visa_div input').removeAttr('required');
      } else {
        $('#visa_div input').attr('required', 'required');
        $('#visa_div').show();

      }
    })
    let defaultPopup = document.querySelector(".popup");
    let planPopup = document.querySelector(".plan-popup");

    function openPopup() {
      planPopup.classList.add("open-popup");
    }

    function closePopup() {
      defaultPopup.classList.remove("open-popup");
    }
    function closePopupPlan() {
      planPopup.classList.remove("open-popup");
    }
    $(document).ready(function() {
      let user_id = $("#user_id").val();
      $("#myInput").val(`${location.href}&user_id=${user_id}`);
      console.log(user_id)
      console.log(`${location.href}&user_id=${user_id}`)
    })


    var cpnBtn = document.getElementById("cpnBtn");
    var cpnCode = document.getElementById("cpnCode");

    cpnBtn.onclick = function() {
      navigator.clipboard.writeText(cpnCode.innerHTML);
      cpnBtn.innerHTML = "COPIED";
      setTimeout(function() {
        cpnBtn.innerHTML = "COPY CODE";
      }, 3000);
    }
    /*start sticky*/
    window.onscroll = function() {
      myFunction()
    };

    var header = document.getElementById("myHeader");
    var sticky = header.offsetTop;

    function myFunction() {
      if (window.pageYOffset > sticky) {
        header.classList.add("sticky");
      } else {
        header.classList.remove("sticky");
      }
    }
  </script>
  <?php
  $coupons_stat = "SELECT * FROM `coupons` ORDER BY id DESC";
  $coupons_query = mysqli_query($connection, $coupons_stat) or die('Error in cat' . mysqli_error($connection));

  while ($result = mysqli_fetch_array($coupons_query)) {

  ?>
    <script>
      $('.copyBtn' + <?= $result['id'] ?>).on('click', function() {
        var copyText = document.querySelector(".myInput<?= $result['id'] ?>");
        let button = document.querySelector(".copyBtn<?= $result['id'] ?>");
        button.innerText = 'copied'
        setTimeout(() => {
          button.innerText = 'Copy Text'

        }, 5000)
        copyText.select();
        copyText.setSelectionRange(0, 99999);
        navigator.clipboard.writeText(copyText.value);
        // alert(" Copied the text : " + copyText.value);
        console.log('yes');
      })
    </script>
  <?php
  }
  ?>
  <!--scroll button-->
  <button onclick="topFunction()" id="myBtn" title="Go to top">Up</button>

<script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
</body>

</html>