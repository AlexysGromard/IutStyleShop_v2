<?php

/* @Entity @Table(name="article") */
class ArticleEntity
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

    private int $id;
    private string $nom;
    private string $category;
    private string $genre;
    private string $couleur;
    private string $description;
    private int $votant;
    private float $notes;
    private float $prix;
    private int $promo;
    private bool $disponible;
    // quantite en stock 1 seul taille pour les asccessoires et xs, s, m, l, xl pour les vetements 
    private array $quantite;
    /**
     * @var ImageEntity[]
     */
    private array $images;


    /* Getters & Setters */
    
    /*
    * @return int
    */
    public function getId(): int
    {
        return $this->id;
    }

    /*
    * @return string
    */
    public function getNom(): string
    {
        return $this->nom;
    }

    /*
    * @return string
    */
    public function getCategory(): string
    {
        return $this->category;
    }

    /*
    * @return string
    */
    public function getGenre(): string
    {
        return $this->genre;
    }

    /*
    * @return string
    */
    public function getCouleur(): string
    {
        return $this->couleur;
    }

    /*
    * @return string
    */
    public function getDescription(): string
    {
        return $this->description;
    }

    /*
    * @return int
    */

    public function getVotant(): int
    {
        return $this->votant;
    }

    /*
    * @return float
    */
    public function getNotes(): float
    {
        return $this->notes;
    }

    /*
    * @return float
    */
    public function getPrix(): float
    {
        return $this->prix;
    }

    /*
    * @return int
    */
    public function getPromo(): int
    {
        return $this->promo;
    }

    /*
    * @return bool
    */
    public function getDisponible(): bool
    {
        return $this->disponible;
    }

    /*
    * @return array
    */
    public function getQuantite(): array
    {
        return $this->quantite;
    }

    /*
    * @return ImageEntity[]
    */
    public function getImages(): array
    {
        return $this->images;
    }

    /*
    * @param string $nom
    */
    public function setNom(string $nom): void
    {
        $this->nom = $nom;
    }

    /*
    * @param string $category
    */
    public function setCategory(string $category): void
    {
        $this->category = $category;
    }

    /*
    * @param string $genre
    */
    public function setGenre(string $genre): void
    {
        $this->genre = $genre;
    }


    /*
    * @param string $couleur
    */
    public function setCouleur(string $couleur): void
    {
        $this->couleur = $couleur;
    }

    /*
    * @param string $description
    */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /*
    * @param int $votant
    */

    public function setVotant(int $votant): void
    {
        $this->votant = $votant;
    }

    /*
    * @param float $notes
    */
    public function setNotes(float $notes): void
    {
        $this->notes = $notes;
    }

    /*
    * @param float $prix
    */
    public function setPrix(float $prix): void
    {
        $this->prix = $prix;
    }

    /*
    * @param int $promo
    */
    public function setPromo(int $promo): void
    {
        $this->promo = $promo;
    }

    /*
    * @param bool $disponible
    */
    public function setDisponible(bool $disponible): void
    {
        $this->disponible = $disponible;
    }

    /*
    * @param array $quantite
    */
    public function setQuantite(array $quantite): void
    {
        $this->quantite = $quantite;
    }

    /*
    * @param ImageEntity[] $images
    */
    public function setImages(array $images): void
    {
        $this->images = $images;
    }

    /*
    * @param ImageEntity $image
    */
    public function addImage(ImageEntity $image): void
    {
        $this->images[] = $image;
    }

    /*
    * @param ImageEntity $image
    */
    public function removeImage(ImageEntity $image): void
    {
        $key = array_search($image, $this->images);
        if ($key !== false) {
            unset($this->images[$key]);
        }
    }


}