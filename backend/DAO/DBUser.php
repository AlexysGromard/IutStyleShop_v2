<?php

namespace backend\DAO;

class DBUser extends Connexion implements UserInterface
{
    public function add($entity)
    {   
    }

    public function update($entity)
    {
    }

    public function delete($id)
    {
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
    }

    public function checkUser(string $email, string $password): ?UserEntity
    {
    }

    public function getUserByRole(string $role): array
    {
    }

    public function getUserByGenre(string $genre): array
    {
    }




}