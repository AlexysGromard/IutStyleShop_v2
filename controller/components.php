<?php
/**
 * Cette fonction génère un composant d'article.
 * Elle prend en paramètre les informations de l'article à afficher.
 */
function generateArticleComponent(
    $id = null, // id de l'article, permet d'accéder à la page de l'article
    $imageSrc = "",
    $title = "unknown",
    $starCount = 0,
    $availability = false,
    $promotion = "0",
    $price = "0,00",
) {
    // ID validation (assuming positive integer IDs)
    $id = is_numeric($id) ? intval($id) : null;

    // Stars count must be between 0 and 5
    if ($starCount < 0) {
        $starCount = 0;
    } else if ($starCount > 5) {
        $starCount = 5;
    }

    // Price must be a number with 2 decimals
    if (!is_numeric($price)) {
        $price = "0,00";
    } else {
        $price = number_format($price, 2, ',', ' ');
    }

    // Promotion text must be a number between 0 and 100
    if (!is_numeric($promotion) || $promotion < 0 || $promotion > 100) {
        $promotion = "0";
    }
    // Escape output data
    $title = htmlspecialchars($title, ENT_QUOTES, 'UTF-8');
    $imageSrc = htmlspecialchars($imageSrc, ENT_QUOTES, 'UTF-8');
    $promotion = htmlspecialchars($promotion, ENT_QUOTES, 'UTF-8');
    $price = htmlspecialchars($price, ENT_QUOTES, 'UTF-8');

    require "frontend/components/article-card.php";
}


/**
 * Cette fonction génère un composant d'article dans le panier.
 * Elle prend en paramètre les informations de l'article à afficher.
 */
function generateCartItemComponent(
    $articleName = "Unknown",
    $articleSize = "Unknown",
    $disponibility = false,
    $articleQuantity = 0,
    $articlePrice = 0,
    $articleColor = "Unknown",
    $articleImage = "Unknown",
    $panierArticleEntity = [null, null, null]
) {
    // Quantity must be number >= 0 and <= 99 
    if (!is_numeric($articleQuantity) || $articleQuantity < 0) {
        $articleQuantity = 0;
    } else if ($articleQuantity > 99) {
        $articleQuantity = 99;
    }
    // Price must be number >= 0
    if (!is_numeric($articlePrice) || $articlePrice < 0) {
        $articlePrice = 0;
    }
    // Check if articleSize is a string in XS, S, M, L, XL, XXL
    $articleSize = strtoupper($articleSize);
    $articleSize = in_array($articleSize, ["XS", "S", "M", "L", "XL", "XXL"]) ? $articleSize : "Unknown";
    // Escape output data
    $articleName = htmlspecialchars($articleName, ENT_QUOTES, 'UTF-8');
    $articleSize = htmlspecialchars($articleSize, ENT_QUOTES, 'UTF-8');
    $articleColor = htmlspecialchars($articleColor, ENT_QUOTES, 'UTF-8');
    $articleImage = htmlspecialchars($articleImage, ENT_QUOTES, 'UTF-8');

    require "frontend/components/cart-item.php";
}

/**
 * Cette fonction génère un composant de la page utilisateur et de l'admin.
 */
function generateUserPanelComponent(
    $actionsSelect,
    $userName = "Unknown",
    $userId = 0,
    $userGender = "Unknown",
    $userType = "Unknown",
    $userRole = "client"
) {
    // Escape output data
    $userName = htmlspecialchars($userName, ENT_QUOTES, 'UTF-8');
    $userId = htmlspecialchars($userId, ENT_QUOTES, 'UTF-8');
    if (!isset($userGender)){
        $userGender = "N";
    }
    $userGender = htmlspecialchars($userGender, ENT_QUOTES, 'UTF-8');
    $userType = htmlspecialchars($userType, ENT_QUOTES, 'UTF-8');

    // ID validation (assuming positive integer IDs)
    $userId = is_numeric($userId) ? intval($userId) : null;

    // Gender must be "M" or "F"
    $userGender = in_array($userGender, ["M", "F", "N"]) ? $userGender : "Unknown";

    // User type must be "admin" or "client"
    $userType = in_array($userType, ["admin", "client"]) ? $userType : "Unknown";

    $userRole = in_array($userRole, ["admin", "client"]) ? $userRole : "Unknown";

    // Actions list
    $actions = [
        "admin" => [
            "Base de données utilisateurs" => "/user/admin_space/utilisateurs",
            "Base de données commandes" => "/user/admin_space/commandes",
            "Base de données articles" => "/user/admin_space/articles",
            "Base de données avis" => "/user/admin_space/avis",
            "Base de données codes promotionnel" => "/user/admin_space/codes_promotionnel"
        ],
        "client" => [
            "Mes informations" => "/user/dashboard/informations",
            "Mes commandes" => "/user/dashboard/commandes",
            "Mon adresse" => "/user/dashboard/adresse",
            "Mes paramètres" => "/user/dashboard/parametres"
        ]
    ];

    //action selected
    if (!(($userType == "admin" && in_array($actionsSelect,array_keys($actions["admin"]))) || ($userType == "client" && in_array($actionsSelect,array_keys($actions["client"]))))){
        echo "ERREUR".$userType;
    }

    require "frontend/components/user-panel.php";
}

/**
 * Cette fonction génère un composant de commentaire.
 * Elle prend en paramètre les informations du commentaire à afficher.
 */
function generateCommentComponent(
    $name = "Unknown", 
    $rating = 0, 
    $commentText = "Error: No comment text provided."
) {
    // Rating must be between 0 and 5
    if ($rating < 0) {
        $rating = 0;
    } else if ($rating > 5) {
        $rating = 5;
    }

    // Escape output data
    $name = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
    $commentText = htmlspecialchars($commentText, ENT_QUOTES, 'UTF-8');

    require "frontend/components/comment.php";
}

/**
 * Cette fonction génère un composant de la table de la base de données.
 * Elle prend en paramètre les informations de la table à afficher.
 */
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

    require "frontend/components/table.php";
}

?>