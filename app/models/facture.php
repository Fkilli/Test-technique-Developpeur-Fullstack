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

    function insertFacture($userId,$facture){
        require_once("./app/models/model.php");

        $companyFunction = new facture();
        $companyFunction -> createFactureModel();

        $sql = "INSERT INTO facture (userId,name,familyName,address,building,state,zip,city,country,information) VALUES (?,?,?,?,?,?,?,?,?,?)";

        $dbh = dataBase();
        $sth = $dbh -> prepare($sql);
        $sth -> execute([$userId,$facture["nameFacture"],$facture["familyNameFacture"],$facture["addressFacture"],$facture["buidldingFacture"],$facture["stateFacture"],$facture["zipFacture"],$facture["cityFacture"],$facture["countryFacture"],$facture["informationFacture"]]);
    }
}