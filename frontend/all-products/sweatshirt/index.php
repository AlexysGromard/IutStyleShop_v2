<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sweatshirt - IUTStyleShop</title>
    <link rel="stylesheet" href="../../styles/variables.css">
    <link rel="stylesheet" href="../../styles/general.css">
    <link rel="stylesheet" href="../../styles/all-products.css">
</head>
<body>
    <!-- Header -->
    <?php include '../../components/header.php'; ?>
    <main>
        <!-- Articles -->
        <div id="articles-part">
            <div id="header-products">
                <!-- Section title -->
                <div class="section-title">
                    <span class="section-title-name">Sweat-shirts</span>
                    <span id="nb-articles" class="section-title-results">0 articles</span>
                </div>
                <!-- Btn 'All products' -->
                <select title="sort-order" id="sort-order">
                    <option value="pertinance">Pertinance</option>
                    <option value="ascending-price">Prix croissant</option>
                    <option value="descending-price">Prix décroissant</option>
                </select>
            </div>
            <!-- Section products -->
            <section id="products-section">
                <!-- ALL PRODUCTS -->
            </section>    
        </div>
        <!-- Section filters -->
        <section id="filter-section">
            <span id="filter-section-title">Filter votre recherche</span>
            <!-- Price Slider -->
            <div class="filter-container" id="price-slider">
                <span class="filter-title">prix</span>
                <div class="range_container">
                    <div class="sliders_control">
                        <input id="fromSlider" type="range" value="0" min="0" max="100"/>
                        <input id="toSlider" type="range" value="100" min="0" max="100"/>
                        <div id="range-values">
                            <span id="fromValue">0</span>
                            <span id="toValue">100</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Product color -->
            <div class="filter-container" id="color-checkbox">
            <span class="filter-title">couleur</span>
            <div class="range_container">
                    <ul id="product-color">
                        <li>
                            <input checked checked type="checkbox" id="red" name="red" value="white">
                            <label for="red">Rouge</label>
                        </li>
                        <li>
                            <input checked type="checkbox" id="green" name="green" value="white">
                            <label for="green">Vert</label>
                        </li>
                        <li>
                            <input checked type="checkbox" id="blue" name="blue" value="blue">
                            <label for="blue">Bleu</label>
                        </li>
                        <li>
                            <input checked type="checkbox" id="white" name="white" value="white">
                            <label for="white">Blanc</label>
                        </li>
                        <li>
                            <input checked type="checkbox" id="black" name="black" value="black">
                            <label for="black">Noir</label>
                        </li>
                    </ul>
                </div>
            </div>
        </section>
    </main>
    <!-- Footer -->
    <?php include '../components/footer.php'; ?>
</body>
<script src="../../scripts/all-products.js"></script>
</html>