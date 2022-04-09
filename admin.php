<?php
// if(isset($_COOKIE["uid"])){
//     header("Location: ./index.php?error=AlreadyLoggedIn");
// }
session_start();
if (isset($_SESSION["uid"])) {
    header("Location: ./index.php?error=AlreadyLoggedIn");
}
?>
<?php include "./components/header.php"; ?>


<!--Login-->
<section class="section pt-55 mb-50">
    <div class="container">
        <div class="sign widget ">
            <div class="section-title">
                <h5>Admin Login</h5>
            </div>
            <form action="auth/doAdminLogin.php" class="sign-form widget-form " method="POST">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Username*" name="username" value="">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Password*" name="password" value="">
                </div>
                <div class="sign-controls form-group">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="rememberMe">
                        <label class="custom-control-label" for="rememberMe">Remember Me</label>
                    </div>
                    <a href="forgetPassword.php" class="btn-link  ml-auto">Forgot Password?</a>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn-custom" name="submit">Login</button>
                </div>

                <!-- <p class="form-group text-center">Don't have an account? <a href="register.php" class="btn-link">Create One</a> </p> -->

            </form>
        </div>
    </div>
</section>


<?= include "components/footer.php" ?>