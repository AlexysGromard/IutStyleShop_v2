<?php

namespace backend\entity;

/*
* @Entity @Table(name="ArticleComande")
*/
class ArticleCommandeEntity
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

    private int $id_commande;
    private int $id_article;
    private string $taille;
    private float $prix_unitaire;
    private int $quantite;

    /* Getters & Setters */

    /*
    * @return int
    */
    public function getIdCommande(): int
    {
        return $this->id_commande;
    }

    /*
    * @return int
    */
    public function getIdArticle(): int
    {
        return $this->id_article;
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
    * @param int $id_commande
    */
    public function setIdCommande(int $id_commande): void
    {
        $this->id_commande = $id_commande;
    }

    /*
    * @param int $id_article
    */
    public function setIdArticle(int $id_article): void
    {
        $this->id_article = $id_article;
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
