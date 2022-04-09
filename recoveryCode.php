<?php 
    // if(isset($_COOKIE["uid"])){
    //     header("Location: ./index.php?error=AlreadyLoggedIn");
    // }
    session_start();
    if(isset($_SESSION["uid"])){
        header("Location: ./index.php?error=AlreadyLoggedIn");
    }
    else if(!isset($_SESSION["user_id_for_recovery"])){
        header("Location: ./index.php?error=SomethingWrong");
    }
?>
<?php include "./components/header.php"; ?>
 
    <section class="section pt-55 mb-50">
        <div class="container">
            <div class="sign widget ">
                <div class="section-title">
                    <h5>Recovery Code</h5>
                </div>
                <p>Please check your email</p>
                <form  action="auth/checkRecoveryCode.php" class="sign-form widget-form " method="POST">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Code*" name="code" value="">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn-custom" name="submit">Submit</button>
                    </div>
                    <p class="form-group text-center">Don't get the code? <a href="auth/forgetPasswordController.php" class="btn-link">Resend</a> </p>
                </form>
            </div> 
        </div>
    </section>

<?= include "components/footer.php" ?>