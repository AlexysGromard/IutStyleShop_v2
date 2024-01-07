<?php
/*
* @Entity @Table(name="code_promo")
*/
class CodePromoEntity
{
    /*
    Table SQL CodePromo

	ID_User INT PRIMARY KEY NOT NULL, 
	id_Article INT PRIMARY KEY NOT NULL,
	taille VARCHAR(4) NOT NULL, --ne peut qu'omporté que des valeur choisie et max : xxxl
	quantite TINYINT NOT NULL ,  -- ne peut pas etre a 0 ou >100
	FOREIGN KEY (ID_User) REFERENCES User(id),
	FOREIGN KEY (id_Article) REFERENCES Article (id)
    */

    private int $id_user;
    private int $id_article;
    private string $taille;
    private int $quantite;

    /* Getters & Setters */

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
    * @param int $quantite
    */
    public function setQuantite(int $quantite): void
    {
        $this->quantite = $quantite;
    }

}

?>