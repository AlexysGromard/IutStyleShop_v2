<?php

namespace backend\entity;

/*  @Entity @Table(name="commande") */
class PanierEntity
{
    
    private array $articles;
    private array $quantites;
    private array $taille;

    function __construct(array $articles, array $quantites, array $taille)
    {

        if (count($articles) != count($quantites) || count($quantites) != count($taille)){
            throw new \Exception('erreur');
        }

        $this->articles = $articles;
        $this->quantites = $quantites;
        $this->taille = $taille;
    }

    
    
}

?>
