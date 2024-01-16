function makesearch(){
    searchBar = document.getElementById("search");

    var valeur = searchBar.value;

    //link = "/products/filter/true/true/true/true/true/true/true/true/true/true/true/true/true/false/true/true/"+valeur.toString();
    link = "/products/search/"+valeur.toString();
    document.location.href = link;
    
}