<?php
class facture{
    function createFactureModel(){

        $sql = "CREATE TABLE IF NOT EXISTS facture (
            id int PRIMARY KEY AUTO_INCREMENT,
            userId int,
            name varchar(32),
            familyName varchar(32),
            address varchar(64),
            building varchar(64),
            state varchar(32),
            zip int,
            city varchar(32),
            country varchar(32),
            information text,
            date timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
        )";

            
        require_once("./app/models/model.php");
        $dbh = dataBase();
        $sth = $dbh -> prepare($sql);
        $sth -> execute();
    }

    function insertFacture($userId,$nameFacture,$familyNameFacture,$addressFacture,$buidldingFacture,$stateFacture,$zipFacture,$cityFacture,$countryFacture,$informationFacture){
        require_once("./app/models/model.php");

        $company = new facture();
        $company -> createFactureModel();

        $sql = "INSERT INTO facture (userId,name,familyName,address,building,state,zip,city,country,information) VALUES (?,?,?,?,?,?,?,?,?,?)";

        $dbh = dataBase();
        $sth = $dbh -> prepare($sql);
        $sth -> execute([$userId,$nameFacture,$familyNameFacture,$addressFacture,$buidldingFacture,$stateFacture,$zipFacture,$cityFacture,$countryFacture,$informationFacture]);
    }
}