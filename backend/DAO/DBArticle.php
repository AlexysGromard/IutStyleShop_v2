<?php

namespace backend\DAO;

use \backend\entity\ArticleEntity;  


class DBArticle extends Connexion implements ArticleInterface
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
        echo "<p>2555555</p>";

    }

    public function getById(int $id): ?ArticleEntity
    {
        return null;
    }

    public function getArticleByCategorie(string $categorie): array
    {
        return array();
    }

    public function getArticleByDisponibilite(bool $disponibilite): array
    {
        return array();

    }

    public function getArticleByCondition(string $categorie, string $genre, string $couleur, array $prix, bool $promo, bool $disponibilite): array
    {
        return array();

    }
}