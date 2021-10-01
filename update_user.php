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
        App::getDatabase()->query("UPDATE users SET name= ?, firstname= ?, password= ? WHERE email = ?", [$name, $firstname, $password, $email]);

        echo "ok";
    }
}
else{
    echo "Vous n'avez saisie tout les champs correctement !";
}