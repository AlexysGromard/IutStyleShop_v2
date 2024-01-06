<?php  
namespace backend;

    class Commande{

        public int $id;
        public int $iduser;//pour quoi pas un user directement
        public string $date;
        public string $status;
        public float $prix;
        /*liste article*/

        function __construct(int $id,
                            int $iduser,
                            string $date,
                            string $status,
                            float $prix ){

            $this->id       =$id;
            $this->iduser   =$iduser;
            $this->date     =$date;
            $this->status   =$status;
            $this->prix     =$prix;

            }


        function getArrayOfImportantAttribut(){
            return [
                "N°" => $this->id,
                "N° Utilisateur" => $this->iduser,
                "Date" => $this->date,
                "Statut" => $this->status,
                "Prix" => $this->prix
            ];
        }


    }