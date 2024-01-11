<?php

namespace backend\DAO;

use \backend\entity\ArticleEntity;

class DBArticle extends Connexion implements ArticleInterface
{
    /**
     * Ajoute un article
     * 
     * @param ArticleEntity $entity
     * @return void
     */
    public function add($entity)
    {   
        $sql = "INSERT INTO article (nom, description, prix, promo, disponibilite, categorie, genre, couleur, taille, image) VALUES (:nom, :description, :prix, :promo, :disponibilite, :categorie, :genre, :couleur, :taille, :image)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            'nom' => $entity->getNom(),
            'description' => $entity->getDescription(),
            'prix' => $entity->getPrix(),
            'promo' => $entity->getPromo(),
            'disponibilite' => $entity->getDisponibilite(),
            'categorie' => $entity->getCategorie(),
            'genre' => $entity->getGenre(),
            'couleur' => $entity->getCouleur(),
            'taille' => $entity->getTaille(),
            'image' => $entity->getImage()
        ]);
    }

    /**
     * Update une articles
     * 
     * @param ArticleEntity $entity
     * @return void
     */
    public function update($entity)
    {
    }


    /**
     * Supprime un article
     * 
     * @param int $id
     * @return void
     */
    public function delete($id)
    {
    }

    /**
     * Donne tous les articles
     * 
     * @return ArticleEntity[]
     */
    public function getall()
    {
        $requete = "CALL GetAllArticle()";
        $stmt = $this->pdo->prepare($requete);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);

    }

    /**
     * Donne un article
     * 
     * @param int $id
     * @return ArticleEntity|null
     */
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

    /**
     * Donne les articles d'une categorie
     * 
     * @param string $categorie
     * @return ArticleEntity[]
     */
    public function getArticleByCategorie(string $categorie): array
    {
    }

    /**
     * Donne les articles disponibles
     * 
     * @param string $genre
     * @return ArticleEntity[]
     */
    public function getArticleByDisponibilite(bool $disponibilite): array
    {
    }

    /**
     * Donne les articles par rapport à des conditions
     * 
     * @param bool $promo
     * @return ArticleEntity[]
     */
    public function getArticleByCondition(string $categorie, string $genre, string $couleur, array $prix, bool $promo, bool $disponibilite): array
    {
    }
}