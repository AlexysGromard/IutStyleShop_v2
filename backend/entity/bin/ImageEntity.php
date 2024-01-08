<?php

namespace backend\entity;

/* @Entity @Table(name="image") */
class ImageEntity 
{
    /*
    Table SQL Image

        id INT NOT NULL  AUTO_INCREMENT PRIMARY KEY,
    lien VARCHAR(255) NOT NULL UNIQUE,
    id_Article INT PRIMARY KEY NOT NULL,
    FOREIGN KEY (id_Article) REFERENCES Article (id)
    */  

    private int $id;
    private string $lien;

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
    public function getLien(): string
    {
        return $this->lien;
    }

    /*
    * @param string $lien
    */
    public function setLien(string $lien): void
    {
        $this->lien = $lien;
    }
   

}

?>