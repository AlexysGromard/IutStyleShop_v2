<?php

namespace backend\entity;

/*  @Entity @Table(name="commande") */
class ComandeEntity
{

    /*
    Table SQL Commande
    
    id INT NOT NULL  AUTO_INCREMENT PRIMARY KEY,
    id_user INT NOT NULL,
    date DATETIME DEFAULT NOW() NOT NULL,
    statut VARCHAR(16) NOT NULL,
    prix FLOAT NULL,	 -- ne peut pas etre negatif
    FOREIGN KEY (id_user) REFERENCES User(id)
    */

    private int $id;
    private array $articlesComande; //ArticleComandeEntity
    private string $date;
    private string $statut;
    private float $prix;
    /**
     * @var ArticleCommandeEntity[]
     */
    private array $articlesCommandes;

    public function __construct(int $id,
                                array $articlesComande,
                                string $date,
                                string $statut,
                                float $prix)
    {
        $this->id = $id;
        $this->setArticlesCommandes($articlesComande);
        $this->setDate($date);
        $this->setStatut($statut);
        $this->setPrix($prix);
    }


    /* Getters & Setters */

    /*
    * @return int
    */

    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return ArticleCommandeEntity[]
     */
    public function getArticlesCommandes(): array
    {
        return $this->articlesComande;
    }

    /*
    * @return string
    */
    public function getDate(): string
    {
        return $this->date;
    }

    /*
    * @return string
    */
    public function getStatut(): string
    {
        return $this->statut;
    }

    /*
    * @return float
    */
    public function getPrix(): float
    {
        return $this->prix;
    }


    /*
    * @param string $date
    */
    public function setDate(string $date): void
    {
        $this->date = $date;
    }

    /**
     * @param ArticleCommandeEntity[] $articlesCommandes
     */
    public function setArticlesCommandes(array $articlesComande): void
    {
        $this->articlesComande = $articlesComande;
    }

    /*
    * @param string $statut
    */
    public function setStatut(string $statut): void
    {
        $this->statut = $statut;
    }

    /*
    * @param float $prix
    */
    public function setPrix(float $prix): void
    {
        $this->prix = $prix;
    }

    /* Fonction pour la liste d'articleComande */


    public function addArticleCommande(ArticleCommandeEntity $articleCommande): void
    {
        $this->articlesCommandes[] = $articleCommande;
    }

    public function removeArticleCommande(ArticleCommandeEntity $articleCommande): void
    {
        $index = array_search($articleCommande, $this->articlesCommandes);
        if ($index !== false) {
            unset($this->articlesCommandes[$index]);
        }
    }


}



?>