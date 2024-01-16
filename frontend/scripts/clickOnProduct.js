/*
    * Ce script permet de rediriger vers la page de l'article
    * lorsque l'on clique sur l'image ou le texte de l'article
    * dans la page d'accueil
*/
articles = document.getElementsByClassName("boite_article");
Array.from(articles).forEach(function(article) {
    var id = article.dataset.id;
    var img = article.querySelector(".image");
    var text = article.querySelector(".product-btn");
    if (img) {
        // Ajoute un écouteur d'événements "click"
        img.addEventListener("click", function() {
            document.location.href="/article/visuel/"+id; 
        });
    }
    if(text){
        // Ajoute un écouteur d'événements "click"
        text.addEventListener("click", function() {
            document.location.href="/article/visuel/"+id; 
        });
    }
});
