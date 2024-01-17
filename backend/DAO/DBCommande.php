<?php

namespace backend\DAO;

use \backend\entity\CommandeEntity;
use \backend\entity\ArticleCommandeEntity;

class DBCommande extends Connexion implements DAOInterface
{



    /**
     * Ajoute tout le panier dans une commande pour un utilisateur
     * 
     * @param  CommandeEntity $entity
     */
    public static function add($user,$codepromo){
        $requete = "CALL InsertCommande(?,?)";
        $stmt = self::$pdo->prepare($requete);
        // Code promo
        if ($codepromo == null){
            $codepromo = 0;
        } else {
            $codepromo = $codepromo->getId();
        }

        $stmt->bindParam(1, $user->getId(), \PDO::PARAM_INT);
        $stmt->bindParam(2, $codepromo, \PDO::PARAM_INT);

        $stmt->execute();
    }

    /**
     * update une commande
     * 
     * @param  CommandeEntity $entity
     */
    public static function update($entity)
    {
        $requete = "CALL UpdateStatutCommande(?,?)";
        $stmt = self::$pdo->prepare($requete);
        

        $stmt->bindParam(1, $entity->getId(), \PDO::PARAM_INT);
        $stmt->bindParam(2, $entity->getStatut(), \PDO::PARAM_INT);
        
        $stmt->execute();
        var_dump($entity);

    }


    /**
     * Supprimme une commande
     * 
     * @param  CommandeEntity $entity
     */
    public static function delete($entity)
    {
        $requete = "CALL DeleteCommande(?)";
        $stmt = self::$pdo->prepare($requete);

        $id = $entity->getId();
        $stmt->bindParam(1, $id, \PDO::PARAM_INT);

        $stmt->execute();
    }


    private static function getallCommandeByIdUser($idUser){
        $requete = "CALL GetCommandeByIdUser(?)";
        $stmt = self::$pdo->prepare($requete);

        $stmt->bindParam(1, $idUser, \PDO::PARAM_INT);

        $stmt->execute();

        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $result;
    }

    private static function getCommandeById($id){
        $requete = "CALL GetCommandeById(?)";
        $stmt = self::$pdo->prepare($requete);

        $stmt->bindParam(1, $id, \PDO::PARAM_INT);

        $stmt->execute();

        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $result;
    }


    private static function getallCommande(){
        $requete = "CALL GetAllCommandes()";
        $stmt = self::$pdo->prepare($requete);

        $stmt->execute();

        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $result;
    }

    private static function getallArticleCommandeById($id){
        $requete2 = "CALL GetAllArticleOfCommande(?)";
        $stmt2 = self::$pdo->prepare($requete2);
        $stmt2->bindParam(1, $id, \PDO::PARAM_INT);

        $stmt2->execute();

        $result2 = $stmt2->fetchAll(\PDO::FETCH_ASSOC);
        return $result2;
    }
    

    /**
     * donne toutes les commandes
     * 
     * @return  array of CommandeEntity 
     */
    public static function getAll(): array{
        $res1 = self::getallCommande();

        $commandes= [];
        foreach ($res1 as $commande){
            
            $res2 = self::getallArticleCommandeById($commande["id"]);
            $listArticle = [];
            foreach ($res2 as $article){

                $listArticle[] = new \backend\entity\ArticleCommandeEntity($article["id_Article"],$article["taille"],$article["prix_unitaire"],$article["quantite"]);
            }


            $commandes[] = new \backend\entity\CommandeEntity($commande["id"],$listArticle,$commande["date"],$commande["statut"],$commande["prix"]);
            
        }
        return $commandes;
    }


    public static function getAllByIdUser($id): array{

        $res1 = self::getallCommandeByIdUser($id);

        $commandes= [];
        foreach ($res1 as $commande){
            
            $res2 = self::getallArticleCommandeById($commande["id"]);
            $listArticle = [];
            foreach ($res2 as $article){

                $listArticle[] = new \backend\entity\ArticleCommandeEntity($article["id_Article"],$article["taille"],$article["prix_unitaire"],$article["quantite"]);
            }


            $commandes[] = new \backend\entity\CommandeEntity($commande["id"],$listArticle,$commande["date"],$commande["statut"],$commande["prix"]);
            
        }
        return $commandes;
    }

    public static function getById($id): ?\backend\entity\CommandeEntity{

        $res1 = self::getCommandeById($id);

        if (count($res1) != 1){
            return null;
        }

        $commande = $res1[0];
            
        $res2 = self::getallArticleCommandeById($commande["id"]);
        $listArticle = [];
        foreach ($res2 as $article){

            $listArticle[] = new \backend\entity\ArticleCommandeEntity($article["id_Article"],$article["taille"],$article["prix_unitaire"],$article["quantite"]);
        }


        $commandes = new \backend\entity\CommandeEntity($commande["id"],$listArticle,$commande["date"],$commande["statut"],$commande["prix"]);
            
        return $commandes;
    }


    /**
     * Donne toutes les commandes d'un utilisateur
     * 
     * @param int $id
     */
    private static function getAllCommandeUser(int $id): array
    {
        /////article dans commande
        try {
            $requete = "CALL GetCommandeByIdUser(?)";
            $stmt = self::$pdo->prepare($requete);
            // Lie les paramètres d'entrée
            $stmt->bindParam(1, $id, \PDO::PARAM_INT);

            $stmt->execute();
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        }catch (\PDOException $e ){
            // Gère les erreurs de la base de données
            echo "Erreur : " . $e->getMessage();
        }

    }


    /**
     * Donne les commandes d'un utilisateur
     * 
     * @param int $id
     * @return array
     */
    public static function getCommande($user): array
    {
        try {
            $result = self::getAllCommandeUser($user->getId());
            $commandes = array();
            
            foreach ($result as $commande ){

                $requete2 = "CALL GetAllArticleOfCommande(?)";
                $stmt2 = self::$pdo->prepare($requete2);
                // Lie les paramètres d'entrée
                $stmt2->bindParam(1, $commande["id"], \PDO::PARAM_INT);
                
                
                $stmt2->execute();
                $result2 = $stmt2->fetchAll(\PDO::FETCH_ASSOC);
                $listArticle = array();

                
                foreach  ($result2 as $article){
                    $listArticle[] = new ArticleCommandeEntity($article["id_Article"],$article["taille"],$article["prix_unitaire"],$article["quantite"]);

                }

                $commandes[] = new CommandeEntity($commande["id"],$listArticle,$commande["date"],$commande["statut"],$commande["prix"]);
            }

            return $commandes;
            
            
        }catch (\PDOException $e ){
            // Gère les erreurs de la base de données
            echo "Erreur : " . $e->getMessage();
        }
    }



}