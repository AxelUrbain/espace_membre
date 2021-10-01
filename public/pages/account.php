<?php
    session_start();
    include("../../inc/header.php");
    include("../../inc/menu.php");

    $profil = $_SESSION['account'];
?>

<div class="container">
    <div class="col-lg-4 align-self-center">
        <h1 class="mt-3">Modify account</h1>

        <div id="modify-error" class="alert alert-danger"></div>
        <div id="modify-success" class="alert alert-success"></div>

        <form method="post" action="" id="modify-form">
            <input type="hidden" name="email" class="form-control" id="InputEmail" value="<?php echo $profil->email; ?>">
            
            <div class="row">
                <div class="col-6">
                    <label for="InputFirstname" class="form-label">Firstname</label>
                    <input type="text" name="firstname" class="form-control" id="InputFirstname" value="<?php echo $profil->firstname; ?>" required>
                </div>
                <div class="col-6">
                    <label for="InputName" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" id="InputName" value="<?php echo $profil->name; ?>" required>
                </div>
            </div>
            <div class="mb-3">
                <label for="InputPassword" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="InputPassword" value="<?php echo $profil->password; ?>" required>
                <div class="form-text">
                    <p>At least 8 alphanumeric characters for the password</p>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Modify account</button>
        </form>
    </div>
</div>

<script type="text/javascript">
    $(function(){
        $("#modify-success").empty().hide();
        $("#modify-error").empty().hide();
      
        $("#modify-form").submit(function(){
            email = $(this).find("input[name=email]").val();
            password = $(this).find("input[name=password]").val();
            name = $(this).find("input[name=name]").val();
            firstname = $(this).find("input[name=firstname]").val();

            $.post("../../update_user.php", {email: email, password: password, name: name, firstname: firstname}, function(data){
                if(data != "ok"){
                    $("#modify-success").empty().hide();

                    $("#modify-error").show("", function(){
                        $(this).empty().append(data);
                    });
                }
                else{
                    $("#modify-error").empty().hide();

                    $("#modify-success").show("", function(){
                        $(this).empty().append("Vous avez modifié votre profil !");
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