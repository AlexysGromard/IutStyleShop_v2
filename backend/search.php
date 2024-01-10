<?php

function getProductNames(){
    return [
        'T-shirt Basic - Noir',
        'Sweat à capuche Vintage - Rouge',
        'Pantalon de jogging Performance - Gris',
        'Chemise élégante Slim Fit - Bleu',
        'Robe d\'été légère - Floral',
        'Veste en cuir classique - Marron',
        'Chaussures de sport Running Pro - Rouge',
        'Sac à dos moderne - Gris',
        'Casquette ajustable - Bleu',
        'T-shirt Basic - Blanc',
        'Sweat à capuche Vintage - Bleu',
        'Pantalon de jogging Performance - Noir',
        'Chemise élégante Slim Fit - Blanc',
        'Robe d\'été légère - Rayures',
        'Veste en cuir classique - Noir',
        'Chaussures de sport Running Pro - Noir',
        'Sac à dos moderne - Noir',
        'Casquette ajustable - Rouge',
    ];
}

function calculerCoefficientRessemblance($query, $product){
    // Vous pouvez ajuster ces poids en fonction de l'importance de chaque critère
    $poidsSimilariteJaccard = 1.0;
    $poidsSimilariteLevenshtein = 0.5;

    // Calculer la similarité de Jaccard
    $intersection = count(array_intersect(str_split($query), str_split($product)));
    $union = count(array_unique(array_merge(str_split($query), str_split($product))));
    $similariteJaccard = $union > 0 ? $intersection / $union : 0;

    // Calculer la similarité de Levenshtein
    $similariteLevenshtein = 1 - levenshtein($query, $product) / max(strlen($query), strlen($product));

    // Calculer le coefficient de ressemblance pondéré
    $coefficientRessemblance = ($poidsSimilariteJaccard * $similariteJaccard) + ($poidsSimilariteLevenshtein * $similariteLevenshtein);

    return $coefficientRessemblance;
}


function search($query){
    // Récupérer tous les articles
    $products = getProductNames();

    // Limite de coeefficient de ressemblance
    $limiteCoefficientRessemblance = 0.25;

    // Calculer les coefficients de ressemblance pour chaque produit
    $coefficients = array();
    foreach ($products as $product) {
        $coefficient = calculerCoefficientRessemblance($query, $product);
        $coefficients[$product] = $coefficient;
    }

    // Trier les résultats en fonction des coefficients de ressemblance (du plus grand au plus petit)
    arsort($coefficients);

    // Supprimer les résultats dont le coefficient de ressemblance est inférieur à la limite
    $coefficients = array_filter($coefficients, function($coefficient) use ($limiteCoefficientRessemblance) {
        return $coefficient >= $limiteCoefficientRessemblance;
    });
    return $coefficients;
}

?>