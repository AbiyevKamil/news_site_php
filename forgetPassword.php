<?php include "./components/header.php"; ?>
<?php 
    // if(isset($_COOKIE["uid"])){
    //     header("Location: ./index.php?error=AlreadyLoggedIn");
    // }
    if(isset($_SESSION["uid"])){
        header("Location: ./index.php?status=AlreadyLoggedIn");
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
                            case 'userNotFound':
                                echo 'User could not found. Please make sure that email in valid.';
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
                            default:
                                echo 'Oops, something went wrong. Please try again :(';
                                break;
                        }
                    ?>
                    </div>

                <?php } ?>

                <form  action="auth/forgetPasswordController.php" autocomplete="off" class="sign-form widget-form " method="POST">
                    
                    <div class="form-group">
                        <input type="email" class="form-control" placeholder="Email*" name="email" value="">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn-custom" name="submit">Send</button>
                    </div>
                    
                </form>
            </div> 
        </div>
    </section>

<?= include "components/footer.php" ?>