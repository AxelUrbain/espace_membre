<?php

class App{

    static $db = null;

    static function getDatabase(){
        
        if(!self::$db){
            self::$db = new Database('root', '', 'test_wesco_au');
        }

        return self::$db;
    }

}