// **** Popup **** //
const cookiesPopup = document.querySelector('#cookies-popup-overlay');
const cookiesPopupBtn = {
    accept: document.querySelector('#accept-cookies'),
    decline: document.querySelector('#deny-cookies')
};

/**
 * Affiche la popup de cookies
*/
function showCookiesPopup() {
    cookiesPopup.classList.add('active');
}

/**
 * Ferme la popup de cookies
 */
function hideCookiesPopup() {
    cookiesPopup.classList.remove('active');
}

for (let key in cookiesPopupBtn) {
    cookiesPopupBtn[key].addEventListener('click', hideCookiesPopup);
}