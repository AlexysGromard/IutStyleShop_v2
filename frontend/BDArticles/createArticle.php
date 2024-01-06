<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Création Article</title>
    <link rel="stylesheet" href="../styles/variables.css">
    <link rel="stylesheet" href="../styles/general.css">
    <link rel="stylesheet" href="../styles/createArticle.css">

</head>
<body>
<?php include '../components/header.php'; ?>

    <form class="formCreateArticle" action="" >
        <p> Article </p>

        <div class="container">

            <div class="name">
                <label for="article-name">Nom de l'article</label>
                <input id="article-name" placeholder="Nom de l'article" type="text">
            </div>
            <div class="description">
                <label for="article-description">Description de l'article</label>
                <textarea id="article-description" placeholder="Description"></textarea>
            </div>
            <div class="category">
                <label for="article-category">Catégorie de l'article</label>
                <select id="article-category">
                    <option value="">Catégorie à selectionner</option>
                    <option value="t-shirt">T-shirt</option>
                    <option value="sweat">Sweat-shirt</option>
                    <option value="sport">Tenue de sport</option>
                    <option value="accessory">Accessoire</option>
                </select>
            </div>

            <div class="gender">
                <label for="article-gender">Genre de l'article</label>

                <select id="article-gender">
                    <option value="">Genre à selectionner</option>
                    <option value="none">Aucun</option>
                    <option value="man">Homme</option>
                    <option value="woman">Femme</option>
                </select>
            </div>
            <div class="color">
                <label for="article-color">Couleur de l'article</label>
                <select id="article-color">
                    <option value="">Couleur à selectionner</option>
                    <option value="none">Aucun</option>
                    <option value="red">Rouge</option>
                    <option value="green">Vert</option>
                    <option value="blue">Bleu</option>
                    <option value="white">Blanc</option>
                    <option value="black">Noir</option>

                </select>
            </div>
            <div class="price-part">
                <label for="article-price">Prix</label>
                <input id="article-price" placeholder="Prix de l'article" type="text">
            </div>
            <div class="promo">
                <label for="article-promo">Promo</label>
                <input id="article-promo" placeholder="Promotion (en %)" type="text">
            </div>
            <div class="size">
                <legend class="field-name" >Tailles</legend>
                <div class="radio-part">
                    <div>
                        <input class="radioButton" type="radio" value="None" id="radio-none" name="size">
                        <label class="field-name" for="radio-none">Aucune Taille</label>
                    </div>
                    <div>
                        <input class="radioButton" type="radio" value="XS" id="radio-xs" name="size">
                        <label class="field-name"  for="radio-XS">XS</label>
                    </div>
                    <div>
                        <input class="radioButton" type="radio" value="S" id="radio-S" name="size" checked>
                        <label class="field-name" for="radio-S">S</label>
                    </div>
                    <div>
                        <input class="radioButton" type="radio" value="M" id="radio-M" name="size" >
                        <label class="field-name" for="radio-M">M</label>
                    </div>
                    <div>
                        <input class="radioButton" type="radio" value="L" id="radio-L" name="size" >
                        <label class="field-name" for="radio-L">L</label>
                    </div>
                    <div>
                        <input class="radioButton" type="radio" value="XL" id="radio-XL" name="size" >
                        <label class="field-name" for="radio-XL">XL</label>
                    </div>
                    <div>
                        <input class="radioButton" type="radio" value="XXL" id="radio-XXL" name="size" >
                        <label class="field-name" for="radio-XXL">XXL</label>
                    </div>
                    
                    
                </div>
            </div>
            <div class="inCatalog">
                <legend class="field-name" >Article en catalogue</legend>
                <div class="radio-part">
                    <div>
                        <input class="radioButton" type="radio" value="oui" id="radio-yes" name="catalog">
                        <label class="field-name" for="radio-yes">Oui</label>
                    </div>
                    <div>
                        <input class="radioButton" type="radio" value="non" id="radio-no" name="catalog">
                        <label class="field-name"  for="radio-no">Non</label>
                    </div>
                    
                </div>
            </div>
            <div class="pictures">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>

            <div class="insertPicture">
                <input type="file" id="image-insert" accept="image/*">
                <label for="image-insert" id="img-part" data-img="upload.svg"><img src="../assets/icons/upload.svg">Publier une image</label>
                <a class="small-size button basic-text" href="#">Ajouter l'image</a>
            </div>
            <div class="stock">
            <table>
                <tr>
                    <th>Aucun</th>
                    <th>XS</th>
                    <th>S</th>
                    <th>M</th>
                    <th>L</th>
                    <th>XL</th>
                    <th>XXL</th>
                </tr>
            
                <tr>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>

                </tr>
            </table>
            </div>
            
        </div>
        
        
        
    </form>
<?php include '../components/footer.php'; ?>
<script src="../scripts/insertImage.js"></script>
</body>
</html>