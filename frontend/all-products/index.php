<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tous les produits - IutStyleShop</title>
    <?php include 'frontend/common-includes.php'?>
    <link rel="stylesheet" href="/frontend/styles/all-products.css">
</head>
<body>
    <!-- Header -->
    <?php include 'frontend/components/header.php'; ?>
    <main>
        <!-- Articles -->
        <div id="articles-part">
            <div id="header-products">
                <!-- Section title -->
                <div class="section-title">
                <span class="section-title-name"><?= isset($search) ? "Résultat de \"" . $search . "\"" : (isset($pageTitle) ? $pageTitle : "Meilleures ventes"); ?></span>
                    <span id="nb-articles" class="section-title-results"><?= count($mesArticles);?> articles</span>
                </div>
                <!-- Btn 'All products' -->
                <select title="sort-order" id="sort-order">
                    <option value="pertinance">Pertinence</option>
                    <option value="ascending-price">Prix croissant</option>
                    <option value="descending-price">Prix décroissant</option>
                </select>
            </div>
            <!-- Section products -->
            <section id="products-section">
                <!-- ALL PRODUCTS -->
                <?php
                    include_once 'controller/components.php';

                    if (isset($mesArticles)){
                        foreach($mesArticles as $article){
                            $img = ""; 
                            if (count($article->getImages())>=1){
                                $img = $article->getImages()[0];
                            }
                            generateArticleComponent(
                                $id = $article->getId(),
                                $imageSrc = $img,
                                $title = $article->getNom(),
                                $starCount = intval($article->getNotes()),
                                $availability = $article->getDisponible(),
                                $promotion = $article->getPromo(),
                                $price = $article->getPrix()
                            );
                        
                        }
                    }
                    ?>
            </section>    
        </div>
        <!-- Section filters -->
        <section id="filter-section">
            <span id="filter-section-title">Filtrer votre recherche</span>
            <!-- Price Slider -->
            <div class="filter-container" id="price-slider">
                <span class="filter-title">prix</span>
                <div class="range_container">
                    <div class="sliders_control">
                        <input id="fromSlider" type="range" value="<?=$param[9] ?>" min="0" max="100"/>
                        <input id="toSlider" type="range" value="<?=$param[10] ?>" min="0" max="100"/>
                        <div id="range-values">
                            <span id="fromValue"><?=$param[9] ?></span>
                            <span id="toValue"><?=$param[10] ?></span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Product type -->
            <div class="filter-container" id="type-checkbox">
                <span class="filter-title">type de produit</span>
                <div class="range_container">
                    <ul id="product-type">
                        <li>
                            <input <?php if($param[0]=="true"){?> checked  <?php } ?>type="checkbox" id="tshirt" name="tshirt" value="tshirt">
                            <label for="tshirt">T-shirt</label>
                        </li>
                        <li>
                            <input <?php if($param[1]=="true"){?> checked  <?php } ?> type="checkbox" id="sweatshirt" name="sweatshirt" value="sweatshirt">
                            <label for="sweatshirt">Sweat-shirt</label>
                        </li>
                        <li>
                            <input <?php if($param[2]=="true"){?> checked  <?php } ?> type="checkbox" id="sportswear" name="sportswear" value="sportswear">
                            <label for="sportswear">Tenue de sport</label>
                        </li>
                        <li>
                            <input <?php if($param[3]=="true"){?> checked  <?php } ?> type="checkbox" id="accessories" name="accessories" value="accessories">
                            <label for="accessories">Accessoires</label>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- Product color -->
            <div class="filter-container" id="color-checkbox">
            <span class="filter-title">couleur</span>
            <div class="range_container">
                    <ul id="product-color">
                        <li>
                            <input <?php if($param[4]=="true"){?> checked  <?php } ?> type="checkbox" id="red" name="red" value="red">
                            <label for="red">Rouge</label>
                        </li>
                        <li>
                            <input <?php if($param[5]=="true"){?> checked  <?php } ?> type="checkbox" id="green" name="green" value="green">
                            <label for="green">Vert</label>
                        </li>
                        <li>
                            <input <?php if($param[6]=="true"){?> checked  <?php } ?> type="checkbox" id="blue" name="blue" value="blue">
                            <label for="blue">Bleu</label>
                        </li>
                        <li>
                            <input <?php if($param[7]=="true"){?> checked  <?php } ?> type="checkbox" id="white" name="white" value="white">
                            <label for="white">Blanc</label>
                        </li>
                        <li>
                            <input <?php if($param[8]=="true"){?> checked  <?php } ?> type="checkbox" id="black" name="black" value="black">
                            <label for="black">Noir</label>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- Product gender -->
            <div class="filter-container" id="gender-checkbox">
            <span class="filter-title">genre</span>
            <div class="range_container">
                    <ul id="product-gender">
                        <li>
                            <input <?php if($param[11]=="true"){?> checked  <?php } ?>  type="checkbox" id="homme" name="Homme" value="M">
                            <label for="homme">Homme</label>
                        </li>
                        <li>
                            <input <?php if($param[12]=="true"){?> checked  <?php } ?> type="checkbox" id="femme" name="Femme" value="F">
                            <label for="femme">Femme</label>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- Boutton Valider -->
            <button class="small-size button important-text" id="button-validate">Valider les filtres</button>
        </section>
    </main>
    <!-- Footer -->
    <?php include 'frontend/components/footer.php'; ?>
</body>
<script src="/frontend/scripts/products.js"></script>
<script src="/frontend/scripts/clickOnProduct.js"></script>


</html>