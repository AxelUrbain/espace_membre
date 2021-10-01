<?php
spl_autoload_register('autoload');

function autoload($class){
    require "class/$class.php";
}