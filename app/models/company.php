<?php
class company{
    function createCompanyModel(){

        $sql = "CREATE TABLE IF NOT EXISTS company (
            id int PRIMARY KEY AUTO_INCREMENT,
            userId int,
            social varchar(64),
            siret int,
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

            
        require_once("../models/model.php");
        $dbh = dataBase();
        $sth = $dbh -> prepare($sql);
        $sth -> execute();
    }

    function insertCompany($userId,$company){
        require_once("../models/model.php");

        $companyFunction = new company();
        $companyFunction -> createCompanyModel();

        $sql = "INSERT INTO company (userId,social,siret,name,familyName,address,building,state,zip,city,country,information) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";

        $dbh = dataBase();
        $sth = $dbh -> prepare($sql);
        $sth -> execute([$userId,$company["socialCompany"],$company["siretCompany"],$company["nameCompany"],$company["familyNameCompany"],$company["addressCompany"],$company["buildingCompany"],$company["stateCompany"],$company["zipCompany"],$company["cityCompany"],$company["countryCompany"],$company["informationCompany"]]);

    }
}