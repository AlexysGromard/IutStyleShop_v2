<div class="large_box" action="xx">

    <!-- hystorique commande -->
    <div class= titel_box>
        <span class="Black_police_65">Historique de vos commandes</span>
        <span class="Black_police_45">2022 - 2024</span>
    </div>
    
    <div class="all_commandes_box">
        <!-- 1er boucle for -->
        <div class="all_commande_box">
            <div class="commande_box">
                <div class = "commande_box_left">
                    <img class="first_product_image" src="/frontend/products/sweatshirt_iut_rouge/image1.png" alt="">
                    <div class="commande_text_box_left">
                        <span class="Black_police_55">Sweat rouge IUT, T-Shirt blanc IUT, ...</span>
                        <span class="Black_police_40">Commandé le 30 novembre 2023 </span>
                    </div>
                </div>
                <div class="commande_box_right">
                    <div class="commande_text_box_right">
                        <span class="Black_police_40">Etat de la commande</span>
                        <span class="Black_police_65">En cours de traitement</span>
                    </div>
                    <div class="commande_text_box_right">
                        <span class="Black_police_40">Total de la commande</span>
                        <span class="Black_police_65" >77,99€</span>
                    </div>
                    <label class="drop_down_button">
                        <input type="checkbox" id="checkbox_product_0" onclick="unroll_items(0)">
                        <img src="/frontend/assets/icons/blackarrow.png" alt="">
                    </label>
                </div>
            </div>
            <!-- 2ème boucle for -->
            <div class=all_products_command id=box_product_0>
                <div class="commande_box product_box_commande">
                    <div class = "commande_box_left">
                        <img class="product_image_commande" src="/frontend/products/sweatshirt_iut_rouge/image1.png" alt="">
                        <div class="commande_text_box_left">
                            <span class="Black_police_60">Lorem ipsum dolor sit amet</span>
                            <span class="Black_police_40">Taille : S</span>
                            <span class="Black_police_40">Couleur : Rouge</span>
                            <span class="Black_police_40">Quantité : 1</span>
                        </div>
                    </div>
                    <div class="commande_box_right product_box_left_commande">
                        <div class="commande_text_box_right">
                            <span class="Black_police_40">Prix unitaire</span>
                            <span class="Black_police_65">39,99€</span>
                        </div>
                        <div class="commande_text_box_right">
                            <span class="Black_police_40">Sous-total</span>
                            <span class="Black_police_65" >39,99€  </span>
                        </div>
                    </div>
                </div>
                <div>
                    test
                </div>
            </div>
        </div>
        <hr />
        <div>
            <span>test</span>
        </div>
    </div>
    
</div>

<script src="/frontend/scripts/clientSpace/commande.js"></script>