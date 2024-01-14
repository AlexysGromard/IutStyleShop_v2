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
    private float $note;
    private string $commentaire;

    function __construct(int $id_user,
                        float $note,
                        string $commentaire)
    {
        $this->id_user = $id_user;
        $this->setNote($note);
        $this->setCommentaire($commentaire);
    }

    /* Getters & Setters */
    
    /*  
    * @return int
    */
    public function getUser(): UserEntity
    {
        return $this->user;
    }

    // /*
    // * @return int
    // */
    // public function getArticle(): ArticleEntity
    // {
    //     return $this->article;
    // }

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
