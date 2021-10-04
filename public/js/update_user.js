$(function(){
    $("#modify-success").empty().hide();
    $("#modify-error").empty().hide();
  
    $("#modify-form").submit(function(){
        email = $(this).find("input[name=email]").val();
        password = $(this).find("input[name=password]").val();
        name = $(this).find("input[name=name]").val();
        firstname = $(this).find("input[name=firstname]").val();

        $.post("../../actions/update_user.php", {email: email, password: password, name: name, firstname: firstname}, function(data){
            if(data != "ok"){
                $("#modify-success").empty().hide();

                $("#modify-error").show("", function(){
                    $(this).empty().append(data);
                });
            }
            else{
                $("#modify-error").empty().hide();

                $("#modify-success").show("", function(){
                    $(this).empty().append("You've changed your profile !");
                })
            }
        });

        return false;
});
});