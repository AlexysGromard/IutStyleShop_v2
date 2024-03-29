<?php

namespace backend\DAO;

use Override;

class DBPanier extends Connexion
{
    public static function add($panierArticle,$user) 
    {   
        try {
            $tailles = ["XS","S","M","L","XL"];

            $requete = "CALL InsertPanier(?,?,?,?)";
            $stmt = self::$pdo->prepare($requete);

            $id = $user->getId();
            $idArticle = $panierArticle->getIdArticle();
            $taille = $panierArticle->getTaille();
            $quantite = $panierArticle->getQuantite();

            // Lie les paramètres d'entrée
            $stmt->bindParam(1, $id, \PDO::PARAM_INT);
            $stmt->bindParam(2, $idArticle, \PDO::PARAM_INT);
            $stmt->bindParam(3, $taille, \PDO::PARAM_STR);
            $stmt->bindParam(4, $quantite, \PDO::PARAM_INT);
            $stmt->execute();
        }catch (\PDOException $e ){
            // Gère les erreurs de la base de données
            echo "Erreur : " . $e->getMessage();
        }

    }

    public static function update($panierArticle,$user)
    {
        try {
            $requete = "CALL UpdateArticlePanier(?,?,?,?)";
            $stmt = self::$pdo->prepare($requete);
            
            $idArticle = $panierArticle->getIdArticle();
            $id = $user->getId();
            $taille = $panierArticle->getTaille();
            $quantite = $panierArticle->getQuantite();

            echo $idArticle." ".$id." ".$taille." ".$quantite;

            // Lie les paramètres d'entrée
            $stmt->bindParam(1, $idArticle, \PDO::PARAM_INT);
            $stmt->bindParam(2, $id, \PDO::PARAM_INT);
            $stmt->bindParam(3, $taille, \PDO::PARAM_INT);
            $stmt->bindParam(4, $quantite, \PDO::PARAM_INT);
            $stmt->execute();
        }catch (\PDOException $e ){
            // Gère les erreurs de la base de données
            echo "Erreur : " . $e->getMessage();
        }
    }

    public static function delete($user)
    {
        try {
            $requete = "CALL DeleteAllPanier(?)";
            $stmt = self::$pdo->prepare($requete);

            // Lie les paramètres d'entrée
            $stmt->bindParam(1, $user->getId(), \PDO::PARAM_INT);

            $stmt->execute();
        }catch (\PDOException $e ){
            // Gère les erreurs de la base de données
            echo "Erreur : " . $e->getMessage();
        }
    }

    public static function deleteArticle($panierArticle,$user)
    {
        try {
            $requete = "CALL DeleteArticlePanier(?,?)";
            $stmt = self::$pdo->prepare($requete);
            
            // Lie les paramètres d'entrée
            $user = $user->getId();
            $panierArticle = $panierArticle->getIdArticle();

            $stmt->bindParam(1, $user, \PDO::PARAM_INT);
            $stmt->bindParam(2, $panierArticle, \PDO::PARAM_INT);
            $stmt->execute();
        }catch (\PDOException $e ){
            // Gère les erreurs de la base de données
            echo "Erreur : " . $e->getMessage();
        }
    }


    /**
     * Donne le panier d'un utilisateur
     * 
     * @param int $id
     * @return array
     */
    static public function getPanierByUser($user): \backend\entity\PanierEntity
    {
        try {
            $requete = "CALL GetArticlePanier(?)";
            $stmt = self::$pdo->prepare($requete);
            // Lie les paramètres d'entrée
            $id = $user->getId();
            $stmt->bindParam(1, $id, \PDO::PARAM_INT);

            $stmt->execute();
            $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);

            $articles = array();
            foreach ($result as $article ){
                $articles[] = new \backend\entity\PanierArticleEntity($article["ID_Article"],$article["taille"],$article["quantite"]);
            }
            return new \backend\entity\PanierEntity($articles);
            
            
        }catch (\PDOException $e ){
            // Gère les erreurs de la base de données
            echo "Erreur : " . $e->getMessage();
        }
    }

}