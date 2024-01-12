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
    public static function add($entity, $element)
    { 
        $requete = "CALL InsertUser(?,?,?,?,?,?,?,?,?,?)";

        $stmt = self::pdo->prepare($requete);


        $stmt->bindParam(1, $entity->mail, \PDO::PARAM_STR);
        $stmt->bindParam(2, $entity->telephone, \PDO::PARAM_STR);
        $stmt->bindParam(3, $element, \PDO::PARAM_STR);
        $stmt->bindParam(4, $entity->nom, \PDO::PARAM_STR);
        $stmt->bindParam(5, $entity->prenom, \PDO::PARAM_STR);
        $stmt->bindParam(6, $entity->genre, \PDO::PARAM_STR);
        $stmt->bindParam(7, $entity->address, \PDO::PARAM_STR);
        $stmt->bindParam(8, $entity->ville, \PDO::PARAM_STR);
        $stmt->bindParam(9, $entity->code_postal, \PDO::PARAM_INT);
        $stmt->bindParam(10, $entity->complement_adresse, \PDO::PARAM_STR);

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


        $requete = "CALL UpdateUser(?,?,?,?,?,?,?,?,?,?)";

        $stmt = self::pdo->prepare($requete);

        $stmt->bindParam(1, $entity->mail, \PDO::PARAM_STR);
        $stmt->bindParam(2, $entity->telephone, \PDO::PARAM_STR);
        $stmt->bindParam(3, $entity->nom, \PDO::PARAM_STR);
        $stmt->bindParam(4, $entity->prenom, \PDO::PARAM_STR);
        $stmt->bindParam(5, $entity->genre, \PDO::PARAM_STR);
        $stmt->bindParam(6, $entity->address, \PDO::PARAM_STR);
        $stmt->bindParam(7, $entity->ville, \PDO::PARAM_STR);
        $stmt->bindParam(8, $entity->code_postal, \PDO::PARAM_INT);
        $stmt->bindParam(9, $entity->complement_adresse, \PDO::PARAM_STR);
        $stmt->bindParam(10, $entity->id, \PDO::PARAM_INT);


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
        $requete = "CALL UpdateUserPassword(?,?)";

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

        $stmt->bindParam(1, $entity->getId(), \PDO::PARAM_INT);

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
     * Donne l'id d'un utilisateur par son email
     * 
     * @param int $id
     * @return UserEntity|null
     */
    public static function getById(int $id): ?\backend\entity\UserEntity
    {
        $requete = "CALL GetUserInfo(?)";
        $stmt = self::$pdo->prepare($requete);

        $stmt->bindParam(1, $id, \PDO::PARAM_INT);

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



     /**
     * Donne l'id d'un utilisateur par son email
     * 
     * @param int $id
     * @return UserEntity
     */
    public static function getByEmail(string $email): ?int
    {
        $requete = "CALL GetUseridByEmail(?)";
        $stmt = self::$pdo->prepare($requete);

        $stmt->bindParam(1, $email, \PDO::PARAM_STR);

        $stmt->execute();
        
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        



        return $result ? $result[0] : null;
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
    

}