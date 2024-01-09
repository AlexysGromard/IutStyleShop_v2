<header>
    <div class="header-top">
        <a class="link-to-home" href="/"><img src="/frontend/assets/images/Header-Image/logo.svg" alt="Image logo"></a>
        <label class="search-bar" for="search"><!-- Search bar -->
            <div>
                <img alt="Image of loupe" src="/frontend/assets/images/loupe.svg" class="/frontend/image-loupe">
                <input type="text" id="search" name="search" placeholder="Rechercher un article">
            </div>
            <a class="small-size button important-text" id="button-rechercher" href="#">Rechercher</a>
        </label>
        <div>
            <a href="/login" class="navigation-link-header">
                <div>
                    <span class="navigation-link-header-title">Connexion</span>
                    <span class="navigation-link-header-desc">Inscription</span>
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
                <a href="/products/filter/t-shirt/">
                    <img src="/frontend/assets/images/Header-Image/t-shirt.svg" alt="t-shirt">
                    <span>T-Shirt</span>
                </a>
                <a href="/products/filter/sweat-shirt/">
                    <img src="/frontend/assets/images/Header-Image/sweatshirt.svg" alt="sweatshirt">
                    <span>Sweat-shirt </span>
                </a>
                <a href="/products/filter/sportswear/">
                    <img src="/frontend/assets/images/Header-Image/jogger-pants.svg" alt="jogger-pants">
                    <span>Tenue de sport</span>
                </a>
                <a href="/products/filter/accessories/">
                    <img src="/frontend/assets/images/Header-Image/accessories.svg" alt="accessories">
                    <span>Accessoires</span>
                </a>
            </div>
            <a class="small-size button basic-text" href="#">Promotions</a>
        </div>
    </div>
</header>
