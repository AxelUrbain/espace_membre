$(function(){
    $("#register-success").empty().hide();
    $("#register-error").empty().hide();
  
    $("#register-form").submit(function(){
        email = $(this).find("input[name=email]").val();
        password = $(this).find("input[name=password]").val();
        name = $(this).find("input[name=name]").val();
        firstname = $(this).find("input[name=firstname]").val();

        $.post("../../actions/add_user.php", {email: email, password: password, name: name, firstname: firstname}, function(data){
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