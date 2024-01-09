
<?php if ($article==null) :?>
    <div class="large_box">
        <div class="title_space">
            <span class="Black_police_65">Base de données articles</span> 
            <a href="" class="White_police_40 small-size button">Ajouter un article</a>
        </div>
                               

        <table class="table_admin">
            <thead>
                <tr>
                    <th class="White_police_35" >N°</th>
                    <th class="White_police_35" >Nom</th>
                    <th class="White_police_35" >Catégorie</th>
                    <th class="White_police_35" >Genre</th>
                    <th class="White_police_35" >Notes</th>
                    <th class="White_police_35" >En catalogue</th>
                    <th class="White_police_35" >Description</th>
                    <th class="White_police_35" >Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach( $array_articles as $element) : ?>
                <?php $listvalues= $element->getArrayOfImportantAttribut()?>
                <tr>
                    <td><a href="xx" class="Red_police_50"><?= $listvalues["N°"] ?></a></td>
                    <td class="Black_police_40"><?= $listvalues["Nom"] ?></td>
                    <td class="Black_police_40"><?= $listvalues["Catégorie"] ?></td>
                    <td class="Black_police_40"><?= $listvalues["Genre"] ?></td>
                    <td class="Black_police_40"><?= $listvalues["Notes"] ?></td>
                    <td class="Black_police_40"><?= $listvalues["En catalogue"] ?></td>
                    <td class="Black_police_40"><?= $listvalues["Description"] ?></td>
                    <td class=action_space>
                        <a href="xx"><img src="/frontend/assets/icons/pencil.png" alt="poubelle rouge"></a>
                        <a href="xx"><img src="/frontend/assets/icons/bin.png" alt="crayon rouge"></a>
                    </td>
                </tr>
                <?php endforeach; ?>

            </tbody>
        </table>
    </div>
<?php elseif ($article=="nouvelArticle"): ?>
    
    <form class="large_box" action="#" method="GET">
        <span class="Black_police_65">Article N°xxxx - xxxxxxxxxxxx</span>
        <div class="top_ajout_article">
            <div class="input_box">
                <div>
                    <div class="large_inputText_space">
                        <label for="article-name" class="Black_police_55">Nom de l'article</label>
                        <input id="article-name" placeholder="Nom de l'article" type="text" class="sidebar">
                    </div>  
                    <div class="large_inputText_space">
                        <label for="article-description" class="Black_police_55">Description de l'article</label>
                        <textarea id="article-description" placeholder="Description" class="textArea"></textarea>
                    </div>
                        
                </div>
                <div>
                
                    <div class="large_inputText_space">
                        <label for="article-category" class="Black_police_55">Catégorie de l'article</label>
                        <select id="article-category" class="sidebar">
                            <option value="" selected disabled>--Catégorie à selectionner--</option>
                            <option value="t-shirt">T-shirt</option>
                            <option value="sweat">Sweat-shirt</option>
                            <option value="sport">Tenue de sport</option>
                            <option value="accessory">Accessoire</option>
                        </select>
                    </div>
                    <div class="large_inputText_space">
                        <label for="article-gender" class="Black_police_55">Genre de l'article</label>

                        <select id="article-gender" class="sidebar">
                            <option value="" selected disabled>--Genre à selectionner--</option>
                            <option value="none">Aucun</option>
                            <option value="man">Homme</option>
                            <option value="woman">Femme</option>
                        </select>
                    </div>
                    <div class="large_inputText_space">
                        <label for="article-color" class="Black_police_55">Couleur de l'article</label>
                        <select id="article-color" class="sidebar">
                            <option value="" selected disabled>--Couleur à selectionner--</option>
                            <option value="none">Aucun</option>
                            <option value="red">Rouge</option>
                            <option value="green">Vert</option>
                            <option value="blue">Bleu</option>
                            <option value="white">Blanc</option>
                            <option value="black">Noir</option>

                        </select>
                    </div>
                    <div class="price-section">
                        <div class="inputText_space">
                            <label for="article-price" class="Black_police_55">Prix</label>
                            <input id="article-price" placeholder="Prix de l'article" type="number" class="sidebar">
                        </div>
                        <div class="inputText_space">
                            <label for="article-promo" class="Black_police_55">Promo</label>
                            <input id="article-promo" placeholder="Promotion (en %)" type="number" class="sidebar">
                        </div>
                    </div>
                </div>
            </div>
            <div class="input_box">
                <div class="size">
                    <legend class="Black_police_55" >Tailles</legend>
                    <div class="radio-part">
                        <div class="radio_button_space">
                            <input class="radioButton" type="checkbox" value="None" id="radio-none" name="size" checked>
                            <label class="Black_police_55" for="radio-none" checked>Aucune Taille</label>
                        </div>
                        <div class="radio_button_space">
                            <input class="radioButton" type="checkbox" value="XS" id="radio-xs" name="size">
                            <label class="Black_police_55"  for="radio-XS">XS</label>
                        </div>
                        <div class="radio_button_space">
                            <input class="radioButton" type="checkbox" value="S" id="radio-S" name="size" >
                            <label class="Black_police_55" for="radio-S">S</label>
                        </div>
                        <div class="radio_button_space">
                            <input class="radioButton" type="checkbox" value="M" id="radio-M" name="size" >
                            <label class="Black_police_55" for="radio-M">M</label>
                        </div>
                        <div class="radio_button_space">
                            <input class="radioButton" type="checkbox" value="L" id="radio-L" name="size" >
                            <label class="Black_police_55" for="radio-L">L</label>
                        </div>
                        <div class="radio_button_space">
                            <input class="radioButton" type="checkbox" value="XL" id="radio-XL" name="size" >
                            <label class="Black_police_55" for="radio-XL">XL</label>
                        </div>                        
                        
                    </div>
                </div>
                <div class="size">
                    <legend class="Black_police_55" >Article en catalogue</legend>
                    <div class="radio-part">
                        <div class="radio_button_space">
                            <input class="radioButton" type="radio" value="oui" id="radio-yes" name="catalog">
                            <label class="Black_police_55" for="radio-yes">Oui</label>
                        </div>
                        <div class="radio_button_space">
                            <input class="radioButton" type="radio" value="non" id="radio-no" name="catalog" checked>
                            <label class="Black_police_55"  for="radio-no">Non</label>
                        </div>
                        
                    </div>
                </div>
            </div>
            <p class="Black_police_55">Images du produit</p>
            <div class ="image_box">
                <div class="pictures">
                    <div>
                        <div></div>
                        <div></div>
                        <div></div>
                    </div>
                </div>
                <div class="insertPicture">
                        <input type="file" id="image-insert" accept="image/*">
                        <label for="image-insert" id="img-part" data-img="upload.svg"><img src="/frontend/assets/icons/upload.svg">Publier une image</label>
                        <a class="small-size button basic-text" id="button-insert-img">Ajouter l'image</a>
                </div>
            </div>
            <p class="Black_police_55">Stock</p>
        </div>
        <div class="image_box">
            <table class="table_admin elargire">
                <thead>
                    <tr>
                        <th><label class="White_police_35" for="Aucun">Aucun</label></th>
                        <th><label class="White_police_35" for="Aucun">XS</label></th>
                        <th><label class="White_police_35" for="Aucun">S</label></th>
                        <th><label class="White_police_35" for="Aucun">M</label></th>
                        <th><label class="White_police_35" for="Aucun">L</label></th>
                        <th><label class="White_police_35" for="Aucun">XL</label></th>
                    </tr>
                </thead>
                
                <tbody>
                    <tr>
                        <td><input id="Aucun" placeholder="0" type="number" class="sidebar"></td>
                        <td><input id="XS" placeholder="0" type="number" class="sidebar"></td>
                        <td><input id="S" placeholder="0" type="number" class="sidebar"></td>
                        <td><input id="L" placeholder="0" type="number" class="sidebar"></td>
                        <td><input id="L" placeholder="0" type="number" class="sidebar"></td>
                        <td><input id="XL" placeholder="0" type="number" class="sidebar"></td>

                    </tr>
                </tbody>
            </table>
            <input id="addProductButton" class="medium-size button basic-text"  value="Ajouter un article" href="#">

        </div>
        
    </form>
    <script src="/frontend/scripts/insertImage.js"></script>
<?php endif; ?>
