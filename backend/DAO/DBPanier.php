<?php

namespace backend\DAO;

use Override;

class DBPanier extends Connexion implements DAOInterface
{
    public static function add($entity,$user) //\backend\entity\PanierEntity 
    {   
        try {
            $requete = "CALL InsertPanier(?,?,?,?)";
            $stmt = self::$pdo->prepare($requete);

            // Lie les paramètres d'entrée
            $stmt->bindParam(1, $entity->id_article, \PDO::PARAM_INT);
            $stmt->bindParam(1, $entity->taille, \PDO::PARAM_INT);
            $stmt->bindParam(1, $entity->taille, \PDO::PARAM_INT);
            $stmt->bindParam(1, $entity->taille, \PDO::PARAM_INT);
            $stmt->execute();
        }catch (\PDOException $e ){
            // Gère les erreurs de la base de données
            echo "Erreur : " . $e->getMessage();
        }

    }

    public static function update($entity)
    {
        // $requete = "call PanierPackage.UpdatePanier(:id, :idArticle, :idUser, :taille, :quantite)";
    }

    public static function delete($id)
    {

    }

    public static function deleteArticle($id)
    {
        $requete = "call PanierPackage.DeleteOneArticlePanier(:iduser, :idarticle)";
        $stmt = self::$pdo->prepare($requete);
        $stmt->execute([
            'iduser' => $_SESSION['id'],
            'idarticle' => $id
        ]);
    }

    public static function getall()
    {
        try {
            $requete = "CALL GetAllArticlePanier()";
            $stmt = self::$pdo->prepare($requete);

            $stmt->execute();
            $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);

            $articles = array();
            foreach ($result as $article ){
                $articles[] = new \backend\entity\PanierArticleEntity($article["id_Article"],$article["taille"],$article["quantite"]);
            }
            return new \backend\entity\PanierEntity($articles);
            
            
        }catch (\PDOException $e ){
            // Gère les erreurs de la base de données
            echo "Erreur : " . $e->getMessage();
        }
    }

    public static function getById(int $id): ?\backend\entity\PanierEntity
    {
        
    }


    /**
     * Donne le panier d'un utilisateur
     * 
     * @param int $id
     * @return array
     */
    static public function getPanierByUser(int $id): array
    {
        try {
            $requete = "CALL GetArticlePanier(?)";
            $stmt = self::$pdo->prepare($requete);
            // Lie les paramètres d'entrée
            $stmt->bindParam(1, $id, \PDO::PARAM_INT);

            $stmt->execute();
            $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);

            $articles = array();
            foreach ($result as $article ){
                $articles[] = new \backend\entity\PanierArticleEntity($article["id_Article"],$article["taille"],$article["quantite"]);
            }
            return new \backend\entity\PanierEntity($articles);
            
            
        }catch (\PDOException $e ){
            // Gère les erreurs de la base de données
            echo "Erreur : " . $e->getMessage();
        }
    }



    
}