<?php include "./components/header.php"; ?>
<?php 
    // if(isset($_COOKIE["uid"])){
    //     header("Location: ./index.php?error=AlreadyLoggedIn");
    // }
    if(isset($_SESSION["uid"])){
        header("Location: ./index.php?status=AlreadyLoggedIn");
    }
    else if(!isset($_SESSION["user_id_for_recovery"])){
        header("Location: ./index.php?status=SomethingWrong");
    }
?>
    <section class="section pt-55 mb-50">
        <div class="container">
            <div class="sign widget ">
                <div class="section-title">
                    <h5>Reset Password</h5>
                </div>

                <?php if (isset($_GET['status'])) {  ?>
                    <div class="alert alert-danger p-4">
                    <?php
                        switch ($_GET['status']) {
                            case 'resettingFailed':
                                echo 'Recovery code is wrong. Please try again.';
                                break;
                            case 'passwordsDoNotMatch':
                                echo 'Passwords do not match. Please try again.';
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

                <form  action="auth/resetPasswordController.php" autocomplete="off" class="sign-form widget-form " method="POST">
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="New password*" name="password" value="">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Confirm password*" name="re_password" value="">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn-custom" name="submit">Reset</button>
                    </div>
                    
                </form>
            </div> 
        </div>
    </section>

<?= include "components/footer.php" ?>