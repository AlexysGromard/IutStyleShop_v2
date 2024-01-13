<header>
    <div class="header-top">
        <a class="link-to-home" href="/"><img src="/frontend/assets/images/Header-Image/logo.svg" alt="Image logo"></a>
        <form class="search-bar-form" action="<?='products/search'?>" method="POST">
            <label class="search-bar" for="search"><!-- Search bar -->
                <div>
                    <img alt="Image of loupe" src="/frontend/assets/images/loupe.svg" class="/frontend/image-loupe">
                    <input type="text" id="search" name="search" placeholder="Rechercher un article">
                </div>
                <input type="submit" class="small-size button important-text" id="button-rechercher" value="Rechercher"/>
            </label>
        </form>
        <div>
            <a href="/login" class="navigation-link-header">
                <div>
                    <span class="navigation-link-header-title"><?php echo isset($_SESSION['user']) ? $_SESSION['user']->getPrenom()." ".$_SESSION["user"]->getNom() : "Connexion";?></span>
                    <span class="navigation-link-header-desc"><?php echo isset($_SESSION['user']) ? "Espace utilisateur" : "Inscription";?></span>
                </div>
                <img alt="Image of user" src="/frontend/assets/images/user.svg">
            </a>
            <a class="navigation-link-header" href="/card">
                <div id="shopping-cart-text">
                    <span class="navigation-link-header-title">Panier</span>
                    <span class="navigation-link-header-desc">0 articles</span>
                </div>
                <img alt="Image of shopping cart" src="/frontend/assets/images/Header-Image/panier.svg">
            </a>
        </div>
    </div>
    <div class="header-down">
        <div id="header-down-content">
            <div class="header-down-link">
                <a href="/products">
                    <img src="/frontend/assets/images/Header-Image/grid.svg" alt="grid">
                    <span>Tous les produits</span>
                </a>
                <img src="/frontend/assets/images/Header-Image/line.svg" alt="horizontal-line" class="horizontal-line">
                <a href="/products/tshirt">
                    <img src="/frontend/assets/images/Header-Image/t-shirt.svg" alt="t-shirt">
                    <span>T-Shirt</span>
                </a>
                <a href="/products/sweatshirt">
                    <img src="/frontend/assets/images/Header-Image/sweatshirt.svg" alt="sweatshirt">
                    <span>Sweat-shirt </span>
                </a>
                <a href="/products/sportswear">
                    <img src="/frontend/assets/images/Header-Image/jogger-pants.svg" alt="jogger-pants">
                    <span>Tenue de sport</span>
                </a>
                <a href="/products/accessoire">
                    <img src="/frontend/assets/images/Header-Image/accessories.svg" alt="accessories">
                    <span>Accessoires</span>
                </a>
            </div>
            <a class="small-size button basic-text" href="/products/promotion">Promotions</a>
        </div>
    </div>
</header>
