<?php
    session_start();
    include("inc/header.php");
    include("inc/menu.php");

    if(isset($_SESSION['account'])){
        header('Location: public/pages/account.php');
    }else{
        ?>
            <div class="container">
                <div class="col-lg-4 align-self-center">
                    <h1 class="mt-3">Login form</h1>
                    <div id="login-error" class="alert alert-danger"></div>
                    <div id="login-success" class="alert alert-success"></div>
                    <form method="post" action="" id="login-form">
                        <div class="mb-3">
                            <label for="InputEmail" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" id="InputEmail" required>
                        </div>
                        <div class="mb-3">
                            <label for="InputPassword" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" id="InputPassword" required>
                            <div class="form-text">
                                <a href="public/pages/register.php">Register new account</a>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Login</button>
                    </form>
                </div>
            </div>
        <?php
    }
?>

<script src="public/js/user_login.js" type="text/javascript"></script>

<?php
    include("inc/footer.php");
?>