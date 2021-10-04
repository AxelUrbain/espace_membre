<?php 
require_once '../inc/autoloader.php';
session_start();
extract($_POST);

if(!empty($email) && !empty($password) && !empty($name) && !empty($firstname)){
    
    $result = preg_match("/([^A-Za-z0-9\s])/", $password);

    if($result || strlen($password) < 8 ){
        echo "Error in password entry !";
    }
    else{
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        App::getDatabase()->query("UPDATE users SET name= ?, firstname= ?, password= ? WHERE email = ?", [$name, $firstname, $hashed_password, $email]);

        echo "ok";
    }
}
else{
    echo "You have not entered all the fields correctly !";
}