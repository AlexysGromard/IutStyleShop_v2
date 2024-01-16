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
        $dispo = 0;
        if($disponible == true){
            $dispo = 1;
        }
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
        $stmt->bindParam(8,$dispo);
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
            $stmt->bindParam(10,$quantiteXS,\PDO::PARAM_INT);
            $stmt->bindParam(11,$quantiteS,\PDO::PARAM_INT);
            $stmt->bindParam(12,$quantiteM,\PDO::PARAM_INT);
            $stmt->bindParam(13,$quantiteL,\PDO::PARAM_INT);
            $stmt->bindParam(14,$quantiteXL,\PDO::PARAM_INT);

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
        $sql = "call DeleteImage(?)";
        $stmt = self::$pdo->prepare($sql);
        $stmt->bindParam(1,$id);
        $stmt->execute();

    }

    /**
     * Donne tous les articles
     * 
     * @return ArticleEntity[]
     */
    public static function getall()
    {
        $articles = self::getallRequest();
        $lsArticles = array();
        
        foreach($articles as $valeurArticle){
            $id = $valeurArticle["id"];
            $lsLiens = self::getImagesArticleById($id);
            $quantite = self::getQuantiteArticleById($id);
                       
            $article = ArticleEntity::CreateArticle($id,strval($valeurArticle["nom"]),strval($valeurArticle["category"]),strval($valeurArticle["genre"]),strval($valeurArticle["couleur"]),strval($valeurArticle["description"]),intval($valeurArticle["votant"]),floatval($valeurArticle["notes"]),floatval($valeurArticle["prix"]),floatval($valeurArticle["promo"]),boolval($valeurArticle["disponible"]),$quantite,$lsLiens);

            $lsArticles[] = $article;
        }
        return $lsArticles;

    }
    // private static function getrequestGetAllArticle(){
    //     $requete = "CALL GetAllArticle()";
    //     $stmt = self::$pdo->prepare($requete);
    //     $stmt->execute();
    //     return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    // }

    // private static function getrequestGetImageOfArticle($id_article){
    //     $requete = "CALL GetImageArticle(?)";
    //     $stmt = self::$pdo->prepare($requete);
    //     $stmt->bindParam(1,$id_article);
    //     $stmt->execute();
    //     return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    // }



    // public static function getall2()
    // {
    //     $res = self::getrequestGetAllArticle();

    //     $articles = [];
    //     foreach ($res as $element){
    //         $res2 = self::getrequestGetImageOfArticle();
    //         $image = [];
    //         foreach ($res2 as $images){
    //             $image[] = $res2["lien"];
    //         }

    //         $articles[] = new \backend\entity\ArticleEntity($element["id"],$element["nom"],$element["category"],$element["genre"],$element["couleur"],$element["description"],$element["votant"],$element["notes"],$element["prix"],$element["promo"],$element["disponible"],$image);
    //     }

    // }

    private static function getallRequest():array{
        $requete = "CALL GetAllArticle()";
        $stmt = self::$pdo->prepare($requete);
        $stmt->execute();
        $articles = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $articles;
    }

    private static function getByIdRequest(int $id):array{
        $requete = "CALL GetArticleInfo(?)";
        $stmt = self::$pdo->prepare($requete);
        $stmt->bindParam(1,$id);
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
            
            $valeurArticle = self::getByIdRequest($id)[0];
            if(!$valeurArticle){
                return null;
            }

            
            $lsLiens = self::getImagesArticleById($id);
            $quantite = self::getQuantiteArticleById($id);
            $article = ArticleEntity::CreateArticle($id,strval($valeurArticle["nom"]),strval($valeurArticle["category"]),strval($valeurArticle["genre"]),strval($valeurArticle["couleur"]),strval($valeurArticle["description"]),intval($valeurArticle["votant"]),floatval($valeurArticle["notes"]),floatval($valeurArticle["prix"]),floatval($valeurArticle["promo"]),boolval($valeurArticle["disponible"]),$quantite,$lsLiens);
            return $article;

        }catch (\PDOException $e ){
            // Gère les erreurs de la base de données
            echo "Erreur : " . $e->getMessage();
        }
        return null;


        
    }

    public static function getImagesArticleById($id):array{
        $requete = "CALL GetImageArticle(?)";
        $stmt = self::$pdo->prepare($requete);
        $stmt->bindParam(1,$id);
        $stmt->execute();
        $imagesArticle = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        $lsLiens = array();
        foreach($imagesArticle as $img) { 

            $lsLiens[]= $img["lien"] ;
        } 
        return $lsLiens;
    }

    public static function getQuantiteArticleById($id):string{
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
        return $quantite;
    }

    

    private static function getArticleByCategorieRequest(string $categorie):array{
        $requete = "CALL GetArticleByCategorie(?)";
        $stmt = self::$pdo->prepare($requete);
        $stmt->bindParam(1,$categorie);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        
    }
    /**
     * Donne les articles d'une categorie
     * 
     * @param string $categorie
     * @return ArticleEntity[]
     */
    public static function getArticleByCategorie(string $categorie): array
    {
        $articles = self::getArticleByCategorieRequest($categorie);
        $lsArticles = array();
        foreach($articles as $valeurArticle){
            $id = $valeurArticle["id"];
            $lsLiens = self::getImagesArticleById($id);
            $quantite = self::getQuantiteArticleById($id);
                       
            $article = ArticleEntity::CreateArticle($id,strval($valeurArticle["nom"]),strval($valeurArticle["category"]),strval($valeurArticle["genre"]),strval($valeurArticle["couleur"]),strval($valeurArticle["description"]),intval($valeurArticle["votant"]),floatval($valeurArticle["notes"]),floatval($valeurArticle["prix"]),floatval($valeurArticle["promo"]),boolval($valeurArticle["disponible"]),$quantite,$lsLiens);
            
            $lsArticles[] = $article;
        }
        return $lsArticles;
    }

    

    private static function getArticleByCategorieAndGenreRequest(string $categorie, string $genre):array{
        $requete = "CALL GetArticleByCategorieAndGenre(?,?)";
        $stmt = self::$pdo->prepare($requete);
        $stmt->bindParam(1, $categorie);
        $stmt->bindParam(2, $genre);

        $stmt->execute();
        $articles = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $articles;
    }

    public static function getArticleByCategorieAndGenre(string $categorie, string $genre){
        try {
            $articles = self::getArticleByCategorieAndGenreRequest($categorie,$genre);
            $lsArticles = array();
            foreach($articles as $valeurArticle){
                $id = $valeurArticle["id"];
                $lsLiens = self::getImagesArticleById($id);
                $quantite = self::getQuantiteArticleById($id);
                        
                $article = ArticleEntity::CreateArticle($id,strval($valeurArticle["nom"]),strval($valeurArticle["category"]),strval($valeurArticle["genre"]),strval($valeurArticle["couleur"]),strval($valeurArticle["description"]),intval($valeurArticle["votant"]),floatval($valeurArticle["notes"]),floatval($valeurArticle["prix"]),floatval($valeurArticle["promo"]),boolval($valeurArticle["disponible"]),$quantite,$lsLiens);
                
                $lsArticles[] = $article;
            }
            return $lsArticles;
        } catch (\PDOException $e) {
            // Gère les erreurs de la base de données de manière plus robuste
            // Tu pourrais lever une exception ou loguer l'erreur
            throw new \PDOException("Erreur dans la récupération des articles par catégorie et genre : " . $e->getMessage());
        }
    
    }

    

    private static function getArticleByDisponibiliteRequest(bool $disponibilite):array{
        $requete = "CALL GetArticleByDisponibilite(?)";
        $stmt = self::$pdo->prepare($requete);
        $stmt->bindParam(1,$disponibilite);
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
        $articles= self::getArticleByDisponibiliteRequest($disponibilite);
        $lsArticles = array();
        foreach($articles as $valeurArticle){
            $id = $valeurArticle["id"];
            $lsLiens = self::getImagesArticleById($id);
            $quantite = self::getQuantiteArticleById($id);
              
            $article = ArticleEntity::CreateArticle($id,strval($valeurArticle["nom"]),strval($valeurArticle["category"]),strval($valeurArticle["genre"]),strval($valeurArticle["couleur"]),strval($valeurArticle["description"]),intval($valeurArticle["votant"]),floatval($valeurArticle["notes"]),floatval($valeurArticle["prix"]),floatval($valeurArticle["promo"]),boolval($valeurArticle["disponible"]),$quantite,$lsLiens);
            
            $lsArticles[] = $article;
        }
        return $lsArticles;

    }

    private static function getArticleByGenreRequest(string $genre ) :array{
        $requete = "CALL GetArticleByGenre(?)";
        $stmt = self::$pdo->prepare($requete);
        $stmt->bindParam(1,$genre);
        $stmt->execute();
        $articles = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $articles;
    }

    /**
     * Donne les articles genre
     * 
     * @param string $genre
     * @return ArticleEntity[]
     */
    public static function getArticleByGenre(string $genre): array
    {
        $articles = self::getArticleByGenreRequest($genre);
        $lsArticles = array();
        foreach($articles as $valeurArticle){
            $id = $valeurArticle["id"];
            $lsLiens = self::getImagesArticleById($id);
            $quantite = self::getQuantiteArticleById($id);
               
            $article = ArticleEntity::CreateArticle($id,strval($valeurArticle["nom"]),strval($valeurArticle["category"]),strval($valeurArticle["genre"]),strval($valeurArticle["couleur"]),strval($valeurArticle["description"]),intval($valeurArticle["votant"]),floatval($valeurArticle["notes"]),floatval($valeurArticle["prix"]),floatval($valeurArticle["promo"]),boolval($valeurArticle["disponible"]),$quantite,$lsLiens);
            
            $lsArticles[] = $article;
        }
        return $lsArticles;

    }

    private static function getArticleByCouleurRequest(string $couleur ){
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
     * @param string $couleur
     * @return ArticleEntity[]
     */
    public static function getArticleByCouleur(string $couleur): array
    {

        $articles = self::getArticleByCouleurRequest($couleur);
        $lsArticles = array();
        foreach($articles as $valeurArticle){
            $id = $valeurArticle["id"];
            $lsLiens = self::getImagesArticleById($id);
            $quantite = self::getQuantiteArticleById($id);
               
            $article = ArticleEntity::CreateArticle($id,strval($valeurArticle["nom"]),strval($valeurArticle["category"]),strval($valeurArticle["genre"]),strval($valeurArticle["couleur"]),strval($valeurArticle["description"]),intval($valeurArticle["votant"]),floatval($valeurArticle["notes"]),floatval($valeurArticle["prix"]),floatval($valeurArticle["promo"]),boolval($valeurArticle["disponible"]),$quantite,$lsLiens);
            
            $lsArticles[] = $article;
        }
        return $lsArticles;
        
        

    }


    private static function getArticleByPrixRequest($prixmin,$prixmax): array{
        $requete = "CALL GetArticleByPrix(?,?)";
        $stmt = self::$pdo->prepare($requete);
        $stmt->bindParam(1,$prixmin);
        $stmt->bindParam(2,$prixmax);

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

            $articles = getArticleByPrixRequest($prixmin,$prixmax);
            $lsArticles = array();
            foreach($articles as $valeurArticle){
                $id = $valeurArticle["id"];
                $lsLiens = self::getImagesArticleById($id);
                $quantite = self::getQuantiteArticleById($id);
                    
                $article = ArticleEntity::CreateArticle($id,strval($valeurArticle["nom"]),strval($valeurArticle["category"]),strval($valeurArticle["genre"]),strval($valeurArticle["couleur"]),strval($valeurArticle["description"]),intval($valeurArticle["votant"]),floatval($valeurArticle["notes"]),floatval($valeurArticle["prix"]),floatval($valeurArticle["promo"]),boolval($valeurArticle["disponible"]),$quantite,$lsLiens);
                
                $lsArticles[] = $article;
            }
            return $lsArticles;
        }
        return array();
    }


    private static function getArticleByPromoRequest(bool $promo): array
    {
        $requete = "CALL GetArticleByPromo(?)";
        $stmt = self::$pdo->prepare($requete);
        $stmt->bindParam(1,$promotion);
        $stmt->execute();
        $articles = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $articles;
    }

    /**
     * Donne les articles disponibles
     * 
     * @param bool $promo
     * @return ArticleEntity[]
     */
    public static function getArticleByPromo(bool $promo): array
    {
        $promotion = 0;
        if($promo){
            $promotion = 1;
        }
        $articles = self::getArticleByPromoRequest($promo);
        $lsArticles = array();
        foreach($articles as $valeurArticle){
            $id = $valeurArticle["id"];
            $lsLiens = self::getImagesArticleById($id);
            $quantite = self::getQuantiteArticleById($id);
             
            $article = ArticleEntity::CreateArticle($id,strval($valeurArticle["nom"]),strval($valeurArticle["category"]),strval($valeurArticle["genre"]),strval($valeurArticle["couleur"]),strval($valeurArticle["description"]),intval($valeurArticle["votant"]),floatval($valeurArticle["notes"]),floatval($valeurArticle["prix"]),floatval($valeurArticle["promo"]),boolval($valeurArticle["disponible"]),$quantite,$lsLiens);
            
            $lsArticles[] = $article;
        }
        return $lsArticles;

    }

    private static function getAllArticleByNoteRequest(): array{
        $requete = "CALL GetAllArticleByNote()";
        $stmt = self::$pdo->prepare($requete);
        $stmt->execute();
        $articles = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $articles;
    }
    public static function getAllArticleByNote(): array{
        
        $articles = self::getAllArticleByNoteRequest();
        $lsArticles = array();
        foreach($articles as $valeurArticle){
            $id = $valeurArticle["id"];
            $lsLiens = self::getImagesArticleById($id);
            $quantite = self::getQuantiteArticleById($id);
             
            $article = ArticleEntity::CreateArticle($id,strval($valeurArticle["nom"]),strval($valeurArticle["category"]),strval($valeurArticle["genre"]),strval($valeurArticle["couleur"]),strval($valeurArticle["description"]),intval($valeurArticle["votant"]),floatval($valeurArticle["notes"]),floatval($valeurArticle["prix"]),floatval($valeurArticle["promo"]),boolval($valeurArticle["disponible"]),$quantite,$lsLiens);
            
            $lsArticles[] = $article;
        }
        return $lsArticles;
    }


    private static function getArticleByConditionRequest($categorie,$couleur,$prixmin,$prixmax,$genres,$promo,$disponible):array{
        $requete = "CALL GetArticleByCondition(?,?,?,?,?,?,?)";
        $stmt = self::$pdo->prepare($requete);
        $stmt->bindParam(1,$couleur,\PDO::PARAM_STR);
        $stmt->bindParam(2,$categorie,\PDO::PARAM_STR);
        $stmt->bindParam(3,$prixmin);
        $stmt->bindParam(4,$prixmax);
        $stmt->bindParam(5,$genres);    
        $stmt->bindParam(6,$promo,\PDO::PARAM_INT);
        $stmt->bindParam(7,$disponible);

        $stmt->execute();
        $articles = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $articles;
    }


    /**
     * Donne les articles par rapport à des conditions
     * 
     * @param array $categories  contient les catégories que l'on souhaite retourner
     * @param array $couleurs    contient les couleurs que l'on souhaite retourner
     * @param array $prix contient 2 valeurs, [0] le prix min [1] le prix max
     * @param string $genres "M", "F"
     * @param bool $promo  Booléen qui permet de savoir si on retourne ou non les article en promotion
     * @param int $disponibilite 0 => on retourne les non disponible, 1 => on retourne les disponible , 2 => on retourne les deux
     * 
     * 
     * @return ArticleEntity[]
     */
    public static function getArticleByCondition(array $categories, array $couleurs, array $prix,string $genres, bool $promo, int $disponibilite): array  
    {
        $mesArticles = array();
        $prixmin = 0;
        $prixmax = 100;
        if(count($prix)==2){
            $prixmin = intval($prix[0]);
            $prixmax = intval($prix[1]);
        }
        if ($genres==""){
            $genres = "MF";
        }
        foreach($categories as $categorie){
            foreach($couleurs as $couleur){
                $disponible = 0;
                if ( $disponibilite == 1){
                    $disponible = 1;
                }else if ( $disponibilite == 2){
                    $articles = self::getArticleByConditionRequest($categorie,$couleur,$prixmin,$prixmax,$genres,$promo,$disponible);
                    $mesArticles = array_merge($mesArticles, $articles);

                    $disponible = 1;
                    //Puis on sort du if et on récupère les disponible
                }
                $articles = self::getArticleByConditionRequest($categorie,$couleur,$prixmin,$prixmax,$genres,$promo,$disponible);
                $mesArticles = array_merge($mesArticles, $articles);

            }

        }
        
        $lsArticles = array();
        foreach($mesArticles as $valeurArticle){
            $id = $valeurArticle["id"];
            $lsLiens = self::getImagesArticleById($id);
            $quantite = self::getQuantiteArticleById($id);
            $article = ArticleEntity::CreateArticle($id,strval($valeurArticle["nom"]),strval($valeurArticle["category"]),strval($valeurArticle["genre"]),strval($valeurArticle["couleur"]),strval($valeurArticle["description"]),intval($valeurArticle["votant"]),floatval($valeurArticle["notes"]),floatval($valeurArticle["prix"]),floatval($valeurArticle["promo"]),boolval($valeurArticle["disponible"]),$quantite,$lsLiens);
                       
            $lsArticles[] = $article;
        }
        return $lsArticles;


    }

    /**
     * Renvoie le nom et couleur de l'aricle
     * 
     * @param int $id
     * @return array
     */
    public static function getArticleForCommande(int $id) :array
    {
        $requete = "CALL GetArticleForCommande(?)";
        $stmt = self::$pdo->prepare($requete);
        $stmt->bindParam(1,$id,\PDO::PARAM_INT);
        $stmt->execute();
        $articles = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        //var_dump($articles[0]);
        return $articles[0];
    }


}