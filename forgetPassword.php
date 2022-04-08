<?php 
    // if(isset($_COOKIE["uid"])){
    //     header("Location: ./index.php?error=AlreadyLoggedIn");
    // }
    session_start();
    if(isset($_SESSION["uid"])){
        header("Location: ./index.php?error=AlreadyLoggedIn");
    }
?>
<?php include "./components/header.php"; ?>
 
    <!--Login-->
    <section class="section pt-55 mb-50">
        <div class="container">
            <div class="sign widget ">
                <div class="section-title">
                    <h5>Reset Password</h5>
                </div>
                <form  action="auth/forgetPasswordController.php" class="sign-form widget-form " method="POST">
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