<?php

namespace backend\entity;

/*  @Entity @Table(name="commande") */
class PanierEntity
{
    /* 
    *@var PanierArticleEntity[]
    */
    private array $panierArticles; //ArticleComandeEntity

    public function __construct(array $panierArticles)
    {
        $this->setPanierArticles($panierArticles);
    }
    
    /* Getters & Setters */

    /**
     * @return PanierArticleEntity[]
     */
    public function getPanierArticles(): array
    {
        return $this->panierArticles;
    }

    /**
     * @param PanierArticleEntity[] $panierArticles
     */
    public function setPanierArticles(array $panierArticles): void
    {
        $this->panierArticles = $panierArticles;
    }

    /**
     * @param PanierArticleEntity $panierArticle
     */
    public function addPanierArticle(PanierArticleEntity $panierArticle): void
    {
        $this->panierArticles[] = $panierArticle;
    }
    /**
     * @param PanierArticleEntity $panierArticle
     */
    public function removePanierArticle(PanierArticleEntity $panierArticle): void
    {
        $index = array_search($panierArticle, $this->panierArticles);
        if ($index !== false) {
            unset($this->panierArticles[$index]);
        }
    }

    public function getPrixTotal(): float
    {
        $prixTotal = 0;
        foreach ($this->panierArticles as $panierArticle) {
            $article = \backend\DAO\DBArticle::getById($panierArticle->getIdArticle());
            $prixTotal += $article->getPrix() * $panierArticle->getQuantite();
        }
        return $prixTotal;
    }

}

?>
