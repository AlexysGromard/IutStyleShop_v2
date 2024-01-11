<?php

namespace backend\DAO;

class DBCommande extends Connexion
{




    public static function addCommande($user){
        //TODO
    }


    /**
     * Donne les commandes d'un utilisateur
     * 
     * @param int $id
     * @return array
     */
    public static function getAll($user): array
    {
        try {
            

            /////article dans commande
            $requete = "CALL GetCommande(?)";
            $stmt = self::$pdo->prepare($requete);
            // Lie les paramètres d'entrée
            $stmt->bindParam(1, $user->id, \PDO::PARAM_INT);

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
                    $listArticle[] = new \backend\entity\ArticleComandeEntity($article["id_Article"],$article["taille"],$article["prix_unitaire"],$article["quantite"]);
                }

                $commandes[] = new \backend\entity\CommandeEntity($commande["id"],$listArticle,$commande["date"],$commande["status"],$commande["price"]);
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