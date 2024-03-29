<?php

namespace backend\DAO;

class DBUser extends Connexion implements DAOInterface
{
    /**
     * Ajoute un utilisateur
     * 
     * @param UserEntity $entity
     * @param string $element
     * @return void
     */
    public static function add($email, $telephone, $password, $nom, $prenom, $genre, $address, $ville, $code_postal, $complement_adresse)
    { 
        $requete = "CALL InsertUserClient(?,?,?,?,?,?,?,?,?,?)";

        $stmt = self::$pdo->prepare($requete);


        $stmt->bindParam(1, $email, \PDO::PARAM_STR); // Mail
        $stmt->bindParam(2, $telephone, \PDO::PARAM_STR); // Téléphone
        $stmt->bindParam(3, $password, \PDO::PARAM_STR); // Mot de passe
        $stmt->bindParam(4, $nom, \PDO::PARAM_STR); // Nom
        $stmt->bindParam(5, $prenom, \PDO::PARAM_STR); // Prénom
        $stmt->bindParam(6, $genre, \PDO::PARAM_STR); // Genre
        $stmt->bindParam(7, $address, \PDO::PARAM_STR); // Adresse
        $stmt->bindParam(8, $ville, \PDO::PARAM_STR); // Ville
        $stmt->bindParam(9, $code_postal, \PDO::PARAM_INT); // Code postal
        $stmt->bindParam(10, $complement_adresse, \PDO::PARAM_STR); // Complément d'adresse

        $stmt->execute();
    }

    /**
     * Update un utilisateur
     * 
     * @param UserEntity $entity
     * @return void
     */
    public static function update($entity)
    {
        $email = $entity->getEmail();
        $telephone = $entity->getTelephone();
        $nom = $entity->getNom();
        $prenom = $entity->getPrenom();
        $genre = $entity->getGenre();
        $adresse = $entity->getAdresse();
        $ville = $entity->getVille();
        $codePostal = $entity->getCodePostal();
        $complementAdresse = $entity->getComplementAdresse();
        $id = $entity->getId();
    
        $requete = "CALL UpdateUser(?,?,?,?,?,?,?,?,?,?)";
    
        $stmt = self::$pdo->prepare($requete);
    
        $stmt->bindParam(1, $email, \PDO::PARAM_STR);
        $stmt->bindParam(2, $telephone, \PDO::PARAM_STR);
        $stmt->bindParam(3, $nom, \PDO::PARAM_STR);
        $stmt->bindParam(4, $prenom, \PDO::PARAM_STR);
        $stmt->bindParam(5, $genre, \PDO::PARAM_STR);
        $stmt->bindParam(6, $adresse, \PDO::PARAM_STR);
        $stmt->bindParam(7, $ville, \PDO::PARAM_STR);
        $stmt->bindParam(8, $codePostal, \PDO::PARAM_INT);
        $stmt->bindParam(9, $complementAdresse, \PDO::PARAM_STR);
        $stmt->bindParam(10, $id, \PDO::PARAM_INT);

        $stmt->execute();
    }


    /**
     * Update le role d'un utilisateur
     * 
     * @param int $id
     * @param string $role
     * @return void
     */
    public static function updaterole($id, $role)
    {
        $requete = "CALL UpdateUserRole(?,?)";

        $stmt = self::$pdo->prepare($requete);

        $stmt->bindParam(1, $id, \PDO::PARAM_INT);
        $stmt->bindParam(2, $role, \PDO::PARAM_STR);

        $stmt->execute();
    }

    /**
     * Update le mot de passe d'un utilisateur
     * 
     * @param int $id
     * @param string $password
     * @return void
     */
    public static function updatepassword($id, $password)
    {
        $requete = "CALL UpdatePassword(?,?)";

        $stmt = self::$pdo->prepare($requete);

        $stmt->bindParam(1, $id, \PDO::PARAM_INT);
        $stmt->bindParam(2, $password, \PDO::PARAM_STR);

        $stmt->execute();
    }

    /**
     * Delete un utilisateur
     * 
     * @param UserEntity $entity
     * @return void
     */
    public static function delete($entity)
    {
        $requete = "CALL DeleteUser(?)";

        $stmt = self::$pdo->prepare($requete);
        
        $id = $entity->getId();
        $stmt->bindParam(1, $id, \PDO::PARAM_INT);


        $stmt->execute();
    }

    /**
     * Donne un utilisateur par son id
     * 
     * @param int $id
     * @return UserEntity
     */
    public static function getall()
    {
        $requete = "CALL GetUserInfoAll()";
        $stmt = self::$pdo->prepare($requete);
        $stmt->execute();
        
        // Récupérer la liste complète d'utilisateurs en utilisant le mode associatif
        $usersData = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        
        // Convertir les données associatives en objets UserEntity
        $userEntities = [];
        foreach ($usersData as $userData) {
            $userEntity = new \backend\entity\UserEntity(
                $userData['id'],
                $userData['email'],
                $userData['telephone'],
                $userData['nom'],
                $userData['prenom'],
                $userData['genre'],
                $userData['role'],
                $userData['adresse'],
                $userData['ville'],
                $userData['code_postal'],
                $userData['Complement_adresse']
            );

    
            // Assuming $userEntities is an array of UserEntity objects
            $userEntities[] = $userEntity;

        }

        return $userEntities;
    }

    /**
     * Donne le nom et prenom d'un utilisateur par son id
     * 
     * @param int $id
     * @return string|null
     */
    public static function getNomPrenomById(int $id): ?array{
        $requete = "CALL GetUserNomPrenom(?)";
        $stmt = self::$pdo->prepare($requete);
        $stmt->bindParam(1,$id);
        $stmt->execute();
        $names = $stmt->fetch(\PDO::FETCH_ASSOC);

        return $names;

    }


    /**
     * Donne le UserEntity d'un utilisateur par son id
     * 
     * @param int $id
     * @return UserEntity|null
     */
    public static function getById(int $id): ?\backend\entity\UserEntity
    {
        assert(is_numeric($id),"L'id demandé n'est pas correcte (Il doit être un nombre !)");
        assert($id>0,"L'id demandé n'est pas correcte (<=0)");


        $requete = "CALL GetUserInfo(?)";
        $stmt = self::$pdo->prepare($requete);

        $stmt->bindParam(1, $id, \PDO::PARAM_INT);
        
        $stmt->execute();
        
        $userData = $stmt->fetch(\PDO::FETCH_ASSOC);
        if($userData){
            $userEntity = new \backend\entity\UserEntity(
                            $userData['id'],
                            $userData['email'],
                            $userData['telephone'],
                            $userData['nom'],
                            $userData['prenom'],
                            $userData['genre'],
                            $userData['role'],
                            $userData['adresse'],
                            $userData['ville'],
                            $userData['code_postal'],
                            $userData['Complement_adresse']
                        );
            return $userEntity;
        }

        return null;
    }



     /**
     * Donne l'id d'un utilisateur par son email
     * 
     * @param string $email
     * @return ?int
     */
    public static function getByEmail(string $email): ?int
    {
        $requete = "CALL GetUserId(?)";
        $stmt = self::$pdo->prepare($requete);

        $stmt->bindParam(1, $email, \PDO::PARAM_STR);
 
        $stmt->execute();
        
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        
        return $result ? $result[0]["id"] : null;
    }

    /**
     * Donne un utilisateur par son id
     * 
     * @param int $id
     * @return UserEntity
     */
    public static function checkUser(string $email, string $password): ?\backend\entity\UserEntity
    {
        $requete = "CALL GetConnectedUser(?,?)";
        $stmt = self::$pdo->prepare($requete);

        $stmt->bindParam(1, $email, \PDO::PARAM_STR);
        $stmt->bindParam(2, $password, \PDO::PARAM_STR);

        $stmt->execute();
        
        $usersData = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        

        $userEntities = [];
        foreach ($usersData as $userData) {
            $userEntity = new \backend\entity\UserEntity(
                $userData['id'],
                $userData['email'],
                $userData['telephone'],
                $userData['nom'],
                $userData['prenom'],
                $userData['genre'],
                $userData['role'],
                $userData['adresse'],
                $userData['ville'],
                $userData['code_postal'],
                $userData['Complement_adresse']
            );
            $userEntities[] = $userEntity;

        }

        return $userEntities ? $userEntities[0] : null;
    }

    /*
    public function getCommandeOfAllUser(){
        $users = self::getall();

        $DAOCommande = new DBUser;

        $commandes = []
        foreach ($users as $user){
            $commandesUser = DBCommande::getCommandeByIdUser()
        }
    }
    */
    

}