<?php

class user{
    function createUser(){

            $sql = "CREATE TABLE IF NOT EXISTS user (
                id int PRIMARY KEY AUTO_INCREMENT,
                email varchar(32),
                password text,
                newsletter boolean,
                date timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
            )";

            
            require_once("../models/model.php");
            $dbh = dataBase();
            $sth = $dbh -> prepare($sql);
            $sth -> execute();
    }

    function insertUser($user){
        require_once("../models/model.php");

        $userFunction = new user();
        $userFunction -> createUser();

        $sql = "INSERT INTO user (email,password,newsletter) VALUES (?,?,?)";

        $dbh = dataBase();
        $sth = $dbh -> prepare($sql);
        $sth -> execute([$user["email"],$user["password"],$user["newsletter"]]);
    }

    function selectThisUser($email){
        require_once("../models/model.php");

        $userFunction = new user();
        $userFunction -> createUser();

        $sql = "SELECT * FROM user WHERE email=?";

        $dbh = dataBase();
        $sth = $dbh -> prepare($sql);
        $sth -> execute([$email]);
        
        $emailVerify = $sth -> fetch();
        return $emailVerify;
    }
}
