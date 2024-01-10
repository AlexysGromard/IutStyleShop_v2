<?php
function generateTable(
    array $keys,
    array $arrayElements,
    ? array $arrayLinks = null
) {

    if( count($arrayElements) >=1 && count($arrayElements[0]->getArrayOfImportantAttribut()) != count($keys)){
        echo "ERREUR";die();
    }

    if ($arrayLinks == null){
        $arrayLinks = array();
        foreach($keys as $nom ){
            $arrayLinks[] = null;
        }
    }

    if (count($arrayLinks) != count($keys)){
        echo "ERREUR";die();
    }
    
?>

<table class="table_admin">              
    <thead>
        <tr>
            <?php foreach( $keys as $nomkey) : ?>
                <th class="White_police_35" ><?= $nomkey?></th>
            <?php endforeach; ?>
            <th class="White_police_35" >Actions</th>
        </tr>
    </thead>
    <tbody>
        <!--bouclefor-->
        <?php foreach( $arrayElements as $element) : ?>
        <?php $listvalues= $element->getArrayOfImportantAttribut()?>
        <tr>
            <?php foreach( $keys as $nomkey) : ?>
                <td class="Black_police_40"><?= $listvalues[$nomkey] ?></td>
            <?php endforeach; ?>
            
            <td class=action_space>
                <a href="xx"><img src="/frontend/assets/icons/pencil.png" alt="poubelle rouge"></a>
                <a href="xx"><img src="/frontend/assets/icons/bin.png" alt="crayon rouge"></a>
            </td>
        </tr>
        <?php endforeach; ?>
        <!---->

    </tbody>
</table>

<?php
}
?>