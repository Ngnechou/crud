<?php

define('DBNAME','gestion');
define('DBPASS','');
define('DBUSER','root');
define('DBHOST','localhost');

$dsn= 'mysql:host='.DBHOST.';dbname='.DBNAME;

try{
    $pdo = new PDO($dsn,DBUSER,DBPASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo 'connexion reussi';
 

}catch(PDOException $e){
    die('erreur de connexion' .$e->getMessage());
}
?>