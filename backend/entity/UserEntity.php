<?php

namespace backend\entity;

/*
* @Entity @Table(name="user")
*/
class UserEntity
{
    /*
    Table SQL User

    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT, 
	email VARCHAR(255) NOT NULL UNIQUE,
	password VARCHAR(255) NOT NULL, -- crypter avec bcrypt
	nom VARCHAR(64) NULL,
	prenom  VARCHAR(64) NULL,
	genre VARCHAR(16) NULL,
	role VARCHAR(16) NOT NULL,
	adresse VARCHAR2(255) NULL,
	ville VARCHAR(128) NULL,
	code_postal MEDIUMINT NULL,
	Complement_adresse VARCHAR2(128) NULL,
    */

    // Utilisateur non identifié
   // private ?bool $cookieAccepted = null;
    
    // Utilisateur identifié‡
    private int $id;
    private string $email;
    private ?string $telephone;
    private ?string $nom;
    private ?string $prenom;
    private ?string $genre;
    private ?string $role;
    private ?string $adresse;
    private ?string $ville;
    private ?int $code_postal;
    private ?string $complement_adresse;


    public function __construct(int $id,
                                string $email,
                                ?string  $telephone,
                                ?string $nom,
                                ?string  $prenom,
                                ?string  $genre,
                                ?string  $role,
                                ?string  $adresse,
                                ?string  $ville,
                                ?int $code_postal,
                                ?string  $complement_adresse
                                )
    {
        $this->id = $id;
        $this->setEmail($email);
        $this->setTelephone($telephone);
        $this->setNom($nom);
        $this->setPrenom($prenom);
        $this->setGenre($genre);
        $this->setRole($role);
        $this->setAdresse($adresse);
        $this->setVille($ville);
        $this->setCodePostal($code_postal);
        $this->setComplementAdresse($complement_adresse);
        // Si l'utilisateur n'a pas de cookie, ouvrir pop-up de cookie
        // $this->cookieAccepted = isset($_COOKIE['cookie']) ? $_COOKIE['cookie'] : null;
        // if ($this->cookieAccepted == null) {
        //     $this->askForCookies();
        // }
        // $this->saveUserSession();
    }

    /*
    * Getters & Setters
    */


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
    public function getEmail(): string
    {
        return $this->email;
    }

    /*
    * @return string
    */
    public function getTelephone(): ?string 
    {
        return $this->telephone;
    }


    /*
    * @return string
    */
    public function getNom(): ?string  
    {
        return $this->nom;
    }

    /*
    * @return string
    */
    public function getPrenom(): ?string  
    {
        return $this->prenom;
    }

        /*
    * @return string
    */
    public function getGenre(): ?string  
    {
        return $this->genre;
    }

        /*
    * @return string
    */
    public function getRole(): ?string  
    {
        return $this->role;
    }

        /*
    * @return string
    */
    public function getAdresse(): ?string 
    {
        return $this->adresse;
    }

        /*
    * @return string
    */
    public function getVille(): ?string  
    {
        return $this->ville;
    }

        /*
    * @return int
    */
    public function getCodePostal(): ?int 
    {
        return $this->code_postal;
    }

    /*
    * @return string
    */
    public function getComplementAdresse(): ?string 
    {
        return $this->complement_adresse;
    }

    // public function setId(int $id): void 
    // {
    //     $this->id = $id;
    // }

    /*
    * @param string $email
    */
    public function setEmail(string $email): void 
    {
        $this->email = $email;
    }

    /*
    * @param string $telephone
    */
    public function setTelephone(?string $telephone): void
    {
        $this->telephone = $telephone;
    }

    /*
    * @param string $nom
    */
    public function setNom(?string $nom): void 
    {
        $this->nom = $nom;
    }

    /*
    * @param string $prenom
    */
    public function setPrenom(?string $prenom): void 
    {
        $this->prenom = $prenom;
    }

    /*
    * @param string $genre
    */
    public function setGenre(?string $genre): void 
    {
        $this->genre = $genre;
    }

    /*
    * @param string $role
    */
    public function setRole(?string $role): void 
    {
        $this->role = $role;
    }

    /*
    * @param string $adresse
    */
    public function setAdresse(?string $adresse): void 
    {
        $this->adresse = $adresse;
    }

    /*
    * @param string $ville
    */
    public function setVille(?string $ville): void 
    {
        $this->ville = $ville;
    }

        /*
    * @param int $code_postal
    */
    public function setCodePostal(?int $code_postal): void 
    {
        $this->code_postal = $code_postal;
    }

    /*
    * @param string $complement_adresse
    */
    public function setComplementAdresse(?string $complement_adresse): void 
    {
        $this->complement_adresse = $complement_adresse;
    }

    /*
    * Cette fonction retourne le panier de l'utilisateur
    * @return PanierEntity
    */
    public function getPanier(): \backend\entity\PanierEntity
    {
        // Appeler la fonction getPanierByUser de DBPanier
        $DAOPanier = new \backend\DAO\DBPanier();
        return $DAOPanier->getPanierByUser($this);
    }


}

?>
