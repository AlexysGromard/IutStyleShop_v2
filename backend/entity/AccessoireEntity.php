<?php

namespace backend\entity;

/* @Entity @Table(name="article") */
class AccessoireEntity extends ArticleEntity
{
    /*
    Table SQL Article

    	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, 
	nom VARCHAR(128) NOT NULL,
	category VARCHAR(128) NOT NULL,
	genre VARCHAR(16) NOT NULL,
	couleur VARCHAR(32) NOT NULL,
	description VARCHAR(256) NULL,
	votant INT NOT NULL,
	notes	FLOAT NOT NULL, 
	prix FLOAT NOT NULL,-- ne peut pas etre negatif
	promo TINYINT NOT NULL  -- ne peut pas etre < 0 ou >100
	disponible BOOLEAN NOT NULL,
    */


    // quantite en stock 1 seul taille pour les asccessoires et xs, s, m, l, xl pour les vetements 
    private int $quantite;



    function __construct(  int $id,
                                    string $nom,
                                    string $category,
                                    string $genre,
                                    string $couleur,
                                    string $description,
                                    int $votant,
                                    float $notes,
                                    float $prix,
                                    int $promo,
                                    bool $disponible,
                                    int $quantite,
                                    array $images)
    {
        
        $this->id = $id;
        $this->setNom($nom);
        $this->setCategory($category);
        $this->setGenre($genre);
        $this->setCouleur($couleur);
        $this->setDescription($description);
        $this->setVotant($votant);
        $this->setNotes($notes);
        $this->setPrix($prix);
        $this->setPromo($promo);
        $this->setDisponible($disponible);
        $this->setImages($images);
        
        $this->setQuantite($quantite);
    }



    /* Getters & Setters */
    
    /*
    * @return int
    */
    public function getQuantite(): int
    {
        return $this->quantite;
    }

    /*
    * @param int $notes
    */
    public function setQuantite(int $quantite): void
    {
        $this->quantite = $quantite;
    }



}

?>