<?php include "./components/header.php"; ?>
<?php
// if(isset($_COOKIE["uid"])){
//     header("Location: ./index.php?error=AlreadyLoggedIn");
// }
if (isset($_SESSION["uid"])) {
    header("Location: ./index.php?status=AlreadyLoggedIn");
} else if (!isset($_SESSION["user_id_for_recovery"])) {
    header("Location: ./index.php?status=SomethingWrong");
}
?>
<section class="section pt-55 mb-50">
    <div class="container">
        <div class="sign widget ">
            <div class="section-title">
                <h5>Recovery Code</h5>
            </div>

            <?php if (isset($_GET['status'])) {  ?>
                <div class="alert alert-danger p-4">
                    <?php
                    switch ($_GET['status']) {
                        case 'WrongRecoveryCode':
                            echo 'Recovery code is wrong. Please try again.';
                            break;
                        case 'codeCouldNotSave':
                            echo 'Oops, something went wrong.';
                            break;
                        case 'mailCouldNotSend':
                            echo 'Oops, something went wrong. Mail could not send';
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
                        case 'recoveryCodeSent':
                            echo 'Recovery code sent successfully.';
                            break;
                        default:
                            echo 'Oops, something went wrong. Please try again :(';
                            break;
                    }
                    ?>
                </div>

            <?php } ?>

            <p>Please check your email</p>
            <form action="auth/checkRecoveryCode.php" autocomplete="off" class="sign-form widget-form " method="POST">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Code*" name="code" value="">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn-custom" name="submit">Submit</button>
                </div>
                <p class="form-group text-center">Don't get the code? <a href="auth/resendRecoveryCode.php" class="btn-link">Resend</a> </p>
            </form>
        </div>
    </div>
</section>
<?php include "./components/footer.php"; ?>