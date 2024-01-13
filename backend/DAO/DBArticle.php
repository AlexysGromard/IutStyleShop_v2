<?php

namespace backend\DAO;

use \backend\entity\ArticleEntity;
use \backend\entity\AccessoireEntity;
use \backend\entity\VetementEntity;



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
    public static function addVetement($nom,$categorie,$genre,$couleur,$description,$prix,$promo,$disponible,$quantite,$images)
    {   
        if (count($quantite)==5 ){

            $sql = "call InsertArticleVetement(?,?,?,?,?,?,?,?,?,?,?,?,?)";
            $stmt = self::$pdo->prepare($sql);
            $stmt->bindParam(1,$nom,\PDO::PARAM_STR);
            $stmt->bindParam(2,$categorie,\PDO::PARAM_STR);
            $stmt->bindParam(3,$genre,\PDO::PARAM_STR);
            $stmt->bindParam(4,$couleur,\PDO::PARAM_STR);
            $stmt->bindParam(5,$description,\PDO::PARAM_STR);
            $stmt->bindParam(6,$prix);
            $stmt->bindParam(7,$promo);
            $stmt->bindParam(8,$disponible,\PDO::PARAM_BOOL);
            $stmt->bindParam(9,$quantite[0],\PDO::PARAM_INT);
            $stmt->bindParam(10,$quantite[1],\PDO::PARAM_INT);
            $stmt->bindParam(11,$quantite[2],\PDO::PARAM_INT);
            $stmt->bindParam(12,$quantite[3],\PDO::PARAM_INT);
            $stmt->bindParam(13,$quantite[4],\PDO::PARAM_INT);
            $stmt->execute();
            $id = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            var_dump($id);

            $id = $id[0]["@last_id_2"];
            var_dump($id);

            if ($id != null){
                foreach ($images as $img){
                $sql = "call InsertImage(?,?)";
                $stmt = self::$pdo->prepare($sql);
                $stmt->bindParam(1,$id);
                $stmt->bindParam(2,$img);
                $stmt->execute();
                }
                return self::getById($id);
            }
            
            

        }
        return null;
  
    }


 /**
     * Ajoute un accessoire
     * 
     * @param string $nom
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
    public static function addAccessoire($nom,$genre,$couleur,$description,$prix,$promo,$disponible,$quantite,$images)
    {   
        $categorie = "accessoire";
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
        $stmt->bindParam(9,$quantite,\PDO::PARAM_INT);

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
            return self::getById($id);
        }
        return null;
            
        
    }

    /**
     * Update une articles
     * 
     * @param ArticleEntity $article
     * @return void
     */
    public static function update($article)
    {

        if ($article instanceof AccessoireEntity){
            $id =$article->getId();
            $nom=$article->getNom();
            $genre=$article->getGenre();
            $couleur =$article->getCouleur();
            $description =$article->getDescription();
            $prix =$article->getPrix();
            $promo=$article->getPromo();
            $disponibilite =$article->getDisponible();
            $quantite=$article->getQuantite();

            $sql = "call UpdateArticleAccessoire(?,?,?,?,?,?,?,?,?)";
            $stmt = self::$pdo->prepare($sql);
            $stmt->bindParam(1,$id);
            $stmt->bindParam(2,$nom);
            $stmt->bindParam(3,$genre);
            $stmt->bindParam(4,$couleur);
            $stmt->bindParam(5,$description);
            $stmt->bindParam(6,$prix);
            $stmt->bindParam(7,$promo);
            $stmt->bindParam(8,$disponibilite);
            $stmt->bindParam(9,$quantite,\PDO::PARAM_INT);

            $stmt->execute();
        }else if ($article instanceof VetementEntity){
            $id =$article->getId();
            $nom=$article->getNom();
            $categorie=$article->getCategory();
            $genre=$article->getGenre();
            $couleur =$article->getCouleur();
            $description =$article->getDescription();
            $prix =$article->getPrix();
            $promo=$article->getPromo();
            $disponibilite =$article->getDisponible();
            $quantiteXS=$article->getQuantiteXS();
            $quantiteS=$article->getQuantiteS();
            $quantiteM=$article->getQuantiteM();
            $quantiteL=$article->getQuantiteL();
            $quantiteXL=$article->getQuantiteXL();



            $sql = "call UpdateArticleVetement(?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
            $stmt = self::$pdo->prepare($sql);
            $stmt->bindParam(1,$id);
            $stmt->bindParam(2,$nom);
            $stmt->bindParam(3,$categorie);
            $stmt->bindParam(4,$genre);
            $stmt->bindParam(5,$couleur);
            $stmt->bindParam(6,$description);
            $stmt->bindParam(7,$prix);
            $stmt->bindParam(8,$promo);
            $stmt->bindParam(9,$disponibilite);
            $stmt->bindParam(10,$quantiteXS(),\PDO::PARAM_INT);
            $stmt->bindParam(11,$quantiteS(),\PDO::PARAM_INT);
            $stmt->bindParam(12,$quantiteM(),\PDO::PARAM_INT);
            $stmt->bindParam(13,$quantiteL(),\PDO::PARAM_INT);
            $stmt->bindParam(14,$quantiteXL(),\PDO::PARAM_INT);

            $stmt->execute();
        }
        
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
            $stmt = self::$pdo->prepare($requete);
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
        $requete = "CALL GetArticleByCategorie(?)";
        $stmt = self::$pdo->prepare($requete);
        $stmt->bindParam(1,$categorie);
        $stmt->execute();
        $articles = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $articles;
    }

    /**
     * Donne les articles disponibles
     * 
     * @param bool $disponibilite
     * @return ArticleEntity[]
     */
    public static function getArticleByDisponibilite(bool $disponibilite): array
    {
        return array();

    }

    /**
     * Donne les articles genre
     * 
     * @param string $genre
     * @return ArticleEntity[]
     */
    public static function getArticleByGenre(string $genre): array
    {
        return array();

    }

    /**
     * Donne les articles disponibles
     * 
     * @param string $couleur
     * @return ArticleEntity[]
     */
    public static function getArticleByCouleur(string $couleur): array
    {

        $requete = "CALL GetArticleByCouleur(?)";
        $stmt = self::$pdo->prepare($requete);
        $stmt->bindParam(1,$couleur);
        $stmt->execute();
        $articles = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $articles;
        
        

    }

    /**
     * Donne les articles disponibles
     * 
     * @param array $prix
     * @return ArticleEntity[]
     * 
     * $prix possède 2 valeurs : un prix minimum et un prix maximum
     */
    public static function getArticleByPrix(array $prix): array
    {
        if (count($prix) == 2){
            $prixmin = $prix[0];
            $prixmax = $prix[1];

            $requete = "CALL GetArticleByPrix(?,?)";
            $stmt = self::$pdo->prepare($requete);
            $stmt->bindParam(1,$prixmin);
            $stmt->bindParam(2,$prixmax);

            $stmt->execute();
            $articles = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $articles;
        }
        return array();
    }

    /**
     * Donne les articles disponibles
     * 
     * @param bool $promo
     * @return ArticleEntity[]
     */
    public static function getArticleByPromo(array $promo): array
    {
        return array();

    }

    /**
     * Donne les articles par rapport à des conditions
     * 
     * @param string $categorie
     * @param string $couleur
     * @param array $prix
     * 
     * @return ArticleEntity[]
     */
    public static function getArticleByCondition(string $categorie, string $couleur, array $prix): array  // futur parameters : string $genre, bool $promo, bool $disponibilite
    {
        
        $prixmin = 0;
        $prixmax = 100;
        if(count($prix)==2){
            $prixmin = $prix[0];
            $prixmax = $prix[1];
        }
           

        $requete = "CALL GetArticleByCondition(?,?,?,?)";
        $stmt = self::$pdo->prepare($requete);
        $stmt->bindParam(1,$couleur,\PDO::PARAM_STR);
        $stmt->bindParam(2,$categorie,\PDO::PARAM_STR);
        $stmt->bindParam(3,$prixmin);
        $stmt->bindParam(4,$prixmax);
        $stmt->execute();
        $articles = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $articles;

    }
}