$(function(){

    $("#login-success").empty().hide();
    $("#login-error").empty().hide();

    $("#login-form").submit(function(){
        email = $(this).find("input[name=email]").val();
        password = $(this).find("input[name=password]").val();

        $.post("../../actions/login.php", {email: email, password: password}, function(data){
            if(data != "ok"){
                $("#login-success").empty().hide();

                $("#login-error").show("", function(){
                    $(this).empty().append(data);
                });
            }
            else{
                $("#login-error").empty().hide();

                $("#login-success").show("", function(){
                    $(this).empty().append("Vous êtes connecté !");
                    location.reload();
                })
            }
        });

        return false;
    })
});