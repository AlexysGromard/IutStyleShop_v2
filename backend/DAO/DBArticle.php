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

    public function getall():array
    {
        

        return array();

    }

    public function getById(int $id): ?ArticleEntity
    {
        try {
            $requete = "CALL GetArticleInfo(?, @p_article, @p_image, @p_accessoire_or_vetement)";
            $stmt = $this->pdo->prepare($requete);
            // Lie les paramètres d'entrée
            $stmt->bindParam(1, $id, \PDO::PARAM_INT);

            // Lie les variables de sortie
            $stmt->bindParam('@p_article', $p_article, \PDO::PARAM_STR | \PDO::PARAM_INPUT_OUTPUT, 255);
            $stmt->bindParam('@p_image', $p_image, \PDO::PARAM_STR | \PDO::PARAM_INPUT_OUTPUT, 255);
            $stmt->bindParam('@p_accessoire_or_vetement', $p_accessoire_or_vetement, \PDO::PARAM_STR | \PDO::PARAM_INPUT_OUTPUT, 255);

            $result = $stmt->fetch(\PDO::FETCH_ASSOC);
            return $result;
        }catch (\PDOException $e ){
            // Gère les erreurs de la base de données
            echo "Erreur : " . $e->getMessage();
        }
        
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