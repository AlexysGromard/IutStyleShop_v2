<?php

namespace backend\DAO;

class DBArticle extends Connexion implements DAOInterface
{
    /**
     * Ajoute un article
     * 
     * @param ArticleEntity $entity
     * @return void
     */
    public static function add($entity)
    {   
        $sql = "INSERT INTO article (nom, description, prix, promo, disponibilite, categorie, genre, couleur, taille, image) VALUES (:nom, :description, :prix, :promo, :disponibilite, :categorie, :genre, :couleur, :taille, :image)";
        $stmt = self::$pdo->prepare($sql);
        $stmt->execute([
            'nom' => $entity->getNom(),
            'description' => $entity->getDescription(),
            'prix' => $entity->getPrix(),
            'promo' => $entity->getPromo(),
            'disponibilite' => $entity->getDisponibilite(),
            'categorie' => $entity->getCategorie(),
            'genre' => $entity->getGenre(),
            'couleur' => $entity->getCouleur(),
            'taille' => $entity->getTaille(),
            'image' => $entity->getImage()
        ]);
    }

    /**
     * Update une articles
     * 
     * @param ArticleEntity $entity
     * @return void
     */
    public static function update($entity)
    {
    }


    /**
     * Supprime un article
     * 
     * @param int $id
     * @return void
     */
    public static function delete($id)
    {
    }

    /**
     * Donne tous les articles
     * 
     * @return ArticleEntity[]
     */
    public static function getall()
    {
    }

    /**
     * Donne un article
     * 
     * @param int $id
     * @return ArticleEntity|null
     */
    public static function getById(int $id): ?ArticleEntity
    {
    }

    /**
     * Donne les articles d'une categorie
     * 
     * @param string $categorie
     * @return ArticleEntity[]
     */
    public static function getArticleByCategorie(string $categorie): array
    {
    }

    /**
     * Donne les articles disponibles
     * 
     * @param string $genre
     * @return ArticleEntity[]
     */
    public static function getArticleByDisponibilite(bool $disponibilite): array
    {
    }

    /**
     * Donne les articles par rapport à des conditions
     * 
     * @param bool $promo
     * @return ArticleEntity[]
     */
    public static function getArticleByCondition(string $categorie, string $genre, string $couleur, array $prix, bool $promo, bool $disponibilite): array
    {
    }
}