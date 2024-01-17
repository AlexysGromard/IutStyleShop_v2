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
const genderCheckbox = document.getElementById('gender-checkbox');
const button = document.getElementById('button-validate');

// Quand on clique sur filter-section-title:after
filterSectionTitle.addEventListener('click', function () {
    // Si résolution < 768px
    if (window.innerWidth < 768) {
        // Mettre les ID à display: none
        priceSlider.style.display = (priceSlider.style.display === 'none') ? 'block' : 'none';
        if (typeCheckbox) {
            typeCheckbox.style.display = (typeCheckbox.style.display === 'none') ? 'block' : 'none';
        }
        colorCheckbox.style.display = (colorCheckbox.style.display === 'none') ? 'block' : 'none';
        button.style.display = (button.style.display === 'none') ? 'block' : 'none';
        if (genderCheckbox) {
            genderCheckbox.style.display = (genderCheckbox.style.display === 'none') ? 'block' : 'none';
        }
    }
});

// ==================== //
// Script de reload via les filtres
// ==================== //
function reload_pageName(){
    tshirt = false;
    sweatshirt= false;
    sportswear=false;
    accessories = false;
    if(document.getElementById('product-type')){
        tshirt = document.getElementById('tshirt').checked;
        sweatshirt = document.getElementById('sweatshirt').checked;
        sportswear = document.getElementById('sportswear').checked;
        accessories = document.getElementById('accessories').checked;  
    }
    // Récupérer les couleurs (type checkbox)
    red = document.getElementById('red').checked;
    green = document.getElementById('green').checked;
    blue = document.getElementById('blue').checked;
    white = document.getElementById('white').checked;
    black = document.getElementById('black').checked;

    //Les prix 
    prixMin = document.getElementById('fromSlider').value;
    prixMax = document.getElementById('toSlider').value;

    //Les genres
    homme = document.getElementById('homme').checked;
    femme = document.getElementById('femme').checked;

    link = "/products/filter/"+tshirt.toString()+"/" + sweatshirt.toString()+"/" +sportswear.toString()+"/"+ accessories.toString() + "/"+red+"/"+green+"/"+blue+"/"+white+"/"+black+"/"+prixMin+"/"+prixMax+"/"+homme+"/"+femme+"/false/true/true/";
    //console.log(link)
    
    document.location.href = link

}


validate_button = document.getElementById('button-validate');
validate_button.addEventListener("click", reload_pageName);

// ==================== //
// Script tri par prix croissant/décroissant
// ==================== //
// Récupérer les éléments du DOM
const priceSort = document.getElementById('sort-order');

// Quand on change la valeur du select
priceSort.addEventListener('change', function () {
    let articles = document.querySelectorAll('.boite_article');
    let prices = [];

    articles.forEach(article => {
        // Convertir la chaîne de caractères en nombre
        let price = parseFloat(article.querySelector('.price').innerHTML);
        prices.push(price);
    });


    if (priceSort.value === 'pertinance') {
        // Remettre les articles dans l'ordre initial - Recharger la page
        document.location.reload();
    
    } else {
        if (priceSort.value === 'ascending-price') {
            prices.sort(function(a, b) {
                return a - b;
            });
        } else if (priceSort.value === 'descending-price') {
            prices.sort(function(a, b) {
                return b - a;
            });        
        }
    
    
        let sortedArticles = [];
    
        prices.forEach(price => {
            articles.forEach(article => {
                // Convertir la chaîne de caractères en nombre
                let articlePrice = parseFloat(article.querySelector('.price').innerHTML);
                if (articlePrice === price) {
                    sortedArticles.push(article);
                }
            });
        });
    
        let articlesDiv = document.getElementById('products-section');
        articlesDiv.innerHTML = '';
    
        sortedArticles.forEach(article => {
            articlesDiv.appendChild(article);
        });
    
    }

});
