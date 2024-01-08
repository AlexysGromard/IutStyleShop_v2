<div id="cookies-popup-overlay">
    <div id="cookies-popup">
        <div id="cookies-popup-left">
            <span id="cookies-popup-title">Gérer les cookies</span>
            <p id="cookies-popup-description">Nous utilisons des cookies pour améliorer votre expérience sur notre site. Ces cookies sont essentiels au bon fonctionnement du site et nous aident à comprendre comment vous l'utilisez. En continuant à naviguer, vous acceptez l'utilisation de ces cookies.</p>
            <form method="POST" action="/backend/cookies.php" id="cookies-popup-btn-container">
                <input type="submit" class="button" id="accept-cookies" name="accept-cookies" value="Accepter les cookies"/>
                <input type="submit" class="button" id="deny-cookies" name="deny-cookies" value="Refuser les cookies" />
            </form>
        </div>
        <div id="cookies-popup-right">
            <img src="/frontend/assets/icons/cookie.png" alt="Cookie image">
        </div>
    </div>
</div>