<?php
class author{
    function createAuthor(){

        $sql = "CREATE TABLE IF NOT EXISTS author (
            id int PRIMARY KEY AUTO_INCREMENT,
            userId int,
            name varchar(32),
            familyName varchar(32),
            gender varchar(32),
            birthday int,
            phone int,
            fixPhone int,
            website varchar(64),
            date timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
        )";

            
        require_once("./app/models/model.php");
        $dbh = dataBase();
        $sth = $dbh -> prepare($sql);
        $sth -> execute();
    }

    function insertAuthor($userId,$name,$familyName,$gender,$birthday,$phone,$fixPhone,$website){
        require_once("./app/models/model.php");

        $author = new author();
        $author -> createAuthor();

        $sql = "INSERT INTO author (userId,name,familyName,gender,birthday,phone,fixPhone,website) VALUES (?,?,?,?,?,?,?,?)";

        $dbh = dataBase();
        $sth = $dbh -> prepare($sql);
        $sth -> execute([$userId,$name,$familyName,$gender,$birthday,$phone,$fixPhone,$website]);
    }
}