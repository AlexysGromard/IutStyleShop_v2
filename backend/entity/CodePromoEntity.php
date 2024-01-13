<?php

namespace backend\entity;

/*
* @Entity @Table(name="code_promo")
*/
class CodePromoEntity
{
    /*
    Table SQL CodePromo

    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, 
    texte VARCHAR(255) NOT NULL UNIQUE,
    promo TINYINT NOT NULL
    */


    private int $id;
    private string $code;
    private int $promo;
    
    public function __construct(int $id,string $code,int $promo) {
        $this->id = $id;
        $this->setCode($code);
        $this->setPromo($promo);
    }

    /* Getters & Setters */

    /*
    * @return int
    */
    public function getId(): int {
        return $this->id;
    }

    /*
    * @return string
    */
    function getCode(): string{
        return $this->code;
    }

    /*
    * @return int
    */
    function getPromo(): int{
        return $this->promo;
    }

    /*
    * @param string $code
    */
    function setCode(string $code){
        return $this->code = $code;
    }

    /*
    * @param int $promo
    */
    function setPromo(int $promo){
        return $this->promo = $promo;
    }
}

?>