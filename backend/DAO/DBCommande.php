<?php

namespace backend\DAO;

use \backend\entity\CommandeEntity;
use \backend\entity\ArticleComandeEntity;

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

        $stmt->bindParam(1, $user->getId(), \PDO::PARAM_INT);
        $stmt->bindParam(2, $codepromo->getId(), \PDO::PARAM_INT);

        $stmt->execute();
    }

    /**
     * update une commande
     * 
     * @param  CommandeEntity $entity
     */
    public static function update($entity)
    {
        $requete = "CALL DeleteCommande(?)";
        $stmt = self::$pdo->prepare($requete);

        $stmt->bindParam(1, $entity->getId(), \PDO::PARAM_INT);
        $stmt->bindParam(2, $entity->getStatut(), \PDO::PARAM_INT);

        $stmt->execute();

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

        $stmt->bindParam(1, $entity->getId(), \PDO::PARAM_INT);

        $stmt->execute();
    }

    /**
     * donne toutes les commandes
     * 
     * @return  CommandeEntity|null 
     */
    public static function getall()
    {

            /////article dans commande
            $requete = "CALL GetAllCommande()";
            $stmt = self::$pdo->prepare($requete);

            $stmt->execute();

            $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);

            $commandes = array();
            foreach ($result as $commande ){

                $requete2 = "CALL GetAllArticleOfCommande(?)";
                $stmt2 = self::$pdo->prepare($requete2);
                $stmt2->bindParam(1, $commande["id"], \PDO::PARAM_INT);

                $stmt2->execute();

                $result2 = $stmt2->fetchAll(\PDO::FETCH_ASSOC);
                $listArticle = array();

                foreach  ($result2 as $article){
                    $listArticle[] = new ArticleComandeEntity($article["id_Article"],$article["taille"],$article["prix_unitaire"],$article["quantite"]);
                }

                $commandes[] = new CommandeEntity($commande["id"],$listArticle,$commande["date"],$commande["status"],$commande["price"]);
            }

            return $commandes;
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
            

            /////article dans commande
            $requete = "CALL GetCommande(?)";
            $stmt = self::$pdo->prepare($requete);
            // Lie les paramètres d'entrée
            $stmt->bindParam(1, $user->getId(), \PDO::PARAM_INT);

            $stmt->execute();
            $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);

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
                    $listArticle[] = new ArticleComandeEntity($article["id_Article"],$article["taille"],$article["prix_unitaire"],$article["quantite"]);
                }

                $commandes[] = new CommandeEntity($commande["id"],$listArticle,$commande["date"],$commande["status"],$commande["price"]);
            }

            return $commandes;
            
            
        }catch (\PDOException $e ){
            // Gère les erreurs de la base de données
            echo "Erreur : " . $e->getMessage();
        }
    }



    /**
     * Donne les commandes d'une date
     * 
     * @param string $date
     * @return array
     */
    public static function getCommandeByDate(string $date): array
    {
    }

    /**
     * Donne les commandes d'un utilisateur et d'une date
     * 
     * @param int $id
     * @param string $date
     * @return array
     */
    public static function getCommandeByUserAndDate(int $id, string $date): array
    {
    }


}