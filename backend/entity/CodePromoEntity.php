<?php

namespace backend\entity;

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


    private int $id;
    private string $code;
    private float $promo;
    
    public function __construct(int $id,string $code,float $promo) {
        $this->id = $id;
        $this->setCode($code);
        $this->setPromo($promo);
    }

    function getId(): int {
        return $this->id;
    }

    function getCode(): string{
        return $this->code;
    }

    function getPromo(): string{
        return $this->promo;
    }

    function setCode(string $code){
        return $this->code = $code;
    }

    function setPromo(float $promo){
        return $this->promo = $promo;
    }
}

?>