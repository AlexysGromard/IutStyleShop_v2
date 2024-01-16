<?php
namespace controller;

include_once "backend/DAO/DBUser.php";


class user{

    /*
    * Fonction qui permet d'afficher le dashboard de l'utilisateur
    * @param La page à afficher
    */
    function dashboard(array $param){
        // Redrection vers la page demandée
        if (count($param) != 1 || !in_array($param[0], array("informations","commandes","adresse","parametres"))){
            require "frontend/404.php";
            die();
        }

        session_start();
        $DAOUser = new \backend\DAO\DBUser();
        if (!isset($_SESSION['user'])){
            header("Location: /login");
            die();
        }
        $id = $_SESSION['user']->getId();

        // Vérifier que l'utilisateur existe dans la base de données
        if ($DAOUser::getById($id) == null || $_SESSION['user']->getEmail() != $DAOUser::getById($id)->getEmail()){
            // Décconnecter l'utilisateur
            $this->logout();
        }
        
        $personne = $DAOUser->getById($id);
        switch ($param[0]) {
            case "informations":
                $actionSelect = "Mes informations";
                break;
            case "commandes":
                
                // Recuperer tout les commandes d'un client
                $array_commandes = \backend\DAO\DBCommande::getCommande($personne);
                
                $actionSelect = "Mes commandes";
                
                break;
            case "adresse":
                $actionSelect = "Mon adresse";
                break;
            case "parametres":
                $actionSelect = "Mes paramètres";
                break;
        }
        
    
        require "frontend/dashboard/client.php";
    }


    function admin_space(array $param){

        //vérifier que c'est bien un admin
        ////
        
        $personne = $this->checkRool("admin");

        
        if ($personne == null || $personne->getRole()!="admin"){

            require "frontend/404.php";die();
        }


        if (count($param) < 1 || !in_array($param[0], array("utilisateurs","commandes","articles","avis","codes_promotionnel"))){
            require "frontend/404.php";die();
        }

        //$personne = new \backend\User(1,"Marcel.Claude@gmail.com","1234","Marcel","Claude","M","admin","rue claude","Nantes","44000","N°4");
        
        switch ($param[0]) {
            case "utilisateurs":
                $actionSelect = "Base de données utilisateurs";
                $DAOUser = new \backend\DAO\DBUser();
                $array_user = $DAOUser->getall();

                break;
            case "commandes":
                $actionSelect = "Base de données commandes";
                $DAOUser = new \backend\DAO\DBUser();
                $array_user = $DAOUser->getall();
                //$array_commandes = \backend\DAO\DBCommande::getAll();

                $commande = null;
                if (isset($param[1])){
                    if (is_numeric($param[1])){
                        //TODO : si il existe 
                        //vérifier que la command exist
                        $commande = new \backend\Commande(100,2,"06/01/2024 13:07","Expédié",50.0);
                    }else{
                        require "frontend/404.php";die();
                    }
                }

                break;
            case "articles":
                $actionSelect = "Base de données articles";
                $DAOArticle = new \backend\DAO\DBArticle();
                $array_articles = $DAOArticle->getAll();
                //TODO
                

                $article = null;
                if (isset($param[1])){
                    if (is_numeric($param[1])){
                        //vérifier que la command exist
                        //$numArticle = $param[1];
                        $article = new \backend\entity\Article("T-shirt Rouge","T-shirt","H","/image/truc.png",4.9,3,"compacte et durable","Rouge",true, 23.99 ,0); //modifier
                    }else if ($param[1] == "nouvelArticle"){
                        $article = "nouvelArticle";
                    }else{
                        require "frontend/404.php";die();
                    }
                }
                break;
            case "avis":
                $actionSelect = "Base de données avis";

                $DAOArticle = new \backend\DAO\DBArticle();
                $array_articles = $DAOArticle->getAll();
                break;
            case "codes_promotionnel":
                $actionSelect = "Base de données codes promotionnel";

                $DAOCodePromo = new \backend\DAO\DBCodePromo();
                $array_code_promo = $DAOCodePromo->getall();

                //si codes promo
                $codePromo = null;
                if (isset($param[1])){
                    if (is_numeric($param[1])){
                        
                        //mettre un code promo
                        
                        $codePromo = $DAOCodePromo->getById(intval($param[1]));
                        if ($codePromo == null){
                            require "frontend/404.php";die();
                        }
                        
                    }else if ($param[1] == "nouveauCodePromotionnel"){
                        $codePromo = "nouveauCodePromotionnel";
                    }else{
                        require "frontend/404.php";die();
                    }
                }
        }        


    

        require "frontend/dashboard/admin.php";
    }

    function delUser(array $param){
        $personne = $this->checkRool("admin");

        
        if (count($param) != 1 || !is_numeric($param[0])){
            require "frontend/404.php";die();
        }else if ($param[0] == 1){
            header("Location: /user/admin_space/utilisateurs");die();
        }

        $DAOUser = new \backend\DAO\DBUser();
        $usertodel = $DAOUser->getById($param[0]);
        
        if ($usertodel != null){
            
            $DAOUser->delete($usertodel);

        }
        
        header("Location: /user/admin_space/utilisateurs");
    }

    function delCommande(array $param){
        $personne = $this->checkRool("admin");
        
        if (count($param) != 1 || !is_numeric($param[0])){
            require "frontend/404.php";die();
        }
        
        $DAOCommande = new \backend\DAO\DBCommande();
        $commandeToDel = $DAOCommande->getById($param[0]);
        echo "<pre>";
        var_dump($commandeToDel);
        echo "</pre>";
        
        if ($commandeToDel != null){
            
            $DAOCommande->delete($commandeToDel);
            
        }
        
        header("Location: /user/admin_space/commandes");
    }

    function delCommentaire(array $param){
        $personne = $this->checkRool("admin");
        
        if (count($param) != 2 || !is_numeric($param[0]) || !is_numeric($param[1])){
            require "frontend/404.php";die();
        }
        
        $DAOCommentaire = new \backend\DAO\DBCommentaire();
        $commentaireToDel = $DAOCommentaire::getById($param[0],$param[1]);
        $DAOArticle = new \backend\DAO\DBArticle();
        $article = $DAOArticle::getById($param[1]);


        if ($commentaireToDel != null && $article != null){
                        
            $DAOCommentaire::delete($commentaireToDel,$article);

        }
        
        header("Location: /user/admin_space/avis");
    }

    function delCodesPromotionnel(array $param){
        
        $personne = $this->checkRool("admin");
        
        if (count($param) != 1 || !is_numeric($param[0])){
            require "frontend/404.php";die();
        }
        
        $DAOCodePromo = new \backend\DAO\DBCodePromo();
        $codePromoToDel = $DAOCodePromo->getById($param[0]);
        
        if ($codePromoToDel != null){
            
            $DAOCodePromo->delete($codePromoToDel);
            
        }
        
        header("Location: /user/admin_space/codes_promotionnel");
    }

    function delArticle(array $param){
        
        $personne = $this->checkRool("admin");
        
        if (count($param) != 1 || !is_numeric($param[0])){
            require "frontend/404.php";die();
        }
        
        $DAOArticle = new \backend\DAO\DBArticle();
        $article = $DAOArticle->getById($param[0]);
        
        var_dump($article);
        echo "<br>";
        if ($article != null){
            //TODO : 
            $DAOArticle->delete($article);
            
        }
        
        header("Location: /user/admin_space/articles");
    }

    private function checkRool($rool){
        session_start();
        
        $DAOUser = new \backend\DAO\DBUser();
        $id = $_SESSION['user']->getId();

        $personne = $DAOUser->getById($id);
        
        if ($personne->getRole()!=$rool){
            require "frontend/404.php";die();
        }

        return $personne;
    }

    public function addCodePromotionnel(){

        $this->checkRool("admin");

        if (isset($_POST["Code_promotionnel"]) && isset($_POST["reduction"]) && is_numeric($_POST["reduction"])){
            $nomcode = $_POST["Code_promotionnel"];
            $promo = intval($_POST["reduction"]);
            $DAOCodePromo = new \backend\DAO\DBCodePromo;

            $isdiffrent = true;
            foreach($DAOCodePromo->getAll() as $code){
                if ($nomcode == $code->getCode()){
                    $isdiffrent = false;
                }
            }

            if (strlen($nomcode) < 255 && $isdiffrent && $promo <=100 && $promo >= 0){
                $DAOCodePromo->add($nomcode,$promo);
                header("Location: /user/admin_space/codes_promotionnel");die();
            }
        }
        header("Location: /user/admin_space/codes_promotionnel/nouveauCodePromotionnel");
    }

    public function updateCodePromotionnel(){

        $this->checkRool("admin");
        var_dump($_POST);
        if ( isset($_POST["id"]) && is_numeric($_POST["id"]) && isset($_POST["Code_promotionnel"]) && isset($_POST["reduction"]) && is_numeric($_POST["reduction"])){
            $id = intval($_POST["id"]);
            $nomcode = $_POST["Code_promotionnel"];
            $promo = intval($_POST["reduction"]);

            $DAOCodePromo = new \backend\DAO\DBCodePromo;

            $isdiffrent = true;
            foreach($DAOCodePromo->getAll() as $code){
                if ($id != $code->getId() && $nomcode == $code->getCode()){
                    $isdiffrent = false;
                }
            }

            if (strlen($nomcode) < 255 && $isdiffrent && $promo <=100 && $promo >= 0){
                $newCodePromo = new \backend\entity\CodePromoEntity($id,$nomcode,$promo);
                $DAOCodePromo->update($newCodePromo);
                header("Location: /user/admin_space/codes_promotionnel");die();
            }
            var_dump($id);
            header("Location: /user/admin_space/codes_promotionnel/$id");die();
        }
        header("Location: /user/admin_space/codes_promotionnel");die();
    }

    /*
    * Fonction qui permet de valider la déconnexion
    * Elle va supprimer le USER de la session et le rediriger vers la page d'accueil
    */
    function logout(){
        session_start();
        // Supprimer le USER de la session
        unset($_SESSION['user']);
        // Supprimer le panier de la session
        if (isset($_SESSION['panier'])){
            unset($_SESSION['panier']);
        }
        header("Location: /");
    }

    /*
    * Fonction qui permet de mettre à jour les informations de l'utilisateur
    * Elle va récupérer les informations du formulaire et les mettre à jour dans la base de données
    */
    function updateUserInformations(){
        $civilite = $_POST['civility'];
        $nom = $_POST['lastname'];
        $prenom = $_POST['firstname'];
        $mail = $_POST['email'];
        $tel = $_POST['tel'];

        // Echaper les données
        $civilite = htmlspecialchars($civilite, ENT_QUOTES, 'UTF-8');
        $nom = htmlspecialchars($nom, ENT_QUOTES, 'UTF-8');
        $prenom = htmlspecialchars($prenom, ENT_QUOTES, 'UTF-8');
        $mail = htmlspecialchars($mail, ENT_QUOTES, 'UTF-8');
        $tel = htmlspecialchars($tel, ENT_QUOTES, 'UTF-8');

        session_start();

        // Gérer les erreurs
        $errors = [
            "civility" => false,
            "lastname" => false,
            "firstname" => false,
            "email" => false,
            "tel" => false
        ];
        if ($nom == "" || !ctype_alpha($nom) || strlen($nom) > 64){
            $errors["lastname"] = true;
        }
        if ($prenom == "" || !ctype_alpha($prenom) || strlen($prenom) > 64){
            $errors["firstname"] = true;
        }
        if ($mail == "" || !filter_var($mail, FILTER_VALIDATE_EMAIL) || strlen($mail) > 255){
            $errors["email"] = true;
        }
        if ($tel != "" && !ctype_digit($tel) || strlen($tel) > 10){
            $errors["tel"] = true;
        }

        // Si il y a des erreurs, mettre à jour les variables de session et rediriger vers la page précédente
        if (in_array(true, $errors)){
            $_SESSION['errors'] = $errors;
            header("Location: /user/dashboard/informations");
            die();
        }

        // Mettre à jour les informations de l'utilisateur dans variables de session
        $_SESSION['user']->setGenre($civilite);
        $_SESSION['user']->setNom($nom);
        $_SESSION['user']->setPrenom($prenom);
        $_SESSION['user']->setEmail($mail);
        $_SESSION['user']->setTelephone($tel);

        // Mettre à jour les informations de l'utilisateur dans la base de données
        $DAOUser = new \backend\DAO\DBUser();
        $DAOUser::update($_SESSION['user']);

        // Redirection vers la page d'informations
        header("Location: /user/dashboard/informations");
    }

    /*
    * Fonction qui permet de mettre à jour l'adresse de l'utilisateur
    * Elle va récupérer les informations du formulaire et les mettre à jour dans la base de données
    */
    function updateUserAddress(){
        $address = $_POST['address'];
        $code = $_POST['code'];
        $additional_address = $_POST['additional-address'];
        $city = $_POST['city'];

        // Echaper les données
        $address = htmlspecialchars($address, ENT_QUOTES, 'UTF-8');
        $code = htmlspecialchars($code, ENT_QUOTES, 'UTF-8');
        if ($code == "" || !ctype_digit($code)){
            $code = null;
        } else {
            $code = intval($code);
        }
        $additional_address = htmlspecialchars($additional_address, ENT_QUOTES, 'UTF-8');
        $city = htmlspecialchars($city, ENT_QUOTES, 'UTF-8');

        session_start();

        // Gérer les erreurs
        $errors = [
            "address" => false,
            "code" => false,
            "complement" => false,
            "city" => false
        ];

        if (strlen($address) > 255){
            $errors["address"] = true;
        }
        // Si il taille du code postal n'est pas égale à 5 mais qu'il n'est pas vide, erreur. Aussi si le code postal n'est pas un nombre, erreur
        if ((strlen($code) != 5 && strlen($code) != 0) || (!ctype_digit($code) && strlen($code) != 0)){
            $errors["code"] = true;
        }
        if (strlen($city) > 128){
            $errors["city"] = true;
        }
        if (strlen($additional_address) > 128){
            $errors["complement"] = true;
        }

        // Si il y a des erreurs, mettre à jour les variables de session et rediriger vers la page précédente
        if (in_array(true, $errors)){
            $_SESSION['errors'] = $errors;
            header("Location: /user/dashboard/adresse");
            die();
        }

        // Mettre à jour les informations de l'utilisateur dans variables de session
        $_SESSION['user']->setAdresse($address);
        $_SESSION['user']->setCodePostal($code);
        $_SESSION['user']->setComplementAdresse($additional_address);
        $_SESSION['user']->setVille($city);

        // Mettre à jour les informations de l'utilisateur dans la base de données
        $DAOUser = new \backend\DAO\DBUser();
        $DAOUser::update($_SESSION['user']);

        // Redirection vers la page d'adresse
        header("Location: /user/dashboard/adresse");
    }

    function updateUserPassword(){
        // Récupérer les données du formulaire
        $old_password = $_POST['currentpasswords'];
        $new_password = $_POST['newpasswords'];

        // Echaper les données
        $old_password = htmlspecialchars($old_password, ENT_QUOTES, 'UTF-8');
        $new_password = htmlspecialchars($new_password, ENT_QUOTES, 'UTF-8');

        // Récupérer l'id de l'utilisateur
        session_start();
        $id = $_SESSION['user']->getId();

        // Gérer les erreurs
        $errors = [
            "old_password" => false,
            "new_password" => false
        ];

        $DAOUser = new \backend\DAO\DBUser();
        $user = $DAOUser::getById($id);
        if ($DAOUser::checkUser($user->getEmail(), $old_password) == null || strlen($old_password) > 255){
            $errors["old_password"] = true;
        }
        if ($new_password == "" || strlen($new_password) > 255){
            $errors["new_password"] = true;
        }

        // Si il y a des erreurs, mettre à jour les variables de session et rediriger vers la page précédente
        if (in_array(true, $errors)){
            $_SESSION['errors'] = $errors;
            header("Location: /user/dashboard/informations");
            die();
        }

        // Mettre à jour le mot de passe de l'utilisateur dans la base de données
        $DAOUser::updatePassword($id, $new_password);

        // Pop-up de confirmation
        $_SESSION['popup'] = ["title" => "Mot de passe modifié", "message" => "Votre mot de passe a bien été modifié"];

        // Redirection vers la page d'informations
        header("Location: /user/dashboard/informations");
    }

    function addArticle(){
        //TODO vérifier si il est admin
        if(isset($_POST)){
            if(isset($_POST["article-name"])){
                $DAOArticle = new \backend\DAO\DBArticle();
                $nom =$_POST["article-name"];
                $categorie =$_POST["article-category"];
                $genre = $_POST["article-gender"];
                $couleur = $_POST["article-color"];
                $description =$_POST["article-description"];
                $prix =$_POST["article-price"];
                $promo = $_POST["article-promo"];
                $catalog = $_POST["catalog"];
                $disponible = false;
                if($catalog == "oui"){
                    $disponible = true;
                }
        
                $quantite = array();
                $images = array();
                if (isset($_POST["article-category"])){
                    if ($_POST["article-category"] == "accessory"){
                        $quantite = $_POST["Aucun"];
                        $DAOArticle::addAccessoire($nom,$genre,$couleur,$description,$prix,$promo,$disponible,$quantite,$images);
                    }else{
                        $quantite = array($_POST["XS"],$_POST["S"],$_POST["M"],$_POST["L"],$_POST["XL"]);
                        $DAOArticle::addVetement($nom,$categorie,$genre,$couleur,$description,$prix,$promo,$disponible,$quantite,$images);
                    }
                    header("Location: /");
                    die();
                }
            }
        }
        header("Location: /user/admin_space/articles/nouvelArticle");

        
        



    }
}

?>