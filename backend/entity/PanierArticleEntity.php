<?php

namespace backend\entity;

use PDO;

class PanierArticleEntity
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


    private int $id_article;
    private ?string $taille;
    private int $quantite;

    function __construct(int $id_article,
                         ?string $taille,
                         int $quantite)
    {
        $this->setIdArticle($id_article);
        $this->setTaille($taille);
        $this->setQuantite($quantite);
    }


    /* Getters & Setters */

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
    public function getTaille(): ?string
    {
        return $this->taille;
    }

    /*
    * @return float
    */
    public function getQuantite(): int
    {
        return $this->quantite;
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
    public function setTaille(?string $taille): void
    {
        $this->taille = $taille;
    }

    /*
    * @param float $quantite
    */
    public function setQuantite(int $quantite): void
    {
        $this->quantite = $quantite;
    }

    /*
    public function getArticle(): ArticleEntity{
        //TODO
    }*/

}
