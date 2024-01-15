<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>IutStyleShop - Vérification de l'adresse mail</title>
    <?php include 'frontend/common-includes.php'?>
    <link rel="stylesheet" href="frontend/styles/commentaire.css">
    <link rel="stylesheet" href="frontend/styles/police.css">
</head>
<body>
    <!-- Header -->
    <?php include 'frontend/components/header.php'; ?>



    <!-- Main -->
    <main id="commentaire-main">
        <p class="section-title-name Black_police_70 page-title">Espace de notation</p>

        <div class="commentaire-block commentaire-contenaire">
            <div class="commentaire-block form-commentaire">

                <p class="Black_police_60"> Vous notez le produit suivant : </p>

                <div class="commentaire-block article-info-part">

                    <div class="article-image article-grow1">
                        <img src="<? $article->getImages()[0] ?>" alt="produit">
                    </div>
                
                    <div class="commentaire-block article-info article-grow9">

                        <p class="Black_police_60"><? $article->getNom() ?></p>

                        <div class="commentaire-block article-info-part ">
                            <div class="article-grow3">
                                <p class="Black_police_40">Category: <? $article->getCategory() ?></p>
                                <p class="Black_police_40">Taille  : <?  ?></p>
                                <p class="Black_police_40">Couleur : <? $article->getCouleur() ?></p>
                            </div>
                            <div class="article-grow3" style="width: min-content;">
                                <p class="Black_police_40">Notation:</p>
                                <div style = "min-width: max-content;">
                                    <?php
                                    for ($i = 0; $i < 5; $i++) {
                                        if ($i < $article->getNotes())
                                            echo '<img src="frontend/assets/icons/marquer-comme-star-preferee.svg" alt="etoile">';
                                        else
                                            echo '<img src="frontend/assets/icons/marquer-comme-star-pas-preferee.svg" alt="etoile">';
                                    }
                                    ?>
                                </div>
                                <p class="Black_police_40"><? $article->getVotant() ?> évaluations</p>
                            </div>
                            <div class="article-grow9">
                                <p class="Black_police_40">Description:</p>
                                <p class="Black_police_40" style="min-width: 300px;"><? $article->getDescription() ?></p>
                            </div>
                            <div class="article-grow1">
                                <p class="Black_police_40">Prix unitaire:</p>
                                <p class="Black_police_60"><? $article->getPrix() ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <form action="/commentaire/addCommentaire/<? $article->getId() ?>" method="post" class="form-commentaire">
                <div class="commentaire-block">
                    <p class="Black_police_60">Votre note</p>
                </div>

                <div class="form-commentaire-part">


                    <input type="radio" name="note" id="note1" value="1" onclick="mettreEtoiles()">
                    <label for="note1"><img src="frontend/assets/icons/marquer-comme-star-pas-preferee.svg" id="etoile0" alt="etoile"></label>

                    <input type="radio" name="note" id="note2" value="2" onclick="mettreEtoiles()">
                    <label for="note2"><img src="frontend/assets/icons/marquer-comme-star-pas-preferee.svg" id="etoile1" alt="etoile"></label>

                    <input type="radio" name="note" id="note3" value="3" onclick="mettreEtoiles()">
                    <label for="note3"><img src="frontend/assets/icons/marquer-comme-star-pas-preferee.svg" id="etoile2" alt="etoile"></label>

                    <input type="radio" name="note" id="note4" value="4" onclick="mettreEtoiles()">
                    <label for="note4"><img src="frontend/assets/icons/marquer-comme-star-pas-preferee.svg" id="etoile3" alt="etoile"></label>

                    <input type="radio" name="note" id="note5" value="5" onclick="mettreEtoiles()">
                    <label for="note5"><img src="frontend/assets/icons/marquer-comme-star-pas-preferee.svg" id="etoile4" alt="etoile"></label>



                </div>

                <div class="form-commentaire-part">
                    <textarea name="commentaire" id="commentaire" cols="30" rows="10" placeholder="Votre commentaire" oninput="compterCaracteres()"></textarea>
                    <p class="Gray_police_40"> <span id="nb-caractere" class="Gray_police_40">0</span> / 500 caractères</p>

                    <div class="button-part">
                        <input type="button" class="button commentaire-button-wite commentaire-button" value="Annuler" onclick="retournerEnArriere()"/>
                        <input type="submit" class="White_police_40 button commentaire-button " value="Valider"/>
                    </div>

                </div>


            </form>


        </div>
    </main>

    <!-- Footer -->
    <?php include 'frontend/components/footer.php'; ?>
</body>
<script src="/frontend/scripts/commentaire.js"></script>
</html>