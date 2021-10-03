<?php
require_once '../inc/autoloader.php';
session_start();
extract($_POST);

if(isset($email) && isset($password))
{
    $response =  App::getDatabase()->query("SELECT * FROM users WHERE email= ? AND password= ?", [$email, $password])->fetch();

    if($response){
        $_SESSION['account'] = $response;
        echo "ok";
    }
    else{
        echo "Erreur, veuillez vérifier votre nom d'utilisateur et votre mot de passe !";   
    }
}
else{
    echo "Vous n'avez saisie tout les champs !";
}