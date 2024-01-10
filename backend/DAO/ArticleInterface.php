<?php

namespace backend\DAO;

use \backend\entity\ArticleEntity;


Interface ArticleInterface extends DAOInterface
{
    /**
     * Récupère un article par son identifiant.
     *
     * @param int $id
     * @return ArticleEntity|null
     */
    public function getById(int $id): ?ArticleEntity;


    /**
     * Récupère un article par sa catégorie.
     * 
     * @param string $categorie
        *
        * @return ArticleEntity[]
     */
    public function getArticleByCategorie(string $categorie) : array;

    /**
     * Récupère un article par sa disponibilité.
     * 
     * @param bool $disponibilite
     * 
     * @return ArticleEntity[]
     */
    public function getArticleByDisponibilite(bool $disponibilite) : array;



    /**
     * Récupère un article par sa different condition.
     * 
    * @param string $categorie
    * @param string $genre
    * @param string $couleur
    * @param array $prix  [prixMin, prixMax]
    * @param bool $promo
    * @param bool $disponibilite
    * 
    * @return ArticleEntity[]
     */
    public function getArticleByCondition(string $categorie, string $genre, string $couleur, array $prix, bool $promo,bool $disponibilite) : array;




}
