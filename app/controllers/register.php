<?php 

class register{

    function createUser(){
        $email = htmlspecialchars($_POST["emailConnexion"]);
        $password = htmlspecialchars($_POST["passwordConnexion"]);
        $confirmPassword = htmlspecialchars($_POST["confirmPasswordConnexion"]);

        if(empty($_POST["newsletter"])){
            $newsletter = 0;
        } else {
            $newsletter = 1;
        }


        if($password != $confirmPassword){
            echo "<span class='notification'>les mots de passe ne correspondent pas</span>";
            exit();
        }

        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            echo "<span class='notification'>Votre adresse e-mail est invalide</span>"; 
            exit();
        }

        if(strlen($password) < 8 || strlen($password) > 32){
            echo "<span class='notification'>Le mot de passe doit faire entre 8 et 32 charactère</span>";
            exit();
        }

        require_once("./app/models/user.php");
        $user = new user();
        $verifyEmail = $user -> selectThisUser($email);

        if(!empty($verifyEmail)){
            echo "<span class='notification'>Cette adresse e-mail et déja enregistré</span>";   
            exit();
        }

            $password = password_hash($password, PASSWORD_DEFAULT);
            $user = array(
                "email" => $email,
                "password" => $password,
                "newsletter" => $newsletter,
            );

            $register = new register();
            $author = $register -> createArtist();
            $company = $register -> createCompany();
            $facture = $register -> createFacture();

            $register -> insertRegister($author,$company,$facture,$user);
    }

    function createArtist(){
        $authorName = htmlspecialchars($_POST["authorName"]);
        $familyNameAuthor = htmlspecialchars($_POST["familyNameAuthor"]);
        $phoneAuthor = htmlspecialchars($_POST["phoneAuthor"]);
        $fixPhoneAuthor = htmlspecialchars($_POST["fixPhoneAuthor"]);
        $websiteAuthor = htmlspecialchars($_POST["websiteAuthor"]);

        if(strlen($authorName) < 3 || strlen($authorName) > 32){
            echo "<span class='notification'>Votre prénom doit contenir entre 3 et 32 charactère</span>";
            exit();
        }

        if(strlen($familyNameAuthor) < 3 || strlen($familyNameAuthor) > 32){
            echo "<span class='notification'>Votre nom doit contenir entre 3 et 32 charactère</span>";
            exit();            
        }

        if(empty($_POST["gender"])){
            $genderAuthor = "noGenderSelected";
        } else {
            $genderAuthor = htmlspecialchars($_POST["genderAuthor"]);
        }

        if(empty($_POST["birthdayAuthor"])){
            $birthdayAuthor = 0;
        } else {
            $birthdayAuthor = htmlspecialchars($_POST["birthdayAuthor"]);
            $ageAuthor = explode("-",$birthdayAuthor);

            $age = date("Y") - $ageAuthor[0];

            if($age < 18){
                echo "<span class='notification'>Vous devez être majeur pour crée un compte artiste</span>";
                exit();
            }
        }
        

        if(!preg_match("#^(\+33|0)[67][0-9]{8}$#", $phoneAuthor)){
            echo "<span class='notification'>Votre numéro est incorrect</span>";
            exit();
        }

        if(!preg_match("#^(\+33|0)[67][0-9]{8}$#", $fixPhoneAuthor)){
            echo "<span class='notification'>Votre numéro fixe est incorrect</span>";
            exit();
        }

        if(!filter_var($websiteAuthor, FILTER_VALIDATE_URL)){
            echo "<span class='notification'>Votre site web est incorrect</span>";
            exit();
        }

        $author = array(
            'authorName' => $authorName,
            'familyNameAuthor' => $familyNameAuthor,
            'genderAuthor' => $genderAuthor,
            'birthdayAuthor' => $birthdayAuthor,
            'phoneAuthor' => $phoneAuthor,
            'fixPhoneAuthor' => $fixPhoneAuthor,
            'websiteAuthor' => $websiteAuthor,
        );
        
        return $author;
    }

    function createCompany(){
        $socialCompany = htmlspecialchars($_POST["socialCompany"]);
        $siretCompany = htmlspecialchars($_POST["siretCompany"]);
        $nameCompany = htmlspecialchars($_POST["nameCompany"]);
        $familyNameCompany = htmlspecialchars($_POST["familyNameCompany"]);
        $addressCompany = htmlspecialchars($_POST["addressCompany"]);
        $buildingCompany = htmlspecialchars($_POST["buildingCompany"]);
        $stateCompany = htmlspecialchars($_POST["stateCompany"]);
        $zipCompany = htmlspecialchars($_POST["zipCompany"]);
        $cityCompany = htmlspecialchars($_POST["cityCompany"]);
        $countryCompany = htmlspecialchars($_POST["countryCompany"]);
        $informationCompany = htmlspecialchars($_POST["informationCompany"]);

        if(strlen($socialCompany) < 2 || strlen($socialCompany) > 64){
            echo "<span class='notification'>Votre raison social doit etre entre 2 et 64 charactère</span>";
            exit();
        }

        if(strlen($siretCompany) != 14){
            echo "<span class='notification'>Votre siret doit contenir 14 chiffres</span>";
            exit();
        }

        if(strlen($nameCompany) < 3 || strlen($nameCompany) > 32){
            echo "<span class='notification'>Votre prénom d'entreprise doit contenir entre 3 et 32 charactère</span>";
            exit();
        }

        if(strlen($familyNameCompany) < 3 || strlen($familyNameCompany) > 32){
            echo "<span class='notification'>Votre prénom d'entreprise doit contenir entre 3 et 32 charactère</span>";
            exit();
        }

        if(strlen($addressCompany) < 3 || strlen($addressCompany) > 64){
            echo "<span class='notification'>Votre adresse postale doit contenir entre 3 et 64 charactère</span>";
            exit();
        }

        if(strlen($buildingCompany) < 3 || strlen($buildingCompany) > 64){
            echo "<span class='notification'>Votre appartement/bâtiment doit contenir entre 3 et 64 charactère</span>";
            exit();
        }

        if(strlen($stateCompany) < 3 || strlen($stateCompany) > 32){
            echo "<span class='notification'>Votre région/département doit contenir entre 3 et 64 charactère</span>";
            exit();
        }

        if(strlen($cityCompany) < 3 || strlen($cityCompany) > 32){
            echo "<span class='notification'>Votre ville doit contenir entre 3 et 64 charactère</span>";
            exit();
        }

        if(strlen($countryCompany) < 3 || strlen($countryCompany) > 32){
            echo "<span class='notification'>Votre pays doit contenir entre 3 et 64 charactère</span>";
            exit();
        }

        $company = array(
            "socialCompany" => $socialCompany,
            "siretCompany" => $siretCompany,
            "nameCompany" => $nameCompany,
            "familyNameCompany" => $familyNameCompany,
            "addressCompany" => $addressCompany,
            "buildingCompany" => $buildingCompany,
            "stateCompany" =>   $stateCompany,
            "zipCompany" => $zipCompany,
            "cityCompany" => $cityCompany,
            "countryCompany" => $countryCompany,
            "informationCompany" => $informationCompany,
        );

        return $company;
    }

    function createFacture(){
        if(!empty($_POST["companyAndFacture"])){

            $register = new register();
            $company = $register -> createCompany();

            $facture = array(
                "nameFacture" => $company['nameCompany'],
                "familyNameFacture" => $company['familyNameCompany'],
                "addressFacture" => $company['addressCompany'],
                "buidldingFacture" => $company['buildingCompany'],
                "stateFacture" =>   $company['stateCompany'],
                "zipFacture" => $company['zipCompany'],
                "cityFacture" => $company['cityCompany'],
                "countryFacture" => $company['countryCompany'],
                "informationFacture" => $company['informationCompany'],
            );

            return $facture;
        } else{ 

            $nameFacture = htmlspecialchars($_POST["nameFacture"]);
            $familyNameFacture = htmlspecialchars($_POST["familyNameFacture"]);
            $addressFacture = htmlspecialchars($_POST["addressFacture"]);
            $buidldingFacture = htmlspecialchars($_POST["buidldingFacture"]);
            $stateFacture = htmlspecialchars($_POST["stateFacture"]);
            $zipFacture = htmlspecialchars($_POST["zipFacture"]);
            $cityFacture = htmlspecialchars($_POST["cityFacture"]);
            $countryFacture = htmlspecialchars($_POST["countryFacture"]);
            $informationFacture = htmlspecialchars($_POST["informationFacture"]);

            if(strlen($nameFacture) < 3 || strlen($nameFacture) > 32){
                echo "<span class='notification'>Votre prénom d'entreprise doit contenir entre 3 et 32 charactère</span>";
                exit();
            }

            if(strlen($familyNameFacture) < 3 || strlen($familyNameFacture) > 32){
                echo "<span class='notification'>Votre prénom d'entreprise doit contenir entre 3 et 32 charactère</span>";
                exit();
            }

            if(strlen($addressFacture) < 3 || strlen($addressFacture) > 64){
                echo "<span class='notification'>Votre adresse postale doit contenir entre 3 et 64 charactère</span>";
                exit();
            }

            if(strlen($stateFacture) < 3 || strlen($stateFacture) > 32){
                echo "<span class='notification'>Votre région/département doit contenir entre 3 et 64 charactère</span>";
                exit();
            }

            if(strlen($cityFacture) < 3 || strlen($cityFacture) > 32){
                echo "<span class='notification'>Votre ville doit contenir entre 3 et 64 charactère</span>";
                exit();
            }

            if(strlen($countryFacture) < 3 || strlen($countryFacture) > 32){
                echo "<span class='notification'>Votre pays doit contenir entre 3 et 64 charactère</span>";
                exit();
            }

            $facture = array(
                "nameFacture" => $nameFacture,
                "familyNameFacture" => $familyNameFacture,
                "addressFacture" => $addressFacture,
                "buidldingFacture" => $buidldingFacture,
                "stateFacture" =>   $stateFacture,
                "zipFacture" => $zipFacture,
                "cityFacture" => $cityFacture,
                "countryFacture" => $countryFacture,
                "informationFacture" => $informationFacture,
            );

            return $facture;
        }
    }

    function insertRegister($author,$company,$facture,$user){

        $nameAuthor = $author["authorName"];
        $familyNameAuthor = $author["familyNameAuthor"];
        $genderAuthor = $author["genderAuthor"];
        $birthdayAuthor = $author["birthdayAuthor"];
        $phoneAuthor = $author["phoneAuthor"];
        $fixPhoneAuthor = $author["fixPhoneAuthor"];
        $websiteAuthor = $author["websiteAuthor"];

        $socialCompany = $company["socialCompany"];
        $siretCompany = $company["siretCompany"];
        $nameCompany = $company["nameCompany"];
        $familyNameCompany = $company["familyNameCompany"];
        $addressCompany = $company["addressCompany"];
        $buildingCompany = $company["buildingCompany"];
        $stateCompany = $company["stateCompany"];
        $zipCompany = $company["zipCompany"];
        $cityCompany = $company["cityCompany"];
        $countryCompany = $company["countryCompany"];
        $informationCompany = $company["informationCompany"];

        $nameFacture = $facture["nameFacture"];
        $familyNameFacture = $facture["familyNameFacture"];
        $addressFacture = $facture["addressFacture"];
        $buidldingFacture = $facture["buidldingFacture"];
        $stateFacture = $facture["stateFacture"];
        $zipFacture = $facture["zipFacture"];
        $cityFacture = $facture["cityFacture"];
        $countryFacture = $facture["countryFacture"];
        $informationFacture = $facture["informationFacture"];

        $password = $user["password"];
        $email = $user["email"];
        $newsletter = $user["newsletter"];

        require_once("./app/models/user.php");
        require_once("./app/models/author.php");
        require_once("./app/models/company.php");
        require_once("./app/models/facture.php");
        
    
        $user = new user();
        $author = new author();
        $company = new company();
        $facture = new facture();
        
        $user -> insertUser($password,$email,$newsletter);

        $userId = $user -> selectThisUser($email);
        $userId = $userId["id"];

        $author -> insertAuthor($userId,$nameAuthor,$familyNameAuthor,$genderAuthor,$birthdayAuthor,$phoneAuthor,$fixPhoneAuthor,$websiteAuthor);
        $company -> insertCompany($userId,$socialCompany,$siretCompany,$nameCompany,$familyNameCompany,$addressCompany,$buildingCompany,$stateCompany,$zipCompany,$cityCompany,$countryCompany,$informationCompany);
        $facture -> insertFacture($userId,$nameFacture,$familyNameFacture,$addressFacture,$buidldingFacture,$stateFacture,$zipFacture,$cityFacture,$countryFacture,$informationFacture);
    }
}
