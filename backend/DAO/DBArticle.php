<?php

namespace backend\DAO;

class DBArticle extends Connection implements ArticleInterface
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

    public function getById(int $id): ?ArticleEntity
    {
    }

    public function getArticleByCategorie(string $categorie): array
    {
    }

    public function getArticleByDisponibilite(bool $disponibilite): array
    {
    }

    public function getArticleByCondition(string $categorie, string $genre, string $couleur, array $prix, bool $promo, bool $disponibilite): array
    {
    }
}