<?php 
    // if(isset($_COOKIE["uid"])){
    //     header("Location: ./index.php?error=AlreadyLoggedIn");
    // }
    session_start();
    if(!isset($_SESSION["uid"])){
        header("Location: ./index.php?error=NotLogIn");
    }
?>
<?php include "./components/header.php"; ?>

    <section class="section pt-55 mb-50">
        <div class="container">
            <div class="sign widget ">
                <div class="section-title">
                    <h5>Confirm your account</h5>
                </div>
                <form  action="auth/doApprove.php" class="sign-form widget-form " method="POST">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Code*" name="confirm_account" value="">
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn-custom" name="submit">Confirm</button>
                    </div>
                    
                    <p class="form-group text-center">Don't get the code? <a href="auth/sendConfirmCode.php" class="btn-link">Resend</a> </p>
                    
                </form>
            </div> 
        </div>
    </section>        

    <!--newsletter-->
    <section class="newslettre">
        <div class="container-fluid">
            <div class="newslettre-width text-center">
                <div class="newslettre-info">
                    <h5>Subscribe to our Newslatter</h5>
                    <p> Sign up for free and be the first to get notified about new posts. </p>
                </div>
                <form action="#" class="newslettre-form">
                    <div class="form-flex">
                        <div class="form-group">
                            <input type="email" class="form-control" placeholder="Your email adress" required="required">
                        </div>
                        <button class="submit-btn" type="submit">Subscribe</button>
                    </div>
                </form>
                <div class="social-icones">
                    <ul class="list-inline">
                        <li>
                            <a href="#">
                                <i class="fab fa-facebook-f"></i>Facebook</a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fab fa-twitter"></i>Twitter </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fab fa-instagram"></i>Instagram </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fab fa-youtube"></i>Youtube</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>


    <?= include "components/footer.php" ?>