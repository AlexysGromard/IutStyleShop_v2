<?php

namespace backend\DAO;

Interface UserInterface extends DAOInterface
{

    /**
     * Récupère un user par son email.
     *
     * @param string $email
     * @return UserEntity|null
     */
    public function getByEmail(string $email): ?UserEntity;


    /**
     *  Vérifie si un utilisateur existe dans la base de données.
     * 
     * @param string $email
     * @param string $password
     * 
     * @return UserEntity|null
     */
    public function checkUser(string $email, string $password): ?UserEntity;

    /**
     * Récupère un user par son role.
     * 
     * @param string $role
     * 
     * @return UserEntity[]
     */
    public function getUserByRole(string $role): array;

    /**
     * Récupère un user par son genre.
     * 
     * @param string $genre
     * 
     * @return UserEntity[]
     */
    public function getUserByGenre(string $genre): array;

}
