<?php

namespace backend\entity;

/*
* @Entity @Table(name="ArticleComande")
*/
class ArticleComandeEntity
{
    /*
    Table SQL Article

    id_commande INT PRIMARY KEY  NOT NULL,
    id_Article INT PRIMARY KEY  NOT NULL,
    taille VARCHAR(4) NOT NULL,
    prix_unitaire FLOAT NOT NULL,	-- ne peut pas etre negatif
    quantite TINYINT NOT NULL ,  -- ne peut pas etre a 0 ou >100
    FOREIGN KEY (id_commande) REFERENCES Commande(id),
    FOREIGN KEY (id_Article) REFERENCES Article (id)
    */

    private int $id;
    private ArticleEntity $article;
    private string $taille;
    private float $prix_unitaire;
    private int $quantite;


    public function __construct(int $id,
                                ArticleEntity $article,
                                string $taille,
                                float $prix_unitaire,
                                int $quantite) 
    {
        $this->id = $id;
        $this->setArticle($article);
        $this->setTaille($taille);
        $this->setPrixUnitaire($prix_unitaire);
        $this->setQuantite($quantite);
    }

    /* Getters & Setters */

    /*
    * @return int
    */
    public function getIdCommande(): int
    {
        return $this->id;
    }

    /*
    * @return int
    */
    public function getArticle(): ArticleEntity
    {
        return $this->article;
    }

    /*
    * @return string
    */
    public function getTaille(): string
    {
        return $this->taille;
    }

    /*
    * @return float
    */
    public function getPrixUnitaire(): float
    {
        return $this->prix_unitaire;
    }

    /*
    * @return int
    */
    public function getQuantite(): int
    {
        return $this->quantite;
    }


    /*
    * @param ArticleEntity $id_article
    */
    public function setArticle(ArticleEntity $article): void
    {
        $this->$article = $article;
    }

    /*
    * @param string $taille
    */
    public function setTaille(string $taille): void
    {
        $this->taille = $taille;
    }

    /*
    * @param float $prix_unitaire
    */
    public function setPrixUnitaire(float $prix_unitaire): void
    {
        $this->prix_unitaire = $prix_unitaire;
    }

    /*
    * @param int $quantite
    */
    public function setQuantite(int $quantite): void
    {
        $this->quantite = $quantite;
    }

}

?>
