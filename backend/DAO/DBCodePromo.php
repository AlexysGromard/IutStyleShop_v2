<?php

namespace backend\DAO;

class DBCodePromo extends Connexion
{

    /**
     * Ajoute un code promo
     * 
     * @param CodePromoEntity $entity
     * @return void
     */
    public function add($code,$promo)
    {
        $requete = "CALL InsertCodePromo(?,?)";

        $stmt = $this->pdo->prepare($requete);

        $stmt->bindParam(1, $code, \PDO::PARAM_STR);
        $stmt->bindParam(2, $promo, \PDO::PARAM_INT);


        $stmt->execute();
    }

    /**
     * Update un code promo
     * 
     * @param CodePromoEntity $entity
     * @return void
     */
    public function update($entity)
    {
        $requete = "CALL UpdateCodePromo(?,?,?)";

        $stmt = $this->pdo->prepare($requete);

        $stmt->bindParam(1, $entity->id, \PDO::PARAM_INT);
        $stmt->bindParam(2, $entity->code, \PDO::PARAM_STR);
        $stmt->bindParam(3, $entity->promo, \PDO::PARAM_INT);

        $stmt->execute();
    }

    /**
     * Supprime un code promo
     * 
     * @param int $id
     * @return void
     */
    public function delete($entity)
    {
        $requete = "CALL DeleteCodePromo(?)";

        $stmt = $this->pdo->prepare($requete);

        $stmt->bindParam(1, $entity->id, \PDO::PARAM_INT);

        $stmt->execute();
    }

    /**
     * Donne tous les codes promos
     * 
     * @return CodePromoEntity[]
     */
    public function getall()
    {
        $requete = "CALL GetAllCodePromo()";

        $stmt = $this->pdo->prepare($requete);
        
        $stmt->execute();

        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        $codes = [];
        foreach ($result as $code){
            $codes[] = new \backend\entity\CodePromoEntity($code["id"],$code["texte"],$code["promo"]);
        }
        return $codes;
        
    }

    /**
     * Donne un code promo
     * 
     * @param int $id
     * @return CodePromoEntity|null
     */
    public function getById(int $id): ?\backend\entity\CodePromoEntity
    {
        $requete = "CALL GetCodePromoById(?)";

        $stmt = $this->pdo->prepare($requete);

        $stmt->bindParam(1, $id, \PDO::PARAM_INT);

        $stmt->execute();

        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        if (count($result) == 0){
            return null;
        }
        $code = $result[0];
        return new \backend\entity\CodePromoEntity($code["id"],$code["texte"],$code["promo"]);
    }

}
