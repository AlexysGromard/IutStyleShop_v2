<?php

namespace backend\DAO;

class DBUser extends Connexion implements DoubleEntityInterface
{
    public function add($entity, $password)
    { 
        $requete = "CALL InsertUser(?,?,?,?,?,?,?,?,?,?)";

        $stmt = $this->pdo->prepare($requete);


        $stmt->bindParam(1, $entity->mail, \PDO::PARAM_STR);
        $stmt->bindParam(2, $entity->telephone, \PDO::PARAM_STR);
        $stmt->bindParam(3, $password, \PDO::PARAM_STR);
        $stmt->bindParam(4, $entity->nom, \PDO::PARAM_STR);
        $stmt->bindParam(5, $entity->prenom, \PDO::PARAM_STR);
        $stmt->bindParam(6, $entity->genre, \PDO::PARAM_STR);
        $stmt->bindParam(7, $entity->address, \PDO::PARAM_STR);
        $stmt->bindParam(8, $entity->ville, \PDO::PARAM_STR);
        $stmt->bindParam(9, $entity->code_postal, \PDO::PARAM_INT);
        $stmt->bindParam(10, $entity->complement_adresse, \PDO::PARAM_STR);

        $stmt->execute();
    }

    public function update($entity)
    {


        $requete = "CALL UpdateUser(?,?,?,?,?,?,?,?,?,?)";

        $stmt = $this->pdo->prepare($requete);

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

    public function updaterole($id, $role)
    {
        $requete = "CALL UpdateUserRole(?,?)";

        $stmt = $this->pdo->prepare($requete);

        $stmt->bindParam(1, $id, \PDO::PARAM_INT);
        $stmt->bindParam(2, $role, \PDO::PARAM_STR);

        $stmt->execute();
    }

    public function updatepassword($id, $password)
    {
        $requete = "CALL UpdateUserPassword(?,?)";

        $stmt = $this->pdo->prepare($requete);

        $stmt->bindParam(1, $id, \PDO::PARAM_INT);
        $stmt->bindParam(2, $password, \PDO::PARAM_STR);

        $stmt->execute();
    }

    public function delete($id)
    {
        $requete = "CALL DeleteUser(?)";

        $stmt = $this->pdo->prepare($requete);

        $stmt->bindParam(1, $id, \PDO::PARAM_INT);

        $stmt->execute();
    }

    public function getall()
    {
        $requete = "CALL GetUserInfoAll()";
        $stmt = $this->pdo->prepare($requete);
        $stmt->execute();
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        var_dump($result);
        return $result;
    }

    public function getByEmail(string $email): ?UserEntity
    {
        $requete = "CALL GetUseridByEmail(?)";
        $stmt = $this->pdo->prepare($requete);

        $stmt->bindParam(1, $email, \PDO::PARAM_STR);

        $stmt->execute();
        
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        var_dump($result);
        return $result;
    }

    public function checkUser(string $email, string $password): ?UserEntity
    {
        $requete = "CALL GetConnectedUser(?,?)";
        $stmt = $this->pdo->prepare($requete);

        $stmt->bindParam(1, $email, \PDO::PARAM_STR);
        $stmt->bindParam(2, $password, \PDO::PARAM_STR);

        $stmt->execute();
        
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        var_dump($result);
        return $result;
    }

    public function getUserByRole(string $role): array
    {
    }

    public function getUserByGenre(string $genre): array
    {
    }






}