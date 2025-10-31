<main>
    <section id="register">
        <div class="resize">
            <div class="exposition">
                <h1><img src="./app/assets/exposition.png" alt="">Pour exposer inscrivez-vous <span>en tant qu'</span>Artiste</h1>
                <p>Créer un compte vous donne l'opportunité d'exposer vos oeuvres sur la platerforme Art Interactivities et donc de gagner en visibilité ! Cette mise en avant augmentera vos ventes en ligne et votre notoriété. Rejoignez notre communauté d'artiste vendeur Talentueux !</p>
            </div>

            <form method="post" action="?path=register">
                <div>
                    <h2>1. Coordonnées de l'artiste</h2>
                    <div>
                        <label for="authorName">prénom</label>
                        <input minlength="3" maxlength="32" name="authorName" required type="text" >
                        <span class="asterix">*</span>
                    </div>

                    <div>
                        <label for="familyNameAuthor">nom</label>
                        <input minlength="3" maxlength="32" name="familyNameAuthor" required type="text" >
                        <span class="asterix">*</span>
                    </div>

                    <div>
                        <label class="noAbsolute" for=""><strong>Civilité</strong></label>
                        <input name="genderAuthor" value="madame" type="radio"><span>Madame</span>
                        <input name="genderAuthor" value="monsieur" type="radio"><span>Monsieur</span>
                    </div>

                    <div>
                        <label for="birthdayAuthor" class="noAbsolute"><strong>Date de naissance</strong></label>
                        <input name="birthdayAuthor" type="date">
                    </div>

                    <div>
                        <label for="phoneAuthor">tel. Portable(+33)</label>
                        <input name="phoneAuthor" required type="tel" >
                        <span class="asterix">*</span>
                    </div>

                    <div>
                        <label for="fixPhoneAuthor">tel.Fixe(+33)</label>
                        <input name="fixPhoneAuthor" required type="tel" >
                        <span class="asterix">*</span>
                    </div>

                    <div>
                        <label for="websiteAuthor">Site web de l'artiste</label>
                        <input name="websiteAuthor" required type="url" >
                        <span class="asterix">*</span>
                    </div>
                    
                    <h2>2. Connexion</h2>

                    <div>
                        <label for="emailConnexion">Adresse e-mail</label>
                        <input name="emailConnexion" required type="email" >
                        <span class="asterix">*</span>
                    </div>

                    <div>
                        <label for="passwordConnexion">Mot de passe</label>
                        <input minlength="3" maxlength="32" name="passwordConnexion" required type="password" >
                        <span class="asterix">*</span>
                    </div>

                    <div>
                        <label for="confirmPasswordConnexion">Confirmer le mot de passe</label>
                        <input minlength="3" maxlength="32" name="confirmPasswordConnexion" type="password" >
                    </div>
                </div>

                <div>
                    <h2>3. Coordonnées de l'entreprise</h2>

                    <div>
                        <label for="socialCompany">raison sociale</label>
                        <input minlength="2" maxlength="64" name="socialCompany" required type="text" >
                        <span class="asterix">*</span>
                    </div>

                    <div>
                        <label for="siretCompany">Numéro de siret</label>
                        <input name="siretCompany" required type="number" >
                        <span class="asterix">*</span>
                    </div>

                    <div>
                        <label for="nameCompany">prénom</label>
                        <input minlength="3" maxlength="32" name="nameCompany" required type="text" >
                        <span class="asterix">*</span>
                    </div>

                    <div>
                        <label for="familyNameCompany">Nom</label>
                        <input minlength="3" maxlength="32" name="familyNameCompany" required type="text" >
                        <span class="asterix">*</span>
                    </div>

                    <div>
                        <label for="addressCompany">Adresse postale</label>
                        <input minlength="3" maxlength="64" name="addressCompany" required type="text" >
                        <span class="asterix">*</span>
                    </div>

                    <div>
                        <label for="buildingCompany">appartement / bâtiment numéro ou lettre</label>
                        <input minlength="3" maxlength="64" name="buildingCompany" required type="text" >
                        <span class="asterix">*</span>
                    </div>

                    <div>
                        <label for="stateCompany">région / département</label>
                        <input minlength="3" maxlength="32" name="stateCompany" required type="text" >
                        <span class="asterix">*</span>
                    </div>

                    <div>
                        <label for="zipCompany">Code postal / ZIP</label>
                        <input name="zipCompany" required type="number" >
                        <span class="asterix">*</span>
                    </div>

                    <div>
                        <label for="cityCompany">Ville</label>
                        <input minlength="3" maxlength="64" name="cityCompany" required type="text" >
                        <span class="asterix">*</span>
                    </div>

                    <div>
                        <label for="countryCompany">Pays</label>
                        <input minlength="3" maxlength="64" name="countryCompany" required type="text" >
                        <span class="asterix">*</span>
                    </div>

                    <div>
                        <label for="informationCompany">Informations complémentaires</label>
                        <textarea name="informationCompany"></textarea>
                    </div>

                    <div class="checkboxDiv">
                        <input type="checkbox" name="companyAndFacture" onChange="registerDisabler(this)">
                        <span>Si l'adresse est identique à celle de la facturation<br>cochez la case sinon remplissez les informations demandées ci-dessous.</span>
                    </div>

                    <div>
                        <label for="nameFacture">Nom</label>
                        <input minlength="3" maxlength="32" class="factureInput" required name="nameFacture" type="text" >
                        <span class="asterix">*</span>
                    </div>

                    <div>
                        <label for="familyNameFacture">Prénom</label>
                        <input minlength="3" maxlength="32" class="factureInput" required name="familyNameFacture" type="text" >
                        <span class="asterix">*</span>
                    </div>

                    <div>
                        <label for="addressFacture">Adresse postale</label>
                        <input minlength="3" maxlength="64" class="factureInput" required name="addressFacture" type="text" >
                        <span class="asterix">*</span>
                    </div>

                    <div>
                        <label for="buidldingFacture">Appartement / bâtiment numéro ou lettre</label>
                        <input class="factureInput" name="buidldingFacture" type="text">
                    </div>

                    <div>
                        <label for="stateFacture">Région / département</label>
                        <input minlength="3" maxlength="32" class="factureInput" required name="stateFacture" type="text" >
                        <span class="asterix">*</span>
                    </div>

                    <div>
                        <label for="zipFacture">Code postal / Zip</label>
                        <input class="factureInput" required name="zipFacture" type="number" >
                        <span class="asterix">*</span>
                    </div>
                    
                    <div>
                        <label for="cityFacture">Ville</label>
                        <input minlength="3" maxlength="64" class="factureInput" required name="cityFacture" type="text" >
                        <span class="asterix">*</span>
                    </div>

                    <div>
                        <label for="countryFacture">Pays</label>
                        <input minlength="3" maxlength="32" class="factureInput" required name="countryFacture" type="text" >
                        <span class="asterix">*</span>
                    </div>

                    <div>
                        <textarea class="factureInput" name="informationFacture" placeholder="Information complémentaires"></textarea>
                    </div>
                    
                    <div class="checkboxDiv">
                        <input type="checkbox" name="newsletter">
                        <span>M'inscrire à la newsletter Art INTERACTIVITIES</span>
                    </div>

                    <div class="checkboxDiv checkboxDivNoMargin">
                        <input type="checkbox" required>
                        <span>J'accepte les conditions générales d'utilisation du site en m'inscrivant *<br>* mentions obligatoires</span>
                    </div>

                    <input type="submit" value="Entrer" name="validateRegister">
                </div>
            </form>
        </div>

    </section>
</main>

<script src="./app/js/registerDisabler.js"></script>
<script src="./app/js/notificationManager.js"></script>
<script></script>

<?php

if(!empty($_POST["validateRegister"])){
    require_once "./app/controllers/register.php";
    $register = new register();
    $register -> createUser();
}