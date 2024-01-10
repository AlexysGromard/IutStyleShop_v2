// Nom du script: products.js
// Description: Script de la page qui contient les produits

// ==================== //
// Script de filtrage des couleurs 
// ==================== //
function updateStyles(li, checkbox, isChecked) {
    li.classList.toggle('product-color-checked', isChecked);
}

document.querySelectorAll('#product-color li').forEach(li => {
    const checkbox = li.querySelector('input[type="checkbox"]');
    if (checkbox) {
        checkbox.addEventListener('change', () => {
            updateStyles(li, checkbox, checkbox.checked);
        });
        // Si checkbox est déjà coché au chargement de la page
        updateStyles(li, checkbox, checkbox.checked);
    }
});

// ==================== //
// Script de filtrage des prix
// ==================== //
// Constantes pour les valeurs minimales et maximales des sliders
const minValue = 0;
const maxValue = 100;

// Récupérer les éléments du DOM
const fromSlider = document.getElementById('fromSlider');
const toSlider = document.getElementById('toSlider');
const fromValueSpan = document.getElementById('fromValue');
const toValueSpan = document.getElementById('toValue');

// Gérer les événements oninput
fromSlider.oninput = function () {
    updateSliderValues();
};

toSlider.oninput = function () {
    updateSliderValues();
};

// Mettre à jour les valeurs des sliders et des spans
// Mettre à jour les valeurs des sliders et des spans
function updateSliderValues() {
    const fromSliderValue = parseInt(fromSlider.value);
    const toSliderValue = parseInt(toSlider.value);

    fromValueSpan.innerHTML = fromSliderValue;
    toValueSpan.innerHTML = toSliderValue;

    // Mettre à jour les sliders si nécessaire
    if (fromSliderValue > toSliderValue && fromSliderValue !== minValue && toSliderValue !== maxValue) {
        toSlider.value = fromSliderValue;
    } else if (toSliderValue < fromSliderValue && toSliderValue !== maxValue && fromSliderValue !== minValue) {
        fromSlider.value = toSliderValue;
    }

    // S'assurer que le slider max ne descend pas en dessous du slider min
    if (toSliderValue < fromSliderValue) {
        fromSlider.value = toSliderValue;

        console.log("le slider max ne peut pas être inférieur au slider min");
    }
}

// ==================== //
// Script de l'ouverture et fermeture du filtre sur smartphone
// ==================== //
// Récupérer les éléments du DOM
const priceSlider = document.getElementById('price-slider');
const typeCheckbox = document.getElementById('type-checkbox');
const colorCheckbox = document.getElementById('color-checkbox');
const filterSectionTitle = document.getElementById('filter-section-title');

// Quand on clique sur filter-section-title:after
filterSectionTitle.addEventListener('click', function () {
    // Mettre les ID à display: none
    priceSlider.style.display = (priceSlider.style.display === 'none') ? 'block' : 'none';
    if (typeCheckbox) {
        typeCheckbox.style.display = (typeCheckbox.style.display === 'none') ? 'block' : 'none';
    }
    colorCheckbox.style.display = (colorCheckbox.style.display === 'none') ? 'block' : 'none';
});

