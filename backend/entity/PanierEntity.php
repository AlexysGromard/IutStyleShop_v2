<?php

namespace backend\entity;

/*  @Entity @Table(name="commande") */
class PanierEntity
{
    /* 
    *@var ArticleCommandeEntity[]
    */
    private array $panierArticles; //ArticleComandeEntity

    public function __construct(array $panierArticles)
    {
        $this->setPanierArticles($panierArticles);
    }
    
    /* Getters & Setters */

    /**
     * @return ArticleCommandeEntity[]
     */
    public function getPanierArticles(): array
    {
        return $this->panierArticles;
    }

    /**
     * @param ArticleCommandeEntity[] $panierArticles
     */
    public function setPanierArticles(array $panierArticles): void
    {
        $this->panierArticles = $panierArticles;
    }

    /**
     * @param ArticleCommandeEntity $panierArticle
     */
    public function addPanierArticle(ArticleCommandeEntity $panierArticle): void
    {
        $this->panierArticles[] = $panierArticle;
    }
    /**
     * @param ArticleCommandeEntity $panierArticle
     */
    public function removePanierArticle(ArticleCommandeEntity $panierArticle): void
    {
        $index = array_search($panierArticle, $this->panierArticles);
        if ($index !== false) {
            unset($this->panierArticles[$index]);
        }
    }

   
    
}

?>
