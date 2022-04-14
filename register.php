<?php include "./components/header.php"; ?>

<!--register-->
<section class="section pt-55 mb-50">
    <div class="container-fluid">
        <div class="sign widget">
            <div class="section-title">
                <h5>Sign up</h5>
            </div>
            <?php if (isset($_GET['status'])) {  ?>
                <div class="alert alert-danger p-4">
                    <?php
                    switch ($_GET['status']) {
                        case 'registerFailed':
                            echo 'Something went wrong while registering.';
                            break;
                        case 'emptyInput':
                            echo 'Fill all the fields.';
                            break;
                        case 'invalidUsername':
                            echo 'Invalid username. Please try again.';
                            break;
                        case 'invalidEmail':
                            echo 'Invalid email. Please try again.';
                            break;
                        case 'passwordsDoNotMatch':
                            echo 'Passwords do not match. Please try again.';
                            break;
                        case 'UserAlreadyExists':
                            echo 'This user already exists or this username/email is taken. Please try again.';
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
            <form autocomplete="off" action="auth/doRegister.php" class="sign-form widget-form contact_form " method="POST">
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
                <div class="form-group">
                    <button type="submit" class="btn-custom" name="submit">Sign Up</button>
                </div>
                <p class="form-group text-center">Already have an account? <a href="login.php" class="btn-link">Login</a> </p>
            </form>
        </div>


    </div>
</section>

<?php include "./components/footer.php"; ?>