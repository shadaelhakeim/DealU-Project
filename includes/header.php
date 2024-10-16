<div class="nav">
    <input type="checkbox" id="nav-check">
    <div class="nav-header">
      <div class="nav-title">
        <img src="images/photo_2023-05-15_18-32-23-removebg-preview.png" alt="">
      </div>
    </div>
    <div class="nav-btn">
      <label for="nav-check">
        <span></span>
        <span></span>
        <span></span>
      </label>
    </div>

    <div class="nav-links">
      <a href="index.php">Home</a>
      <a href="offers.php">Offers</a>
      <!-- <a href="coupons.html">Coupons</a> -->
      <a href="coupons.php">Coupons</a>
      <a href="about.php">About</a>
      <?php if(isset($_SESSION['user_id'])){ ?>

      <a href="cart.php">Cart</a>
      <?php } ?>
      
      <?php if(isset($_SESSION['user_id'])){ ?>
        <a class="active" href="profile.php">Profile</a>
        <a class="active" href="logout.php">Logout</a>

      <?php }else{ ?>
      <a class="active" href="signup.php" target="_blank">Sign Up</a>
      <a class="not-active" href="login.php" target="_blank">Log In</a>
      <?php } ?>
    </div>
  </div>