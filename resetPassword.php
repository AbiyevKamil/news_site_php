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
                    <h5>Reset Password</h5>
                </div>
                <form  action="auth/resetPasswordController.php" class="sign-form widget-form " method="POST">
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