<?php  
namespace backend;

    class User{

        public int $id;
        public string $mail;
        public string $password;
        public string $nom;
        public string $prenom;
        public string $genre;
        public string $role;
        public string $adresse;
        public string $ville;
        public string $code_postal;
        public string $complement_adresse;
        /*panier + liste de command*/
        

        function __construct(int $id,
                            string $mail,
                            string $password,
                            string $nom,
                            string $prenom,
                            string $genre,
                            string $role,
                            string $adresse,
                            string $ville,
                            string $code_postal,
                            string $complement_adresse ){

            $this->id                   =$id;
            $this->mail                 =$mail;
            $this->password             =$password;
            $this->nom                  =$nom;
            $this->prenom               =$prenom;
            $this->genre                =$genre;
            $this->role                 =$role;
            $this->adresse              =$adresse;
            $this->ville                =$ville;
            $this->code_postal          =$code_postal;
            $this->complement_adresse   =$complement_adresse;
            }


        function getArrayOfImportantAttribut(){
            return [
                "N°" => $this->id,
                "Mail" => $this->mail,
                "Nom" => $this->nom,
                "Prénom" => $this->prenom,
                "Adresse" => $this->adresse
            ];
        }


    }