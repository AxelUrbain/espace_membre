<?php
class Database{

    private $pdo;

    public function __construct($login, $pass, $db_name, $host="localhost")
    {
        $this->pdo = new PDO("mysql:dbname=$db_name;host=$host", $login, $pass);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    }

    public function query($query, $params = [])
    {
        if($params){
            $request = $this->pdo->prepare($query);
            $request->execute($params);
        }
        else{
            $request = $this->pdo->query($query);
        }

        return $request;
    }
}