<?php
    require_once('../database/connection.php');
    if (isset($_SESSION['admin_id'])){

        header("Location: dashboard.php");
    } 
    include('functions/login_function.php');
?>
<!doctype html>
<html lang="en">

<head>
<?php include('includes/head-tags.php') ?>


</head>

<body class="account-bg">

    <!-- Loader -->
    <div id="preloader">
        <div id="status">
            <div class="spinner"></div>
        </div>
    </div>

    <div class="account-pages my-5 pt-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card">
                        <div class="card-body">
                            <div class="text-center mt-4">
                                <div class="mb-3">
                                    <a href="index.html" class="auth-logo">
                                        <img src="../images/photo_2023-05-15_17-39-58.jpg" style="width: 80px;
                                        height: 80px;
                                        margin-bottom: -14px;
                                        border-radius: 5px;" class="logo-dark mx-auto"
                                            alt="">
                                        <img src="assets/images/logo-light.png" height="30" class="logo-light mx-auto"
                                            alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="p-3">
                                <h4 class="font-size-18 text-muted mt-2 text-center">Welcome Back !</h4>
                                <p class="text-muted text-center mb-4">Sign in to continue to DealU.</p>

                                <?php if(isset($error)) { ?>
                                <div class="alert alert-danger" role="alert">
                                    <strong><?= $error ?></strong>
                                </div>
                                <?php } ?>
                                <form class="form-horizontal" method="POST">

                                    <div class="mb-3">
                                        <label class="form-label" for="email">Email</label>
                                        <input type="email" name="email" class="form-control" id="email"
                                            placeholder="Enter Email" required>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="userpassword">Password</label>
                                        <input type="password" name="password" class="form-control" id="userpassword"
                                            placeholder="Enter password" required>
                                    </div>

                                    <div class="mb-3 row mt-4">
                                        
                                        <div class="col-sm-6 text-end">
                                            <button name="submit_login" class="btn btn-primary w-md waves-effect waves-light"
                                                type="submit">Log In</button>
                                        </div>
                                    </div>

                                    
                                </form>

                            </div>

                        </div>
                    </div>
                    <div class="mt-5 text-center">
                        ©
                            <script>document.write(new Date().getFullYear())</script> Admin dashboard<span class="d-none d-sm-inline-block"> -
                                Cearted by <i class="mdi mdi-heart text-danger"></i> DealU.</span>
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </div>


 <?php include('includes/scripts-tag.php') ?>

</body>

</html>