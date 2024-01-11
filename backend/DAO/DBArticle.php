<?php

namespace backend\DAO;

use \backend\entity\ArticleEntity;
use \backend\entity\AccessoireEntity;
use \backend\entity\VetementEntityEntity;



class DBArticle extends Connexion implements DAOInterface
{
    /**
     * Ajoute un vetement
     * 
     * @param string $nom
     * @param string $categorie
     * @param string $genre
     * @param string $couleur
     * @param string $description
     * @param string $prix
     * @param int $promo
     * @param bool $disponible
     * @param array $quantite
     * @param array $images
     * 
     * @return ?VetementEntityEntity
     */
    public function addVetement($nom,$categorie,$genre,$couleur,$description,$prix,$promo,$disponible,$quantite,$images)
    {   
        if (count($quantite)==5 ){

            $sql = "call InsertArticleVetement(?,?,?,?,?,?,?,?,?,?,?,?,?)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(1,$nom,\PDO::PARAM_STR);
            $stmt->bindParam(2,$categorie,\PDO::PARAM_STR);
            $stmt->bindParam(3,$genre,\PDO::PARAM_STR);
            $stmt->bindParam(4,$couleur,\PDO::PARAM_STR);
            $stmt->bindParam(5,$description,\PDO::PARAM_STR);
            $stmt->bindParam(6,$prix);
            $stmt->bindParam(7,$promo);
            $stmt->bindParam(8,$disponible,\PDO::PARAM_BOOL);
            $stmt->bindParam(9,intval($quantite[0]),\PDO::PARAM_INT);
            $stmt->bindParam(10,intval($quantite[1]),\PDO::PARAM_INT);
            $stmt->bindParam(11,intval($quantite[2]),\PDO::PARAM_INT);
            $stmt->bindParam(12,intval($quantite[3]),\PDO::PARAM_INT);
            $stmt->bindParam(13,intval($quantite[4]),\PDO::PARAM_INT);
            $stmt->execute();
            $id = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            var_dump($id);

            $id = $id[0]["@last_id_2"];
            var_dump($id);

            if ($id != null){
                foreach ($images as $img){
                $sql = "call InsertImage(?,?)";
                $stmt = $this->pdo->prepare($sql);
                $stmt->bindParam(1,$id);
                $stmt->bindParam(2,$img);
                $stmt->execute();
                }
                return $this->getById($id);
            }
            
            

        }
        return null;
  
    }


 /**
     * Ajoute un accessoire
     * 
     * @param string $nom
     * @param string $categorie
     * @param string $genre
     * @param string $couleur
     * @param string $description
     * @param string $prix
     * @param int $promo
     * @param bool $disponible
     * @param int $quantite
     * @param array $images
     * 
     * @return ?VetementEntityEntity
     */
    public static function addAccessoire($nom,$categorie,$genre,$couleur,$description,$prix,$promo,$disponible,$quantite,$images)
    {   
        
        $sql = "call InsertArticleAccessoire(?,?,?,?,?,?,?,?,?)";
        $stmt = self::$pdo->prepare($sql);
        $stmt->bindParam(1,$nom);
        $stmt->bindParam(2,$categorie);
        $stmt->bindParam(3,$genre);
        $stmt->bindParam(4,$couleur);
        $stmt->bindParam(5,$description);
        $stmt->bindParam(6,$prix);
        $stmt->bindParam(7,$promo);
        $stmt->bindParam(8,$disponible);
        $stmt->bindParam(9,intval($quantite));

        $stmt->execute();

        $id = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        $id = $id[0]["@last_id_2"];

        if ($id != null){
            foreach ($images as $img){
            $sql = "call InsertImage(?,?)";
            $stmt = self::$pdo->prepare($sql);
            $stmt->bindParam(1,$id);
            $stmt->bindParam(2,$img);
            $stmt->execute();
            }
            return self::$pdo->getById($id);
        }
        return null;
            
        
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
        $requete = "CALL GetAllArticle()";
        $stmt = self::$pdo->prepare($requete);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);

    }

    /**
     * Donne un article
     * 
     * @param int $id
     * @return ArticleEntity|null
     */
    public static function getById(int $id): ?ArticleEntity
    {
        try {
            $requete = "CALL GetArticleInfo(?)";
            $stmt = self::$pdo->prepare($requete);
            $stmt->bindParam(1,$id);
            $stmt->execute();
            $valeurArticle = $stmt->fetch(\PDO::FETCH_ASSOC);


            $requete = "CALL GetImageArticle(?)";
            $stmt = self::$pdo>prepare($requete);
            $stmt->bindParam(1,$id);
            $stmt->execute();
            $imagesArticle = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            $lsLiens = array();
            foreach($imagesArticle as $img) { 

                $lsLiens[]= $img["lien"] ;
             } 

            $requete = "CALL GetQuantiteAccessoireOrVetement(?)";
            $stmt = self::$pdo->prepare($requete);
            $stmt->bindParam(1,$id);
            $stmt->execute();
            $lsQuantite = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            $quantite = "";
            if ( count($lsQuantite[0])==1){
                $quantite= strval($lsQuantite[0]["quantite"]) ;
            }else{
                foreach($lsQuantite[0] as $val) {
                    $quantite.= strval($val).";";
                } 
            }            
            $article = ArticleEntity::CreateArticle($id,$valeurArticle["nom"],$valeurArticle["category"],$valeurArticle["genre"],$valeurArticle["couleur"],$valeurArticle["description"],$valeurArticle["votant"],$valeurArticle["notes"],$valeurArticle["prix"],$valeurArticle["promo"],$valeurArticle["disponible"],$quantite,$lsLiens);

            return $article;

        }catch (\PDOException $e ){
            // Gère les erreurs de la base de données
            echo "Erreur : " . $e->getMessage();
        }
        return null;


        
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