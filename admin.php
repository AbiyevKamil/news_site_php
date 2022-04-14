<?php include "./components/header.php"; ?>
<?php
// if(isset($_COOKIE["uid"])){
//     header("Location: ./index.php?error=AlreadyLoggedIn");
// }
if (isset($_SESSION["uid"])) {
    header("Location: ./index.php?status=AlreadyLoggedIn");
}
?>

<!--Login-->
<section class="section pt-55 mb-50">
    <div class="container">
        <div class="sign widget ">
            <div class="section-title">
                <h5>Admin Login</h5>
            </div>

            <?php if (isset($_GET['status'])) {  ?>
                <div class="alert alert-danger p-4">
                    <?php
                    switch ($_GET['status']) {
                        case 'loginFailed':
                            echo 'Something went wrong while registering.';
                            break;
                        case 'NotAdmin':
                            echo 'This user is not admin.';
                            break;
                        case 'emptyInput':
                            echo 'Fill all the fields.';
                            break;
                        case 'wrongPassword':
                            echo 'Invalid password. Please try again.';
                            break;
                        case 'userDoesNotExist':
                            echo 'Invalid username or email. Please try again.';
                            break;
                        case 'connectionFailed':
                            echo 'Oops, something went wrong while connecting to the server. Please try again :(';
                            break;
                        default:
                            echo 'Oops, something went wrong. Please try again :(';
                            break;
                    }
                    ?>
                </div>

            <?php } ?>

            <?php if (isset($_GET['success'])) {  ?>
                <div class="alert alert-success p-4">
                    <?php
                    switch ($_GET['success']) {
                        case 'passwordResetedSuccessfully':
                            echo 'Password reset successfully.';
                            break;
                        default:
                            echo 'Oops, something went wrong. Please try again :(';
                            break;
                    }
                    ?>
                </div>

            <?php } ?>

            <form action="auth/doAdminLogin.php" autocomplete="off" class="sign-form widget-form " method="POST">
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
<?php include "./components/footer.php"; ?>