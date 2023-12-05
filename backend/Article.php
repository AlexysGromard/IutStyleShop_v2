<?php  
namespace backend;

    class Article{

        public string $nom;
        public string $category;
        public string $genre;
        public string $image;
        public float $notes;
        public int $nbNotation;
        public string $description;
        public string $couleur;
        public bool $disponible;
        public float $prix;
        public int $promo;


        function __construct(string $nom, string $category, string $genre, string $image, float $notes,int $nbNotation, string $description, string $couleur, bool $disponible, float $prix, int $promo){
            echo "construction de ".$nom."<br>";
            $this->nom = $nom;
            $this->category = $category;
            $this->genre = $genre;
            $this->image = $image;
            $this->notes = $notes;
            $this->nbNotation = $nbNotation;
            $this->description = $description;
            $this->couleur = $couleur;
            $this->disponible = $disponible;
            $this->prix = $prix;
            $this->promo = $promo;
            
        }
    }

?>