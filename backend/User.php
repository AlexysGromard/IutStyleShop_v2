<?php  
namespace backend;

    class User{

        public int $id;
        public string $nom;
        public string $prenom;
        public string $genre;
        public string $role;

        function __construct(int $id, string $nom, string $prenom, string $genre, string $role){
            $this->id = $id;
            $this->nom = $nom;
            $this->prenom = $prenom;
            $this->genre = $genre;
            $this->role = $role;
        }


    }