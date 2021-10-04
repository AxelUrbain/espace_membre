<?php 
require_once '../inc/autoloader.php';
session_start();
extract($_POST);

if(!empty($email) && !empty($password) && !empty($name) && !empty($firstname)){
    
    $result = preg_match("/([^A-Za-z0-9\s])/", $password);

    if($result || strlen($password) < 8 ){
        echo "Incorrect password entry !";
    }
    else{
        $response = App::getDatabase()->query("SELECT COUNT(email) AS is_doublon FROM users WHERE email = ?", [$email])->fetch();

        if($response->is_doublon != 0){
            echo "Email address already used !";
        }
        else{
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            App::getDatabase()
            ->query("INSERT INTO users SET email= ?, name= ?, firstname= ?, password= ?", 
                [$email, $name, $firstname, $hashed_password]);

            echo "ok";
        }
    }
}
else{
    echo "You have not entered all the fields correctly !";
}