<?php
require_once('database/connection.php');
// if(isset($_GET['coupon_id'])){
//   $coupon_select = "SELECT * FROM `coupons` where `id`=" . $_GET['coupon_id'] . " ";
//   $select_query = mysqli_query($connection, $coupon_select) or die('ERROR in details' . mysqli_error($connection));
//   if (!$select_query) {
//     die('ERROR in details' . mysqli_error($connection));
//   } else {
//     $result_details = mysqli_fetch_array($select_query);
//   }
// }
?>
<!DOCTYPE html>
<html lang="en">

<head>
<?php include('includes/head-tags.php') ?>

  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="coupons.css">
  <title>Document</title>
  <style>
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
  <?php include('includes/header.php') ?>
  <!--End header-->
  <!--start fillter-->



    <!--end fillter-->
    <section class="conatiner">
    <?php
        $coupons_stat = "SELECT * FROM `coupons` WHERE `image` != 'coupon.png' ORDER BY id DESC";
        $coupons_query = mysqli_query($connection, $coupons_stat) or die('Error in cat' . mysqli_error($connection));

        while ($result = mysqli_fetch_array($coupons_query)) {

      ?>
      <div class="coupon">
        <div class="top-coupon">

          <div class="img">
            <img src="images/<?= $result['image'] ?>" alt="">
          </div>

          <div>
            <div class="coupon-discount">
              <p><?= $result['percentage'] ?>% discount</p>
            </div>
            <div class="part2">
              <div class="coupon-icon">
                <p>Coupons</p>
              </div>
              <div class="coupon-icon">
                <p>active</p>
              </div>
            </div>

          </div>
        </div>
        <div class="coupon-text">
          <input type="text" class="myInput myInput<?= $result['id'] ?>"  value="<?= $result['code'] ?>" id="myInput">
          <button id="copyBtn" class="copyBtn<?= $result['id'] ?>">Copy Text</button>
        </div>

        <div class="desciption">
          <p>Enjoy and get discount on your favorite items.</p>
        </div>
        <div class="percentage">
          <p>HOT</p>
        </div>

        <div class="trg"></div>

      </div>
          <?php 
        }
        ?>
    </section>

    <!-- <section class="see-more">

      <button name="see-more">SEE MORE <i class="fa-solid fa-angles-right"></i></button>

    </section> -->

    <!--start footer-->
    <?php include('includes/footer.php') ?>
    <!--end footer-->
    <?php
        $coupons_stat = "SELECT * FROM `coupons` WHERE `image` != 'coupon.png' ORDER BY id DESC";
        $coupons_query = mysqli_query($connection, $coupons_stat) or die('Error in cat' . mysqli_error($connection));

        while ($result = mysqli_fetch_array($coupons_query)) {

      ?>
    <script>
      $('.copyBtn'+<?= $result['id'] ?>).on('click', function(){
                var copyText = document.querySelector(".myInput<?= $result['id'] ?>");
        let button = document.querySelector(".copyBtn<?= $result['id'] ?>");
        button.innerText = 'copied'
        setTimeout(()=> {
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

</body>

</html>