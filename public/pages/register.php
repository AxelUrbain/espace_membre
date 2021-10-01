<?php

session_start();
include("../../inc/header.php");
include("../../inc/menu.php");
?>

<div class="container">
    <div class="col-lg-4 align-self-center">
        <h1 class="mt-3">Register form</h1>

        <div id="register-error" class="alert alert-danger"></div>
        <div id="register-success" class="alert alert-success"></div>

        <form method="post" action="" id="register-form">
            <div class="mb-3">
                <label for="InputEmail" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" id="InputEmail" required>
            </div>
            <div class="row">
                <div class="col-6">
                    <label for="InputFirstname" class="form-label">Firstname</label>
                    <input type="text" name="firstname" class="form-control" id="InputFirstname" required>
                </div>
                <div class="col-6">
                    <label for="InputName" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" id="InputName" required> 
                </div>
            </div>
            <div class="mb-3">
                <label for="InputPassword" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="InputPassword" required>
                <div class="form-text">
                    <p>At least 8 alphanumeric characters for the password</p>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Register</button>
        </form>
        <a href="../../index.php" class="mt-3" >Login form</a>
    </div>
</div>


<script type="text/javascript">
    $(function(){
        $("#register-success").empty().hide();
        $("#register-error").empty().hide();
      
        $("#register-form").submit(function(){
            email = $(this).find("input[name=email]").val();
            password = $(this).find("input[name=password]").val();
            name = $(this).find("input[name=name]").val();
            firstname = $(this).find("input[name=firstname]").val();

            $.post("../../add_user.php", {email: email, password: password, name: name, firstname: firstname}, function(data){
                if(data != "ok"){
                    $("#register-success").empty().hide();

                    $("#register-error").show("", function(){
                        $(this).empty().append(data);
                    });
                }
                else{
                    $("#register-error").empty().hide();

                    $("#register-success").show("", function(){
                        $(this).empty().append("Vous êtes enregistré !");
                    })
                }
            });

            return false;
    });
});
</script>

<?php
include("../../inc/footer.php");
?>