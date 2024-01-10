<?php

namespace backend\entity;

/*
* @Entity @Table(name="commentaire")
*/
class CommentaireEntity
{
    /*
    Table SQL Commentaire
    
	ID_User INT PRIMARY KEY NOT NULL, 
	ID_Article INT PRIMARY KEY NOT NULL,
	note FLOAT NOT NULL,
	commentaire VARCHAR2(512) NULL,
	FOREIGN KEY (ID_User) REFERENCES User(id),
	FOREIGN KEY (ID_Article) REFERENCES Article(id)
    */

    private int $id_user;
    private int $id_article;
    private float $note;
    private string $commentaire;

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
    * @return float
    */
    public function getNote(): float
    {
        return $this->note;
    }

    /*
    * @return string
    */
    public function getCommentaire(): string
    {
        return $this->commentaire;
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
    * @param float $note
    */

    public function setNote(float $note): void
    {
        $this->note = $note;
    }

    /*
    * @param string $commentaire
    */
    public function setCommentaire(string $commentaire): void
    {
        $this->commentaire = $commentaire;
    }

}

?>
