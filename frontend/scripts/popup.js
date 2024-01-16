// **** Cookies Popup **** //
const cookiesPopup = document.querySelector('#cookies-popup-overlay');
const cookiesPopupBtn = {
    accept: document.querySelector('#accept-cookies'),
    decline: document.querySelector('#deny-cookies')
};

/**
 * Affiche la popup de cookies
*/
function showCookiesPopup() {
    try {
        cookiesPopup.classList.add('active');
    } catch (error) {
        showErrorPopup('Erreur', "Une erreur est survenue lors de l'affichage du popup de cookies.");
    }
}

// **** Status popup **** //

/**
 * 
 * @param {string} title Le titre du popup
 * @param {string} description La description du popup
 * @param {Element} popup L'élément HTML du popup
 * @param {Element} popupTitle L'élément HTML du titre du popup
 * @param {Element} popupDescription L'élément HTML de la description du popup
 */
function showPopup(title, description, popup, popupTitle, popupDescription) {
    // Vérifier si titre et description sont des strings et non vides
    if (title && typeof title === 'string') {
        popupTitle.textContent = title;
    } else {
        throw new Error('Title must be a string and not empty');
    }
    if (description && typeof description === 'string') {
        popupDescription.textContent = description;
    } else {
        throw new Error('Description must be a string and not empty');
    }
    // Afficher le popup
    popup.classList.add('active');
    // Ajouter un évènement pour fermer le popup 10 secondes après
    setTimeout(() => {
        popup.classList.remove('active');
    }, 10000);
}

// **** Success Popup **** //
const successPopup = document.querySelector('.status-popup.success');
const successPopupTitle = successPopup.querySelector('.status-popup-title');
const successPopupDescription = successPopup.querySelector('.status-popup-description');

/**
 * Cette fonction affiche le popup de succès et le ferme automatiquement après 10 secondes
 * @param {string} title Le titre du popup
 * @param {string} description La description du popup
 */
function showSuccessPopup(title, description) {
    showPopup(title, description, successPopup, successPopupTitle, successPopupDescription);
}

// **** Error Popup **** //
const errorPopup = document.querySelector('.status-popup.error');
const errorPopupTitle = errorPopup.querySelector('.status-popup-title');
const errorPopupDescription = errorPopup.querySelector('.status-popup-description');

/**
 * Cette fonction affiche le popup d'erreur et le ferme automatiquement après 10 secondes
 * @param {string} title Le titre du popup
 * @param {string} description La description du popup
 */
function showErrorPopup(title, description) {
    showPopup(title, description, errorPopup, errorPopupTitle, errorPopupDescription);
}

// **** Logout Popup **** //
const logoutPopupOverlay = document.querySelector('#logout-popup-overlay');

/**
 * Affiche la popup de déconnexion
 */
function showLogoutPopup() {
    try{
        logoutPopupOverlay.classList.add('active');
    } catch (error) {
        showErrorPopup('Erreur', "Une erreur est survenue lors de l'affichage du popup de déconnexion.");
    }
}

function hideLogoutPopup() {
    logoutPopupOverlay.classList.remove('active');
}




document.addEventListener('DOMContentLoaded', function() {
    // Ajouter un gestionnaire d'événements à la fenêtre pour fermer le popup en dehors
    window.addEventListener('click', function(event) {
      var popups = document.querySelectorAll('.popupCommentaire');
      for (var i = 0; i < popups.length; i++) {
        var popup = popups[i];
        if (event.target !== popup && !popup.contains(event.target)) {
          popup.style.display = 'none';
        }
      }
    });
  
    // Ajouter un gestionnaire d'événements à chaque bouton de déclenchement du popup
    var triggers = document.querySelectorAll('[id^="commentPopupTrigger"]');
    for (var i = 0; i < triggers.length; i++) {
      var trigger = triggers[i];
      trigger.addEventListener('click', function(event) {
        event.stopPropagation(); // Éviter la propagation du clic à la fenêtre
        var identifier = this.id.replace('commentPopupTrigger', '');
        openPopup(identifier);
      });
    }
  
    // Fonction pour ouvrir le popup
    function openPopup(identifier) {
      var popup = document.getElementById('commentPopup' + identifier);
      popup.style.display = 'block';
    }
  });
