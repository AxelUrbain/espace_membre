# How to use espace_membre

1 - Clone this repository
$ git clone https://github.com/AxelUrbain/espace_membre.git

2- Install database
use test_wesco_au.sql

3- Init database
In class App.php -> function getDatabase()
self::$db = new Database($login, $pass, $db_name, $host="localhost");

4- Launch PHP Server
$ php -S localhost:8000