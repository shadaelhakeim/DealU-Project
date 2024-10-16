<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>DealU</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
  <link rel="stylesheet" href="./style.css">
  <?php include('includes/head-tags.php') ?>
  
  <style>
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
      display: flex;
      flex-direction: row;
      justify-content: space-between;
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

      margin-left: 260px;
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
    /*end header*/
    .about {
      padding: 100px 0;
      font-family: sans-serif;
    }

    .about-us-container {
      background-color: ghostwhite;
      width: 100%;
      height: 100%;
      max-width: 1020px;
      margin: 0 auto;
    }

    .about-us-header {
      background: linear-gradient(90deg, #74EBD5 0%, #9FACE6 100%);
      text-align: center;
      padding: 5px 0;
    }

    .about-heading {
      font-size: 22px;
      color: #fff;
    }

    .about-us-content {
      padding: 5px 20px;
    }

    .info-heading {
      color: #92bee1;
      font-weight: bold;
      font-size: 18px;
    }

    .info-text {
      color: #4A5059;
      font-size: 16px;
    }

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
.nav-title img {
    width: 132px;
    margin-top: -30px;
    height: 99px;
}
  </style>
</head>

<body>
    <?php include('includes/header.php') ?>
  <!--End header-->
  <!-- about -->
  <section class="about us" id="about us">
    <div class="about-us-container">
      <div class="about-us-header">
        <h2 class="about-heading">
          About Us
        </h2>
      </div>
      <div class="about-us-content">
        <div class="about-info">
          <p class="info-heading">
            Who We Are?
          </p>
          <p class="info-text">
            DealU make deals with the owners or sellers of the stores you buy from every day or even the ones you didn’t hear of before and provide customers with the simplest and quickest way to find great offers and coupons. <br> <br>
            DealU will be given you a lot of advantages:
          </p>
          <p class="info-text">
            <strong>First: </strong>it will give you the offers and coupons of the stores you buy from every day or even the ones you didn’t hear of before.<br>
            <strong>Second:</strong> it will be divided into in-stores and online offers.<br>
            <strong>Third: </strong>there will be a section for free items for our customers.<br>
            <strong>Fourth:</strong> there will be a section for ratings and reviews for the offers.
          </p>
        </div>
        <div class="about-info">
          <p class="info-heading">
            Who Benefits From Our Website?
          </p>
          <p class="info-text">
            The service DealU offers is beneficial for all parties involved; for the customer, it's a safe opportunity to test out new goods and services or goods you already know at a discount. By retaining the anticipated profit, the seller is able to sell more, expand his market, and increase sales volume in a very straightforward and uncomplicated manner. Through DealU, both parties are connected, creating a win-win deal!
          </p>
        </div>
        <div class="about-info">
          <p class="info-heading">
            Top Services and Product Categories Available on Our Website
          </p>
          <p class="info-text">
            By selecting us, getting the things you want at a discount will only take a few seconds. On our website, we have a special section where users can browse and discover great deals on the majority of the trendiest goods and services.You can easily select the brand that offers the highest rebate.Some of the most prominent categories that we cover are as follows:
          </p>
          <p class="info-text">
          <ul>
            <li>Fashion &amp; Accessories</li>
            <li>Makeup &amp; Skincare</li>
            <li>Food &amp; Restaurants</a></li>
            <li>Entertainment</li>
            <li>Transportation</li>
          </ul>
          </p>
        </div>
      </div>
    </div>
  </section>
  <!-- about -->
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
  </script>
</body>

</html>