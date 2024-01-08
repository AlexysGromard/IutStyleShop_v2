<?php

namespace backend\entity;

/* @Entity @Table(name="article") */
class AccessoireVetement extends ArticleEntity
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
    private int $quantiteXS;
    private int $quantiteS;
    private int $quantiteM;
    private int $quantiteL;
    private int $quantiteXL;



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
                                    array $quantite,
                                    array $images)
    {
        if (count($quantite) != 5){
            throw new \Exception('erreur');
        }
        
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
        
        $this->setQuantiteXS($quantite[0]);
        $this->setQuantiteS($quantite[1]);
        $this->setQuantiteM($quantite[2]);
        $this->setQuantiteXL($quantite[3]);
        $this->setQuantiteL($quantite[4]);
    }



    /* Getters & Setters */
    
    /*
    * @return int
    */
    public function getQuantiteXS(): int
    {
        return $this->quantiteXS;
    }
    /*
    * @return int
    */
    public function getQuantiteS(): int
    {
        return $this->quantiteS;
    }
    /*
    * @return int
    */
    public function getQuantiteM(): int
    {
        return $this->quantiteM;
    }
    /*
    * @return int
    */
    public function getQuantiteL(): int
    {
        return $this->quantiteL;
    }
    /*
    * @return int
    */
    public function getQuantiteXL(): int
    {
        return $this->quantiteXL;
    }

    /* -------------------------------------------------------- */

    /*
    * @param int $notes
    */
    public function setQuantiteXS(int $quantite): void
    {
        $this->quantiteXS = $quantite;
    }
    
    /*
    * @param int $notes
    */
    public function setQuantiteS(int $quantite): void
    {
        $this->quantiteS = $quantite;
    }

    /*
    * @param int $notes
    */
    public function setQuantiteM(int $quantite): void
    {
        $this->quantiteM = $quantite;
    }

    /*
    * @param int $notes
    */
    public function setQuantiteL(int $quantite): void
    {
        $this->quantiteL = $quantite;
    }

    /*
    * @param int $notes
    */
    public function setQuantiteXL(int $quantite): void
    {
        $this->quantiteXL = $quantite;
    }



}

?>