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
        $requete = "CALL GetAllArticle()";
        $stmt = $this->pdo->prepare($requete);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);

    }

    public function getById(int $id): ?ArticleEntity
    {
        try {
            $requete = "CALL GetArticleInfo(?)";
            $stmt = $this->pdo->prepare($requete);
            $stmt->bindParam(1,$id);
            $stmt->execute();
            $valeurArticle = $stmt->fetch(\PDO::FETCH_ASSOC);


            $requete = "CALL GetImageArticle(?)";
            $stmt = $this->pdo->prepare($requete);
            $stmt->bindParam(1,$id);
            $stmt->execute();
            $imagesArticle = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            $lsLiens = array();
            foreach($imagesArticle as $img) { 

                $lsLiens[]= $img["lien"] ;
             } 

            $requete = "CALL GetQuantiteAccessoireOrVetement(?)";
            $stmt = $this->pdo->prepare($requete);
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