<?php

/*  @Entity @Table(name="commande") */
class PanierEntity
{
    /*
    Table SQL Panier

    id_user INT NOT NULL,
    id_produit INT NOT NULL,
    quantite INT NOT NULL,
    FOREIGN KEY (id_user) REFERENCES user(id),
    FOREIGN KEY (id_produit) REFERENCES produit(id)
    */

    private int $id;
    private int $id_user;
    private int $id_produit;
    private int $quantite;

    /* Getters & Setters */

    /*
    * @return int
    */
    public function getId(): int
    {
        return $this->id;
    }

    /*
    * @return int
    */
    public function getIdUser(): int
    {
        return $this->id_user;
    }

    /*
    * @return int
    */
    public function getIdProduit(): int
    {
        return $this->id_produit;
    }

    /*
    * @return int
    */
    public function getQuantite(): int
    {
        return $this->quantite;
    }

    /*  
    * @param int $id_user
    */
    public function setIdUser(int $id_user): void
    {
        $this->id_user = $id_user;
    }

    /*
    * @param int $id_produit
    */
    public function setIdProduit(int $id_produit): void
    {
        $this->id_produit = $id_produit;
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
