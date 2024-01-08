<?php

namespace backend\DAO;

class DBUser extends Connection implements UserInterface
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