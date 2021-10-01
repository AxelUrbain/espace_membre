<?php 
require_once 'inc/bootstrap.php';
session_start();
extract($_POST);

if(!empty($email) && !empty($password) && !empty($name) && !empty($firstname)){
    
    $result = preg_match("/([^A-Za-z0-9\s])/", $password);

    if($result || strlen($password) < 8 ){
        echo "Erreur dans la saisie du mot de passe !";
    }
    else{
        $response = App::getDatabase()->query("SELECT COUNT(email) AS is_doublon FROM users WHERE email = ?", [$email])->fetch();

        if($response->is_doublon != 0){
            echo "Cette adresse mail est déjà utilisée !";
        }
        else{
            App::getDatabase()
            ->query("INSERT INTO users SET email= ?, name= ?, firstname= ?, password= ?", 
                [$email, $name, $firstname, $password]);

            echo "ok";
        }
    }
}
else{
    echo "Vous n'avez saisie tout les champs correctement !";
}