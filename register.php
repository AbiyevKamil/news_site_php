<?php include "./components/header.php"; ?>

<!--register-->
<section class="section pt-55 mb-50">
        <div class="container-fluid">
            <div class="sign widget">
                <div class="section-title">
                    <h5>Sign up</h5>
                </div>
                
                <form action="auth/doRegister.php" class="sign-form widget-form contact_form " method="POST">
                    <div class="form-group">
                    
                    <input type="text" class="form-control" placeholder="Username*" name="username" value="">
                    </div>

                    <div class="form-group">
                    
                    <input type="text" class="form-control" placeholder="Full Name*" name="full_name" value="">
                    </div>

                    <div class="form-group">
                    
                    <input type="email" class="form-control" placeholder="Email Address*" name="email" value="">
                    </div>

                    <div class="form-group">
                    
                    <input type="password" class="form-control" placeholder="Password*" name="password" value="">
                    </div>

                    <div class="form-group">
                    
                    <input type="password" class="form-control" placeholder="Confirm password*" name="re_password" value="">
                    </div>
                    <div class="sign-controls form-group">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="rememberMe">
                        <label class="custom-control-label" for="rememberMe">Agree to our <a href="#" class="btn-link">terms & conditions</a> </label>
                    </div>
                    </div>
                    <div class="form-group">
                    <button type="submit" class="btn-custom" name="submit">Sign Up</button>
                    </div>
                    <p class="form-group text-center">Already have an account? <a href="login.html" class="btn-link">Login</a> </p>
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