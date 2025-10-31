<?php 

//creation de la base de donnée register et l'ajoute si elle n'existe pas.
function dataBase(){
    $pdo = new PDO("mysql:host=localhost", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $dbname = "`".str_replace("`","``","register")."`";
    $pdo->query("CREATE DATABASE IF NOT EXISTS register");
    $pdo->query("use register");

    return $pdo;
}