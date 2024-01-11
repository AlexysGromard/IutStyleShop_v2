<?php

namespace backend\DAO;

class DBCodePromo extends Connexion implements DAOInterface
{

    /**
     * Ajoute un code promo
     * 
     * @param CodePromoEntity $entity
     * @return void
     */
    public static function add($entity)
    {
        $requete = "CALL InsertCodePromo(?,?)";

        $stmt = self::$pdo->prepare($requete);

        $stmt->bindParam(1, $entity->code, \PDO::PARAM_STR);
        $stmt->bindParam(2, $entity->promo, \PDO::PARAM_INT);


        $stmt->execute();
    }

    /**
     * Update un code promo
     * 
     * @param CodePromoEntity $entity
     * @return void
     */
    public static function update($entity)
    {
        $requete = "CALL UpdateCodePromo(?,?,?)";

        $stmt = self::$pdo->prepare($requete);

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
    public static function delete($entity)
    {
        $requete = "CALL DeleteCodePromo(?)"; 

        $stmt = self::$pdo->prepare($requete);

        $stmt->bindParam(1, $entity->id, \PDO::PARAM_INT);

        $stmt->execute();
    }

    /**
     * Donne tous les codes promos
     * 
     * @return CodePromoEntity[]
     */
    public static function getall() : array
    {
        $requete = "CALL GetAllCodePromo()";

        $stmt = self::$pdo->prepare($requete);

        $stmt->execute();

        $rows = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        $codePromoEntities = [];
            
        foreach ($rows as $row) {
            $codePromoEntity = new \backend\entity\CodePromoEntity($row['id'], $row['texte'], $row['promo']);
            $codePromoEntities[] = $codePromoEntity;
        }

        return $codePromoEntities; 
    }

    /**
     * Donne un code promo
     * 
     * @param int $id
     * @return CodePromoEntity|null
     */
    public static function getById(int $id): ?CodePromoEntity
    {
        $requete = "CALL GetCodePromoById(?)";

        $stmt = self::$pdo->prepare($requete);

        $stmt->bindParam(1, $id, \PDO::PARAM_INT);

        $stmt->execute();

        $row = $stmt->fetch(\PDO::FETCH_ASSOC);

        var_dump($row);

        if ($row === false) {
            // Aucun résultat trouvé
            return null;
        }

        
        
        // Créez une instance de CodePromoEntity en utilisant les données de la ligne
        return new \backend\entity\CodePromoEntity($row['id'],$row['texte'],$row['promo']);
    }

}
