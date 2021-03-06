<?php include "./components/header.php"; ?>
<?php
// if(isset($_COOKIE["uid"])){
//     header("Location: ./index.php?error=AlreadyLoggedIn");
// }
if (!isset($_SESSION["uidNA"])) {
    header("Location: ./index.php?status=NotLogIn");
}
?>
<section class="section pt-55 mb-50">
    <div class="container">
        <div class="sign widget ">
            <div class="section-title">
                <h5>Confirm your account</h5>
            </div>

            <?php if (isset($_GET['status'])) {  ?>
                <div class="alert alert-danger p-4">
                    <?php
                    switch ($_GET['status']) {
                        case 'userNotFound':
                            echo 'User could not found. Please try again.';
                            break;
                        case 'codeCouldNotSave':
                            echo 'Oops, something went wrong while sending recovery mail #1.';
                            break;
                        case 'mailCouldNotSend':
                            echo 'Oops, something went wrong while sending recovery mail #2.';
                            break;
                        case 'connectionFailed':
                            echo 'Oops, something went wrong while connecting to the server. Please try again :(';
                            break;
                        case 'userCouldNotFound':
                            echo 'User could not found. Please try again.';
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
                        case 'codeResent':
                            echo 'Confirmation code resent.';
                            break;
                        default:
                            echo 'Oops, something went wrong. Please try again :(';
                            break;
                    }
                    ?>
                </div>

            <?php } ?>

            <form action="auth/doApprove.php" autocomplete="off" class="sign-form widget-form " method="POST">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Code*" name="confirm_account" value="">
                </div>

                <div class="form-group">
                    <button type="submit" class="btn-custom" name="submit">Confirm</button>
                </div>

                <p class="form-group text-center">Don't get the code? <a href="auth/resendConfirmCode.php" class="btn-link">Resend</a> </p>

            </form>
        </div>
    </div>
</section>


<?php include "./components/footer.php"; ?>